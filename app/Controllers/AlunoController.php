<?php

use Dompdf\Dompdf;

class AlunoController
{
    private $alunoModel;

    public function __construct(Aluno $alunoModel)
    {
        $this->alunoModel = $alunoModel;
    }

    public function index()
    {
        $alunos = $this->alunoModel->todos();
        require BASE_PATH . '/app/Views/alunos/index.php';
    }

    public function cadastro()
    {
        require BASE_PATH . '/app/Views/alunos/cadastro.php';
    }

    public function salvar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?route=alunos/cadastro');
            exit;
        }

        $dados = [
            'matricula' => $_POST['matricula'],
            'nome' => $_POST['nome'],
            'email' => $_POST['email'] ?? null,
            'data_nascimento' => !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null,
            'curso' => $_POST['curso'],
            'situacao' => $_POST['situacao'],
            'observacoes' => $_POST['observacoes'] ?? null,
        ];

        try {
            $this->alunoModel->criar($dados);
            header('Location: index.php?route=alunos&msg=cadastrado');
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23505) {
                header('Location: index.php?route=alunos/cadastro&erro=duplicado');
            } else {
                header('Location: index.php?route=alunos/cadastro&erro=banco');
            }
            exit;
        }
    }

    public function editar()
    {
        if (!isset($_GET['id'])) {
            header('Location: index.php?route=alunos');
            exit;
        }

        $id = (int) $_GET['id'];
        $aluno = $this->alunoModel->buscarPorId($id);

        if (!$aluno) {
            header('Location: index.php?route=alunos');
            exit;
        }

        require BASE_PATH . '/app/Views/alunos/editar.php';
    }

    public function atualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?route=alunos');
            exit;
        }

        $id = (int) $_POST['id'];

        $dados = [
            'matricula' => trim($_POST['matricula']),
            'nome' => trim($_POST['nome']),
            'email' => trim($_POST['email']),
            'data_nascimento' => !empty($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null,
            'curso' => $_POST['curso'],
            'situacao' => $_POST['situacao'],
            'observacoes' => trim($_POST['observacoes']),
        ];

        try {
            $this->alunoModel->atualizar($id, $dados);
            header('Location: index.php?route=alunos&msg=atualizado');
            exit;
        } catch (PDOException $e) {
            header("Location: index.php?route=alunos/editar&id=$id&erro=banco");
            exit;
        }
    }

    public function excluir()
    {
        if (!isset($_GET['id'])) {
            header('Location: index.php?route=alunos');
            exit;
        }

        $id = (int) $_GET['id'];

        try {
            $this->alunoModel->excluir($id);
            header('Location: index.php?route=alunos&msg=excluido');
            exit;
        } catch (PDOException $e) {
            header('Location: index.php?route=alunos&erro=exclusao');
            exit;
        }
    }

    public function pdf()
    {
        require_once BASE_PATH . '/vendor/autoload.php';

        $total = $this->alunoModel->contarTotal();
        $ativos = $this->alunoModel->contarPorSituacao('Ativo');
        $trancados = $this->alunoModel->contarPorSituacao('Trancado');
        $formados = $this->alunoModel->contarPorSituacao('Formado');
        $porCurso = $this->alunoModel->agruparPorCurso();
        $ultimos = $this->alunoModel->ultimosCadastros(5);

        ob_start();
        require BASE_PATH . '/app/Views/pdf/conteudo.php';
        $html = ob_get_clean();

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4');
        $dompdf->render();
        $dompdf->stream();
    }
}

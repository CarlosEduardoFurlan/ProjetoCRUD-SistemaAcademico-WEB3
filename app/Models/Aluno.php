<?php

class Aluno
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function todos()
    {
        $stmt = $this->pdo->query("SELECT * FROM alunos ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function buscarPorId($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM alunos WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($dados)
    {
        $sql = "INSERT INTO alunos (matricula, nome, email, data_nascimento, curso, situacao, observacoes)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $dados['matricula'],
            $dados['nome'],
            $dados['email'],
            $dados['data_nascimento'],
            $dados['curso'],
            $dados['situacao'],
            $dados['observacoes']
        ]);
        return true;
    }

    public function atualizar($id, $dados)
    {
        $sql = "UPDATE alunos SET
                    matricula = ?,
                    nome = ?,
                    email = ?,
                    data_nascimento = ?,
                    curso = ?,
                    situacao = ?,
                    observacoes = ?
                WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $dados['matricula'],
            $dados['nome'],
            $dados['email'],
            $dados['data_nascimento'],
            $dados['curso'],
            $dados['situacao'],
            $dados['observacoes'],
            $id
        ]);
        return true;
    }

    public function excluir($id)
    {
        $sql = "DELETE FROM alunos WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return true;
    }

    public function contarTotal()
    {
        $stmt = $this->pdo->query("SELECT COUNT(*) as total FROM alunos");
        return $stmt->fetch()['total'];
    }

    public function contarPorSituacao($situacao)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM alunos WHERE situacao = ?");
        $stmt->execute([$situacao]);
        return $stmt->fetch()['total'];
    }

    public function agruparPorCurso()
    {
        $stmt = $this->pdo->query("SELECT curso, COUNT(*) as quantidade FROM alunos GROUP BY curso ORDER BY quantidade DESC");
        return $stmt->fetchAll();
    }

    public function ultimosCadastros($limite = 5)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM alunos ORDER BY created_at DESC LIMIT ?");
        $stmt->execute([$limite]);
        return $stmt->fetchAll();
    }
}

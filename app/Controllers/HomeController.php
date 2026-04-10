<?php

class HomeController
{
    private $alunoModel;

    public function __construct(Aluno $alunoModel)
    {
        $this->alunoModel = $alunoModel;
    }

    public function index()
    {
        $total = $this->alunoModel->contarTotal();
        $ativos = $this->alunoModel->contarPorSituacao('Ativo');
        $trancados = $this->alunoModel->contarPorSituacao('Trancado');
        $formados = $this->alunoModel->contarPorSituacao('Formado');
        $porCurso = $this->alunoModel->agruparPorCurso();
        $ultimos = $this->alunoModel->ultimosCadastros(5);

        require BASE_PATH . '/app/Views/home/index.php';
    }
}

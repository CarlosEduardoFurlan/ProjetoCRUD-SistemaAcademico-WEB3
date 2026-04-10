<?php

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/config/database.php';
require_once BASE_PATH . '/app/Models/Aluno.php';
require_once BASE_PATH . '/app/Controllers/HomeController.php';
require_once BASE_PATH . '/app/Controllers/AlunoController.php';

$alunoModel = new Aluno($pdo);

$route = $_GET['route'] ?? 'home';

switch ($route) {
    case 'home':
        $controller = new HomeController($alunoModel);
        $controller->index();
        break;

    case 'alunos':
        $controller = new AlunoController($alunoModel);
        $controller->index();
        break;

    case 'alunos/cadastro':
        $controller = new AlunoController($alunoModel);
        $controller->cadastro();
        break;

    case 'alunos/salvar':
        $controller = new AlunoController($alunoModel);
        $controller->salvar();
        break;

    case 'alunos/editar':
        $controller = new AlunoController($alunoModel);
        $controller->editar();
        break;

    case 'alunos/atualizar':
        $controller = new AlunoController($alunoModel);
        $controller->atualizar();
        break;

    case 'alunos/excluir':
        $controller = new AlunoController($alunoModel);
        $controller->excluir();
        break;

    case 'alunos/pdf':
        $controller = new AlunoController($alunoModel);
        $controller->pdf();
        break;

    default:
        $controller = new HomeController($alunoModel);
        $controller->index();
        break;
}


<?php
require_once 'config/database.php';

$stmt = $pdo->query("SELECT * FROM alunos ORDER BY id DESC");
$alunos = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Academico - Gerenciar Alunos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <div>
                <h1>Gerenciar Alunos</h1>
                <p>Cadastro, edicao e exclusao</p>
            </div>
            <nav>
                <a href="index.html" class="btn btn-back">Voltar ao Painel</a>
            </nav>
        </header>

        <main>
            <div class="actions">
                <a href="cadastro.html" class="btn btn-primary">Novo Aluno</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Matricula</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Curso</th>
                        <th>Situacao</th>
                        <th>Acoes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($alunos as $aluno): ?>
                    <tr>
                        <td><?php echo $aluno['matricula']; ?></td>
                        <td><?php echo $aluno['nome']; ?></td>
                        <td><?php echo $aluno['email']; ?></td>
                        <td><?php echo $aluno['curso']; ?></td>
                        <td>
                            <?php
                            $classe = strtolower($aluno['situacao']);
                            ?>
                            <span class="status <?php echo $classe; ?>">
                                <?php echo $aluno['situacao']; ?>
                            </span>
                        </td>
                        <td class="actions-cell">
                            <a href="editar.php?id=<?php echo $aluno['id']; ?>" class="btn btn-small btn-edit">Editar</a>
                            <a href="excluir.php?id=<?php echo $aluno['id']; ?>" class="btn btn-small btn-delete" onclick="return confirm('Deseja excluir este aluno?')">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </table>
        </main>

        <footer>
            <p>Sistema Academico - Projeto CRUD</p>
        </footer>
    </div>
</body>
</html>

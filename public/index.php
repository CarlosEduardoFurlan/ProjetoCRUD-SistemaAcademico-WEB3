<?php
require_once 'config/database.php';

// Total de alunos
$stmt = $pdo->query("SELECT COUNT(*) as total FROM alunos");
$total = $stmt->fetch()['total'];

// Total de ativos
$stmt = $pdo->query("SELECT COUNT(*) as total FROM alunos WHERE situacao = 'Ativo'");
$ativos = $stmt->fetch()['total'];

// Total de trancados
$stmt = $pdo->query("SELECT COUNT(*) as total FROM alunos WHERE situacao = 'Trancado'");
$trancados = $stmt->fetch()['total'];

// Total de formados
$stmt = $pdo->query("SELECT COUNT(*) as total FROM alunos WHERE situacao = 'Formado'");
$formados = $stmt->fetch()['total'];

// Alunos por curso
$stmt = $pdo->query("SELECT curso, COUNT(*) as quantidade FROM alunos GROUP BY curso ORDER BY quantidade DESC");
$porCurso = $stmt->fetchAll();

// Ultimos 5 cadastros
$stmt = $pdo->query("SELECT * FROM alunos ORDER BY created_at DESC LIMIT 5");
$ultimos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Academico - Painel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <div>
                <h1>Sistema Academico</h1>
                <p>Painel de Estatisticas</p>
            </div>
            <nav>
                <a href="admin.html" class="btn btn-primary">Gerenciar Alunos</a>
            </nav>
        </header>

        <main>
            <div class="stats-grid">
                <div class="stat-card">
                    <h3>Total de Alunos</h3>
                    <p class="stat-number"><?php echo $total; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Ativos</h3>
                    <p class="stat-number green"><?php echo $ativos; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Trancados</h3>
                    <p class="stat-number yellow"><?php echo $trancados; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Formados</h3>
                    <p class="stat-number blue"><?php echo $formados; ?></p>
                </div>
            </div>

            <div class="section">
                <h2>Alunos por Curso</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Curso</th>
                            <th>Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($porCurso as $curso): ?>
                        <tr>
                            <td><?php echo $curso['curso']; ?></td>
                            <td><?php echo $curso['quantidade']; ?></td>
                        </tr>
                        <?php endforeach; ?> 
                    </tbody>
                </table>
            </div>

            <div class="section">
                <h2>Ultimos Cadastros</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Nome</th>
                            <th>Curso</th>
                            <th>Data Cadastro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ultimos as $aluno): ?>
                        <tr>
                            <td><?php echo $aluno['matricula']; ?></td>
                            <td><?php echo $aluno['nome']; ?></td>
                            <td><?php echo $aluno['curso']; ?></td>
                            <td><?php echo $aluno['created_at']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>

        <footer>
            <p>Sistema Academico - Projeto CRUD</p>
        </footer>
    </div>
</body>
</html>

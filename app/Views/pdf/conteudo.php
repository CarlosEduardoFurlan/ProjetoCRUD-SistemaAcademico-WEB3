<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatorio do Sistema Academico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
        }
        .stat-card {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            width: 20%;
        }
        .stat-number {
            font-size: 24px;
            font-weight: bold;
        }
        .green { color: green; }
        .yellow { color: orange; }
        .blue { color: blue; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            color: #555;
        }
    </style>
</head>
<body>
    <h1>Relatorio do Sistema Academico</h1>

    <div class="stats">
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
                <td><?php echo date('d/m/Y H:i:s', strtotime($aluno['created_at'])); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

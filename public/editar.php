<?php
require_once 'config/database.php';

if(!isset($_GET['id'])) {
    header('Location: admin.php');
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM alunos WHERE id = ?");
$stmt->execute([$id]);
$aluno = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$aluno) {
    header('Location: admin.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno - Sistema Academico</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Editar Aluno</h1>
            <a href="index.html" class="btn btn-back">Voltar</a>
        </header>

        <main>
            <form action="processa_edicao.php" method="POST" class="form">
                
                <input type="hidden" name="id" value="<?php echo $aluno['id']; ?>">

                <div class="form-group">
                    <label for="matricula">Matricula *</label>
                    <input type="text" id="matricula" name="matricula" required value="<?php echo htmlspecialchars($aluno['matricula']); ?>">
                </div>

                <div class="form-group">
                    <label for="nome">Nome Completo *</label>
                    <input type="text" id="nome" name="nome" required value="<?php echo htmlspecialchars($aluno['nome']); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($aluno['email']); ?>">
                </div>

                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento" value="<?php echo htmlspecialchars($aluno['data_nascimento']); ?>">
                </div>

                <div class="form-group">
                    <label for="curso">Curso *</label>
                    <select id="curso" name="curso" required>
                        <option value="">Selecione um curso</option>
                        <option value="Analise e Desenvolvimento de Sistemas" <?php echo $aluno['curso'] === 'Analise e Desenvolvimento de Sistemas' ? 'selected' : ''; ?>>Analise e Desenvolvimento de Sistemas</option>
                        <option value="Ciencia da Computacao" <?php echo $aluno['curso'] === 'Ciencia da Computacao' ? 'selected' : ''; ?>>Ciencia da Computacao</option>
                        <option value="Engenharia de Software" <?php echo $aluno['curso'] === 'Engenharia de Software' ? 'selected' : ''; ?>>Engenharia de Software</option>
                        <option value="Sistemas de Informacao" <?php echo $aluno['curso'] === 'Sistemas de Informacao' ? 'selected' : ''; ?>>Sistemas de Informacao</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="situacao">Situacao *</label>
                    <select id="situacao" name="situacao" required>
                        <option value="Ativo" <?php echo $aluno['situacao'] === 'Ativo' ? 'selected' : ''; ?>>Ativo</option>
                        <option value="Inativo" <?php echo $aluno['situacao'] === 'Inativo' ? 'selected' : ''; ?>>Inativo</option>
                        <option value="Trancado" <?php echo $aluno['situacao'] === 'Trancado' ? 'selected' : ''; ?>>Trancado</option>
                        <option value="Formado" <?php echo $aluno['situacao'] === 'Formado' ? 'selected' : ''; ?>>Formado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="observacoes">Observacoes</label>
                    <textarea id="observacoes" name="observacoes" rows="3"><?php echo htmlspecialchars($aluno['observacoes']); ?></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Salvar Alteracoes</button>
                    <a href="index.html" class="btn btn-cancel">Cancelar</a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>

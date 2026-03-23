<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno - Sistema Academico</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Cadastrar Novo Aluno</h1>
            <a href="index.php" class="btn btn-back">Voltar</a>
        </header>

        <main>
            <form action="processa_cadastro.php" method="POST" class="form">
                <div class="form-group">
                    <label for="matricula">Matricula *</label>
                    <input type="text" id="matricula" name="matricula" required placeholder="Ex: 2024001">
                </div>

                <div class="form-group">
                    <label for="nome">Nome Completo *</label>
                    <input type="text" id="nome" name="nome" required placeholder="Ex: Joao Silva">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Ex: joao@email.com">
                </div>

                <div class="form-group">
                    <label for="data_nascimento">Data de Nascimento</label>
                    <input type="date" id="data_nascimento" name="data_nascimento">
                </div>

                <div class="form-group">
                    <label for="curso">Curso *</label>
                    <select id="curso" name="curso" required>
                        <option value="">Selecione um curso</option>
                        <option value="Analise e Desenvolvimento de Sistemas">Analise e Desenvolvimento de Sistemas</option>
                        <option value="Ciencia da Computacao">Ciencia da Computacao</option>
                        <option value="Engenharia de Software">Engenharia de Software</option>
                        <option value="Sistemas de Informacao">Sistemas de Informacao</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="situacao">Situacao *</label>
                    <select id="situacao" name="situacao" required>
                        <option value="Ativo">Ativo</option>
                        <option value="Inativo">Inativo</option>
                        <option value="Trancado">Trancado</option>
                        <option value="Formado">Formado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="observacoes">Observacoes</label>
                    <textarea id="observacoes" name="observacoes" rows="3" placeholder="Observacoes adicionais..."></textarea>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                    <a href="index.php" class="btn btn-cancel">Cancelar</a>
                </div>
            </form>
        </main>
    </div>
</body>
</html>

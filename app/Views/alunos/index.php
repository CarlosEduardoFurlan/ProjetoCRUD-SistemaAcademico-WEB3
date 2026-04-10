<?php $titulo = 'Sistema Academico - Gerenciar Alunos'; ?>
<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>

        <header>
            <div>
                <h1>Gerenciar Alunos</h1>
                <p>Cadastro, edicao e exclusao</p>
            </div>
            <nav>
                <a href="index.php?route=home" class="btn btn-back">Voltar ao Painel</a>
            </nav>
        </header>

        <main>
            <div class="actions">
                <a href="index.php?route=alunos/cadastro" class="btn btn-primary">Novo Aluno</a>
                <form method="post" action="index.php?route=alunos/pdf" style="display: inline;">
                    <button type="submit" class="btn btn-secondary">Baixar Relatorio</button>
                </form>
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
                            <?php $classe = strtolower($aluno['situacao']); ?>
                            <span class="status <?php echo $classe; ?>">
                                <?php echo $aluno['situacao']; ?>
                            </span>
                        </td>
                        <td class="actions-cell">
                            <a href="index.php?route=alunos/editar&id=<?php echo $aluno['id']; ?>" class="btn btn-small btn-edit">Editar</a>
                            <a href="index.php?route=alunos/excluir&id=<?php echo $aluno['id']; ?>" class="btn btn-small btn-delete" onclick="return confirm('Deseja excluir este aluno?')">Excluir</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>

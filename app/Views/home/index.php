<?php $titulo = 'Sistema Academico - Painel'; ?>
<?php require BASE_PATH . '/app/Views/layouts/header.php'; ?>

        <header>
            <div>
                <h1>Sistema Academico</h1>
                <p>Painel de Estatisticas</p>
            </div>
            <nav>
                <a href="index.php?route=alunos" class="btn btn-primary">Gerenciar Alunos</a>
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
                            <td><?php echo date('d/m/Y H:i:s', strtotime($aluno['created_at'])); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>

<?php require BASE_PATH . '/app/Views/layouts/footer.php'; ?>

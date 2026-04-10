<?php 
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $email = $_POST['email'] ?? null;
    $data_nascimento = $_POST['data_nascimento'] ?? null;
    $curso = $_POST['curso'];
    $situacao = $_POST['situacao'];
    $observacoes = $_POST['observacoes'] ?? null;

    if (empty($data_nascimento)) {
        $data_nascimento = null;
    }

try {
        $sql = "INSERT INTO alunos (matricula, nome, email, data_nascimento, curso, situacao, observacoes) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            $matricula,
            $nome,
            $email,
            $data_nascimento,
            $curso,
            $situacao,
            $observacoes
        ]);
        
        header('Location: admin.php?msg=cadastrado');
        exit;
        
    } catch (PDOException $e) {
        if ($e->getCode() == 23505) {
            header('Location: cadastro.php?erro=duplicado');
        } else {
            header('Location: cadastro.php?erro=banco');
        }
        exit;
    }
}

header('Location: cadastro.php');
exit;
?>
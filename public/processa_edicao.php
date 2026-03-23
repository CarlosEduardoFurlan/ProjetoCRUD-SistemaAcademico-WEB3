<?php
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $id = (int) $_POST['id'];
    
    $matricula = trim($_POST['matricula']);
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $data_nascimento = $_POST['data_nascimento'];
    $curso = $_POST['curso'];
    $situacao = $_POST['situacao'];
    $observacoes = trim($_POST['observacoes']);
    
    if (empty($data_nascimento)) {
        $data_nascimento = null;
    }
    
    try {
        $sql = "UPDATE alunos SET 
                    matricula = ?,
                    nome = ?,
                    email = ?,
                    data_nascimento = ?,
                    curso = ?,
                    situacao = ?,
                    observacoes = ?
                WHERE id = ?";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $matricula,
            $nome,
            $email,
            $data_nascimento,
            $curso,
            $situacao,
            $observacoes,
            $id 
        ]);
        
        header('Location: admin.php?msg=atualizado');
        exit;
        
    } catch (PDOException $e) {
        header("Location: editar.php?id=$id&erro=banco");
        exit;
    }
}

header('Location: admin.php');
exit;
?>
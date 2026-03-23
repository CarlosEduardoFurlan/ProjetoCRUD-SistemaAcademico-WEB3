<?php
<<<<<<< HEAD
require_once 'config/database.php';

=======
require_once '../config/database.php';
>>>>>>> 3f152da (Implementacao de relatorio)
if (isset($_GET['id'])) {
    
    $id = (int) $_GET['id'];
    
    try {
        $sql = "DELETE FROM alunos WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        
        header('Location: admin.php?msg=excluido');
        exit;
        
    } catch (PDOException $e) {
        header('Location: admin.php?erro=exclusao');
        exit;
    }
}

header('Location: admin.php');
exit;
?>
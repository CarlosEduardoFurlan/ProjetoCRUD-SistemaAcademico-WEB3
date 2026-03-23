<?php

$host = 'localhost';      
$port = '5432';         
$dbname = 'sistema_academico';  
$user = 'postgres';       
<<<<<<< HEAD
$password = '2005';  
=======
$password = 'furlan';  
>>>>>>> 3f152da (Implementacao de relatorio)

try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    
    $pdo = new PDO($dsn, $user, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    die("Erro na conexao com o banco: " . $e->getMessage());
}
?>
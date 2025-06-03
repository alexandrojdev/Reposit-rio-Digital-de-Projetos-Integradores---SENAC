<?php
$host = 'localhost';
$port = '8889'; // Porta padrão do MySQL no MAMP
$db = 'historico_pi';
$user = 'root';
$pass = 'root'; // Senha padrão do MySQL no MAMP

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>

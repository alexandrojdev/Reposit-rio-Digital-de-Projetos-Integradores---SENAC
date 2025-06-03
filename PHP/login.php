<?php
session_start();
require_once 'conectar.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'] ?? '';
    $senha = $_POST['password'] ?? '';

    if (empty($username) || empty($senha)) {
        echo "Preencha todos os campos.";
        exit;
    }

    try {
        // Verifica se é CPF (só números) ou e-mail
        if (strpos($username, '@') !== false) {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ?");
        } else {
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE cpf = ?");
        }

        $stmt->execute([$username]);
        $usuario = $stmt->fetch();

        if ($usuario && $senha === $usuario['senha']) {
            $_SESSION['usuario'] = $usuario['nome'];
            echo "login_sucesso";
        } else {
            echo "E-mail/CPF ou senha inválidos.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
} else {
    echo "Requisição inválida.";
}

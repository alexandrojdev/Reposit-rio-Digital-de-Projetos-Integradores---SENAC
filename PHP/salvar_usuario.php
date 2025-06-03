<?php
// Inclui a conexão com o banco de dados
require_once 'conectar.php';

// Verifica se os dados foram enviados corretamente
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtém os dados do formulário
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $cpf = $_POST['cpf'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Validações básicas (opcional)
    if (empty($nome) || empty($email) || empty($cpf) || empty($senha)) {
        echo "Erro: Todos os campos são obrigatórios.";
        exit;
    }

    try {
        // Prepara e executa o INSERT
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, cpf, senha) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $cpf, $senha]);

        echo "Cadastro realizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro ao inserir no banco: " . $e->getMessage();
    }
} else {
    echo "Requisição inválida.";
}
?>

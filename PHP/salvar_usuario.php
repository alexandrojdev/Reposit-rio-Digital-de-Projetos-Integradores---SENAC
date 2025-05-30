<?php
include 'conexao.php';

// Recebe os dados enviados via fetch (JSON)
$dados = json_decode(file_get_contents("php://input"), true);

$nome = $dados['nome'];
$email = $dados['email'];
$cpf = $dados['cpf'];
$senha = password_hash($dados['senha'], PASSWORD_DEFAULT); // senha criptografada

$sql = "INSERT INTO usuarios (nome, email, cpf, senha) VALUES (?, ?, ?, ?)";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("ssss", $nome, $email, $cpf, $senha);

if ($stmt->execute()) {
    echo json_encode(["status" => "ok", "mensagem" => "Cadastro realizado com sucesso."]);
} else {
    echo json_encode(["status" => "erro", "mensagem" => "Erro ao cadastrar: " . $stmt->error]);
}

$conexao->close();
?>

<?php
// Define as variáveis com os dados de conexão com o banco de dados
$host = "localhost";      // Endereço do servidor do banco de dados (geralmente "localhost" para desenvolvimento local)
$usuario = "root";        // Nome de usuário do banco de dados (padrão do XAMPP é "root")
$senha = "";              // Senha do usuário (em muitos casos, como no XAMPP, é deixada em branco)
$banco = "historico_pi";  // Nome do banco de dados que será utilizado

// Cria a conexão com o banco de dados usando a classe mysqli
$conn = new mysqli($host, $user, $pass, $db);

// Verifica se houve erro na conexão
if ($conexao->connect_error) {
    // Se houver erro, o script é encerrado e a mensagem de erro é exibida
    die("Erro na conexão: " . $conexao->connect_error);
}
?>
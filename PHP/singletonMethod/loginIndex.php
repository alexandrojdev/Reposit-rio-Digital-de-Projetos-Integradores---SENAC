<?php
require_once 'LoginManager.php';

// Pega a única instância do LoginManager
$login = LoginManager::getInstance();

// Teste de login (pode trocar por dados do formulário depois)
$usuario = "joao";
$senha = "1234";

if ($login->validar($usuario, $senha)) {
    print "Login OK! Bem-vindo, $usuario.";
} else {
    print 'Login inválido.';
}
?>

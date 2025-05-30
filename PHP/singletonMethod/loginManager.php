<?php
class LoginManager {
    // Armazena a única instância
    private static $instancia = null;

    // Usuários cadastrados (simples, sem banco de dados ainda)
    private $usuarios = [];

    // Construtor privado para ninguém poder dar new LoginManager
    private function __construct() {
        $this->usuarios = [
            "joao" => "1234",
            "maria" => "abcd",
            "admin" => "admin"
        ];
    }

    // Pega a instância (se não existir, cria)
    public static function getInstance() {
        if (self::$instancia == null) {
            self::$instancia = new LoginManager();
        }
        return self::$instancia;
    }

    // Função para validar o login
    public function validar($usuario, $senha) {
        if (isset($this->usuarios[$usuario]) && $this->usuarios[$usuario] === $senha) {
            return true;
        }
        return false;
    }
}
?>
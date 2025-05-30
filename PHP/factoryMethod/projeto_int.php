<?php

class Projeto {
    private $titulo;
    private $descricao;

    public function __construct($titulo, $descricao) {
        $this->titulo = $titulo;
        $this->descricao = $descricao;
    }

    public function exibir() {
        print $this->titulo;
        print $this->descricao;
    }
}

?>
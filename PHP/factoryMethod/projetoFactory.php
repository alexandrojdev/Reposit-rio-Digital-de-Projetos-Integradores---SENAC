<?php

class ProjetoFactory {

    //maquina
    public static function criarProjeto($titulo, $descricao) {
        return new Projeto($titulo, $descricao);
    }
}

?>

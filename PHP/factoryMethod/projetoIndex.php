<?php

require_once 'Projeto.php';
require_once 'ProjetoFactory.php';

// Criar alguns projetos
// ligar a maquina na fabrica
$projeto1 = ProjetoFactory::criarProjeto("Site de Receitas", "Um site para armazenar receitas culinárias.");
$projeto2 = ProjetoFactory::criarProjeto("App de Tarefas", "Aplicativo simples para gerenciar tarefas diárias.");

// Exibir os projetos
print'Repositório de Projetos';
$projeto1->exibir();
$projeto2->exibir();

?>
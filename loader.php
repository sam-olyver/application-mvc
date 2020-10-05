<?php
// Evita que usuários acesse este arquivo diretamente
if ( ! defined('ABSPATH')) exit;
 
// Inicia a sessão
session_start();

// Verifica o modo para debugar
if ( ! defined('DEBUG') || DEBUG === false ) {
	// Esconde todos os erros
	error_reporting(0);
	ini_set("display_errors", 0); 
} else {
	// Mostra todos os erros
	error_reporting(E_ALL);
	ini_set("display_errors", 1); 
	ini_set('xdebug.var_display_max_depth', '10');
	ini_set('xdebug.var_display_max_children', '256');
	ini_set('xdebug.var_display_max_data', '1024');
}

// Funções globais
require_once ABSPATH . '/functions/global-functions.php';
// registra a função de autoload
spl_autoload_register('My_autoload');

// Carrega a aplicação
$AppMVC = new AppMVC();


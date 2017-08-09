<?php
/**
 * Configuração geral
 */
 
// Caminho para a raiz
define( 'ABSPATH', dirname( __FILE__ ) );
 
// Caminho para a pasta de uploads
define( 'UP_ABSPATH', ABSPATH . '/assets/_midia/_uploads' );
 
define( 'HOME_URI',  '/github/application-mvc' );
 	
// Nome do host da base de dados
 
// Se você estiver desenvolvendo, modifique o valor para true
define( 'DEBUG', true );
 
/**
 * Não edite daqui em diante
 */
 
// Carrega o loader, que vai carregar a aplicação inteira
require_once ABSPATH . '/models/features_system/loader.php';
?>
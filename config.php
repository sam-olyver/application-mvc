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

define( 'DB_HOSTNAME', 'localhost' );
 
// Nome do DB
define( 'DB_DATABASE', 'app_mvc' );
 
// Usuário do DB
define( 'DB_USERNAME', 'root' );
 
// Senha do DB
define( 'DB_PASSWORD', '' );
 
// Charset da conexão PDO
define( 'DB_CHARSET', 'utf8' );
 
// Se você estiver desenvolvendo, modifique o valor para true
define( 'DEBUG', true );
 
/**
 * Não edite daqui em diante
 */
 
// Carrega o loader, que vai carregar a aplicação inteira
require_once ABSPATH . '/loader.php';
?>
<?php
/**
 * Configuração geral
 */
 
// Caminho para a raiz
define( 'ABSPATH', dirname( __FILE__ ) );
 
// Caminho para a pasta de uploads
define( 'UP_ABSPATH', ABSPATH . '/assets/_midia/_uploads' );
 
// URL da home - http://127.0.0.1/Cursos/crud
define( 'HOME_URI', 'http://localhost/github/application/views/welcome-app.php' );
 

/*
	Servidor: Local Databases (127.0.0.1 via TCP/IP)
	Tipo de servidor: MySQL
	Versão do servidor: 5.7.14 - MySQL Community Server (GPL)
	Versão do protocolo: 10
	Utilizador: root@localhost
	Conjunto de caracteres do servidor: UTF-8 Unicode (utf8)

	##########################################################
	Apache/2.4.23 (Win64) PHP/5.6.25 (PHP/7.0.10 DISPONIVEL)
	Versão do cliente de base de dados: libmysql - mysqlnd 5.0.11-dev - 20120503 - $Id: 76b08b24596e12d4553bd41fc93cccd5bac2fe7a $
	Extensão de PHP: mysqliDocumentação curlDocumentação mbstringDocumentação
	versão do PHP: 5.6.25
	*/
	
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
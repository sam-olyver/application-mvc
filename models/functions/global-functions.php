<?php
/**
 * Verifica chaves de arrays
 *
 * Verifica se a chave existe no array e se ela tem algum valor.
 * Obs.: Essa função está no escopo global, pois, vamos precisar muito da mesma.
 *
 * @param array  $array O array
 * @param string $key   A chave do array
 * @return string|null  O valor da chave do array ou nulo
 */
function chk_array ( $array, $key ) {
	// Verifica se a chave existe no array
	if ( isset( $array[ $key ] ) && ! empty( $array[ $key ] ) ) {
		// Retorna o valor da chave
		return $array[ $key ];
	}
	
	// Retorna nulo por padrão
	return null;
} // chk_array

/**
 * Função para carregar automaticamente todas as classes padrão
 * Ver: http://php.net/manual/pt_BR/function.autoload.php.
 * Nossas classes estão na pasta classes/.
 * Por exemplo: para a classe AppMvc, o arquivo vai chamar AppMvc.class.php.
 * Por hora deixaremos AppMvc.php.
 */
function __autoload($class_name) {

	
	//$file = ABSPATH . '/models/classes/' . $class_name . '.php';
	/**
	 * monta o caminho até o diretorio e a extensao do arquivo
	 * str_replace — Substitui todas as ocorrências da string de procura com a string de substituição. 
	 * Adiciona barras para servidores windows ou linux, nao testado ainda...
	 */
	$file = str_replace('\\', '/', ABSPATH . '/models/classes/' . $class_name);

	//extensao do arquivo
	$class_extension = '.php';
	
	//verifica se a extensao existe, senao troca pela segunda extensao
	if( ! file_exists( $file . $class_extension) )
	{
		$class_bollean = false;
	}
	else
	{	
		$class_bollean = true;	
	}

	$class_extension = ($class_bollean) ? '.php' : '.class.php';

	$file .=  $class_extension;

	if ( ! file_exists( $file ) ) 
	{
		require_once ABSPATH . '/includes/404.php';
		return;
	}
	
	// Inclui o arquivo da classe
    require_once $file;
} // __autoload


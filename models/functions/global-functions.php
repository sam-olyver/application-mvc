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
 * O nome do arquivo deverá ser class-NomeDaClasse.php.
 * Por exemplo: para a classe TutsupMVC, o arquivo vai chamar class-TutsupMVC.php
 */
function __autoload($class_name) {
	$file = ABSPATH . '/models/classes/' . $class_name . '.php';
	if ( ! file_exists( $file ) ) {
		require_once ABSPATH . '/includes/404.php';
		return;
	}
	
	// Inclui o arquivo da classe
    require_once $file;
} // __autoload

// function CallBackAutoLoad()
// {
// set autoload - option 1
// spl_autoload_register(function ($class) {
//     require_once(str_replace('\\', '/', $class . '.php'));
// });

//set autoload - option 2
// set_include_path( './classes/' . PATH_SEPARATOR . get_include_path() );
// spl_autoload_extensions( '.php , .class.php' );
// spl_autoload_register();
// function linux_namespaces_autoload ( $class_name )
//     {
//         /* use if you need to lowercase first char *
//         $class_name  =  implode( DIRECTORY_SEPARATOR , array_map( 'lcfirst' , explode( '\\' , $class_name ) ) );/* else just use the following : */
//         $class_name  =  implode( DIRECTORY_SEPARATOR , explode( '\\' , $class_name ) );
//         static $extensions  =  array();
//         if ( empty($extensions ) )
//             {
//                 $extensions  =  array_map( 'trim' , explode( ',' , spl_autoload_extensions() ) );
//             }
//         static $include_paths  =  array();
//         if ( empty( $include_paths ) )
//             {
//                 $include_paths  =  explode( PATH_SEPARATOR , get_include_path() );
//             }
//         foreach ( $include_paths as $path )
//             {
//                 $path .=  ( DIRECTORY_SEPARATOR !== $path[ strlen( $path ) - 1 ] ) ? DIRECTORY_SEPARATOR : '';
//                 foreach ( $extensions as $extension )
//                     {
//                         $file  =  $path . $class_name . $extension;
//                         if ( file_exists( $file ) && is_readable( $file ) )
//                             {
//                                 require $file;
//                                 return;
//                             }
//                     }
//             }
//         throw new Exception( _( 'class ' . $class_name . ' could not be found.' ) );
//     }
// spl_autoload_register( 'linux_namespaces_autoload' , TRUE , FALSE );
// }
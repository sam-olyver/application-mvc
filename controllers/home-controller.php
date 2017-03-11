<?php
/**
 * home - Controller de exemplo
 *
 * @package AppMvc
 * @since 0.1
 */

require_once ABSPATH . '/../models/classes/MainController.php';

class HomeController extends MainController
{

	/**
	 * Carrega a página "/views/home/index.php"
	 */
    public function index() {
		// Título da página
		$this->title = 'Home';

		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
	
		// Essa página não precisa de modelo (model)
		
		/** Carrega os arquivos do view **/
		
		// /views/_includes/header.php
        require ABSPATH . '/../views/_includes/_head.php';
		
		
		// /views/home/home-view.php
        require ABSPATH . '/../views/home/home-view.php';
		
		// /views/_includes/footer.php
        require ABSPATH . '/../views/_includes/_footer.php';
		
    } // index
	
	//retorna o atributos title
    public function getTitle()
	{
		return $this->title;
	}
	
} // class HomeController
<?php
class ExemploController extends MainController
{
	// URL: dominio.com/exemplo/
	public function index() 
	{
	
		// Carrega o modelo
		$modelo = $this->load_model('exemplo/exemplo-model');

		$this->title = 'exemplo';

		// Parametros da função
		$parametros = ( func_num_args() >= 1 ) ? func_get_arg(0) : array();
		
		// Carrega o view
		require_once ABSPATH . '/views/exemplo/exemplo-view.php';
	}
	
	// URL: dominio.com/exemplo/outra-acao
	public function OutraAcao() {
		// Inclua seus models e views aqui
	}
}
<?php

use \ControllersLib\Controllers;
use \Views\Views;
use \Models\Pessoas;

class IndexController extends Controllers
{	
	public function produtoAction()
	{		
		$pessoas = new Pessoas();		
		$this->view->pessoas = $pessoas->getPessoas();
		$this->view->show();
	}
	
	public function indexAction()
	{	
		$resultado = array(1,2,3,4,5);

		$this->view->eventos = $resultado;
		//$this->view->setView("index/produto");
		$this->view->show();		
	}
	
	public function popularAction()
	{
		$pessoas = new Pessoas();
		$pessoas->populaPessoas();
	}
	
	public function contatoAction()
	{
		var_dump($_POST);
		$this->view->show();
	}
}
<?php

use \ControllersLib\Controllers;

class AdminIndexController extends Controllers
{		
	public function indexAction()
	{	
		$this->view->setTemplate('template3');
		$resultado = array(1,2,3,4,5);

		$this->view->eventos = $resultado;
		//$this->view->setView("index/produto");
		$this->view->show();		
	}	
}
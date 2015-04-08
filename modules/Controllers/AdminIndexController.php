<?php

use \ControllersLib\Controllers;

class AdminIndexController extends Controllers
{
	public function indexAction()
	{
		$this->view->setTemplate('template3');
		$resultado = array(1,2,3,4,5);

		$this->view->eventos = $resultado;
        Analog::handler('logs/logs.log');
        Analog::log ('Log this error');
        Analog::log ('Take me to your browser');

		//$this->view->setView("index/produto");
		$this->view->show();
	}
}
<?php

namespace ControllersLib;

use Views\Views;

class Controllers
{
	protected $view;
	
	public function __construct()
	{		
		$bt = debug_backtrace();

    	$controller = $bt[1]['object']->controller;
    	$action 	= $bt[1]['object']->action;
    	    	
    	$controller = explode("Controller", $controller);    	
    	$controller = strtolower($controller[0]);    	  	
        	
    	$action = explode("Action", $action);
    	$action = strtolower($action[0]);
    	$view = $controller . "/" . $action;
		
		$this->view = new Views($view);
	}	
}
<?php

namespace Routes;

use \Exception\ExceptionFramtc;
use \Routes\FindRoutes;

class Routes
{
	public $controller;  
    public $action;   
    
    public function __construct(){}
        
    public function getRoutes()
    {
    	return FindRoutes::getInstancia()->getRoutes();
    }
    
    private function loadRoute()
    {
        $url='';
		    
        list($url) = explode('?',$_SERVER['REQUEST_URI']);
        $basepath = dirname($_SERVER['SCRIPT_NAME']);
        $basepath = ($basepath==='/')? $basepath: $basepath.'/';	       
        $url = substr($url,strlen($basepath));
	    		
	    if ($url == false) {
	    	$url = '/';
	    }

	    $routes = $this->getRoutes();
	   	    
	    if (!isset($routes[$url])) {
	    	 throw new ExceptionFramtc("Url não encontrada!");
	    }
	    
	   	$route = $routes[$url];	   
	    
	    $this->controller 	= $route['controller'];
	    $this->action 		= $route['action'];
    }
  
    public function dispatch()
    {		
        $this->loadRoute();
                
        if ($this->controller == 'static' OR $this->action == 'static') {
        	return;
        }
        
        $controllerFile = 'modules/Controllers/'.$this->controller.'.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
        } else {
            throw new ExceptionFramtc('Arquivo '.$controllerFile.' nao encontrado');
        }
        
        $class = $this->controller;        
        if (class_exists($class)) {
            $objectClass = new $class;
        } else {
            throw new ExceptionFramtc("Classe '$class' nao existe no arquivo '$controllerFile'");
        }
        
        $method = $this->action;              
        if (method_exists($objectClass,$method)) {
            $objectClass->$method();
        } else {
            throw new ExceptionFramtc("Metodo '$method' nao existe na classe $class'");
        }
    }
    
    public static function url($uri = 'index/index')
    {
    	return __SITE__ . $uri;
    }

    public static function redirect($uri = null)
    {
    	if (!is_null($uri)) {
    		header("Location: $uri");
    	}        
    }
}
<?php

namespace Routes;

use \Exception\ExceptionL;
use \Session\Session;

class Routes
{
	public $controller;  
    public $action;
    private $_htaccess = TRUE;	
    private $routes = null;
    
    public function __construct(){}
    
    public static function setRoutes($params = array())
    {    	
   		Session::set('routes', $params);
    }
    
    public function getRoutes()
    {
    	return Session::get('routes');
    }
    
    private function loadRoute()
    {
    	//global $routes;
    	//$this->controller 	= ucfirst(isset($_REQUEST['controller']) ?  $_REQUEST['controller'] : 'Index');
        //$this->action 		= isset($_REQUEST['action']) ?  $_REQUEST['action'] : 'index';
        
        $url='';

	    //nombre del directorio actual del script ejecutandose.
	    //basename(dirname($_SERVER['SCRIPT_FILENAME']));
	
	    if ($this->_htaccess !== FALSE) {
	        //no está funcionando bien si está en un subdirectorio web, por ej stynat.dyndns.org/subdir/
	        // muestra el "subdir" como primer parámetro
	        list($url) = explode('?',$_SERVER['REQUEST_URI']);
	        $basepath = dirname($_SERVER['SCRIPT_NAME']);
	        $basepath = ($basepath==='/')? $basepath: $basepath.'/';	       
	        $url = substr($url,strlen($basepath));
	    } else {
	        if (isset($_SERVER['PATH_INFO'])) {
	            $url = $_SERVER['PATH_INFO'];
	            $url = preg_replace('|^/|','',$url);
	        }
	    }
		
	    if ($url == false) {
	    	$url = '/';
	    }

	    $routes = $this->getRoutes();
	    
	    if (!isset($routes[$url])) {
	    	 throw new ExceptionL("Url não encontrada!");
	    }
	    
	   	$route = $routes[$url];
	   
	    //$url = explode('/',$url);	   		    
	    //$this->controller 	= (isset($url[0]) AND !empty($url[0])) ? ucfirst($url[0]) : 'Index';
	    //$this->action 		= (isset($url[1]) AND !empty($url[1])) ? $url[1] : 'index';
	    
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
            throw new ExceptionL('Arquivo '.$controllerFile.' nao encontrado');
        }
        
        $class = $this->controller;        
        if (class_exists($class)) {
            $objectClass = new $class;
        } else {
            throw new ExceptionL("Classe '$class' nao existe no arquivo '$controllerFile'");
        }
        
        $method = $this->action;              
        if (method_exists($objectClass,$method)) {
            $objectClass->$method();
        } else {
            throw new ExceptionL("Metodo '$method' nao existe na classe $class'");
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
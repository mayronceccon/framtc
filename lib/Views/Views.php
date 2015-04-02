<?php

namespace Views;

use \Urls\Urls;
use \Routes\Routes;
use \Exception\ExceptionL;

class Views
{   
    private $contents;
    private $view;
    private $params;
    private $template = "template";
    private $class = null;
    private $function = null;
   
    public function __construct($view = null, $params = null)
    {
    	if (is_null($view)) {    		
    		$files 		= debug_backtrace();    		
    		$function 	= $files[1]['function'];
    		$class 		= $files[1]['class'];    		 
    		$view = $this->trataView($class, $function);
    	}    	
    	
        $this->setView($view);
                   
        $this->params = $params;
    }
    
    public function trataView($class = null, $function = null)
    {   
    	$class = explode("Controller", $class);    	
    	$class = strtolower($class[0]);    	  	
    	$this->class = $class;
    	
    	$function = explode("Action", $function);
    	$function = strtolower($function[0]);
    	$this->function = $function;
    	
    	return $class . "/" . $function;
    }    
    
    public function setView($view)
    {   
    	$view = "modules/views/" . $view . ".phtml";    		
        if (file_exists($view)) {
            $this->view = $view;
        } else {
            //throw new ExceptionL("View File '$view' don't exists");
        	throw new ExceptionL("Endereço não encontrado!");
        }
    }

    public function getView()
    {
        return $this->view;
    }

    public function setParams(Array $params)
    {
        $this->params = $params; 
    }

    public function getParams()
    {
        return $this->params;
    }

    private function getContents()
    {
        ob_start();
        if (isset($this->view)) {
            if (file_exists("modules/templates/" . $this->getTemplate() . ".php")) {
                include("modules/templates/" . $this->getTemplate() . ".php");
            } else {
                require_once $this->view;
            }
        }

        $this->contents = ob_get_contents();
        ob_end_clean();
        return $this->contents;   
    }
    
    public function show()
    {
        echo $this->getContents();        
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function __set($key, $value)
    {
        $this->setParams(array($key => $value));
    }

    public function __get($key)
    {
        $params = $this->getParams();

        return $params[$key];
    }
    
	public function asset($path = '/')
	{
		return Urls::asset($path);
	}
	
	public function assetJs($files = array())
	{		
		Urls::assetJs($files);
	}
	
	public function assetCss($files = array())
	{		
		Urls::assetCss($files);
	}
	
	public function url($uri = 'index/index')
	{
		return Routes::url($uri);
	}	
}
?>
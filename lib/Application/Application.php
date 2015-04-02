<?php

namespace Application;

use \Exception\ExceptionL;
use \Routes\Routes;

class Application
{
    public function init()
    {    	
    	$routes = new Routes();
    	$routes->dispatch();
    }
}
?>
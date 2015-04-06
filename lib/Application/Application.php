<?php

namespace Application;

use \Routes\Routes;

class Application
{
    public static function init()
    {    	
    	$routes = new Routes();
    	$routes->dispatch();
    }
}
?>
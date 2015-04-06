<?php

namespace Routes;

class FindRoutes
{
	private static $_instancia = null;
	
	private function __construct(){}
	
	public static function getInstancia()
	{
		if (is_null(self::$_instancia)) {			
			self::$_instancia = new FindRoutes();
		}
		
		return self::$_instancia;
	}
	
	public function getRoutes()
	{
		include 'config/routes.php';
		return $routes;
	}
}
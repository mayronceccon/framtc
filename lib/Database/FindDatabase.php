<?php

namespace Database;

class FindDatabase
{
	private static $_instancia = null;
	
	private function __construct(){}
	
	public static function getInstancia()
	{
		if (is_null(self::$_instancia)) {			
			self::$_instancia = new FindDatabase();
		}		
		return self::$_instancia;
	}
	
	public function getDatabase()
	{
		include 'config/' . APPLICATION_ENV . '/database.php';
		return $database;
	}
}
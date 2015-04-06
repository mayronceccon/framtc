<?php

namespace Database;

use \PDO;

class Connection{
	
	public static $instance;
	
	private function __construct(){}
	
	public static function getInstance()
	{	
		try{
			if (!isset(self::$instance)) {
				
				$database = FindDatabase::getInstancia()->getDatabase();				
								
				$user 		= $database['user'];
				$password 	= $database['password'];
				$dbname 	= $database['dbname'];
				$host 		= $database['host'];
				$type 		= $database['type'];
				
				switch ($type) {				
					case 'pgsql':
						self::$instance = new PDO("pgsql:host={$host};dbname={$dbname};", $user, $password);
						break;
					case 'mysql':
						self::$instance = new PDO("mysql:host={$host};port=3306;dbname={$dbname}", $user, $password);
						break;
				}
				
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
				self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING); 
			}
			return self::$instance;
		} catch(PDOException $e) {		
			echo "Erro: " . $e->getMessage();
			die();
		}		
	}
}
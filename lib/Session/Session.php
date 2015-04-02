<?php

namespace Session;

use \Encryption\Encrypter;

class Session
{	
	public function __construct(){}
	
	public static function set($name = null, $value = null)
	{
		if (!is_null($name) AND !is_null($value)) {
			$_SESSION[$name] = Encrypter::encrypt($value);
		}		
	}
	
	public static function get($name = null)
	{
		if (!is_null($name)) {
			if (isset($_SESSION[$name])) {
				return  Encrypter::decrypt($_SESSION[$name]);
			}
		}
	}
}
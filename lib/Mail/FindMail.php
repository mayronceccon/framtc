<?php

namespace Mail;

class FindMail
{
	private static $_instancia = null;
	
	private function __construct(){}
	
	public static function getInstancia()
	{
		if (is_null(self::$_instancia)) {			
			self::$_instancia = new FindMail();
		}		
		return self::$_instancia;
	}
	
	public function getMail()
	{
		include 'config/' . APPLICATION_ENV . '/mail.php';
		return $mail;
	}
}
<?php

namespace Exception;

use \Exception;

class ExceptionL extends Exception
{	
	public function __construct($message)
	{		
		parent::__construct($message,0);
	}
	
	public function __toString()
	{		
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}
	
	public function customFunction() 
	{		
		echo "Uma função personalizada para esse tipo de exceção\n";
	}
}
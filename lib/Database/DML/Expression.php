<?php

namespace Library\Database\DML;

abstract class Expression{
	
	const AND_OPERATOR = 'AND ';
	const OR_OPERATOR = 'OR ';
	
	abstract public function dump();
}
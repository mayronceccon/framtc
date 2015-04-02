<?php

namespace Library\Database\DML;

class Criteria extends Expression{
	
	private $expressions;
	private $operators;
	private $properties;
	
	public function add(Expression $expression, $operator = self::AND_OPERATOR){
		
		if(empty($this->expressions)){
			$operator = null;
		}
		
		$this->expressions[] 	= $expression;
		$this->operators[]		= $operator;
	}
	
	public function dump(){
		
		$result = "";
		if(is_array($this->expressions)){
			
			foreach ($this->expressions as $i => $expression){
				
				$operator = $this->operators[$i];
				$result .= $operator . $expression->dump() . " ";
			}
			
			$result = trim($result);
			
			return "({$result})";
		}
	}
	
	public function setProperty($property, $value){
		
		$this->properties[$property] = $value;
	}
	
	public function getProperty($property){
		
		if(isset($this->properties[$property])){
			
			return $this->properties[$property];
		}		
	}
}
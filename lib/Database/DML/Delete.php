<?php

namespace Library\Database\DML;

final class Delete extends Operations{
	
	public function getInstruction(){
		
		$this->sql = "DELETE FROM {$this->getEntity()}";
		
		if($this->_criteria){
			
			$expression = $this->_criteria->dump();
			
			if($expression){
				$this->sql .= " WHERE " . $expression;
			}
		}
		
		return $this->sql;
	}	
}
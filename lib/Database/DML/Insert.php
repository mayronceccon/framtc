<?php

namespace Library\Database\DML;

final class Insert extends Operations{
	
	public function setCriteria(Criteria $criteria){
		
		throw new Exception("Cannot call setCriteria from " . __CLASS__);
	}
	
	public function getInstruction(){
		
		$colums = implode(",", array_keys($this->getColumnValues()));
		$values = implode(",", array_values($this->getColumnValues()));
		
		$this->sql = "INSERT INTO {$this->_table} (";
		$this->sql .= $colums . ")";
		$this->sql .= " VALUES ({$values})";
		
		return $this->sql;
	}
}

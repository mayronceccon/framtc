<?php

namespace Library\Database\DML;

final class Select extends Operations{
	
	private $__columns;
	
	public function addColumn($column){
	
		$this->__columns[] = $column;
	}
	
	public function getInstruction(){
		
		if(empty($this->__columns)){
			$this->__columns = array("*");
		}
		
		$this->_sql = "SELECT ";
		$this->_sql .= implode(", ", $this->__columns);
		$this->_sql .= " FROM " . $this->_table;
		
		if($this->getJoin()){
			
			foreach ($this->getJoin() as $join){
					
				$this->_sql .= $join;
			}
		}		
		
		if($this->_criteria){
			
			$expression = $this->_criteria->dump();
			
			if($expression){
				
				$this->_sql .= " WHERE " . $expression;
			}
			
			$order 	= $this->_criteria->getProperty("order");
			$limit 	= $this->_criteria->getProperty("limit");
			$offset = $this->_criteria->getProperty("offset");
			
			if($order){
				
				$this->_sql .= " ORDER BY " . $order;
			}
			
			if($limit){
			
				$this->_sql .= " LIMIT " . $limit;
			}
			
			if($offset){
			
				$this->_sql .= " OFFSET " . $offset;
			}
		}
		
		return $this->_sql;
	}
}
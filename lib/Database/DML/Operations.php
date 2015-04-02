<?php

namespace Library\Database\DML;

abstract class Operations{
	
	protected $_criteria;
	protected $_entity;
	protected $_table;
	protected $_sql;
	protected $_join;
	protected $_columValues;
	
	public function setCriteria(Criteria $criteria){
		
		$this->_criteria = $criteria;
	}
	
	public function getCriteria(){
		
		return $this->_criteria;
	}
	
	public function setEntity($entity){
		
		$this->_entity = $entity;
	}
	
	public function getEntity(){
		
		return $this->_entity;
	}
	
	public function setTable($table){
		
		$this->_table = $table;
	}
	
	public function getTable(){
		
		return $this->_table;
	}	
	
	public function setJoin($join){
		
		$this->_join[] = $join;
	}
	
	public function getJoin(){
		
		return $this->_join;
	}
	
	public function setColumnValues($columnValues){
		
		$this->_columValues = $columnValues;
	}
	
	public function getColumnValues(){
		
		return $this->_columValues;
	}
	
	abstract public function getInstruction();
}
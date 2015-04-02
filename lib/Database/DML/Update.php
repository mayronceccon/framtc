<?php

namespace Library\Database\DML;

final class Update extends Table{	
	
	public function getInstruction(){
		
		$this->sql = "UPDATE {$this->entity}";
		
		if($this->columValues){
			
			$set = array();
			foreach ($this->columValues as $colum => $value){
				
				$set[] = "{$colum} = {$value}";
			}
		}
		
		$this->sql .= " SET " . implode(", ", $set);
		
		if($this->criteria){
			
			$this->sql = " WHERE " . $this->criteria->dump();
		}
		
		return $this->sql;
	}
}
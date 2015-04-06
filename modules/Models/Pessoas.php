<?php

namespace Models;

use ModelsLib\Model;
use \Database\Connection;
use \PDO;

class Pessoas extends Model
{	
	public function getPessoa($id = null)
	{			
		try {
			if(!is_null($id)){
				
				$conn = Connection::getInstance();
				
				$sql = "SELECT * FROM pessoas WHERE :id"; 
				$p_sql = $conn->prepare($sql); 
				$p_sql->bindValue(":id", $id); 
				$p_sql->execute(); 
				return $p_sql->fetch(PDO::FETCH_ASSOC);
			}		
		} catch (Exception $e){
			die("Ocorreu um erro!");
		}			
	}
	
	public function getPessoas()
	{	
		try {
			$conn = Connection::getInstance();
			
			$conn->beginTransaction();
			
			$sql = "SELECT * FROM pessoas"; 
			$p_sql = $conn->prepare($sql);
			$p_sql->execute();
			$conn->rollBack();
			return $p_sql->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e){
			die("Ocorreu um erro!");
		}		
	}
	
	public function populaPessoas()
	{
		try {
			
			$conn = Connection::getInstance();
			
			$conn->beginTransaction();
			
			$cont = 100;
			while ($cont <= 1000) {
				$sql = "INSERT INTO pessoas (nome, email) VALUES (:nome, :email)";
				$p_sql = $conn->prepare($sql);
				$p_sql->bindValue(":nome", "Nome_" . $cont);
	            $p_sql->bindValue(":email", "Email_" . $cont);
	            $p_sql->execute();
				$cont++;
			}
			
			$conn->rollBack();
		} catch (Exception $e){
			die("Ocorreu um erro!");
		}		
	}
}
?>
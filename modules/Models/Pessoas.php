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
				$sql = "SELECT * FROM pessoas WHERE :id"; 
				$p_sql = Connection::getInstance()->prepare($sql); 
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
			$sql = "SELECT * FROM pessoas"; 
			$p_sql = Connection::getInstance()->prepare($sql);
			$p_sql->execute(); 
			return $p_sql->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e){
			die("Ocorreu um erro!");
		}		
	}
	
	public function populaPessoas()
	{
		try {
			die("parou");
			$cont = 1;
			while ($cont <= 100) {
				$sql = "INSERT INTO pessoas (nome, email) VALUES (:nome, :email)";
				$p_sql = Connection::getInstance()->prepare($sql);
				$p_sql->bindValue(":nome", "Nome_" + $cont);
	            $p_sql->bindValue(":email", "Email_" + $cont);
	            $p_sql->execute();
				$cont++;
			}
		} catch (Exception $e){
			die("Ocorreu um erro!");
		}		
	}
}
?>
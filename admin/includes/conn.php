<?php

Class Database{
 
	private $server = "mysql:host=localhost;dbname=tourism;port=3306";
	private $username = "root";
	private $password = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $conn;
 	
	public function open(){
 		try{
			 $this->conn = new PDO($this->server, $this->username, $this->password, $this->options);
 			return $this->conn;
 		}
 		catch (PDOException $e){
			$msg= "erreur dans +" .$e->getMessage();
			die($msg);
 		}
    }
 
	public function close(){
   		$this->conn = null;
 	}
}

$pdo = new Database();
 
?>

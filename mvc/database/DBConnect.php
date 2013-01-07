<?php


/**
* @author 		Narayan waraich
* @copyright		Nama Solutions
* @category		Core database Connection
* @return 		PDO database connection handler	
*/
class DBConnect
{
	private 	$USERNAME 	=	"golfesse";
	private 	$PASSWORD 	=	"8uZV3i6j2i";

	protected function connect()
	{
		try {
			$this->conn = new PDO('mysql:host=localhost;dbname=golfesse_db',$this->USERNAME,$this->PASSWORD);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->conn;
		} catch(Exception $e) {
			return $e->getMessage();
		}		
	}
}
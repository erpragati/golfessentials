<?php


/**
* @author 		Narayan waraich
* @copyright 	Nama Solutions
* @category 	Database Connection
*/
class DBConnect
{
	private 	$USERNAME 	=	"waraich";
	private 	$PASSWORD 	=	"8uZV3i6j2i";

	protected function connect()
	{
		try {
			$this->conn = new PDO('mysql:host=localhost;dbname=blog',$this->USERNAME,$this->PASSWORD);

			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $this->conn;
		} catch(Exception $e) {
			return false;
		}		
	}
}

/**
* @category 	Database Helper Functions
*/
class db extends DBConnect
{
	
	public function connect()
	{
		parent::connect();
	}

	function query($query, $bindings, $conn)
	{
		$stmt = $conn->prepare($query);
		$stmt->execute($bindings);
		return ($stmt->rowCount() > 0) ? $stmt : false ;
	}

	public function SelectDistinct($connection,$value='')
	{
		try {
			$result = query("
				SELECT * 
				FROM $tableName 
				ORDER BY id DESC 
				LIMIT $limit"
			);

			return ( $result->rowCount() > 0 )
				? $result
				: false;
		} catch(Exception $e) {
			return false;
		}
	}
}

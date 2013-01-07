<?php

require_once 'database/DBConnect.php';

/**
* @author 		Narayan waraich
* @copyright 	Nama Solutions
* @category 	Database Helper Functions
*/
class DBHelper extends DBConnect
{
	public 	$sql	=	"";
	public 		$status	=	"";

	public function connect()
	{
		return parent::connect();
	}

	function query($query, $conn)
	{
		$stmt = $conn->prepare($query);
		try {
			$stmt->execute();
			$this->status 	=	"executed";
			return ($stmt->rowCount() > 0) ? $stmt : false ;
		} catch(Exception $e) {
			$this->status 	=	"not executed";
			return $e->getMessage();
		}
	}

	public function Select($connection,$distinct,$columns,$table1,$table2,$where,$orderby,$limit)
	{
		$this->sql 	=	"SELECT";
		$this->sql 	.=	($distinct)	?	" DISTINCT "	:	""	;
		$this->sql	.=	implode(",", $columns) . " ";
		$this->sql 	.=	"FROM " . $table1 . " ";
		$this->sql 	.=	($table2)	?	"JOIN " . $table2 . " "	:	""	;
		$this->sql 	.=	"WHERE " . implode(" AND ", $where) . " ";
		$this->sql 	.=	($orderby)	?	"ORDER BY " . $orderby	:	""	;
		try {
			$result = $this->query($this->sql,$connection);
#			$this->status 	=	"executed and returned";
			return	($result)	?	$result	:	false 	;
		} catch(Exception $e) {
			$this->status 	=	"executed but not returned";
			return $e->getMessage();
		}
	}
}

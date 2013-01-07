<?php

require_once 'helper/DBHelper.php';

/**
* @author 		Narayan waraich
* @copyright 	Nama Solutions
* @category 	Products Model Class
*/

class products
{
	public 	$querystring		=	array(
			"Type"			=>  "",
			"Brand"         	=>  "",
			"Flex"          	=>  "",
			"Player Hand"   	=>  "",
			"Player"        	=>  "",
			"Head"          	=>  "",
			"Bounce"        	=>  "",
			"Size"          	=>  "",
			"Colour"        	=>  "",
			"Offset"        	=>  "",
			"Loft"          	=>  "",
			"Glove Hand"    	=>  "",
			"SubType"       	=>  "",
			"Shaft Material"	=>  "",
			"Bags"          	=>  "",
			"Order By"		=>	"",
			"Page"			=>	0
    );
    public 	$disabled	=	array();
    public 	$filter 	=	array();
    public 	$db 		=	false;
    public 	$conn 		=	false;
    function __construct()
	{
		$this->db 		=	new DBHelper;
		$this->conn 	=	$this->db->connect();
		foreach ($this->querystring as $key => $value) {
			if (isset($_GET[$key])) {
				$this->querystring[$key]	=	$_GET[$key];
			}
		}
	}

	public function CreateFilter()
	{
		$this->disabled 	=	func_get_args();
		$this->baselink		=	(isset($_GET['s']))	?	"products.php?s=".$_GET['s']."&"	:	"products.php?"	;
		foreach ($this->querystring as $key => $value) {
			if (!in_array($key, $this->disabled, true)) {
				$query_result	=	$this->db->Select($this->conn,true,array($key),"productmaster","subproduct",array("productmaster.ProductID = subproduct.ProductID","productmaster.Enabled = 1",$key . " IS NOT NULL"),$key,false);
				return $this->process($query_result,$key);
#				return $result->fetchAll();
			}
		}
		return $this->filter;
		#return json_encode($this->filter);
	}

	public function process($result,$key)
	{
		while ($this->row 	=	$result->fetch()) {
			$this->filter[$key][]	=	$this->row[0];
		}
	}

	public function check()
	{
		return $this->db->sql;
	}

	public function status()
	{
		return $this->db->status;
	}
}
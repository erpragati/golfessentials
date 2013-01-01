<?php
/**
* @author Narayan Waraich
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
    function __construct()
	{
		foreach ($this->querystring as $key => $value) {
			if (isset($_GET[$key])) {
				$this->querystring[$key]	=	$_GET[$key];
			}
		}
	}

	public function CreateFilter()
	{
		$this->disabled 	=	func_get_args();
		$this->baselink		=	(isset($_GET['s']))	?	"products_class?s=".$_GET['s']."&"	:	"products_class?"	;
		foreach ($this->querystring as $key => $value) {
			if (!in_array($key, $this->disabled, true)) {
				$this->namelist=mysql_query("
					SELECT DISTINCT `" . $key . "` 
					FROM productmaster JOIN subproduct 
					WHERE productmaster.ProductID = subproduct.ProductID 
					AND productmaster.Enabled='1'
					AND `" . $key . "` IS NOT NULL
					ORDER BY `" . $key . "`");
				while ($this->row=mysql_fetch_row($this->namelist)) {
					$this->filter[$key][]	=	$this->row[0];
				}
			}
		}
		return json_encode($this->filter);
	}
}
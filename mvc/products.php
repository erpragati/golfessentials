<?php
if(!isset($_SESSION)){ session_start(); }
#$filter 		=	$products->CreateFilter("Order By","Page","Offset","Shaft Material","SubType");
#    Major Bottlenecks - 143,144,146
#	Save to Drive
#	LastPass
#	Tabs Outliner
require 		'model/products.php';
$products	=	new products();
#var_dump($products->conn);
var_dump($products->check());
var_dump($products->status());
$filter 	=	$products->CreateFilter("Order By","Page","Offset","Shaft Material","SubType");
var_dump($products->check());
var_dump($products->status());
var_dump($filter);
var_dump($products->filter);

?>
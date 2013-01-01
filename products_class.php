<?php
if(!isset($_SESSION)){ session_start(); }
#include_once 'connection.php';
#include_once ('functions.php');

#require_once        'class/class.products.php';
#$products		=	new products();
#$filter 		=	$products->CreateFilter("Order By","Page","Offset","Shaft Material","SubType");
#print_r($filter);
#    Major Bottlenecks - 143,144,146
#	Save to Drive
#	LastPass
#	Tabs Outliner
require 'class/class.db.php';
$db 	=	new db;
$conn	=	$db->connect();

?>
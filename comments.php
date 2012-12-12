<?php
session_start();
include('functions.php');
include('connection.php');

	$rev=sanitizeMySQL($_POST['review']);
	$pid=sanitizeMySQL($_POST['pid']);
	$name=sanitizeMySQL($_POST['name']);

	$insert="INSERT INTO comments(`ProductID`, `Comment`, `username`) VALUES (".$pid.", '".$rev."', '".$name."')";
	$insert_query=mysql_query($insert);
	
	if($insert_query){
		$previous="product?id=".$pid;
	   		header('Location: '.$previous);
	}else{
				$previous="product?id=".$pid;
	   		header('Location: '.$previous);
	}

	
	
?>
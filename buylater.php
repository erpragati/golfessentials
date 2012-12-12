<?php
if (!isset($_SESSION)) { session_start(); }
include 'functions.php';
include 'connection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$subid = $_POST['subid'];
	$total = $_POST['total'];
	unset($_SESSION['checkout'][$subid]);
	$price = GetProductDetails($subid,'sp');
	$newtotal = $total - $price;
	echo number_format($newtotal, 0, ' ', ',');
}
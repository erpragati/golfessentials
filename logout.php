<?php
session_start();
unset($_SESSION['CustID']);
unset($_SESSION['first']);
unset($_SESSION['last']);
unset($_SESSION['login']);
unset($_SESSION['loginerror']);
unset($_SESSION['registererror']);
session_destroy();
$_SESSION=array();
header('location: index');
?>
<?php
session_start();
include ('connection.php');
include_once ('functions.php');
$email=sanitizeMySQL($_POST['email']);
$pwd=sanitizeMySQL($_POST['password']);
$_SESSION['error']="";

$find="select CustPassword, CustomerID from customer where CustEmail='$email' ";

$query=mysql_query($find);

$count=mysql_num_rows($query);
if ($count==1)
{
	$row=mysql_fetch_row($query);
	$db_pwd= $row[0];
	$full_salt=substr($db_pwd, 0, 29);
	$new_hash=crypt($pwd, $full_salt);
	if ($new_hash==$db_pwd) {
		$_SESSION['login']=TRUE;
	    $_SESSION['CustomerID']=$row[1];
		    $current=$_SESSION['current'];
		    $pos = strripos($current, "register");
		    if (isset($_SESSION['lastpage'])) {
		    	$lastpage=$_SESSION['lastpage'];
		    	unset($_SESSION['lastpage']);
		    	header('Location: '.$lastpage);
		    } elseif($pos != FALSE) {
			    header('Location: index');
		    } else{
		    	unset($_SESSION['current']);
		    	header('Location: '.$current);
		    }
		    
	} else {
		//echo "password incorrect </br>";
		$_SESSION['login']=FALSE;
		$_SESSION['loginerror']=TRUE;
		$_SESSION['error'] = "<p>Your password or email address is incorrect. Please try again or use the registration form provided below to create an account.</p>";
		header('Location: register');
	}
} else {
	//echo "incorrect emailid";
	$_SESSION['login']=FALSE;
	$_SESSION['loginerror']=TRUE;
	$_SESSION['error'] = "<p>Your password or email address is incorrect. Please try again or use the registration form provided below to create an account.</p>";
	header('Location: register');
}

?>
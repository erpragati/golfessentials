<?php
include_once 'connection.php';
include_once 'functions.php';
if(!isset($_SESSION)){session_start();}
#--------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	function DefineVariables($name){
		return (isset($_POST[$name])) ? sanitizeMySQL($_POST[$name]) : NULL ;
	}
	$payment = DefineVariables('payment');
	$bfname = DefineVariables('bfname');	$blname = DefineVariables('blname');	
	$baddr = DefineVariables('baddr');		$bcity = DefineVariables('bcity');		
	$bstate = DefineVariables('bstate');	$bmobile = DefineVariables('bmobile');	
	$bpin = DefineVariables('bpin');
	if (isset($_POST['sameaddr'])) {
	     $sfname = $bfname;	     $slname = $blname;	     $saddr = $baddr;	     
	     $scity = $bcity;	     $sstate = $bstate;	     $smobile = $bmobile;
	     $spin = $bpin;
	} else {
	     $sfname = DefineVariables('sfname');	     $slname = DefineVariables('slname');
	     $saddr = DefineVariables('saddr');	     	$scity = DefineVariables('scity');
	     $sstate = DefineVariables('sstate');	     $smobile = DefineVariables('smobile');
	     $spin = DefineVariables('spin');
	}
	if ($payment&&$bfname&&$baddr&&$blname&&$bcity&&$bstate&&$bmobile&&$bpin) {
		$customise_insert_sql = "
			UPDATE `customise` SET
			`CustBillingFirstName`='".$bfname."',
			`CustBillingLastName`='".$blname."',
			`CustBillingAddress`='".$baddr."',
			`CustBillingCity`='".$bcity."',
			`CustBillingState`='".$bstate."',
			`CustBillingPostalCode`='".$bpin."',
			`CustBillingMobile`='".$bmobile."',
			`CustShippingFirstName`='".$sfname."',
			`CustShippingLastName`='".$slname."',
			`CustShippingAddress`='".$saddr."',
			`CustShippingCity`='".$scity."',
			`CustShippingState`='".$sstate."',
			`CustShippingPostalCode`='".$spin."',
			`CustShippingMobile`='".$smobile."',
			`Payment`='".$payment."'
			WHERE `customiseorderid`=".$_SESSION['orderid'];
		if (mysql_query($customise_insert_sql)) {
			if (isset($_SESSION['mailsent'])) { unset($_SESSION['mailsent']); }
			header('Location: customiseprocessing?mail=true');
		}
	}
}
if (isset($_GET['edit'])) {
	$DeleteSQL="DELETE FROM `customise` WHERE `customiseorderid`=".$_SESSION['orderid'];
	mysql_query($DeleteSQL);
	$UpdateAI="ALTER TABLE `customise`\n"."auto_increment = ".$_SESSION['orderid'];
	mysql_query($UpdateAI);
	function rrmdir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (filetype($dir."/".$object) == "dir") rrmdir($dir."/".$object); else unlink($dir."/".$object);
				}
			}
			reset($objects);
			rmdir($dir);
		}
	}
	rrmdir($_SESSION['newpath']);
	header('Location: '.$_SESSION['pageurl']);
}
?>
<?php
include_once 'connection.php';
include_once 'functions.php';
session_start();
/*---------------------------------------------------
echo "Email ID - ".GetCustomerDetails('email');
echo "<br><br><br>";
echo "Name: <input type=\"text\" id=\"name\" required value=\"\"><input type=\"submit\" id=\"name-submit\" value=\"Grab\">";
echo "<div id=\"name-data\"></div>";
echo "<br><br><br>";
echo "<form><input type=\"text\" id=\"faaltu\" class=\"faaltu\" required></form>";
echo "<script type=\"text/javascript\" src=\"js/libs/jquery-1.8.2.min.js\"></script>";
echo "<script type=\"text/javascript\" src=\"js/script.js\"></script><br><br><br>";
-----------------------------------------------------*/
#ob_start();include 'mail/register.php';$out = ob_get_clean();echo $out;
#echo "kjewbkqjb -".GetCustomerDetails('fname')."- sldkjvbhjdkwb";
/*---------------------------------------------------*/
/*---------------------------------------------------
$subject ="blah blah - vehlia mari jao !";
echo (preg_match('/hghjfv/', $subject)) ? "matching hai ji matching :)" : "kado baar saale nu :(" ;
-----------------------------------------------------*/
/*---------------------------------------------------*/
//	echo urlencode('http://golfessentials.in/products.php?type=Drivers&page=0');
/*---------------------------------------------------*/
/*---------------------------------------------------
$findsql="SELECT email, count(*) FROM test GROUP BY email HAVING count(*) > 1";
$findquery=mysql_query($findsql);
while ($onerow=mysql_fetch_array($findquery)) {
	mysql_query("INSERT INTO temp (email, count) VALUES ('".$onerow[0]."', '".$onerow[1]."');");
}
mysql_query("DELETE test FROM test, temp WHERE test.email = temp.email;");
$putbacksql="SELECT email FROM temp;";
$putbackquery=mysql_query($putbacksql);
while ($tworow=mysql_fetch_array($putbackquery)) {
	mysql_query("INSERT INTO test (email) VALUES ('".$tworow[0]."')");
}
/*---------------------------------------------------*/
/*---------------------------------------------------
date_default_timezone_set('Asia/Calcutta');
$localtime = date("jS F Y H:i:s A");		   //	localtime	[	To be updated & displayed	]
echo "Localtime = ".$localtime."<br>";
/*---------------------------------------------------
$Total=mysql_fetch_row(mysql_query("SELECT count(*) FROM mailer WHERE 1"));
echo "Total - ".$Total[0]."<br>";
$Sent=mysql_fetch_row(mysql_query("SELECT count(*) FROM mailer WHERE status=1"));
echo "Sent - ".$Sent[0]."<br>";
$Left=mysql_fetch_row(mysql_query("SELECT count(*) FROM mailer WHERE status=0"));
echo "Left - ".$Left[0]."<br>";
#echo "-------------------------------------------------------------";
/*---------------------------------------------------
#	Get all emails, one by one
$Get=mysql_query("SELECT email, id FROM mailer");
echo "<table><th>ID</th><th>Email</th>";
while ($email=mysql_fetch_array($Get)) {
	#	Match them to the regex
	if (!preg_match('/^([A_Za-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $email[0])){
		echo "<tr><td>".$email[1]."</td><td>".$email[0]."</td></tr>";
		$DeleteSQL="DELETE FROM mailer WHERE id=".$email[1];
		mysql_query($DeleteSQL);
	}
}
/******************************************************
*	Code to change a MySQL 'timestamp' into PHP 'time()' value.
	$dbts = '2012-12-07 14:50:05';	//	MySQL timestamp
	$phpts = strtotime($dbts);	//	PHP timestamp
	echo date('j M, Y', $phpts);	//	PHP Date
/*******************************************************
*	Code to remove specific email id's from mailing list.
*	Steps:
*	1.	Save all emails with some sort of same subject or a tag into the folder 'mails/'.
*	2.	The Code lists all files in that directory.
*	3.	Then 'preg_match_all' is run on files to get all emails starting with 'To: xyz@abc.com'.
*	4.	All email id's other than 'info@golfessentials.in' are then saved to the table 'mailer' in the db.
*
	$directory="mails/";
	$dirhandler = opendir($directory);
	$nofiles=0;
	$email_list=array();
	while ($file = readdir($dirhandler)) {
		if ($file != '.' && $file != '..') {
	//		$nofiles++;
	//		$files[$nofiles]=$file;
			$mail = file_get_contents('mails/'.$file);
			$matches = array();
			#	To: xyz@abc.com	/To([ a-z0-9:._@?-]+)/
			preg_match_all('/([\w-\.]+)@((?:[\w]+\.)+)([a-zA-Z]{2,4})/', $mail, $matches);
			foreach ($matches[0] as $key) {
			#	$id = substr($key, 4);
				if (($key !== 'promotions@golfessentials.in') && (!in_array($key, $email_list))) {
					$email_list[]=$key;
					$SaveSQL="INSERT INTO `mailer`(`email`, `status`, `unsubscribed`) VALUES ('".$key."', 0, 0)";
					mysql_query($SaveSQL);
				}
			}
	    }
	}
	closedir($dirhandler);
*//*
$query=mysql_query("SELECT email FROM mailertest WHERE 1");
$hni=array();
while ($row=mysql_fetch_array($query)) {
	$hni[]=$row[0];
}

$query2=mysql_query("SELECT email FROM mailer WHERE 1");
$i=0;
while ($row2=mysql_fetch_array($query2)) {
	$i++;
	echo $i . "<br>";
	if (in_array($row[0], $hni)) {
		echo "<b>" . $i . "</b>&nbsp:&nbsp;" . $row[0];
	}
}
*/
?>
<!--
<script type="text/javascript">
	var someString = "blah blah - vehlia mari jao !";
	var response = /\sjao/.test(someString);
	alert(response);
</script>
-->
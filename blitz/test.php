<?php
if (isset($_GET['id'])) {
	$id = (int)$_GET['id'];
	include_once '../connection.php';
	$sql = "SELECT * FROM customise WHERE customiseorderid = " . $id;
	$query = mysql_query($sql);
	while ($order=mysql_fetch_array($query)) {
	$logos	=	array(
		$order[22]	=>	$order[20],
		$order[25]	=>	$order[23],
		$order[28]	=>	$order[26],
		$order[31]	=>	$order[29],
		$order[34]	=>	$order[32],
		$order[39]	=>	$order[35],
		$order[40]	=>	$order[38],
		$order[43]	=>	$order[41]
	);
		foreach ($logos as $key => $value) {
			if ($value != "0") {
				if (file_exists("../" . $order[4] . "/" . $key)) {
					echo "file exists - " . $key . "<br>";
				}
			}
		}
	}
} else {
	echo "ID Not set, please specify an Order ID in  the URL bar !";
}

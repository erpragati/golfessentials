<html>
	<head>
	</head>
	<body>
		<?php

			include '../connection.php';
			include '../functions.php';

			$pid=$_GET['id'];
			echo $pid;

			$sql="SELECT ProductName, Brand, Type, MRP, WSP, SP Video, ProductDescription, Tags FROM `productmaster` WHERE `ProductID`=$pid";
			$query=mysql_query($sql);
			echo $sql; 
		 ?>
	</body>
</html>
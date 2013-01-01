<?php
include_once '../connection.php';
include_once '../functions.php';
?>
<!doctype html>
<html>
<head>
	<title>Customise It! Orders @ golfessentials.in</title>
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			background-color: #eef5ff;
			font-family: Helvetica, verdana, tahoma, arial, sans-serif;
			color: #333;
			font-size: 14px;
		}
		table {
			background-color: #eef5ff;
			padding: 25px;
			padding-left: 50px;
		}
		tr > td {
			margin: 0;
			padding: 10px;
			background-color: #ddebff;
			border: 1px solid #eef5ff;
			text-align: left;
		}
		tr > td:first-child {
			text-align: right;
			background-color: #cce2ff;
			font-weight: bold;
		}
		tr > td:hover {
			background-color: #cce2ff;
			cursor: default;
			color: #000;
			border: 1px solid #bbd8ff;
		}
		a {
			color: #d35a2d;
			text-decoration: none;
			cursor: pointer;
			font-size: 16px;
			font-weight: bold;
		}
		a:hover {
			color: #333;
		}
	</style>
</head>
<body>
<?php
$SQL="SELECT * FROM `customise` WHERE 1";
$query=mysql_query($SQL);
$num=mysql_num_rows($query);
if ($num > 0) {
	$row=array();
	for ($i=1; $i <=$num ; $i++) {
		${'row'.$i}=mysql_fetch_row($query);
	}
	#----------------------------------
	echo "<table align=\"left\">";
	#----------------------------------
	echo "<tr><td>Order ID</td>";
		for ($i=1; $i <= $num ; $i++) { 
			echo "<td align=\"center\">" . ${'row'.$i}[0] . "</td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Product</td>";
		for ($i=1; $i <= $num ; $i++) { 
			echo "<td align=\"center\">" . ${'row'.$i}[2] . "</td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Quantity</td>";
		for ($i=1; $i <= $num ; $i++) { 
			echo "<td align=\"center\">" . ${'row'.$i}[7] . "</td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Time</td>";
		for ($i=1; $i <= $num ; $i++) { 
			echo "<td align=\"center\">" . date('j M, Y # h:i A', strtotime(${'row'.$i}[3])) . "</td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Colour1</td>";
		for ($i=1; $i <= $num ; $i++) { 
			echo "<td align=\"center\">" . ${'row'.$i}[8] . "</td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Colour2</td>";
		for ($i=1; $i <= $num ; $i++) { 
			echo "<td align=\"center\">" . ${'row'.$i}[9] . "</td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Colour3</td>";
		for ($i=1; $i <= $num ; $i++) { 
			echo "<td align=\"center\">" . ${'row'.$i}[10] . "</td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Name<br><small>Value</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[11] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[12] . "</small><br><small>" . ${'row'.$i}[13] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Flag<br><small>Value</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[14] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[15] . "</small><br><small>" . ${'row'.$i}[16] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>URL<br><small>Value</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[17] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[18] . "</small><br><small>" . ${'row'.$i}[19] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Logo 1<br><small>File</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[20] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[22] . "</small><br><small>" . ${'row'.$i}[21] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Logo 2<br><small>File</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[23] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[25] . "</small><br><small>" . ${'row'.$i}[24] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Logo 3<br><small>File</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[26] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[28] . "</small><br><small>" . ${'row'.$i}[27] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Logo 4<br><small>File</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[29] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[31] . "</small><br><small>" . ${'row'.$i}[30] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Logo 5<br><small>File</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[32] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[34] . "</small><br><small>" . ${'row'.$i}[33] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Logo 6<br><small>File</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[35] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[37] . "</small><br><small>" . ${'row'.$i}[36] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Logo 7<br><small>File</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[38] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[40] . "</small><br><small>" . ${'row'.$i}[39] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Logo 8<br><small>File</small><br><small>Position</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			if (${'row'.$i}[41] != 0) {
				echo "<td align=\"center\"><br><small>" . ${'row'.$i}[43] . "</small><br><small>" . ${'row'.$i}[42] . "</small></td>";
			} else{
				echo "<td align=\"center\">n/a</td>";
			}
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Shipping Address<br><small>Name</small><br><small>Address</small><br><small>City</small><br><small>State</small><br><small>Zip</small><br><small>Mobile</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			echo "<td><br><small>" . ${'row'.$i}[51] . " " . ${'row'.$i}[53] . "</small><br><small>" . ${'row'.$i}[52] . "</small><br><small>" . ${'row'.$i}[54] . "</small><br><small>" . ${'row'.$i}[55] . "</small><br><small>" . ${'row'.$i}[56] . "</small><br><small>" . ${'row'.$i}[57] . "</small></td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Billing Address<br><small>Name</small><br><small>Address</small><br><small>City</small><br><small>State</small><br><small>Zip</small><br><small>Mobile</small></td>";
		for ($i=1; $i <= $num ; $i++) {
			echo "<td><br><small>" . ${'row'.$i}[44] . " " . ${'row'.$i}[46] . "</small><br><small>" . ${'row'.$i}[45] . "</small><br><small>" . ${'row'.$i}[47] . "</small><br><small>" . ${'row'.$i}[48] . "</small><br><small>" . ${'row'.$i}[49] . "</small><br><small>" . ${'row'.$i}[50] . "</small></td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td>Payment Option</td>";
		for ($i=1; $i <= $num ; $i++) { 
			echo "<td align=\"center\">" . ${'row'.$i}[58] . "</td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "<tr><td></td>";
		for ($i=1; $i <= $num ; $i++) { 
			echo "<td align=\"center\"><a href=\"customise_mail.php?id=" . ${'row'.$i}[0] . "\"> Place Order</a></td>";
		}
	echo "</tr>";
	#----------------------------------
	echo "</table>";
} else {
	echo "There are no customise orders!";
}
?>
</body>
</html>
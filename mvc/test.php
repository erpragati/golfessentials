<?php
$USERNAME = "golfesse";
$PASSWORD = "8uZV3i6j2i";
$conn = new PDO('mysql:host=localhost;dbname=golfesse_db',$USERNAME,$PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$query="SELECT DISTINCT Type FROM productmaster JOIN subproduct WHERE productmaster.ProductID = subproduct.ProductID AND productmaster.Enabled = 1 AND Type IS NOT NULL ORDER BY Type";
$stmt = $conn->prepare($query);
$stmt->execute();
echo ($stmt->rowCount() > 0) ? "more than one<br>" : "none at all<br>" ;
while($row=$stmt->fetch()) {
	echo $row[0] . "<br>";
}
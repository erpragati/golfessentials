<html>
<head>
<meta name="robots" value="noindex">
</head>
<body>

<?php
include '../connection.php';

$get_products= "SELECT ProductID, ProductName,Brand, Type, MRP, WSP, SP, Enabled, Featured, latest FROM productmaster WHERE 1";
$get_products_sql=mysql_query($get_products);


?>
	<h1>ALL PRODUCTS</h1> <h2><a href="blitz_add.php" target="_blank">Add(+)</a></h2><h2><a href="blitz_order.php" target="_blank">Orders(+)</a><h2><a href="blitz_comments.php" target="_blank">Comments</a></h2>
	<table border="1">
		<tr>
			<th>Product Id</th>
			<th>Name</th>
			<th>Brand</th>
			<th>Type</th>
			<th>MRP</th>
			<th>Whole Sale Price</th>
			<th>Our Price</th>
			<th>Status</th>
			<th>Featured</th>
			<th>Latest</th>
			<th>Action1</th>
			<th>Action2</th>
			<th>Action3</th>
			<!--<th>Action4</th> -->
		</tr>
		<?php
			while ($product_array=mysql_fetch_array($get_products_sql)) {
				
			
		?>
		<tr>
			<td><?php echo $product_array[0]; ?></td>
			<td><?php echo $product_array[1]; ?></td>
			<td><?php echo $product_array[2]; ?></td>
			<td><?php echo $product_array[3]; ?></td>
			<td><?php echo $product_array[4]; ?></td>
			<td><?php echo $product_array[5]; ?></td>
			<td><?php echo $product_array[6]; ?></td>
			<td><?php if ($product_array[7]==1) {echo "Showing";} elseif($product_array[7]==0) {echo "Not-Showing";}  ?></td>
			<td><?php if ($product_array[8]==1) {echo "Featured";} elseif($product_array[8]==0) {echo "No";}  ?></td>
			<td><?php if ($product_array[9]==1) {echo "Latest";} elseif($product_array[9]==0) {echo "No";}  ?></td>
			<td><?php if ($product_array[7]==1) {echo "<a href=\"blitz_action.php?id=$product_array[0]&action=disable\">DISABLE</a>";} elseif($product_array[7]==0) {echo "<a href=\"blitz_action.php?id=$product_array[0]&action=enable\">ENABLE</a>";}  ?></td>
			<td><?php if ($product_array[8]==0) {echo "<a href=\"blitz_action.php?id=$product_array[0]&action=feature\">Make Featured</a>";} elseif($product_array[8]==1) {echo "<a href=\"blitz_action.php?id=$product_array[0]&action=rem_feature\">Remove Featured</a>";}  ?></td>
			<td><?php if ($product_array[9]==0) {echo "<a href=\"blitz_action.php?id=$product_array[0]&action=latest\">Make Latest</a>";} elseif($product_array[9]==1) {echo "<a href=\"blitz_action.php?id=$product_array[0]&action=rem_latest\">Remove Latest</a>";}  ?></td>
			<!--<td><?php echo "<a href=\"blitz_action.php?id=$product_array[0]&action=delete\">DELETE</a>"; ?></td> -->
		</tr>
		<?php
		}
		?>
	</table>
	
	
</body>
</html>
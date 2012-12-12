<html>
<head>
<meta name="robots" value="noindex">
</head>
<body>
<?php
include '../connection.php';
include '../functions.php';
	$oid=$_GET['oid'];

	$order_sql="SELECT OrderDate, OrderStatus, CustBillingFirstName, CustBillingLastName, CustBillingAddress, CustBillingCity, CustBillingState, CustBillingPostalCode, CustBillingMobile, CustShippingFirstName, CustShippingLastName, CustShippingAddress, CustShippingCity, CustShippingState, CustShippingPostalCode, CustShippingMobile, Payment  FROM `order_cash` WHERE OrderID=".$oid;
	//echo "<br>".$order_sql;
	$order_query=mysql_query($order_sql);
	$order_row=mysql_fetch_array($order_query);

	
	?>
	<h1>Order Number= <?php echo $oid; ?>, Status: <?php echo $order_row[1]; ?>,<br> Payment Option: <?php echo $order_row[16]; ?></h1>

		<form action="blitz_action.php" method="GET">

			<select name="status">
				<option selected="" value=""><?php echo $order_row[1]; ?></option>
				<option value="Received">Received</option>
				<option value="Processing">Processing</option>
				<option value="Shipped">Shipped</option>
				<option value="Deliverd">Delivered</option>
			</select>
			<input type="hidden" value="<?php echo $oid; ?>" name="oid">
			<input type="hidden" value="cash" name="payment">
			<input type="Submit" value="submit">
		</form>

	<table border="1">
		<tr><th>Billing Address</th><th>Shipping Address</th></tr>
		<tr>
			<td><?php echo $order_row[2]." ".$order_row[3]."<br>".$order_row[4]."<br>".$order_row[5]."<br>".$order_row[6].", ".$order_row[7]."<br>".$order_row[8]; ?></td>
			<td><?php echo $order_row[9]." ".$order_row[10]."<br>".$order_row[11]."<br>".$order_row[12]."<br>".$order_row[13].", ".$order_row[14]."<br>".$order_row[15]; ?></td>
		</tr>
	</table>
	<br><br><br><br>
	<?php
	$sql="SELECT SubProductID, Quantity, OrderDetailID, CourierName, CourierNumber FROM `orderdetail_cash` WHERE OrderID=".$oid;
	$query=mysql_query($sql);
	echo "<form action=\"blitz_invoice.php\" method=\"POST\">";
	echo "<h1>Order</h1>";
	echo "<table border=\"1\">";
	echo "<tr><th>Order Detail Id</th><th>Product Name</th><th>Type</th><th>Brand</th><th>Specifications</th><th>Quantity</th><th>Courier Company</th><th>Tracking Number</th></tr>";
	$i=0;
	while($row=mysql_fetch_array($query)){
		
				$i++;
				$subid=$row[0];
				$qty=$row[1];
				$orderDetailID=$row[2];
				$cname=$row[3];
				$cnum=$row[4];
				$type=GetProductDetails($subid,'type');
				$brand=GetProductDetails($subid,'brand');
				$shaft=GetProductDetails($subid,'shaft');
				$name=GetProductDetails($subid,'name');
				$loft=GetProductDetails($subid,'loft');
				$hand=GetProductDetails($subid,'hand');
				$glove=GetProductDetails($subid,'glove');
				$flex=GetProductDetails($subid,'flex');
				$player=GetProductDetails($subid,'player');
				$head=GetProductDetails($subid,'head');
				$bounce=GetProductDetails($subid,'bounce');
				$size=GetProductDetails($subid,'size');
				$length=GetProductDetails($subid,'length');
				$offset=GetProductDetails($subid,'offset');
				$color=GetProductDetails($subid,'color');
				
				
					echo "<tr>";
						echo "<td>".$orderDetailID."</td>";
						echo "<td>".$name."</td>";
						echo "<td>".$type."</td>";
						echo "<td>".$brand."</td>";
						echo "<td>";
							if($shaft!=NULL){echo "<b>Shaft: </b>".$shaft."<br>";}
							if($loft!=NULL){echo "<b>Loft: </b>".$loft."<br>";}
							if($hand!=NULL){echo "<b>Hand: </b>".$hand."<br>";}
							if($glove!=NULL){echo "<b>Glove: </b>".$glove."<br>";}
							if($flex!=NULL){echo "<b>Flex: </b>".$flex."<br>";}
							if($player!=NULL){echo "<b>Player: </b>".$player."<br>";}
							if($head!=NULL){echo "<b>Head: </b>".$head."<br>";}
							if($bounce!=NULL){echo "<b><b>Bounce: </b>".$bounce."<br>";}
							if($size!=NULL){echo "<b>Size: </b>".$size."<br>";}
							if($length!=NULL){echo "<b>Length: </b>".$length."<br>";}
							if($offset!=NULL){echo "<b>Offset: </b>".$offset."<br>";}
							if($color!=NULL){echo "<b>Color: </b>".$color."<br>";}
							echo "</td>";
						echo "<td>".$qty."</td>";
						if(isset($cname)||isset($cnum)){
						echo "<td>".$cname."</td>";
						echo "<td>".$cnum."</td>";
						}else{
							echo "<td>Not Available</td>";
							echo "<td>Not Available</td>";
						}
						echo "<td><input type=\"checkbox\" name=\"check[$i]\" /></td>";
						echo "<input type=\"hidden\" value=\"".$subid."\" name=\"subid[$i]\">";
						echo "<input type=\"hidden\" value=\"".$qty."\" name=\"qty[$i]\">";
						echo "<input type=\"hidden\" value=\"".$oid."\" name=\"oid\">";
						echo "<input type=\"hidden\" value=\"cash\" name=\"payment\">";
					echo "</tr>";
	
		}
echo "</table>";
echo "<input type=\"submit\" value=\"Create Bill\">";
echo "</form><br><br><br><br>";
	?>
	<!-- ###################################### Courier ############################### -->
	<?php
		$courier_sql="SELECT SubProductID, Quantity, OrderDetailID, CourierName, CourierNumber FROM `orderdetail_cash` WHERE OrderID=".$oid;
		$courier_query=mysql_query($courier_sql);
			echo "<h1>Delivery Details:</h1>";
			echo "<table border=\"1\">";
			echo "<tr><th>Order Detail Id</th><th>Product Name</th><th>Type</th><th>Brand</th><th>Courier Company</th><th>Tracking Number</th><th>Update Courier</th></tr>";
			$i=0;
			while($courier_row=mysql_fetch_array($courier_query)){
					$i++;
					$subid=$courier_row[0];
					$qty=$courier_row[1];
					$orderDetailID=$courier_row[2];
					$courier_name=$courier_row[3];
					$courier_num=$courier_row[4];
					$type=GetProductDetails($subid,'type');
					$brand=GetProductDetails($subid,'brand');
					$shaft=GetProductDetails($subid,'shaft');
					$name=GetProductDetails($subid,'name');
					echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"GET\">";
						echo "<tr>";

							echo "<td>".$orderDetailID."</td>";
							echo "<td>".$name."</td>";
							echo "<td>".$type."</td>";
							echo "<td>".$brand."</td>";
							if(isset($courier_name)||isset($courier_num)){
								echo "<td>".$courier_name."</td>";
								echo "<td>".$courier_num."</td>";
								echo "<td><input type=\"submit\" value=\"Update Courier\" disabled></td>";
							}else{
							echo "<td>";
							echo "<select name=\"courier_name\">";
							echo "<option selected=\"\" value=\"\"></option>";
							echo "<option value=\"DTDC\">DTDC</option>";
							echo "<option value=\"The Professional Courier\">The Professional Courier</option>";
							echo "<option value=\"DHL\">DHL</option>";
							echo "</select>";
							echo "</td>";
							echo "<td><input type=\"text\" name=\"courier_num\"></td>";
							echo "<input type=\"hidden\" value=\"".$orderDetailID."\" name=\"orderdetail_id\">";
							echo "<input type=\"hidden\" value=\"".$oid."\" name=\"oid\">";
							echo "<td><input type=\"submit\" value=\"Update Courier\"></td>";
							}

					echo "</tr>";
					echo "</form>";		
				}			
			echo "</table>";
	?>
	<?php

	if(isset($_GET['courier_name'])){
		$courier_name=$_GET['courier_name'];
		$courier_num=$_GET['courier_num'];
		$orderdetail_id=$_GET['orderdetail_id'];

		$courier_sql="UPDATE `orderdetail_cash` SET `CourierName`='$courier_name',`CourierNumber`='$courier_num' WHERE `OrderDetailID`=$orderdetail_id";
		$courier_query=mysql_query($courier_sql);
	}	

	?>
	
</body>
</html>
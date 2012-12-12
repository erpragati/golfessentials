<html>
<head>
	<meta name="robots" value="noindex">
</head>
<body>
	<?php

	include '../connection.php';

		$sql_cash="SELECT OrderID, OrderDate, OrderStatus, Invoice FROM `order_cash` WHERE 1";
		$query_cash=mysql_query($sql_cash);

		$sql_account="SELECT OrderID, OrderDate, OrderStatus, Invoice FROM `order_account` WHERE 1";
		$query_account=mysql_query($sql_account);

		

	?>	
		<h2>Cash Orders</h2>
		<table border="1">
			<tr><th>Order No.</th><th>Order Date</th><th>Status</th><th>Invoice</th></tr>
			<?php while($get_orders_cash=mysql_fetch_array($query_cash)){ ?>
			<tr><td><?php echo "<a href=\"blitz_orderprocess_cash.php?oid=".$get_orders_cash[0]."\">".$get_orders_cash[0]; ?></a></td><td><?php echo $get_orders_cash[1] ?></td><td><?php echo $get_orders_cash[2] ?></td><td><?php echo $get_orders_cash[3] ?></td></tr>
			<?php }?>
		</table>
		<br><br><br><br>
		<h2>Account Orders</h2>
		<table border="1">
			<tr><th>Order No.</th><th>Order Date</th><th>Status</th><th>Invoice</th></tr>
			<?php while($get_orders_account=mysql_fetch_array($query_account)){ ?>
			<tr><td><?php echo "<a href=\"blitz_orderprocess_account.php?oid=".$get_orders_account[0]."\">".$get_orders_account[0]; ?></a></td><td><?php echo $get_orders_account[1] ?></td><td><?php echo $get_orders_account[2] ?></td><td><?php echo $get_orders_account[3] ?></td></tr>
			<?php }?>
		</table>
</body>
</html>
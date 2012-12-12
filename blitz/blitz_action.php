<?php
include '../connection.php';

if(isset($_GET['id'])&&isset($_GET['action'])){
	$id=$_GET['id'];
	$action=$_GET['action'];


################## Disable ############
if ($action=='disable') {
	$sql="UPDATE productmaster SET Enabled=0 WHERE ProductID=$id";
	$query=mysql_query($sql);

	if ($query)
	{
		header('Location: blitz.php');
	}
}

############### Enable ##############
elseif ($action=='enable') {
	$sql="UPDATE productmaster SET Enabled=1 WHERE ProductID=$id";
	$query=mysql_query($sql);

	if ($query)
	{
		header('Location: blitz.php');
	}
}

############# Delete ################
elseif ($action=='delete') {
	$sql="DELETE FROM productmaster WHERE ProductID=$id";
	$query=mysql_query($sql);

	if ($query)
	{
		header('Location: blitz.php');
	}
}

########### Feature ####################
elseif ($action=='feature') {
	$sql="UPDATE productmaster SET Featured=1 WHERE ProductID=$id";
	$query=mysql_query($sql);

	if ($query)
	{
		header('Location: blitz.php');
	}
}

########### Remove Feature ####################
elseif ($action=='rem_feature') {
	$sql="UPDATE productmaster SET Featured=0 WHERE ProductID=$id";
	$query=mysql_query($sql);

	if ($query)
	{
		header('Location: blitz.php');
	}
}

########### Latest ####################
elseif ($action=='latest') {
	$sql="UPDATE productmaster SET latest=1 WHERE ProductID=$id";
	$query=mysql_query($sql);

	if ($query)
	{
		header('Location: blitz.php');
	}
}



########### Remove Latest ####################
elseif ($action=='rem_latest') {
	$sql="UPDATE productmaster SET latest=0 WHERE ProductID=$id";
	$query=mysql_query($sql);

	if ($query)
	{
		header('Location: blitz.php');
	}
}
}

############################### Status ####################
$oid=$_GET['oid'];
$status="'".$_GET['status']."'";
$payment=$_GET['payment'];

if($payment=='cash'){
	$status_sql="UPDATE `order_cash` SET OrderStatus=".$status." WHERE OrderID=".$oid."";
	$status_query=mysql_query($status_sql);
}
elseif($payment=='account'){
	$status_sql="UPDATE `order_account` SET OrderStatus=".$status." WHERE OrderID=".$oid."";
	$status_query=mysql_query($status_sql);
}

if($status_query){
header('Location: blitz_order.php');
}

?>
<?php

function sanitizeString($var) {
	$var = stripslashes($var);
	$var = htmlentities($var);
	$var = strip_tags($var);
	return $var;
}

function sanitizeMySQL($var) {
	$var = mysql_real_escape_string($var);
	$var = sanitizeString($var);
	return $var;
}

function GetCustomerDetails($field,$ID=NULL){
	$id = ($ID==NULL) ? $_SESSION['CustomerID'] : $ID ;
	$SQL ="SELECT CustFirstName, CustLastName, CustAddress, CustCity, CustState, "; 
	$SQL.="CustPostalCode, CustPhone, CustMobile, CustEmail, CustPassword";
	$SQL.=" FROM customer where CustomerID='".$id."'";
	$query=mysql_query($SQL);
	$row=mysql_fetch_row($query);
	$customer = array(
		'fname' => $row[0], 
		'lname' => $row[1], 
		'addr' => $row[2], 
		'city' => $row[3], 
		'state' => $row[4], 
		'pin' => $row[5], 
		'phone' => $row[6], 
		'mobile' => $row[7], 
		'email' => $row[8], 
		'pwd' => $row[9]
		);
	return $customer[$field];
}

function GetCustomerName($id){
	$SQL ="SELECT CustFirstName, CustLastName FROM customer where CustomerID='".$id."'";
	$query=mysql_query($SQL);
	$row=mysql_fetch_row($query);
	return $row[0]." ".$row[1];
}

function GetProductDetails($subid,$field){
	$SQL="SELECT * FROM productmaster JOIN subproduct WHERE productmaster.ProductID = subproduct.ProductID AND subproduct.SubProductID=".$subid;
	$query=mysql_query($SQL);
	$row=mysql_fetch_row($query);
	if (!$row) { return FALSE; } else {
		$product = array(
			'id' => $row[0], 
			'name' => $row[1], 
			'brand' => $row[2], 
			'type' => $row[3],
			'subtype' => $row[4],
			'quantity' => $row[5], 
			'availability' => $row[6], 
			'enabled' => $row[7], 
			'mrp' => $row[8], 
			'wsp' => $row[9], 
			'sp' => $row[10],
			'discount' => $row[11], 
			'image' => $row[12],
			'description' => $row[13],
			'video' => $row[14],
			'rating' => $row[15], 
			'timesrated' => $row[16], 
			'featured' => $row[17], 
			'tags' => $row[18], 
			'dealer' => $row[19],
			'views' => $row[20],
			'latest' => $row[21],
			'bags' => $row[22],
			'loft' => $row[25],
			'hand' => $row[26],
			'glove' => $row[27],
			'flex' => $row[28], 
			'shaft' => $row[29], 
			'player' => $row[30],
			'head' => $row[31], 
			'bounce' => $row[32], 
			'size' => $row[33], 
			'length' => $row[34],
			'offset' => $row[35],
			'color' => $row[36],
			'shaftmaterial' => $row[37]
			);
		return $product[$field];
	}
}

function GetCustomerOrders(){
	$ID=$_SESSION['CustomerID'];
	$ordertype = array('cash', 'account');
	foreach ($ordertype as $key) {
		$SQL = "SELECT Invoice, OrderDate, OrderStatus, OrderID, Payment FROM `order_".$key."` WHERE CustomerID=".$ID;
		$query=mysql_query($SQL);
		$num=mysql_num_rows($query);
		if($num==0){ ${$key . 'error'} = true; }
		else {
			$i=0;
			${'parent_'.$key} = array();
			while ($row=mysql_fetch_array($query)) {
				${'parent_'.$key}[$i] = array(
					'invoice' => $row[0],
					'date' => date('j M, Y',strtotime($row[1])),
					'status' => $row[2],
					'payment' => $row[4]
					);
				$DetailSQL="SELECT Quantity, SUbProductID, CourierName, CourierNumber FROM orderdetail_".$key." where CustomerID=".$ID." AND OrderID=".$row[3];
				$DetailQuery=mysql_query($DetailSQL);
				$j=0;
				${'parent_'.$key}[$i]['details'] = array();
				while ($detailsrow=mysql_fetch_array($DetailQuery)) {
					${'parent_'.$key}[$i]['details'][$j] = array(
						'qty' => $detailsrow[0],
						'prodname' => GetProductDetails($detailsrow[1],'brand')." ".GetProductDetails($detailsrow[1],'name'),
						'courier' => $detailsrow[2],
						'id' => GetProductDetails($detailsrow[1],'id'),
						'courierno' => $detailsrow[3]
						);
					$j++;
				}
				$i++;
			}
		}
	}
	if(isset($casherror) && isset($accounterror)){ return false;}
	else{
		if (isset($parent_account) && !isset($parent_cash)) {
			return $parent_account; 
		} elseif(!isset($parent_account) && isset($parent_cash)) {
			return $parent_cash; 
		} elseif(isset($parent_account) && isset($parent_cash)){
			$parent =  array_merge($parent_account, $parent_cash);
			return $parent; 
		}
	}
}

function GetProductNameByID($id){
	$SQL="SELECT Brand, ProductName FROM productmaster WHERE ProductID=".$id;
	$query=mysql_query($SQL);
	$row=mysql_fetch_row($query);
	return (!$row) ? FALSE : $row[0]." ".$row[1];
}

function GetHeaderTitle($id=NULL){
	return GetProductNameByID($id)." at golfessentials.in";
}
?>
<?php
if(isset($_POST['baddr'])){
if(!isset($_SESSION)){ session_start(); }
require("PHPMailer/class.phpmailer.php");
include ('connection.php');
include 'functions.php';
function DefineVariables($name){
     if (isset($_POST[$name])) {
          return sanitizeMySQL($_POST[$name]);
     } else {
          return NULL;
     }
}
$tin = DefineVariables('tin');$payment = DefineVariables('payment');$bfname = DefineVariables('bfname');$blname = DefineVariables('blname');$baddr = DefineVariables('baddr');$bcity = DefineVariables('bcity');$bstate = DefineVariables('bstate');$bmobile = DefineVariables('bmobile');$bpin = DefineVariables('bpin');
if (isset($_POST['sameaddr'])) {
     $sfname = DefineVariables('bfname');$slname = DefineVariables('blname');$saddr = DefineVariables('baddr');$scity = DefineVariables('bcity');$sstate = DefineVariables('bstate');$smobile = DefineVariables('bmobile');$spin = DefineVariables('bpin');
} else {
     $sfname = DefineVariables('sfname');$slname = DefineVariables('slname');$saddr = DefineVariables('saddr');$scity = DefineVariables('scity');$sstate = DefineVariables('sstate');$smobile = DefineVariables('smobile');$spin = DefineVariables('spin');
}
//----------------------------------------------------------------------------------------------------
date_default_timezone_set('Asia/Calcutta');
if($payment == 'Cash On Delivery'){
     $OrderSQL="INSERT INTO `order_cash` (`OrderID`,`OrderDate`,`OrderStatus`,`Freight`,`SalesTax`,`VAT`,`Timestamp`,`CourierID`,`CourierNumber`,`ShippingDate`,`DeliveryDate`,`CustomerID`,`CustBillingFirstName`,`CustBillingLastName`,`CustBillingAddress`,`CustBillingCity`,`CustBillingState`,`CustBillingPostalCode`,`CustBillingMobile`,`CustShippingFirstName`,`CustShippingLastName`,`CustShippingAddress`,`CustShippingCity`,`CustShippingState`,`CustShippingMobile`,`CustShippingPostalCode`,`Payment`) VALUES (NULL,'".date('Y-m-d H:i:s')."','Placed',NULL,NULL,NULL,NOW(),NULL,NULL,NULL,NULL,'".$_SESSION['CustomerID']."','".$bfname."','".$blname."','".$baddr."','".$bcity."','".$bstate."','".$bpin."','".$bmobile."','".$sfname."','".$slname."','".$saddr."','".$scity."','".$sstate."','".$smobile."','".$spin."','".$payment."')";
     mysql_query($OrderSQL);
     $OrderID=mysql_insert_id();
     foreach ($_SESSION['checkout'] as $key => $value) {
          $OrderDetailSQL="INSERT INTO orderdetail_cash (Quantity, SubProductID, OrderID, CustomerID, DealerID) VALUES ('".$value."', ".$key.", ".$OrderID.", ".$_SESSION['CustomerID'].", 1)";
          mysql_query($OrderDetailSQL);
     }
     $_SESSION['invoice']=$invoice=date('y')."01".$OrderID;
     $InvoiceSQL="UPDATE `order_cash` SET `Invoice`='".$invoice."' WHERE `OrderID`=".$OrderID."";
     //echo $InvoiceSQL;
     $InvoiceQuery=mysql_query($InvoiceSQL);
} else {
     $OrderSQL="INSERT INTO `order_account` (`OrderID`,`OrderDate`,`OrderStatus`,`Freight`,`SalesTax`,`VAT`,`Timestamp`,`CourierID`,`CourierNumber`,`ShippingDate`,`DeliveryDate`,`CustomerID`,`CustBillingFirstName`,`CustBillingLastName`,`CustBillingAddress`,`CustBillingCity`,`CustBillingState`,`CustBillingPostalCode`,`CustBillingMobile`,`CustShippingFirstName`,`CustShippingLastName`,`CustShippingAddress`,`CustShippingCity`,`CustShippingState`,`CustShippingMobile`,`CustShippingPostalCode`,`Payment`) VALUES (NULL,'".date('Y-m-d H:i:s')."','Placed',NULL,NULL,NULL,NOW(),NULL,NULL,NULL,NULL,'".$_SESSION['CustomerID']."','".$bfname."','".$blname."','".$baddr."','".$bcity."','".$bstate."','".$bpin."','".$bmobile."','".$sfname."','".$slname."','".$saddr."','".$scity."','".$sstate."','".$smobile."','".$spin."','".$payment."')";
     mysql_query($OrderSQL);
     $OrderID=mysql_insert_id();
     foreach ($_SESSION['checkout'] as $key => $value) {
          $OrderDetailSQL="INSERT INTO orderdetail_account (Quantity, SubProductID, OrderID, CustomerID, DealerID) VALUES ('".$value."', ".$key.", ".$OrderID.", ".$_SESSION['CustomerID'].", 1)";
          mysql_query($OrderDetailSQL);
     }
     $_SESSION['invoice']=$invoice=date('y')."02".$OrderID;
     $InvoiceSQL="UPDATE `order_account` SET `Invoice`='".$invoice."' WHERE `OrderID`=".$OrderID."";
     //echo $InvoiceSQL;
     $InvoiceQuery=mysql_query($InvoiceSQL);
}
function UnsetVariables($name){
     if (isset($_POST[$name])) {
          unset($_POST[$name]);
     }
}
UnsetVariables('tin');UnsetVariables('payment');UnsetVariables('bfname');UnsetVariables('blname');UnsetVariables('baddr');UnsetVariables('bcity');UnsetVariables('bstate');UnsetVariables('bmobile');UnsetVariables('bpin');UnsetVariables('sfname');UnsetVariables('slname');UnsetVariables('saddr');UnsetVariables('scity');UnsetVariables('sstate');UnsetVariables('smobile');UnsetVariables('spin');
//-------------------------------------------------------------------------------------------------------------------------------
$mail = new PHPMailer();
     $mail->IsSMTP();                                                                       // set mailer to use SMTP
     $mail->Host = "mail.golfessentials.in";                                             // specify main and backup server
     $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
     $mail->SMTPKeepAlive = true;  
     $mail->Mailer = "smtp"; 
     $mail->SMTPDebug  = 0;
     $mail->SMTPSecure = "ssl"; 
     $mail->Port = 465;
     $mail->Username = "sales@golfessentials.in";                                             // SMTP username
     $mail->Password = "5eL#RbBagel1";                                           // SMTP password
     $mail->From = "sales@golfessentials.in";
     $mail->FromName = "golfessentials.in";
     $mail->AddAddress(GetCustomerDetails('email'));                                     // name is optional
     $mail->AddReplyTo("sales@golfessentials.in");
     $mail->WordWrap = 50;                                     // set word wrap to 50 characters
     $mail->IsHTML(true);                                          // set email format to HTML
     $mail->Subject = "Your order at golfessentials.in";
     ob_start();
     include 'mail/order.php';
     $content = ob_get_clean();
     $mail->Body    = $content;
     $mail->AltBody = $content;
     if(!$mail->Send())
          {
               echo "Message could not be sent. <p>";
               echo "Mailer Error: " . $mail->ErrorInfo;
               unset($_SESSION['emailstatus']);
               exit;
          }
//-------------------------------------------------------------------------------------------------------------------------------
$mail = new PHPMailer();
     $mail->IsSMTP();                                                                       // set mailer to use SMTP
     $mail->Host = "mail.golfessentials.in";                                             // specify main and backup server
     $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
     $mail->SMTPKeepAlive = true;  
     $mail->Mailer = "smtp"; 
     $mail->SMTPDebug  = 0;
     $mail->SMTPSecure = "ssl"; 
     $mail->Port = 465;
     $mail->Username = "sales@golfessentials.in";                                             // SMTP username
     $mail->Password = "5eL#RbBagel1";                                           // SMTP password
     $mail->From = "sales@golfessentials.in";
     $mail->FromName = "golfessentials.in";
     $mail->AddAddress('sales@golfessentials.in');                                     // name is optional
     $mail->AddReplyTo("sales@golfessentials.in");
     $mail->WordWrap = 50;                                     // set word wrap to 50 characters
     $mail->IsHTML(true);                                          // set email format to HTML
     $mail->Subject = "Your order at golfessentials.in";
     ob_start();
     include 'mail/order.php';
     $content = ob_get_clean();
     $mail->Body    = $content;
     $mail->AltBody = $content;
     if(!$mail->Send())
          {
               echo "Message could not be sent. <p>";
               echo "Mailer Error: " . $mail->ErrorInfo;
               unset($_SESSION['emailstatus']);
               exit;
          }
//-------------------------------------------------------------------------------------------------------------------------------
foreach ($_SESSION['checkout'] as $key => $value) {
     $CartDeleteSQL="DELETE FROM cart WHERE CustomerID='".$_SESSION['CustomerID']."' AND SubProductID='".$key."'";
//     echo "SQL for ".$key." = ".$CartDeleteSQL."<br>";
     mysql_query($CartDeleteSQL);
     unset($_SESSION['cart']);
}
echo"<script type=\"text/javascript\">window.location = \"checkout.php?processed=yes\"</script>";
} else {
  echo"<script type=\"text/javascript\">window.location = \"checkout.php?processed=yes\"</script>";
}
?>
<?php 
session_start();
include '../connection.php';
include '../functions.php';
require("../PHPMailer/class.phpmailer.php");
?>
<?php ob_start() ?>
<html>
<head>
	<link rel="stylesheet" href="../css/pdf.css" type="text.css"/>
    <link rel="stylesheet" href="../ruppee/ruppee.css" type="text.css"/>
<meta name="robots" value="noindex">
</head>
	<body>
		<?php
//$subid
$subid=$_POST['subid'];
$qty=$_POST['qty'];
$check=$_POST['check'];
$oid=$_POST['oid'];
$payment=$_POST['payment'];

if($payment=='cash'){
    $order_sql="SELECT OrderDate, OrderStatus, CustBillingFirstName, CustBillingLastName, CustBillingAddress, CustBillingCity, CustBillingState, CustBillingPostalCode, CustBillingMobile, CustShippingFirstName, CustShippingLastName, CustShippingAddress, CustShippingCity, CustShippingState, CustShippingPostalCode, CustShippingMobile, Payment, Invoice, CustomerID  FROM `order_cash` WHERE OrderID=".$oid;
	//echo "<br>".$order_sql;
	$order_query=mysql_query($order_sql);
	$order_row=mysql_fetch_array($order_query);
}
elseif($payment=='account'){
    $order_sql="SELECT OrderDate, OrderStatus, CustBillingFirstName, CustBillingLastName, CustBillingAddress, CustBillingCity, CustBillingState, CustBillingPostalCode, CustBillingMobile, CustShippingFirstName, CustShippingLastName, CustShippingAddress, CustShippingCity, CustShippingState, CustShippingPostalCode, CustShippingMobile, Payment, Invoice, CustomerID  FROM `order_account` WHERE OrderID=".$oid;
    //echo "<br>".$order_sql;
    $order_query=mysql_query($order_sql);
    $order_row=mysql_fetch_array($order_query);
}
?>
		<div class="top">
			<div class="bill_to">
				<b>Bill To:</b> 
			</div>
			<div class="cust_name"><b><u>Name: </u></b> <?php echo $order_row[2]." ".$order_row[3] ?> </div>
			<div class="cust_address"><b><u>Address: </u></b> <?php echo $order_row[4].", ".$order_row[5].", ".$order_row[6]." - ".$order_row[7]; echo "<br>".$order_row[8];?>  </div>
			
            <br>
            <div class="bill_to">

                <b>Shipping Address:</b> 
            </div>
            <div class="cust_name"><b><u>Name: </u></b> <?php echo $order_row[9]." ".$order_row[10] ?> </div>
			<div class="cust_address"><b><u>Address: </u></b> <?php echo $order_row[11].", ".$order_row[12].", ".$order_row[13]." - ".$order_row[14]; echo "<br>".$order_row[15]; ?>  </div>
            
			<div class="right">
				<img src="../img/pdflogo.png" width="300px" height="123px">
			</div>

		</div>
		<div class="inv"><b><u> INVOICE </u></b></div>
		<div class="inv_num"><b>Invoice No.: </b><?php echo $order_row[17]; ?></div>
		<div class="date"><b>Date:</b> <?php 


		echo date("l, d/M/Y"); ?></div>
		<div class="table_container">
			<br>
		<?php
		
                    $number=$total=0;
                    echo "<table class=\"summary\"><tr><th>S.No.</th><th>Product Name</th><th>Price</th><th>Qty.</th><th>Amount</th></tr>";
                    for ($i=0; $i <= count($subid) ; $i++) {
                        if(isset($check[$i])){
                            $number++;
                            echo "<tr>";
                            echo "<td>".$number."</td>";
                            echo "<td>".GetProductDetails($subid[$i],'name')."</td>";
                            $total += (GetProductDetails($subid[$i],'sp')*$qty[$i]);
                            echo "<td><b>Rs.</b> ".number_format(GetProductDetails($subid[$i],'sp'), 0, ' ', ',')."</td>";
                            echo "<td>".$qty[$i]."</td>";
                            echo "<td><b>Rs.</b> ".(GetProductDetails($subid[$i],'sp')*$qty[$i])."</td>";
                            echo "</tr>";
                        }
                    }
                    echo "<tr><td colspan=\"4\"><b>Grand Total</b></td><td><b>Rs.</b><b> ".number_format($total, 0, ' ', ',')."</b></td></tr>";
                    echo "</table>";
				
		?>
		<?php
			function convertNumberToWordsForIndia($number){
         //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
         $words = array(
         '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
         '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
         '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
         '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
         '30' => 'thirty','40' => 'forty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
         '80' => 'eighty','90' => 'ninty');
         
        //First find the length of the number
         $number_length = strlen($number);
         //Initialize an empty array
         $number_array = array(0,0,0,0,0,0,0,0,0);        
        $received_number_array = array();
         
        //Store all received numbers into an array
         for($i=0;$i<$number_length;$i++){    $received_number_array[$i] = substr($number,$i,1);    }
 
        //Populate the empty array with the numbers received - most critical operation
         for($i=9-$number_length,$j=0;$i<9;$i++,$j++){ $number_array[$i] = $received_number_array[$j]; }
         $number_to_words_string = "";        
        //Finding out whether it is teen ? and then multiplying by 10, example 17 is seventeen, so if 1 is preceeded with 7 multiply 1 by 10 and add 7 to it.
         for($i=0,$j=1;$i<9;$i++,$j++){
             if($i==0 || $i==2 || $i==4 || $i==7){
                 if($number_array[$i]=="1"){
                     $number_array[$j] = 10+$number_array[$j];
                     $number_array[$i] = 0;
                 }        
            }
         }
         
        $value = "";
         for($i=0;$i<9;$i++){
             if($i==0 || $i==2 || $i==4 || $i==7){    $value = $number_array[$i]*10; }
             else{ $value = $number_array[$i];    }            
            if($value!=0){ $number_to_words_string.= $words["$value"]." "; }
             if($i==1 && $value!=0){    $number_to_words_string.= "Crore "; }
             if($i==3 && $value!=0){    $number_to_words_string.= "Lakh ";    }
             if($i==5 && $value!=0){    $number_to_words_string.= "Thousand "; }
             if($i==6 && $value!=0){    $number_to_words_string.= "Hundred &amp; "; }
         }
         if($number_length>9){ $number_to_words_string = "Sorry This does not support more than 99 Crores"; }
         return ucwords(strtolower("Rupees ".$number_to_words_string)." Only.");
     }
 


		?>
    	</div>

		<div class="after_table">
			<!--<div class="tin"><b>TIN No.: 06512507949</b></div>
			<div class="cust_tin"><b>Buyer's TIN No.: </b></div> -->
			<table class="details" >
				<tr><td colspan="5"><b>Amount chargeable in Words: </b><?php echo convertNumberToWordsForIndia($total); ?></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
                <tr><td class="green_color" colspan="3"><b>Payment Option Selected:</b> <?php echo $order_row[16]; ?></td></tr>
                <tr><td></td></tr>
				<tr><td></td></tr>
                <?php if ($order_row[16]=='Cheque' || $order_row[16]=='Demand Draft') { ?>
				<tr><td><b>Payment Instructions For:</b></td></tr>
				<tr><td><b>Cheque/Demand Draft</b></td></tr>
				<tr><td>Favouring "Kevin Singh"</td></tr>
				<tr><td> Payable at Chandigarh</td></tr>
				<tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td colspan="6">The amount reflected in the invoice must be transferred within one week from the above mentioned date.</td></tr>
                <?php } elseif($order_row[16]=='Bank Transfer'){ ?>
                <tr><td><b>Payment Instructions For:</b></td></tr>
                <tr><td><b>RTGS/NEFT</b></td></tr>
                <tr><td><b>Name:</b> Kevin Singh</td></tr>
                <tr><td><b>Ac No.:</b> 001590100026445</td></tr>
                <tr><td><b>IFSC:</b> YESB0000015</td></tr>
                <tr><td>(YES Bank, Sector 9, Chandigarh)</td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <?php } elseif($order_row[16]=='Cash Deposit'){ ?>
                <tr><td><b>Payment Instructions For:</b></td></tr>
                <tr><td><b>Cash Deposit</b></td></tr>
                <tr><td><b>Bank Name:</b> YES Bank</td></tr>
                <tr><td><b>Name:</b> Kevin Singh</td></tr>
                <tr><td><b>Ac No.:</b> 001590100026445</td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td colspan="6">The amount reflected in the invoice must be transferred within one week from the above mentioned date.</td></tr>
                <?php } elseif($order_row[16]=='Cash On Delivery'){ ?>
                <tr><td colspan="6">The exact amount reflected in the invoice must be kept ready at the time of delivery that has been mutually agreed upon.</td></tr>
                <?php } ?>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td colspan="6">The PDF has been generated automatically and is valid without a signature.</td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td colspan="2">Your golfessentials.in Account Manager</td></tr>
			</table>
		</div>

		<?php
			file_put_contents('testpdf1.php', ob_get_contents());
		?>

<?php

require_once("../dompdf/dompdf_config.inc.php");
?>



<?php

 
    $dompdf = new DOMPDF();
    $filename='testpdf1.php';
    $dompdf->load_html(file_get_contents($filename));
    $dompdf->render();
    $pdf = $dompdf->output();
    file_put_contents("../order/golfessentials.in_invoice_".$order_row[17].".pdf", $pdf);
?>
<?php
    # Code for mail goes here

    $ID=$order_row[18];
    $email=GetCustomerDetails('email',$ID);


    #------------------------
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "mail.golfessentials.in";
    $mail->SMTPAuth = true;
    $mail->SMTPKeepAlive = true;
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 0;
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->Username = "sales@golfessentials.in";
    $mail->Password = "5eL#RbBagel1";
    $mail->From = "sales@golfessentials.in";
    $mail->FromName = "golfessentials.in";
    $mail->AddAddress($email);
    $mail->AddReplyTo("support@golfessentials.in");
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = "Your order at golfessentials.in";
    $mail->AddAttachment("../order/golfessentials.in_invoice_".$order_row[17].".pdf", "golfessentials.in_invoice_".$order_row[17].".pdf");
    ob_start();
    include '../mail/semiorder.php';
    $content = ob_get_clean();
    $mail->Body    = $content;
    $mail->AltBody = $content;

    if(!$mail->Send())
        {
            echo "Message could not be sent. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "mail.golfessentials.in";
    $mail->SMTPAuth = true;
    $mail->SMTPKeepAlive = true;
    $mail->Mailer = "smtp";
    $mail->SMTPDebug  = 0;
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    $mail->Username = "info@golfessentials.in";
    $mail->Password = "TyZSrNwSnsyT";
    $mail->From = "info@golfessentials.in";
    $mail->FromName = "golfessentials.in";
    $mail->AddAddress("sales@golfessentials.in");
    $mail->AddReplyTo("info@golfessentials.in");
    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = "Your order at golfessentials.in";
    $mail->AddAttachment("../order/golfessentials.in_invoice_".$order_row[17].".pdf", "golfessentials.in_invoice_".$order_row[17].".pdf");
    ob_start();
    include '../mail/semiorder.php';
    $content = ob_get_clean();
    $mail->Body    = $content;
    $mail->AltBody = $content;

    if(!$mail->Send())
        {
            echo "Message could not be sent. <p>";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        } 
?>
	</body>
</html>
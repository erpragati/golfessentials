<?php 
session_start();
include '../connection.php';
?>
<?php ob_start() ?>
<html>
<head>
	<link rel="stylesheet" href="../css/pdf.css" type="text.css"/>
    <link rel="stylesheet" href="../ruppee/ruppee.css" type="text.css"/>
<meta name="robots" value="noindex">
</head>
	<body>
		<div class="top">
			<div class="bill_to">
				<b>Bill To:</b> 
			</div>
			<div class="cust_name"><b><u>Name: </u></b> <?php echo $_SESSION['bfname']." ".$_SESSION['blname'] ?> </div>
			<div class="cust_address"><b><u>Address: </u></b> <?php echo $_SESSION['baddr'].", ".$_SESSION['bcity'].", ".$_SESSION['bstate']." - ".$_SESSION['bpin']; ?>  </div>
			<?php
                if(!isset($_SESSION['same']))
                {

            ?>
            <br>
            <div class="bill_to">

                <b>Shipping Address:</b> 
            </div>
            <div class="cust_name"><b><u>Name: </u></b> <?php echo $_SESSION['sfname']." ".$_SESSION['slname'] ?> </div>
            <div class="cust_address"><b><u>Address: </u></b> <?php echo $_SESSION['saddr'].", ".$_SESSION['scity'].", ".$_SESSION['sstate']." - ".$_SESSION['bpin']; ?>  </div>
            <?php
                }

                unset($_SESSION['same']);
            ?>
			<div class="right">
				<img src="../img/pdflogo.jpg" width="280px" height="150px">
			</div>

		</div>
		<div class="inv"><b><u> INVOICE </u></b></div>
		<div class="inv_num"><b>Invoice No.: </b><?php echo $_SESSION['invoice']; ?></div>
		<div class="date"><b>Date:</b> <?php 


		echo date("l, d/M/Y"); ?></div>
		<div class="table_container">
			<br>
		<?php
		if(isset($_SESSION['cart'])&&count($_SESSION['cart'])!=0){
                    $number=$total=0;
                    
                    echo "<table class=\"summary\"><tr><th>S.No.</th><th>Product Name</th><th>Price</th><th>Qty.</th><th>Amount</th></tr>";
                    foreach ($_SESSION['cart'] as $key => $value) {
                         $number++;
                         echo "<tr>";
                         echo "<td>".$number."</td>";
                         $sql="SELECT productmaster.ProductID, Brand, productmaster.ProductName, SP
                         FROM productmaster JOIN subproduct
                         WHERE productmaster.ProductID = subproduct.ProductID
                         AND subproduct.SubProductID='".$key."'";
                         $query=mysql_query($sql);
                         $row=mysql_fetch_row($query);
                         echo "<td>".$row[1]." ".$row[2]."</td>";
                         $total += ($row[3]*$value);
                         echo "<td><b class=\"ruppeefont\">`</b> ".number_format($row[3], 0, ' ', ',')."</td>";
                         echo "<td>".$value."</td>";
                         echo "<td><b class=\"ruppeefont\">`</b> ".($row[3]*$value)."</td>";
                         echo "</tr>";
                    }
                    echo "<tr><td colspan=\"4\"><b>Grand Total</b></td><td><b class=\"ruppeefont\">`</b><b> ".number_format($total, 0, ' ', ',')."</b></td></tr>";
                    echo "</table>";
				}
		?>
		<?php
			function convertNumberToWordsForIndia($number){
         //A function to convert numbers into Indian readable words with Cores, Lakhs and Thousands.
         $words = array(
         '0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five',
         '6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten',
         '11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen',
         '16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty',
         '30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy',
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
			<div class="tin"><b>TIN No.: 06512507949</b></div>
			<div class="cust_tin"><b>Buyer's TIN No.: <?php echo "N/A"; ?></b></div>
			<table class="details" >
				<tr><td colspan="5"><b>Amount chargeable in Words: </b><?php echo convertNumberToWordsForIndia($total); ?></td></tr>
				<tr><td></td></tr>
				<tr><td></td></tr>
                <tr><td class="red_color" colspan="3"><b>Payment Option Selected:</b> <?php echo $_SESSION['payment']; ?></td></tr>
                <tr><td></td></tr>
				<tr><td></td></tr>
				<tr><td><b>Payment Instructions:</b></td></tr>
				<tr><td><b>(1.) Cheque/Demand Draft</b></td><td> </td><td> </td> <td></td><td><b>(2.) RTGS/NEFT</b></td></tr>
				<tr><td>Favouring "Par Savers Groups"</td><td> <td></td></td><td></td><td><b>Name: </b>Par Savers Groups</td></tr>
				<tr><td>Payable at Panchkula</td><td> </td><td> </td><td></td><td><b>Ac No.: </b>01082000009649</td></tr>
				<tr><td></td><td> </td><td> </td><td> </td><td><b>IFSC: </b>HDFC0000108 (HDFC Bank, Sector-8, Panchkula)</td></tr>
				<tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td colspan="6">The amount reflected in the invoice must be transferred within one week from the above mentioned date.</td></tr>
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
    file_put_contents("../order/".$_SESSION['OrderID'].".pdf", $pdf);
    $_SESSION['count']++;
?>
<!--
<script type="text/javascript">
window.location = "invoice.php";
</script>
-->
	</body>
</html>


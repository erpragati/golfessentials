<?php 
$title="Checkout || golfessentials.in";
include 'header.php';
include_once ('functions.php');
?>
  <div role="main" class="container_24">
          <div class="relative clearfix">
               <div class="sidemenu grid_4">
                    <ul>
                         <li><a href="<?php echo $men; ?>">Men<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                         <li><a href="<?php echo $ladies; ?>">Ladies<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                         <li><a href="<?php echo $juniors; ?>">Juniors<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                         <li><a href="<?php echo $lefthanders; ?>" class="no-border">Left-handers<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                    </ul>
               </div>
               <?php echo $sliders; ?>
              <a href="special" class="so" title="Contact us if you can’t find what you are looking for.">
                <img src="img/so.png" width="18" height="109" class="center_align">
                <img src="img/white_button.png" width="22" height="21" class="center_align">
              </a>
              <a href="feedback" class="f" title="Share your ideas, expectations and views with us.">
                <img src="img/f.png" width="14" height="78" class="center_align">
                <img src="img/white_button.png" width="22" height="21" class="center_align">
              </a>
          </div>
          <div id="products">
               <?php
               if(isset($_SESSION['login'])){
                    if(isset($_SESSION['checkout'])&&count($_SESSION['checkout'])!=0&&!isset($_GET['processed'])){
                    echo "<div class=\"checkout\">";
                         echo "<br><h1 class=\"center_align\">Checkout</h1><br>";
                              $number=$total=0;
                              echo "<h2>Order Summary</h2><hr><br>";
                              echo "<table class=\"summary\"><tr><th>S.No.</th><th>Product Name</th><th>Price</th><th>Qty.</th><th>Amount</th></tr>";
                              foreach ($_SESSION['checkout'] as $key => $value) {
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
//                                   echo "<td class=\"cross\" data-subid=\"".$key."\"><img id=\"loader\" src=\"images/zoomloader.gif\"></td>";
                                   echo "</tr>";
                         }
                         echo "<tr><td colspan=\"4\">Grand Total</td><td id=\"total\" data-total=\"".$total."\"><b class=\"ruppeefont\">`</b> ".number_format($total, 0, ' ', ',')."</td></tr>";
                         echo "</table>";
                         ?>
                         <br><br><h2>Billing details</h2><hr><br>
                         <form action="invoice.php" method="POST">
                              <table class="address">
                                   <tr>
                                        <td>First Name<span>*</span></td>
                                        <td><input type="text" name="bfname" value="<?php echo GetCustomerDetails('fname'); ?>" required></td></tr>
                                   <tr>
                                        <td>Last Name<span>*</span></td>
                                        <td><input type="text" name="blname" value="<?php echo GetCustomerDetails('lname'); ?>" required></td></tr>
                                   <tr>
                                        <td>Address<span>*</span></td>
                                        <td><textarea cols="20" rows="5" name="baddr" required><?php echo GetCustomerDetails('addr'); ?></textarea></td></tr>
                                   <tr>
                                        <td>City<span>*</span></td>
                                        <td><input type="text" name="bcity" value="<?php echo GetCustomerDetails('city'); ?>" required></td></tr>
                                   <tr>
                                        <td>State<span>*</span></td>
                                        <td><input type="text" name="bstate" value="<?php echo GetCustomerDetails('state'); ?>" required></td></tr>
                                   <tr>
                                        <td>Pincode<span>*</span></td>
                                        <td><input type="number" name="bpin" value="<?php echo GetCustomerDetails('pin'); ?>" required></td></tr>
                                   <tr>
                                        <td>Mobile<span>*</span></td>
                                        <td><input type="number" name="bmobile" value="<?php echo GetCustomerDetails('mobile'); ?>" required></td></tr>
                                   <tr>
                                        <td colspan="2">Please note that fields marked with <span>*</span> are necessary</td></tr>
                              </table>
                              <br><input type="checkbox" name="sameaddr">&nbsp;Shipping details are the same as the Billing details.
                              <div class="address">
                                   <br><br><h2>Shipping details</h2><hr><br>
                                   <table class="address">
                                        <tr>
                                             <td>First Name<span>*</span></td>
                                             <td><input type="text" name="sfname" value="" class="removeattr" required></td></tr>
                                        <tr>
                                             <td>Last Name<span>*</span></td>
                                             <td><input type="text" name="slname" value="" class="removeattr" required></td></tr>
                                        <tr>
                                             <td>Address<span>*</span></td>
                                             <td><textarea cols="20" rows="5" name="saddr" class="removeattr" required></textarea></td></tr>
                                        <tr>
                                             <td>City<span>*</span></td>
                                             <td><input type="text" name="scity" value="" class="removeattr" required></td></tr>
                                        <tr>
                                             <td>State<span>*</span></td>
                                             <td><input type="text" name="sstate" value="" class="removeattr" required></td></tr>
                                        <tr>
                                             <td>Pincode<span>*</span></td>
                                             <td><input type="number" name="spin" value="" class="removeattr" required></td></tr>
                                        <tr>
                                             <td>Mobile<span>*</span></td>
                                             <td><input type="number" name="smobile" value="" class="removeattr" required></td></tr>
                                        <tr>
                                             <td colspan="2">Please note that fields marked with <span>*</span> are necessary</td></tr>
                                   </table>
                              </div>
                              <br><br><h2>Payment Option</h2><hr><br>
                              <table class="payment">
                              <tr>
                                   <th colspan="2" align="left">Please select one of the options below as your method of payment</th>
                              </tr>
                              <tr>
                                   <td><input type="radio" name="payment" value="Bank Transfer" disabled required /></td>
                                   <td>Online payments &nbsp;&nbsp;<small class="green">(Coming Soon)</small></td>
                              </tr>
                              <tr>
                                   <td><input type="radio" name="payment" value="Bank Transfer" required /></td>
                                   <td>Bank Transfer</td>
                              </tr>
                              <tr>
                                   <td><input type="radio" name="payment" value="Demand Draft" required /></td>
                                   <td>Demand Draft</td>
                              </tr>
                              <tr>
                                   <td><input type="radio" name="payment" value="Cheque" required /></td>
                                   <td>Cheque</td>
                              </tr>
                              <tr>
                                   <td><input type="radio" name="payment" value="Cash Deposit" required /></td>
                                   <td>Cash Deposit</td>
                              </tr>
                              <tr>
                                   <td><input type="radio" name="payment" value="Cash On Delivery" required/></td>
                                   <td>Cash on Delivery &nbsp;&nbsp;<small>(We will get back to you on the possibility of Cash on Delivery depending on the shipping address)</small></td>
                              </tr>
                              </table>
                              <br><br><hr><br>
                              
                              <input type="submit" value="Place Order">
                         </form>
               </div>
               <?php 
               } elseif(isset($_GET['processed'])&&isset($_SESSION['login'])){
               echo "<div class=\"checkout\">";
                    $number=$total=0;
                    echo "<h2>Order Summary</h2><hr><br>";
                    echo "<table class=\"summary\"><tr><th>S.No.</th><th>Product Name</th><th>Price</th><th>Qty.</th><th>Amount</th></tr>";
                    foreach ($_SESSION['checkout'] as $key => $value) {
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
               echo "<tr><td colspan=\"4\">Grand Total</td><td><b class=\"ruppeefont\">`</b> ".number_format($total, 0, ' ', ',')."</td></tr>";
               echo "</table>";
               echo "<br><br>";
               echo "<h3>Your Reference Number is ".$_SESSION['invoice']."</h3>";
               echo "<br>";
               echo "An email has been sent to your registered email ID for your reference<br>";
               unset($_SESSION['checkout']);
               echo "</div>";
               } else {
                    echo"<script type=\"text/javascript\">window.location = \"cart.php\"</script>";
               }
          } else {
               echo"<script type=\"text/javascript\">window.location = \"register.php\"</script>";
          }
include 'footer.php'; ?>
    <script type="text/javascript" src="js/libs/jquery-1.8.2.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33105754-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>
<?php 
if(!isset($_SESSION)){ session_start(); }
$title="Your Cart at golfessentials.in";
include_once 'connection.php';

if (isset($_SESSION['login'])&&$_SESSION['login']) {
     /*-------------------------------------------------------------------------------------------------------------
                                                  Initialize the Cart
     ---------------------------------------------------------------------------------------------------------------*/
     $CartSQL="SELECT SubProductID, Quantity FROM cart WHERE CustomerID='".$_SESSION['CustomerID']."'";
     $CartQuery=mysql_query($CartSQL);
     $CartNum=mysql_num_rows($CartQuery);
     if($CartNum!=0){                       // If the Customer has a Cart saved in database.
          $cart = array();
          while ($CartRow=mysql_fetch_array($CartQuery)) {
               $cart[$CartRow[0]]=$CartRow[1];
          }
          $_SESSION['cart']=$cart;
     } else {                                     // first time visit and no cart saved in database.
          $cart = array();
          $_SESSION['cart']=$cart;
     }
     /*-------------------------------------------------------------------------------------------------------------
                                                  Process the Cart
     ---------------------------------------------------------------------------------------------------------------*/
     if (isset($_GET['subid'])&&isset($_GET['action'])) {
          $pid=htmlspecialchars($_GET['subid']);
          $action=htmlspecialchars($_GET['action']);
          if ($_GET['action']=='add') {
               if (array_key_exists('$pid', $cart)) {            // Core of the fuckin problem - '$pid' should have been used instead of $pid
                    foreach ($cart as $key => &$value) {         // $pid was always returning true but now '$pid' will do a proper check
                         if ($key==$pid) {
                              $value++;
                         }
                    }
                    unset($value);
               } else {
                    $cart[$pid] = '1';
               }
          } elseif($_GET['action']=='update') {
               $qty=htmlspecialchars($_GET['qty']);
               foreach ($cart as $key => &$value) {
                    if ($key==$pid) {
                         $value=$qty;
                    }
               }
               unset($value);
          } elseif($_GET['action']=='remove') {
               foreach ($cart as $key => &$value) {
                    if ($key==$pid) {
                         unset($cart[$key]);
                    }
               }
               unset($value);
          } elseif ($_GET['action']=='move') {
               if (array_key_exists('$pid', $cart)) {
                    foreach ($cart as $key => &$value) {
                         if ($key==$pid) {
                              $value++;
                         }
                    }
                    unset($value);
               } else {
                    $cart[$pid] = '1';
               }
               foreach ($_SESSION['wishlist'] as $key => &$value) {
                    if ($key==$pid) {
                         unset($_SESSION['wishlist'][$key]);
                         $WishlistDeleteSQL="DELETE FROM wishlist WHERE CustomerID='".$_SESSION['CustomerID']."' AND SubProductID='".$key."'";
                         $WishlistDeleteQuery=mysql_query($WishlistDeleteSQL);
                    }
               }
               unset($value);
          }
          $_SESSION['cart']=$cart;
          unset($_GET['subid']);
          unset($_GET['action']);
          if (isset($_GET['qty'])) { unset($_GET['qty']); }
          /*-------------------------------------------------------------------------------------------------------------
                                                       Save the Cart
          ---------------------------------------------------------------------------------------------------------------*/
          $cartnum=count($cart);
          if ($cartnum==$CartNum) {
               foreach ($cart as $key => $value) {
                    $CartUpdateSQL="UPDATE cart SET Quantity=".$value." WHERE CustomerID='".$_SESSION['CustomerID']."' AND SubProductID='".$key."'";
                    $CartUpdateQuery=mysql_query($CartUpdateSQL);
               }
          } elseif ($cartnum!=$CartNum) {
               $CartDeleteSQL="DELETE FROM cart WHERE CustomerID='".$_SESSION['CustomerID']."'";
               $CartDeleteQuery=mysql_query($CartDeleteSQL);
               foreach ($cart as $key => $value) {
                    $CartUpdateSQL="INSERT INTO cart(`CustomerID`, `SubProductID`, `Quantity`) VALUES (".$_SESSION['CustomerID'].",".$key.",".$value.")";
                    $CartUpdateQuery=mysql_query($CartUpdateSQL);
               }
          }
     }
}
include 'header.php'; ?>
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
               <div class="cart">
                    <?php
                    if (isset($_SESSION['login'])&&$_SESSION['login']) {
                    /*-------------------------------------------------------------------------------------------------------------
                                                                      Show Cart
                    ---------------------------------------------------------------------------------------------------------------*/
                         echo "<h2 id=\"count\" data-count=\"".count($cart)."\">Cart (";if (!isset($cart)){echo "0 items";}else{if(count($cart)==1){echo "1 item";}else{echo count($cart)." items";} } echo ")</h2>";
                         if(isset($cart)&&count($cart)!=0){
                              $_SESSION['checkout']=$cart;
                              $number=0;
                              $total=0;
                              foreach ($cart as $key => $value) {
                                   $number++;
                                   echo "<hr>";
                                   echo "<h3 class=\"".$key."\">".$number."</h3>";
                                   $sql="SELECT ImageFolderLink, productmaster.ProductID, Brand, productmaster.ProductName, SP, productmaster.ProductID
                                   FROM productmaster JOIN subproduct
                                   WHERE productmaster.ProductID = subproduct.ProductID
                                   AND subproduct.SubProductID='".$key."'";
                                   $query=mysql_query($sql);
                                   $row=mysql_fetch_row($query);
                                   echo "<a href=\"product?id=".$row[5]."\" class=\"".$key."\"><img src=".$row[0]."thumb.jpg class=\"left\"></a>";
                                   echo "<h2 class=\"".$key."\">".$row[2]." ".$row[3]."</h2><br>";
                                   $sp=number_format($row[4], 0, ' ', ',');
                                   echo "<h3 class=\"left ".$key."\">Price&nbsp;&nbsp;&nbsp;<b class=\"ruppeefont\">`</b> ".$sp."</h3>";
                                   echo "<div class=\"clearfix\"></div>";
                                   echo "<h6 class=\"left ".$key."\">Note: Prices include applicable taxes. Product availability status and shipping confirmation will be communicated to you shortly after you place your order.</h6>";
                                   echo "<br>";
                                   echo "<form name=\"input\" action=\"".$_SERVER['PHP_SELF']."\" method=\"get\" class=\"".$key."\">";
                                   echo "Quantity&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"qty\" value=\"".$value."\" maxlength=\"3\">";
                                   echo "
                                   <input type=\"hidden\" name=\"action\" value=\"update\" />
                                   <input type=\"hidden\" name=\"subid\" value=\"".$key."\" />
                                   <input type=\"submit\" value=\"Update\" />";
                                   echo "<div class=\"clearfix\"></div>";
                                   echo "<a href=\"cart?action=remove&subid=".$key."\">Remove from Cart</a>";
                                   echo "<a href=\"wishlist?action=move&subid=".$key."\">Move to Wishlist</a>";
                                   echo "<a href=\"#\" id=\"remove\">Buy Later&nbsp;&nbsp;<i class=\"icon-remove\" data-subid=\"".$key."\"></i></a><img src=\"images/zoomloader.gif\" class=\"hide\">";
                                   echo "</form>";
                                   $total=$total+$row[4]*$value;
                              }
                              echo "<hr id=\"total\" data-total=\"".$total."\">";
                              $total=number_format($total, 0, ' ', ',');
                              echo "<br><h2 id=\"totalshow\">Total:&nbsp;&nbsp;<b class=\"ruppeefont\">`</b> ".$total."</h2>";
                              echo "<a href=\"checkout\">Checkout</a>";
                              echo "<a href=\"index\">Continue Shopping</a>";
                         } else {
                              echo "<p>There are no items in your shopping cart that are currently available for checkout.</p>";
                              echo "<ul><span>How to add an item to your cart:</span>";
                              echo "<li>Browse through the various categories and click on the product that interests you to view more details </li>";
                              echo "<li>Click on “Add to Cart”</li>";
                         }
                    } else {
                         echo "<br><br><br>";
                         $_SESSION['lastpage']=$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING'];
                         echo "<h3>You need to <a href=\"register\" class=\"no-bg\">sign in</a> or <a href=\"register\" class=\"no-bg\">register</a> to view your cart.</h3>";
                         echo "<br><br><br>";
                    }
               echo "</div>";
          include 'footer.php';?>
    <script type="text/javascript" src="js/libs/jquery-1.8.2.min.js.gz"></script>
    <script src="js/script.js.gz"></script>
    <script src="js/checkout.js.gz"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js.gz"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</body>
</html>
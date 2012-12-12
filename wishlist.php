<?php
if(!isset($_SESSION)){ session_start(); }
$title="Your Wishlist at golfessentials.in";
include_once 'connection.php';

if (isset($_SESSION['login'])&&$_SESSION['login']) {
     /*-------------------------------------------------------------------------------------------------------------
                                                  Initialize the Wishlist
     ---------------------------------------------------------------------------------------------------------------*/
     $WishlistSQL="SELECT SubProductID, Quantity FROM wishlist WHERE CustomerID='".$_SESSION['CustomerID']."'";
     $WishlistQuery=mysql_query($WishlistSQL);
     $WishlistNum=mysql_num_rows($WishlistQuery);
     if($WishlistNum!=0){                       // If the Customer has a Wishlist saved in database.
          $wishlist = array();
          while ($WishlistRow=mysql_fetch_array($WishlistQuery)) {
               $wishlist[$WishlistRow[0]]=$WishlistRow[1];
          }
          $_SESSION['wishlist']=$wishlist;
     } else {                                     // first time visit and no Wishlist saved in database.
          $wishlist = array();
          $_SESSION['wishlist']=$wishlist;
     }
     /*-------------------------------------------------------------------------------------------------------------
                                                  Process the Wishlist
     ---------------------------------------------------------------------------------------------------------------*/
     if (isset($_GET['subid'])&&isset($_GET['action'])) {
          $pid=$_GET['subid'];
          $action=$_GET['action'];
          if ($_GET['action']=='add') {
               if (array_key_exists('$pid', $wishlist)) {
                    foreach ($wishlist as $key => &$value) {
                         if ($key==$pid) {
                              $value++;
                         }
                    }
                    unset($value);
               } else {
                    $wishlist[$pid] = '1';
               }
          } elseif($_GET['action']=='update') {
               $qty=$_GET['qty'];
               foreach ($wishlist as $key => &$value) {
                    if ($key==$pid) {
                         $value=$qty;
                    }
               }
               unset($value);
          } elseif($_GET['action']=='remove') {
               foreach ($wishlist as $key => &$value) {
                    if ($key==$pid) {
                         unset($wishlist[$key]);
                    }
               }
               unset($value);
          } elseif ($_GET['action']=='move') {
               if (array_key_exists('$pid', $wishlist)) {
                    foreach ($wishlist as $key => &$value) {
                         if ($key==$pid) {
                              $value++;
                         }
                    }
                    unset($value);
               } else {
                    $wishlist[$pid] = '1';
               }
               foreach ($_SESSION['cart'] as $key => &$value) {
                    if ($key==$pid) {
                         unset($_SESSION['cart'][$key]);
                         $CartDeleteSQL="DELETE FROM cart WHERE CustomerID='".$_SESSION['CustomerID']."' AND SubProductID='".$key."'";
                         $CartDeleteQuery=mysql_query($CartDeleteSQL);
                    }
               }
               unset($value);
          }
          $_SESSION['wishlist']=$wishlist;
          unset($_GET['subid']);
          unset($_GET['action']);
          if (isset($_GET['qty'])) { unset($_GET['qty']); }
          /*-------------------------------------------------------------------------------------------------------------
                                                       Save the Wishlist
          -------------------------------------------------------------------------------------------------------------*/
          $wishlistnum=count($wishlist);
          if ($wishlistnum==$WishlistNum) {
               foreach ($wishlist as $key => $value) {
                    $WishlistUpdateSQL="UPDATE wishlist SET Quantity=".$value." WHERE CustomerID='".$_SESSION['CustomerID']."' AND SubProductID='".$key."'";
                    $WishlistUpdateQuery=mysql_query($WishlistUpdateSQL);
               }
          } elseif ($wishlistnum!=$WishlistNum) {
               $WishlistDeleteSQL="DELETE FROM wishlist WHERE CustomerID='".$_SESSION['CustomerID']."'";
               $WishlistDeleteQuery=mysql_query($WishlistDeleteSQL);
               foreach ($wishlist as $key => $value) {
                    $WishlistUpdateSQL="INSERT INTO wishlist(`CustomerID`, `SubProductID`, `Quantity`) VALUES (".$_SESSION['CustomerID'].",".$key.",".$value.")";
                    $WishlistUpdateQuery=mysql_query($WishlistUpdateSQL);
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
/*-------------------------------------------------------------------------------------------------------------
                                                  Show Wishlist
---------------------------------------------------------------------------------------------------------------*/
if (isset($_SESSION['login'])&&$_SESSION['login']) {
     echo "<h2>Wishlist (";if (!isset($wishlist)){ echo "0 items";} else { 
          if(count($wishlist)==1) {
               echo "1 item";
          } else {
               echo count($wishlist)." items";
          }
     }

     echo ")</h2>";
     if(isset($wishlist)&&count($wishlist)!=0){
          $number=0;
          foreach ($wishlist as $key => $value) {
               $number++;
               echo "<hr>";
               echo "<h3>".$number."</h3>";
               $sql="SELECT ImageFolderLink, productmaster.ProductID, Brand, productmaster.ProductName, SP
               FROM productmaster JOIN subproduct
               WHERE productmaster.ProductID = subproduct.ProductID
               AND subproduct.SubProductID='".$key."'";
               $query=mysql_query($sql);
               $row=mysql_fetch_row($query);
               echo "<a href=\"product?id=".$row[1]."\"><img src=".$row[0]."thumb.jpg class=\"left\"></a>";
               echo "<h2>".$row[2]." ".$row[3]."</h2><br>";
               $sp=number_format($row[4], 0, ' ', ',');
               echo "<h3 class=\"left\">Price&nbsp;&nbsp;&nbsp;<b class=\"ruppeefont\">`</b> ".$sp."</h3>";
               echo "<div class=\"clearfix\"></div>";
               echo "<br>";
               echo "<a href=\"wishlist?action=remove&subid=".$key."\">Remove</a>";
               echo "<a href=\"cart?action=move&subid=".$key."\">Add to Cart</a>";
               echo "<a href=\"index\">Continue Shopping</a>";
               echo "</form>";

          }
     } else {
          echo "<p>There are currently no items in your wishlist.</p>";
          echo "<ul><span>How to add an item to your wishlist:</span>";
          echo "<li>Browse through the various categories and click on the product that interests you to view more details </li>";
          echo "<li>Click on “Add to Wishlist”</li>";
     }
} else {
     echo "<br><br><br>";
     $_SESSION['lastpage']=$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING'];
     echo "<h3>You need to <a href=\"register\" class=\"no-bg\">sign in</a> to view your wishlist</h3>";
     echo "<br><br><br>";
}

echo "</div>";

include 'footer.php'; ?>
<!--
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.2.min.js"><\/script>')</script>

  <script src="js/plugins.js"></script>
-->
    <script type="text/javascript" src="js/libs/jquery-1.8.2.min.js"></script>
    <script src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
<!--
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
-->
</body>
</html>
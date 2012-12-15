<?php
if(!isset($_SESSION)){ session_start(); }
include_once 'connection.php';
include_once ('functions.php');
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>
     <?php
     if(isset($title))
     {
          echo $title;
     }
     elseif (isset($_GET['type'])) {
          $title=htmlspecialchars($_GET['type']);
          echo ucwords($title)." at golfessentials.in";
     }
     elseif (isset($_GET['hand']))
     {
          $title=htmlspecialchars($_GET['hand']);
          echo ucwords($title)." Products at golfessentials.in";
     }
     elseif (isset($_GET['player']))
     {
          $title=htmlspecialchars($_GET['player']);
          echo "Products for ".ucwords($title)." at golfessentials.in";
     }
     elseif (isset($_GET['brand']))
     {
          $title=htmlspecialchars($_GET['brand']);
          echo ucwords($title)." Products at golfessentials.in";
     }
     elseif (isset($_GET['SubType']))
     {
          $title=htmlspecialchars($_GET['SubType']);
          echo ucwords($title)." at golfessentials.in";
     }
     elseif (isset($_GET['s']))
     {
          $title=htmlspecialchars($_GET['s']);
          echo "Searching -".ucwords($title)."- at golfessentials.in";
     }
     elseif (isset($_GET['page']))
     {
          echo "All products at golfessentials.in";
     }
     else{
     //$pos = strrpos($_SERVER['SCRIPT_NAME'], "/");
     //$script = substr($_SERVER['SCRIPT_NAME'], ($pos+1), -4);
     //$TitleType = (isset($_GET['type'])) ? $_GET['type'] : NULL;
     $TitleID = (isset($_GET['id'])) ? htmlspecialchars($_GET['id']) : NULL;
     echo GetHeaderTitle($TitleID);
     }
     ?>
  </title>
  <meta name="description" content="">

  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/960.css.gz">
  <link rel="stylesheet" href="droid/droid.css">
  <link rel="stylesheet" href="ruppee/ruppee.css">
  <link rel="stylesheet" href="css/nivo.css.gz">
  <link rel="stylesheet" href="css/style.css.gz">
<?php
     $LastPosition=strripos($_SERVER['PHP_SELF'], '/');
     $LastPart=substr($_SERVER['PHP_SELF'], $LastPosition+1);
     $DotPosition=strripos($LastPart, '.');
     $CompareLink=substr($LastPart, 0, $DotPosition);
     if ($CompareLink=='product'||'minitour') {
          echo "<link rel=\"stylesheet\" href=\"css/jquery.jqzoom.css.gz\">";
     }
  ?>
  <link rel="icon" type="image/png" href="fav.png">
</head>
<body>
  <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
  <header>
          <div class="topline container_24 clearfix">
               <div class="grid_8 alpha no-border">
                    <a href="index" title="golfessentials.in"><img src="img/logo.png" width="302" height="40" class="left" title="golfessentials.in"></a>
               </div>
               <div class="grid_4 no-border">
                         <h4 class="right"><a href="contactus" title="Contact Us">Contact Us</a></h4>
                         <h6 class="right">+91-8968893333</h6>
               </div>
<!--************************** LOGIN *************************-->
               <div id="logindiv" class="grid_4 pointer" 
               <?php 
                    if(!isset($_SESSION['login'])||!$_SESSION['login']){
                         echo "data-login=\"no\"";
                    } elseif(isset($_SESSION['login'])&&$_SESSION['login']){
                         echo "data-login=\"yes\"";
                    }
                    ?> 
                    >
                    <h4><?php 
                              if(isset($_SESSION['login'])&&$_SESSION['login']){
                                   echo "<a href=\"register\" title=\"View summary of your account information \">My Account</a></h4><h6><a href=\"logout\" title=\"Sign Out\">Sign Out</a></h6>";
                              }
                              else{
                                   echo "<a href=\"register\" title=\"Sign In\">Sign In</a></h4><h6><a href=\"register\" title=\"Create an Account\">Create an Account</a></h6>";
                              }
                              ?>
                    <div id="login">
                         <p>Please provide your login information below.</p>
                         <form action="login.php" method="POST">
                              <input type="email" name="email" id="login-email" placeholder="Your Email ID" required>
                              <input type="password" name="password" id="login-pwd" pattern="^[a-zA-Z0-9]{6,12}$" placeholder="Password" required>
                              <input type="submit" id="login-submit" value="SUBMIT">
                         </form>
                         <p class="left">Forgot your password?</p>
                         <a href="pwdchange" title="Change your password">We'll email it to you.</a>
                    </div>
               </div>
               <?php $_SESSION['current']=$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING']; ?>
<!-- ********************************************************************* -->    
               <a href="wishlist" title="View your wishlist">           
               <div class="grid_4 pointer" onmouseover="tabshow('wishlist_mini')" onmouseout="tabhide('wishlist_mini')">
                    <div class="grid_2 alpha">
                         <img src="img/wishlist.png" width="31" height="34" class="center_align">
                    </div>
                    <div class="grid_2 omega">
                         <h4>Wishlist</h4><h6><?php
                                                  if ((isset($_SESSION['login']))&&($_SESSION['login'])&&(isset($_SESSION['wishlist']))) {
                                                       if(count($_SESSION['wishlist'])==1){
                                                            echo "1 item";
                                                       } else {
                                                            echo count($_SESSION['wishlist'])." items";
                                                       }
                                                  } else{
                                                       echo "0 items";
                                                  }
                                             ?></h6>
                    </div>
               </div>
               </a>
               <div id="wishlist_mini" onmouseover="tabshow('wishlist_mini')" onmouseout="tabhide('wishlist_mini')">
                    <?php
                         if ((isset($_SESSION['login']))&&($_SESSION['login'])&&(isset($_SESSION['wishlist']))&&(count($_SESSION['wishlist'])!=0)) {
                              $number=0;
                              foreach ($_SESSION['wishlist'] as $key => $value) {
                                   $number++;
                                   echo "<h6>".$number.".</h6>";
                                   echo "<hr>";
                                   $sql="SELECT ImageFolderLink, productmaster.ProductID, Brand, productmaster.ProductName, SP
                                   FROM productmaster JOIN subproduct
                                   WHERE productmaster.ProductID = subproduct.ProductID
                                   AND subproduct.SubProductID='".$key."'";
                                   $query=mysql_query($sql);
                                   $row=mysql_fetch_row($query);
                                   echo "<h5>".$row[2]." ".$row[3]."</h5>";
                                   echo "<div class=\"clearfix\"></div>";
                                   echo "<img src=\"".$row[0]."thumb.jpg\" width=\"140\" height=\"112\" class=\"left\">";
                                   echo "<a href=\"cart?action=move&subid=".$key."\" title=\"Add to Cart\">Add to Cart</a>";
                                   echo "<br>";
                                   echo "<a href=\"wishlist?action=remove&subid=".$key."\" title=\"Remove from Wishlist\">Remove</a>";
                                   }
                              echo "<hr>";
                         } else {
                              echo "<p>Save items that you would like to purchase at a later date.</p><a href=\"wishlist\" title=\"View your wishlist\">View your wishlist</a>";
                         }
                    ?>
               </div>
<!-- ********************************************************************* -->
               <a href="cart" title="View your cart">
               <div class="grid_4 omega pointer" onmouseover="tabshow('cart_mini')" onmouseout="tabhide('cart_mini')">
                    <div class="grid_2 alpha">
                         <img src="img/cart.png" width="32" height="24" class="center_align">
                    </div>
                    <div class="grid_2 omega">
                         <h4>Cart</h4><h6><?php
                                                  if ((isset($_SESSION['login']))&&($_SESSION['login'])&&(isset($_SESSION['cart']))) {
                                                       if(count($_SESSION['cart'])==1){
                                                            echo "1 item";
                                                       } else {
                                                            echo count($_SESSION['cart'])." items";
                                                       }
                                                  } else{
                                                       echo "0 items";
                                                  }
                                             ?></h6>
                    </div>
               </div>
               </a>
               <div id="cart_mini" onmouseover="tabshow('cart_mini')" onmouseout="tabhide('cart_mini')">
                    <?php
                         if ((isset($_SESSION['login']))&&($_SESSION['login'])&&(isset($_SESSION['cart']))&&(count($_SESSION['cart'])!=0)) {
                              $number=0;
                              $total=0;
                              foreach ($_SESSION['cart'] as $key => $value) {
                                   $number++;
                                   echo "<h6>".$number.".</h6>";
                                   echo "<hr>";
                                   $sql="SELECT ImageFolderLink, productmaster.ProductID, Brand, productmaster.ProductName, SP
                                   FROM productmaster JOIN subproduct
                                   WHERE productmaster.ProductID = subproduct.ProductID
                                   AND subproduct.SubProductID='".$key."'";
                                   $query=mysql_query($sql);
                                   $row=mysql_fetch_row($query);
                                   echo "<h5>".$row[2]." ".$row[3]."</h5>";
                                   echo "<div class=\"clearfix\"></div>";
                                   echo "<img src=\"".$row[0]."thumb.jpg\" width=\"135\" height=\"108\" class=\"left\">";
                                   echo "<a href=\"cart?action=remove&subid=".$key."\" title=\"Remove your cart\">Remove</a>";
                                   echo "<a href=\"checkout\" title=\"Checkout\">Checkout</a>";
                                   $total=$total+$row[4]*$value;
                                   }
                              echo "<hr>";
                              $total=number_format($total, 0, ' ', ',');
                              echo "Total:&nbsp;&nbsp;<b class=\"ruppeefont\">`</b> ".$total;
                         } else {
                              echo "<p>Add items to your cart.</p><h4><a href=\"cart\" title=\"View your cart\">View your cart</a></h4><a href=\"checkout\" title=\"Checkout\">Checkout</a>";
                         }
                    ?>
               </div>
<!-- ********************************************************************* -->               
          </div>
          <div class="top container_24 clearfix">
              <a href="faq#cod" title="Cash on Delivery is applicable in specific regions only"><div class="grid_5 push_5 no-border"><img src="img/cod.png" width="156" height="33"></div></a>
               <div class="grid_5 push_5 no-border"><img src="img/shipping.png" width="156" height="33"></div>
               <div class="grid_8 push_5 no-border">
                    <form action="products" method="GET"><input type="search" placeholder="Search entire store here" name="s"></form>
               </div>
          </div>
          <nav class="clearfix">
               <div class="container_24 relative">
               <ul id="main-nav">
                    <li class="main-nav-item">
                         <a href="products?type=Drivers&amp;page=0" class="main-nav-tab" title="Drivers">Drivers</a>
                              <div class="main-nav-dd">
                                   <div class="main-nav-dd-column">
                                         <h3>BRANDS</h3>
                                             <ul>
                                                  <li><a href="products?type=Drivers&amp;brand=Callaway&amp;page=0" title="Callaway Drivers">Callaway &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;brand=Cobra&amp;page=0" title="Cobra Drivers">Cobra &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;brand=Ping&amp;page=0" title="Ping Drivers">Ping &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;brand=TaylorMade&amp;page=0" title="TaylorMade Drivers">TaylorMade &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;brand=Titleist&amp;page=0" title="Titleist Drivers">Titleist &rsaquo;</a></li>
                                             </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                        <h3>LOFT</h3>
                                             <ul>
                                                  <li><a href="products?type=Drivers&amp;loft=8.5&amp;page=0" title="Drivers: 8.5 &deg; Loft">8.5 &deg; &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;loft=9&amp;page=0" title="Drivers: 9 &deg; Loft">9 &deg; &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;loft=9.5&amp;page=0" title="Drivers: 9.5 &deg; Loft">9.5 &deg; &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;loft=10&amp;page=0" title="Drivers: 10 &deg; Loft">10 &deg; &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;loft=10.5&amp;page=0" title="Drivers: 10.5 &deg; Loft">10.5 &deg; &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;loft=12&amp;page=0" title="Drivers: 12 &deg; Loft">12 &deg; &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;loft=13.5&amp;page=0" title="Drivers: 13.5 &deg; Loft">13.5 &deg; &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;loft=14&amp;page=0" title="Drivers: 14 &deg; Loft">14 &deg; &rsaquo;</a></li>
                                             </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                         <h3>Flex</h3>
                                             <ul>
                                                  <li><a href="products?type=Drivers&amp;flex=regular&amp;page=0" title="Regular Flex Drivers">Regular &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;flex=stiff&amp;page=0" title="Stiff Flex Drivers">Stiff &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;flex=L&amp;page=0" title="Light Flex Drivers">L &rsaquo;</a></li>
                                                  <li><a href="products?type=Drivers&amp;flex=X-Stiff&amp;page=0" title="Extra-Stiff Flex Drivers">X-Stiff &rsaquo;</a></li>
                                             </ul>
                                   </div>
                              </div>
                    </li>
                    <li class="main-nav-item">
                         <a href="products?type=Fairways&amp;page=0" class="main-nav-tab" title="Fairway Woods">Fairways</a>
                              <div class="main-nav-dd">
                                   <div class="main-nav-dd-column">
                                        <h3>BRANDS</h3>
                                        <ul>
                                             <li><a href="products?type=Fairways&amp;brand=Callaway&amp;page=0" title="Callaway Fairways">Callaway &rsaquo;</a></li>
                                             <li><a href="products?type=Fairways&amp;brand=Cobra&amp;page=0" title="Cobra Fairways">Cobra &rsaquo;</a></li>
                                             <li><a href="products?type=Fairways&amp;brand=Ping&amp;page=0" title="Ping Fairways">Ping &rsaquo;</a></li>
                                             <li><a href="products?type=Fairways&amp;brand=TaylorMade&amp;page=0" title="TaylorMade Fairways">TaylorMade &rsaquo;</a></li>
                                             <li><a href="products?type=Fairways&amp;brand=Titleist&amp;page=0" title="Titleist Fairways">Titleist &rsaquo;</a></li>
                                        </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                        <h3>FLEX</h3>
                                        <ul>
                                             <li><a href="products?type=Fairways&amp;flex=regular&amp;page=0" title="Regular Flex Fairways">Regular &rsaquo;</a></li>
                                             <li><a href="products?type=Fairways&amp;flex=stiff&amp;page=0" title="Stiff Flex Fairways">Stiff &rsaquo;</a></li>
                                             <li><a href="products?type=Fairways&amp;flex=L&amp;page=0" title="Light Flex Fairways">L &rsaquo;</a></li>
                                             
                                        </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                        <h3>HEAD</h3>
                                        <ul>
                                             <li><a href="products?type=Fairways&amp;head=3 wood&amp;page=0" title="#3 Fairway Woods">3 Wood &rsaquo;</a></li>
                                             <li><a href="products?type=Fairways&amp;head=4 wood&amp;page=0" title="#4 Fairway Woods">4 Wood &rsaquo;</a></li>
                                             <li><a href="products?type=Fairways&amp;head=5 wood&amp;page=0" title="#5 Fairway Woods">5 Wood &rsaquo;</a></li>
                                             <li><a href="products?type=Fairways&amp;head=7 wood&amp;page=0" title="#7 Fairway Woods">7 Wood &rsaquo;</a></li>
                                        </ul>
                                   </div>
                              </div>
                    </li>
                    <li class="main-nav-item">
                         <a href="products?type=Hybrids&amp;page=0" class="main-nav-tab" title="Hybrids">Hybrids</a>
                              <div class="main-nav-dd">
                                   <div class="main-nav-dd-column">
                                        <h3>BRANDS</h3>
                                             <ul>
                                                  <li><a href="products?type=Hybrids&amp;brand=Callaway&amp;page=0" title="Callaway Hybrids">Callaway &rsaquo;</a></li>
                                                  <li><a href="products?type=Hybrids&amp;brand=Cobra&amp;page=0" title="Cobra Hybrids">Cobra &rsaquo;</a></li>
                                                  <li><a href="products?type=Hybrids&amp;brand=Ping&amp;page=0" title="Ping Hybrids">Ping &rsaquo;</a></li>
                                                  <li><a href="products?type=Hybrids&amp;brand=TaylorMade&amp;page=0" title="TaylorMade Hybrids">TaylorMade &rsaquo;</a></li>
                                                  <li><a href="products?type=Hybrids&amp;brand=Titleist&amp;page=0" title="Titleist Hybrids">Titleist &rsaquo;</a></li>
                                             </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                        <h3>FLEX</h3>
                                        <ul>
                                             <li><a href="products?type=Hybrids&amp;flex=L&amp;page=0" title="Light Flex Hybrids">L &rsaquo;</a></li>
                                             <li><a href="products?type=Hybrids&amp;flex=regular&amp;page=0" title="Regular Flex Hybrids">Regular &rsaquo;</a></li>
                                             <li><a href="products?type=Hybrids&amp;flex=stiff&amp;page=0" title="Stiff Flex Hybrids">Stiff &rsaquo;</a></li>
                                        </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                        <h3>HEAD</h3>
                                        <ul>
                                             <li><a href="products?type=Hybrids&amp;head=2 Hybrid&amp;page=0" title="#2 Hybrid">2 Hybrid &rsaquo;</a></li>
                                             <li><a href="products?type=Hybrids&amp;head=3 Hybrid&amp;page=0" title="#3 Hybrid">3 Hybrid &rsaquo;</a></li>
                                             <li><a href="products?type=Hybrids&amp;head=4 Hybrid&amp;page=0" title="#4 Hybrid">4 Hybrid &rsaquo;</a></li>
                                             <li><a href="products?type=Hybrids&amp;head=5 Hybrid&amp;page=0" title="#5 Hybrid">5 Hybrid &rsaquo;</a></li>
                                             <li><a href="products?type=Hybrids&amp;head=6 Hybrid&amp;page=0" title="#6 Hybrid">6 Hybrid &rsaquo;</a></li>
                                        </ul>
                                   </div>
                              </div>
                    </li>
                    <li class="main-nav-item">
                         <a href="products?type=Irons&amp;page=0" class="main-nav-tab" title="Irons">Irons</a>
                              <div class="main-nav-dd">
                                   <div class="main-nav-dd-column">
                                        <h3>BRANDS</h3>
                                             <ul>
                                                  <li><a href="products?type=Irons&amp;brand=Callaway&amp;page=0" title="Callaway Irons">Callaway &rsaquo;</a></li>
                                                  <li><a href="products?type=Irons&amp;brand=Cobra&amp;page=0" title="Cobra Irons">Cobra &rsaquo;</a></li>
                                                  <li><a href="products?type=Irons&amp;brand=Ping&amp;page=0" title="Ping Irons">Ping &rsaquo;</a></li>
                                                  <li><a href="products?type=Irons&amp;brand=TaylorMade&amp;page=0" title="TaylorMade Irons">TaylorMade &rsaquo;</a></li>
                                                  <li><a href="products?type=Irons&amp;brand=Titleist&amp;page=0" title="Titleist Irons">Titleist &rsaquo;</a></li>
                                             </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                        <h3>FLEX</h3>
                                        <ul>
                                             <li><a href="products?type=Irons&amp;flex=Ladies&amp;page=0" title="Ladies Flex Irons">Ladies &rsaquo;</a></li>
                                             <li><a href="products?type=Irons&amp;flex=regular&amp;page=0" title="Regular Flex Irons">Regular &rsaquo;</a></li>
                                             <li><a href="products?type=Irons&amp;flex=stiff&amp;page=0" title="Stiff Flex Irons">Stiff &rsaquo;</a></li>
                                             <li><a href="products?type=Irons&amp;flex=uniflex&amp;page=0" title="Uniflex Flex Irons">Uniflex &rsaquo;</a></li>
                                             <li><a href="products?type=Irons&amp;flex=5.5&amp;page=0" title="5.5 Flex Irons">5.5 &rsaquo;</a></li>
                                        </ul>
                                   </div>
                                   <!--
                                   <div class="main-nav-dd-column">
                                        <h3>SHAFT</h3>
                                        <ul>
                                             <li><a href="products?type=Irons&amp;ShaftMaterial=steel&amp;page=0">Steel Shaft &rsaquo;</a></li>
                                             <li><a href="products?type=Irons&amp;ShaftMaterial=graphite&amp;page=0">Graphite Shaft &rsaquo;</a></li>
                                        </ul>
                                   </div> -->
                              </div>
                    </li>
                    <li class="main-nav-item">
                         <a href="products?type=Wedges&amp;page=0" class="main-nav-tab">WEDGES</a>
                              <div class="main-nav-dd">
                                   <div class="main-nav-dd-column">
                                        <h3>BRANDS</h3>
                                        <ul>
                                             <li><a href="products?type=Wedges&amp;brand=Callaway&amp;page=0" title="Callaway Wedges">Callaway &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;brand=Cleveland&amp;page=0" title="Cleveland Wedges">Cleveland &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;brand=Cobra&amp;page=0" title="Cobra Wedges">Cobra &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;brand=Ping&amp;page=0" title="Ping Wedges">Ping &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;brand=TaylorMade&amp;page=0" title="TaylorMade Wedges">TaylorMade &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;brand=Titleist&amp;page=0" title="Titleist Wedges">Titleist &rsaquo;</a></li>
                                        </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                         <h3>LOFT</h3>
                                             <ul>
                                                  <li><a href="products?type=Wedges&amp;loft=47&amp;page=0" title="Wedges: 47 &deg; Loft">47 ° &rsaquo;</a></li>
                                                  <li><a href="products?type=Wedges&amp;loft=48&amp;page=0" title="Wedges: 48 &deg; Loft">48 ° &rsaquo;</a></li>
                                                  <li><a href="products?type=Wedges&amp;loft=49&amp;page=0" title="Wedges: 49 &deg; Loft">49 ° &rsaquo;</a></li>
                                                  <li><a href="products?type=Wedges&amp;loft=50&amp;page=0" title="Wedges: 50 &deg; Loft">50 ° &rsaquo;</a></li>
                                                  <li><a href="products?type=Wedges&amp;loft=51&amp;page=0" title="Wedges: 51 &deg; Loft">51 ° &rsaquo;</a></li>
                                                  <li><a href="products?type=Wedges&amp;loft=52&amp;page=0" title="Wedges: 52 &deg; Loft">52 ° &rsaquo;</a></li>
                                                  <li><a href="products?type=Wedges&amp;loft=53&amp;page=0" title="Wedges: 53 &deg; Loft">53 ° &rsaquo;</a></li>
                                                  <li><a href="products?type=Wedges&amp;loft=54&amp;page=0" title="Wedges: 54 &deg; Loft">54 ° &rsaquo;</a></li>
                                                  
                                             </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                        <h3>&nbsp;</h3>
                                        <ul>
                                             <li><a href="products?type=Wedges&amp;loft=55&amp;page=0" title="Wedges: 55 &deg; Loft">55 ° &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;loft=56&amp;page=0" title="Wedges: 56 &deg; Loft">56 ° &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;loft=57&amp;page=0" title="Wedges: 57 &deg; Loft">57 ° &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;loft=58&amp;page=0" title="Wedges: 58 &deg; Loft">58 ° &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;loft=50&amp;page=0" title="Wedges: 50 &deg; Loft">59 ° &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;loft=60&amp;page=0" title="Wedges: 60 &deg; Loft">60 ° &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;loft=50&amp;page=0" title="Wedges: 50 &deg; Loft">61 ° &rsaquo;</a></li>
                                             <li><a href="products?type=Wedges&amp;loft=64&amp;page=0" title="Wedges: 64 &deg; Loft">64 ° &rsaquo;</a></li>
                                        </ul>
                                   </div>     
                              </div>
                    </li>
                    <li class="main-nav-item">
                         <a href="products?type=Putters&amp;page=0" class="main-nav-tab">PUTTERS</a>
                              <div class="main-nav-dd">
                                   <div class="main-nav-dd-column">
                                        <h3>BRAND</h3>
                                             <ul>
                                                  <li><a href="products?type=Putters&amp;brand=Odyssey&amp;page=0" title="Odyssey Putters">Odyssey &rsaquo;</a></li>
                                                  <li><a href="products?type=Putters&amp;brand=Ping&amp;page=0" title="Odyssey Putters">Ping &rsaquo;</a></li>
                                                  <li><a href="products?type=Putters&amp;brand=Scotty Cameron&amp;page=0" title="Odyssey Putters">Scotty-Cameron &rsaquo;</a></li>
                                             </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                        <h3>TYPE</h3>
                                             <ul>
                                                  <li><a href="products?type=Putters&amp;head=blade&amp;page=0" title="Blade Putters">Blade &rsaquo;</a></li>
                                                  <li><a href="products?type=Putters&amp;head=mallet&amp;page=0" title="Mallet Putters">Mallet &rsaquo;</a></li>
                                                  <li><a href="products?type=Putters&amp;head=belly-mallet&amp;page=0" title="Belly-Mallet Putters">Belly Mallet &rsaquo;</a></li>
                                                  <li><a href="products?type=Putters&amp;head=belly-blade&amp;page=0" title="Belly-Blade Putters">Belly Blade &rsaquo;</a></li>
                                             </ul>
                                   </div>
                              </div>
                    </li>
                    <li class="main-nav-item">
                         <a href="products?type=Balls&amp;page=0" class="main-nav-tab">BALLS</a>
                              <div class="main-nav-dd">
                                   <div class="main-nav-dd-column">
                                        <h3>BRANDS</h3>
                                             <ul>
                                                  <li><a href="products?type=Balls&amp;brand=Bridgestone&amp;page=0" title="Bridgestone Balls">BridgeStone &rsaquo;</a></li>
                                                  <li><a href="products?type=Balls&amp;brand=Callaway&amp;page=0" title="Callaway Balls">Callaway &rsaquo;</a></li>
                                                  <li><a href="products?type=Balls&amp;brand=Inesis&amp;page=0" title="Inesis Balls">Inesis &rsaquo;</a></li>
                                                  <li><a href="products?type=Balls&amp;brand=Nike&amp;page=0" title="Nike Balls">Nike &rsaquo;</a></li>
                                                  <li><a href="products?type=Balls&amp;brand=Pinnacle&amp;page=0" title="Pinnacle Balls">Pinnacle &rsaquo;</a></li>
                                                  <li><a href="products?type=Balls&amp;brand=Srixon&amp;page=0" title="Srixon Balls">Srixon &rsaquo;</a></li>
                                                  <li><a href="products?type=Balls&amp;brand=TaylorMade&amp;page=0" title="TaylorMade Balls">TaylorMade &rsaquo;</a></li>
                                                  <li><a href="products?type=Balls&amp;brand=Titleist&amp;page=0" title="Titleist Balls">Titleist &rsaquo;</a></li>
                                                  <li><a href="products?type=Balls&amp;brand=Top Flite&amp;page=0" title="Top Flite Balls">Top Flite &rsaquo;</a></li>
                                                  <li><a href="products?type=Balls&amp;brand=Wilson&amp;page=0" title="Wilson Balls">Wilson &rsaquo;</a></li>
                                                  
                                             </ul>
                                   </div>
                              </div>
                    </li>
                    <li class="main-nav-item">
                         <a href="products?type=Full Sets&amp;page=0" class="main-nav-tab">FULL SETS</a>
                              <div class="main-nav-dd">
                                   <div class="main-nav-dd-column">
                                        <h3></h3>
                                             <ul>
                                                  <li><a href="products?type=Full Sets&amp;brand=Callaway&amp;page=0" title="Callaway Full Sets">Callaway &rsaquo;</a></li>
                                                  <li><a href="products?type=Full Sets&amp;brand=Cobra&amp;page=0" title="Cobra Full Sets">Cobra &rsaquo;</a></li>
                                                  <!-- <li><a href="products?type=Full Sets&amp;brand=golden bear&amp;page=0" title="Golden Bear Full Sets">Golden Bear &rsaquo;</a></li> -->
                                                  <li><a href="products?type=Full Sets&amp;brand=Ping&amp;page=0" title="Ping Full Sets">Ping &rsaquo;</a></li>
                                                  <li><a href="products?type=Full Sets&amp;brand=TaylorMade&amp;page=0" title="TaylorMade Full Sets">TaylorMade &rsaquo;</a></li>
                                                  <li><a href="products?type=Full Sets&amp;brand=us kids&amp;page=0" title="US Kids Full Sets">US Kids &rsaquo;</a></li>
                                                  
                                             </ul>
                                   </div>
                              </div>
                    </li>
                    <li class="main-nav-item">
                         <a href="products?SubType=accessories&amp;page=0" class="main-nav-tab">ACCESSORIES</a>
                              <div class="main-nav-dd">
                                   <div class="main-nav-dd-column">
                                        <ul>
                                             <li><a href="products?type=Bags&amp;page=0" title="Bags">Bags &rsaquo;</a></li>
                                             <li><a href="products?type=Covers&amp;page=0" title="Covers">Covers &rsaquo;</a></li>
                                             <li><a href="products?type=Headwear&amp;page=0" title="Headwear">Headwear &rsaquo;</a></li>
                                             <li><a href="products?type=Gloves&amp;page=0" title="Gloves">Gloves &rsaquo;</a></li>
                                             <li><a href="products?type=Grips&amp;page=0" title="Grips">Grips &rsaquo;</a></li>
                                        </ul>
                                   </div>
                                   <div class="main-nav-dd-column">
                                        <ul>
                                             <li><a href="products?type=Rangefinders&amp;page=0" title="Rangefinders">Rangefinders &rsaquo;</a></li>
                                             <li><a href="products?type=Sleeves&amp;page=0" title="Sleeves">Sleeves &rsaquo;</a></li>
                                             <li><a href="products?type=Training Aids&amp;page=0" title="Training Aids">Training Aids &rsaquo;</a></li>
                                             <li><a href="products?type=Trolleys&amp;page=0" title="Trolleys">Trolleys &rsaquo;</a></li>
                                             <li><a href="products?type=Umbrellas&amp;page=0" title="Umbrellas">Umbrellas &rsaquo;</a></li>
                                        </ul>
                                   </div>
                              </div>
                    </li>
                    <li class="main-nav-item">
                         <a href="products?type=Footwear&amp;page=0" class="main-nav-tab" title="Footwear">FOOTWEAR</a>
                    </li>
                    <li class="main-nav-item">
                         <a href="customise" class="main-nav-tab" title="Customise it! Section">CUSTOMISE IT!</a>
                    </li>
               </ul>

          </div>
          </nav>
</header>
<?php
$men="products?player=men&page=0";
$ladies="products?player=ladies&page=0";
$juniors="products?player=juniors&page=0";
$lefthanders="products?hand=Left Handed&page=0";
$offer="products?SubType=Offer&page=0";

$sliders="
<div class=\"slider\">
   <div class=\"slider-wrapper theme-default\">
       <div id=\"slider\" class=\"nivoSlider\">
          <a href=\"index\"><img src=\"slider/1.jpg\" data-thumb=\"slider/1.jpg\" alt=\"\"/></a>
          <a href=\"product?id=174\"><img src=\"offers/2.jpg\" data-thumb=\"offers/2.jpg\" alt=\"\"/></a>
          <a href=\"contactus\"><img src=\"slider/2.jpg\" data-thumb=\"slider/2.jpg\" alt=\"\"/> </a>  
           <a href=\"product?id=35\"><img src=\"offers/4.jpg\" data-thumb=\"offers/4.jpg\" alt=\"\" /></a>
          <a href=\"customise\"> <img src=\"slider/3.jpg\" data-thumb=\"slider/3.jpg\" alt=\"\"/></a>
           <a href=\"product?id=235\"><img src=\"offers/5.jpg\" data-thumb=\"offers/5.jpg\" alt=\"\"/></a>
       </div>
   </div>
</div>
";

?>
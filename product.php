<?php
include_once 'connection.php';
include'functions.php';
$id=$_GET['id'];
if (!isset($_COOKIE["$id"])) {
     setcookie("$id", "1", time()+60*60*6);
     $GetViewSQL="SELECT views FROM productmaster WHERE ProductID=".$id;
     $GetViewQuery=mysql_query($GetViewSQL);
     $GetView=mysql_fetch_row($GetViewQuery);
     $views = $GetView[0]+1;
     $UpdateViewSQL="UPDATE productmaster SET views= ".$views." WHERE ProductID=".$id;
     $UpdateViewQuery=mysql_query($UpdateViewSQL);
}
?>
<?php include 'header.php'; 
if (isset($_SESSION['lastpage'])) {
  unset($_SESSION['lastpage']);
}
?>
  <div role="main" class="container_24">
          <div class="relative clearfix">
               <div class="sidemenu grid_4">
                    <ul>
                         <li><a href="<?php echo $men; ?>">Men<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                         <li><a href="<?php echo $ladies; ?>">Ladies<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                         <li><a href="<?php echo $juniors; ?>">Juniors<img src="img/plus.png" width="16" height="16" class="right"></a></li>
                         <li><a href="<?php echo $lefthanders; ?>" class="no-border">Left-handers<img src="img/plus.png" width="16" height="16" class="right"></a></li>
<!--                         <li><a href="<?php echo $offer; ?>" class="no-border">Offers<img src="img/plus.png" width="16" height="16" class="right"></a></li>
-->                    </ul>
               </div>
              <a href="special" class="so" title="Contact us if you can’t find what you are looking for.">
                <img src="img/so.png" width="18" height="109" class="center_align">
                <img src="img/white_button.png" width="22" height="21" class="center_align">
              </a>
              <a href="feedback" class="f" title="Share your ideas, expectations and views with us.">
                <img src="img/f.png" width="14" height="78" class="center_align">
                <img src="img/white_button.png" width="22" height="21" class="center_align">
              </a>
          </div>
<?php
/*--------------------------------------------------------------------------------------------------------------------------------------- 
                                            Get the constant values
----------------------------------------------------------------------------------------------------------------------------------------*/
$constantsql="SELECT ProductID, ProductName, Brand, MRP, SP, ImageFolderLInk, ProductDescription, Rating, TimesRated, Quantity, Type ,Video
FROM productmaster 
WHERE Enabled='1' AND ProductID='".$id."'";
$constantquery=mysql_query($constantsql);
$constant=mysql_fetch_row($constantquery);
$quantity=$constant[9];
//-----------------------------------------------------Breadcrumbs
echo "<div id=\"product_breadcrumb\">";
echo "<a href=\"index\"><img src=\"img/gazeebo.png\" width=\"33\" height=\"32\" class=\"left\">Home &gt; </a>";
echo "<a href=\"products?type=".$constant[10]."&page=0\">".ucfirst($constant[10])." &gt; </a>";
echo "<a href=\"products?brand=".$constant[2]."&page=0\">".ucfirst($constant[2])." &gt; </a>";
echo "<a href=\"product?id=".$constant[0]."&page=0\">".ucfirst($constant[1])."</a>";
echo "</div>";
/*--------------------------------------------------------------------------------------------------------------------------------------- 
                                            Decide which table headings will be shown
----------------------------------------------------------------------------------------------------------------------------------------*/
$th = array(
     'Loft' => NULL,
     'Hand' => NULL,
     'Flex' => NULL,
     'Shaft' => NULL,
     'Player' => NULL,
     'Head' => NULL,
     'Bounce' => NULL,
     'Size' => NULL,
     'Colour' => NULL,
     'Glove'  => NULL,
     'Offset' => NULL,
     'Length' => NULL,
     
     );
$absent=0;
foreach ($th as $key => &$value) {
     $thsql="SELECT DISTINCT ".stripslashes($key)." FROM productmaster JOIN subproduct WHERE productmaster.ProductID = subproduct.ProductID 
     AND Enabled='1' AND productmaster.ProductID='".$id."'";
     $thquery=mysql_query($thsql);
     if ($thresult=mysql_fetch_row($thquery)) {
          if ($thresult[0]==NULL) {
               $value=0;
               $absent++;
          } else {
               $value=1;
          }
     } else {
          $value=1;
     }
}
$count_th=count($th);
$present=$count_th-$absent;            // Number to be changed if total number of columns increses.
unset($value);
//--------------------------------------------------------Get the variable table values
$sql1="SELECT ProductID, SubProductID, ";
foreach ($th as $key => $value) {
     if ($value==1) {
          $sql1=$sql1.$key.", ";
     }
}
$sql1=substr($sql1, 0, -2);
$sql2=" FROM subproduct WHERE ProductID='".$id."'";
$sql=$sql1.$sql2;
$query=mysql_query($sql);
echo "<div id=\"productpage\"><h2>".$constant[2]." ".$constant[1]."</h2><hr>";
/*--------------------------------------
         Image Zoom-In Viewer Code
---------------------------------------*/
echo "<div id=\"content\" class=\"alpha grid_10 omega\"><div><a href=\"".$constant[5]."1.jpg\" class=\"jqzoom left\" rel='gal1'  title=\"".$constant[2]." ".$constant[1]."\" ><img src=\"".$constant[5]."1_small.jpg\"  alt=\"".$constant[2]." ".$constant[1]."\"></a></div>";
echo "<h6>Hover over image to zoom.</h6>";
echo      "<div><ul id=\"thumblist\">";
               for ($i=1; $i < 4; $i++) {
                    $img_check=$constant[5].$i.".jpg";
                    if (file_exists($img_check)) {
                         echo "<li>";
                         echo ($i==1) ? "<a class=\"zoomThumbActive\"" : "<a";
                         echo " href='javascript:void(0);' rel=\"{gallery: 'gal1', smallimage: '".$constant[5].$i."_small.jpg',largeimage: '".$constant[5].$i.".jpg'}\"><img src='".$constant[5].$i."_thumb.jpg'></a>";
                         echo "</li>";
                    }
               }
echo      "</ul></div>";
echo "</div>";
echo "<div class=\"alpha grid_14 omega product_info\">
<form name=\"product\" action=\"\" id=\"product\"method=\"GET\">
<h3>Product Specifications</h3><table><tr>";

//--------------------------------------------------------Write out the variable table headings
foreach ($th as $key => $value) {
     if ($value==1) {
          echo "<th>".$key."</th>";
     }
}
echo "<th>Qty.</th>";         //-----------------------------add a static quantity column at the end
echo "<th>Select</th>";       //-----------------------------add a static  select  column at the end
echo "</tr>";

while ($result=mysql_fetch_array($query)) {
     echo "<tr>";
     for ($i=2; $i < $present+2; $i++) {
          echo "<td>".ucfirst($result[$i])."</td>";
     }
     echo "<td>".$quantity."</td>";               //--------statically write out the quantity for each row
     echo "<td><input type=\"radio\" name=\"subid\" value=\"".$result[1]."\" ></td>";               //--------statically write out the select radio buttons
     echo "</tr>";
}
echo "</table>";
$mrp=number_format($constant[3], 0, ' ', ',');
$sp=number_format($constant[4], 0, ' ', ',');
if ($mrp==$sp) {
     echo "<h3 class=\"left sp\">Sale Price: <b class=\"ruppeefont\">`</b> ".$sp."</h3><div class=\"clearfix\"></div>";
} else {
     echo "<h3 class=\"left mrp\">Regular Price: <b class=\"ruppeefont\">`</b> ".$mrp."</h3><div class=\"clearfix\"></div><h3 class=\"left sp\">Sale Price: <b class=\"ruppeefont\">`</b> ".$sp."</h3><div class=\"clearfix\"></div>";
}

//-----------------------------------------------------------Ratings & Reviews
$rating=round($constant[7]);
//echo "rating=".$rating;
echo"<div class=\"ratingdiv\" id=\"rating\" data-rating=\"".$rating."\" id=\"".$id."\">";

if($constant[8]!=0){
     echo "<h3 class=\"left\">Ratings</h3><div class=\"clearfix\"></div>";
     
     if ($rating > 5) { $rating=5; }
     for ($i=0; $i < $rating; $i++) {
          echo "<a class=\"ratinglink\" rel=\"no-follow\" href=\"rating?id=".$id."&val=".($i+1)."\"><img src=\"img/star_green.png\" width=\"8\" height=\"8\" class=\"star_".($i+1)." left\"></a>";
     }
     if ($rating < 5) {
          for ($i=0; $i < (5-$rating); $i++) { 
               echo "<a class=\"ratinglink\" rel=\"no-follow\" href=\"rating?id=".$id."&val=".($i+$rating+1)."\"><img src=\"img/star_gray.png\" width=\"8\" height=\"8\" class=\"star_".($i+$rating+1)." left\"></a>";
          }
     }
     echo "<h6 class=\"left\">[ ".$constant[8]." Ratings ]</h6>";
     echo "<br><p><a href=\"#review\">Read all Reviews</a> | <a href=\"#write_review\">Write a review</a></p>";
     echo "<br><p class=\"red\">Please select the option of your choice to add the product to your cart or wishlist</p>";

} else{
     echo "<h3 class=\"left\">Ratings</h3><div class=\"clearfix\"></div>";
     for ($i=0; $i < 5; $i++) { 
          echo "<a class=\"ratinglink\" href=\"rating?id=".$id."&val=".($i+1)."\"><img src=\"img/star_gray.png\" width=\"8\" height=\"8\" class=\"star_".($i+1)." left\"></a>";
     }
     echo "<h6 class=\"left\">[ ".$constant[8]." Ratings ]</h6>";
     echo "<br><p><a href=\"#321\">Be the first to rate this product</a> | <a href=\"#write_review\">Be the first to share your views on this product</a></p>";
     echo "<br><p class=\"red\">Please select the option of your choice to add the product to your cart or wishlist</p>";
}
echo "</div>";

//----------------------------------------------------Buttons & Stuff
echo "<input type=\"hidden\" value=\"".$id."\" name=\"id\" >";
echo "<input type=\"hidden\" value=\"add\" name=\"action\" >";
echo "<input class=\"button\" type=\"submit\" value=\"Add to wishlist\" onclick=\"changelocation('wishlist.php')\"><img src=\"img/wishlist_small.png\" width=\"16\" height=\"15\">";
echo "<input class=\"button\" type=\"submit\" value=\"Add to cart\" onclick=\"changelocation('cart.php')\"><img src=\"img/cart_gray.png\" width=\"32\" height=\"24\">";
//echo "<a href=\"#\"><button class=\"button\" role=\"button\">Checkout</button></a>";
echo "</form>";
echo "</div>";
echo "<div class=\"clearfix\"></div>";
$likepage="http://golfessentials.in/".$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING'];
echo "<div class=\"clearfix recommend\">
<h3 class=\"left\">Recommend to a Friend: </h3>
     <div id=\"mailimage\">
          <a href=\"share?id=".$id."&name=".$constant[2]." ".$constant[1]."\"><img src=\"img/mail.png\" width=\"27\" height=\"20\"></a>
     </div>
     <div id=\"pinimage\">
          <a href=\"http://pinterest.com/pin/create/button/?description=".urlencode(GetHeaderTitle($id))."&url=http%3A%2F%2Fgolfessentials.in%2Fproduct%3Fid%3D".$id."&media=http%3A%2F%2Fgolfessentials.in%2F".urlencode($constant[5])."1_small.jpg\" class=\"pin-it-button\" count-layout=\"horizontal\"><img border=\"0\" src=\"//assets.pinterest.com/images/PinExt.png\" title=\"Pin It\"/></a>
     </div>
     <div class=\"fb-like\" id=\"fbimage\" data-href=\"".$likepage."\" data-send=\"true\" data-width=\"100\" data-show-faces=\"false\">
 
     </div>
     <div id=\"tweetimage\">
          <a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-lang=\"en\">Tweet</a>
     </div>
</div>";

echo "<div class=\"grid_18 description left alpha omega\"><h3>Product Description</h3>";
if ($constant[11]!=NULL) {
  echo $constant[11];
}
echo $constant[6];
//-------------------------------------------------------------- REVIEWS
echo "<br /><h6>Note: The images shown above are indicative only, actual product may differ according to the selection of specifications.</h6><br><a id=\"review\"><h3>Reviews</h3></a><hr>";
$get_review="SELECT Comment, username, UNIX_TIMESTAMP(DateAdded) FROM comments WHERE ProductID=".$id." AND showing='1'" ;
$review_query=mysql_query($get_review);
$review_count=mysql_num_rows($review_query);
if($review_count==0){
  echo "<br>There are no reviews for this product. Be the first one to write it.";
}
if($review_query){
     while($reviews=mysql_fetch_array($review_query)){
          echo "<br>";
          echo $reviews[0]."<br>";
          echo "<h5>by: ".$reviews[1]." on ".date('F, d Y', $reviews[2])."</h5><br><br>";
     }
}
$_SESSION['productpage']=$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING'];
echo "<br><br>";
echo "<a id=\"write_review\"><h4>Write a Review</h4></a>";
echo "<form action=\"".$_SESSION['productpage']."\" method=\"POST\">";
echo "<textarea rows=\"12\" cols=\"20\" name=\"review\" required></textarea><br><br>";
echo "<input type=\"hidden\" value=\"$id\" name=\"pid\" required>";
echo "<label >Your Name:* </label>";

if(isset($_SESSION['login'])&& $_SESSION['login'])
{
  echo "<input class=\"review_colour\" type=\"text\" name=\"name\" value=\"".ucfirst(GetCustomerDetails('fname'))." ".ucfirst(GetCustomerDetails('lname'))."\"required /><br><br>";
}
else
{
echo "<input class=\"review_colour\" type=\"text\" name=\"name\" required /><br><br>";
}
echo "<h6>Fields marked with * are required. </h6>";
echo "<input type=\"submit\" value=\"Submit Review\" required>";
echo "</form>";

 if(isset($_POST['review'])){
    $rev=sanitizeMySQL($_POST['review']);
    $pid=sanitizeMySQL($_POST['pid']);
    $name=sanitizeMySQL($_POST['name']);

  $insert="INSERT INTO comments(`ProductID`, `Comment`, `username`) VALUES (".$pid.", '".$rev."', '".$name."')";
  $insert_query=mysql_query($insert);
  
if($insert_query){
  echo "<script type=\"text/javascript\">";
echo "window.alert(\"Your review has been saved and is pending approval. Thank you for your submission!\");";
echo "</script>";
}
  
}

//----------------------------------------------------------------------
echo "</div>";
//--------------------------------------------- FEATURED PRODUCTS ---------------------------------------------------------------
echo "<div class=\"grid_5 omega\" id=\"featured\"><h2>&nbsp Related Products</h2>";
$featured=mysql_query("SELECT ImageFolderLInk, ProductName, Rating, MRP, SP, ProductID, Brand FROM productmaster WHERE Type='$constant[10]' AND Enabled='1' AND ProductID!='$constant[0]' ORDER BY RAND() LIMIT 3");
while ($featuredrow=mysql_fetch_array($featured)) {
     echo "<a href=\"product?id=".$featuredrow[5]."\">";
     echo "<div class=\"product alpha right\">";
     echo "<img src=\"".$featuredrow[0]."thumb.jpg\">";
     echo "<hr>";
     echo "<h5><b>".$featuredrow[6]."</b></h5><h5>".$featuredrow[1]."</h5>";
     //----------------------------------------Temporary Solution
                    echo "<div class=\"rating left\">0 reviews</div>";
/*
     echo "<div class=\"rating left\">";
     $rating_green=$featuredrow[2];
     $rating_gray=5-$rating_green;
     for ($i=0; $i < $rating_green; $i++) { 
        echo "<img src=\"img/star_green.png\" width=\"8\" height=\"8\">";
     }
     for ($i=0; $i < $rating_gray; $i++) { 
        echo "<img src=\"img/star_gray.png\" width=\"8\" height=\"8\">";
     }
     echo "</div>";
*/
     $mrp=number_format($featuredrow[3], 0, ' ', ',');
     $sp=number_format($featuredrow[4], 0, ' ', ',');
     if($mrp==$sp){
        echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> ".$sp."</p>";
     } else{
     echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> <span>".$mrp."</span> ".$sp."</p>";
   }
     echo "</div></a>";
}
echo "</div><div class=\"clearfix\"></div>";
?>

<?php include 'footer.php'; ?>

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.2.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
-->
<script type="text/javascript" src="js/libs/jquery-1.8.2.min.js.gz"></script>
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
<script type='text/javascript' src='js/jquery.jqzoom-core.js.gz'></script>

<script type="text/javascript">
$(document).ready(function() {
     $('.jqzoom').jqzoom({
            zoomType: 'reverse',
            lens:true,
            preloadImages: false,
            alwaysOn:false
        });
     //$('.jqzoom').jqzoom();
});
</script>
<div id="fb-root"></div>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
<script src="js/script.js"></script>
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
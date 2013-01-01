<?php include 'header.php'; ?>
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
<?php
/*-------------------------------------------------------------------------------------------------------------
                                        Array to store query string values
---------------------------------------------------------------------------------------------------------------*/
$type=$brand=$flex=$hand=$player=$head=$bounce=$size=$colour=$loft=$glove=$subtype=$shaft_material=$bags=$material=$shoesize=$shaft=NULL;
$khali = 0;
$list=array(
  "type" => $type,
  "brand" => $brand,
  "flex" => $flex,
  "Shaft_Material" => $shaft,
  "Player_Hand" => $hand,
  "player" => $player,
  "head" => $head,
  "bounce" => $bounce,
  "Size" => $size,
  "SubType" =>$subtype,
  "Bag_Type"=>$bags,
  "colour" => $colour,
  "loft" => $loft,
  "Glove"=>$glove,
  "Shoe_Size"=>$shoesize
  
  );

foreach ($list as $key => &$value) {
  if (isset($_GET[$key])) {
    $value=$_GET[$key];
    $khali++;
  }
}
//print_r($list);
unset($value);

echo "<div id=\"breadcrumb\">";
echo "<a href=\"index\"><img src=\"img/gazeebo.png\" width=\"33\" height=\"32\" class=\"left\">Home &gt; </a>";
$p = (isset($_GET['page'])) ? $_GET['page'] : 0 ;
$BreadcrumbLink="products?page=".$p."&";
foreach ($list as $key => $value){
     if (isset($_GET[$key])) {
          $BreadcrumbLink.=$key."=".$value."&";
          echo "<a href=\"".substr($BreadcrumbLink, 0, -1)."\">".ucwords($_GET[$key])." &gt; </a>";
     }
}
echo "</div>";
echo "<div id=\"products\"><h2 class=\"filtercategory\">".strtoupper($list['type'])."</h2>";
echo "<div class=\"sort\">";
$CurrentLink=$_SESSION['current'];
if (isset($_GET['orderby'])) {
     $laststring = strrpos($CurrentLink, "&");
     $CurrentLink = substr($CurrentLink, 0, $laststring);
}
echo        "<span>Sort By: <a href=\"".$CurrentLink."&orderby=popularity\" rel=\"no-follow\">Popularity</a> / <a href=\"".$CurrentLink."&orderby=price\" rel=\"no-follow\">Price</a> / <a href=\"".$CurrentLink."&orderby=date\" rel=\"no-follow\">Newest</a>
      </div>
      <div class=\"clearfix\"></div>
      <hr>";
echo "<div class=\"productsbox\">";

    echo  "<div class=\"filter left\">";
         echo  "<div class=\"pf\"><h1>Narrow your Search</h1></div>";
//echo  "<ul><a href=\"list\">Reset your search</a></ul>";
/*-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
                                                  Filter Menu
---------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------*/

//   Change the display order in the following array to change the order of display of filter menu items
$filter = array('player' , 'type' , 'brand' , 'head' , 'Player Hand' , 'loft' , 'Shaft Material' ,'flex' ,  'Glove Hand', 'bounce' , 'size' , 'Shoe Size' , 'Bag Type' , 'colour');

foreach ($filter as $category) {
     $current=NULL;                                    //   Initialize the current [for preparing the unselect link] variable
     $link = (isset($_GET['s'])) ? 'products?s='.$_GET['s'].'&' : 'products?';    //   Intitalize the base link for filter links
     $sql="SELECT count( DISTINCT productmaster.ProductID ) FROM productmaster JOIN subproduct WHERE productmaster.ProductID = subproduct.ProductID 
     AND productmaster.Enabled='1' AND `".$category."` != 'NULL' AND ";                                            //   Initialize the base SQL query for getting number of products in each category
     foreach ($list as $key => $value) {
          if ($value!=NULL&&$key!=$category) {
              $key = str_replace('_', ' ', $key);
               $link .= $key."=".$value."&";        //   Depending on filters recieved via $_GET, generate
               $sql  .= "`".$key."`='".$value."' AND ";    //   full link & full sql query for filter menu subitems
              
          }
          if ($key==$category) {
               $current=$value;
          }
     }
     //echo $sql;
     if (isset($_GET['orderby'])) {
          switch ($_GET['orderby']) {
               case 'popularity':
                    $link .= "orderby=popularity&";
                    break;
               case 'price':
                    $link .= "orderby=price&";
                    break;
               case 'date':
                    break;
               default:
                    break;
          }
     }
     if (isset($_GET['s'])) {
          $search=trim(mysql_real_escape_string(stripslashes(htmlspecialchars($_GET['s']))));
          $terms=explode(' ', $search);
          $sql .= "Tags LIKE";
               foreach ($terms as $value) {
                    $sql .= " '%".$value."%' OR";
               }
          $sql = substr($sql, 0, -3);
          $sql .= " AND ";
     }
     //echo $sql;
     $unselectlink = substr($link, 0, -1);             //   Link for unselect option, generated by excluding current category from query string#     echo "Unselect Link = ".$unselectlink;
     $unselectsql = substr($sql, 0, -5);  //   SQL to find out total number of results for the whole category
     //echo $unselectsql;             
     $total = mysql_fetch_row(mysql_query($unselectsql));
     if($total[0]!=0) {                                //   If current category is not defined [NULL] in the database, skip displaying the menu
          echo "<ul>";  //   Category heading displayed in bold with Capitalized first letter
          echo ucwords(strtolower($category));//"<span class=\"right\">[".$total[0]."]</span>";   //   Total number of results for the current category, displayed in bold
          $namelist="select DISTINCT `".$category."` FROM productmaster JOIN subproduct WHERE productmaster.ProductID = subproduct.ProductID AND productmaster.Enabled='1' ORDER BY `".$category."`";
          //echo $namelist;
          // Above sql gets the list of different subcategories defined for the current category... for e.g. a list of all the brand names
          $query=mysql_query($namelist);               //   Generate list-items by selecting distinct values from the database for the category
          while ($row=mysql_fetch_array($query)) {     //   Fetch the list-items from database
               $subtotalquery=$sql."`".$category."`='".$row[0]."'";   //   Prepare the query for calculating the total for each list-item
#               echo $subtotalquery;
               $subtotal=mysql_fetch_row(mysql_query($subtotalquery));     //   Get the total for each list-item
               if($subtotal[0]!=0){                    //   If any list-item has zero results, skip displaying it
                    echo "<li>";                       //   Start displaying the list-items
                    if ($row[0]==$current) {           //   If current list-item is selected, display the deselect image right next to it
                         if ($khali == 1) {
                              echo "<a href=\"".$unselectlink."?page=0\" rel=\"nofollow\"><img src=\"img/deselect.png\" width=\"10\" height=\"10\"></a>";
                         } else {
                              echo "<a href=\"".$unselectlink."&page=0\" rel=\"nofollow\"><img src=\"img/deselect.png\" width=\"10\" height=\"10\"></a>";
                         }
                         echo "<a href=\"".$link.urlencode($category)."=".$row[0]."&page=0\" class=\"selected\" rel=\"no-follow\">".ucfirst($row[0])."</a>";
                    }                                  //   Unselect link works by excluding the current category from the query string
                    else{
                         echo "<a href=\"".$link.urlencode($category)."=".$row[0]."&page=0\" rel=\"nofollow\">".ucwords($row[0])."</a>";
                    }
                    echo "<span class=\"right\">[".$subtotal[0]."]</span>";
                    echo "</li>";
               }                                       //   If loop for displaying each list-item ends
          }                                            //   While loop for displaying all list-items ends
          echo "</ul>";
     }                                                 //   If loop for displaying the complete category ends
}
echo  "<div class=\"pf\"><h1><a href=\"".substr($_SERVER['SCRIPT_NAME'], 0, -4)."?page=0\" rel=\"nofollow\">Reset your Search</a></h1></div>";
echo "</div>";
/*-------------------------------------------------------------------------------------------------------------
---------------------------------------------------------------------------------------------------------------
                                                  Product Display
---------------------------------------------------------------------------------------------------------------
-------------------------------------------------------------------------------------------------------------*/
$limit=16;
if(isset($_GET['page'])) {
     $page=$_GET['page'];
     $offset=$page*$limit;
}
else {
     $page=0;
     $offset=0;
}
/*--------------------------------------------------------------------------------------------------------------
                                                  Normal Product Display
---------------------------------------------------------------------------------------------------------------*/
if (!isset($_GET['s'])) {
     $displaysql="
          SELECT DISTINCT productmaster.ProductID, ImageFolderLInk, ProductName, Rating, MRP, SP, Brand, ProductDescription
          FROM productmaster JOIN subproduct 
          WHERE productmaster.ProductID = subproduct.ProductID AND productmaster.Enabled=1 AND ";
     foreach ($list as $key => $value) {
          if ($value!=NULL) {
            $key = str_replace('_', ' ', $key);
               $displaysql=$displaysql."`".$key."`='".$value."' AND ";
          }
     }
     $displaysql=substr($displaysql, 0, -5);
     $num=mysql_num_rows(mysql_query($displaysql));    // Total number of products to be shown
     if (!isset($_GET['orderby'])) {
        $displaysql .= " ORDER BY `productmaster`.`ProductName` DESC";
     }
     //echo $displaysql;
     if (isset($_GET['orderby'])) {
          switch ($_GET['orderby']) {
               case 'popularity':
                    $displaysql .= " ORDER BY  `productmaster`.`views` DESC";
                    break;
               case 'price':
                    $displaysql .= " ORDER BY  `productmaster`.`SP` ASC";
                    break;
               case 'date':
                    break;
               default:
                    break;
          }
     }
     $displaysql .= " LIMIT ".$offset.",".$limit;
     #echo $displaysql;
     $display=mysql_query($displaysql);
     if ($num!=0) {
          echo "<div class=\"boxes\">";
               $rownumber=0;
               while ($row=mysql_fetch_array($display)) {
                         echo "<a href=\"product?id=".$row[0]."\">";
                         if ($rownumber==0||4||8||12||16) { echo "<div class=\"product small right alpha\">"; }
                         elseif ($rownumber==3||7||11||15||19) { echo "<div class=\"product small right omega\">"; }
                         else{ echo "<div class=\"product small right\">"; }
                         echo "<img src=\"".$row[1]."thumb.jpg\">";
                         echo "<hr>";
                         echo "<h5 class=\"bold\">".$row[6]."</h5><h5>".$row[2]."</h5>";
                         echo "<div class=\"rating left\">0 reviews</div>";
                         if ($row[4]==$row[5]) {
                              echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> ".$row[5]."</p>";
                         } else {
                              echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> <span>".$row[4]."</span> ".$row[5]."</p>";
                         }
                         echo "</div></a>";
                         $rownumber++;
               }
          echo "</div>";
/*--------------------------------------------------------------------------------------------------------------
                                                  Pagination
---------------------------------------------------------------------------------------------------------------*/
          if (isset($_GET['orderby'])) {
               $order="";
               switch ($_GET['orderby']) {
                    case 'popularity':
                         $order .= "&orderby=popularity";
                         break;
                    case 'price':
                         $order .= "&orderby=price";
                         break;
                    case 'date':
                         $order .= "&orderby=date";
                         break;
                    default:
                         break;
               }
          }
          echo "<div class=\"pagination\"><ul>";
          $shown=$offset+$limit;
          $link='products?';
          if($page==0&&$num>$limit) {
               foreach ($list as $key => $value) {
                    if ($value!=NULL) {
                         $link=$link.$key."=".$value."&";
                    }
               }
               $ordermethod   =    (isset($order)) ? $order : "" ;
               $nextpage      =    $link."page=1".$ordermethod;
               $next          =    "<li><a href=\"".$nextpage."\">&gt;</a></li>";
          }
          else if( ($page>0) && ($num>$shown )) {
               foreach ($list as $key => $value) {
                    if ($value!=NULL) {
                         $link=$link.$key."=".$value."&";
                    }
               }
               $ordermethod   =    (isset($order)) ? $order : "" ;
               $previouspage  =    $link."page=".($page-1).$ordermethod;
               $nextpage      =    $link."page=".($page+1).$ordermethod;
               $previous      =    "<li><a href=\"".$previouspage."\">&lt;</a></li>";
               $next          =    "<li><a href=\"".$nextpage."\">&gt;</a></li>";
          }
          else if(($page>0) && ($num<$shown)) {        // No More records to show
               foreach ($list as $key => $value) {
                    if ($value!=NULL) {
                         $link=$link.$key."=".$value."&";
                    }
               }
               $ordermethod   =    (isset($order)) ? $order : "" ;
               $previouspage  =    $link."page=".($page-1).$ordermethod;
               $previous      =    "<li><a href=\"".$previouspage."\">&lt;</a></li>";
          }
          $number1=$num/$limit;
          if (($num%$limit)==0) {
               $pages=$number1;
          }
          else{
               $number2=explode('.',$number1);
               $pages=$number2[0]+1;
          }

          if (isset($previous)) {
               echo $previous;
          }
          for($i=1;$i<=$pages;$i++) {
               $pg=$i-1;
               $link='products?';
               foreach ($list as $key => $value) {
                    if ($value!=NULL) {
                         $link=$link.$key."=".$value."&";
                    }
               }
               $ordermethod   =    (isset($order)) ? $order : "" ;
               $link=$link."page=".$pg.$ordermethod;
               if ($pg==$page) {
                    echo "<li class=\"current\"><a href=\"".$link."\">".$i."</a></li>";
               }
               else{
                    echo "<li><a href=\"".$link."\">".$i."</a></li>";
               }
          }
          if (isset($next)) {
               echo $next;
          }
          $_SESSION['page']=$page;
          echo "</ul></div>";
          /*--------------------------------------------------------------------------------------------------------------
                                                            Code Ends
          ---------------------------------------------------------------------------------------------------------------*/
     }
     elseif($num==0){
          echo "<div class=\"emptysearch right\">";
          echo "<p>We're sorry, we couldn't find any items that matched your search. To search again, enter another item or keyword in the search box above. We recommend using a generic term to produce more results. You'll be able to refine your search by brand, price and more.</p>";
          echo "<ul class=\"empty\">If you still can’t find what you’re looking for:
               <li>- Contact us at <a href=\"mailto:support@golfessentials.in\">support@golfessentials.in</a> or +91-8968893333 and we will help you find the right product</li>
               <li>- Use our <a href=\"#\">Special Order</a> form and we will try our best to meet your requirement.</li>
               </ul>";
          echo "</div>";
     }
     echo "</div><div class=\"clearfix\"></div>";
}
/*--------------------------------------------------------------------------------------------------------------
                                                  Search Result Display
---------------------------------------------------------------------------------------------------------------*/
elseif (isset($_GET['s'])) {
     $search=trim(mysql_real_escape_string(stripslashes(htmlspecialchars($_GET['s']))));
     if ($search=="") {
          echo "<br>Please enter a keyword in the search box to generate results. Thank you!";
          $num=0;
     } else{
          $terms=explode(' ', $search);
          $basequery="
               SELECT DISTINCT productmaster.ProductID, ImageFolderLInk, ProductName, Rating, MRP, SP, Brand
               FROM productmaster JOIN subproduct 
               WHERE productmaster.ProductID = subproduct.ProductID AND productmaster.Enabled=1 AND ";
          foreach ($list as $key => $value) {
               if ($value!=NULL) {
                    $basequery=$basequery.$key."='".$value."' AND ";
               }
          }
          $basequery .= "Tags LIKE";
          foreach ($terms as $value) {
               $basequery .= " '%".$value."%' OR";
          }
          $basequery=substr($basequery, 0, -3);
          $num=mysql_num_rows(mysql_query($basequery));
          if (isset($_GET['orderby'])) {
               switch ($_GET['orderby']) {
                    case 'popularity':
                         $basequery .= " ORDER BY  `productmaster`.`views` ASC";
                         break;
                    case 'price':
                         $basequery .= " ORDER BY  `productmaster`.`SP` ASC";
                         break;
                    case 'date':
                         break;
                    default:
                         break;
               }
          }
          $basequery .= " LIMIT ".$offset.",".$limit;
          $searchquery=mysql_query($basequery);
          if ($num!=0) {
               echo "<div class=\"boxes\">";
               $rownumber=0;
               while ($row=mysql_fetch_array($searchquery)) {
                         echo "<a href=\"product?id=".$row[0]."\">";
                         if ($rownumber==0||4||8||12||16) { echo "<div class=\"product small right alpha\">"; }
                         elseif ($rownumber==3||7||11||15||19) { echo "<div class=\"product small right omega\">"; }
                         else{ echo "<div class=\"product small right\">"; }
                         echo "<img src=\"".$row[1]."thumb.jpg\">";
                         echo "<hr>";
                         echo "<h5 class=\"bold\">".$row[6]."</h5><h5>".$row[2]."</h5>";
                         echo "<div class=\"rating left\">0 reviews</div>";
                         if ($row[4]==$row[5]) {
                              echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> ".$row[5]."</p>";
                         } else {
                              echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> <span>".$row[4]."</span> ".$row[5]."</p>";
                         }
                         echo "</div></a>";
                         $rownumber++;
               }
               echo "</div>";
/*--------------------------------------------------------------------------------------------------------------
                                                  Pagination for Search Results
---------------------------------------------------------------------------------------------------------------*/
          if (isset($_GET['orderby'])) {
               $order="";
               switch ($_GET['orderby']) {
                    case 'popularity':
                         $order .= "&orderby=popularity";
                         break;
                    case 'price':
                         $order .= "&orderby=price";
                         break;
                    case 'date':
                         $order .= "&orderby=date";
                         break;
                    default:
                         break;
               }
          }
          echo "<div class=\"pagination\"><ul>";
          $shown=$offset+$limit;
          $link='products?';
          //echo "num=".$num."<br>limit=".$limit."<br>offset=".$offset."<br>shown=".$shown;
          $searchurl = urlencode($search);
          if($page==0&&$num>$limit) {
               foreach ($list as $key => $value) {
                    if ($value!=NULL) {
                         $link=$link.$key."=".$value."&";
                    }
               }
               $ordermethod   =    (isset($order)) ? $order : "" ;
               $nextpage      =    $link."s=".$searchurl."&page=1".$ordermethod;
               $next          =    "<li><a href=\"".$nextpage."\">&gt;</a></li>";
          }
          else if( ($page>0) && ($num>$shown )) {
               foreach ($list as $key => $value) {
                    if ($value!=NULL) {
                         $link=$link.$key."=".$value."&";
                    }
               }
               $ordermethod   =    (isset($order)) ? $order : "" ;
               $previouspage  =    $link."s=".$searchurl."&page=".($page-1).$ordermethod;
               $nextpage      =    $link."s=".$searchurl."&page=".($page+1).$ordermethod;
               $previous      =    "<li><a href=\"".$previouspage."\">&lt;</a></li>";
               $next          =    "<li><a href=\"".$nextpage."\">&gt;</a></li>";
          }
          else if(($page>0) && ($num<$shown)) {        // No More records to show
               foreach ($list as $key => $value) {
                    if ($value!=NULL) {
                         $link=$link.$key."=".$value."&";
                    }
               }
               $ordermethod   =    (isset($order)) ? $order : "" ;
               $previouspage  =    $link."s=".$searchurl."&page=".($page-1).$ordermethod;
               $previous      =    "<li><a href=\"".$previouspage."\">&lt;</a></li>";
          }
          $number1=$num/$limit;
          if (($num%$limit)==0) {
               $pages=$number1;
          }
          else{
               $number2=explode('.',$number1);
               $pages=$number2[0]+1;
          }

          if (isset($previous)) {
               echo $previous;
          }
          for($i=1;$i<=$pages;$i++) {
               $pg=$i-1;
               $link='products?';
               foreach ($list as $key => $value) {
                    if ($value!=NULL) {
                         $link=$link.$key."=".$value."&";
                    }
               }
               $ordermethod   =    (isset($order)) ? $order : "" ;
               $link=$link."s=".$searchurl."&page=".$pg.$ordermethod;
               if ($pg==$page) {
                    echo "<li class=\"current\"><a href=\"".$link."\">".$i."</a></li>";
               }
               else{
                    echo "<li><a href=\"".$link."\">".$i."</a></li>";
               }
          }
          if (isset($next)) {
               echo $next;
          }
          $_SESSION['page']=$page;
          echo "</ul></div>";
/*--------------------------------------------------------------------------------------------------------------
                                                  Code Ends
---------------------------------------------------------------------------------------------------------------*/
          }
          elseif($num==0){
               echo "<div class=\"emptysearch right\">";
               echo "<p class=\"left\">We're sorry, we couldn't find any items that matched your search. To search again, enter another item or keyword in the search box above. We recommend using a generic term to produce more results. You'll be able to refine your search by brand, price and more.</p>";
               echo "<ul class=\"empty right\">If you still can’t find what you’re looking for:
                    <li>- Contact us at <a href=\"mailto:support@golfessentials.in\">support@golfessentials.in</a> or +91-8968893333 and we will help you find the right product</li>
                    <li>- Use our <a href=\"special\">Special Order</a> form and we will try our best to meet your requirement.</li>
                    </ul>";
               echo "</div>";
          }
          echo "</div><div class=\"clearfix\"></div>";
     }
}
?>

<?php include 'footer.php'; ?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.2.min.js"><\/script>')</script>
<script src="js/plugins.js"></script>
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
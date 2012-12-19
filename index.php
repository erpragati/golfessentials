<?php
$title="golfessentials.in Home";
 include 'header.php';
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
               <h2>Latest Arrivals</h2>
               <hr>
<?php
///#################################### FEATURED PRODUCTS ROW ################################///
$featured=mysql_query("SELECT ImageFolderLInk, ProductName, Rating, MRP, SP, ProductID, Brand FROM productmaster WHERE latest='1' AND Enabled='1' ORDER BY RAND() LIMIT 5");
$rownumber=0;
while ($featuredrow=mysql_fetch_array($featured)) {
          echo "<a href=\"product?id=".$featuredrow[5]."\">";
          if ($rownumber==0) { echo "<div class=\"product alpha\">"; }
          elseif ($rownumber==4) { echo "<div class=\"product omega\">"; }
          else{ echo "<div class=\"product small right\">"; }

          echo "<img src=\"".$featuredrow[0]."thumb.jpg\">";
          echo "<hr>";
          echo "<h5 class=\"bold\">".$featuredrow[6]."</h5><h5>".$featuredrow[1]."</h5>";
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
          if ($mrp==$sp) {
                         echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> ".$sp."</p>";
                    } else {
                         echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> <span>".$mrp."</span> ".$sp."</p>";
                    }
                    echo "</div></a>";
                    $rownumber++;
          
}
///############################### MOST POPULAR PRODUCTS ROW #############################///
echo "<h2>Most Popular</h2><hr>";
$featured=mysql_query("SELECT ImageFolderLInk, ProductName, Rating, MRP, SP, ProductID, Brand FROM productmaster WHERE Enabled='1'  ORDER BY  `productmaster`.`views` DESC LIMIT 4");
$rownumber=0;
while ($featuredrow=mysql_fetch_array($featured)) {
          echo "<a href=\"product?id=".$featuredrow[5]."\">";
          if ($rownumber==0) { echo "<div class=\"product small alpha\">"; }
          elseif ($rownumber==3) { echo "<div class=\"product small omega\">"; }
          else{ echo "<div class=\"product small right\">"; }

          echo "<img src=\"".$featuredrow[0]."thumb.jpg\">";
          echo "<hr>";
          echo "<h5 class=\"bold\">".$featuredrow[6]."</h5><h5>".$featuredrow[1]."</h5>";
          //----------------------------------------Temporary Solution
          echo "<div class=\"rating left\">0 reviews</div>";
/*
          echo "<div class=\"rating left\">";
          $rating_green=$featuredrow[2];$rating_gray=5-$rating_green;
          for ($i=0; $i < $rating_green; $i++) { 
             echo "<img src=\"img/star_green.png\" width=\"8\" height=\"8\">";
          }
          for ($i=0; $i < $rating_gray; $i++) { 
             echo "<img src=\"img/star_gray.png\" width=\"8\" height=\"8\">";
          }
          echo "</div>";
*/
          if ($featuredrow[3]==$featuredrow[4]) {
                         echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> ".$featuredrow[4]."</p>";
                    } else {
                         echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> <span>".$featuredrow[3]."</span> ".$featuredrow[4]."</p>";
                    }
                    echo "</div></a>";
                    $rownumber++;
          
}
echo "<div class=\"ad_vertical right\"><a href=\"product?id=10\"><img src=\"offers/3.jpg\"></a></div>";
///################################## LATEST PRODUCTS ROW ################################///
echo "<h2>Featured</h2><hr>";
$featured=mysql_query("SELECT ImageFolderLInk, ProductName, Rating, MRP, SP, ProductID, Brand FROM productmaster WHERE featured='1' AND Enabled='1' ORDER BY RAND() LIMIT 4");
$rownumber=0;
while ($featuredrow=mysql_fetch_array($featured)) {
          echo "<a href=\"product?id=".$featuredrow[5]."\">";
          if ($rownumber==0) { echo "<div class=\"product small alpha\">"; }
          elseif ($rownumber==3) { echo "<div class=\"product small omega\">"; }
          else{ echo "<div class=\"product small right\">"; }

          echo "<img src=\"".$featuredrow[0]."thumb.jpg\">";
          echo "<hr>";
          echo "<h5 class=\"bold\">".$featuredrow[6]."</h5><h5>".$featuredrow[1]."</h5>";
          //----------------------------------------Temporary Solution
          echo "<div class=\"rating left\">0 reviews</div>";
/*
          echo "<div class=\"rating left\">";
          $rating_green=$featuredrow[2];$rating_gray=5-$rating_green;
          for ($i=0; $i < $rating_green; $i++) { 
             echo "<img src=\"img/star_green.png\" width=\"8\" height=\"8\">";
          }
          for ($i=0; $i < $rating_gray; $i++) { 
             echo "<img src=\"img/star_gray.png\" width=\"8\" height=\"8\">";
          }
          echo "</div>";
*/        
           if ($featuredrow[3]==$featuredrow[4]) {
                         echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> ".$featuredrow[4]."</p>";
                    } else {
                         echo "<p class=\"right\"><b class=\"ruppeefont\">`</b> <span>".$featuredrow[3]."</span> ".$featuredrow[4]."</p>";
                    }
                    echo "</div></a>";
                    $rownumber++;
}
?>
<?php include 'footer.php'; ?>
<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.2.min.js"><\/script>')</script>
-->
<script src="js/libs/jquery-1.8.2.min.js.gz"></script>
<script src="js/plugins.js.gz"></script>
<script src="js/script.js.gz"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js.gz"></script>
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
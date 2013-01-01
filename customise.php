<?php
$title="Customisation at golfessentials.in";
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
               <div class="customize">
               <h2>Customise it!</h2>
               <hr>
               <p>Welcome to Customise it! We at golfessentials.in strive to stand out in the marketplace and offer all of you an opportunity to stand out too!</p>
               <p>You can customise all your equipment here to make it suit you better. Whether you’re looking for a unique golf bag or running a corporate golf day, we can meet your requirements. Not only do we offer custom bags, we also supply branded gloves, hats, golf towels, golf pouches, umbrellas & shoe bags. We can make just about any golf accessory you might be looking for!</p>

               <br>
                    <div class="bagbox left">
                         <a href="minitour"><img src="JStewart/custom/bag1.jpg" height="300" width="250"></a>
                         <hr>
                         <h4>Premium Mini Tour Bag</h4>
                         <h5><b class="ruppeefont">`</b> 29,650</h5>
                    </div>
                    <div class="bagbox left">
                         <a href="tour"><img src="JStewart/custom/bag5.jpg" height="300" width="250"></a>
                         <hr>
                         <h4>Tour Bag</h3>
                         <h5><b class="ruppeefont">`</b> 31,950</h4>
                    </div>
                    <div class="bagbox left last">
                         <a href="staff"><img src="JStewart/custom/bag3.jpg" height="300" width="250"></a>
                         <hr>
                         <h4>Pro Staff Bag</h3>
                         <h5><b class="ruppeefont">`</b> 29,650</h4>
                    </div>
                    <div class="bagbox left">
                         <a href="duffel"><img src="JStewart/custom/bag4.jpg" height="300" width="250"></a>
                         <hr>
                         <h4>Duffel Bag</h3>
                         <h5>Price on request</h4>
                    </div>
                    <div class="bagbox left">
                         <a href="shoe"><img src="JStewart/custom/bag2.jpg" height="300" width="250"></a>
                         <hr>
                         <h4>Shoe Bag</h3>
                         <h5>Price on request</h4>
                    </div>
               <p>Just like ordering a tailored suit, you can create an individual golf bag by choosing your own specifications, colours and fabrics.</p>
               <p>If you’re organising a corporate event or competition, design bags and accessories using your company colours and logos, making them the perfect gift for all your participants – and an ideal way to promote your business!</p>
               <p>The production lead time is 60 days (special requests can be made).</p>
               <p>The order process is simple and once we have your design, we will send you detailed drawings for approval before we begin the production process.</p>
               <!--
               <p><b>Please note</b> that golfessentials.in extends a 6 month manufacturing warranty on its custom made products.</p>
               <p>To obtain warranty benefits, the defective product and a statement of the claimed defect must be provided to golfessentials.in. golfessentials.in reserves the right to inspect all warranty claims to determine the extent of warranty application. All products returned for warranty claims become the property of golfessentials.in. All returns must include a return authorization number that is clearly displayed on the outside of the package. Unauthorized returns will not be accepted.</p>
               -->
               </div>
<?php include 'footer.php'; ?>
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
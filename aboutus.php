<?php 
$title="About golfessentials.in";
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
<?php echo $sliders; ?>              <a href="special" class="so" title="Contact us if you can’t find what you are looking for.">
                <img src="img/so.png" width="18" height="109" class="center_align">
                <img src="img/white_button.png" width="22" height="21" class="center_align">
              </a>
              <a href="feedback" class="f" title="Share your ideas, expectations and views with us.">
                <img src="img/f.png" width="14" height="78" class="center_align">
                <img src="img/white_button.png" width="22" height="21" class="center_align">
              </a>
          </div>
          <div id="products">
            <div class="static">

<h2>About Us</h2>
<hr><br>
<p>golfessentials.in is the one-stop shop for golfers in India offering quality golf equipment at competent prices. At golfessentials.in, we enable you to compare different products, their pricing and evaluate what works best for you!</p>
<p>golfessentials.in is devoted to offering affordable equipment.  Whether you're a beginner, amateur or professional, the right equipment for you is available at golfessentials.in</p>
<p>We understand how frustrating it can be looking for that hard-to-find product that you know will improve your game! Keeping your individual needs in mind, we offer the <a href="special">Special Order</a> option wherein you can provide us with the details of what you're looking for and we will try our best to meet your requirement.</p>
<p>We aim to stand out in the marketplace and offer all of you an opportunity to stand out too with our <a href="customise">Customise It!</a> section wherein you can customise all your equipment to make it suit you better.</p>
<p>If you have any questions or comments, we encourage you to <a href="contactus">contact</a> one of our excellent support service employees who will be happy to help you.</p>
<p>golfessentials.in gives you more, for a lot less!</p>  
<br>
<span class="aboutus">
     <h2>WHAT WE STAND FOR</h2>
     <br>
     <table>
          <tr><th>Variety</th><th>Quality</th><th>Genuineness</th></tr>
          <tr>
               <td>We offer a wide range of Drivers, Fairways, Hybrids, Irons, Wedges, Putters, Balls, Full Kits, Accessories and Footwear.</td>
               <td>Our offerings include quality golf equipment from amongst the best brands in the market.</td>
               <td>We promise 100% genuine equipment.</td>
          </tr>
     </table>
</span>
</div>
<?php include 'footer.php'; ?>
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
<?php 
$title="Place a Special Order at golfessentials.in";
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
            <div class="static">

<h2>Special Order</h2>
<hr><br>
<?php if (isset($_SESSION['login'])) { ?>
<p>Can’t find what you’re looking for?</p>
<p>Please provide us with the following details and we will try our best to meet your requirement.</p>
<?php if (isset($_SESSION['OrderError'])&&$_SESSION['OrderError']!=""){
     echo "<ul>".$_SESSION['OrderError']."</ul>";
}
unset($_SESSION['OrderError']); ?>
<br>
<div class="contact">
     <form action="process.php" method="GET">
          <table>
               <tr><td>Product Category: <span class="requiredField">*</span></td><td>
                    <select name="category" required>
                         <option value="">Select a product type</option>
                         <option value="Driver">Driver</option>
                         <option value="Fairway">Fairway</option>
                         <option value="Hybrid">Hybrid</option>
                         <option value="Iron">Iron</option>
                         <option value="Wedge">Wedge</option>
                         <option value="Putter">Putter</option>
                         <option value="Ball">Ball</option>
                         <option value="Full Kit">Full Kit</option>
                         <option value="Accessory">Accessory</option>
                         <option value="Footwear">Footwear</option>
                         <option value="other">Other (Please specify)</option>
                    </select>
               </tr>
               <tr><td>Brand: <span class="requiredField">*</span></td><td>
                    <select name="brand" required>
                         <option value="">Select a brand</option>
                         <option value="Cleveland">Cleveland</option>
                         <option value="Odyssey">Odyssey</option>
                         <option value="Ping">Ping</option>
                         <option value="TaylorMade">TaylorMade</option>
                         <option value="Titliest">Titliest</option>
                         <option value="Cobra">Cobra</option>
                         <option value="Callaway">Callaway</option>
                         <option value="Bushnell">Bushnell</option>
                         <option value="Srixon">Srixon</option>
                         <option value="USKids">U.S. Kids Golf</option>
                         <option value="other">Other (Please specify)</option>
                    </select>
               </td></tr>
               <tr><td>Product name: <span class="requiredField">*</span></td><td><input type="text" placeholder="Name" name="productname" required></td></tr>
               
               <tr><td>Details: <span class="requiredField">*</span></td><td><textarea rows="20" cols="75" name="details" required></textarea></td></tr>
               <tr><td>Contact Details</td><td>
               <?php
                    echo GetCustomerDetails('fname')." ".GetCustomerDetails('lname')."<br>".GetCustomerDetails('addr').", ".GetCustomerDetails('city'),", ".GetCustomerDetails('state')." - ".GetCustomerDetails('pin')."<br>".GetCustomerDetails('mobile')."<br>".GetCustomerDetails('email');
               ?>
               </td></tr>
               <tr><td colspan="2"><h4><input type="hidden" name="se" value="TRUE"><input type="submit" value="Submit"></h4></td></tr>
               <tr><td></td><td><h5>Fields marked with <span class="requiredField">*</span> are required.</h5></td></tr>
          </table>
     </form>
</div>
<?php } else {
$_SESSION['lastpage']=$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING'];
?>
<p>You need to <a href="register">sign in</a> or <a href="register">register</a> to place a special order</p>
<?php } ?>
</div>
<?php include 'footer.php'; ?>
<!--
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.2.min.js.gz"><\/script>')</script>

  <script src="js/plugins.js"></script>
-->
    <script type="text/javascript" src="js/libs/jquery-1.8.2.min.js.gz"></script>
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
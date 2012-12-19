<?php 
$title="Contact golfessentials.in";
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

<h2>Contact Us</h2>
<hr><br>
<p>Fields marked with (*) are mandatory. All written information submitted must be in English.</p>
<p>Before using the contact form, we recommend checking our <a href="faq">FAQ section</a>. The answer to your query may already be there, so you don’t have to wait to hear from us!</p>
<p>To help us process your request as quickly as possible, please define in the 'Subject', the area that your feedback relates to and include technical specifications of your computer (model, capacity, OS &amp; version, browser and version, connection type) if your request is technical in nature.</p>
<br>
     <div class="contact">
          <form action="process.php" method="GET">
               <table>
                    <tr><td>Subject: <span class="requiredField">*</span></td><td><input type="text" placeholder="Subject" name="subject" required></td></tr>
                    <tr><td>Message: <span class="requiredField">*</span></td><td><textarea rows="20" cols="75" name="enquiry" required></textarea></td></tr>
                    <tr><td>Contact Details: <span class="requiredField">*</span></td><td>
                    <?php
                    if (isset($_SESSION['login'])) {
                         echo GetCustomerDetails('fname')." ".GetCustomerDetails('lname')."<br>".GetCustomerDetails('addr').", ".GetCustomerDetails('city'),", ".GetCustomerDetails('state')." - ".GetCustomerDetails('pin')."<br>".GetCustomerDetails('mobile')."<br>".GetCustomerDetails('email');
                    } else {
                         echo "<span class=\"bakwaas\">";
                              echo "<input type=\"text\" placeholder=\"Full Name\" name=\"name\" required><br>";
                              echo "<input type=\"number\" placeholder=\"Mobile\" name=\"mobile\"><br>";
                              echo "<input type=\"email\" placeholder=\"Email Address\" name=\"email\" required>";
                         echo "</span>";
                    }
                    ?>
                    </td></tr>
                    <tr><td colspan="2"><h4><input type="hidden" name="ce" value="TRUE"><input type="submit" value="Submit"></h4></td></tr>
                    <tr><td colspan="2"></td></tr>
                    <tr><td></td><td><h6>Fields marked with <span class="requiredField">*</span> are required.</h6></td></tr>
                    <tr><td></td><td><h6>Please check your email filters to ensure that you are able to receive emails from "golfessentials.in" otherwise our reply might not reach you.</h6></td></tr>
               </table>
          </form>
     </div>
<br>
<hr><br>
<table>
     <tr><th colspan="3">Alternatively you can contact us at</th></tr>
     <tr><td colspan="3"></td></tr>
     <tr><td>+91-8968893333</td><td><a href="mailto:info@golfessentials.in">info@golfessentials.in</td><td><a href="mailto:support@golfessentials.in">support@golfessentials.in</a></td></tr>
</table>
</div>
<?php include 'footer.php'; ?>
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
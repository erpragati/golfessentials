<?php 
$title="Share your feedback with us";
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

<h2>Feedback</h2>
<hr><br>
<?php if (isset($_SESSION['login'])) { ?>
<p>Thank you for visiting golfessentials.in! We strive to make your shopping experience as hassle-free as possible and would love to hear your thoughts.</p>
<?php if (isset($_SESSION['OrderError'])&&$_SESSION['OrderError']!=""){
     echo "<ul>".$_SESSION['OrderError']."</ul>";
}
unset($_SESSION['OrderError']); ?>
<br>
     <div class="contact">
          <form action="process.php" method="GET">
               <table>
                    <tr><td>Type of feedback: <span class="requiredField">*</span></td><td>
                         <select name="type" required>
                              <option value="">--- Select a feedback type ---</option>
                              <option value="Compliments">Compliments</option>
                              <option value="Grievances">Grievances</option>
                              <option value="Suggestions">Suggestions</option>
                              <option value="Enquiries ">Enquiries </option>
                         </select>
                    </td></tr>
                    <tr><td>Subject: <span class="requiredField">*</span></td><td>
                         <select name="subject" required>
                              <option value="">--- Select a feedback subject ---</option>
                              <option value="General">General</option>
                              <option value="Registration and Account Information">Registration and Account Information</option>
                              <option value="Availability of products">Availability of products </option>
                              <option value="Making a purchase">Making a purchase</option>
                              <option value="Support Service">Support Service</option>
                              <option value="Shipping ">Shipping </option>
                              <option value="Payment ">Payment </option>
                              <option value="Returns ">Returns </option>
                         </select>
                    </td></tr>
                    <tr><td>Message: <span class="requiredField">*</span></td><td><textarea rows="10" cols="65" name="message" required></textarea></td></tr>
                    <tr><td>Contact Details</td><td>
                    <?php
                    echo GetCustomerDetails('fname')." ".GetCustomerDetails('lname')."<br>".GetCustomerDetails('addr').", ".GetCustomerDetails('city'),", ".GetCustomerDetails('state')." - ".GetCustomerDetails('pin')."<br>".GetCustomerDetails('mobile')."<br>".GetCustomerDetails('email');
                    ?>
                    </td></tr>
                    <tr><td colspan="2"></td></tr>
                    <tr><td colspan="2"></td></tr>
<!--                    <tr><td colspan="2"><h5>Thank you for your continuous support and understanding!</h5></td></tr> -->
                    <tr><td colspan="2"></td></tr>
                    <tr><td colspan="2"><h4><input type="hidden" name="fe" value="TRUE"><input type="submit" value="Submit"></h4></td></tr>
                    <tr><td></td><td><h5>Fields marked with <span class="requiredField">*</span> are required.</h5></td></tr>
               </table>
          </form>
     </div>
<?php } else {
$_SESSION['lastpage']=$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING'];
?>
<p>Please <a href="register">sign in</a> or <a href="register">register</a> to share your feedback.</p>
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
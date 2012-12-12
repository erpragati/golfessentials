<?php session_start(); 
$title="Update Your Email Address at golfessentials.in";
include 'header.php'; include_once 'functions.php'; ?>
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
               <div class="account">
                    <div class="changedetails">
                         <h3>Change Email Address</h3><hr>
                         <p>Must be a valid email address, e.g. email@example.com</p>
                         <form action="changeinfo.php" method="POST">
                              <table>
                                   <tr>
                                        <td>Old Email Address</td>
                                        <td><input type="email" name="oldemail" tabindex="1"></td>
                                   </tr>
                                   <tr>
                                        <td>New Email Address</td>
                                        <td><input type="email"name="newemail" tabindex="2"></td>
                                   </tr>
                                   <tr>
                                        <td>Re-enter New Email Address</td>
                                        <td><input type="email"name="repeatemail" tabindex="3"></td>
                                   </tr>
                                   <tr>
                                        <td><input type="submit" value="Update" tabindex="4"></td>
                                        <td></td>
                                   </tr>
                              </table>
                         </form>
                    </div>
               </div>
<?php include 'footer.php'; ?>
    <script type="text/javascript" src="js/libs/jquery-1.8.2.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/validation.js"></script>
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
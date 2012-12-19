<?php session_start();
$title="Change Your Personal Information at golfessentials.in";
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
                         <h3>Personal Information</h3><hr>
                         <form action="changeinfo.php" method="POST">
                              <table>
                                   <tr>
                                        <td>Address</td>
                                        <td><input type="text" name="address" value="<?php echo GetCustomerDetails('addr') ?>"></td>
                                   </tr>
                                   <tr>
                                        <td>City</td>
                                        <td><input type="text" name="city" value="<?php echo GetCustomerDetails('city') ?>"></td>
                                   </tr>
                                   <tr>
                                        <td>State</td>
                                        <td>
                                             <select id="state" name="state">
                                             <option selected="selected" value="<?php echo GetCustomerDetails('state'); ?>">
                                                  <?php echo GetCustomerDetails('state'); ?>
                                             </option>
                                             <option value="Andaman and Nicobar Islands">Andaman and Nicobar</option>
                                             <option value="Andhra Pradesh">Andhra Pradesh</option>
                                             <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                             <option value="Assam">Assam</option>
                                             <option value="Bihar">Bihar</option>
                                             <option value="Chandigarh">Chandigarh</option>
                                             <option value="Chhattisgarh">Chhattisgarh</option>
                                             <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                             <option value="Daman and Diu">Daman and Diu</option>
                                             <option value="Delhi">Delhi</option>
                                             <option value="Goa">Goa</option>
                                             <option value="Gujarat">Gujarat</option>
                                             <option value="Haryana">Haryana</option>
                                             <option value="Himachal Pradesh">Himachal Pradesh</option>
                                             <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                             <option value="Jharkhand">Jharkhand</option>
                                             <option value="Karnataka">Karnataka</option>
                                             <option value="Kerala">Kerala</option>
                                             <option value="Lakshadweep">Lakshadweep</option>
                                             <option value="Madhya Pradesh">Madhya Pradesh</option>
                                             <option value="Maharashtra">Maharashtra</option>
                                             <option value="Manipur">Manipur</option>
                                             <option value="Meghalaya">Meghalaya</option>
                                             <option value="Mizoram">Mizoram</option>
                                             <option value="Nagaland">Nagaland</option>
                                             <option value="Orissa">Orissa</option>
                                             <option value="Pondicherry">Pondicherry</option>
                                             <option value="Punjab">Punjab</option>
                                             <option value="Rajasthan">Rajasthan</option>
                                             <option value="Sikkim">Sikkim</option>
                                             <option value="Tamil Nadu">Tamil Nadu</option>
                                             <option value="Tripura">Tripura</option>
                                             <option value="Uttar Pradesh">Uttar Pradesh</option>
                                             <option value="Uttrakhand">Uttrakhand</option>
                                             <option value="West Bengal">West Bengal</option>
                                             <option value="Army Post Office">Army Post Office</option> 
                                             </select>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Pin</td>
                                        <td><input type="text" name="pincode" value="<?php echo GetCustomerDetails('pin') ?>"></td>
                                   </tr>
                                   <tr>
                                        <td>Mobile</td>
                                        <td><input type="text" name="mobile" value="<?php echo GetCustomerDetails('mobile') ?>"></td>
                                   </tr>
                                   <tr>
                                        <td coslpan="2"><input type="submit" value="Update" ></td>
                                        <td></td>
                                   </tr>
                              </table>
                         </form>
                    </div>
               </div>
<?php include 'footer.php'; ?>
<!--
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.2.min.js.gz"><\/script>')</script>

  <script src="js/plugins.js"></script>
-->
    <script type="text/javascript" src="js/libs/jquery-1.8.2.min.js.gz"></script>
    <script src="js/script.js.gz"></script>
    <script src="js/validation.js.gz"></script>
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
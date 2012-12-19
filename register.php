<?php session_start(); 
if(!isset($_SESSION['login'])||!$_SESSION['login'])
     {
          $title="Sign In or Create an Account at golfessentials.in";
     }
elseif(isset($_SESSION['login'])&&$_SESSION['login'])
     {
          $title="Your Account Information at golfessentials.in";
     }
include 'header.php'; 
include_once 'functions.php'; ?>
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
               <?php
               if (!(isset($_SESSION['login']))||!$_SESSION['login']) {
                    if (isset($_SESSION['registererror'])&&$_SESSION['registererror']) {
                         echo "<div class=\"show_error\">";
                         echo $_SESSION['error'];
                         echo "</div>";
                    }
                    elseif (isset($_SESSION['loginerror'])&&$_SESSION['loginerror']) {
                         echo "<div class=\"show_error\">";
                         echo $_SESSION['error'];
                         echo "</div>";
                    }
               ?>
               <div class="register">
                    <h2>Register</h2>
                    <form action="registration.php" method="POST" class="cleanForm" id="signUpForm">
                         <fieldset>
                         <p>
                              <label for="CustFirstName">First Name: <span class="requiredField">*</span></label>
                              <input <?php echo (isset($_SESSION['fname_error'])) ? "class=\"errorbox\"" : "" ; ?> type="text" id="CustFirstName" name="CustFirstName" value="<?php echo (isset($_SESSION['fname'])) ? $_SESSION['fname'] : NULL ; ?>" required />
                              <em>Please enter your first name</em>
                         </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="CustLastName">Last Name: <span class="requiredField">*</span></label>
                              <input <?php echo (isset($_SESSION['lname_error'])) ? "class=\"errorbox\"" : "" ; ?> type="text" id="CustLastName" name="CustLastName" value="<?php echo (isset($_SESSION['lname'])) ? $_SESSION['lname'] : "" ; ?>" required />
                              <em>Please enter your last name</em>
                         </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="CustEmail">Email Address: <span class="requiredField">*</span></label>
                              <input <?php echo (isset($_SESSION['email_error'])) ? "class=\"errorbox\"" : "" ; ?> type="email" id="CustEmail" name="CustEmail" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : "" ; ?>" required />
                              <em>Must be a valid email address, e.g. email@example.com</em>
                         </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="CustPassword">Password: <span class="requiredField">*</span></label>
                              <input <?php echo (isset($_SESSION['pwd_error'])) ? "class=\"errorbox\"" : "" ; ?> type="password" id="CustPassword" name="CustPassword" value="" pattern="^[a-zA-Z0-9]{6,12}$" required />
                              <em>Must be between 6 and 12 characters, preferably alphanumeric</em>
                         </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="repeat">Re-enter Password: <span class="requiredField">*</span></label>
                              <input <?php echo (isset($_SESSION['rpwd_error'])) ? "class=\"errorbox\"" : "" ; ?> type="password" id="repeat" name="repeat" value="" pattern="^[a-zA-Z0-9]{6,12}$" required />
                              <em>Must be the same as entered above</em>
                         </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="gender">Gender : <span class="requiredField">*</span></label>
                              <input  type="radio" id="gender" name="gender" value="male" <?php echo (isset($_SESSION['gender'])&&$_SESSION['gender']=='male') ? "checked" : "" ; ?> required />&nbsp;Male&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <input  type="radio" id="gender" name="gender" value="female" <?php echo (isset($_SESSION['gender'])&&$_SESSION['gender']=='female') ? "checked" : "" ; ?> required />&nbsp;Female
                              <em>Please select your gender. This will help us personalise our service to you.</em>
                         </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="birthday">Age: <span class="requiredField">*</span></label>
                              <select id="age" name="age" required>
                                        <option selected="" value="<?php echo (isset($_SESSION['age'])) ? $_SESSION['age'] : "" ; ?>">
                                        <?php echo (isset($_SESSION['age'])) ? $_SESSION['age'] : "--- Age ---" ; ?>
                                        </option>
                                        <option value="upto 17">Upto 17</option>
                                        <option value="18 to 30">18-30</option>
                                        <option value="30 to 50">30-50</option>
                                        <option value="above 50">Above 50</option>
                              </select>
                              <em>Please select your Age Group.</em>
                        </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="CustAddress1">Address : <span class="requiredField">*</span></label>
                              <input <?php echo (isset($_SESSION['add_error'])) ? "class=\"errorbox\"" : "" ; ?> type="text" id="CustAddress1" name="CustAddress1" pattern="^[a-zA-Z0-9-#.!,@\[\]\(\)\/ ]+$" value="<?php echo (isset($_SESSION['add'])) ? $_SESSION['add'] : "" ; ?>" required />
                              <em>Please enter your mailing address</em>
                         </p>
                         
                         <div class="clearfix"></div>
                         <p>
                              <label for="CustCity">City: <span class="requiredField">*</span></label>
                              <input <?php echo (isset($_SESSION['city_error'])) ? "class=\"errorbox\"" : "" ; ?> type="text" id="CustCity" name="CustCity" pattern="^[a-zA-Z-& ]+$" value="<?php echo (isset($_SESSION['city'])) ? $_SESSION['city'] : "" ; ?>" required />
                              <em>Please enter the city you reside in</em>
                         </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="state">State: <span class="requiredField">*</span></label>
                              <select id="state" name="state" required>
                                        <option selected="" value="<?php echo (isset($_SESSION['state'])) ? $_SESSION['state'] : "" ; ?>">
                                        <?php echo (isset($_SESSION['state'])) ? $_SESSION['state'] : "--- select a state ---" ; ?></option>
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
                              <em>Please select the state you reside in</em>
                         </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="CustPostalcode">Postal Code: <span class="requiredField">*</span></label>
                              <input <?php echo (isset($_SESSION['pin_error'])) ? "class=\"errorbox\"" : "" ; ?> type="number" id="CustPostalcode" name="CustPostalcode" min="000000" max="999999" maxlength="6" pattern="^[0-9]{6}$" value="<?php echo (isset($_SESSION['pin'])) ? $_SESSION['pin'] : "" ; ?>" required />
                              <em>Must be of exactly 6 numbers</em>
                         </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="CustMobile">Mobile: <span class="requiredField">*</span></label>
                              <input <?php echo (isset($_SESSION['mob_error'])) ? "class=\"errorbox\"" : "" ; ?> type="tel" id="CustMobile" name="CustMobile" value="<?php echo (isset($_SESSION['mob'])) ? $_SESSION['mob'] : "" ; ?>" pattern="^[0-9-]{8,15}$" required/>
                              <em>Please enter your mobile number so that we can assist you better.</em>
                         </p>
                         <div class="clearfix"></div>
                         <p>
                              <label for="SecondNum">Telephone:</label>
                              <input type="tel" id="SecondNum" name="SecondNum" value="" pattern="^[0-9-]{7,12}$" />
                              <em>Please enter your landline number</em>
                         </p>
                         <div class="clearfix"></div>
                         <div class="distanceLeft">
                              <input type="checkbox"  name="ToS" <?php echo (isset($_SESSION['tos'])&&$_SESSION['tos']) ? "checked" : "" ;?> >&nbsp;&nbsp;&nbsp;I have read &amp; agree to the <a href="tos" target="_blank" >Terms of Service</a>.
                         </div>
                         <input type="submit" value="Register" />
                         <?php 
                         unset(
                         $_SESSION['fname'],$_SESSION['fname_error'],
                         $_SESSION['lname'],$_SESSION['lname_error'],
                         $_SESSION['email'],$_SESSION['email_error'],
                         $_SESSION['pwd'],$_SESSION['pwd_error'],
                         $_SESSION['rpwd'],$_SESSION['rpwd_error'],
                         $_SESSION['add'],$_SESSION['add_error'],
                         $_SESSION['city'],$_SESSION['city_error'],
                         $_SESSION['state'],$_SESSION['state_error'],
                         $_SESSION['pin'],$_SESSION['pin_error'],
                         $_SESSION['mob'],$_SESSION['mob_error'],
                         $_SESSION['phone'],$_SESSION['phone_error'],
                         $_SESSION['tos'],$_SESSION['tos_error'],
                         $_SESSION['tin'],$_SESSION['tin_error'],
                         $_SESSION['error'],$_SESSION['registererror'],
                         $_SESSION['gender'],$_SESSION['gender_ererror'],
                         $_SESSION['age'],$_SESSION['loginerror']
                         );
                         ?>

                         <div class="formExtra">
                              <p>* Fields marked with <span class="requiredField">*</span> are required.</p>
                              <p>** Important shipping confirmation and product availability status will be sent to the email address entered here.<br><br>
                                   We value our customers’ privacy and will not give out your details.</p>
                         </div>

                         </fieldset>
               
                    </form>
               </div> <!-- end register -->
               <div class="register login">
                    <h2>Sign In</h2>
                    <form action="login.php" method="POST" id="signInForm">
                         <fieldset>
                         <p>
                              <label for="email">Email: <span class="requiredField">*</span></label>
                              <input type="email" id="email2" name="email" value="" required />
                         </p>
                         <div class="clearfix"></div>
                         <br>
                         <p>
                              <label for="password">Password: <span class="requiredField">*</span></label>
                              <input type="password" id="password" name="password" value="" pattern="^[a-zA-Z0-9]{6,12}$"  />
                         </p>
                         <div class="clearfix"></div>
                         <br>
                         <input type="submit" value="Sign In" />

                         </fieldset>
               
                    </form>
                    <br>
                    <a href="pwdchange" id="fgtpwd">Forgot Your Password?</a>
               </div> <!-- end register -->
               <?php
               }
               elseif($_SESSION['login']){
                    ?>
                    <div class="basepage">
                         <h3>My Account</h3>
                         <hr>
                         <ul>
                              <h4>Account Information</h4>
                              <li><a target="_blank" href="changepassword">Change Password</a></li>
                              <li><a target="_blank" href="changeemail">Change Email Address</a></li>
                              <li><a target="_blank" href="infochange">Personal Information</a></li>
                              <li><a target="_blank" href="orderhistory">Orders</a></li>
                         </ul>
                         <?php
                         if (isset($_SESSION['pi'])) {echo "<h5>(Your Personal Information has been successfuly changed.)</h5>"; unset($_SESSION['pi']);}
                         if (isset($_SESSION['p'])) {echo "<h5>(Your Password has been successfuly changed.)</h5>"; unset($_SESSION['p']);}
                         if (isset($_SESSION['e'])) {echo "<h5>(Your Email ID has been successfuly changed.)</h5>"; unset($_SESSION['e']);}
                         ?>
                         <h4>Preferred Contact Options</h4>
                         <p>Occasionally, golfessentials.in will send you news, offers and more. Please let us know how would you like to hear from us.<br>(Please check all that apply)</p>
                         <form class="subscribe" action="subscribe.php" method="GET">
                              <?php
                                   $subscribe="SELECT email, mobile FROM subscribers WHERE customerid=".$_SESSION['CustomerID'];
                                   $query=mysql_query($subscribe);
                                   $num=mysql_num_rows($query);
                                   $value=mysql_fetch_row($query);
                                   echo "<br>";
                                   if ($num==0) {
                                        echo "<input type=\"checkbox\" name=\"subscribe_email\">&nbsp;Email<br>";
                                        echo "<input type=\"checkbox\" name=\"subscribe_mobile\">&nbsp;SMS<br>";
                                   } else {
                              ?>
                              <input type="checkbox" <?php if($value[0]!=='0'){echo "checked ";} ?>name="subscribe_email">&nbsp;Email<br>
                              <input type="checkbox" <?php if($value[1]!=0){echo "checked ";} ?>name="subscribe_mobile">&nbsp;SMS<br>
                              <?php } ?>
                              <input type="hidden" name="unsubscribe" value="<?php echo GetCustomerDetails('email'); ?>">
                         <input type="submit" value="Update">
                    </form>
               </div>
               <?php
          }
     ?>
 <?php include 'footer.php'; ?>
<!--
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.2.min.js.gz"><\/script>')</script>

  <script src="js/plugins.js.gz"></script>
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
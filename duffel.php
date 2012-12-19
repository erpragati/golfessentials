<?php 
$title="Duffel Bag at golfessentials.in";
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
                    <h2>Duffel Bag</h2>
                    <hr>
                    <div id="content" class="alpha grid_10 omega">
                         <div>
                              <a href="JStewart/custom/duffel bag/1.jpg" class="jqzoom left" rel='gal2'  title=" " >
                                   <img src="JStewart/custom/duffel bag/1_small.jpg"  title=" ">
                              </a>
                         </div>
                         <div>
                              <ul id="thumblist">
                                   <li>
                                        <a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal2', smallimage: 'JStewart/custom/duffel bag/1_small.jpg',largeimage: 'JStewart/custom/duffel bag/1.jpg'}">
                                             <img src='JStewart/custom/duffel bag/1_thumb.jpg'>
                                        </a>
                                   </li>
                                   <li>
                                        <a href='javascript:void(0);' rel="{gallery: 'gal2', smallimage: 'JStewart/custom/duffel bag/2_small.jpg',largeimage: 'JStewart/custom/duffel bag/2.jpg'}">
                                             <img src='JStewart/custom/duffel bag/2_thumb.jpg'>
                                        </a>
                                   </li>
                              </ul>
                         </div>
                    </div>
                    <div class="alpha grid_14 omega details">
                         <p><b>Size</b> : 48cm x 32cm x 22cm</p>
                         <p><b>Fabrics</b> : PU, GLoss</p>
                         <p><b>Weight</b> : 1.6 kg</p>
                         <p><b>Embroidery Locations</b> : Side Panels</p>
                         <p><b>Player Name Embroidery</b> : Extra Cost</p>
                         <p><b>Production Lead Time</b> : 45-60 days</p>
                         <p class="green"><b>Minimum Order</b> : 50 Pieces</p>
                         <p class="green"><b>Price</b> : Price on Request</p>
                         <p><b>Note</b> : The price depends on the quantity and the complexity of the embroideries. You will be informed of the price shortly after you place your order.  You will then have the option to confirm or cancel your order.</p>
                         <ul>
                              <b>Extra Features:</b>
                              <li>-&nbsp;Large interior compartment</li>
                              <li>-&nbsp;Exterior zipped pocket, ideal for scorecards, tees etc.</li>
                              <li>-&nbsp;Separate shoe compartment (base of bag)</li>
                              <li>-&nbsp;Interior zipped pocket, great for your valuables</li>
                              <li>-&nbsp;Padded carrying strap</li>
                         </ul>
                    </div>
                    <div class="clearfix"></div>
                    <div class="placement">
                         <br>
                         <br>
                         <h2>How to customise your equipment:</h2>
                         <h5>Step 1. <a href="register" class="proper_link">Sign in</a> or <a href="register" class="proper_link">Register</a> to place an order</h5></a>
                         <h5>Step 2. Select the colours and personalised embroideries of your choice, and their placement, on the product. Please remember to upload the highest resolution file possible of the logos to ensure optimum quality output. EPS/open files, high resolution PDF files are preferred. The above mentioned price includes 3 personalised embroideries that would comprise of Name, Country Name, Logo and/or Website URL, which can be used in the combination of your choice. The maximum number of embroderies possible on this product is 3.</h5>
                         <h5>Step 3. Submit your order and wait to hear from us!</h5>
                         <h3>Color Guide</h3>
                         <hr>
                         <img src="JStewart/custom/colour.jpg"><br>
                         <img src="JStewart/custom/duffel%20bag/colorplacement.jpg">
                         <br>
                         <h3>Logo Placement</h3>
                         <hr>
                         <img src="JStewart/custom/duffel%20bag/logoplacement.jpg">
                         <br>
                         <h3>Colour Chart</h3>
                         <hr>
                         <img src="JStewart/custom/swatch.jpg">
                         <br>
                         <h3>Select Options</h3>
                         <hr>
                         <form action="customiseprocessing.php" method="POST" enctype="multipart/form-data" name="duffel" id="customiseform">
                              <table>
                                   <tr>
                                        <td class="green">Embroider name on the bag ?</td>
                                        <td class="green">Colour 1 <span class="requiredField">*</span></td></tr>
                                   <tr>
                                        <td>
                                             Yes&nbsp;<input type="radio" <?php if (isset($_SESSION['nameb'])) { echo "checked=\"checked\""; } ?> name="name" value="yes">
                                             &nbsp;
                                             No&nbsp;<input type="radio" name="name" value="no">
                                        </td>
                                        <td>
                                             <select name="color1" required>
                                                  <option value="<?php if(isset($_SESSION['color1'])){echo $_SESSION['color1'];} ?>" selected="selected"><?php if(isset($_SESSION['color1'])){echo $_SESSION['color1'];}else{echo "None";} ?></option>
                                                  <option value="Red RCP2">Red RCP2</option>
                                                  <option value="Pink PCP1">Pink PCP1</option>
                                                  <option value="Orange OCP1">Orange OCP1</option>
                                                  <option value="Blue BL-CP3">Blue BL-CP3</option>
                                                  <option value="Green GR-CP2">Green GR-CP2</option>
                                                  <option value="Gray GCP1">Gray GCP1</option>
                                                  <option value="Black BDCP3">Black BDCP3</option>
                                                  <option value="White WCP3">White WCP3</option>
                                                  <option value="Black BCP4">Black BCP4</option>
                                                  <option value="Yellow YCP1">Yellow YCP1</option>
                                                  <option value="Blue BL-CP1">Blue BL-CP1</option>
                                                  <option value="Silver SCP1">Silver SCP1</option>
                                                  <option value="Golden GCP1">Golden GCP1</option>
                                                  <option value="White WMPG2">White WMPG2</option>
                                                  <option value="Blue BL-GP2">Blue BL-GP2</option>
                                                  <option value="Green GR-MP1">Green GR-MP1</option>
                                                  <option value="Black BMPG2">Black BMPG2</option>
                                                  <option value="White WMP1">White WMP1</option>
                                                  <option value="Red RMP1">Red RMP1</option>
                                                  <option value="Black BMP1">Black BMP1</option>
                                                  <option value="Brown BR-MP1">Brown BR-MP1</option>
                                                  <option value="Purple PP1">Purple PP1</option>
                                             </select>
                                        </td>
                                   </tr>
                                   <tr>
                                        <td>Name [If Yes above]</td>
                                        <td class="green">Colour 2 <span class="requiredField">*</span></td></tr>
                                   <tr>
                                        <td>
                                             <input type="text" name="namevalue" <?php if(isset($_SESSION['namevalue'])){echo "value='".$_SESSION['namevalue']."'";} ?>>
                                        </td>
                                        <td>
                                             <select name="color2" required>
                                                  <option value="<?php if(isset($_SESSION['color2'])){echo $_SESSION['color2'];} ?>" selected="selected"><?php if(isset($_SESSION['color2'])){echo $_SESSION['color2'];}else{echo "None";} ?></option>
                                                  <option value="Red RCP2">Red RCP2</option>
                                                  <option value="Pink PCP1">Pink PCP1</option>
                                                  <option value="Orange OCP1">Orange OCP1</option>
                                                  <option value="Blue BL-CP3">Blue BL-CP3</option>
                                                  <option value="Green GR-CP2">Green GR-CP2</option>
                                                  <option value="Gray GCP1">Gray GCP1</option>
                                                  <option value="Black BDCP3">Black BDCP3</option>
                                                  <option value="White WCP3">White WCP3</option>
                                                  <option value="Black BCP4">Black BCP4</option>
                                                  <option value="Yellow YCP1">Yellow YCP1</option>
                                                  <option value="Blue BL-CP1">Blue BL-CP1</option>
                                                  <option value="Silver SCP1">Silver SCP1</option>
                                                  <option value="Golden GCP1">Golden GCP1</option>
                                                  <option value="White WMPG2">White WMPG2</option>
                                                  <option value="Blue BL-GP2">Blue BL-GP2</option>
                                                  <option value="Green GR-MP1">Green GR-MP1</option>
                                                  <option value="Black BMPG2">Black BMPG2</option>
                                                  <option value="White WMP1">White WMP1</option>
                                                  <option value="Red RMP1">Red RMP1</option>
                                                  <option value="Black BMP1">Black BMP1</option>
                                                  <option value="Brown BR-MP1">Brown BR-MP1</option>
                                                  <option value="Purple PP1">Purple PP1</option>
                                             </select>
                                        </td>
                                   </tr>

                                   <tr><td>Name Position</td><td class="green">Colour 3 <span class="requiredField">*</span></td></tr>
                                   <tr>
                                        <td class="borderbottom">
                                             <select name="nameposition">
                                                  <option value="<?php if(isset($_SESSION['nameposition'])){echo $_SESSION['nameposition'];} else {echo "0";} ?>" selected="selected"><?php if(isset($_SESSION['nameposition'])){echo "Position #".$_SESSION['nameposition'];}else{echo "None";} ?></option>
                                                  <option value="1">Position #1</option>
                                                  <option value="2">Position #2</option>
                                                  <option value="3">Position #3</option>
                                             </select>

                                        </td>
                                        <td class="borderbottom">
                                             <select name="color3" required>
                                                  <option value="<?php if(isset($_SESSION['color3'])){echo $_SESSION['color3'];} ?>" selected="selected"><?php if(isset($_SESSION['color3'])){echo $_SESSION['color3'];}else{echo "None";} ?></option>
                                                  <option value="Red RCP2">Red RCP2</option>
                                                  <option value="Pink PCP1">Pink PCP1</option>
                                                  <option value="Orange OCP1">Orange OCP1</option>
                                                  <option value="Blue BL-CP3">Blue BL-CP3</option>
                                                  <option value="Green GR-CP2">Green GR-CP2</option>
                                                  <option value="Gray GCP1">Gray GCP1</option>
                                                  <option value="Black BDCP3">Black BDCP3</option>
                                                  <option value="White WCP3">White WCP3</option>
                                                  <option value="Black BCP4">Black BCP4</option>
                                                  <option value="Yellow YCP1">Yellow YCP1</option>
                                                  <option value="Blue BL-CP1">Blue BL-CP1</option>
                                                  <option value="Silver SCP1">Silver SCP1</option>
                                                  <option value="Golden GCP1">Golden GCP1</option>
                                                  <option value="White WMPG2">White WMPG2</option>
                                                  <option value="Blue BL-GP2">Blue BL-GP2</option>
                                                  <option value="Green GR-MP1">Green GR-MP1</option>
                                                  <option value="Black BMPG2">Black BMPG2</option>
                                                  <option value="White WMP1">White WMP1</option>
                                                  <option value="Red RMP1">Red RMP1</option>
                                                  <option value="Black BMP1">Black BMP1</option>
                                                  <option value="Brown BR-MP1">Brown BR-MP1</option>
                                                  <option value="Purple PP1">Purple PP1</option>
                                             </select>
                                        </td>
                                   </tr>

                                   <tr><td class="green">Embroider Country's flag on the bag ?</td><td class="green">Would you like your website on the bag?</td></tr>
                                   <tr>
                                        <td>
                                             Yes&nbsp;<input type="radio" <?php if (isset($_SESSION['flagb'])) { echo "checked=\"checked\""; } ?> name="flag" value="yes">
                                             &nbsp;
                                             No&nbsp;<input type="radio" name="flag" value="no">
                                        </td>
                                        <td>
                                             Yes&nbsp;<input type="radio" <?php if (isset($_SESSION['urlb'])) { echo "checked=\"checked\""; } ?> name="url" value="yes">
                                             &nbsp;
                                             No&nbsp;<input type="radio" name="url" value="no">
                                        </td>
                                   </tr>

                                   <tr><td>Country Name [If Yes above]</td><td>Website URL [If Yes above]</td></tr>
                                   <tr>
                                        <td>
                                             <input type="text" name="flagvalue" <?php if(isset($_SESSION['flagvalue'])){echo "value='".$_SESSION['flagvalue']."'";} ?>>
                                        </td>
                                        <td>
                                             <input type="text" name="urlvalue" <?php if(isset($_SESSION['urlvalue'])){echo "value='".$_SESSION['urlvalue']."'";} ?>>
                                        </td>
                                   </tr>

                                   <tr><td>Flag's Position</td><td>Website URL Position</td></tr>
                                   <tr>
                                        <td class="borderbottom">
                                             <select name="flagposition">
                                                  <option value="<?php if(isset($_SESSION['flagposition'])){echo $_SESSION['flagposition'];} else {echo "0";} ?>" selected="selected"><?php if(isset($_SESSION['flagposition'])){echo "Position #".$_SESSION['flagposition'];}else{echo "None";} ?></option>
                                                  <option value="1">Position #1</option>
                                                  <option value="2">Position #2</option>
                                                  <option value="3">Position #3</option>
                                             </select>

                                        </td>
                                        <td class="borderbottom">
                                             <select name="urlposition">
                                                  <option value="<?php if(isset($_SESSION['urlposition'])){echo $_SESSION['urlposition'];} else {echo "0";} ?>" selected="selected"><?php if(isset($_SESSION['urlposition'])){echo "Position #".$_SESSION['urlposition'];}else{echo "None";} ?></option>
                                                  <option value="1">Position #1</option>
                                                  <option value="2">Position #2</option>
                                                  <option value="3">Position #3</option>
                                             </select>

                                        </td>
                                   </tr>
                                   <tr><td class="green">Logo #1</td><td class="green">Logo #2</td></tr>
                                   <tr>
                                        <td>
                                             Yes&nbsp;<input type="radio" <?php if (isset($_SESSION['logo1b'])) { echo "checked=\"checked\""; } ?> name="logo1" value="yes">
                                             &nbsp;
                                             No&nbsp;<input type="radio" name="logo1" value="no">
                                        </td>
                                        <td>
                                             Yes&nbsp;<input type="radio" <?php if (isset($_SESSION['logo2b'])) { echo "checked=\"checked\""; } ?> name="logo2" value="yes">
                                             &nbsp;
                                             No&nbsp;<input type="radio" name="logo2" value="no">
                                        </td>
                                   </tr>
                                   <tr><td>Upload Logo [If yes above]</td><td>Upload Logo [If yes above]</td></tr>
                                   <tr>
                                        <td>
                                             <input type="file" name="logo1file">
                                        </td>
                                        <td>
                                             <input type="file" name="logo2file">
                                        </td>
                                   </tr>
                                   <tr><td>Logo #1 Position</td><td>Logo #2 Position</td></tr>
                                   <tr>
                                        <td class="borderbottom">
                                             <select name="logo1position">
                                                  <option value="<?php if(isset($_SESSION['logo1position'])){echo $_SESSION['logo1position'];} else {echo "0";} ?>" selected="selected"><?php if(isset($_SESSION['logo1position'])){echo "Position #".$_SESSION['logo1position'];}else{echo "None";} ?></option>
                                                  <option value="1">Position #1</option>
                                                  <option value="2">Position #2</option>
                                                  <option value="3">Position #3</option>
                                             </select>

                                        </td>
                                        <td class="borderbottom">
                                             <select name="logo2position">
                                                  <option value="<?php if(isset($_SESSION['logo2position'])){echo $_SESSION['logo2position'];} else {echo "0";} ?>" selected="selected"><?php if(isset($_SESSION['logo2position'])){echo "Position #".$_SESSION['logo2position'];}else{echo "None";} ?></option>
                                                  <option value="1">Position #1</option>
                                                  <option value="2">Position #2</option>
                                                  <option value="3">Position #3</option>
                                             </select>

                                        </td>
                                   </tr>
                                   <tr><td class="green">Logo #3</td><td class="green">Quantity <span class="requiredField">*</span></td></tr>
                                   <tr>
                                        <td>
                                             Yes&nbsp;<input type="radio" <?php if (isset($_SESSION['logo3b'])) { echo "checked=\"checked\""; } ?> name="logo3" value="yes">
                                             &nbsp;
                                             No&nbsp;<input type="radio" name="logo3" value="no">
                                        </td>
                                        <td>
                                             <input type="number" <?php if(isset($_SESSION['quantity'])){echo "value='".$_SESSION['quantity']."'";} ?> name="quantity" required>
                                        </td>
                                   </tr>
                                   <tr><td>Upload Logo [If yes above]</td><td></td></tr>
                                   <tr>
                                        <td>
                                             <input type="file" name="logo3file">
                                        </td>
                                        <td>
                                             
                                        </td>
                                   </tr>
                                   <tr><td>Logo #3 Position</td><td></td></tr>
                                   <tr>
                                        <td class="borderbottom">
                                             <select name="logo3position">
                                                  <option value="0" selected="selected">None</option>
                                                  <option value="1">Position #1</option>
                                                  <option value="2">Position #2</option>
                                                  <option value="3">Position #3</option>
                                             </select>

                                        </td>
                                        <td class="borderbottom">
                                             
                                        </td>
                                   </tr>
                              </table>
                              <?php
                                   function del($name){
                                        if (isset($_SESSION[$name])) {
                                             unset($_SESSION[$name]);
                                        }
                                   }
                                   del('nameb');del('namevalue');del('nameposition');
                                   del('flagb');del('flagvalue');del('flagposition');
                                   del('urlb');del('urlvalue');del('urlposition');
                                   del('logo1b');del('logo1value');del('logo1position');
                                   del('logo2b');del('logo2value');del('logo2position');
                                   del('logo3b');del('logo3value');del('logo3position');
                                   del('color1');del('color2');del('color3');del('count');
                                   del('price');del('orderid');del('newpath');del('pageurl');
                                   del('leadtime');del('productname');del('baseprice');del('quantity');
                                   if (isset($_SESSION['mailsent'])) { unset($_SESSION['mailsent']); }
                              ?>
                              <div id="error" class="show_error">
                                   <ul>

                                   </ul>
                              </div>
                              <input type="hidden" name="productname" value="Duffel Bag">
                              <input type="hidden" name="baseprice" value="Price on request">
                              <input type="hidden" name="leadtime" value="45-60 days">
                              <input type="hidden" name="page" value="duffel">
                              <input type="submit" value="Continue">
                              <?php $_SESSION['lastpage']=$_SERVER['SCRIPT_NAME']."?".$_SERVER['QUERY_STRING']; ?>
                         </form>
                    </div>
               </div>
<?php include 'footer.php'; ?>
<!--
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.8.2.min.js.gz"><\/script>')</script>

  <script src="js/plugins.js.gz"></script>
-->
    <script type="text/javascript" src="js/libs/jquery-1.8.2.min.js.gz"></script>
    <script src="js/script.js.gz"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js.gz"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    <script type='text/javascript' src='js/jquery.jqzoom-core.js'></script>
    <script type="text/javascript">
     $(document).ready(function() {
          $('.jqzoom').jqzoom({
                 zoomType: 'reverse',
                 lens:true,
                 preloadImages: false,
                 alwaysOn:false
             });
          //$('.jqzoom').jqzoom();
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
<?php
if(!isset($_SESSION)){ session_start(); }
include_once 'connection.php';
include_once 'functions.php';
require("PHPMailer/class.phpmailer.php");
if (isset($_SESSION['login'])&&$_SESSION['login']) {
     if (isset($_POST['productname'])&&!isset($_GET['mail'])){                //   Processing happens only if 'productname' is set
          if (!isset($_POST['color1'])||!isset($_POST['color1'])||!isset($_POST['color1'])||!isset($_POST['quantity'])) {
               header('Location: '.$_SESSION['lastpage']);
          }
          $_SESSION['productname'] = $productname = sanitizeMySQL($_POST['productname']);
          $_SESSION['baseprice'] = $baseprice = sanitizeMySQL($_POST['baseprice']);
          $_SESSION['quantity'] = $quantity = sanitizeMySQL($_POST['quantity']);
          $_SESSION['color1'] = $color1 = sanitizeMySQL($_POST['color1']);
          $_SESSION['color2'] = $color2 = sanitizeMySQL($_POST['color2']);
          $_SESSION['color3'] = $color3 = sanitizeMySQL($_POST['color3']);
          #----------------------------------------------------#
          $count  = 0 ;
          #----------------------------------------------------#
          if (isset($_POST['name'])&&$_POST['name']=='yes') {
               $count++;
               $_SESSION['nameb'] = $nameb = 1;
               $_SESSION['namevalue'] = $namevalue = $_POST['namevalue'];
               $_SESSION['nameposition'] = $nameposition = $_POST['nameposition'];
          } else { 
               $nameb = 0;
               $namevalue = 0;
               $nameposition = 0;
          }
          if (isset($_POST['flag'])&&$_POST['flag']=='yes') {
               $count++;
               $_SESSION['flagb'] = $flagb = 1;
               $_SESSION['flagvalue'] = $flagvalue = $_POST['flagvalue'];
               $_SESSION['flagposition'] = $flagposition = $_POST['flagposition'];
          } else { 
               $flagb = 0; 
               $flagvalue = 0;
               $flagposition = 0;
          }
          if (isset($_POST['url'])&&$_POST['url']=='yes') {
               $count++;
               $_SESSION['urlb'] = $urlb = 1;
               $_SESSION['urlvalue'] = $urlvalue = $_POST['urlvalue'];
               $_SESSION['urlposition'] = $urlposition = $_POST['urlposition'];
          } else { 
               $urlb = 0; 
               $urlvalue = 0;
               $urlposition = 0;
          }
          #----------------------------------------------------#
          if (isset($_POST['logo1'])&&$_POST['logo1']=='yes') {
               $count++;
               $_SESSION['logo1position'] = $logo1position = $_POST['logo1position'];
               $_SESSION['logo1b'] = $logo1b = 1;
               $logo1 = $_FILES['logo1file'];
               $_SESSION['logo1name'] = $logo1name = $_FILES['logo1file']['name'];
               $logo1path1 = $_FILES['logo1file']['tmp_name'];
               $logo1extension = explode('.',$logo1name);
               $logo1fullname = "logo1.$logo1extension[1]"; 
          } else { 
               $logo1b = 0; 
               $logo1position = 0;
               $logo1fullname = 0;
          }
          if (isset($_POST['logo2'])&&$_POST['logo2']=='yes') {
               $count++;
               $_SESSION['logo2position'] = $logo2position = $_POST['logo2position'];
               $_SESSION['logo2b'] = $logo2b = 1;
               $logo2 = $_FILES['logo2file'];
               $_SESSION['logo2name'] = $logo2name = $_FILES['logo2file']['name'];
               $_SESSION['logo2path1'] = $logo2path1 = $_FILES['logo2file']['tmp_name'];
               $logo2extension=explode('.',$logo2name);
               $logo2fullname = "logo2.$logo2extension[1]";
          } else { 
               $logo2b = 0; 
               $logo2position = 0;
               $logo2fullname = 0;
          }
          if (isset($_POST['logo3'])&&$_POST['logo3']=='yes') {
               $count++;
               $_SESSION['logo3position'] = $logo3position = $_POST['logo3position'];
               $_SESSION['logo3b'] = $logo3b = 1;
               $logo3 = $_FILES['logo3file'];
               $_SESSION['logo3name'] = $logo3name = $_FILES['logo3file']['name'];
               $_SESSION['logo3path1'] = $logo3path1 = $_FILES['logo3file']['tmp_name'];
               $logo3extension=explode('.',$logo3name);
               $logo3fullname = "logo3.$logo3extension[1]"; 
          } else { 
               $logo3b = 0; 
               $logo3position = 0;
               $logo3fullname = 0;
          }
          if (isset($_POST['logo4'])&&$_POST['logo4']=='yes') {
               $count++;
               $_SESSION['logo4position'] = $logo4position = $_POST['logo4position'];
               $_SESSION['logo4b'] = $logo4b = 1;
               $logo4 = $_FILES['logo4file'];
               $_SESSION['logo4name'] = $logo4name = $_FILES['logo4file']['name'];
               $_SESSION['logo4path1'] = $logo4path1 = $_FILES['logo4file']['tmp_name'];
               $logo4extension=explode('.',$logo4name);
               $logo4fullname = "logo4.$logo4extension[1]"; 
          } else { 
               $logo4b = 0; 
               $logo4position = 0;
               $logo4fullname = 0;
          }
          if (isset($_POST['logo5'])&&$_POST['logo5']=='yes') {
               $count++;
               $_SESSION['logo5position'] = $logo5position = $_POST['logo5position'];
               $_SESSION['logo5b'] = $logo5b = 1;
               $logo5 = $_FILES['logo5file'];
               $_SESSION['logo5name'] = $logo5name = $_FILES['logo5file']['name'];
               $_SESSION['logo5path1'] = $logo5path1 = $_FILES['logo5file']['tmp_name'];
               $logo5extension=explode('.',$logo5name);
               $logo5fullname = "logo5.$logo5extension[1]";
          } else { 
               $logo5b = 0; 
               $logo5position = 0;
               $logo5fullname = 0;
          }
          if (isset($_POST['logo6'])&&$_POST['logo6']=='yes') {
               $count++;
               $_SESSION['logo6position'] = $logo6position = $_POST['logo6position'];
               $_SESSION['logo6b'] = $logo6b = 1;
               $logo6 = $_FILES['logo6file'];
               $_SESSION['logo6name'] = $logo6name = $_FILES['logo6file']['name'];
               $_SESSION['logo6path1'] = $logo6path1 = $_FILES['logo6file']['tmp_name'];
               $logo6extension=explode('.',$logo6name);
               $logo6fullname = "logo6.$logo6extension[1]";
          } else { 
               $logo6b = 0; 
               $logo6position = 0;
               $logo6fullname = 0;
          }
          if (isset($_POST['logo7'])&&$_POST['logo7']=='yes') {
               $count++;
               $_SESSION['logo7position'] = $logo7position = $_POST['logo7position'];
               $_SESSION['logo7b'] = $logo7b = 1;
               $logo7 = $_FILES['logo7file'];
               $_SESSION['logo7name'] = $logo7name = $_FILES['logo7file']['name'];
               $_SESSION['logo7path1'] = $logo7path1 = $_FILES['logo7file']['tmp_name'];
               $logo7extension=explode('.',$logo7name);
               $logo7fullname = "logo7.$logo7extension[1]";
          } else { 
               $logo7b = 0; 
               $logo7position = 0;
               $logo7fullname = 0;
          }
          if (isset($_POST['logo8'])&&$_POST['logo8']=='yes') {
               $count++;
               $_SESSION['logo8position'] = $logo8position = $_POST['logo8position'];
               $_SESSION['logo8b'] = $logo8b = 1;
               $logo8 = $_FILES['logo8file'];
               $_SESSION['logo8name'] = $logo8name = $_FILES['logo8file']['name'];
               $_SESSION['logo8path1'] = $logo8path1 = $_FILES['logo8file']['tmp_name'];
               $logo8extension=explode('.',$logo8name);
               $logo8fullname = "logo8.$logo8extension[1]";
          } else { 
               $logo8b = 0; 
               $logo8position = 0;
               $logo8fullname = 0;
          }
          if($baseprice!="Price on request"){
               if ($count>4) { $price = $baseprice + ($count-4)*1000; } else { $price = $baseprice;  }
          } else { $price = "Price on request"; }
          $InsertSQL="INSERT INTO `customise`(`customiseorderid`,`customerid`,`productname`,`timestamp`,`folderpath`,`count`,`price`,`quantity`,`color1`,`color2`,`color3`,`name`,`namevalue`,`nameposition`,`flag`,`flagvalue`,`flagposition`,`url`,`urlvalue`,`urlposition`,`logo1`,`logo1position`,`logo1fullname`,`logo2`, `logo2position`, `logo2fullname`,`logo3`,`logo3position`,`logo3fullname`,`logo4`, `logo4position`, `logo4fullname`,`logo5`,`logo5position`,`logo5fullname`,`logo6`,`logo6position`,`logo6fullname`,`logo7`,`logo7position`,`logo7fullname`,`logo8`,`logo8position`,`logo8fullname`) VALUES ( NULL,'".$_SESSION['CustomerID']."','".$productname."',NOW(),'ghdh','".$count."','".$price."','".$quantity."','".$color1."',    '".$color2."',   '".$color3."','".$nameb."','".$namevalue."','".$nameposition."','".$flagb."','".$flagvalue."','".$flagposition."','".$urlb."','".$urlvalue."','".$urlposition."','".$logo1b."','".$logo1position."','".$logo1fullname."','".$logo2b."','".$logo2position."','".$logo2fullname."','".$logo3b."','".$logo3position."','".$logo3fullname."','".$logo4b."','".$logo4position."','".$logo4fullname."','".$logo5b."','".$logo5position."','".$logo5fullname."','".$logo6b."','".$logo6position."','".$logo6fullname."','".$logo7b."','".$logo7position."','".$logo7fullname."','".$logo8b."','".$logo8position."','".$logo8fullname."')";
          mysql_query($InsertSQL);
          $orderid = mysql_insert_id();
          $newpath = 'order/jstewart/'.$orderid;
          mkdir($newpath);
          if(isset($logo1path1)){$logo1path2=$newpath."/logo1.$logo1extension[1]";move_uploaded_file($logo1path1, $logo1path2);}
          if(isset($logo2path1)){$logo2path2=$newpath."/logo2.$logo2extension[1]";move_uploaded_file($logo2path1, $logo2path2);}
          if(isset($logo3path1)){$logo3path2=$newpath."/logo3.$logo3extension[1]";move_uploaded_file($logo3path1, $logo3path2);}
          if(isset($logo4path1)){$logo4path2=$newpath."/logo4.$logo4extension[1]";move_uploaded_file($logo4path1, $logo4path2);}
          if(isset($logo5path1)){$logo5path2=$newpath."/logo5.$logo5extension[1]";move_uploaded_file($logo5path1, $logo5path2);}
          if(isset($logo6path1)){$logo6path2=$newpath."/logo6.$logo6extension[1]";move_uploaded_file($logo6path1, $logo6path2);}
          if(isset($logo7path1)){$logo7path2=$newpath."/logo7.$logo7extension[1]";move_uploaded_file($logo7path1, $logo7path2);}
          if(isset($logo8path1)){$logo8path2=$newpath."/logo8.$logo8extension[1]";move_uploaded_file($logo8path1, $logo8path2);}
          $UpdateSQL="UPDATE `customise` SET `folderpath` = '".$newpath."' WHERE `customise`.`customiseorderid` = ".$orderid."";
          mysql_query($UpdateSQL);
          #----------------------------------------------------#
          $_SESSION['count']=$count;
          $_SESSION['price']=$price;
          $_SESSION['orderid']=$orderid;
          $_SESSION['newpath']=$newpath;
          $_SESSION['pageurl']=$_POST['page'];
          $_SESSION['leadtime']=$_POST['leadtime'];
          #----------------------------------------------------#
     }
} else {
     header('Location: register');
}
#------------------------------------------------------------------------------------------------------------------------------------------#
############################################################################################################################################
#------------------------------------------------------------------------------------------------------------------------------------------#
$title="Customised order received at golfessentials.in";
include 'header.php';
?>
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
            <div class="customise">
               <?php if(!isset($_GET['mail'])){ ?>
               <h4>Please find below your order summary.</h4>
               <p><b>Product Name:</b> <?php echo $productname; ?></p>
               <p><b>Colour 1:</b> <?php echo $color1; ?></p>
               <p><b>Colour 2:</b> <?php echo $color2; ?></p>
               <p><b>Colour 3:</b> <?php echo $color3; ?></p>
               <table>
                    <tr><th></th><th>Selected</th><th>Details</th><th>Position</th></tr>
                    <tr>
                         <td>Name</td>
                         <td>
                              <?php
                                   echo ($nameb==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($nameb==1) ? $namevalue : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($nameb==1) ? $nameposition : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <tr>
                         <td>Flag</td>
                         <td>
                              <?php
                                   echo ($flagb==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($flagb==1) ? $flagvalue : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($flagb==1) ? $flagposition : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <tr>
                         <td>URL</td>
                         <td>
                              <?php
                                   echo ($urlb==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($urlb==1) ? $urlvalue : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($urlb==1) ? $urlposition : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <tr>
                         <td>Logo 1</td>
                         <td>
                              <?php
                                   echo ($logo1b==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo1b==1) ? $logo1name : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo1b==1) ? $logo1position : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <tr>
                         <td>Logo 2</td>
                         <td>
                              <?php
                                   echo ($logo2b==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo2b==1) ? $logo2name : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo2b==1) ? $logo2position : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <?php if($_SESSION['pageurl'] == 'tour' || $_SESSION['pageurl'] == 'staff' || $_SESSION['pageurl'] == 'minitour' || $_SESSION['pageurl'] == 'duffel'){ ?>
                    <tr>
                         <td>Logo 3</td>
                         <td>
                              <?php
                                   echo ($logo3b==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo3b==1) ? $logo3name : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo3b==1) ? $logo3position : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <?php } if($_SESSION['pageurl'] == 'tour' || $_SESSION['pageurl'] == 'staff' || $_SESSION['pageurl'] == 'minitour'){ ?>
                    <tr>
                         <td>Logo 4</td>
                         <td>
                              <?php
                                   echo ($logo4b==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo4b==1) ? $logo4name : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo4b==1) ? $logo4position : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <?php } if($_SESSION['pageurl'] == 'tour' || $_SESSION['pageurl'] == 'staff' || $_SESSION['pageurl'] == 'minitour'){ ?>
                    <tr>
                         <td>Logo 5</td>
                         <td>
                              <?php
                                   echo ($logo5b==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo5b==1) ? $logo5name : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo5b==1) ? $logo5position : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <?php } if($_SESSION['pageurl'] == 'tour' || $_SESSION['pageurl'] == 'staff' || $_SESSION['pageurl'] == 'minitour'){ ?>
                    <tr>
                         <td>Logo 6</td>
                         <td>
                              <?php
                                   echo ($logo6b==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo6b==1) ? $logo6name : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo6b==1) ? $logo6position : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <?php } if($_SESSION['pageurl'] == 'tour' || $_SESSION['pageurl'] == 'staff'){ ?>
                    <tr>
                         <td>Logo 7</td>
                         <td>
                              <?php
                                   echo ($logo7b==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo7b==1) ? $logo7name : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo7b==1) ? $logo7position : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <?php } if($_SESSION['pageurl'] == 'tour'){ ?>
                    <tr>
                         <td>Logo 8</td>
                         <td>
                              <?php
                                   echo ($logo8b==1) ? "Yes" : "No" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo8b==1) ? $logo8name : "Not Selected" ;
                              ?>
                         </td>
                         <td>
                              <?php
                                   echo ($logo8b==1) ? $logo8position : "Not Selected" ;
                              ?>
                         </td>
                    </tr>
                    <?php } ?>
                    <tr>
                         <td>Quantity</td>
                         <td colspan="3">
                              <?php
                                   echo $quantity;
                              ?>
                         </td>
                    </tr>
                    <tr>
                         <td>Price</td>
                         <td colspan="3" class="green">
                              <?php
                              if($baseprice!="Price on request"){
                                   echo ($count>4) ? "[ <b class=\"ruppeefont\">`</b> ".$baseprice." + (".($count-4)." x 1000) = <b class=\"ruppeefont\">`</b> ".$price." ] x ".$quantity." = <b class=\"ruppeefont\">`</b> ".number_format(($price*$quantity), 0, ' ', ',') : "<b class=\"ruppeefont\">`</b> ".number_format($baseprice, 0, ' ', ',')." x ".$quantity." = <b class=\"ruppeefont\">`</b> ".number_format(($baseprice*$quantity), 0, ' ', ',') ;
                              } else {
                                   echo "Price on request";
                              }
                              ?>
                         </td>
                    </tr>
               </table>
               <a href="editcustomise?edit=true">Edit</a>
                    <br>
                    <br>
                    <h2>Billing details</h2><hr><br>
                    <form action="editcustomise.php" method="POST">
                         <table class="address">
                              <tr>
                                   <td>First Name<span>*</span></td>
                                   <td><input type="text" name="bfname" value="<?php echo GetCustomerDetails('fname'); ?>" required></td></tr>
                              <tr>
                                   <td>Last Name<span>*</span></td>
                                   <td><input type="text" name="blname" value="<?php echo GetCustomerDetails('lname'); ?>" required></td></tr>
                              <tr>
                                   <td>Address<span>*</span></td>
                                   <td><textarea cols="20" rows="5" name="baddr" required><?php echo GetCustomerDetails('addr'); ?></textarea></td></tr>
                              <tr>
                                   <td>City<span>*</span></td>
                                   <td><input type="text" name="bcity" value="<?php echo GetCustomerDetails('city'); ?>" required></td></tr>
                              <tr>
                                   <td>State<span>*</span></td>
                                   <td><input type="text" name="bstate" value="<?php echo GetCustomerDetails('state'); ?>" required></td></tr>
                              <tr>
                                   <td>Pincode<span>*</span></td>
                                   <td><input type="number" name="bpin" value="<?php echo GetCustomerDetails('pin'); ?>" required></td></tr>
                              <tr>
                                   <td>Mobile<span>*</span></td>
                                   <td><input type="number" name="bmobile" value="<?php echo GetCustomerDetails('mobile'); ?>" required></td></tr>
                              <tr>
                                   <td colspan="2">Please note that fields marked with <span>*</span> are necessary</td></tr>
                         </table>
                         <br><input type="checkbox" name="sameaddr">&nbsp;Shipping details are the same as the Billing details.
                         <div class="address">
                              <br><br><h2>Shipping details</h2><hr><br>
                              <table class="address">
                                   <tr>
                                        <td>First Name<span>*</span></td>
                                        <td><input type="text" name="sfname" value="" class="removeattr" required></td></tr>
                                   <tr>
                                        <td>Last Name<span>*</span></td>
                                        <td><input type="text" name="slname" value="" class="removeattr" required></td></tr>
                                   <tr>
                                        <td>Address<span>*</span></td>
                                        <td><textarea cols="20" rows="5" name="saddr" class="removeattr" required></textarea></td></tr>
                                   <tr>
                                        <td>City<span>*</span></td>
                                        <td><input type="text" name="scity" value="" class="removeattr" required></td></tr>
                                   <tr>
                                        <td>State<span>*</span></td>
                                        <td><input type="text" name="sstate" value="" class="removeattr" required></td></tr>
                                   <tr>
                                        <td>Pincode<span>*</span></td>
                                        <td><input type="number" name="spin" value="" class="removeattr" required></td></tr>
                                   <tr>
                                        <td>Mobile<span>*</span></td>
                                        <td><input type="number" name="smobile" value="" class="removeattr" required></td></tr>
                                   <tr>
                                        <td colspan="2">Please note that fields marked with <span>*</span> are necessary</td></tr>
                              </table>
                         </div>
                         <br><br><h2>Payment Option</h2><hr><br>
                         <table class="payment">
                         <tr>
                              <th colspan="2" align="left">Please select one of the options below as your method of payment</th>
                         </tr>
                         <tr>
                              <td><input type="radio" name="payment" value="Bank Transfer" disabled required /></td>
                              <td>Online payments &nbsp;&nbsp;<small class="green">(Coming Soon)</small></td>
                         </tr>
                         <tr>
                              <td><input type="radio" name="payment" value="Bank Transfer" required /></td>
                              <td>Bank Transfer</td>
                         </tr>
                         <tr>
                              <td><input type="radio" name="payment" value="Demand Draft" required /></td>
                              <td>Demand Draft</td>
                         </tr>
                         <tr>
                              <td><input type="radio" name="payment" value="Cheque" required /></td>
                              <td>Cheque</td>
                         </tr>
                         <tr>
                              <td><input type="radio" name="payment" value="Cash Deposit" required /></td>
                              <td>Cash Deposit</td>
                         </tr>
                         </table>
                         <br>
                         <br>
                         <input type="submit" value="Place Order">
                    </form>
<!--               <a href="editcustomise?submit=true">Submit</a> -->
               <?php } elseif((isset($_GET['mail']))&&(!isset($_SESSION['mailsent']))) {
               //-------------------------------------------------------------------------------------------------------------------------------
               $mail = new PHPMailer();
                    $mail->IsSMTP();                                                                       // set mailer to use SMTP
                    $mail->Host = "mail.golfessentials.in";                                             // specify main and backup server
                    $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
                    $mail->SMTPKeepAlive = true;  
                    $mail->Mailer = "smtp"; 
                    $mail->SMTPDebug  = 0;
                    $mail->SMTPSecure = "ssl"; 
                    $mail->Port = 465;
                    $mail->Username = "sales@golfessentials.in";                                             // SMTP username
                    $mail->Password = "5eL#RbBagel1";                                           // SMTP password
                    $mail->From = "sales@golfessentials.in";
                    $mail->FromName = "golfessentials.in";
                    $mail->AddAddress(GetCustomerDetails('email'));                                     // name is optional
                    $mail->AddReplyTo("sales@golfessentials.in");
                    $mail->WordWrap = 50;                                     // set word wrap to 50 characters
                    $mail->IsHTML(true);                                          // set email format to HTML
                    $mail->Subject = "Your order at golfessentials.in";
                    ob_start();
                    include 'mail/customise.php';
                    $content = ob_get_clean();
                    $mail->Body    = $content;
                    $mail->AltBody = $content;
                    if(!$mail->Send()){
                              echo "Message could not be sent. <p>";
                              echo "Mailer Error: " . $mail->ErrorInfo;
                              exit;
                    }
                    else {
                         $_SESSION['mailsent']=true;
                    }
               //-------------------------------------------------------------------------------------------------------------------------------
               $mail = new PHPMailer();
                    $mail->IsSMTP();                                                                       // set mailer to use SMTP
                    $mail->Host = "mail.golfessentials.in";                                             // specify main and backup server
                    $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
                    $mail->SMTPKeepAlive = true;  
                    $mail->Mailer = "smtp"; 
                    $mail->SMTPDebug  = 0;
                    $mail->SMTPSecure = "ssl"; 
                    $mail->Port = 465;
                    $mail->Username = "sales@golfessentials.in";                                             // SMTP username
                    $mail->Password = "5eL#RbBagel1";                                           // SMTP password
                    $mail->From = "sales@golfessentials.in";
                    $mail->FromName = "golfessentials.in";
                    $mail->AddAddress('sales@golfessentials.in');                                     // name is optional
                    $mail->AddReplyTo(GetCustomerDetails('email'));
                    $mail->WordWrap = 50;                                     // set word wrap to 50 characters
                    $mail->IsHTML(true);                                          // set email format to HTML
                    $mail->Subject = "Your order at golfessentials.in";
                    ob_start();
                    include 'mail/customise.php';
                    $content = ob_get_clean();
                    $mail->Body    = $content;
                    $mail->AltBody = $content;
                    if(!$mail->Send())
                         {
                              echo "Message could not be sent. <p>";
                              echo "Mailer Error: " . $mail->ErrorInfo;
                              exit;
                         }
               //-------------------------------------------------------------------------------------------------------------------------------
               echo "<p>Your order has been successfully placed and an email has been sent to your registered email ID with the order summary.</p>";
               function del($name){
                    if (isset($_SESSION[$name])) {
                         unset($_SESSION[$name]);
                    }
               }
               del('urlb');del('urlvalue');del('urlposition');del('nameb');del('namevalue');del('nameposition');
               del('flagb');del('flagvalue');del('flagposition');del('logo1b');del('logo1value');del('logo1position');
               del('logo2b');del('logo2value');del('logo2position');del('logo3b');del('logo3value');del('logo3position');
               del('logo4b');del('logo4value');del('logo4position');del('logo5b');del('logo5value');del('logo5position');
               del('logo6b');del('logo6value');del('logo6position');del('logo7b');del('logo7value');del('logo7position');
               del('logo8b');del('logo8value');del('logo8position');del('color1');del('color2');del('color3');del('count');
               del('price');del('orderid');del('newpath');del('pageurl');del('leadtime');del('productname');del('baseprice');
               del('quantity');unset($_GET['mail']);
               }
               ?>
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
<!--
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>
-->
</body>
</html>
<?php
$title="Subscription to golfessentials.in";
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
            <div class="static">
<?php
if(!isset($_SESSION)){ session_start(); }
include_once 'connection.php';
include_once ('functions.php');
if(isset($_POST['email'])){
     $email=sanitizeString($_POST['email']);
     $SubscribedSQL="SELECT id FROM subscribers WHERE email='".$email."'";
     $Subscribed=mysql_num_rows(mysql_query($SubscribedSQL));
     if($Subscribed==1){
               echo "You have successfully updated your preferred contact options. Thank you for your interest and support!<br>";
               echo "Go back to <a href=\"register\">My Account</a> or <a href=\"index\">Continue Shopping</a>.";
     } elseif ($Subscribed==0) {
          $CheckSQL="SELECT CustomerID FROM customer WHERE CustEmail='".$email."'";
          $CheckQuery=mysql_query($CheckSQL);
          $registered=mysql_num_rows($CheckQuery);
          if($registered==1){
               $customerid=mysql_fetch_row($CheckQuery);
               $SaveSQL="INSERT INTO subscribers (email, ts, registered, customerid) VALUES ('".$email."', CURRENT_TIMESTAMP, 1, $customerid[0] )";
               $query=mysql_query($SaveSQL);
               if($query){
               echo "You have successfully updated your preferred contact options. Thank you for your interest and support!<br>";
               echo "Go back to <a href=\"register\">My Account</a> or <a href=\"index\">Continue Shopping</a>.";
               }
          } elseif ($registered==0) {
               $SaveSQL="INSERT INTO subscribers (email, ts, registered) VALUES ('".$email."', CURRENT_TIMESTAMP, 0)";
               $query=mysql_query($SaveSQL);
               if($query){
               echo "You have successfully updated your preferred contact options. Thank you for your interest and support!<br>";
               echo "Go back to <a href=\"register\">My Account</a> or <a href=\"index\">Continue Shopping</a>.";
               }
          }
     }
$current=$_SESSION['current'];
} elseif(isset($_GET['subscribe_email'])||isset($_GET['subscribe_mobile'])){
     $email = (isset($_GET['subscribe_email'])) ? GetCustomerDetails('email') : 0 ;
     $mobile = (isset($_GET['subscribe_mobile'])) ? GetCustomerDetails('mobile') : 0 ;
     $SubscribedSQL="SELECT id FROM subscribers WHERE customerid=".$_SESSION['CustomerID'];
     $Subscribed=mysql_num_rows(mysql_query($SubscribedSQL));
     if($Subscribed!=0){
          $UpdateSQL="UPDATE subscribers SET email = '".$email."', mobile=".$mobile." WHERE customerid=".$_SESSION['CustomerID'];
          $update=mysql_query($UpdateSQL);
          if ($update) {
               echo "You have successfully updated your preferred contact options. Thank you for your interest and support!<br>";
               echo "Go back to <a href=\"register\">My Account</a> or <a href=\"index\">Continue Shopping</a>.";
          }
     } elseif($Subscribed==0) {
          $SaveSQL ="INSERT INTO subscribers (`email`, `status`, `ts`, `registered`, `mobile`, `customerid`) 
          VALUES ('".$email."', 0, CURRENT_TIMESTAMP, '1', ".$mobile.", ".$_SESSION['CustomerID'].")";
          $save=mysql_query($SaveSQL);
          if ($save) {
               echo "You have successfully updated your preferred contact options. Thank you for your interest and support!<br>";
               echo "Go back to <a href=\"register\">My Account</a> or <a href=\"index\">Continue Shopping</a>.";
          }
     }
} elseif(isset($_GET['unsubscribe'])){
     $email=sanitizeMySQL($_GET['unsubscribe']);
     unset($_GET['unsubscribe']);
     $GetCustomerID="SELECT CustomerID FROM customer WHERE CustEmail='".$email."'";
     if (mysql_query($GetCustomerID)) { $ID=mysql_fetch_row(mysql_query($GetCustomerID)); }
     $SelectSQL="SELECT count(*) FROM subscribers WHERE email='".$email."' OR customerid=".$ID[0];
     $present=mysql_num_rows(mysql_query($SelectSQL));
     if ($present=0) {
               echo "You have successfully updated your preferred contact options. Thank you for your interest and support!<br>";
               echo "Go back to <a href=\"register\">My Account</a> or <a href=\"index\">Continue Shopping</a>.";
     } else {
          $DeleteSQL="DELETE FROM `subscribers` WHERE email='".$email."' OR customerid=".$ID[0];
          $result=mysql_query($DeleteSQL);
          if (!isset($rounds)) { $rounds=0; }
          if (($result)&&($rounds===0)) {
               $rounds++;
               echo "You have successfully updated your preferred contact options. Thank you for your interest and support!<br>";
               echo "Go back to <a href=\"register\">My Account</a> or <a href=\"index\">Continue Shopping</a>.";
               $UpdateSQL="INSERT INTO `unsubscribe`(`email`) VALUES ('".$email."')";
               if(mysql_query($UpdateSQL)&&($rounds===1)){
                    //-------------------------------------------------------------------------------------------------------------------------------
                    require("PHPMailer/class.phpmailer.php");
                    $mail = new PHPMailer();
                    $mail->IsSMTP();
                    $mail->Host = "mail.golfessentials.in";
                    $mail->SMTPAuth = true;
                    $mail->SMTPKeepAlive = true;  
                    $mail->Mailer = "smtp";
                    $mail->SMTPDebug  = 0;
                    $mail->SMTPSecure = "ssl";
                    $mail->Port = 465;
                    $mail->Username = "support@golfessentials.in";
                    $mail->Password = "Ie9rDuWAEDQ]";
                    $mail->From = "support@golfessentials.in";
                    $mail->FromName = "golfessentials.in";
                    $mail->AddAddress($email);
                    $mail->AddReplyTo("support@golfessentials.in");
                    $mail->WordWrap = 50;
                    $mail->IsHTML(true);
                    $mail->Subject = "You have been removed from our mailing list";
                    ob_start();
                    include 'mail/unsubscribe.php';
                    $content = ob_get_clean();
                    $mail->Body    = $content;
                    $mail->AltBody = $content;
                    if($rounds===1){
                         if(!$mail->Send())
                              {
                                   echo "Message could not be sent. <p>";
                                   echo "Mailer Error: " . $mail->ErrorInfo;
                                   exit;
                              }
                    }
                    //-------------------------------------------------------------------------------------------------------------------------------
               }
          }
     }
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
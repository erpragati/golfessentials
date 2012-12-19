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
if(isset($_GET['unsubscribe'])){
     $email=sanitizeMySQL($_GET['unsubscribe']);
     unset($_GET['unsubscribe']);
     # Code to delete from subscribers list as well
     $check_subscribersql="SELECT * FROM subscribers WHERE email='".$email."'";
     $check_subscriberquery=mysql_query($check_subscribersql);
     $is_present = mysql_num_rows($check_subscriberquery);
     if ($is_present == 1) {
          $delete_subscribersql="DELETE FROM subscribers WHERE email='".$email."'";
          mysql_query($delete_subscribersql);
     }
     # --------------------------------------------
     $DeleteSQL="UPDATE `mailer` SET `unsubscribed` = '1' WHERE `email` = '".$email."';";
     $result=mysql_query($DeleteSQL);
     if (($result)) {
          echo "You have successfully been removed from our mailing list. We're sorry to see you go!<br>";
          if(mysql_query($DeleteSQL)){
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
              
                    if(!$mail->Send())
                         {
                              echo "Message could not be sent. <p>";
                              echo "Mailer Error: " . $mail->ErrorInfo;
                              
                              exit;
                         }
             
               //-------------------------------------------------------------------------------------------------------------------------------
          }
     }
}
?>



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
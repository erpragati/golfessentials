<?php
$title="Reset Your Password for golfessentials.in";
 include 'header.php'; 

require("PHPMailer/class.phpmailer.php"); ?>
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
<?php if (!isset($_POST['email'])) { ?>
Please enter your registered Email ID below and we’ll send you a link to reset your password<br>
<form class="pwdchange" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
     <input type="email" name="email"></input>
     <input class="pwdchange" type="submit" value="Submit Request"></input>
</form>
<?php
}
if (isset($_POST['email'])) {
  $email=$_POST['email'];
  echo "<br>";
  if(preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email))
  {
  //echo $email."<br>";
    $sql="SELECT CustEmail FROM customer WHERE CustEmail='$email'";

    $query=mysql_query($sql);
    
    $count=mysql_num_rows($query);

    //echo "count=".$count;
      if($count==1)
      {
          echo "A link to reset your password has been sent to your email ID. Please feel free to <a href=\"contactus\">contact us</a> for any further assistance.";
          function unique_salt() { return substr(sha1(mt_rand()),0,22); }
          $salt= unique_salt();                    //////salt//////
          $hash= crypt($email, '$2a$10$'.$salt);   ///////hash//////
          $mail = new PHPMailer();
          $mail->IsSMTP();                                                                       // set mailer to use SMTP
          $mail->Host = "mail.golfessentials.in";                                             // specify main and backup server
          $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
          $mail->SMTPKeepAlive = true;  
          $mail->Mailer = "smtp"; 
          $mail->SMTPDebug  = 0;
          $mail->SMTPSecure = "ssl"; 
          $mail->Port = 465;
          $mail->Username = "support@golfessentials.in";                                             // SMTP username
          $mail->Password = "Ie9rDuWAEDQ]";                                           // SMTP password
          $mail->From = "support@golfessentials.in";
          $mail->FromName = "golfessentials.in";
          $mail->AddAddress($email);                                     // name is optional
          $mail->AddReplyTo("support@golfessentials.in");
          $mail->WordWrap = 50;                                     // set word wrap to 50 characters
          $mail->IsHTML(true);                                          // set email format to HTML
          $mail->Subject = "Reset your password";
          ob_start();
          include 'mail/forgotpwd.php';
          $content = ob_get_clean();
          $mail->Body    = $content;
          $mail->AltBody = $content;
          $_SESSION['emailstatus']=TRUE;
          if(!$mail->Send())
               {
                    echo "Message could not be sent. <p>";
                    echo "Mailer Error: " . $mail->ErrorInfo;
                    unset($_SESSION['emailstatus']);
                    exit;
               }
      }

    
  }
  else
  {
    echo "please enter a valid email";
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
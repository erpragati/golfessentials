<?php
$title="Share by email at golfessentials.in";
include 'header.php';
include_once 'functions.php';
require("PHPMailer/class.phpmailer.php");
#if(isset($_SESSION['mailgone'])){  unset($_SESSION['mailgone']);}
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
               <div class="mail">
               <?php
               if(!isset($_SESSION['login'])) {
                    if(isset($_GET['id'])){ ?>
                         <form action="share.php" method="POST">
                              <h2>Share by email</h2>
                              <hr>
                              <table>
                                   <tr><td>To: *</td><td><input type="text" name="emailid" required></td></tr>
                                   <tr><td>Your Name: *</td><td><input type="text" name="uname" required></td></tr>
                                   <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                   <input type="hidden" name="name" value="<?php echo $_GET['name']; ?>">
                                   <tr><td colspan="2"><input type="submit" value="Send"></td></tr>
                              </table>
                              <?php
                                   if (isset($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                   }
                                   if (isset($_SESSION['mailererror'])) {
                                        echo $_SESSION['mailererror'];
                                        unset($_SESSION['mailererror']);
                                   }
                              ?>
                         </form>
                    <?php
                    } elseif(!isset($_SESSION['mailgone'])) {
                         $to=$_POST['emailid'];
                         $uname=sanitizeMySQL($_POST['uname']);
                         $id=$_POST['id'];
                         $name=GetProductNameByID($id);
                         $subject=$uname." wants you to see this item at golfessentials.in";

                         $mail = new PHPMailer(true);
                         try{
                              $mail->IsSMTP();                                                                       // set mailer to use SMTP
                              $mail->Host = "mail.golfessentials.in";                                         // specify main and backup server
                              $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
                              $mail->SMTPKeepAlive = true;  
                              $mail->Mailer = "smtp"; 
                              $mail->SMTPDebug  = 0;
                              $mail->SMTPSecure = "ssl"; 
                              $mail->Port = 465;
                              $mail->Username = "info@golfessentials.in";                      // SMTP username
                              $mail->Password = "TyZSrNwSnsyT";                                       // SMTP password
                              $mail->From = "info@golfessentials.in";
                              $mail->FromName = "golfessentials.in";
                              $mail->AddAddress("info@golfessentials.in");                   // name is optional
                              $mail->AddReplyTo($to);
                              $mail->WordWrap = 50;                                       // set word wrap to 50 characters
                              $mail->IsHTML(true);                                            // set email format to HTML
                              $mail->Subject = $subject;
                              ob_start();
                              include 'mail/share1.php';
                              $content = ob_get_clean();
                              $mail->Body    = $content;
                              $mail->AltBody = $content;
                              $mail->Send();
                         } catch (phpmailerException $e) {
                              $_SESSION['mailererror'] = $e->errorMessage();
                         } catch (Exception $e) {
                              $_SESSION['error'] = $e->getMessage();
                         }
                         if(isset($_SESSION['error'])||isset($_SESSION['mailererror'])) {
                                   $link = "share?id=".$id."&name=".$name;
                                   echo "<script type=\"text/javascript\">window.location = \"".$link."\"</script>";
                                   header('location: share?id='.$id.'&name='.$name);
                                   exit;
                         } else {
                               $_SESSION['mailgone']=true;
                         }

                         $mail = new PHPMailer(true);
                         try{
                              $mail->IsSMTP();                                                                       // set mailer to use SMTP
                              $mail->Host = "mail.golfessentials.in";                                         // specify main and backup server
                              $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
                              $mail->SMTPKeepAlive = true;  
                              $mail->Mailer = "smtp"; 
                              $mail->SMTPDebug  = 0;
                              $mail->SMTPSecure = "ssl"; 
                              $mail->Port = 465;
                              $mail->Username = "info@golfessentials.in";                       // SMTP username
                              $mail->Password = "TyZSrNwSnsyT";                                        // SMTP password
                              $mail->From = "info@golfessentials.in";
                              $mail->FromName = "golfessentials.in";
                              $mail->AddAddress($to);                                             // name is optional
                              $mail->AddReplyTo("info@golfessentials.in");
                              $mail->WordWrap = 50;                                          // set word wrap to 50 characters
                              $mail->IsHTML(true);                                              // set email format to HTML
                              $mail->Subject = $subject;
                              ob_start();
                              include 'mail/share1.php';
                              $content = ob_get_clean();
                              $mail->Body    = $content;
                              $mail->AltBody = $content;
                              $mail->Send();
                         } catch (phpmailerException $e) {
                              $_SESSION['mailererror'] = $e->errorMessage();
                         } catch (Exception $e) {
                              $_SESSION['error'] = $e->getMessage();
                         }
                         if(isset($_SESSION['error'])||isset($_SESSION['mailererror'])) {
                                   $link = "share?id=".$id."&name=".$name;
                                   echo "<script type=\"text/javascript\">window.location = \"".$link."\"</script>";
                                   header('location: share?id='.$id.'&name='.$name);
                                   exit;
                         } else {
                               $_SESSION['mailgone']=true;
                         }
                         //-------------------------------------------------------------------------------------------------------------------------------
                         echo "You have successfully shared <b>".$name."</b>. Thank You! <a href=\"index\">Continue Shopping</a>.";
                    }
               } elseif(isset($_SESSION['login'])||$_SESSION['login']){
                    if(isset($_GET['id'])){ ?>
                         <form action="share.php" method="POST">
                              <h2>Share by email</h2>
                              <hr>
                              <table>
                                   <tr><td>To: *</td><td><input type="text" name="emailid" required></td></tr>
                                   <tr><td>Subject: *</td><td><input type="text" name="subject" value="<?php echo GetCustomerDetails('fname')." ".GetCustomerDetails('lname'); ?> wants you to see this item at golfessentials.in" required></td></tr>
                                   <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
                                   <input type="hidden" name="name" value="<?php echo $_GET['name']; ?>">
                                   <tr><td colspan="2"><input type="submit" value="Send"></td></tr>
                              </table>
                              <?php
                                   if (isset($_SESSION['error'])) {
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                   }
                                   if (isset($_SESSION['mailererror'])) {
                                        echo $_SESSION['mailererror'];
                                        unset($_SESSION['mailererror']);
                                   }
                              ?>
                         </form>
                    <?php
                    } elseif(!isset($_SESSION['mailgone'])) {
                         $to=$_POST['emailid'];
                         $subject=$_POST['subject'];
                         $id=$_POST['id'];
                         $name=GetProductNameByID($id);

                         $mail = new PHPMailer(true);
                         try{
                              $mail->IsSMTP();                                                                       // set mailer to use SMTP
                              $mail->Host = "mail.golfessentials.in";                                         // specify main and backup server
                              $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
                              $mail->SMTPKeepAlive = true;  
                              $mail->Mailer = "smtp"; 
                              $mail->SMTPDebug  = 0;
                              $mail->SMTPSecure = "ssl"; 
                              $mail->Port = 465;
                              $mail->Username = "info@golfessentials.in";                      // SMTP username
                              $mail->Password = "TyZSrNwSnsyT";                                       // SMTP password
                              $mail->From = "info@golfessentials.in";
                              $mail->FromName = "golfessentials.in";
                              $mail->AddAddress("info@golfessentials.in");                   // name is optional
                              $mail->AddReplyTo($to);
                              $mail->WordWrap = 50;                                       // set word wrap to 50 characters
                              $mail->IsHTML(true);                                            // set email format to HTML
                              $mail->Subject = $subject;
                              ob_start();
                              include 'mail/share.php';
                              $content = ob_get_clean();
                              $mail->Body    = $content;
                              $mail->AltBody = $content;
                              $mail->Send();
                         } catch (phpmailerException $e) {
                              $_SESSION['mailererror'] = $e->errorMessage();
                         } catch (Exception $e) {
                              $_SESSION['error'] = $e->getMessage();
                         }
                         if(isset($_SESSION['error'])||isset($_SESSION['mailererror'])) {
                                   $link = "share?id=".$id."&name=".$name;
                                   echo "<script type=\"text/javascript\">window.location = \"".$link."\"</script>";
                                   header('location: share?id='.$id.'&name='.$name);
                                   exit;
                         } else {
                               $_SESSION['mailgone']=true;
                         }

                         $mail = new PHPMailer(true);
                         try{
                              $mail->IsSMTP();                                                                       // set mailer to use SMTP
                              $mail->Host = "mail.golfessentials.in";                                         // specify main and backup server
                              $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
                              $mail->SMTPKeepAlive = true;  
                              $mail->Mailer = "smtp"; 
                              $mail->SMTPDebug  = 0;
                              $mail->SMTPSecure = "ssl"; 
                              $mail->Port = 465;
                              $mail->Username = "info@golfessentials.in";                       // SMTP username
                              $mail->Password = "TyZSrNwSnsyT";                                        // SMTP password
                              $mail->From = "info@golfessentials.in";
                              $mail->FromName = "golfessentials.in";
                              $mail->AddAddress($to);                                             // name is optional
                              $mail->AddReplyTo("info@golfessentials.in");
                              $mail->WordWrap = 50;                                          // set word wrap to 50 characters
                              $mail->IsHTML(true);                                              // set email format to HTML
                              $mail->Subject = $subject;
                              ob_start();
                              include 'mail/share.php';
                              $content = ob_get_clean();
                              $mail->Body    = $content;
                              $mail->AltBody = $content;
                              $mail->Send();
                         } catch (phpmailerException $e) {
                              $_SESSION['mailererror'] = $e->errorMessage();
                         } catch (Exception $e) {
                              $_SESSION['error'] = $e->getMessage();
                         }
                         if(isset($_SESSION['error'])||isset($_SESSION['mailererror'])) {
                                   $link = "share?id=".$id."&name=".$name;
                                   echo "<script type=\"text/javascript\">window.location = \"".$link."\"</script>";
                                   header('location: share?id='.$id.'&name='.$name);
                                   exit;
                         } else {
                               $_SESSION['mailgone']=true;
                         }
                         //-------------------------------------------------------------------------------------------------------------------------------
                         echo "You have successfully shared <b>".$name."</b>. Thank You! <a href=\"index\">Continue Shopping</a>.";
                    } 
               } //else {
                //echo"<script type=\"text/javascript\">window.location = \"register\"</script>"; } 
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
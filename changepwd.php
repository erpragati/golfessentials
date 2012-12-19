<?php 
$title="Change Your Password for golfessentials.in";
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


<?php
if (isset($_GET['e'])) {
$email=htmlspecialchars($_GET['e']);
$h=htmlspecialchars($_GET['b']);
$salt=substr($h, 0, 29);
$nh=crypt($email, $salt);

if($nh==$h){
$sql="SELECT CustEmail FROM customer WHERE CustEmail='$email'";
$query=mysql_query($sql);
$count=mysql_num_rows($query);
if($count==1)
    {
?>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" > <br>

<table>
<tr><td>Enter New Password</td><td><input type="password" name="pwd"></td></tr>
<tr><td>Re-Enter Password</td><td><input type="password" name="rpwd"></td></tr>
<tr><td><input type="hidden" name="e" value="<?php echo $email; ?>" ></td><td><input type="submit" id="pwdchange" value="Change Password"></td></tr>
</table>

  </form>
    <?php 
  }
} else {   echo "There was an error, please try again.";    }
}
if (isset($_POST['e'])) {
$pwd=$_POST['pwd'];
  $rpwd=$_POST['rpwd'];
  $e=$_POST['e'];

  
if($pwd==$rpwd)
  {
      if(preg_match("/^[a-zA-Z0-9]{6,12}$/", $pwd))
      {
        function unique_salt() { return substr(sha1(mt_rand()),0,22); }
                    $salt= unique_salt();                    //////salt//////
                    
                    $h_pwd= crypt($pwd, '$2a$10$'.$salt);   ///////hash//////
                    
                    
                 $sql="UPDATE customer SET CustPassword='$h_pwd' WHERE CustEmail='$e'";

                 $query=mysql_query($sql);
                 if ($query)
                 {
                  echo "The password for <b>".$e."</b> has been succesfully changed";
                 }

                 else

                 {
                  echo "There was some error in the connection, please try agin later";
                 }
      }

      else
      {
        echo "password cannot be accepted<br>";
      }
  }
else
  {
    echo "Passwords do not match <br>";
  }

}
    ?>



            </div>
<?php include 'footer.php'; ?>
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
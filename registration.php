<?php 
session_start();
include_once ('connection.php');
include_once ('functions.php');
require("PHPMailer/class.phpmailer.php");
$_SESSION['fname']=$fname=$_POST["CustFirstName"];
$_SESSION['lname']=$lname=$_POST["CustLastName"];
$_SESSION['email']=$email=$_POST["CustEmail"];
$_SESSION['pwd']=$pwd=$_POST["CustPassword"];
$_SESSION['rpwd']=$rpwd=$_POST["repeat"];
$_SESSION['add']=$add=$_POST["CustAddress1"];
$_SESSION['city']=$city=$_POST["CustCity"];
$_SESSION['state']=$state=$_POST["state"];
$_SESSION['pin']=$pin=$_POST["CustPostalcode"];
$_SESSION['mob']=$mob=$_POST["CustMobile"];
$_SESSION['phone']=$phone= (isset($_POST['SecondNum'])&&($_POST['SecondNum'])) ? $_POST['SecondNum'] : 0 ;
$_SESSION['tos']=$tos = (isset($_POST['ToS'])) ? TRUE : FALSE ;
$_SESSION['gender']=$gender=(isset($_POST['gender'])) ? $_POST['gender'] : NULL ;
$_SESSION['age']=$age=$_POST["age"];

$_SESSION['error']="";
if ($tos) {
     if($pwd==$rpwd){
          if(preg_match("/^[a-zA-Z'&-. ]+$/", $fname)&&preg_match("/^[a-zA-Z']+$/", $lname)&&preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)&&preg_match("/^[a-zA-Z0-9]{6,12}$/", $pwd)&&preg_match("/^[a-zA-Z0-9-#.!,@\[\]\(\)\/ ]+$/", $add)&&preg_match("/^[a-zA-Z-& ]+$/", $city)&&preg_match("/^[0-9]{6}$/", $pin)&&preg_match("/^[0-9]{10}$/", $mob)/*&&preg_match("/^[0-9-]{8,15}$/", $phone)*/)
               {
                    //$full_bday=$bday." ".$bmonth." ".$byear;
 
                    $check_email="select * from customer where CustEmail='$email'";
                    $mail_query=mysql_query($check_email);
                    $count=mysql_num_rows($mail_query);
                    if ($count==0) {
                    
                         function unique_salt() { return substr(sha1(mt_rand()),0,22); }
                         $salt= unique_salt();                    //////salt//////
                         $h_pwd= crypt($pwd, '$2a$10$'.$salt);   ///////hash//////
                         $insert="INSERT into customer(`CustFirstName`, `CustLastName`, `CustAddress`, `CustCity`, `CustState`, `CustPostalCode`, `CustPhone`, `CustMobile`, `CustEmail`, `CustPassword`, `gender`, `age`) 
                         VALUES ('$fname','$lname','$add','$city','$state',$pin,$phone,$mob,'$email','$h_pwd','$gender','$age')";
                         $query=mysql_query($insert);

                        
                         $ID=mysql_insert_id();
                         $insertsubscriber="INSERT into subscribers(`email`, `status`, `registered`,`mobile`,`customerid`) VALUES ('$email',0,1,$mob,$ID)";
                         mysql_query($insertsubscriber);
                              if($query) {
                                   $_SESSION['login']=TRUE;
                                   $_SESSION['CustomerID']=$ID;
                                   $mail = new PHPMailer();
                                   $mail->IsSMTP();                                                                       // set mailer to use SMTP
                                   $mail->Host = "mail.golfessentials.in";                                             // specify main and backup server
                                   $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
                                   $mail->SMTPKeepAlive = true;  
                                   $mail->Mailer = "smtp"; 
                                   $mail->SMTPDebug  = 0;
                                   $mail->SMTPSecure = "ssl"; 
                                   $mail->Port = 465;
                                   $mail->Username = "info@golfessentials.in";                                             // SMTP username
                                   $mail->Password = "TyZSrNwSnsyT";                                           // SMTP password
                                   $mail->From = "info@golfessentials.in";
                                   $mail->FromName = "golfessentials.in";
                                   $mail->AddAddress($email);                                     // name is optional
                                   $mail->AddReplyTo("info@golfessentials.in");
                                   $mail->WordWrap = 50;                                     // set word wrap to 50 characters
                                   $mail->IsHTML(true);                                          // set email format to HTML
                                   $mail->Subject = "Welcome to golfessentials.in";
                                   ob_start();
                                   include 'mail/register.php';
                                   $content = ob_get_clean();
                                   $mail->Body    = $content;
                                   $mail->AltBody = $content;
                                   if(!$mail->Send())
                                        {
                                             echo "Message could not be sent. <p>";
                                             echo "Mailer Error: " . $mail->ErrorInfo;
                                             exit;
                                        }
                                             //----------------------------------
                                   
                                   unset($_SESSION['fname'],$_SESSION['lname'],$_SESSION['email'],$_SESSION['pwd'],$_SESSION['rpwd'],$_SESSION['add'],$_SESSION['city'],$_SESSION['state'],$_SESSION['pin'],$_SESSION['mob'],$_SESSION['phone'],$_SESSION['tos'],$_SESSION['tin'],$_SESSION['gender'],$_SESSION['age']);
                                   header('location: index');
                              } else {
                                   $_SESSION['registererror']=TRUE;
                                   $_SESSION['login']=FALSE;
                              }
                    } else {
                         $_SESSION['registererror']=TRUE;
                         $_SESSION['login']=FALSE;
                         $_SESSION['error']="<p> ".$email." is already registered in our system. Forgot your password? <a href=\"pwdchange\">We’ll email it to you</a> </p>";
                    }
               } else {
                    $_SESSION['registererror']=TRUE;
                    $_SESSION['login']=FALSE;
               }
     } else {
          $_SESSION['login']=FALSE;
          $_SESSION['error'] .= "<p>Both the passwords do not match</p>";
     }
} else {
          $_SESSION['login']=FALSE;
          $_SESSION['registererror']=TRUE;
          $_SESSION['tos_error']=TRUE;
          $_SESSION['error'] .= "<p> You must tick the checkbox indicating that you agree to our Terms of Service in order to complete the registration process. </p>";
}
if(!preg_match("/^[a-zA-Z'&-. ]+$/", $fname))     {  $_SESSION['fname_error']=TRUE;  $_SESSION['error'] .= "<p> You entered an incorrect first name. </p>";    }
if(!preg_match("/^[a-zA-Z]+$/", $lname)) {  $_SESSION['lname_error']=TRUE;   $_SESSION['error'] .= "<p> You entered an incorrect last name. </p>";}
if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)){  $_SESSION['email_error']=TRUE;   $_SESSION['error'] .= "<p> Your password or email address is incorrect. Please try again or use the registration form provided below to create an account. </p>";}
if(!preg_match("/^[a-zA-Z0-9]{6,12}$/", $pwd)){$_SESSION['pwd_error']=TRUE;   $_SESSION['error'] .= "<p> Your password or email address is incorrect. Please try again or use the registration form provided below to create an account. </p>";}
if(!preg_match("/^[a-zA-Z0-9-#.!,@\[\]\(\)\/ ]+$/", $add)){   $_SESSION['add_error']=TRUE;  $_SESSION['error'] .= "<p> You entered an incorrect address.</p>";}
if(!preg_match("/^[a-zA-Z-& ]+$/", $city)){   $_SESSION['city_error']=TRUE;  $_SESSION['error'] .= "<p> You entered an incorrect city. </p>";}
if(!preg_match("/^[0-9]{6}$/", $pin)){  $_SESSION['pin_error']=TRUE;   $_SESSION['error'] .= "<p> You entered an incorrect pin number. </p>";}
if(!preg_match("/^[0-9]{10}$/", $mob)){  $_SESSION['mob_error']=TRUE;   $_SESSION['error'] .= "<p> You entered an incorrect mobile number.</p>";}
/*if(!preg_match("/^[0-9-]{8,15}$/", $phone)){     $_SESSION['error'] .= "<p> You entered an incorrect phone number. </p>";}*/
if (isset($_SESSION['login'])&&$_SESSION['login']) {
     header('location: index');
} else {
     header('Location: register');
}
?>
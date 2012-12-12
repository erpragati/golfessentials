<?php
if(!isset($_SESSION)){ session_start(); }
date_default_timezone_set('Asia/Calcutta');
include_once 'connection.php';
include_once ('functions.php');
require("PHPMailer/class.phpmailer.php");
if(isset($_POST['address'])&&isset($_POST['city'])&&isset($_POST['state'])&&isset($_POST['pincode'])&&isset($_POST['mobile'])&&isset($_SESSION['login'])&&$_SESSION['login'])
     {
          $address=$_POST['address'];
          $city=$_POST['city'];
          $state=$_POST['state'];
          $pin=$_POST['pincode'];
          $mobile=$_POST['mobile'];
          if(preg_match("/^[a-zA-Z0-9-#.!,@\[\]\(\)\/ ]+$/", $address)&&preg_match("/^[a-zA-Z-& ]+$/", $city)&&preg_match("/^[a-zA-Z-& ]+$/", $state)&&preg_match("/^[0-9]{6}$/", $pin)&&preg_match("/^[0-9]{10}$/", $mobile))
               {
                    $sql="UPDATE customer SET CustAddress='$address', CustCity='$city', CustState='$state', CustMobile='$mobile', CustPostalCode='$pin' WHERE CustomerID=".$_SESSION['CustomerID'];
                    //echo $sql;
                    $query=mysql_query($sql);
               }
          #----------------------------------------------------------------------------------------------------------------
          $mail = new PHPMailer();
          $mail->IsSMTP();                                                                       // set mailer to use SMTP
          $mail->Host = "mail.golfessentials.in";                                         // specify main and backup server
          $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
          $mail->SMTPKeepAlive = true;  
          $mail->Mailer = "smtp"; 
          $mail->SMTPDebug  = 0;
          $mail->SMTPSecure = "ssl"; 
          $mail->Port = 465;
          $mail->Username = "support@golfessentials.in";                     // SMTP username
          $mail->Password = "Ie9rDuWAEDQ]";                                       // SMTP password
          $mail->From = "support@golfessentials.in";
          $mail->FromName = "golfessentials.in";
          $mail->AddAddress(GetCustomerDetails('email'));                   // name is optional
          $mail->AddReplyTo("support@golfessentials.in");
          $mail->WordWrap = 50;                                       // set word wrap to 50 characters
          $mail->IsHTML(true);                                            // set email format to HTML
          $mail->Subject = "Your account information has been changed";
          ob_start();
          include 'mail/changeinfo.php';
          $content = ob_get_clean();
          $mail->Body    = $content;
          $mail->AltBody = $content;

          if(!$mail->Send())
               {
                    echo "Message could not be sent. <p>";
                    echo "Mailer Error: " . $mail->ErrorInfo;
                    exit;
               }
          $_SESSION['pi']=TRUE;
          #----------------------------------------------------------------------------------------------------------------
     }
elseif (isset($_POST['repeatpwd'])) {
     $newpwd=$_POST['repeatpwd'];
     function unique_salt() { return substr(sha1(mt_rand()),0,22); }
     $salt= unique_salt();
     $h_pwd= crypt($newpwd, '$2a$10$'.$salt);
     $sql="UPDATE customer SET CustPassword='$h_pwd' WHERE CustomerID=".$_SESSION['CustomerID'];
     $query=mysql_query($sql);
     #----------------------------------------------------------------------------------------------------------------
     $mail = new PHPMailer(true);
     $mail->IsSMTP();                                                                       // set mailer to use SMTP
     $mail->Host = "mail.golfessentials.in";                                         // specify main and backup server
     $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
     $mail->SMTPKeepAlive = true;  
     $mail->Mailer = "smtp"; 
     $mail->SMTPDebug  = 0;
     $mail->SMTPSecure = "ssl";
     $mail->Port = 465;
     $mail->Username = "support@golfessentials.in";                     // SMTP username
     $mail->Password = "Ie9rDuWAEDQ]";                                       // SMTP password
     $mail->From = "support@golfessentials.in";
     $mail->FromName = "golfessentials.in";
     $mail->AddAddress(GetCustomerDetails('email'));                   // name is optional
     $mail->AddReplyTo("support@golfessentials.in");
     $mail->WordWrap = 50;                                       // set word wrap to 50 characters
     $mail->IsHTML(true);                                            // set email format to HTML
     $mail->Subject = "Your account information has been changed";
     ob_start();
     include 'mail/changeinfo.php';
     $content = ob_get_clean();
     $mail->Body    = $content;
     $mail->AltBody = $content;

     if(!$mail->Send())
          {
               echo "Message could not be sent. <p>";
               echo "Mailer Error: " . $mail->ErrorInfo;
               exit;
          }
     $_SESSION['p']=TRUE;
     #----------------------------------------------------------------------------------------------------------------
} elseif (isset($_POST['repeatemail'])) {
     $newemail=$_POST['repeatemail'];
     $sql="UPDATE customer SET CustEmail='$newemail' WHERE CustomerID=".$_SESSION['CustomerID'];
     $query=mysql_query($sql);
     #----------------------------------------------------------------------------------------------------------------
     $mail = new PHPMailer();
     $mail->IsSMTP();                                                                       // set mailer to use SMTP
     $mail->Host = "mail.golfessentials.in";                                         // specify main and backup server
     $mail->SMTPAuth = true;                                                              // turn on SMTP authentication
     $mail->SMTPKeepAlive = true;  
     $mail->Mailer = "smtp"; 
     $mail->SMTPDebug  = 0;
     $mail->SMTPSecure = "ssl"; 
     $mail->Port = 465;
     $mail->Username = "support@golfessentials.in";                     // SMTP username
     $mail->Password = "Ie9rDuWAEDQ]";                                       // SMTP password
     $mail->From = "support@golfessentials.in";
     $mail->FromName = "golfessentials.in";
     $mail->AddAddress($newemail);                   // name is optional
     $mail->AddReplyTo("support@golfessentials.in");
     $mail->WordWrap = 50;                                       // set word wrap to 50 characters
     $mail->IsHTML(true);                                            // set email format to HTML
     $mail->Subject = "Your account information has been changed";
     ob_start();
     include 'mail/changeinfo.php';
     $content = ob_get_clean();
     $mail->Body    = $content;
     $mail->AltBody = $content;

     if(!$mail->Send())
          {
               echo "Message could not be sent. <p>";
               echo "Mailer Error: " . $mail->ErrorInfo;
               exit;
          }
     $_SESSION['e']=TRUE;
     #----------------------------------------------------------------------------------------------------------------
}
header('Location: register');
?>
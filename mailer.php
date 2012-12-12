<?php
header('Refresh: 300');
require("PHPMailer/class.phpmailer.php");
include_once 'connection.php';
include_once 'functions.php';
if(!isset($_SESSION)){ session_start(); }

$query= mysql_query("select email,status,unsubscribed from mailer"); // change db
while ($row= mysql_fetch_array($query))
{
	if ($row[2]!=1) {
		if($row[1]!=1)	{
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = "mail.golfessentials.in";
			$mail->SMTPAuth = true;
			$mail->SMTPKeepAlive = true;
			$mail->Mailer = "smtp";
			$mail->SMTPDebug  = 0;
			$mail->SMTPSecure = "tls";
			$mail->Port = 25;
			$mail->Username = "promotions@golfessentials.in";
			$mail->Password = "2Wf]2+=oM&iG";
			$mail->From = "promotions@golfessentials.in";
			$mail->FromName = "golfessentials.in";
			$mail->AddAddress("$row[0]");
			$mail->AddReplyTo('info@golfessentials.in');
			$mail->WordWrap = 50;
			$mail->IsHTML(true);
			$mail->Subject = "Latest Arrivals at golfessentials.in";
			ob_start();
			include 'mail/promotional_061212.php';
			$content = ob_get_clean();
			$mail->Body    = $content;
			$mail->AltBody = $content;
			if(!$mail->Send())
			{
				echo "Message could not be sent. <p>";
				echo "Mailer Error: " . $mail->ErrorInfo;
				exit;
			}
			echo "Message sent to $row[0]. <br />" ;
			mysql_query("UPDATE mailer SET status = 1 WHERE email = '$row[0]'"); // change db
		} else {
			echo "Message has already been sent to $row[0]. <br />" ;
		}
	}
}
?>
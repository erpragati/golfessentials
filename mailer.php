<?php
header('Refresh: 600');	#	Refresh automatically every 600 seconds or 10 minutes
/**
*	Include neccessary files
*/
require("PHPMailer/class.phpmailer.php");
include_once 'connection.php';
if(!isset($_SESSION)){ session_start(); }
/**
*	Define mailing values [ Only the ones with comment need to be redefined ]
*/
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "mail.golfessentials.in";				#	SMTP Server
$mail->SMTPAuth = true;
$mail->SMTPKeepAlive = true;
$mail->Mailer = "smtp";
$mail->SMTPDebug  = 0;
$mail->SMTPSecure = "tls";						#	STARTTLS Technique [ tls/ssl ]
$mail->Port = 25;								#	SMTP Port Number
$mail->Username = "promotions@golfessentials.in";		#	Email-ID/Username
$mail->Password = "2Wf]2+=oM&iG";					#	Email Password
$mail->From = "promotions@golfessentials.in";		#	From Email ID
$mail->FromName = "golfessentials.in";				#	From name
$mail->AddReplyTo('info@golfessentials.in');			#	Reply To Email ID
$mail->WordWrap = 50;
$mail->IsHTML(true);
$mail->Subject = "Seasons Greetings! Special Offers at golfessentials.in";	#	Define Email Subject
ob_start();
include 'mail/promotional_211212.php';				#	HTML File as Email's content
$content = ob_get_clean();
$mail->Body    = $content;
$mail->AltBody = $content;
/**
*	Query the database [ Current database - 'mailer' ] and loop through each Email ID
*/
$database="mailer";
$query= mysql_query("select email,status,unsubscribed from " . $database);
$num=mysql_num_rows($query);
$unsub=0;
$sent=0;
$error = array();
while ($row= mysql_fetch_array($query))
{
	if ($row[2]!=1) {	#	If the user with current email has not unsubscribed
		if($row[1]!=1)	{	#	If email has not been sent to the current Email-ID
			$mail->AddAddress($row[0]);	#	The variable '$row[0]' holds the current Email-ID
			if(!$mail->Send())	#	Send Email & if failed, store the error
			{
				$error['error'] = $mail->ErrorInfo;
				break;
			}
			$sent++;	#	Increment the 'sent mail' counter
			echo "<b>Sent : </b> $row[0]<br />" ;
			mysql_query("UPDATE " . $database . " SET status = 1 WHERE email = '" . $row[0] . "'");
		} else {
			$sent++;	#	Increment the 'sent mail' counter [ If already sent ]
		}
	} else {
		$unsub++;	#	Increment the 'unsubscribe' counter
	}
}
/**
*	Display the Statistics
*/
echo "<br>-------------------------------------------------------------------------------<br>";
echo "<b>Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</b> <small>" . $num . "</small><br>";
echo "<b>Sent&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</b> <small>" . $sent . "</small><br>";
echo "<b>Unsubscribed&nbsp;&nbsp;:&nbsp;</b> <small>" . $unsub . "</small><br>";
$remaining = $num-($sent+$unsub);
echo "<b>Remaining&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;</b> <small>" . $remaining . "</small><br>";
echo "-------------------------------------------------------------------------------<br>";
if (!empty($error)) {
	foreach ($error as $errorname => $errorvalue) {
		echo $errorvalue;
	}
}
unset($num);
unset($sent);
unset($unsub);
unset($remaining);
unset($mail);
unset($content);
unset($query);
unset($row);
unset($error);
?>
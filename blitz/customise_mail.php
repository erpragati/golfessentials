<?php
if (isset($_GET['id'])) {
	include_once '../connection.php';
	$id = (int)$_GET['id'];
	$sql = "SELECT * FROM customise WHERE customiseorderid = " . $id;
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);
	if ($num !== 1) {
		header('Location: customise.php');
	} else {
		while ($order=mysql_fetch_array($query)) {
			include_once '../functions.php';
			require("../PHPMailer/class.phpmailer.php");
			$mail = new PHPMailer();
			$mail->IsSMTP();
			$mail->Host = "mail.golfessentials.in";				#	SMTP Server
			$mail->SMTPAuth = true;
			$mail->SMTPKeepAlive = true;
			$mail->Mailer = "smtp";
			$mail->SMTPDebug  = 0;
			$mail->SMTPSecure = "tls";						#	STARTTLS Technique [ tls/ssl ]
			$mail->Port = 25;								#	SMTP Port Number
			$mail->Username = "sales@golfessentials.in";			#	Email-ID/Username
			$mail->Password = "5eL#RbBagel1";					#	Email Password
			$mail->From = "sales@golfessentials.in";			#	From Email ID
			$mail->FromName = "golfessentials.in";				#	From name
			$mail->AddAddress("info@golfessentials.in");			#	Jstewart's Email-ID
			$mail->AddReplyTo('sales@golfessentials.in');		#	'Reply To' Email ID
			$mail->WordWrap = 50;
			$mail->IsHTML(true);
			$mail->Subject = "Customise it order";				#	Define Email Subject
			$logos	=	array(
				$order[22]	=>	$order[20],
				$order[25]	=>	$order[23],
				$order[28]	=>	$order[26],
				$order[31]	=>	$order[29],
				$order[34]	=>	$order[32],
				$order[39]	=>	$order[35],
				$order[40]	=>	$order[38],
				$order[43]	=>	$order[41]
			);
			foreach ($logos as $key => $value) {
				if ($value != "0") {
					if (file_exists("../" . $order[4] . "/" . $key)) {
						$mail->AddAttachment("../" . $order[4] . "/" . $key);
					}
				}
			}
			ob_start();
			include 'customise_order_mail.php';				#	HTML File as Email's content
			$content = ob_get_clean();
			$mail->Body    = $content;
			$mail->AltBody = $content;
			if(!$mail->Send()){
				$error = $mail->ErrorInfo;
				break;
			}
			echo "An Email to Jstewart has been successfully sent.";
			echo "<br><a href=\"customise.php\">Go back</a>";
		}
		if (isset($error)) {
			echo $error;
			echo "<br>Please look into the appropriate error and try agaian.";
			unset($error);
		}
	}
	
} else {
	if (isset($_SERVER['HTTP_REFERER'])) {
		header('Location: '.$_SERVER['HTTP_REFERER']);
	} else {
		header('Location: customise.php');
	}
}
?>
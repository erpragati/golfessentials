<?php
if(!isset($_SESSION)){ session_start(); }
include_once 'connection.php';
include_once 'functions.php';
require("PHPMailer/class.phpmailer.php");
$fe=$details=$se=$productname=$brand=$type=$ce=$subject=$enquiry=NULL;
if (isset($_GET['ce'])) {
	if (isset($_SESSION['login'])){
		$email=GetCustomerDetails('email');
	} else {
		if (isset($_GET['name'])) {$name=sanitizeString($_GET['name']);}
		if (isset($_GET['mobile'])) {$mobile=sanitizeString($_GET['mobile']);}
		if (isset($_GET['email'])) {$email=sanitizeString($_GET['email']);} else {$_SESSION['OrderError'] .= "<li>Please provide an email address !</li>"; header('Location: contactus');}
	}
	$_SESSION['OrderError']="";
	if (isset($_GET['subject'])) {$subject=$_GET['subject'];} else { $_SESSION['OrderError'] .= "<li>Please select a subject !</li>"; header('Location: contactus'); }
	if (isset($_GET['enquiry'])) {$enquiry=$_GET['enquiry'];} else { $_SESSION['OrderError'] .= "<li>Please input a message !</li>"; header('Location: contactus'); }

	$mail = new PHPMailer(true);
	try {
		$mail->IsSMTP();														  // set mailer to use SMTP
		$mail->Host = "mail.golfessentials.in";								     // specify main and backup server
		$mail->SMTPAuth = true;   												// turn on SMTP authentication
		$mail->SMTPKeepAlive = true;  
		$mail->Mailer = "smtp"; 
		$mail->SMTPDebug  = 0;
		$mail->SMTPSecure = "ssl"; 
		$mail->Port = 465;
		$mail->Username = "support@golfessentials.in"; 				   // SMTP username
		$mail->Password = "Ie9rDuWAEDQ]";								  // SMTP password
		$mail->From = "support@golfessentials.in";
		$mail->FromName = "golfessentials.in";
		$mail->AddAddress("support@golfessentials.in");                   // name is optional
		$mail->AddReplyTo($email);
		$mail->WordWrap = 50;                            		     // set word wrap to 50 characters
		$mail->IsHTML(true);                              		    // set email format to HTML
		$mail->Subject = "Thank you for your message";
		ob_start();
		include 'mail/contactus.php';
		$content = ob_get_clean();
		$mail->Body    = $content;
		$mail->AltBody = $content;
		$mail->Send();
	} catch (phpmailerException $e) {
		$_SESSION['mailererror'] = $e->errorMessage();
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	$mail = new PHPMailer(true);
	try {
		$mail->IsSMTP();														  // set mailer to use SMTP
		$mail->Host = "mail.golfessentials.in";								     // specify main and backup server
		$mail->SMTPAuth = true;   												// turn on SMTP authentication
		$mail->SMTPKeepAlive = true;  
		$mail->Mailer = "smtp"; 
		$mail->SMTPDebug  = 0;
		$mail->SMTPSecure = "ssl"; 
		$mail->Port = 465;
		$mail->Username = "support@golfessentials.in"; 				    // SMTP username
		$mail->Password = "Ie9rDuWAEDQ]";								   // SMTP password
		$mail->From = "support@golfessentials.in";
		$mail->FromName = "golfessentials.in";
		$mail->AddAddress($email);                 				 		 // name is optional
		$mail->AddReplyTo("support@golfessentials.in");
		$mail->WordWrap = 50;                            		   	   // set word wrap to 50 characters
		$mail->IsHTML(true);                              		      // set email format to HTML
		$mail->Subject = "Thank you for your message";
		ob_start();
		include 'mail/contactus.php';
		$content = ob_get_clean();
		$mail->Body    = $content;
		$mail->AltBody = $content;
		$mail->Send();
	} catch (phpmailerException $e) {
		$_SESSION['mailererror'] = $e->errorMessage();
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	if (isset($_SESSION['error'])||isset($_SESSION['mailererror'])) {
		header('Location: error?page=contactus');
	} else {
		header('Location: feedbackprocess?type=contact');
	}

} elseif (isset($_GET['se'])) {
	$_SESSION['OrderError']="";
	if (isset($_GET['category'])&&$_GET['category']!="empty") {$category=$_GET['category'];} else { $_SESSION['OrderError'] .= "<li>Please select a category !</li>"; header('Location: special'); }
	if (isset($_GET['productname'])) {$productname=$_GET['productname'];} else { $_SESSION['OrderError'] .= "<li>Please specify a product name !</li>"; header('Location: special'); }
	if (isset($_GET['brand'])&&$_GET['brand']!="empty") {$brand=$_GET['brand'];} else { $_SESSION['OrderError'] .= "<li>Please select a brand !</li>"; header('Location: special'); }
	$details=htmlspecialchars($_GET['details']);
	$email=GetCustomerDetails('email');
	if ($_SESSION['OrderError']!=""){
		header('Location: special');
	}

	$mail = new PHPMailer(true);
	try{
		$mail->IsSMTP();														  // set mailer to use SMTP
		$mail->Host = "mail.golfessentials.in";								         // specify main and backup server
		$mail->SMTPAuth = true;   												// turn on SMTP authentication
		$mail->SMTPKeepAlive = true;  
		$mail->Mailer = "smtp"; 
		$mail->SMTPDebug  = 0;
		$mail->SMTPSecure = "ssl"; 
		$mail->Port = 465;
		$mail->Username = "sales@golfessentials.in"; 				          			  // SMTP username
		$mail->Password = "5eL#RbBagel1";									 // SMTP password
		$mail->From = "sales@golfessentials.in";
		$mail->FromName = "golfessentials.in";
		$mail->AddAddress("sales@golfessentials.in");                 				 // name is optional
		$mail->AddReplyTo($email);
		$mail->WordWrap = 50;                            		   // set word wrap to 50 characters
		$mail->IsHTML(true);                              		  // set email format to HTML
		$mail->Subject = "We have received your order ";
		ob_start();
		include 'mail/special.php';
		$content = ob_get_clean();
		$mail->Body    = $content;
		$mail->AltBody = $content;
		$mail->Send();
	} catch (phpmailerException $e) {
		$_SESSION['mailererror'] = $e->errorMessage();
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	$mail = new PHPMailer(true);
	try{
		$mail->IsSMTP();														  // set mailer to use SMTP
		$mail->Host = "mail.golfessentials.in";								         // specify main and backup server
		$mail->SMTPAuth = true;   												// turn on SMTP authentication
		$mail->SMTPKeepAlive = true;  
		$mail->Mailer = "smtp"; 
		$mail->SMTPDebug  = 0;
		$mail->SMTPSecure = "ssl"; 
		$mail->Port = 465;
		$mail->Username = "sales@golfessentials.in"; 				          			  // SMTP username
		$mail->Password = "5eL#RbBagel1";									 // SMTP password
		$mail->From = "sales@golfessentials.in";
		$mail->FromName = "golfessentials.in";
		$mail->AddAddress($email);                 				 // name is optional
		$mail->AddReplyTo("sales@golfessentials.in");
		$mail->WordWrap = 50;                            		   // set word wrap to 50 characters
		$mail->IsHTML(true);                              		  // set email format to HTML
		$mail->Subject = "We have received your order ";
		ob_start();
		include 'mail/special.php';
		$content = ob_get_clean();
		$mail->Body    = $content;
		$mail->AltBody = $content;
		$mail->Send()
	} catch (phpmailerException $e) {
		$_SESSION['mailererror'] = $e->errorMessage();
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	if (isset($_SESSION['error'])||isset($_SESSION['mailererror'])) {
		header('Location: error?page=special');
	} else {
		header('Location: feedbackprocess?type=special');
	}

} elseif (isset($_GET['fe'])) {
	$email=GetCustomerDetails('email');
	$_SESSION['OrderError']="";
	if (isset($_GET['type'])&&$_GET['type']!="empty") {$type=$_GET['type'];} else { $_SESSION['OrderError'] .= "<li>Please select a feedback type !</li>"; header('Location: feedback'); }
	if (isset($_GET['subject'])&&$_GET['subject']!="empty") {$subject=$_GET['subject'];} else { $_SESSION['OrderError'] .= "<li><li>Please select a feedback subject !</li>"; header('Location: feedback'); }
	if (isset($_GET['message'])) {$message=$_GET['message'];} else { $_SESSION['OrderError'] .= "<li>Please input a message !</li>"; header('Location: feedback'); }
	//---------------------------------------------------------------------------------------------------------------------------
	if ($_SESSION['OrderError']!=""){
		header('Location: feedback');
	}
	try{
		$mail = new PHPMailer(true);
		$mail->IsSMTP();														  // set mailer to use SMTP
		$mail->Host = "mail.golfessentials.in";								         // specify main and backup server
		$mail->SMTPAuth = true;   												// turn on SMTP authentication
		$mail->SMTPKeepAlive = true;  
		$mail->Mailer = "smtp"; 
		$mail->SMTPDebug  = 0;
		$mail->SMTPSecure = "ssl"; 
		$mail->Port = 465;
		$mail->Username = "support@golfessentials.in"; 				          			  // SMTP username
		$mail->Password = "Ie9rDuWAEDQ]";									 // SMTP password
		$mail->From = "support@golfessentials.in";
		$mail->FromName = "golfessentials.in";
		$mail->AddAddress("support@golfessentials.in");                 				 // name is optional
		$mail->AddReplyTo($email);
		$mail->WordWrap = 50;                            		   // set word wrap to 50 characters
		$mail->IsHTML(true);                              		  // set email format to HTML
		$mail->Subject = "Thank you for your feedback";
		ob_start();
		include 'mail/feedback.php';
		$content = ob_get_clean();
		$mail->Body    = $content;
		$mail->AltBody = $content;
		$mail->Send();
	} catch (phpmailerException $e) {
		$_SESSION['mailererror'] = $e->errorMessage();
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	$mail = new PHPMailer(true);
	try{
		$mail->IsSMTP();														  // set mailer to use SMTP
		$mail->Host = "mail.golfessentials.in";								         // specify main and backup server
		$mail->SMTPAuth = true;   												// turn on SMTP authentication
		$mail->SMTPKeepAlive = true;  
		$mail->Mailer = "smtp"; 
		$mail->SMTPDebug  = 0;
		$mail->SMTPSecure = "ssl"; 
		$mail->Port = 465;
		$mail->Username = "support@golfessentials.in"; 				          			  // SMTP username
		$mail->Password = "Ie9rDuWAEDQ]";									 // SMTP password
		$mail->From = "support@golfessentials.in";
		$mail->FromName = "golfessentials.in";
		$mail->AddAddress($email);                 				 // name is optional
		$mail->AddReplyTo("support@golfessentials.in");
		$mail->WordWrap = 50;                            		   // set word wrap to 50 characters
		$mail->IsHTML(true);                              		  // set email format to HTML
		$mail->Subject = "Thank you for your feedback";
		ob_start();
		include 'mail/feedback.php';
		$content = ob_get_clean();
		$mail->Body    = $content;
		$mail->AltBody = $content;
		$mail->Send();
	} catch (phpmailerException $e) {
		$_SESSION['mailererror'] = $e->errorMessage();
	} catch (Exception $e) {
		$_SESSION['error'] = $e->getMessage();
	}

	if (isset($_SESSION['error'])||isset($_SESSION['mailererror'])) {
		header('Location: error?page=feedback');
	} else {
		header('Location: feedbackprocess?type=feedback');
	}
} else{
	header('Location: error?type=unknown');
}
?>
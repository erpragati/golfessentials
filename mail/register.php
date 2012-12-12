<?php #include '../functions.php'; include '../connection.php'; if(!isset($_SESSION)){ session_start(); } ?>
<html>
<head>
</head>
<body style="background-color:#333;padding:0;margin:0;">
	<table width="100%" cellpadding="0" cellspacing="0" align="center" valign="top">
		<tr>
			<td>
				<table width="600" cellpadding="0" cellspacing="0" align="center" valign="top">
					<tr><td colspan="3" width="600" height="50"></td></tr>
					<tr><td colspan="3" ><img src="http://golfessentials.in/img/curve.png" width="600" height="10"></td></tr>
					<tr style="background-color:#fff;">
						<td width="300" align="center" valign="middle" colspan="3" >
							<a href="http://golfessentials.in"><img src="http://golfessentials.in/img/logo_BW.png" width="300" height="54" /></a>
						</td>
					</tr>
					<tr style="background-color:#ccc;"><td height="1" colspan="3" ></td></tr>
					<tr style="background-color:#fff;"><td height="30" colspan="3" ></td></tr>
					<tr style="background-color:#fff;font-size:16px;font-family:'arial','sans-serif';color:#333;">
						<td width="20"></td>
						<td width="560" align="left" valign="middle">
							<p>Welcome to golfessentials.in, <?php echo $fname." ".$lname;?>!</p>
							<p>golfessentials.in is the one-stop shop for golfers in India offering quality golf equipment at competent prices.</p>
							<p>We are pleased to have you as our newest member and hope you have a stress-free shopping experience.</p>
							<p>Please use your registered Email ID <?php echo $email;?> to login at any time.</p>
							<p>Click <a href="http://golfessentials.in/index">here</a> to browse through our collection of products now.</p>
							<p>You can reset your password at any time by clicking <a href="http://golfessentials.in/pwdchange">here</a>.</p>
							<p>If you have any questions or comments, we encourage you to <a href="http://golfessentials.in/contactus">contact</a> one of our excellent support service employees who will be happy to help you.</p>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;"><td height="30" colspan="3" ></td></tr>
					<tr style="background-color:#fff;font-family:'verdana','arial','sans-serif';">
						<td width="20"></td>
						<td width="560" style="font-size:16px;font-family:'arial','sans-serif';color:#333;">
							Best Regards,<br>Kevin Singh<br>CEO
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;"><td height="20" colspan="3" ></td></tr>
					<tr style="background-color:#ccc;"><td height="1" colspan="3" ></td></tr>
					<tr style="background-color:#fff;"><td height="10" colspan="3" ></td></tr>
					<tr style="background-color:#fff;font-size:13px;font-family:'arial','sans-serif';">
						<td width="20"></td>
						<td width="560" height="20" align="left" valign="middle" style="color:#666;">
							<p><b>Website</b>&nbsp;&nbsp;<a href="http://golfessentials.in" style="text-decoration:none;color:#000;font-size:14px;">www.golfessentials.in</a></p>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;font-size:13px;font-family:'arial','sans-serif';">
						<td width="20"></td>
						<td width="560" height="20" align="left" valign="middle" style="color:#666;">
							<p><b>Email</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:info@golfessentials.in" style="text-decoration:none;color:#000;font-size:14px;">info@golfessentials.in</a></p>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;font-size:13px;font-family:'arial','sans-serif';">
						<td width="20"></td>
						<td width="560" height="20" align="left" valign="middle" style="color:#666;">
							<p><b>Contact</b>&nbsp;&nbsp;<span style="text-decoration:none;color:#000;font-size:14px;">+91-8968893333</span></p>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;" height="25">
						<td width="20"></td>
						<td width="560" style="font-size:13px;font-family:'arial','sans-serif';color:#666;">
							<b>Follow us &amp; stay updated</b>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;">
						<td width="20"></td>
						<td width="560">
							<table>
								<tr>
									<td width="50">
										<a href="https://www.facebook.com/golfessentials.in" target="_blank"><img src="http://www.golfessentials.in/mail/facebook-icon.png" width="25" height="25"></a>
									</td>
									<td width="510" align="left">
										<a href="https://www.facebook.com/golfessentials.in" target="_blank" style="text-decoration:none;font-size:13px;font-family:'arial','sans-serif';color:#666;font-weight:bold;">Facebook</a>
									</td>
								</tr>
								<tr>
									<td width="50">
										<a href="https://www.twitter.com/golf_essentials" target="_blank"><img src="http://www.golfessentials.in/mail/twitter-bird-light-bgs.png" width="25" height="25"></a>
									</td>
									<td width="510" align="left">
										<a href="https://www.twitter.com/golf_essentials" target="_blank" style="text-decoration:none;font-size:13px;font-family:'arial','sans-serif';color:#666;font-weight:bold;">Twitter</a>
									</td>
								</tr>
								<tr>
									<td width="50">
										<a href="http://pinterest.com/golfessentials/" target="_blank"><img src="http://www.golfessentials.in/mail/pinterest-icon.png" width="25" height="25"></a>
									</td>
									<td width="510" align="left">
										<a href="http://pinterest.com/golfessentials/" target="_blank" style="text-decoration:none;font-size:13px;font-family:'arial','sans-serif';color:#666;font-weight:bold;">Pinterest</a>
									</td>
								</tr>
								<tr>
									<td width="50">
										<a href="http://instagram.com/golfessentials" target="_blank"><img src="http://www.golfessentials.in/mail/insta.png" width="25" height="25"></a>
									</td>
									<td width="510" align="left">
										<a href="http://instagram.com/golfessentials" target="_blank" style="text-decoration:none;font-size:13px;font-family:'arial','sans-serif';color:#666;font-weight:bold;">Instagram</a>
									</td>
								</tr>
							</table>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;"><td colspan="3" width="600" height="10"></td></tr>
					<tr style="background-color:#fff;font-size:11px;font-family:'arial','sans-serif';">
						<td width="20"></td>
						<td width="560" height="50" align="left" valign="middle" style="color:#666;">
							<p>golfessentials.in will also periodically send you information about new products and the latest offers.  On your My Account page, you will find the option to unsubscribe from our newsletter.</p>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;font-size:13px;font-family:'arial','sans-serif';">
							<td width="20"></td>
	                      	<td style="font-size:10px;text-align:justify;color:#999;font-family:arial,sans-serif;">
	                        	The information contained in this email is confidential and may be legally privileged. If you are not the intended recipient, please notify the sender immediately and destroy this email. Any form of unauthorised use, publication, reproduction, copying or disclosure of the content of this e-mail is not permitted. 
	                      	</td>
	                      	<td width="20"></td>
	                </tr>
					<tr style="background-color:#fff;"><td colspan="3" width="600" height="10"></td></tr>
					<tr><td colspan="3" width="600" height="50"></td></tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
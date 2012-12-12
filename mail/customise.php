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
						<td width="560" align="left" valign="middle" style="font-size:14px;">
							<p style="font-size:16px;">Hi <?php echo GetCustomerDetails('fname')." ".GetCustomerDetails('lname') ?>,</p>
							<p style="font-size:16px;">Thank you for your order.</p>
							<p style="font-size:16px;">Please find below your order summary for your reference.</p>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;" height="10"><td colspan="3"></td></tr>
					<tr style="background-color:#fff;">
						<td width="20"></td>
						<td width="560" height="50">
				               <p><b>Product Name:</b> <?php echo $_SESSION['productname']; ?></p>
				               <p><b>Colour 1:</b> <?php echo $_SESSION['color1']; ?></p>
				               <p><b>Colour 2:</b> <?php echo $_SESSION['color2']; ?></p>
				               <p><b>Colour 3:</b> <?php echo $_SESSION['color3']; ?></p>
				               <table>
				                    <tr><th></th><th align="center">Selected</th><th align="center">Details</th><th align="center">Position</th></tr>
				                    <?php if(isset($_SESSION['nameb'])){ ?>
				                    <tr>
				                         <td align="center">Name</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['nameb'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['nameb'])) ? $_SESSION['namevalue'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['nameb'])) ? $_SESSION['nameposition'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if(isset($_SESSION['flagb'])){ ?>
				                    <tr>
				                         <td align="center">Flag</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['flagb'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['flagb'])) ? $_SESSION['flagvalue'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['flagb'])) ? $_SESSION['flagposition'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if(isset($_SESSION['urlb'])){ ?>
				                    <tr>
				                         <td align="center">URL</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['urlb'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['urlb'])) ? $_SESSION['urlvalue'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['urlb'])) ? $_SESSION['urlposition'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if(isset($_SESSION['logo1b'])){ ?>
				                    <tr>
				                         <td align="center">Logo 1</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo1b'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo1b'])) ? $_SESSION['logo1name'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo1b'])) ? $_SESSION['logo1position'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if(isset($_SESSION['logo2b'])){ ?>
				                    <tr>
				                         <td align="center">Logo 2</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo2b'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo2b'])) ? $_SESSION['logo2name'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo2b'])) ? $_SESSION['logo2position'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if(isset($_SESSION['logo3b'])){ ?>
				                    <tr>
				                         <td align="center">Logo 3</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo3b'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo3b'])) ? $_SESSION['logo3name'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo3b'])) ? $_SESSION['logo3position'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if(isset($_SESSION['logo4b'])){ ?>
				                    <tr>
				                         <td align="center">Logo 4</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo4b'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo4b'])) ? $_SESSION['logo4name'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo4b'])) ? $_SESSION['logo4position'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if(isset($_SESSION['logo5b'])){ ?>
				                    <tr>
				                         <td align="center">Logo 5</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo5b'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo5b'])) ? $_SESSION['logo5name'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo5b'])) ? $$_SESSION['logo5position'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if(isset($_SESSION['logo6b'])){ ?>
				                    <tr>
				                         <td align="center">Logo 6</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo6b'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo6b'])) ? $_SESSION['logo6name'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo6b'])) ? $_SESSION['logo6position'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if(isset($_SESSION['logo7b'])){ ?>
				                    <tr>
				                         <td align="center">Logo 7</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo7b'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo7b'])) ? $_SESSION['logo7name'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo7b'])) ? $_SESSION['logo7position'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if(isset($_SESSION['logo8b'])){ ?>
				                    <tr>
				                         <td align="center">Logo 8</td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo8b'])) ? "Yes" : "No" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo8b'])) ? $_SESSION['logo8name'] : "Not Selected" ;
				                              ?>
				                         </td>
				                         <td align="center" style="font-weight:bold;">
				                              <?php
				                                   echo (isset($_SESSION['logo8b'])) ? $_SESSION['logo8position'] : "Not Selected" ;
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } ?>
				                    <tr>
				                         <td align="center">Quantity</td>
				                         <td colspan="3" style="font-weight:bold;">
				                              <?php
				                                   echo "<b>".$_SESSION['quantity']."</b>";
				                              ?>
				                         </td>
				                    </tr>
				                    <tr>
				                         <td align="center">Price</td>
				                         <td colspan="3" class="green" style="font-weight:bold;">
				                              <?php
				                              if($_SESSION['baseprice']!="Price on request"){
				                                   echo ($_SESSION['count']>4) ? "[ Rs ".$_SESSION['baseprice']." + (".($_SESSION['count']-4)." x 1000) = Rs ".$_SESSION['price']." ] x ".$_SESSION['quantity']." = Rs ".number_format(($_SESSION['price']*$_SESSION['quantity']), 0, ' ', ',') : "Rs ".number_format($_SESSION['baseprice'], 0, ' ', ',')." x ".$_SESSION['quantity']." = Rs ".number_format(($_SESSION['baseprice']*$_SESSION['quantity']), 0, ' ', ',') ;
				                              } else {
				                                   echo "We will get back to you shortly on this.";
				                              }
				                              ?>
				                         </td>
				                    </tr>
				               </table>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;" height="10"><td colspan="3"></td></tr>
					<tr style="background-color:#fff;">
						<td width="20"></td>
						<td width="560" align="left" valign="middle" style="font-size:14px;">
							<p style="font-size:16px;font-family:'arial','sans-serif';">Please note that the production lead time is <?php echo $_SESSION['leadtime']."."; if($_SESSION['baseprice']=='Price on request'){ echo " from the day you confirm your order."; } ?></p>
							<p style="font-size:16px;font-family:'arial','sans-serif';">We will send you detailed drawings for your approval <?php if ($_SESSION['baseprice']=="Price on request") { echo "shortly after we receive your confirmation on the price."; } else { echo "at the earliest possible."; } ?></p>
							<p style="font-size:16px;font-family:'arial','sans-serif';">If you have any questions or comments, we encourage you to <a href="http://golfessentials.in/contactus">contact</a> one of our excellent support service employees who will be happy to help you.<?php #if ($_SESSION['baseprice']!="Price on request") { echo " We request you to provide your Invoice number in your communication for our reference, thereby helping us serve you better!";} ?></p>
							<p style="font-size:16px;font-family:'arial','sans-serif';">Best Regards,<br>Your golfessentials.in Team</p>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;"><td height="20" colspan="3" ></td></tr>
					<tr style="background-color:#ccc;font-family:arial','sans-serif';" height="1">
						<td colspan="3"></td>
					</tr>
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
					<tr style="background-color:#fff;"><td colspan="3" width="600" height="10"></td></tr>
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
					<tr><td colspan="3" width="600" height="50"></td></tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>
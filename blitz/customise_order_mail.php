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
							<p style="font-size:16px;">Hi Jstewart Golf Team,</p>
							<p style="font-size:16px;">Please find below the order summary that has been received by us:</p>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;" height="10"><td colspan="3"></td></tr>
					<tr style="background-color:#fff;">
						<td width="20"></td>
						<td width="560" height="50">
				               <table cellpadding="2" cellspacing="1" style="background-color: #daeecf;">
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Product Name&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[2];
				                              ?>
				                         </td>
				                    </tr>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Colour 1&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[8];
				                              ?>
				                         </td>
				                    </tr>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Colour 2&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[9];
				                              ?>
				                         </td>
				                    </tr>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Colour 3&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[10];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php if($order[11] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Name&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[12] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[13];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if($order[14] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Flag&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[15] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[16];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if($order[17] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">URL&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[18] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[19];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if($order[20] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Logo&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[22] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[21];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if($order[23] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Logo&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[25] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[24];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if($order[26] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Logo&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[28] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[27];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if($order[29] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Logo&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[31] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[30];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if($order[32] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Logo&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[34] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[33];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if($order[35] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Logo&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[37] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[36];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if($order[38] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Logo&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[40] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[39];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } if($order[41] != 0){ ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Logo&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                              	echo $order[43] . "&nbsp;&nbsp;@&nbsp;&nbsp;Position&nbsp;&nbsp;#&nbsp;" . $order[42];
				                              ?>
				                         </td>
				                    </tr>
				                    <?php } ?>
				                    <tr>
				                         <td align="right" style="font-weight:bold;background-color: #71be44">Quantity&nbsp;:&nbsp;</td>
				                         <td align="left" style="background-color: #daeecf">
				                              <?php
				                                   echo "<b>".$order[7]."</b>";
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
							<p style="font-size:16px;font-family:'arial','sans-serif';">Looking forward to your confirmation. Thank you!</p>
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
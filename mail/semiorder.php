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
							<p style="font-size:16px;">Hi <?php echo GetCustomerDetails('fname',$ID)." ".GetCustomerDetails('lname',$ID) ?>,</p>
							<p style="font-size:16px;">We are pleased to inform you that the products ordered by you are currently in stock. </p>
							<p style="font-size:16px;">Please find attached the invoice pertaining to your order.</p>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;" height="10"><td colspan="3"></td></tr>
<!--
					<tr style="background-color:#fff;">
						<td width="20"></td>
						<td width="560" height="50">
							<?php
/*
							$number=$total=0;
							echo "<table style='background-color:#fff;' width='100%'><tr><th>S.No</th><th>Product Name</th><th>Price</th><th>Qty.</th><th>Amount</th></tr>";
		                    for ($i=0; $i <= count($subid) ; $i++) {
		                        if(isset($check[$i])){
		                            $number++;
		                            echo "<tr>";
		                            echo "<td>".$number."</td>";
		                            echo "<td>".GetProductDetails($subid[$i],'name')."</td>";
		                            $total += (GetProductDetails($subid[$i],'sp')*$qty[$i]);
		                            echo "<td><b>Rs.</b> ".number_format(GetProductDetails($subid[$i],'sp'), 0, ' ', ',')."</td>";
		                            echo "<td>".$qty[$i]."</td>";
		                            echo "<td><b>Rs.</b> ".(GetProductDetails($subid[$i],'sp')*$qty[$i])."</td>";
		                            echo "</tr>";
		                        }
		                    }
							echo "<tr><td colspan=\"4\" style='font-weight:bold;'>Grand Total</td><td style='font-weight:bold;'><b>Rs</b> ".number_format($total, 0, ' ', ',')."</td></tr>";
							echo "</table>";
*/
							?>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;" height="10"><td colspan="3"></td></tr>
-->
					<tr style="background-color:#fff;">
						<td width="20"></td>
						<td width="560" align="left" valign="middle">
							<?php if($payment!='cash') { ?>
								<p style="font-size:16px;">We request you to follow the payment instructions stated in the invoice.</p>
								<p style="font-size:16px;">On receipt of payment, the package will be dispatched and the tracking details will be sent across to you. We request you to send the details related to the payment to us as soon as possible, thereby helping us deliver your products faster.</p>
							<?php } else { ?>
								<p style="font-size:16px;">Your order will be delivered at your doorstep and the amount stated in the invoice will be collected at the time of delivery.</p>
							<?php } ?>
							<p style="font-size:16px;">Please visit us again!</p>
							<p style="font-size:16px;">Best Regards,<br>Your golfessentials.in Team</p>
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
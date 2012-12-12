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
							<?php
							$number=$total=0;
							echo "<table style='background-color:#fff;' width='100%'><tr><th>S.No</th><th>Product Name</th><th>Price</th><th>Qty.</th><th>Amount</th></tr>";
							foreach ($_SESSION['checkout'] as $key => $value) {
							     $number++;
							     echo "<tr>";
								     echo "<td style='font-weight:bold;' align='center'>".$number."</td>";
								     $sql="SELECT productmaster.ProductID, Brand, productmaster.ProductName, SP FROM productmaster JOIN subproduct WHERE productmaster.ProductID = subproduct.ProductID AND subproduct.SubProductID='".$key."'";
								     $query=mysql_query($sql);
								     $row=mysql_fetch_row($query);
								     echo "<td style='font-weight:bold;' align='center'>".$row[1]." ".$row[2]."</td>";
								     $total += ($row[3]*$value);
								     echo "<td style='font-weight:bold;' align='center'>Rs ".number_format($row[3], 0, ' ', ',')."</td>";
								     echo "<td style='font-weight:bold;' align='center'>".$value."</td>";
								     echo "<td style='font-weight:bold;' align='center'>Rs ".($row[3]*$value)."</td>";
							     echo "</tr>";
							}
							echo "<tr><td colspan=\"4\" style='font-weight:bold;'>Grand Total</td><td style='font-weight:bold;'><b>Rs</b> ".number_format($total, 0, ' ', ',')."</td></tr>";
							echo "</table>";

							?>
						</td>
						<td width="20"></td>
					</tr>
					<tr style="background-color:#fff;" height="10"><td colspan="3"></td></tr>
					<tr style="background-color:#fff;">
						<td width="20"></td>
						<td width="560" align="left" valign="middle">
							<p style="font-size:16px;">We are checking on the availability of the products and will get back to you shortly.</p>
							<p style="font-size:16px;">Thank you for your continuous support and understanding!</p>
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
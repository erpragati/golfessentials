			try {
				$mail->Send();
			} catch (phpmailerException $e) {
				$error['phpmailerException'] = $e->errorMessage();
			} catch (Exception $e) {
				$_SESSION['error'] = $e->getMessage();
			}
			if (empty($error)) {
				$sent++;	#	Increment the 'sent mail' counter
				echo "<b>Sent : </b> $row[0]<br />" ;
				mysql_query("UPDATE " . $database . " SET status = 1 WHERE email = '" . $row[0] . "'");
			} else {
				break;
			}

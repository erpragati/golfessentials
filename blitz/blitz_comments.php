<html>
<head>
</head>
<body>
	<?php
		include '../connection.php';
		$sql= "SELECT CommentID, ProductID, Comment, username, DateAdded, showing FROM comments WHERE 1";
		$query=mysql_query($sql); 		
	?>
	<table border="1">
		<tr><th>Comment ID</th><th>Product</th><th>Comment</th><th>User Name</th><th>Date Of Review</th><th>Status</th><th>Action</th></tr>
		<?php while ($comment_array=mysql_fetch_array($query)) { ?>
		<tr>
			<td><?php echo $comment_array[0]; ?></td>
			<td><?php echo $comment_array[1]; ?></td>
			<td><?php echo $comment_array[2]; ?></td>
			<td><?php echo $comment_array[3]; ?></td>
			<td><?php echo $comment_array[4]; ?></td>
			<td><?php if($comment_array[5]==0){echo "Not Showing";}elseif($comment_array[5]==1){echo "Enabled";} ?></td>
			
		</tr>	

		<?php } ?>
	</table>

</body>
</html>
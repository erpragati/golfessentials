<?php
session_start();
if (isset($_GET['id'])) {
	include('connection.php');
	$id=$_GET['id'];

	$sql="SELECT Rating, TimesRated FROM productmaster WHERE ProductID=$id";
	$query=mysql_query($sql);
	$row=mysql_fetch_row($query);
	$rating=$row[0];		//rating stored in database
	$count=$row[1];			//total number of ratings stored in datase

	$user_rating=$_GET['val'];	//receiving the rating input from the user 
	$new_count=$count+1;		//this is the new count for the total numer of ratings

	$avg=(($count*$rating)+$user_rating)/$new_count;		//this is the new total i.e prvious total+the new rating from the user
	$new_rating=round($avg, 1);		//rounding up the number to one's place //after this insert the updated records into the database

	$insert="UPDATE productmaster SET Rating=$new_rating, TimesRated=$new_count WHERE ProductID=$id";
	$insert_query=mysql_query($insert);
	$previous = "product?id=".$id;
	header('Location: '.$previous);
} else {
	header('Location: index');
}
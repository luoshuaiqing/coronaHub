<?php 
	require "../config/config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno)
	{
		echo $mysqli->connect_error;
		exit();
	}

	$category = $_POST['category'];

	$sql = "SELECT * FROM item WHERE user_id = ". $user_id .";";
	$result_item = $mysqli->query($sql);
	if(!$result_item)
	{
		echo $mysqli->error;
		exit();
	}
	

	// can use $result_item to access all the items posted by a specific user
	// can use $result_post to access all the posts posted by a specific user (-- to do --)
?>
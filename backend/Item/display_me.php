<?php 
	require "../config/config.php";

	if(!isset($_SESSION['user_id']) || empty($_SESSION['user_id']))
	{
		header("Location: #") // go back to home page
	}

	$user_id = $_SESSION['user_id'];

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno)
	{
		echo $mysqli->connect_error;
		exit();
	}

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

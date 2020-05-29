<?php 
	// only the content of a post can be updated
	require "../config/config.php";
	
	$isUpdated = false;
	
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno)
	{
		echo $mysqli->connect_error;
		exit();
	}

	$headline = $_POST['headline'];
	$post_id=$_POST["post_id"];
	$content= $_POST['content'];
	$timestamp = date("Y-m-d H:i:s"); // need to set server timezone

	if(!isset($_POST['content']) || empty($_POST['content']))
	{
		$error = "Content cannot be null!";
		header('Location: #'); // directly go back to the previous page with error displayed
	}
	

	$sql_prepared = "UPDATE post SET content = ?, publish_time = ?, headline = ? WHERE post_id = ?;";

	$statement_update = $mysqli->prepare($sql_prepared);
	$statement_update->bind_param("sssi",$content,$timestamp,$headline,$post_id);

	$executed_update = $statement_update->execute();
		
	if(!$executed_update)
	{
		echo $mysqli->error;
		exit();
	}

	if($statement_update->affected_rows == 1)
	{
		$isUpdated = true;
	}

	$statement_update->close();
	$mysqli->close();
	header('Location: #') // goto the next location (probably 我的 界面) 
?>
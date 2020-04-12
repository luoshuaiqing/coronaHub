<?php 
	require "../config/config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno)
	{
		echo $mysqli->connect_error;
		exit();
	}


	$category = $_POST['category'];

	$sql_prepared = "SELECT * FROM item WHERE category = ?;";
	$statement = $mysqli->prepare($sql_prepared);
	$statement->bind_param("s",$statement);

	$result_item = $statment->execute();
	if(!$result_item)
	{
		echo $mysqli->error;
		exit();
	}

	

	// can use $result_item to access all the items in a specific category (For post_item.html)
	
?>
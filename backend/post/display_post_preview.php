<?php 
	require "../config/config.php";

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno)
	{
		echo $mysqli->connect_error;
		exit();
	}


	$category = $_POST['category'];

	$sql_prepared = "SELECT * FROM post WHERE category = ?;";
	$statement = $mysqli->prepare($sql_prepared);
	$statement->bind_param("s",$statement);

	$result_item = $statment->execute();
	if(!$result_item)
	{
		echo $mysqli->error;
		exit();
	}

	$headlines = array();
	$authors = array();
	$timestamps = array();
	$views = array();
	$contributions = array();

	// newly added feature
	$replies = array();

	while($row = $result_item->fetch_assoc())
	{
		array_push($headlines, $row['headline']);
		array_push($authors, $row['author']);
		array_push($timestamps, $row['timestamp']);
		array_push($views,$row['view']);
		array_push($contributions,$row['contribution']);
		array_push($replies, $row['reply']);
	}



	// When displaying, use $headlines, $authors, $timestamps, $views, $contributions and $replies to fill the page
	
?>
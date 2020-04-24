<?php 
	require "../config/config.php";

	// Helper sorting function
	function date_sort($a,$b)
	{
		return $a['timestamp'] > $b['timestamp'];
	}

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if($mysqli->connect_errno)
	{
		echo $mysqli->connect_error;
		exit();
	}

	$category = $_POST['category'];
	$headline = $_POST['headline'];
	$author = $_POST['author'];


	/*
		Main Post Part
	*/
	$sql_prepared = "SELECT * FROM post WHERE category = ?, headline = ?, author = ?;";
	$statement = $mysqli->prepare($sql_prepared);
	$statement->bind_param("sss",$statement);

	$executed_post = $statment->execute();
	if(!$executed_post)
	{
		echo $mysqli->error;
		exit();
	}
	$result_post = $statement->get_result();
	$statement->close();

	$temp_row = $result_post->fetch_assoc();
	$post_id = $temp_row['post_id'];


	/*
		Comment Part
	*/

	$sql_prepared_comments = "SELECT * FROM post_comment WHERE category = ?, post_id = ?;";
	$statement_comments = $mysqli->prepare($sql_prepared_comments);
	$statement_comments->bind_param("si",$category,$post_id);

	$executed_comments = $statement_comments->execute();
	if(!$executed_comments)
	{
		echo $mysqli->error;
		exit();
	}
	$result_comments = $statement_comments->get_result();
	$statement_comments->close();

	usort($result_comments,"date_sort"); // sort the comment by date (latest first)

	// When displaying, use $temp_row for the attributes of the main post and use $result_comments for all the comments below
	
?>
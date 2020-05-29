<?php
  if(!isset($_GET['id']) || empty($_GET['id']) )
  {
   	  $error = "Invalid post ID.";
      header("Location: ../../profile.php?error=" . $error);
      exit();
  }
   
  require "../config/config.php";
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
  
	if( $mysqli->connect_errno) 
  {
		echo $mysqli->connect_error;
		exit();
	}

	$sql="DELETE FROM post WHERE post_id=" . $_GET["id"] . ";";
	$results=$mysqli->query($sql);
	$isDeleted = false;
	if(!$results) {
		echo $mysqli->error;
		exit();
	}
	if ($mysqli->affected_rows == 1) {
		$isDeleted = true;
	}
	$mysqli->close();
  $message = "Delete successful";
  header("Location: ../../profile.php?message=" . $message);
?>
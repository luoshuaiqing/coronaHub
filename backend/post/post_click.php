<?php 

// Attention: Only ***upvote*** is supported for now, but database is already flexible
    require "../config/config.php";

    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if($mysqli->connect_errno)
    {
      echo $mysqli->connect_error;
      exit();
    }

    $exist = false;
    $user_id = $_GET['user_id'];
    $post_id = $_GET['post_id'];
    $sql_check = "SELECT * FROM post_click WHERE post_id = " . $post_id . " AND user_id = " . $user_id . ";";
    $result_check = $mysqli->query($sql_check);

   
    if($result_check->fetch_assoc())
    {
    	$error = "You have already clicked on this post!";
    	header("Location: ../../post_detail.php?id=" . $post_id . "&error=" . $error);
    	exit();
    }
    else
    {
    	$sql_insert = "INSERT INTO post_click(post_id,user_id) VALUES(". $post_id . "," . $user_id . ");";
    	$result_insert = $mysqli->query($sql_insert);
    	if(!$result_insert)
    	{
    		echo $mysqli->error;
    		exit();
    	}
    	$sql_post = "SELECT * FROM post WHERE post_id = ". $post_id . ";";
    	$result_post = $mysqli->query($sql_post);
    	$row = $result_post->fetch_assoc();
    	$cnt = $row['thumb_up'];
    	$cnt++;
    	$sql_update = "UPDATE post SET thumb_up = " . $cnt . " WHERE post_id = " . $post_id . ";";
    	
    	$result_update = $mysqli->query($sql_update);

    	if(!$result_update)
    	{
    		echo $mysqli->error;
    		exit();
    	}
    	header("Location: ../../post_detail.php?id=" . $post_id);
    }

?>
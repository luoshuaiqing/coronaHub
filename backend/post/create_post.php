<?php
	require "../config/config.php";
	if(!isset($_SESSION['username']) || empty($_SESSION['username']))
	{
		$error = "Please login or register to proceed";
		header("Location: ../user/login_email.php?error=".$error);
		exit();
	}
	

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// debug
	var_dump($_POST);

	if($mysqli->connect_errno)
	{
		echo $mysqli->connect_error;
		exit();
	}
	$username = $_SESSION["username"];


	$sql_user = "SELECT * FROM user WHERE username = ?;";
    $statement_user = $mysqli->prepare($sql_user);
    $statement_user->bind_param("s",$username);
    $execute_user = $statement_user->execute();
    if(!$execute_user)
    {
        echo $mysqli->error;
        exit();
    }


    $result_user = $statement_user->get_result();
    $user_id = 0; 
    while($row = $result_user->fetch_assoc())
    {
    	$user_id = $row['user_id'];
    }

	if(!isset($_POST['headline']) || empty($_POST['headline']))
	{
		$error = "Please enter a headline for your post";
		header("Location: ../../post_add.php?error=".$error);
		exit();
	}
	$headline = $_POST['headline'];

	if(!isset($_POST['content']) || empty($_POST['content']))
	{
		$error = "Please enter a content";
		header("Location: ../../post_add.php?error=".$error);
		exit();
	}
	$content = $_POST["content"];

	$category = null;
	if(isset($_POST['back']) && !empty($_POST['back']))
	{
		$category = "back";
	}
	else if(isset($_POST['stay']) && !empty($_POST['stay']))
	{
		$category = "stay";
	}
	else
	{
		$error = "Please select a category for your post!";
		header("Location: ../../post_add.php?error=".$error);
		exit();
	}

	$timestamp = date("Y-m-d H:i:s");

	/* For Simplicity, Now only support uploading one fike */
	// if  ($_FILES['picture1']['size']  ==  0)  {
	// 	die("ERROR: No picture uploaded");
	// }

	// //  check  if  file  type  is  allowed 
	// $allowedExtension  =  array("png","jpg","jpeg","bmp","gif");
	// $extension = substr($_FILES['picture1']['name'], strrpos($_FILES['picture1']['name'], '.') + 1);
	// if  (!in_array($extension,  $allowedExtension)) {
	// 	die("ERROR: Supported Extensions are: png, jpg, jpeg, bmp and gif");
	// } 
	
	// //  check  if  this  is  a  valid  upload
	// if  (!is_uploaded_file($_FILES['picture1']['tmp_name']))   
	// {
	// 	die("ERROR:  Not  a  valid  file  upload"); 
	// } 

	// $path1 = DEST . "file" . $cnt . $extension;
	// move_uploaded_file($_FILES['picture1']['tmp_name'],  $path)  or  die("Cannot process the uploaded file");

	// $path2 = null; // null for now
	
	/* Figure out the next available id to use */
	$cnt = 1;
	$sql = "SELECT * FROM post";
	$result_cnt = $mysqli->query($sql);
	if(!$result_cnt)
	{
		echo $mysqli->error;
		exit();
	}
	while($row = $result_cnt->fetch_assoc())
	{
		$cnt = $cnt+1; // not safe for concurrency reason, need to modify later
	}


	//  set  the  name  of  the  target  directory
	
	$path1 = null;
	$path2 = null;

	$reply_time = $timestamp;

	$zero = 0; // used for thumbup, view and reply

	$sql_prepared_insert = "INSERT INTO post(author_id,category,headline,content,path1,path2,publish_time,update_time,reply_time) VALUES(?,?,?,?,?,?,?,?,?);";

	$statement_insert = $mysqli->prepare($sql_prepared_insert);

	var_dump($sql_prepared_insert);
	$statement_insert->bind_param("issssssss",$user_id,$category,$headline,$content,$path1,$path2,$timestamp,$timestamp,$reply_time);

	$executed_insert = $statement_insert->execute();
	if(!$executed_insert)
	{
		echo $mysqli->error;
		exit();
	}
	$statement_insert->close();
	$mysqli->close();

	header("Location: ../../index.php");

?>
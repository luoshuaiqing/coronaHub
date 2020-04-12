<?php
	require "../config/config.php";
	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// debug
	var_dump($_POST);

	if($mysqli->connect_errno)
	{
		echo $mysqli->connect_error;
		exit();
	}

	$user_id = $_SESSION["user_id"]; // can we really get this?
	$name = $_POST["username"];
	$category = $_POST["category"];
	$amount = $_POST["amount"];
	$timestamp = date("Y-m-d H:i:s");
	$description = $_POST["description"];

	/* For Simplicity, Now only support uploading one file */
	if  ($_FILES['picture1']['size']  ==  0)  {
		die("ERROR: No picture uploaded");
	}

	//  check  if  file  type  is  allowed 
	$allowedExtension  =  array("png","jpg","jpeg","bmp","gif");
	$extension = substr($_FILES['picture1']['name'], strrpos($_FILES['picture1']['name'], '.') + 1);
	if  (!in_array($extension,  $allowedExtension)) {
		die("ERROR: Supported Extensions are: png, jpg, jpeg, bmp and gif");
	} 
	
	//  check  if  this  is  a  valid  upload
	if  (!is_uploaded_file($_FILES['picture1']['tmp_name']))   
	{
		die("ERROR:  Not  a  valid  file  upload"); 
	} 
	
	/* Figure out the next available id to use */
	$cnt = 1;
	$sql = "SELECT * FROM item";
	$result_cnt = $mysqli->query($sql);
	if(!$result_cnt)
	{
		echo $mysqli->error;
		exit();
	}
	while($row = $result_cnt->fetch_assoc())
	{
		$cnt = $cnt+1;
	}


	//  set  the  name  of  the  target  directory
	$path1 = DEST . "file" . $cnt . $extension;
	move_uploaded_file($_FILES['picture1']['tmp_name'],  $path)  or  die("Cannot process the uploaded file");

	$path2 = null; // null for now
	

	$sql_prepared_insert = "INSERT INTO item(user_id,name,category,amount,description,timestamp,path1,path2) VALUES(?,?,?,?,?,?,?,?);";
	$statement_insert = $mysqli->prepare($sql_prepared_insert);
	$statement_insert->bind_param("ississss",$user_id,$name,$category,$amount,$description,$timestamp,$path1,$path2);

	$executed_insert = $statement_insert->execute();
	if(!$executed_insert)
	{
		echo $mysqli->error;
		exit();
	}
	$statement_insert->close();
	$mysqli->close();
	header("Location: #");
?>
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

	$name = $_POST["name"];

	$username = $_SESSION['username'];

	echo $username;
	echo "<hr>";

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

    echo $user_id;

	$category = null;
	if(isset($_POST['mask']) && !empty($_POST['mask']))
	{
		$category = 'mask';
	}
	else if(isset($_POST['goggle']) && !empty($_POST['goggle']))
	{
		$category = 'goggle';
	}
	else if(isset($_POST['discontaminate']) && !empty($_POST['discontaminate']))
	{
		$category = 'discontaminate';
	}
	else if(isset($_POST['necessity']) && !empty($_POST['necessity']))
	{
		$category = 'necessity';
	}
	else
	{
		// check error
	}
	$amount = $_POST["amount"];
	$timestamp = date("Y-m-d H:i:s");
	$description = $_POST["description"];

	// echo "<hr>";
	// var_dump($_FILES);
	// echo "<hr>";

	/* For Simplicity, Now only support uploading one file */
	if  ($_FILES['picture1']['size']  ==  0)  
	{
		$error = "Please upload a picture.";
		// header("Location: ../../post_item.php?error=". $error);
		// exit();
	}
	
	//  check  if  file  type  is  allowed 
	$allowedExtension  =  array("png","jpg","jpeg","bmp","gif");
	$extension = substr($_FILES['picture1']['name'], strrpos($_FILES['picture1']['name'], '.') + 1);
	if  (!in_array($extension,  $allowedExtension)) 
	{
		$error = "Supported Extensions are: png, jpg, jpeg, bmp and gif";
		header("Location: ../../item_upload.php?error=". $error);
		exit();
	} 
	
	//  check  if  this  is  a  valid  upload
	if  (!is_uploaded_file($_FILES['picture1']['tmp_name']))   
	{
		$error = "Not a valid file upload";
		header("Location: ../../item_upload.php?error=". $error); 
		exit();
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
		$cnt = $cnt+1; // concurrency issue
	}

	//  set  the  name  of  the  target  directory
	$path1 = DEST . "file" . $cnt . "." . $extension;
	if(!move_uploaded_file($_FILES['picture1']['tmp_name'],  $path1))
	{
	 	$error = "Cannot process the uploaded file.";
		header("Location: ../../item_upload.php?error=". $error); 
		exit();
	}

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
	//header("Location: #"); // goto the according items.php (embed category in url)
?>
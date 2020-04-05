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
	$user_id = $_SESSION["userId"];
	$name = $_POST["name"];
	$category = $_POST["category"];
	$amount = $_POST["amount"];
	$timestamp = date("Y-m-d H:i:s");
	$description = $_POST["description"];
	$path_raw = $_POST["path"];
	$path_to_pic = split(";",$path_raw); // pathes to picture location
	$len = count($path_to_pic);
	if($len == 1)
	{
		array_push($path_to_pic, "NULL");
	}

	$sql_prepared_insert = "INSERT INTO item(user_id,name,category,amount,description,timeStamp,path1,path2) VALUES(?,?,?,?,?,?,?);";
	$statement_insert = $mysqli->prepare($sql_prepared_insert);
	$statement_insert->bind_param("ississss",$user_id,$name,$category,$amount,$description,$timestamp,$path_to_pic[0],$path_to_pic[1]);

	$executed_insert = $statement_insert->execute();
	if(!$executed_insert)
	{
		echo $mysqli->error;
		exit();
	}
	$statement_insert->close();

?>
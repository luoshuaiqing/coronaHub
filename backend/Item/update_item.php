<?php 
	// only name, amount and description are able to be changed
	require "../config/config.php";
	
	$isUpdated = false;
	if(!isset($_POST['item_id']) || empty($_POST['item_id']))
	{
		$error = "Id of item is required";
	}
	else if(!isset($_POST['name']) || empty($_POST['name']))
	{
		$error = "Name of the item is required";
	}
	else if(!isset($_POST['category']) || empty($_POST['category']))
	{
		$error = "Category of the item is required";
	}
	else if(!isset($_POST['amount']) || empty($_POST['amount']))
	{
		$error = "Amount of the item is required";
	}
	else
	{
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($mysqli->connect_errno)
		{
			echo $mysqli->connect_error;
			exit();
		}

		$item_id = $_POST["item_id"];
		$name= $_POST['name'];
		$amount= $_POST['amount'];
		if(isset($_POST['description']) && !empty($_POST['description']))
		{
			$description = $_POST['description'];
		}
		else
		{
			$description = null;
		}
		$timestamp = date("Y-m-d H:i:s"); // need to set server timezone

		$sql_prepared = "UPDATE item SET name = ?, amount = ? ,description = ?, timestamp = ? WHERE item_id = ?;";

		$statement = $mysqli->prepare($sql_prepared);
		$statement->bind_param("sissi",$name,$amount,$description,$timestamp,$item_id);

		$executed = $statement->execute();
		
		if(!$executed)
		{
			echo $mysqli->error;
			exit();
		}

		if($statement->affected_rows == 1)
		{
			$isUpdated = true;
		}

		$statement->close();
		$mysqli->close();

	}

	if(isset($error) && empty($error))
	{
		header("Location: #") // back to the previous page with error displayed
	}
	else
	{
		header("Location: #")// goto 我的界面 with message like "successfully updated"
	}
?>
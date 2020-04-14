<?php
	// to do: go to the related path and delete pictures from the server
	// require "../config/config.php";

	// if(!isset($_SESSION['username']) || empty($_SESSION['username']))
	// {
	// 	header("Location: #"); // direct to login or register page
	// }

	// $username = $_SESSION['username'];
	// $name = $_POST['name'];
	// $amount = $_POST['amount'];
	// $category = $_POST['category'];

	// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// if($mysqli->connect_errno)
	// {
	// 	echo $mysqli->connect_error;
	// 	exit();
	// }

	// $sql_username = "SELECT * FROM user WHERE username ='" . $username . "';";
	// $result_userID = $mysqli->query($sql_user);
	// if(!$result_userID)
	// {
	// 	echo $mysqli->error;
	// 	exit();
	// }
	// $row_userID = $result_userID->fetch_assoc();
	// $user_id = $row_userID["id"];

	// // debug
	// echo $userID;
	// echo "<hr>";

	// /* Now we try to get the id for song */
	// $sql_item_id_prepared = "SELECT * FROM item WHERE user_id = ?, name = ?, amount = ?, category = ?;";
	// $item_id_statement = $mysqli->prepare($sql_item_id_prepared);
	// $item_id_statement->bind_param("isis",$user_id,$name,$amount,$category);
	// $execute_item_id = $item_id_statement->execute();
	// if(!$execute_item_id)
	// {
	// 	echo $mysqli->error;
	// 	exit();
	// }

	// $row_item_id = $execute_item_id->fetch();
	// $item_id = $row_item_id['item_id'];
	// $item_id_statement->close();

	// //debug
	// echo "<hr>  ";
	// echo "Item id is: " . $item_id;
	
	// $sql_delete_item = "DELETE FROM item WHERE item_id= ". $item_id ";";
	// $executed_delete = $mysqli->query($sql_delete);
	// if(!$executed_delete)
	// {
	// 	echo $mysqli->error;
	// 	exit();
	// }
	// if($mysqli->affected_rows==1)
	// {
	// 	echo "Delete Success!";
	// 	echo "<hr>";
	// }
	// $mysqli->close();
?>
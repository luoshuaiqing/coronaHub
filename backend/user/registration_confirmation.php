<?php


require '../config/config.php';


//second line of checking
if ( !isset($_POST['email']) || empty($_POST['email'])
	|| !isset($_POST['username']) || empty($_POST['username'])
	|| !isset($_POST['password']) || empty($_POST['password']) 
    || !isset($_POST['wechatid']) || empty($_POST['wechatid'])) {
	$error = "Please fill out all required fields.";
	echo "here 5";
}
else {
	// Sanitize user input
	//Connectr to data base and add this to new database

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$wechatid=$_POST['wechatid'];
	// $phone=$_POST['phone'];
	$password=hash("sha256", $password);

	if($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	echo "here 1";

	// Check if this user already exists in the database
	$sql_username="SELECT * FROM user
	                 WHERE username=?;"; //'" . $username . "' OR email='" . $email. "';";
	$statement_username=$mysqli->prepare($sql_username);

	// echo $username;

	$statement_username->bind_param("s",$username);



    $executed_username=$statement_username->execute();
     if(!$executed_username){
            	echo $mysqli->error();
                exit();
     }
	 $results_username=$statement_username->get_result();
	 $statement_username->close();
	 echo "here 2";

	if($results_username->num_rows>0){
		$error="Username has been already taken, please choose another one.";
		echo "here 3";
	}
	else{
		$sql_email="SELECT * FROM user
	                 WHERE email=?;";
		$statement_email=$mysqli->prepare($sql_email);
        $statement_email->bind_param("s",$email);
        $executed_email=$statement_email->execute();
        if(!$executed_email){
            echo $mysqli->error();
             exit();
        }
		$results_email=$statement_email->get_result();
		$statement_email->close();
        if(!$results_email){
            echo $mysqli->error();
            exit();
         }
	     if($results_email->num_rows>0)
		  {
			$error = "Email has been already taken, please choose another one.";
			echo "here 4";
	      }
	
		  
	    else{
	// Otherwise, insert this user into the users table.
	     $sql_email="SELECT * FROM user
	                  WHERE wechat_id=?;";
		$statement_wechat=$mysqli->prepare($sql_email);
        $statement_wechat->bind_param("s",$wechatid);
        $executed_wechat=$statement_wechat->execute();
        if(!$executed_wechat){
            echo $mysqli->error();
             exit();
        }
		$results_wechat=$statement_wechat->get_result();
		$statement_wechat->close();
        if(!$results_wechat){
            echo $mysqli->error();
            exit();
         }
	     if($results_wechat->num_rows>0)
		  {
            $error = "Wechat has been already taken, please choose another one.";
	      }
     else{

		$sql= "INSERT INTO user（username, email, password) VALUES(?,?,?);";
		// $sql = "INSERT INTO user (username, email, password) VALUES ('John', 'hi@usc.edu', '12345678');";
		$statement=$mysqli->prepare($sql);

		// if ($mysqli->query($sql) === TRUE) {
		// 	echo "New record created successfully";
		// } else {
		// 	echo "Error: " . $sql . "<br>" . $conn->error;
		// }

		// echo "=================";
		// echo $username;
		// echo "=================";
		// echo $email;
		// echo "=================";
		// echo $password;
		var_dump($statement);
		$statement->bind_param("sss", $username, $email, $password);
		
		$executed=$statement->execute();
		if(!$executed)
		{
			echo "wrong!";
		echo $mysqli->error;
		exit();
		}

		var_dump("success");
	  
		$statement->close();
		$mysqli->close();
	  }
    }
   }
}
   

 ?>

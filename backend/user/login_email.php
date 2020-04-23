<?php
require '../config/config.php';
// If user is logged in, redirect user to home page. Don't allow them to see the login page.
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'])
{
	header('Location: ../../index.php'); // go to home page
}
else 
{
	/* Attention: Email can be noth email or username! */
	if(!isset($_POST['email']) || empty($_POST['email']))
	{
		$error = "Please enter an email address or username.";
	}
	else if(!isset($_POST['password']) || empty($_POST['password']))
	{
		$error = "Please enter a password.";
	}
	// If user attempted to log in (aka submitted the form)
	else
	{
		$use_email = true;
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if($mysqli->connect_errno) {
			echo $mysqli->connect_error;
			exit();
		}

        $email = $_POST["email"]; 
        $password = $_POST["password"];
            //hash user input of password
        $password = hash("sha256", $password);

        $sql_email="SELECT * FROM user WHERE email = ?;"; 
        $statement_email=$mysqli->prepare($sql_email);
        $statement_email->bind_param("s",$email);
        $executedEmail=$statement_email->execute();
        if(!$executedEmail){
            echo $mysqli->error();
            exit();
        }
        $result_email = $statement_email->get_result();
        $statement_email->close();

        if($result_email->num_rows==0) // if we didn't get the result via email, then try username instead
        {
        	$use_email = false;
        	$sql_username = "SELECT * FROM user WHERE username = ?;";
        	$statement_username = $mysqli->prepare($sql_username);
        	$statement_username->bind_param("s",$email);
        	$execute_username = $statement_username->execute();

        	if(!$execute_username)
        	{
        		echo $mysqli->error;
        		exit();
        	}
        	
        	$result_username = $statement_username->get_result();
        	if($result_username->num_rows==0)
        	{
				$error = "邮箱或用户名不存在!";
			}
			$statement_username->close();
			
		}
		if(!isset($error) && empty($error))
		{
			$sql_final = "SELECT * FROM user 
                       WHERE username=? AND password=?;";
			if($user_email==true){
				$sql_final="SELECT * FROM user 
                       WHERE email=? AND password=?;";
			}
		
			$statement_final=$mysqli->prepare($sql_final);
            $statement_final->bind_param("ss",$email,$password);
            $executed_final=$statement_final->execute();
            if(!$executed_final){
            	echo $mysqli->error();
                exit();
            }
            $results_final=$statement_final->get_result();
            if(!$results_final){
            	echo $mysqli->error();
                exit();
            }
			if($results_final->num_rows==0)
			{
              $error = "密码不正确.";
			}
			else
			{	
			   $row=$results_final->fetch_assoc();
			   $_SESSION['logged_in'] = true;
			   $_SESSION['user_id']=$row['user_id'];
			   $_SESSION['username'] = $row['username'];
			}
			$statement_final->close();
			$mysqli->close();
			
		}
		
	}
	if(isset($error) && !empty($error))
	{
		header("Location: ../../login.php?error=" . $error);
	}
	else
	{
		header("Location: ../../index.php");
	}
}
?>






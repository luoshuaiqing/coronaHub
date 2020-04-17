<?php
require '../config/config.php';
// If user is logged in, redirect user to home page. Don't allow them to see the login page.
if( false)//isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
{
	header('Location: ../../index.php'); // go to home page
}
else 
{
	if(!isset($_POST['email']) || empty($_POST['email']))
	{
		$error = "Please enter an email address.";
	}
	else if(!isset($_POST['password']) || empty($_POST['password']))
	{
		$error = "Please enter a password.";
	}
	// If user attempted to log in (aka submitted the form)
	else
	{
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if($mysqli->connect_errno) {
			echo $mysqli->connect_error;
			exit();
		}

        $email = $_POST["email"];
        $password = $_POST["password"];
            //hash user input of password
        $password = hash("sha256", $password);

        $sql="SELECT * FROM user WHERE email = ?;"; 
        $statement=$mysqli->prepare($sql);
        $statement->bind_param("s",$email);
        $executedEmail=$statement->execute();
        if(!$executedEmail){
            echo $mysqli->error();
            exit();
        }
        $results=$statement->get_result();
        if($results->num_rows==0)
        {
			$error = "邮箱不存在";
		}
		else
		{
			$statement->close();
			$sql_final="SELECT * FROM user 
                       WHERE email=? AND password=?;";
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






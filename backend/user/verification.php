<?php
require '../config/config.php';
//second line of checking
if ( !isset($_POST['email']) || empty($_POST['email'])
	|| !isset($_POST['username']) || empty($_POST['username'])
	|| !isset($_POST['password']) || empty($_POST['password']) 
    || !isset($_POST['wechatid']) || empty($_POST['wechatid'])) {
	$error = "Please fill out all required fields.";
}
else {
	// Sanitize user input
	//Connectr to data base and add this to new database

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$wechatid=$_POST['wechatid'];
	$phone=$_POST['phone'];
	$password=hash("sha256", $password);

	if($mysqli->connect_errno) {
		echo $mysqli->connect_error;
		exit();
	}

	// Check if this user already exists in the database
	$sql_username="SELECT * FROM user_info
	                 WHERE username=?;"; //'" . $username . "' OR email='" . $email. "';";
	$statement_username=$mysqli->prepare($sql_username);
	$statement_username->bind_param("s",$username);
    $executed_username=$statement_username->execute();
     if(!$executed_username){
            	echo $mysqli->error();
                exit();
     }
     $results_username=$statement_username->get_result();
	if($results_username->num_rows>0){
		$error="Username has been already taken, please choose another one.";
	}
	else{
		$sql_email="SELECT * FROM user_info
	                 WHERE email=?;";
		$statement_email=$mysqli->prepare($sql_email);
        $statement_email->bind_param("s",$email);
        $executed_email=$statement_email->execute();
        if(!$executed_email){
            echo $mysqli->error();
             exit();
        }
        $results_email=$statement_email->get_result();
        if(!$results_email){
            echo $mysqli->error();
            exit();
         }
	     if($results_email->num_rows>0)
		  {
            $error = "Email has been already taken, please choose another one.";
	      }
	

	else{
	// Otherwise, insert this user into the users table.
	$sql_email="SELECT * FROM user_info
	                 WHERE wechatid=?;";
		$statement_wechat=$mysqli->prepare($sql_email);
        $statement_wechat->bind_param("s",$email);
        $executed_wechat=$statement_wechat->execute();
        if(!$executed_wechat){
            echo $mysqli->error();
             exit();
        }
        $results_wechat=$statement_wechat->get_result();
        if(!$results_wechat){
            echo $mysqli->error();
            exit();
         }
	     if($results_wechat->num_rows>0)
		  {
            $error = "Wechat has been already taken, please choose another one.";
	      }
	      else{
           $_SESSION['username'] = $username;
           $_SESSION['password']= $password;
           $_SESSION['email']=$email;
           $_SESSION['wechatid']=$wechatid;
           $_SESSION['phone']=$phone;
           $ver_code=rand(1000,9999);
           $_SESSION['ver_code']=$ver_code;
           $subject="邮件确认码";
           $message="您好，您的确认码是" . $ver_code;
           $headers = 'From: webmaster@example.com' . "\r\n" .
    					'Reply-To: webmaster@example.com' . "\r\n" .
    					'X-Mailer: PHP/' . phpversion();
           if( mail($email, $subject, $message, $headers) ) {
	// Doesn't guarantee email has actually been received. Email clients can reject any emails or put it in spam etc if they see any suspicious activity.
	        	echo "Email sent";
	        }
           else {
	         echo "There was a problem sending email.";
            }
           }
   $statement_username->close();
    $statement_email->close();
   }

 }
}
?>

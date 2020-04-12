<?php
	include 'nav.php';
require 'config.php';
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
           $message="您好，您的确认码是". $ver_code;
           $headers = "Content-Type: text/html" . "\r\n" . "";
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Confirmation | Song Database</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="final.css">
</head>
<body>

    <div class="container">
	  <div class="row">
		<div class="jumbotron header">
            <h1 class="display-4">Rate my traveling</h1>
            <p class="lead">Record the best memory in your traveling!</p>
        </div>
	 </div> <!-- .row -->
	</div> <!-- .container -->
	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4">User Registration</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<div class="row mt-4">
			<div class="col-12">
				<?php if ( isset($error) && !empty($error) ) : ?>
					<div class="text-danger"><?php echo $error; ?></div>
				<?php else : ?>
				  <form action="registration_confirmation.php" method="POST">
 
			       <div class="form-group row">
				      <div class="row"></div>
				     <div class="col-sm-12 col-md-9">
					     <input type="text" class="form-control" id="verification-id" name="verification">
					     <small id="username-error" class="invalid-feedback">请输入确认码</small>
				    </div>
			     </div> <!-- .form-group -->
			   </form>
			  <?php endif; ?>
		</div> <!-- .col -->
	</div> <!-- .row -->

	<div class="row mt-4 mb-4">
		<div class="col-12">
			<a href="login.php" role="button" class="btn btn-primary">Login</a>
			<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">Back</a>
		</div> <!-- .col -->
	</div> <!-- .row -->

</div> <!-- .container -->

</body>
</html>
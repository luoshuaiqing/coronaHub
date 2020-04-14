<?php
require '../config/config.php';
//second line of checking
   if($_SESSION["verification"]!=$_POST["verification"])
   {
      $ver_code=random(1000,9999);
           $_SESSION['ver_code']=$ver_code;
           $subject="邮件确认码"
           $message="您好，您的确认码是". $ver_code;
           $headers = "Content-Type: text/html" . "\r\n" . "From:coronahub.com";
           if( mail($SESSION['email'], $subject, $message, $headers) ) {
	// Doesn't guarantee email has actually been received. Email clients can reject any emails or put it in spam etc if they see any suspicious activity.
	        echo "Email sent";
	        }
           else {
	         echo "There was a problem sending email.";
            }
           }
   }
   else{

    $sql="INSERT INTO user_info（username, email, password,phone)
          VALUES(?,?,?,?);";
    $statement=$mysqli->prepare($sql);
    $statement->bind_param("ssss", $_SESSION['username'], $_SESSION['email'], $_SESSION['password'], $_SESSION['phone']);
    $executed=$statement->execute();
    if(!$executed)
    {
     echo $mysqli->error;
     exit();
    }
    $statement->close();
	$mysqli->close();
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
				<?php if ( $_SESSION["verification"]!=$_POST["verification"] ) : ?>
					<form action="registration_confirmation.php" method="POST">
 
			       <div class="form-group row">
				      <div class="row"></div>
				     <div class="col-sm-12 col-md-9">
					     <input type="text" class="form-control" id="verification-id" name="verification">
					     <small id="username-error" class="invalid-feedback">请输入确认码</small>
				    </div>
			     </div> <!-- .form-group -->
			   </form>
				<?php else : ?>
					<div class="text-success"><?php echo $_POST['username']; ?> was successfully registered.</div>
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
<?php
require 'config.php';
	include 'nav.php';
// If user is logged in, redirect user to home page. Don't allow them to see the login page.
if( isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {

	header('Location: home_page.php');
}
else {
	// If user attempted to log in (aka submitted the form)
	if( isset($_POST['username']) && isset($_POST['password']) ){
			
		if( empty($_POST['username']) || empty($_POST['password']) ) {

			$error = "Please enter a username and password ";
		}
		//authencate the user
		else{

			$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if($mysqli->connect_errno) {
				echo $mysqli->connect_error;
				exit();
			}
	      }

            $usernameInput = $_POST["username"];
            $passwordInput = $_POST["password"];
            //hash user input of password
            $passwordInput = hash("sha256", $passwordInput);
            $sql="SELECT * FROM user_info
                  WHERE username=?;"; 
            $statement=$mysqli->prepare($sql);
            $statement->bind_param("s",$usernameInput);
           $executed=$statement->execute();
            if(!$executed){
            	echo $mysqli->error();
                exit();
            }
            $results=$statement->get_result();
            if($results->num_rows==0)
            {
			   $error = "用户名不存在";
		    }

			else{
			$sql_final="SELECT * FROM user_info 
                       WHERE username=?  AND password=?;";
			$statement_final=$mysqli->prepare($sql_final);
            $statement_final->bind_param("ss",$usernameInput,$passwordInput);
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
			   $_SESSION['username'] = $_POST['username'];
			   header('Location:home_page.php');
			 }
			 $statement->close();
			 $statement_final->close();
			 $mysqli->close();
		 }
		
	}
}
?>


<!-- Below is just for testing -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login | Rate my traveling</title>
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
			<h1 class="col-12 mt-4 mb-4">Login</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<form action="login_username.php" method="POST">

			<div class="row mb-3">
				<div class="font-italic text-danger col-sm-9 ml-sm-auto">
					<!-- Show errors here. -->
					<?php
						if ( isset($error) && !empty($error) ) {
							echo $error;
						}
					?>
				</div>
			</div> <!-- .row -->
			

			<div class="form-group row">
				<label for="username-id" class="col-sm-12 col-md-3 col-form-label text-sm-right">用户名:</label>
				<div class="col-sm-12 col-md-9">
					<input type="text" class="form-control" id="username-id" name="username">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="password-id" class="col-sm-12 col-md-3 col-form-label text-sm-right">密码:</label>
				<div class="col-sm-12 col-md-9">
					<input type="password" class="form-control" id="password-id" name="password">
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="submit" class="btn btn-primary">登陆</button>
					<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" role="button" class="btn btn-light">取消</a>
				</div>
			</div> <!-- .form-group -->
		</form>

		<div class="row">
			<div class="col-sm-9 ml-sm-auto">
				<a href="login_email.php">你可以尝试邮件登陆</a>
			</div>
		</div> <!-- .row -->

		<div class="row">
			<div class="col-sm-9 ml-sm-auto">
				<a href="register.php">创建账号</a>
			</div>
		</div> <!-- .row -->

	</div> <!-- .container -->
</body>
</html>









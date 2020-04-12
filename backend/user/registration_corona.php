<?php
	include 'nav.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register | Rate my traveling</title>
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
			<h1 class="col-12 mt-4 mb-4">User Registration</h1>
		</div> <!-- .row -->
	</div> <!-- .container -->

	<div class="container">

		<form action="verification.php" method="POST">
 
			<div class="form-group row">
				<label for="username-id" class="col-sm-12 col-md-3 col-form-label text-sm-right">用户名（必填）: <span class="text-danger">*</span></label>
				<div class="col-sm-12 col-md-9">
					<input type="text" class="form-control" id="username-id" name="username">
					<small id="username-error" class="invalid-feedback">请输入用户名</small>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="email-id" class="col-sm-12 col-md-3 col-form-label text-sm-right">Email（必填）: <span class="text-danger">*</span></label>
				<div class="col-sm-12 col-md-9">
					<input type="email" class="form-control" id="email-id" name="email">
					<small id="email-error" class="invalid-feedback">请输入email</small>
				</div>
			</div> <!-- .form-group -->	

			<div class="form-group row">
				<label for="wechat-id" class="col-sm-12 col-md-3 col-form-label text-sm-right">微信号（必填）： <span class="text-danger">*</span></label>
				<div class="col-sm-12 col-md-9">
					<input type="text" class="form-control" id="wechatid" name="wechatid">
					<small id="wechat-error" class="invalid-feedback"> 请输入微信号</small>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<label for="password-id" class="col-sm-12 col-md-3 col-form-label text-sm-right">密码（必填）: <span class="text-danger">*</span></label>
				<div class="col-sm-12 col-md-9">
					<input type="password" class="form-control" id="password-id" name="password">
					<small id="password-error" class="invalid-feedback">请输入密码</small>
				</div>
			</div> <!-- .form-group -->


			<div class="form-group row">
				<label for="password-id" class="col-sm-12 col-md-3 col-form-label text-sm-right">手机号码（选填）<span class="text-danger">*</span></label>
				<div class="col-sm-12 col-md-9">
					<input type="text" class="form-control" id="phone-id" name="phone">
					<small id="password-error" >请输入手机号</small>
				</div>
			</div> <!-- .form-group -->

			<div class="row">
				<div class="ml-auto col-sm-9">
					<span class="text-danger font-italic">* Required</span>
				</div>
			</div> <!-- .form-group -->

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-3">
					<button type="submit" class="btn btn-primary">Register</button>
					<a href="../song-db" role="button" class="btn btn-light">Cancel</a>
				</div>
			</div> <!-- .form-group -->

			<div class="row">
				<div class="col-sm-9 ml-sm-auto">
					<a href="login.php">Already have an account</a>
				</div>
			</div> <!-- .row -->

		</form>
	</div> <!-- .container -->
	<script>
		document.querySelector('form').onsubmit = function(){
			if ( document.querySelector('#username-id').value.trim().length == 0 ) {
				document.querySelector('#username-id').classList.add('is-invalid');
			} else {
				document.querySelector('#username-id').classList.remove('is-invalid');
			}

			if ( document.querySelector('#email-id').value.trim().length == 0 ) {
				document.querySelector('#email-id').classList.add('is-invalid');
			} else {
				document.querySelector('#email-id').classList.remove('is-invalid');
			}

			if ( document.querySelector('#password-id').value.trim().length == 0 ) {
				document.querySelector('#password-id').classList.add('is-invalid');
			} else {
				document.querySelector('#password-id').classList.remove('is-invalid');
			}

			// return false prevents the form from being submitted
			// If length is greater than zero, then it means validation has failed. Invert the response and can use that to prevent form from being submitted.
			return ( !document.querySelectorAll('.is-invalid').length > 0 );
		}
	</script>
</body>
</html>
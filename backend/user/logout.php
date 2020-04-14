<?php
session_start();
session_destroy();
?>

<!-- Below is just for testing -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Logout | Rate my traveling</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row">
			<h1 class="col-12 mt-4 mb-4">Logout</h1>
			<div class="col-12">You are now logged out.</div>
			<div class="col-12 mt-3">You can go to <a href="home_page.php">home page</a> or <a href="login_username.php">log in</a> again.</div>

		</div> <!-- .row -->
	</div> <!-- .container -->

</body>
</html>
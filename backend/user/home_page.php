<?php 
  include 'nav.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rate my traveling</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <link rel="stylesheet" type="text/css" href="final.css">
     <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
	<style>
	
   .buttons{
   	margin-bottom: 10px;
   }
   .slide{
   	width:98%;
   	margin-left: auto;
   	margin-right: auto;
   }
	</style>
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
		<?php if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']): ?>
		<div class="row buttons">
			<div class="col--sm-12 col-md-4">
				<a href="search_form.php" class="btn btn-primary btn-lg btn-block mt-4 mt-md-2" role="button">Search for traveling sight</a>
			</div>
			<div class="col-sm-12 col-md-4">
				<a href="add.php" class="btn btn-primary btn-lg btn-block mt-4 mt-md-2" role="button">Add a traveling sight</a>
			</div>
			<div class="col-sm-12 col-md-4">
				<a href="Traveling_history.php" class="btn btn-primary btn-lg btn-block mt-4 mt-md-2" role="button">View my traveling</a>
			</div>
		</div> <!-- .row -->

		<?php else: ?>

		  <div class="row">
            After login, you can 1. Search for sights 2. Add your own comments.
		  </div>
		 <?php endif; ?>

	</div> <!-- .container -->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
     <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
     <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="forest.jpg" class="d-block w-100" alt="forest">
    </div>
    <div class="carousel-item">
      <img src="red_leaves.jpg" class="d-block w-100" alt="red_leaves">
    </div>
    <div class="carousel-item ">
      <img src="desert.png" class="d-block w-100" alt="desert">
    </div>
    <div class="carousel-item ">
      <img src="alaska.png" class="d-block w-100" alt="alaska">
    </div>
    <div class="carousel-item ">
      <img src="ocean.png" class="d-block w-100" alt="ocean">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</body>
</html>
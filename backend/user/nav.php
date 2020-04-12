<?php 
session_start();
?>
  <?php if ( isset($_SESSION['logged_in']) &&$_SESSION['logged_in'] ) : ?>
    <nav class="navbar navbar-expand-md navbar-light" style="background-color: skyblue;">
  <a class="navbar-brand" href="#">Rate my traveling</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fas fa-bars fa-1x"></i></span>
      </button>
     <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
     <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" id="current" href="home_page.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add.php" id="add">Add</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="search_form.php" id="search">Search</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Traveling_history.php" id="search">History</a>
      </li>
     </ul>
   </div>
  <div class="row">
    <div class="col-12 d-flex justify-content-end">
      <div class="p-2">Hello <?php echo $_SESSION['username']; ?>!</div>

        <a class="p-2" href="logout.php">Logout</a>
         </div>
  </div> <!-- .row -->
</nav>

  <?php else : ?>
 <nav class="navbar navbar-expand-md navbar-light" style="background-color: skyblue;">
  <a class="navbar-brand" href="#">Rate my traveling</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><i class="fas fa-bars fa-1x"></i></span>
      </button>
     <div class="collapse navbar-collapse" id="navbarToggleExternalContent">
     <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" id="current" href="home_page.php">Home <span class="sr-only">(current)</span></a>
      </li>
     </ul>
   </div>
  <div class="row">
    <div class="col-12 d-flex justify-content-end">
      <a class="p-2 text-right" href="login_username.php">Login</a>
        <a class="p-2 text-right" href="registration_corona.php">Sign up</a>
         </div>
  </div> <!-- .row -->
</nav>
  <?php endif; ?>





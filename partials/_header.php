<?php
session_start();
?>

<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/forum">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
      </ul>
<?php
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
?>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <p class="text-light my-0 mx-2">Welcome,<?= $_SESSION['useremail'] ?></p>
      <div class="mx-2">
        <a href="partials/_logout.php" class="btn btn-success">Logout</a>
      </div>
<?php
  }
  else{
?>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div class="mx-2">
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
      </div>
<?php
  }
?>
    </div>
  </div>
</nav>


<?php
include 'partials/_loginModal.php';
include 'partials/_signupModal.php';

// alert whenever a new user registers
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
?>
  <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Registration Successful!</strong> You have successfully registered in iDiscuss Forum.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php
}
?>
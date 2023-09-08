<?php
include 'partials/_dbconnect.php';

?>



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Welcome to iDiscuss - Coding Forum</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

  <!-- navbar -->
  <?php include 'partials/_header.php' ?> 
  
  <!-- carousel -->
  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://source.unsplash.com/1400x400/?code,python" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/1400x400/?code,javascript" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="https://source.unsplash.com/1400x400/?code,desktop" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- categories -->
  <div class="container">
    <h2 class="text-center my-4">iDiscuss - Browse Categories</h2>
    <div class="row">
    <!-- fetch all the catogory name from DB -->
    <?php
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($conn,$sql);

      // use a for loop to iterate through categories
      while($row = mysqli_fetch_assoc($result)){
        // echo $row['category_id'];
        // echo $row['category_name'];
        $categoryName = $row['category_name'];
        $categoryDescription = $row['category_description'];
    ?>

    
      <div class="col-md-4 my-2">
        <div class="card" style="width: 18rem;">
          <img src="https://source.unsplash.com/500x500/?coding,language,<?= $categoryName ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $categoryName ?></h5>
            <p class="card-text"><?= substr($categoryDescription, 0, 80) ?>...</p>
            <a href="#" class="btn btn-primary">View Threads</a>
          </div>
        </div>
      </div>

    <?php
      }
    ?>


    </div>
  </div>
  
  <!-- footer -->
  <?php include 'partials/_footer.php' ?> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
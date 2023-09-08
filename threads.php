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

    <!-- welcome banner for forum -->
    <div class="container my-4">
        <div class="card text-center">
            <!-- <div class="card-header">
                Welcome to python forum
            </div> -->
            <div class="card-body">
                <h5 class="card-title">Welcome to python forum</h5>
                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus nihil laboriosam, aliquam error quidem eligendi a repellat tenetur quos molestias.</p>
                <a href="#" class="btn btn-primary">Learn More</a>
            </div>
            <div class="card-footer text-body-secondary">
                2 days ago
            </div>
        </div>
    </div>

    <!-- browse topic inside thread -->
    <div class="container">
        <h1 class="my-3">Browse Threads</h1>

        <!-- thred list -->
        <div class="d-flex my-2">
            <div class="flex-shrink-0">
                <img src="..." alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5 class="mt-0">Unable to install python</h5>
                This is some content from a media component. You can replace this with any content and adjust it as needed.
            </div>
        </div>
        <div class="d-flex my-2">
            <div class="flex-shrink-0">
                <img src="..." alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5 class="mt-0">Unable to install python</h5>
                This is some content from a media component. You can replace this with any content and adjust it as needed.
            </div>
        </div>
        <div class="d-flex my-2">
            <div class="flex-shrink-0">
                <img src="..." alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <h5 class="mt-0">Unable to install python</h5>
                This is some content from a media component. You can replace this with any content and adjust it as needed.
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
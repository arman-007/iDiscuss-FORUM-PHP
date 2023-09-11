<?php
include 'partials/_dbconnect.php';
$id = $_GET['categoryid'];
$sql = "SELECT * FROM `categories` WHERE category_id=$id";
$result = mysqli_query($conn,$sql);

// to fetch threads under category
$row = mysqli_fetch_assoc($result);

$categoryId = $row['category_id'];
$categoryName = $row['category_name'];
$categoryDescription = $row['category_description'];

$showThreadInsertionAlert = false;
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // echo "DONE!";
    $threadTitle = $_POST['title'];
    $threadDescription = $_POST['description'];
    $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_category_id`, `thread_user_id`, `timestamp`) VALUES ('$threadTitle', '$threadDescription', '$id', '0', current_timestamp())";
    $result = mysqli_query($conn,$sql);

    $showThreadInsertionAlert = true;
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $categoryName ?> thread</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <!-- navbar -->
    <?php include 'partials/_header.php' ?>

    <!-- thread insert confirmation alert  -->
    <?php
        if($showThreadInsertionAlert){
    ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your issue has been submitted. Please wait for others to response.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
        }

    ?>

    <!-- welcome banner for forum -->
    <div class="container my-4">
        <div class="card text-center">
            <!-- <div class="card-header">
                Welcome to python forum
            </div> -->
            <div class="card-body">
                <h5 class="card-title">Welcome to <?= $categoryName ?> forum</h5>
                <p class="card-text"><?= $categoryDescription ?></p>
                <a href="#" class="btn btn-success">Learn More</a>
            </div>
            <div class="card-footer text-body-secondary">
                2 days ago
            </div>
        </div>
    </div>

    <hr>

    <!-- form to create thread -->
    <div class="container">
        <h1 class="mt-2">Start a Discussion</h1>
        <form class="container my-5" action="threadList.php?categoryid=<?= $id ?>" method="post">
            <div class="mb-3">
                <label for="threadTitle" class="form-label">Problem Statement</label>
                <input type="text" class="form-control" id="threadTitle" name="title">
                <div id="emailHelp" class="form-text">Keep your title as crisp & short as possible.</div>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="threadDescription" name="description"></textarea>
                <label for="threadDescription">Elaborate your concern</label>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>

    <hr>

    <!-- browse topic inside thread -->
    <div class="container">
        <h1 class="my-3">Browse Threads</h1>

        <?php
            $sql = "SELECT * FROM `threads` WHERE thread_category_id = $categoryId";
            $result = mysqli_query($conn, $sql);
            $noThread = true;
            while($row = mysqli_fetch_assoc($result)){
                $noThread = false;
                $threadId = $row['thread_id'];
                $threadTitle = $row['thread_title'];
                $threadDesc = $row['thread_desc'];
                $threadTime = $row['timestamp'];
        ?>
                <!-- thred list -->
                <div class="d-flex my-2">
                    <div class="flex-shrink-0">
                        <img src="..." alt="...">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mt-0"> <a href="thread.php?threadid=<?= $threadId ?>" class="link-dark"> <?= $threadTitle ?> </a> : <?= $threadTime ?> </h6>
                        <?= $threadDesc ?>
                    </div>
                </div>
        <?php
            }
            if($noThread){
        ?>

        <p class="h5">Pretty Empty Here!</p>
        <p class="h6">Be the first one to post a thread.</p>

        <?php
            }
        ?>
    </div>

    <!-- footer -->
    <?php include 'partials/_footer.php' ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>
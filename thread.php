<?php
    include 'partials/_dbconnect.php';
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn,$sql);

    // use a for loop to iterate through categories
    $row = mysqli_fetch_assoc($result);
    $threadId = $row['thread_id'];
    $threadTitle = $row['thread_title'];
    $threadDescription = $row['thread_desc'];
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $threadTitle ?> thread</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <!-- navbar -->
    <?php include 'partials/_header.php' ?>


    <!-- necessary php program for this file -->
    <!-- necessary php program for this file -->
    <?php
        // session_start();
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            $commentorID = $_SESSION['userID'];
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $comment = $_POST['comment'];
            $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `commented_at`) VALUES ('$comment', '$id', '$commentorID', current_timestamp())";
            $result = mysqli_query($conn, $sql);
        }
    ?>
    <!-- necessary php program for this file -->
    <!-- necessary php program for this file -->

    <!-- banner for thread details -->
    <div class="container my-4">
        <div class="card "><!--text-center-->
            <!-- <div class="card-header">
                Welcome to python forum
            </div> -->
            <div class="card-body">
                <h5 class="card-title"><?= $threadTitle ?></h5>
                <p class="card-text"><?= $threadDescription ?></p>
                <a href="#" class="btn btn-success">Learn More</a>
            </div>
            <div class="card-footer text-body-secondary">
                <span>Posted By: <strong><?= $_SESSION['username'] ?></strong></span>
                2 days ago
            </div>
        </div>
    </div>

    <hr>
    <!-- form to comment on a thread -->
    <?php
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    ?>
            <div class="container">
                <h1 class="mt-2">Post a Comment</h1>
                <form class="container my-5" action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="threadDescription" name="comment"></textarea>
                        <label for="threadDescription">Comment</label>
                    </div>
                    <button type="submit" class="btn btn-success">Post Comment</button>
                </form>
            </div>
    <?php
        }
        else{
    ?>
            <div class="container text-center">
                <h5>Please <a href="" data-bs-toggle="modal" data-bs-target="#loginModal">login</a>  to post a comment on this discussion or thread.</h5>
            </div>
    <?php
        }
    ?>

    <hr>

    <!-- all the comments on this thread -->
    <div class="container">
        <!-- <h1 class="my-3">Browse Threads</h1> -->

        <?php
            $sql = "SELECT * FROM `comments` WHERE thread_id = $threadId";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
                $commentId = $row['comment_id'];
                $comment = $row['comment_content'];
                $commentTime = $row['commented_at'];
                $commentorUserID = $row['comment_by'];

                // these data are fetched to get the name of the commentors
                $threadCommentorSQL = "SELECT user_name FROM `users` WHERE user_id = $commentorUserID";
                $threadCommentorResult = mysqli_query($conn, $threadCommentorSQL);
                $threadCommentorName = mysqli_fetch_assoc($threadCommentorResult);
                // print_r($threadCommentorName) ;
        ?>
        <!-- comments list -->
        <div class="d-flex my-2">
            <div class="flex-shrink-0">
                <img src="..." alt="...">
            </div>
            <div class="flex-grow-1 ms-3">
                <h6 class="mt-0 my-0">Commented by <a href="thread.php?threadid=<?= $id ?>" class="link-dark"><?= $threadCommentorName['user_name'] ?></a> : <?= $commentTime ?> </h6>
                <?= $comment ?>
            </div>
        </div>
        <?php
            }
        ?>
    </div>


    <!-- footer -->
    <?php include 'partials/_footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
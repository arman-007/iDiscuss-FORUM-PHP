<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';

    $userEmail = $_POST['loginEmail'];
    $userPassword = $_POST['loginPassword'];

    // check whether this email is registered
    $sql = "SELECT * FROM `users` WHERE `user_email` = '$userEmail'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);

        if(password_verify($userPassword, $row['user_password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['useremail'] = $userEmail;
            $_SESSION['userID'] = $row['user_id'];
            // echo "logged in ". $_SESSION['username'];
            header("location: ../index.php");

        }
        else{
            header("location: ../index.php");
        }
    }
    else{
        // if($userPassword == $userConfirmPassword){
        //     $hash = password_hash($userPassword, PASSWORD_DEFAULT);

        //     $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `created_at`) VALUES ('$username', '$userEmail', '$hash', current_timestamp())";
        //     $result = mysqli_query($conn, $sql);
        //     if($result){
        //         $showAlert = true;
        //         header("location: ../index.php?signupsuccess=true");
        //         exit();
        //     }
        // }
        // else{
        //     $showError = "Passwords do not match";
        // }
        header("location: ../index.php");
    }
    // header("location: ../index.php?signupsuccess=false&error=$showError");
}


?>
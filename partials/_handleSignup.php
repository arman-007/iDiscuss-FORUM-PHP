<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include '_dbconnect.php';

    $userName = $_POST['userNAme'];
    $userEmail = $_POST['signupEmail'];
    $userPassword = $_POST['signupPassword'];
    $userConfirmPassword = $_POST['signupConfirmPassword'];

    // check whether this email is registered
    $existSQL = "SELECT * FROM `users` WHERE `user_email` = '$userEmail'";
    $result = mysqli_query($conn, $existSQL);
    if(mysqli_num_rows($result) > 0){
        $showError = "This E-mail is already registered";
    }
    else{
        if($userPassword == $userConfirmPassword){
            $hash = password_hash($userPassword, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `created_at`) VALUES ('$username', '$userEmail', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("location: ../index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError = "Passwords do not match";
        }
    }
    header("location: ../index.php?signupsuccess=false&error=$showError");
}


?>
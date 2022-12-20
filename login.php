<?php 
session_start();
include("connection.php");
include("functions.php");

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $query = "SELECT * FROM user WHERE user.Email = '$email'";
    $result = mysqli_query($con, $query);
    if($result &&mysqli_num_rows($result) > 0){
        $userData = mysqli_fetch_array($result);
        if($userData['Password'] == $password){
            $_SESSION['UID'] = $userData['UID'];
            unset($_SESSION['MID']);
            header("Location:homepage.php");
            die;
        }
        else{
            header("Location:login.html");
        }
    }
    else{
        header("Location:login.html");
    }

?>
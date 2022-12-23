<?php
session_start();
include("connection.php");
include("functions.php");

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $username = $_REQUEST['username'];
    $number = $_REQUEST['number'];
    $address = $_REQUEST['address'];
    $location = $_REQUEST['location'];
    $balanceNum = $_REQUEST['balanceNumber'];

    $photo = $_FILES['photo']['name'];
    $tmpPhoto = $_FILES['photo']['tmp_name'];
    $folder = 'image/';

    $query = "INSERT INTO market VALUES(NULL,'$username','$password','$email','$photo','$address','$number','$location','$balanceNum',0)"; 
    $query2 = "SELECT * FROM market WHERE market.Email = '$email'";
    $query3 = "SELECT * FROM market WHERE market.Username = '$username'";
    $result = mysqli_query($con, $query2);
    $result2 = mysqli_query($con, $query3);
    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['Error'] = "This account already exists , please login instead";
        header("Location:register-market.php");
    }elseif($result2 && mysqli_num_rows($result2) > 0){
        $_SESSION['Error'] = "This account already exists , please login instead";
        header("Location:register-market.php");
    }
    else{
        mysqli_query($con, $query);
        move_uploaded_file($tmpPhoto, $folder . $photo);
        header("Location:loginMarket.html");
    }
?>
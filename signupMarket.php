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
    mysqli_query($con, $query);

    move_uploaded_file($tmpPhoto, $folder . $photo);
    header("Location:loginMarket.html");
?>
<?php 
session_start();
include("connection.php");
include("functions.php");

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $username = $_REQUEST['username'];
    $number = $_REQUEST['number'];
    $address = $_REQUEST['address'];
    $location = $_REQUEST['location']; //TODO handle if location is not set
    //TODO handle image

    $photo = $_FILES['photo']['name'];
    $tmpPhoto = $_FILES['photo']['tmp_name'];
    $folder = 'image/';

    $query = "INSERT INTO user VALUES(NULL,'$username','$password','$email','$photo','$address','$number','$location')"; 
    mysqli_query($con, $query);

    move_uploaded_file($tmpPhoto, $folder . $photo);
    header("Location:login.html");

?>
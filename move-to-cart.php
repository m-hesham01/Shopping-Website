<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

$uid = $_REQUEST['uid'];
$pid = $_REQUEST['pid'];
$price = $_REQUEST['price'];

$query1 = "INSERT INTO cart VALUES (NULL,'$uid','$pid', 1, '$price')";
$query2 = "DELETE FROM likedproducts WHERE likedproducts.PID = '$pid' AND likedproducts.UID = '$uid'";
mysqli_query($con, $query1);
mysqli_query($con, $query2);
header("Location:cart.php");
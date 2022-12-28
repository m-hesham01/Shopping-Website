<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

$uid = $_REQUEST['uid'];
$pid = $_REQUEST['pid'];

$query = "DELETE FROM likedproducts WHERE likedproducts.PID = '$pid' AND likedproducts.UID = '$uid'";
mysqli_query($con, $query);
header("Location:wishlist.php");
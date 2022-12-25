<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

$prodname = $_REQUEST['prodname'];
$category = $_REQUEST['category'];
$brand = $_REQUEST['brand'];
$price = $_REQUEST['price'];
$quantity = $_REQUEST['quantity'];
$descBrief = $_REQUEST['desc-brief'];
$descFull = $_REQUEST['desc-full'];

$MID = $user_data['MID'];

$photo = $_FILES['photo']['name'];
$tmpPhoto = $_FILES['photo']['tmp_name'];
$folder = 'products/';
move_uploaded_file($tmpPhoto, $folder . $photo);
$query = "INSERT INTO product VALUES (NULL, '$prodname', '$price', '$photo', '$descBrief', '$descFull', '$quantity', '$category', '$brand')";
mysqli_query($con, $query);
$query2 = "SELECT PID FROM product WHERE name = '$prodname' and image = '$photo' ";
$result = mysqli_query($con,$query2);
$temp = mysqli_fetch_assoc($result);
$PID = $temp['PID'];
$query3 = "INSERT INTO marketproducts VALUES (NULL, '$MID','$PID')";
mysqli_query($con, $query3);
header("Location:market-profile.php");    
?>
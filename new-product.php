<?php
session_start();
include("connection.php");
include("functions.php");

$prodname = $_REQUEST['prodname'];
$category = $_REQUEST['category'];
$brand = $_REQUEST['brand'];
$price = $_REQUEST['price'];
$quantity = $_REQUEST['quantity'];
$descBrief = $_REQUEST['desc-brief'];
$descFull = $_REQUEST['desc-full'];

$photo = $_FILES['photo']['name'];
$tmpPhoto = $_FILES['photo']['tmp_name'];
$folder = 'products/';

$query = "INSERT INTO product VALUES (NULL, '$prodname', '$price', '$photo', '$descBrief', '$descFull, '$quantity', '$category', '$brand')";

$q = mysqli_query($con, $query);
move_uploaded_file($tmpPhoto, $folder . $photo);
header("Location:market-profile.php");    
?>
<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

$uid = $_REQUEST['uid'];
echo $uid;

$query = "SELECT * FROM cart WHERE cart.UID = '$uid'";
$q = mysqli_query($con, $query);
while($row = mysqli_fetch_assoc($q)){
    $cid = $row['CID'];
    $pid = $row['PID'];
    $quantity = $row['QuantityInCart'];
    $amount = $row['TotalPrice'];
    $subQuery = "INSERT INTO purchasedproducts VALUES (NULL,'$uid','$pid', '$quantity', '$amount', '0')";
    $subQuery2 = "DELETE FROM cart WHERE cart.CID = '$cid'";
    $subQuery3 = "UPDATE product SET product.Quantity = product.Quantity-'$quantity' WHERE product.PID = '$pid'";
    mysqli_query($con, $subQuery);
    mysqli_query($con, $subQuery2);
    mysqli_query($con, $subQuery3);
}

header("Location:orders.php");
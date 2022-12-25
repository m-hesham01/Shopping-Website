<?php
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $username = $_REQUEST['username'];
    $number = $_REQUEST['number'];
    $address = $_REQUEST['address'];
    $location = $_REQUEST['location'];
    $balanceNum = $_REQUEST['balanceNumber'];
    $MID = $user_data['MID'];

    $photo = $_FILES['photo']['name'];
    $tmpPhoto = $_FILES['photo']['tmp_name'];
    $folder = 'image/';

    if(empty($photo)){
        $photo = $user_data['Image'];
    }
    

    $query = "UPDATE market SET Username = '$username', Password = '$password', Email = '$email',Image = '$photo', Address = '$address',Phone = '$number', Location = '$location', BalanceNum ='$balanceNum' WHERE MID = '$MID'"; 
    $query2 = "SELECT * FROM market WHERE market.Email = '$email' AND market.MID != '$MID'";
    $query3 = "SELECT * FROM market WHERE market.Username = '$username' AND market.MID != '$MID'";
    $result = mysqli_query($con, $query2);
    $result2 = mysqli_query($con, $query3);
    if ($result && mysqli_num_rows($result) > 0) {
        $_SESSION['Error'] = "This account already exists , please choose unique username and password";
        header("Location:update-market-profile.php");
    }elseif($result2 && mysqli_num_rows($result2) > 0){
        $_SESSION['Error'] = "This account already exists , please choose unique username and password";
        header("Location:update-market-profile.php");
    }
    else{
        move_uploaded_file($tmpPhoto, $folder . $photo);
        mysqli_query($con, $query);
        header("Location:market-profile.php");
    }
<?php 
session_start();
include("connection.php");
include("functions.php");

    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $query = "SELECT * FROM Market WHERE market.Email = '$email'";
    $result = mysqli_query($con, $query);
    if($result &&mysqli_num_rows($result) > 0){
        $marketData = mysqli_fetch_array($result);
        if($marketData['Password'] == $password){
            $_SESSION['MID'] = $marketData['MID'];
            unset($_SESSION['UID']);
            header("Location:market-profile.php");
            die;
        }
        else{
            header("Location:loginMarket2.php");
        }
    }
    else{
        header("Location:loginMarket2.php");
    }
?>
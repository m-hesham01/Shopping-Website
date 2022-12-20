<?php
$flag = false;
function check_login($con){
    if(isset($_SESSION['UID'])){
        $id = $_SESSION['UID'];
        $query = "SELECT * FROM user WHERE UID ='$id' limit 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
            // return false;
        }
        
    }
    elseif(isset($_SESSION['MID'])){
        $id = $_SESSION['MID'];
        $query = "SELECT * FROM Market WHERE Market.MID ='$id' limit 1";
        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0){
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
            // return false;
        }
    }
}
?>
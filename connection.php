<?php
    $dbhost = "localhost";
    $dbname = "ashtreny";
    $dbuser = "root";
    $dbpass = "root";
    if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
    {
        die("Error connecting to database");
    }
?>
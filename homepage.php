<?php
    session_start();
    include ("connection.php");
    include ("functions.php");
    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="navbar.css">
        <link rel="stylesheet" href="homepage.css">
    </head>

    <body class="navBody">
        <div style="width: 100%;">
            <table class="nav">
                <tr>
                    <td class = "logo"><img src="logo.png" alt="BUYBUY"></td>
                    <td class = "element"><a href="homepage.html">Home</a></td>
                    <td class = "element"><a href="#markets">Markets</a></td>
                    <td class = "element"><a href="login.html">Profile</a></td>
                    <td class = "search">
                        <div>
                            <input type="text" placeholder="What are you looking for?" name="search">
                            <button type="submit"><img src="search.png" alt="GO!"></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <style>
            logo{
            font-family : Arial Black;
            font-size : 18px;
            color: red;
            }

            ul{
                background-color: grey;
                list-style-type: none;
                margin: 0;
                padding : 0;
            }
            li{
                display: inline;
            }
        </style>
    </head>


        <div>
            <h1>homepage</h1>
            <?php 
            // echo $user_data['Image']; 
            if($user_data != false){
                echo " <img src='./image/{$user_data["Image"]}' ";
            }else{ //not logged in
                echo " <img src='./image/user.png' ";
            }
            
            ?>
        </div>
    </body>
</html>
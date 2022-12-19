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

    <body>
        
        <ul>
            <li> <logo>BUY BUY</logo> </li>
            <li> <a href = "signup.php"> Sign-Up</li>
            <li> <a href = "login.php"> Sign-In</li>
            <li> <a href = "profile.html"> Profile</li>
            <li> <a href = "markets.html"> Markets</li>
        </ul>
    </body>
</html>

        <div>
            <h1>homepage</h1>
            <?php echo $user_data['Username']; ?>
        </div>
    </body>
</html>
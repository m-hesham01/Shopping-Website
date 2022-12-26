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
        <link rel="stylesheet" href="register.css">
    </head>

    <body>
        <div style="width: 100%;">
            <table class="nav">
                <tr>
                    <td class = "logo"><img src="logo.png" alt="BUYBUY"></td>
                    <td class = "element"><a href="homepage.html">Home</a></td>
                    <td class = "element"><a href="#markets">Markets</a></td>
                    <td class = "element"> <?php
                        if (isset($_SESSION['UID'])) {
                            echo'<a href="user-profile.php">Profile</a>';
                        } elseif (isset($_SESSION['MID'])){
                            echo'<a href="market-profile.php">Profile</a>';
                        } else{
                            echo '<a href="loginUser.php">Profile</a>';                        
                        }
                    ?></td>
                    <td class = "search">
                        <div>
                            <input type="text" placeholder="What are you looking for?" name="search" id="search">
                            <button type="submit" name="search-button"><img src="search.png" alt="GO!"></button>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="regBox">
            <h1>Login to your Market account</h1>
            <form action="loginMarket.php" method="post">
                <table>
                    <tr>
                        <td class="formField">Email</td>
                        <td class="formInput">
                            <input type="email" name="email" id="email" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="formField">Password</td>
                        <td class="formInput">
                            <input type="password" name="password" id="password" required>
                        </td>
                    </tr>
                    <tr>
                        <td class="formButton">
                            <input type="submit" name="login-button" id="login-button" value="Log-in">
                        </td>
                    </tr>
                </table>
            </form>
            <p>Not a user?</p>
            <ul>
                <li><a href="register-user.html">Create User Account</a></li>
                <li><a href="register-market.html">Create Market Account</a></li>
            </ul>
        </div>
    </body>
</html>
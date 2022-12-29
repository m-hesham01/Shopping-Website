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
                    <td class = "element"><a href="homepage.php">Products</a></td>
                    <td class = "element"><a href="Categories.php">Categories</a>
                    <div class="dropdown-content">
                        <?php
                            $query = "SELECT DISTINCT Category  FROM product";
                            $q = mysqli_query($con,$query);
                            while($row = mysqli_fetch_assoc($q)){
                                echo " <a href=' Brands.php?category=".$row['Category']." '> ";
                                echo $category = $row['Category'];
                                echo "</a>";
                            }
                        ?>
                    </div>
                    </td>
                    <td class = "element"><a href="markets.php">Markets</a></td>
                    <td class = "element" style="width:50px">
                    <?php
                        if (isset($_SESSION['UID'])) {
                            echo'<a href="user-profile.php">Profile</a>';
                            echo "<a href='loginUser.php'>.</a>";
                        } elseif (isset($_SESSION['MID'])){
                            echo'<a href="market-profile.php">Profile</a>';
                            echo "<a href='loginUser.php'>.</a>";
                        } else{
                            echo '<a href="loginUser.php">Profile</a>';                        
                        }
                    ?>
                        <?php 
                            if($user_data != false){
                                echo " <img class='pfp' src='./image/{$user_data["Image"]}'"; 
                            }else{
                                echo " <img class='pfp' src='./image/user.png' ";
                            }
                        ?>
                    </td>
                    <td class = "search">
                        <form action="search.php" method="get">
                            <input type="text" placeholder="What are you looking for?" name="search" method="post">
                            <button type="submit"><img src="search.png" alt="GO!"></button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>


        <div class="regBox">
            <h1>Login to your account</h1>
            <form action="login.php" method="post">
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
            <p>Not a user? <a href="loginMarket2.php">Log in as a market</a></p>
            <ul>
                <li><a href="register-user.php">Create User Account</a></li>
                <li><a href="register-market.php">Create Market Account</a></li>
            </ul>
        </div>
    </body>
</html>
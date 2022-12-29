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
                    <td class = "element"><a href="#markets">Markets</a></td>
                    <td class = "element">
                    <?php
                        if (isset($_SESSION['UID'])) {
                            echo'<a href="user-profile.php">Profile</a>';
                        } elseif (isset($_SESSION['MID'])){
                            echo'<a href="market-profile.php">Profile</a>';
                        } else{
                            echo '<a href="loginUser.php">Profile</a>';                        
                        }
                    ?>
                        <?php 
                            if($user_data != false){
                                echo " <img class='pfp' src='./image/{$user_data["Image"]}' ";
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
                    <h1>Create new user account</h1>
                    <form action="signup.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td class="formField">Email*</td>
                                <td class="formInput">
                                    <input type="email" name="email" id="email" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Password*</td>
                                <td class="formInput">
                                    <input type="password" name="password" id="password" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Username*</td>
                                <td class="formInput">
                                    <input type="text" name="username" id="username" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Number*</td>
                                <td class="formInput">
                                    <input type="number" name="number" id="number" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Address*</td>
                                <td class="formInput">
                                    <input type="text" name="address" id="address" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Location</td>
                                <td class="formInput">
                                    <input type="text" name="location" id="location">
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Upload Profile Photo</td>
                                <td class="formInput">
                                    <input type="file" name="photo" id="photo" accept="image/*">
                                </td>
                            </tr>
                            <tr>
                                <td class="formButton">
                                    <input type="submit" name="login-button" id="login-button" value="Sign-up">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <p>
                    <?php 
                        if( isset($_SESSION['Error']) ) {
                            echo $_SESSION['Error'];
                            unset($_SESSION['Error']);
                            echo '<br>';
                            echo "<a href='login.html'>Login</a>";            
                        }
                    ?>
                    </p>
                    <p>Fields marked with * are required</p>
                </div>
            </body>
        </html>
<?php
session_start();
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
                    <td class = "element"><a href="homepage.php">Home</a></td>
                    <td class = "element"><a href="#markets">Markets</a></td>
                    <td class = "element"><a href="login.html">Profile</a></td>
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
            <h1>Create new market account</h1>
            <form action="signupMarket.php" method="post" enctype="multipart/form-data" >
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
                        <td class="formField">Balance Number*</td>
                        <td class="formInput">
                            <input type="number" name="balanceNumber" id="balanceNumber" required>
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
                        echo "<a href='loginMarket.html'>Login</a>";            
                    }
                ?>
            </p>
            <p>Fields marked with * are required</p>
        </div>
    </body>
</html>
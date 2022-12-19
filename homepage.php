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
                    <td class = "element"><a href="homepage.php">Home</a></td>
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

        <div class="mainBox">
            <h1>View our most popular products</h1>
            <div class="mainGrid">
               <product>a</product>
               <product>b</product>
               <product>c</product>
               <product>d</product>
               <product>example</product>
               <product>test</product>
            </div>
        </div>
    </body>
</html>
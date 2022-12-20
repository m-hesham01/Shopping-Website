<?php
    session_start();
    include ("connection.php");
    include ("functions.php");
    $user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="navbar.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="homepage.css?v=<?php echo time(); ?>">
    </head>

    <body>
        <div style="width: 100%;">
            <table class="nav">
                <tr>
                    <td class = "logo"><img src="logo.png" alt="BUYBUY"></td>
                    <td class = "element"><a href="homepage.php">Home</a></td>
                    <td class = "element"><a href="brands.php">Brands</a></td>
                    <td class = "element"><a href="#markets">Markets</a></td>
                    <td class = "element">
                        <a href="login.html">Profile</a>
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

        <div class="mainBox">
            <h1>View our most popular brands</h1>
            <div class="mainGrid">
                <?php
                $query = "SELECT Brand  FROM product";
                $q = mysqli_query($con,$query);
                while($row = mysqli_fetch_assoc($q)){
                    echo "<product>";
                    echo $row['Brand'];
                    echo "</product>";
                }
                ?>
            </div>
        </div>
    </body>
</html>
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
        <link rel="stylesheet" href="profile.css?v=<?php echo time(); ?>">
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
            <?php
                echo "<h1> {$user_data["Username"]}</h1>";
            ?>
            <div class="profileGrid">
                <?php
                echo "<element>";
                echo "<label>";
                echo "Email: ";
                echo "</label>";
                echo "{$user_data["Email"]}";
                echo "<br>";
                echo "<label>";
                echo "Address: ";
                echo "</label>";
                echo "{$user_data["Address"]}";
                echo "<br>";
                echo "<label>";
                echo "Location: ";
                echo "</label>";
                echo "{$user_data["Location"]}";
                echo "<br>";
                echo "<label>";
                echo "Phone: ";
                echo "</label>";
                echo "{$user_data["Phone"]}";
                echo "<br>";
                echo "<label>";
                echo "Balance Number: ";
                echo "</label>";
                echo "{$user_data["BalanceNum"]}";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo " <a href=' update-market-profile.php'> ";
                echo "Update Profile";
                echo "</a>";
                echo "<br>";
                echo "<a href='add-product.php'>";
                echo "Add Products";
                echo "</a>";
                echo "<br>";
                echo "</element>";

                echo "<element>";
                echo " <img class='profileImg' src='./image/{$user_data["Image"]}' ";
                echo "</element>";
                ?>
            </div>

            <h1>Your Products</h1>
            <div class="mainGrid">
                <?php
                $id = $user_data["MID"];
                $query = "SELECT * FROM product WHERE market.MID = $id AND market.MID = marketproducts.MID AND product.PID = marketproducts.PID";
                $q = mysqli_query($con,$query);
                while($row = mysqli_fetch_assoc($q)){
                    echo "<product>";
                    echo "<img class='prodImg' src='./products/{$row["Image"]}' ";
                    echo "<br>";
                    echo "<prodName>";
                    echo $row['Name'];
                    echo "</prodName>";
                    echo "<br>";
                    echo "<prodPrice>";
                    echo "EGP";
                    echo $row['Price'];
                    echo "</prodPrice>";
                    echo "<br>";
                    echo "<prodDesc>";
                    echo $row['BriefDescription'];
                    echo "</prodDesc>";
                    echo "<br>";
                    echo "</product>";
                }
                ?>
            </div>
        </div>
    </body>
</html>
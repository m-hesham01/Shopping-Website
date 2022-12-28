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

        
        <div class="mainBox">
            <?php
                $MID = $_GET['MID'];
                $query = "SELECT * FROM market WHERE MID = '$MID'";
                $q = mysqli_query($con,$query);
                $row2 = mysqli_fetch_assoc($q);
                echo "<h1> {$row2["Username"]}</h1>";
            ?>
            <div class="profileGrid">
                <?php
                echo "<element>";
                echo "<label>";
                echo "Email: ";
                echo "</label>";
                echo "{$row2["Email"]}";
                echo "<br>";
                echo "<label>";
                echo "Address: ";
                echo "</label>";
                echo "{$row2["Address"]}";
                echo "<br>";
                echo "<label>";
                echo "Location: ";
                echo "</label>";
                echo "{$row2["Location"]}";
                echo "<br>";
                echo "<label>";
                echo "Phone: ";
                echo "</label>";
                echo "{$row2["Phone"]}";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<form method='post' action=''>";
                echo '
                <input type="submit" name="like"
                value="Add to liked markets"/>
                </form>
            '   ;
                echo "</element>";

                echo "<element>";
                echo " <img class='profileImg' src='./image/{$row2["Image"]}' ";
                echo "</element>";
                ?>
            </div>

            <h2>This Market's Products</h2>
            <div class="mainGrid">
                <?php

                $query = "SELECT product.* FROM product, market, marketproducts WHERE market.MID = '$MID' AND market.MID = marketproducts.MID AND product.PID = marketproducts.PID";
                $q = mysqli_query($con,$query);
                while($row = mysqli_fetch_assoc($q)){
                    echo "<product>";
                    echo "<img class='prodImg' src='./products/{$row["Image"]}' ";
                    echo "<br>";
                    echo "<a href='productDetails.php?PID={$row["PID"]}'>";
                    echo "<prodName>";
                    echo $row['Name'];
                    echo "</prodName>";
                    echo '</a>';
                    echo "<br>";
                    echo "<prodPrice>";
                    echo "EGP";
                    echo $price =$row['Price'];
                    echo "</prodPrice>";
                    echo "<br>";
                    echo "<prodDesc>";
                    echo $row['BriefDescription'];
                    echo "</prodDesc>";
                    echo "<br>";
                    echo "</product>";
                }
                if(isset($_POST['like'])) {
                    $UID = $user_data['UID'];
                    echo "Market added to your liked markets";
                    $query = "INSERT INTO likedmarkets VALUES (NULL,'$UID','$MID')";
                    $q = mysqli_query($con,$query);
                }
                ?>
            </div>
        </div>
    </body>
</html>
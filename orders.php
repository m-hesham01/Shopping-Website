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

        
        <div class="mainBox">
        <h1>Your Orders</h1>
            <div class="mainGrid">
                <?php
                $id = $user_data["UID"];
                $query = "SELECT product.*, purchasedproducts.* FROM product, purchasedproducts WHERE purchasedproducts.UID = '$id' AND product.PID = purchasedproducts.PID";
                $q = mysqli_query($con,$query);
                while($row = mysqli_fetch_assoc($q)){
                    echo "<product>";
                    echo "<img class='prodImg' src='./products/{$row["Image"]}' ";
                    echo "<br>";
                    echo "<a href='productDetails.php?PID={$row["PID"]}'>";
                    echo "<prodName>";
                    echo $row['Name'];
                    echo "</prodName>";
                    echo "</a>";
                    echo "<br>";
                    echo "<prodName>";
                    echo "Quantity: ";
                    echo "</prodName>";
                    echo "<prodName>";
                    echo $row['purchasedQuantity'];
                    echo "</prodName>";
                    echo "<br>";
                    echo "<prodPrice>";
                    echo "EGP";
                    echo $row['Amount'];
                    echo "</prodPrice>";
                    echo "<br>";
                    echo "<prodDesc>";
                    if($row['Arrived']== 0){
                        echo "Order being processed";
                    }
                    else{
                        echo"Delivered";
                    }
                    echo "</prodDesc>";
                    echo "<br>";
                    echo "</product>";
                }
                ?>
            </div>
        </div>
    </body>
</html>
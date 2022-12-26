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
            <h1>View our most popular products</h1>
                <?php
                $PID = $_REQUEST['PID'];
                $query = "SELECT * FROM product WHERE PID = '$PID'";
                $q = mysqli_query($con,$query);
                $row2 = mysqli_fetch_assoc($q);
                    echo "<product>";
                    echo "<img class='prodImg' src='./products/{$row2["Image"]}' ";
                    echo "<br>";
                    echo "<br>";
                    echo "<prodName>";
                    echo $row2['Name'];
                    echo "</prodName>";
                    echo "<br>";
                    echo "<prodPrice>";
                    echo "EGP";
                    echo $row2['Price'];
                    echo "</prodPrice>";
                    echo "<br>";
                    echo "<prodDesc>";
                    echo $row2['BriefDescription'];
                    echo "</prodDesc>";
                    echo "<br>";
                    echo $row2['FullDescription'];
                    echo "</prodDesc>";
                    echo "<br>";
                echo "<form method='post' action=''>";
                echo '<select name="quantity" id="qunatity">';
                $query = "SELECT Quantity from product where PID = '$PID'";
                $q = mysqli_query($con,$query);
                $row = mysqli_fetch_array($q);
                $i =1;
                $quantity = $row['Quantity'];
                while ($i <= $quantity){
                    echo "<option value='$i'>$i</option>";
                    $i++;
                }
                $num = $_POST['quantity'];
                echo '
                    </select>
                    <br>
                    </product>
                    ';
                    echo '

                        <input type="submit" name="cart"
                        value="Add to cart"/>
                        <input type="submit" name="wishList"
                        value="Add to wish list"/>
                    </form>
                    ';
                
                if(isset($_POST['cart'])) {
                    $UID = $user_data['UID'];
                    echo "Product added to cart";
                    $price = $row2['Price'];
                    $query = "INSERT INTO cart VALUES (NULL,'$UID','$PID', '$num', '$price')";
                    $q = mysqli_query($con,$query);
                }
                if(isset($_POST['wishList'])) {
                    $UID = $user_data['UID'];
                    $query = "INSERT INTO likedproducts VALUES (NULL,'$UID','$PID')";
                    $q = mysqli_query($con,$query);
                    echo "Product added to wish list";
                }
                ?>
        </div>

    </body>
</html>
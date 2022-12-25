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
        <link rel="stylesheet" href="register.css?v=<?php echo time(); ?>">
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

                <element>
                    <h2>Add Product</h2>
                    <form action="new-product.php" method="post" enctype="multipart/form-data">
                        <table>
                            <tr>
                                <td class="formField">Product Name</td>
                                <td class="formInput">
                                    <input type="text" name="prodname" id="prodname" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Category</td>
                                <td class="formInput">
                                    <input type="text" name="category" id="category" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Brand</td>
                                <td class="formInput">
                                    <input type="text" name="brand" id="brand" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Price</td>
                                <td class="formInput">
                                    <input type="number" name="price" id="price" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Quantity</td>
                                <td class="formInput">
                                    <input type="number" name="quantity" id="quantity" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Brief Description</td>
                                <td class="formInput">
                                    <input type="text" name="desc-brief" id="desc-brief" required>
                                </td>
                            </tr>
                            <tr>
                                <td class="formField">Full Description</td>
                                <td class="formInput">
                                    <input type="text" name="desc-full" id="desc-full" required>
                                </td>
                            </tr>
                            <tr>
                            <td class="formField">Product Image</td>
                            <td class="formInput">
                                <input type="file" name="photo" id="photo" accept="image/*">
                            </td>
                        </tr>
                        <tr>
                            <td class="formButton">
                                <input type="submit" name="add-prod" id="add-prod" value="Add">
                            </td>
                        </tr>
                        </table>
                    </form>
                </element>
                
                <element>
                    <?php
                    echo " <img class='profileImg' src='./image/{$user_data["Image"]}' ";
                    ?>
                </element>
            </div>
        </div>
    </body>
</html>
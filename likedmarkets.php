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
                    <td class = "element"><a href="Categories.php">Categories</a></td>
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
            <div class="mainGrid">
                <?php
                $id = $user_data["UID"];
                $query = "SELECT market.* FROM market, likedmarkets WHERE likedmarkets.UID = '$id' AND likedmarkets.MID = market.MID";
                $q = mysqli_query($con,$query);
                while($row = mysqli_fetch_assoc($q)){
                    echo "<product>";
                    echo "<img class='prodImg' src='./image/{$row["Image"]}' ";
                    echo "<br>";
                    echo "<a href='marketDetails.php?MID={$row["MID"]}'>";
                    echo "<prodName>";
                    echo $row['Username'];
                    echo "</prodName>";
                    echo '</a>';
                    echo "<br>";
                    echo "</product>";
                }
                ?>
            </div>
        </div>
    </body>
</html>
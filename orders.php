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

<div id="paypal-button-container"></div>
        <!-- Sample PayPal credentials (client-id) are included -->
        <script src="https://www.paypal.com/sdk/js?client-id=AQx3d2p0npm-KtFfelFg6kRtx4LX4X9t6whlz50ZKgcGaRRyDsvfs5DKzEyOHgGWlbgW_59doJ8Aql8h&currency=USD&intent=capture&enable-funding=venmo" data-sdk-integration-source="integrationbuilder"></script>
        <script>
          const paypalButtonsComponent = paypal.Buttons({
              // optional styling for buttons
              // https://developer.paypal.com/docs/checkout/standard/customize/buttons-style-guide/
              style: {
                color: "gold",
                shape: "pill",
                layout: "horizontal"
              },

              // set up the transaction
              createOrder: (data, actions) => {
                  // pass in any options from the v2 orders create call:
                  // https://developer.paypal.com/api/orders/v2/#orders-create-request-body
                  const createOrderPayload = {
                      purchase_units: [
                          {
                              amount: {
                                  value: "50"
                              }
                          }
                      ]
                  };

                  return actions.order.create(createOrderPayload);
              },

              // finalize the transaction
              onApprove: (data, actions) => {
                  const captureOrderHandler = (details) => {
                      const payerName = details.payer.name.given_name;
                      console.log('Transaction completed');
                  };

                  return actions.order.capture().then(captureOrderHandler);
              },

              // handle unrecoverable errors
              onError: (err) => {
                  console.error('An error prevented the buyer from checking out with PayPal');
              }
          });

          paypalButtonsComponent
              .render("#paypal-button-container")
              .catch((err) => {
                  console.error('PayPal Buttons failed to render');
              });
        </script>
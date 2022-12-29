<div id="paypal-button-container"></div>
        <!-- Sample PayPal credentials (client-id) are included -->
        <?php
        $src1 = "https://www.paypal.com/sdk/js?client-id=";
        $src2 = "AQx3d2p0npm-KtFfelFg6kRtx4LX4X9t6whlz50ZKgcGaRRyDsvfs5DKzEyOHgGWlbgW_59doJ8Aql8h";
        $src3 ="&currency=USD&intent=capture&enable-funding=venmo";
        $finalString = $src1 . $src2 . $src3;
        $src= htmlspecialchars($finalString);
        echo ($src);
        ?>
        <script src= <?php echo($src) ?>
       
        data-sdk-integration-source="integrationbuilder"></script>
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
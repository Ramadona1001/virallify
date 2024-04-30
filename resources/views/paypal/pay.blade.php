<!DOCTYPE html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
</head>
<body>
  <script src="https://www.paypal.com/sdk/js?client-id=AcrDTqUHyIUxEI1M6RZX5yhh2Qtn2XzWlTz-0iFZ9uWNpENtv8amvQguTc01_yCO0sXZEkx5X-_G_QMW&vault=true&intent=subscription">
  </script> // Add your client_id
     <div id="paypal-button-container"></div>
      <script>
       paypal.Buttons({
        createSubscription: function(data, actions) {
          return actions.subscription.create({
           'plan_id': '{{ $plan }}' // Creates the subscription
           });
         },
         onApprove: function(data, actions) {
           alert('You have successfully subscribed to ' + data.subscriptionID); // Optional message given to subscriber
         }
       }).render('#paypal-button-container'); // Renders the PayPal button
      </script>
  </body>
</html>
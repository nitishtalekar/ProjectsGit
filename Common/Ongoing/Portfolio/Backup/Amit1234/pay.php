<?php

  $r_auth_key = "rzp_test_QYzYYLqx0k4yOQ";
  echo $r_auth_key;
  $t_amount = 100000;

 ?>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width">
  </head>
  <body>

    <form action="pay.php" method="POST">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?= $r_auth_key ?>" // Enter the Key ID generated from the Dashboard
    data-amount="<?= $t_amount ?>" // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    data-currency="INR"
    data-buttontext="Pay with Razorpay"
    data-name="Amit Kumar Mena"
    data-description="Test transaction"
    data-image="https://example.com/your_logo.jpg"
    data-theme.color="#EFEFEF"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>

  </body>
</html>

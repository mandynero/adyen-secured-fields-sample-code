<?php
include ('config/timezone.php');
?>

<!DOCTYPE html>
<html class="html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="robots" content="noindex"/>
    <title>Example PHP checkout</title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://checkoutshopper-test.adyen.com/checkoutshopper/assets/js/sdk/checkoutSecuredFields.1.0.min.js"></script>
    <script type="text/javascript" src="https://checkoutshopper-test.adyen.com/checkoutshopper/js/checkoutInitiatePayment.min.js"></script>
</head>
<body class="body">
<div class="content">
    <div class="explanation">
    </div>

    <div class="checkout-container">
        <div class="form-div">
            <form class="payment-div">
                <span class="brand-container"><img src="" class="brand-container__image" alt="brand"></span>
                <input name="txvariant" value="card"/>
                <div class="form">
                    <div class="input-container">
                        <span class="input-label">Card number:</span>
                        <span class="input-field" data-hosted-id="hostedCardNumberField" data-cse="encryptedCardNumber"></span>
                    </div>
                    <div class="input-container">
                        <span class="input-label">Expiry date:</span>
                        <span class="input-field" data-hosted-id="hostedExpiryDateField" data-cse="encryptedExpiryDate"></span>
                    </div>
                    <div class="input-container">
                        <span class="input-label label-security-code">Security code:</span>
                        <span class="input-field" data-hosted-id="hostedSecurityCodeField" data-cse="encryptedSecurityCode"></span>
                    </div>
                </div>
                <button id="payBtn" type="button" onclick="authorizePayment();">Submit data to Adyen</button>
            </form>
        </div>
    </div>
    <script src = "assets/js/main.js" ></script >
</body>
</html>

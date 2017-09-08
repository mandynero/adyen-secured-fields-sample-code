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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://checkoutshopper-test.adyen.com/checkoutshopper/assets/js/sdk/checkoutSecuredFields.1.0.min.js"></script>
    </head>
    <body class="body">
        <div class="content">
            <div class="explanation">
                <h3>To run this securedFields example, edit the following PHP variables in the <b>config/authentication.php</b> file:</h3>
                <p>
                    <b>$merchantAccount</b>: 'YOUR MERCHANT ACCOUNT', more information in our <a href="https://docs.adyen.com/support/getting-started/step-1-create-a-test-account">Getting started guide</a>.<br/>
                    <b>$checkoutAPIkey</b>: 'YOUR CHECKOUT API KEY'.
                </p>
            </div>

            <div class="checkout-container">
                <div class="form-div">
                    <form class="payment-div">
                        <input type="hidden" name="txvariant" value="card"/>
                        <div class="form">
                            <label>
                                Card number:
                                <span class="input-field" data-hosted-id="hostedCardNumberField" data-cse="encryptedCardNumber"></span>
                            </label>
                            <label>
                                Expiry date:
                                <span class="input-field" data-hosted-id="hostedExpiryDateField" data-cse="encryptedExpiryDate"></span>
                            </label>
                            <label>
                                Security code:
                                <span class="input-field" data-hosted-id="hostedSecurityCodeField" data-cse="encryptedSecurityCode"></span>
                            </label>
                        </div>
                    </form>
                    <button id="payBtn" type="button" onclick="initiatePayment();"> Submit </button>
                </div>
            </div>
        </div>
        <script src = "assets/js/main.js" ></script >
    </body>
</html>
<?php
/**
 * Set up / edit your order on this page
 * For more information, refer to the checkout API documentation: https://docs.adyen.com/developers/in-app-integration/checkout-api-reference */

/** @int value - Put the value into minor units 120 = 1.20 (for USD), for decimal information per currency see: https://docs.adyen.com/developers/currency-codes */
$value = 120;
/** @var  $currencyCode - Change this to any currency you support: https://docs.adyen.com/developers/currency-codes */
$currencyCode = 'USD';

/** @array $amount - Amount is a combination of value and currency */
$amount = array (
    'value' => $value,
    'currency'=> $currencyCode,
);

/** @var $reference - order number */
$reference = 'order_id';

/** @var $shopperReference - Your shopper reference (id or e-mail are commonly used) */
$shopperReference = 'example_shopper';

/** @var $shopperLocale - The shopper locale */
$shopperLocale = 'en-US';

/** @var $countryCode - The countrycode influences the returned payment methods */
$countryCode = 'NL';

/** @var $channel - the channel influences the returned payment methods (the same server can be used for iOS, Android and Point of sale */
$channel = 'Web';

/** @var $sessionValidity - the time the offer will be valid for */
$sessionValidity = date('Y-m-d\TH:i:s\Z', strtotime('+1 hour'));


return array(
    'amount' => $amount,
    'channel' => $channel,
    'countryCode' => $countryCode,
    'shopperReference' => $shopperReference,
    'shopperLocale' => $shopperLocale,
    'reference' => $reference,
);
{
   "merchantAccount":"YOUR_MERCHANT_ACCOUNT",
   "reference":"Your order number",
   "amount":{
      "currency":"EUR",
      "value":1000
   },
   "paymentMethod":{
      "type":"scheme",
      "number":"4111111111111111",
      "expiryMonth":"08",
      "expiryYear":"2018",
      "holderName":"John Smith",
      "cvc":"737"
   },
   "returnUrl":"https://your-company.com/..."
}

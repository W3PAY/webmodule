# W3PAY Web3 Payment System. Manual Setup Instructions for website.

## Step 1
Copy the [w3pay](w3pay) folder to the root of your site.

## Step 2
Include files on the order page.
File example [w3pay/payment.php](w3pay/payment.php)
```
<script src="/w3pay/frontend/js/web3.min.js"></script>
<script type="text/javascript" src="/w3pay/frontend/js/w3pay.min.js"></script>
<link href="/w3pay/frontend/css/w3pay.css" rel="stylesheet">
```
## Step 3
Place the code on the order page.
File example [w3pay/payment.php](w3pay/payment.php)
```
<?php
// Set prices to receive tokens
$OrderData = [
    'orderId' => 1,
    'payAmounts' => [
        ['chainId'=>97, 'payAmountInReceiveToken'=>1.01], // Binance Smart Chain Mainnet - Testnet (BEP20)
        ['chainId'=>56, 'payAmountInReceiveToken'=>1.01], // Binance Smart Chain Mainnet (BEP20)
        ['chainId'=>137, 'payAmountInReceiveToken'=>1.01], // Polygon (MATIC)
        ['chainId'=>43114, 'payAmountInReceiveToken'=>1.01], // Avalanche C-Chain
        ['chainId'=>250, 'payAmountInReceiveToken'=>1.01], // Fantom Opera
    ],
];

// Include php class sW3pay.php
include __DIR__.'/backend/services/sW3pay.php';

// Add a backend signature to the order and data
$OrderData = sW3pay::instance()->getOrderDataAddData($OrderData);
?>

<!-- Display the payment block. data-function-after-pay=functionAfterPay1 - The function starts after payment  -->
<div class="payBlock" data-SelectPayTokens='<?= json_encode($OrderData) ?>' data-function-after-pay="functionAfterPay1"></div>

<!-- The result of the payment will be passed to the function specified in the payment block functionAfterPay1.
After payment, you can send the user to the backend to check the payment and save the result to the database. -->
<script type="application/javascript">
    // The function starts after payment
    function functionAfterPay1(dataPayResult) {
            //...
        }
    }
</script>
```

## Step 4
Make personal settings in the [w3pay/backend/services/sSettings.php](w3pay/backend/services/sSettings.php) class.

## Step 5
Run the [w3pay/backend/generate-w3pay_settings.php](w3pay/backend/generate-w3pay_settings.php) file to generate the [w3pay/frontend/settings/w3pay_settings.json](w3pay/frontend/settings/w3pay_settings.json) settings file.
```
php /w3pay/backend/generate-w3pay_settings.php
```

## Step 6
Run the [w3pay/payment.php](w3pay/payment.php) or order page and test the work.

An example of checking a signature on the backend is in this [w3pay/checkPayment.php](w3pay/checkPayment.php) file. After checking on the backend, you can mark the order as completed in the database.




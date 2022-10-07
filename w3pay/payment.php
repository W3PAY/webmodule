<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crypto Payment W3PAY Example Demo</title>
    <meta name="description" content="Web3 Payment System, W3PAY Example">
    <!-- Include w3pay files on the order page. -->
    <script src="/w3pay/frontend/js/web3.min.js"></script>
    <script type="text/javascript" src="/w3pay/frontend/js/w3pay.min.js"></script>
    <link href="/w3pay/frontend/css/w3pay.css" rel="stylesheet">
</head>
<body>

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
<h1>Example Web3 Payment System Module</h1>
<div class="productBlock">
    <p>Product Test. $1.01</p>
    <!-- Display the payment block. data-function-after-pay=functionAfterPay1 - The function starts after payment  -->
    <div class="payBlock" data-SelectPayTokens='<?= json_encode($OrderData) ?>' data-function-after-pay="functionAfterPay1"></div>
</div>
<!-- The result of the payment will be passed to the function specified in the payment block functionAfterPay1.
After payment, you can send the user to the backend to check the payment and save the result to the database. -->
<script type="application/javascript">
    // The function starts after payment
    function functionAfterPay1(dataPayResult) {
        console.log('functionAfterPay1');
        console.log(dataPayResult);
        if(dataPayResult.error == 0){
            console.log('Frontend payment successful.');
        }
        if(dataPayResult.data.tx){
            var chainId = dataPayResult.data.PaymentSettingsChain.chainData.chainId;
            var tx = dataPayResult.data.tx;
            document.querySelector('.AfterPayBlock1').innerHTML = '<a class="checkPaymentLink" href="/w3pay/checkPayment.php?chainid='+chainId+'&tx='+tx+'" target="_blank">Check payment on backend</a>';
        }
    }
</script>
<!-- AfterPayBlock1 - Block for displaying a button after payment -->
<div class="AfterPayBlock1"></div>


</body>
</html>
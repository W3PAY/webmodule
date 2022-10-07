<?php include __DIR__.'/backend/services/sW3pay.php'; ?>
<h2>Signature verification</h2>
<?php

if(!empty($_GET['chainid']) && !empty($_GET['tx'])){
    ?>
    <p>chainid: <b><?= $_GET['chainid'] ?></b></p>
    <p>Tx: <b><?= $_GET['tx'] ?></b></p>
    <?php
    $checkSign = sW3pay::instance()->checkSign($_GET['chainid'], $_GET['tx']);
    if(empty($checkSign['error'])){
        echo '<p style="color: green;">The signature is true. The details of the contract have been verified. The administrator can mark the successful payment in the database.</p>';
    } else {
        echo '<p style="color: red;">The signature is false. The data of the contract with the data on the site do not match. Error: '.$checkSign['data'].'</p>';
    }
} else {
    echo '<p>empty GET chainid OR tx: ?chainid=&tx=</p>';
}
?>

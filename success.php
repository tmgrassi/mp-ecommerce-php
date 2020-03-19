<?php
require __DIR__ . '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398');

echo $_POST['payment_id'] . '<br>';
echo $_POST['preference_id'] . '<br>';
$payment = MercadoPago\Payment::find_by_id($_POST['payment_id']);

?>
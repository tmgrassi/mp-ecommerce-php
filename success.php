<?php
require __DIR__ . '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398');

$payment = MercadoPago\Payment::find_by_id($_POST['payment_id']);
echo 'ID de pago de Mercado Pago: ' . $payment->id . '<br>';
echo 'Método de pago (payment_method_id): ' .  $payment->payment_method_id . '<br>';
echo 'Monto pagado: ' . $payment->transaction_details->total_paid_amount . ' ' . $payment->currency_id . '<br>';
echo 'Número de orden del pedido: ' . $payment->order->id . '<br>';
//echo $_POST['preference_id'] . '<br>';

?>
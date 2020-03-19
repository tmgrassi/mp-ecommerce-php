<?php
require __DIR__ . '/vendor/autoload.php';

MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-090914-5c508e1b02a34fcce879a999574cf5c9-469485398');

if (trim($_POST["payment_id"] == ''))
{
    echo ("Página de pago exitoso. No se encontro el ID del pago.");
    http_response_code(304);
}
else
{
    $payment = MercadoPago\Payment::find_by_id($_POST["payment_id"]);
    if ($payment->status=="approved")
    {
      http_response_code(201); //Created
      echo '<h1>Pago exitoso.</h1><br>';
      echo 'ID de pago de Mercado Pago: ' . $payment->id . '<br>';
      echo 'ID del método de pago: ' .  $payment->payment_method_id . '<br>';
      echo 'Monto pagado: ' . $payment->transaction_details->total_paid_amount . ' ' . $payment->currency_id . '<br>';
      echo 'Número de orden del pedido: ' . $payment->order->id . '<br>';
    //echo 'Número de preferencia: ' . $_POST['preference_id'] . '<br>';
    }
    elseif ($payment->status=="pending")
    {
        header('Location: https://tmgrassi-mp-ecommerce-php.herokuapp.com/pending.php');
    }
    else
    {
        header('Location: https://tmgrassi-mp-ecommerce-php.herokuapp.com/failure.php');
    }    
}

?>
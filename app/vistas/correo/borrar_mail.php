<?php 
    $email_subject = 'recibo de compra';
    $email_to = 'pcabeza7@gmail.com';
    $email_message = 'Probando';
    $headers .= 'From: PedidoRemoto<contacto@pedidoremoto.com>';      

    mail($email_to, $email_subject, $email_message, $headers);
?>
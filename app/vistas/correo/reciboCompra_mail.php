<?php
$email_subject = 'Nueva tienda registrada en PedidoRemoto'; 
$email_to = 'pcabeza7@gmail.com'; 
$headers = 'From: PedidoRemoto<master@pedidoremoto.com>';
$email_message = 'Tienda afiliada';

mail($email_to, $email_subject, $email_message, $headers); 
?>
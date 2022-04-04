<!-- Invocado desde RecibePedidoMayorista_C.php -->
<?php
    $email_subject = $DatosCorreo['nombre_minorista'] . ", nuevo pedido para despacharle.";
    $email_to = $DatosCorreo['informacion_vendedor'][0]['correo_AfiVen'];
    
    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= "From: PedidoRemoto<administrador@pedidoremoto.com>" . "\r\n";
    $headers .= "Bcc: pcabeza7@gmail.com";

    $email_message =
        '<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <title>Este es un mensaje</title>
                <style type="text/css">
                    body{margin: 0; padding: 0; min-width: 100% !important;}
                    img{width: 10rem; height: 10rem; margin-top: 5%}
                    tr{height: 15px}
                    .hr_1{margin-bottom: 1%;}
                    .td_1{text-align: left; width: 10px; font-size: 0.9em}
                    .tr_1{height: 5px;}
                    @media(max-width: 800px){/*medio con dimensiones menores a lo indicado*/
                        img{width: 6rem; height: 6rem; margin-top: 10%}
                        h1{font-size: 1em}
                        .img__capture{width: 8rem; height: 8rem}
                    }
                </style>
            </head>
            <body>       
                <h1>' . $DatosCorreo['nombre_minorista'] . '</h1>
                <table>';
                    foreach($DatosCorreo['informacion_pedido'] as $DatosPedido) :
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>" . $DatosPedido["cantidad_May"] . "</td>";
                        $email_message .= "<td>" . $DatosPedido["producto_May"] . "</td>";
                        $email_message .= "<td>" . $DatosPedido["opcion_May"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr class='tr_1'>";
                        $email_message .= "</tr>";
                    endforeach;
                $email_message .= '</table>
            </body>
        </html>';
    
    $success = @mail($email_to, $email_subject, $email_message, $headers);

    //Se captura un error si el correo no pudo ser enviado
    if(!$success) {
        $errorMessage = error_get_last()['message'];
    }
?>
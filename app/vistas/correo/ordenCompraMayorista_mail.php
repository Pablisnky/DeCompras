<!-- Invocado desde RecibePedidoMayorista_C.php -->
<?php
    $email_subject = $DatosCorreo['nombre_minorista'] . ", nuevo pedido para despacharle";
    $email_to = $DatosCorreo['informacion_vendedor'][0]['correo_AfiVen'] ;

    // $headers = "MIME-Version: 1.0" . "\r\n";
    // $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
    // $headers = 'From: PedidoRemoto<administrador@pedidoremoto.com>';
    // $headers .= "Bcc: pcabeza7@gmail.com";


    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
    $headers .= "Bcc: pcabeza7@gmail.com";

    @mail($email_to, $email_subject, $email_message, $headers);

    $email_message =
        '<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <title>Este es un mensaje</title>
                <style type="text/css">
                    body{margin: 0; padding: 0; min-width: 100% !important;}
                    h1{color: #8bc34a;}
                    p{font-size: 1rem;}
                    img{width: 10rem; height: 10rem; margin-top: 5%}
                    tr{height: 15px}
                    .hr_1{margin-bottom: 1%;}
                    .td_1{text-align: left; width: 180px;}
                    .tr_1{height: 30px;}
                    @media(max-width: 800px){/*medio con dimensiones menores a lo indicado*/
                        img{width: 6rem; height: 6rem; margin-top: 10%}
                        h1{font-size: 1.6em}
                        .img__capture{width: 8rem; height: 8rem}
                    }
                </style>
            </head>
            <body>
                <h1>Orden de compra</h1>     
                <h2>Datos de la compra</h2>      
                <table>';
                    foreach($DatosCorreo['informacion_pedido'] as $DatosCompra) :
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>Nro. Orden</td>";
                        $email_message .= "<td>" . $DatosCompra["numeroorden_May"] ."</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>FECHA</td>";
                        $email_message .= "<td>" . $DatosCompra['fecha'] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>HORA</td>";
                        $email_message .= "<td>" . $DatosCompra["hora"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>MONTO TOTAL</td>";
                        $email_message .= "<td>" . $DatosCompra["montoTotal"] . ' Bs.' . "</td>";
                        $email_message .= "</tr>";
                        break;
                    endforeach;
                $email_message .= '</table>
                <hr class="hr_1">
                <h2>Datos del pedido</h2>
                <table>';
                    foreach($DatosCorreo['informacion_pedido'] as $DatosPedido) :
                        $email_message .= "<tr>";
                        $email_message .= "<td>PRODUCTO</td>";
                        $email_message .= "<td class='td_1'>" . $DatosPedido["producto_May"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>ESPECIFICACIONES</td>";
                        $email_message .= "<td>" . $DatosPedido["opcion_May"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>PRECIO UNITARIO</td>";
                        $email_message .= "<td>" . $DatosPedido["precio_May"] . " Bs." . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>CANTIDAD</td>";
                        $email_message .= "<td>" . $DatosPedido["cantidad_May"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>SUB-TOTAL</td>";
                        $email_message .= "<td>" . $DatosPedido["total_May"] . " Bs." . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr  class='tr_1'>";
                        $email_message .= "</tr>";
                    endforeach;
                $email_message .= '</table>
              
                <hr class="hr_1">
                <h2>Datos del cliente</h2>

                <table>';
                    $email_message .= "<tr>";
                    $email_message .= "<td class='td_1'>CLIENTE</td>";
                    $email_message .= "<td>" . $DatosCorreo['nombre_minorista'] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td>RIF CLIENTE</td>";
                    $email_message .= "<td>" . $DatosCorreo["rif_minorista"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= '</table>
              
                <hr class="hr_1">
                <h2>Datos del vendedor</h2>
    
                    <table>';
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>Vendedor</td>";
                        $email_message .= "<td>" . $DatosCorreo['informacion_vendedor'][0]['nombre_AfiVen'] . "  " . $DatosCorreo['informacion_vendedor'][0]['apellido_AfiVen'] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td>Correo</td>"; 
                        $email_message .= "<td>" . $DatosCorreo["informacion_vendedor"][0]['correo_AfiVen']  . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= '</table>

                <p>Gracias por confiar en nuestro servicio</p>
                
                <img src="https://pedidoremoto.com/public/images/logo.png">
                <a href="https://www.pedidoremoto.com">www.pedidoremoto.com</a>
                
            </body>
        </html>';

        // $email_message = wordwrap($email_message, 70, "\r\n");
        mail($email_to, $email_subject, $email_message, $headers);
?>
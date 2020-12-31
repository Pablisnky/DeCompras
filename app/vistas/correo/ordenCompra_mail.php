<?php
    // $DatosCorreo viene de RecibePedido_C/recibePedido
    // echo "<pre>";
    // print_r($DatosCorreo);
    // echo "</pre>";    
    // echo $DatosCorreo['informacion_tienda'][0]['nombre_Tien'] . '<br>';
    // echo $DatosCorreo['informacion_tienda'][0]['correo_AfiCom'] . '<br>';
    // exit();                  

    function limpiarAsunto($email_subject){
        $cadena = "Subject";
        $longitud = strlen($cadena) + 2;
        return substr(
            iconv_mime_encode(
                $cadena,
                $email_subject,
                [
                    "input-charset" => "UTF-8",
                    "output-charset" => "UTF-8",
                ]
            ),
            $longitud
        );
    }

    $email_subject = limpiarAsunto($DatosCorreo['informacion_tienda'][0]['nombre_Tien'] .", nuevo pedido para despachar");
    $email_to = $DatosCorreo['informacion_tienda'][0]['correo_AfiCom'] ;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
    $headers .= 'From: PedidoRemoto<contacto@pedidoremoto.com>' . "\r\n" . "Bcc: pcabeza7@gmail.com";          
    $email_message = 
        '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
                "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
            <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1"/>
            <title>Este es un mensaje</title>
            <style type="text/css">  
                body{margin: 0; padding: 0; min-width: 100%!important;} 
                h1{color: #8bc34a;}
                p{font-size: 1rem;}
                img{width: 10rem; height: 10rem; margin-top: 5%}            
                tr{height: 15px} 
                .hr_1{margin-bottom: 1%;}
                .td_1{text-align: left; width: 180px;}

                @media(max-width: 800px){/*medio con dimensiones menores a lo indicado*/
                    img{width: 6rem; height: 6rem; margin-top: 10%} 
                    h1{font-size: 1.6em}
                }
            </style>
        </head>
        <body>
            <h1>Orden de compra</h1>
            <p>Antes de realizar el despacho verifique en su cuenta bancaria <br>el numero de referencia de pago suministrado en la orden de compra</p>' .
            // DATOS DE LA COMPRA
            $email_message = "<h2>Datos de la compra</h2>";
            $email_message .= "<table>";
                foreach($DatosCorreo['informacion_pedido'] as $DatosCompra) :
                    $Capture =  $DatosCompra['capture'];
                    $email_message .= "<tr>";
                    $email_message .= "<td class='td_1'>FECHA</td>";
                    $email_message .= "<td>" . $DatosCompra["fecha"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td class='td_1'>HORA</td>";
                    $email_message .= "<td>" . $DatosCompra["hora"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td class='td_1'>DESPACHO</td>";
                    $email_message .= "<td>" . $DatosCompra["despacho"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td class='td_1'>FORMA DE PAGO</td>";
                    $email_message .= "<td>" . $DatosCompra["formaPago"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td class='td_1'>REFERENCIA BANCARIA</td>";
                    $email_message .= "<td>" . $DatosCompra["codigoPago"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td class='td_1'>TOTAL PAGADO</td>";
                    $email_message .= "<td>" . $DatosCompra["montoTotal"] . ' Bs.' . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<td class='td_1'>CAPTURE</td>";
                    $email_message .= "<td><img src='https://pedidoremoto.com/public/images/capture/" . $Capture . "'></td>"; 
                    $email_message .= "</tr>";
                    break;
                endforeach;
            $email_message .= "</table>";
            $email_message .= "<hr class='hr_1'>";
                
            // DATOS DEL PEDIDO
            $email_message .= "<h2>Datos del pedido</h2>";
            $email_message .= "<table>";
                foreach($DatosCorreo['informacion_pedido'] as $DatosPedido) :
                    $email_message .= "<tr>";
                    $email_message .= "<td class='td_1'>CANTIDAD</td>";
                    $email_message .= "<td>" . $DatosPedido["cantidad"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td>PRODUCTO</td>"; 
                    $email_message .= "<td class='td_1'>" . $DatosPedido["producto"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td class='td_1'>ESPECIFICACIONES</td>";
                    $email_message .= "<td>" . $DatosPedido["opcion"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td>PRECIO UNITARIO</td>"; 
                    $email_message .= "<td>" . $DatosPedido["precio"] . ' Bs.' . "</td>"; 
                    $email_message .= "</tr>";
                    $email_message .="<tr>";
                    $email_message .= "<td>SUB-TOTAL</td>"; 
                    $email_message .= "<td>" . $DatosPedido["total"] . ' Bs.' . "</td>";
                    $email_message .= "</tr>";
                    $email_message .="<tr>";
                    $email_message .= "</tr>";
                endforeach;
            $email_message .= "</table>";                
            $email_message .= "<hr class='hr_1'>";

            // DATOS DEL COMPRADOR
            $email_message .= "<h2>Datos del comprador</h2>";
            $email_message .= "<table>";
                foreach($DatosCorreo['informacion_usuario'] as $DatosUsuarios)  :
                    $email_message .= "<tr>";
                    $email_message .= "<td class='td_1'>NOMBRE</td>";
                    $email_message .= "<td>" . $DatosUsuarios["nombre_usu"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td>APELLIDO</td>";
                    $email_message .= "<td>" . $DatosUsuarios["apellido_usu"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td>CEDULA</td>"; 
                    $email_message .= "<td>" . $DatosUsuarios["cedula_usu"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td>TELEFONO</td>"; 
                    $email_message .= "<td>" . $DatosUsuarios["telefono_usu"] . "</td>";
                    $email_message .= "</tr>";
                    $email_message .= "<tr>";
                    $email_message .= "<td>DIRECCIÓN</td>"; 
                    $email_message .= "<td>" . $DatosUsuarios["direccion_usu"] . "</td>";
                    $email_message .= "</tr>";
                endforeach;
            $email_message .= "</table>";

            $email_message .= "<img src='https://pedidoremoto.com/public/images/logo.png'>";
            $email_message .= '<a href="https://www.pedidoremoto.com">www.pedidoremoto.com</a>';

            // $email_message = wordwrap($email_message, 70, "\r\n");
            mail($email_to, $email_subject, $email_message, $headers);
        '</body>';
?>
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
                caption{
                    background-color: rgb(51, 51, 51);
                    color: white;
                    font-size: 1.2em;
                }
                h1{
                    color: #8bc34a;
                }
                p{
                    font-size: 1rem;
                }
                img{
                    width: 10rem;
                    height: 10rem;
                }
                .hr_1{
                    margin-bottom: 5%;
                }
                th{
                    background-color: rgb(239, 245, 245);
                    width: 170px;
                }
                td{
                    width: 70px;
                    text-align: center;
                }
                .td_1{
                    text-align: left;
                }
                .td_2{
                    background-color: orange;
                }
                .th_1{
                    width: 100px;
                }
                .th_2{
                    width: 220px;
                }
            </style>
        </head>
        <body>
            <h1>Orden de compra</h1>
            <p>Antes de realizar el despacho verifique en su cuenta bancaria <br>el numero de referencia de pago suministrado en la orden de compra</p>
            
            <!-- <p>Tambi&eacute;n se pueden poner links: <a href="https://parzibyte.me/blog">parzibyte.me</a>,cosas como <strong>negritas</strong> o <code>c&oacute;digo</code>. Es decir, cualquier cosa que tenga que ver con HTML puede enviarse en los correos.</p>-->
            ' .
            // DATOS DE LA COMPRA
            $email_message = "<h2>Datos de la compra</h2>";
            $email_message .= "<table>";
            $email_message .= "<caption>Información de transacción</caption>";
            $email_message .= "<thead>";
            $email_message .= "<th class='th_1'>FECHA</th>";
            $email_message .= "<th class='th_1'>HORA</th>"; 
            $email_message .= "<th class='th_1'>DESPACHO</th>"; 
            $email_message .= "<th>FORMA DE PAGO</th>"; 
            $email_message .= "<th>REFERENCIA BANCARIA</th>"; 
            $email_message .= "<th>TOTAL PAGADO</th>"; 
            $email_message .= "</thead>";
                foreach($DatosCorreo['informacion_pedido'] as $DatosCompra){
                    $email_message .= "<tr>";
                    $email_message .= "<td>" . $DatosCompra["fecha"] . "</td>";
                    $email_message .= "<td>" . $DatosCompra["hora"] . "</td>";
                    $email_message .= "<td>" . $DatosCompra["despacho"] . "</td>";
                    $email_message .= "<td>" . $DatosCompra["formaPago"] . "</td>";
                    $email_message .= "<td class='td_2'>" . $DatosCompra["codigoPago"] . "</td>";
                    $email_message .= "<td>" . $DatosCompra["montoTotal"] . ' Bs.' . "</td>";
                    $email_message .= "</tr>";
                    break;
            }
            $email_message .= "</table>";
            $email_message .= "<hr class='hr_1'>";
                
            // DATOS DEL PEDIDO
            $email_message .= "<h2>Datos del pedido</h2>";
            $email_message .= "<table>";
            $email_message .= "<caption>Productos comprados</caption>";
            $email_message .= "<thead>";
            $email_message .= "<th class='th_1'>CANTIDAD</th>";
            $email_message .= "<th>PRODUCTO</th>"; 
            $email_message .= "<th class='th_2'>ESPECIFICACIONES</th>"; 
            $email_message .= "<th>PRECIO UNITARIO</th>"; 
            $email_message .= "<th>TOTAL</th>"; 
            $email_message .= "</thead>";
                foreach($DatosCorreo['informacion_pedido'] as $DatosPedido){
                    $email_message .= "<tr>";
                    $email_message .= "<td>" . $DatosPedido["cantidad"] . "</td>";
                    $email_message .= "<td class='td_1'>" . $DatosPedido["producto"] . "</td>";
                    $email_message .= "<td class='td_1'>" . $DatosPedido["opcion"] . "</td>";
                    $email_message .= "<td>" . $DatosPedido["precio"] . ' Bs.' . "</td>";
                    $email_message .= "<td>" . $DatosPedido["total"] . ' Bs.' . "</td>";
                    $email_message .= "</tr>";
                }
            $email_message .= "</table>";                
            $email_message .= "<hr class='hr_1'>";

            // DATOS DEL COMPRADOR
            $email_message .= "<h2>Datos del comprador</h2>";
            $email_message .= "<table>";
            $email_message .= "<caption>Destinatario</caption>";
            $email_message .= "<thead>";
            $email_message .= "<th>NOMBRE</th>";
            $email_message .= "<th>APELLIDO</th>"; 
            $email_message .= "<th>CEDULA</th>"; 
            $email_message .= "<th>TELEFONO</th>"; 
            $email_message .= "<th>DIRECCIÓN</th>"; 
            $email_message .= "</thead>";
                foreach($DatosCorreo['informacion_usuario'] as $DatosUsuarios){
                    $email_message .= "<tr>";
                    $email_message .= "<td>" . $DatosUsuarios["nombre_usu"] . "</td>";
                    $email_message .= "<td>" . $DatosUsuarios["apellido_usu"] . "</td>";
                    $email_message .= "<td>" . $DatosUsuarios["cedula_usu"] . "</td>";
                    $email_message .= "<td>" . $DatosUsuarios["telefono_usu"] . "</td>";
                    $email_message .= "<td>" . $DatosUsuarios["direccion_usu"] . "</td>";
                    $email_message .= "</tr>";
                }
            $email_message .= "</table>";

            $email_message .= "<img style='width: 10rem; height: 10rem; margin-top: 5%' src='https://pedidoremoto.com/public/images/logo.png'>";
            $email_message .= '<a href="https://www.pedidoremoto.com">www.pedidoremoto.com</a>';

            // $email_message = wordwrap($email_message, 70, "\r\n");
            mail($email_to, $email_subject, $email_message, $headers);
        '</body>';
?>
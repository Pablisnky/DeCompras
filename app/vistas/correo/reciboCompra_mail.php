<?php
    $ID_Pedido = $DatosCorreo['informacion_pedido'][0]['ID_Pedidos'];
    $Hora = $DatosCorreo['informacion_pedido'][0]['hora'];
    $Fecha = $DatosCorreo['informacion_pedido'][0]['fecha'];
    $ID_Tienda = $DatosCorreo['informacion_tienda'][0]['ID_Tienda']; 
    $Tienda = $DatosCorreo['informacion_tienda'][0]['nombre_Tien'];
    
    $email_to = $DatosCorreo['informacion_usuario'][0]['correo_usu']; 
    $email_subject = $DatosCorreo['informacion_tienda'][0]['nombre_Tien'].", recibo de compra"; 
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
    // $headers .= 'From: PedidoRemoto<contacto@pedidoremoto.com>'; 
            // se encuentra en Login_C
            // $headers = 'From: '. "PedidoRemoto<master@pedidoremoto.com>" ."\r\n".       
            //'X-Mailer: PHP/' . phpversion();

    $email_message = 
        '<!DOCTYPE html PUBLIC"-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <title>Recibo de compra</title>
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
                <h1>Recibo de compra en <br>' . $Tienda . '</h1>
                <h2>Datos de la compra</h2>
                <table>';
                    foreach($DatosCorreo['informacion_pedido'] as $DatosCompra) : 
                        $Capture =  $DatosCompra['capture'];
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>FECHA</td>";
                        $email_message .= "<td>" . $DatosCompra["fecha"] ."</td>";
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
                        $email_message .= "<td class='td_1'>MONTO EN TIENDA</td>";
                        $email_message .= "<td>" . $DatosCompra["montoTienda"] . ' Bs.' . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>MONTO ENVIO</td>";
                        $email_message .= "<td>" . $DatosCompra["montoDelivery"]  . ' Bs.' . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>TOTAL PAGADO</td>";
                        $email_message .= "<td>" . $DatosCompra["montoTotal"] . ' Bs.' . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>CAPTURE</td>";
                        $email_message .= "<td><img class='img__capture' src='https://pedidoremoto.com/public/images/capture/" . $Capture ."'></td>"; 
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
                        $email_message .= "<tr>";
                        $email_message .= "<td class='td_1'>CANTIDAD</td>";
                        $email_message .= "<td>" . $DatosPedido["cantidad"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .="<tr>";
                        $email_message .= "<td>SUB-TOTAL</td>"; 
                        $email_message .= "<td>" . $DatosPedido["total"] . ' Bs.' . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr  class='tr_1'>";
                        $email_message .= "</tr>";
                    endforeach;
                $email_message .= '</table>
                <hr class="hr_1">  
                <h2>Datos del comprador</h2>
                <table>';
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
                        $email_message .= "<tr>";
                        $email_message .= "<td>CIUDAD</td>";
                        $email_message .= "<td>" . $DatosUsuarios["Ciudad_usu"] . "</td>";
                        $email_message .= "</tr>";
                        $email_message .= "<tr>";
                        $email_message .= "<td>ESTADO</td>";
                        $email_message .= "<td>" . $DatosUsuarios["Estado_usu"] . "</td>";
                        $email_message .= "</tr>";
                    endforeach;
                $email_message .= '</table> 

                <br>

                <p>0123</p> 
                <p>Código de recepción, será solicitado por el despachador al momento de entregarle su compra</p>
    
                <p>Si existe alguna no conformidad con su despacho, ingrese en <a href="https://www.pedidoremoto.com/NoConformidad_C/noConformidad/'.$ID_Pedido.','.$Fecha.','.$Hora.','.$ID_Tienda.','.$Tienda.'">no conformidades</a>, y reporte su caso, <br> de ser necesario un operador de <strong>PedidoRemoto</strong> lo contactará para ayudarle.</p> 
    
                <p>Gracias por confiar en nuestro servicio</p>
    
                <img src="https://pedidoremoto.com/public/images/logo.png">
                <a href="https://www.pedidoremoto.com">www.pedidoremoto.com</a>
    
            </body>
        </html>';

mail($email_to, $email_subject, $email_message, $headers); 
?>
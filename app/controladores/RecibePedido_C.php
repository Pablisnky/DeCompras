<?php
    class RecibePedido_C extends Controlador{

        public function __construct(){
            session_start();  
            
            $this->ConsultaRecibePedido_M = $this->modelo("RecibePedido_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){
            //$this->vista("paginas/RecibePedido_V/recibeRegistro");
        }

        public function recibePedido(){              
            $verifica_2 = $_SESSION['verifica_2'];  
            if($verifica_2 == 1906){// Anteriormente en carrito_V.php se generó la variable $_SESSION["verfica_2"] con un valor de 1906; con esto se evita que no se pueda recarga esta página.
                unset($_SESSION['verifica_2']);//se borra la sesión verifica.        
            
                // Se reciben todos los campos del formulario, desde carrito_V.php 
                if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombreUsuario"]) && !empty($_POST["apellidoUsuario"]) && !empty($_POST["cedulaUsuario"]) && !empty($_POST["telefonoUsuario"]) && !empty($_POST["direccionUsuario"]) && !empty($_POST["pedido"])){
                    //si son enviados por POST y sino estan vacios, entra aqui
                    $RecibeDatosUsuario = [
                        // DATOS DEL USUARIO
                        'Nombre' => filter_input(INPUT_POST, "nombreUsuario", FILTER_SANITIZE_STRING),
                        'Apellido' => filter_input(INPUT_POST, "apellidoUsuario", FILTER_SANITIZE_STRING),
                        'Cedula' => filter_input(INPUT_POST, "cedulaUsuario", FILTER_SANITIZE_STRING),
                        'Telefono' => filter_input(INPUT_POST, "telefonoUsuario", FILTER_SANITIZE_NUMBER_INT),
                        'Direccion' => filter_input(INPUT_POST, "direccionUsuario", FILTER_SANITIZE_STRING), 
                        'MontoTotal' => filter_input(INPUT_POST, "montoTotal", FILTER_SANITIZE_STRING),                        
                    ];
                    $RecibeDatosPedido = [
                        // DATOS DEL PEDIDO
                        'ID_Tienda' => filter_input(INPUT_POST, "id_tienda", FILTER_SANITIZE_NUMBER_INT),
                        'FormaPago' => filter_input(INPUT_POST, "pago", FILTER_SANITIZE_STRING),
                        'Despacho'=> filter_input(INPUT_POST, "entrega", FILTER_SANITIZE_STRING), 
                    ];

                    // echo "<pre>";
                    // print_r($RecibeDatosPedido);
                    // echo "</pre>";
                    // exit();
                
                    // $RecibeDatos = [
                    //         'Nombre' => ucwords($_POST["nombre"]),  
                    //         'Apellido' => mb_strtolower($_POST["apellido"]),                       
                    //         'Cedula' => is_numeric($_POST["cedula"]) ? $_POST["cedula"]: false,
                    //         'Telefono' => is_numeric($_POST["telefono"]) ? $_POST["telefono"]: false,
                    //         'Direccion' => $_POST["direccion"],
                    //         'Pedido' => $_POST["pedido"],
                    // ];
                    
                    // //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                    // if($RecibeDatos["Telefono"] == false){      
                    //     echo "El telefono debe ser solo números" . "<br>";
                    //     echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    // }
                    // //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                    // if($RecibeDatos["Cedula"] == false){      
                    //     echo "La cedula debe ser solo números" . "<br>";
                    //     echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    // }
                    
                    //Se genera un número aleatorio para asociarlo al pedido
                    $Aleatorio = mt_rand(1000000,999999999);
                    
                    //El pedido como es un string en formato json se recibe sin filtrar para que el metodo jsodecode lo pueda reconocer y convertir en un array.
                    $RecibeDirecto = $_POST['pedido'];

                    $Resultado = json_decode($RecibeDirecto, true); 
                    // echo '<pre>';
                    // print_r($Resultado);
                    // echo '</pre>';
                    // exit;

                    if(is_array($Resultado) || is_object($Resultado))
                        foreach($Resultado as $Key => $Value){
                            $Seccion = $Value['Seccion'];
                            $Producto = $Value['Producto'];
                            $Cantidad = $Value['Cantidad'];
                            $Opcion = $Value['Opcion'];
                            $Precio = $Value['Precio'];
                            $Total = $Value['Total'];
                            
                            //Se INSERTAN los datos del pedido en la BD y retorna el ID_Pedido generado
                            $this->ConsultaRecibePedido_M->insertarPedido($Seccion, $Producto, $Cantidad, $Opcion, $Precio, $Total, $Aleatorio, $RecibeDatosPedido);
                        }
                    else{
                        echo "Hubo un error en la entrega de los datos del pedido";
                        echo "<br>";
                    }
                    
                    //Este switch solo se utiliza para comprobar el json
                    // switch(json_last_error()) {
                    //     case JSON_ERROR_NONE:
                    //         echo 'No ocurrió ningún error';
                    //     break;
                    //     case JSON_ERROR_DEPTH:
                    //         echo 'Se ha excedido la profundidad máxima de la pila';
                    //     break;
                    //     case JSON_ERROR_STATE_MISMATCH:
                    //         echo 'JSON con formato incorrecto o inválido';
                    //     break;
                    //     case JSON_ERROR_CTRL_CHAR:
                    //         echo 'Error del carácter de control, posiblemente se ha codificado de forma incorrecta';
                    //     break;
                    //     case JSON_ERROR_SYNTAX:
                    //         echo 'Error de sintaxis';
                    //     break;
                    //     case JSON_ERROR_UTF8:
                    //         echo 'Caracteres UTF-8 mal formados, posiblemente codificados de forma incorrecta';
                    //     break;
                    //     default:
                    //         echo ' - Unknown error';
                    //     break;
                    // }
                }
                else{
                    echo "Llene todos los campos del formulario de registro" . "<br>";
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }

                //Se INSERTAN los datos del usuario en la BD
                $this->ConsultaRecibePedido_M->insertarUsuario($RecibeDatosUsuario, $RecibeDatosPedido,  $Aleatorio);
                
                // ****************************************
                //Se CONSULTA el pedido recien ingresado a la BD
                $Pedido = $this->ConsultaRecibePedido_M->consultarPedido($Aleatorio);
                // echo '<pre>';
                // print_r($Pedido);
                // echo '</pre>';
                // exit;
                
                //Se CONSULTA el usuario que realizó el pedido
                $Usuario = $this->ConsultaRecibePedido_M->consultarUsuario($Aleatorio);
                // echo '<pre>';
                // print_r($Usuario);
                // echo '</pre>';
                // exit;

                // CORREO
                // ********************************************************
                //Se consulta el correo nombre de la tienda
                $Tienda = $this->ConsultaRecibePedido_M->consultarCorreo($RecibeDatosPedido['ID_Tienda']);
                // echo '<pre>';
                // print_r($Tienda);
                // echo '</pre>';
                // exit;
                                           
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

                $email_subject = limpiarAsunto($Tienda[0]['nombre_Tien'] .", nuevo pedido para despachar");
                $email_to = $Tienda[0]['correo_AfiCom'];
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
                <p>Antes de realizar el despacho verifique en su cuenta bancaria el numero de referencia de pago suministrado en la orden de compra</p>
                
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
                    foreach($Pedido as $DatosCompra){
                        $email_message .= "<tr>";
                        $email_message .= "<td>" . $DatosCompra["fecha"] . "</td>";
                        $email_message .= "<td>" . $DatosCompra["hora"] . "</td>";
                        $email_message .= "<td>" . $DatosCompra["despacho"] . "</td>";
                        $email_message .= "<td>" . $DatosCompra["formaPago"] . "</td>";
                        $email_message .= "<td class='td_2'>" . $DatosCompra["aleatorio"] . "</td>";
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
                    foreach($Pedido as $DatosPedido){
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
                    foreach($Usuario as $DatosUsuarios){
                        $email_message .= "<tr>";
                        $email_message .= "<td>" . $DatosUsuarios["nombre_usu"] . "</td>";
                        $email_message .= "<td>" . $DatosUsuarios["apellido_usu"] . "</td>";
                        $email_message .= "<td>" . $DatosUsuarios["cedula_usu"] . "</td>";
                        $email_message .= "<td>" . $DatosUsuarios["telefono_usu"] . "</td>";
                        $email_message .= "<td>" . $DatosUsuarios["direccion_usu"] . "</td>";
                        $email_message .= "</tr>";
                    }
                $email_message .= "</table>";

                $email_message .= "<img style='width: 10rem; height: 10rem; margin-top:10%' src='https://pedidoremoto.com/public/images/logo.png'>";
                // </body>' .

                $email_message = wordwrap($email_message, 70, "\r\n");
                mail($email_to, $email_subject, $email_message, $headers);

                // ****************************************

                $this->vista("inc/header");
                $this->vista("paginas/RecibePedido_V");
            }
            else{
                header('location:' . RUTA_URL);
            } 
        }
    }
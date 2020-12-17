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
                        // 'Pedido' => filter_input(INPUT_POST, "pedido", FILTER_SANITIZE_STRING), 
                    ];
                    $RecibeDatosPedido = [
                        // DATOS DEL PEDIDO
                        'ID_Tienda' => filter_input(INPUT_POST, "id_tienda", FILTER_SANITIZE_NUMBER_INT),
                        'CodigoPago'=> filter_input(INPUT_POST, "codigoPago", FILTER_SANITIZE_STRING),
                    ];

                    // echo "<pre>";
                    // print_r($RecibeDatos);
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

                    if(is_array($Resultado) || is_object($Resultado))
                        foreach($Resultado as $Key=> $Value){
                            $Seccion = $Value['Seccion'];
                            $Producto = $Value['Producto'];
                            $Cantidad = $Value['Cantidad'];
                            $Opcion = $Value['Opcion'];
                            $Precio = $Value['Precio'];
                            $Total = $Value['Total'];
                            
                            //Se INSERTAN los datos del pedido en la BD
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
                $this->ConsultaRecibePedido_M->insertarUsuario($RecibeDatosUsuario, $Aleatorio);
                
                // ****************************************

                //Se envia al correo pcabeza7@gmail.com y al correo del cliente la notificación de nuevo pedido
                $email_to = 'pcabeza7@gmail.com';
                $email_subject = 'Pedido para' . 'NOMBRE TIENDA';  
                $email_message = 'Descripción del pedido';
                $headers = 'From: ' . 'master@pedidoremoto.com' . '\r\n'.

                'Reply-To: ' . 'master@pedidoremoto.com' . '\r\n' .

                'X-Mailer: PHP/' . phpversion();

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
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
                        'Telefono' => filter_input(INPUT_POST,"telefonoUsuario",FILTER_SANITIZE_STRING),  
                        'Correo' => $_POST['correoUsuario'],
                        'Direccion' => filter_input(INPUT_POST, "direccionUsuario", FILTER_SANITIZE_STRING), 
                        'MontoTotal' => filter_input(INPUT_POST, "montoTotal", FILTER_SANITIZE_STRING),                        
                    ];
                    // echo "<pre>";
                    // print_r($RecibeDatosUsuario);
                    // echo "</pre>";
                    // exit();

                    $RecibeDatosPedido = [
                        // DATOS DEL PEDIDO
                        'ID_Tienda' => filter_input(INPUT_POST, "id_tienda", FILTER_SANITIZE_NUMBER_INT),
                        'FormaPago' => filter_input(INPUT_POST, "formaPago", FILTER_SANITIZE_STRING),
                        'Despacho' => filter_input(INPUT_POST, "entrega", FILTER_SANITIZE_STRING), 
                        'CodigoTransferencia' => filter_input(INPUT_POST, "codigoTransferencia", FILTER_SANITIZE_STRING),
                        // 'CodigoPagoMovil' => filter_input(INPUT_POST, "codigoPagoMovil", FILTER_SANITIZE_STRING),
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

                // Sino se recibe el codigo de transferencia se da un valor por defecto
                if(empty($RecibeDatosPedido['CodigoTransferencia'])){
                    $CodigoTransferencia = $RecibeDatosPedido['formaPago'];
                    $CodigoTransferencia = 'No aplica';
                } 

                //Se INSERTAN los datos del usuario en la BD
                $this->ConsultaRecibePedido_M->insertarUsuario($RecibeDatosUsuario, $CodigoTransferencia,  $RecibeDatosPedido, $Aleatorio);
                
                //Se recibe y se inserta el capture de transferencia
                if($_FILES['imagenTransferencia']['name'] != ''){
                    $archivonombre = $_FILES['imagenTransferencia']['name'];
                    $Ruta_Temporal = $_FILES['imagenTransferencia']['tmp_name'];
                    $tipo = $_FILES['imagenTransferencia']['type'];
                    $tamanio = $_FILES['imagenTransferencia']['size'];

                    // echo $archivonombre .'<br>';
                    // echo $Ruta_Temporal .'<br>';
                    // echo $tipo .'<br>';
                    // echo $tamanio .'<br>';
                    // exit;

                    //Usar en remoto
                    // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/capture/';

                    //usar en local
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/proyectos/PidoRapido/public/images/capture/';

                    //Subimos el fichero al servidor
                    move_uploaded_file($Ruta_Temporal, $directorio.$archivonombre);

                    //Se INSERTA el capture del pago por medio de un UPDATE debido a que ya existe un registro con el pedido en curso
                    $this->ConsultaRecibePedido_M->UpdateCapturePago($Aleatorio, $archivonombre);
                }
                // else{
                //     echo 'No se recibio capture de Transferencia';
                //     exit;
                // }
                
                //Se recibe y se inserta el capture de PagoMovil
                if($_FILES['imagenPagoMovil']['name'] != ''){
                    $archivonombre = $_FILES['imagenPagoMovil']['name'];
                    $Ruta_Temporal = $_FILES['imagenPagoMovil']['tmp_name'];
                    $tipo = $_FILES['imagenPagoMovil']['type'];
                    $tamanio = $_FILES['imagenPagoMovil']['size'];

                    // echo $archivonombre .'<br>';
                    // echo $Ruta_Temporal .'<br>';
                    // echo $tipo .'<br>';
                    // echo $tamanio .'<br>';
                    // exit;

                    //Usar en remoto
                    // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/public/images/capture/';

                    //usar en local
                    $directorio = $_SERVER['DOCUMENT_ROOT'].'/proyectos/PidoRapido/public/images/capture/';

                    //Subimos el fichero al servidor
                    move_uploaded_file($Ruta_Temporal, $directorio.$archivonombre);

                    //Se INSERTA el capture del pago por medio de un UPDATE debido a que ya existe un registro con el pedido en curso
                    $this->ConsultaRecibePedido_M->UpdateCapturePago($Aleatorio, $archivonombre);
                }
                // else{
                //     echo 'No se recibio capture de PagoMovil';
                //     exit;
                // }

                //DATOS ENVIADOS POR CORREOS
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
                
                //Se CONSULTA el correo y el nombre de la tienda
                $Tienda = $this->ConsultaRecibePedido_M->consultarCorreo($RecibeDatosPedido['ID_Tienda']);
                // echo '<pre>';
                // print_r($Tienda);
                // echo '</pre>';
                // exit;

                $DatosCorreo = [
                    'informacion_pedido' => $Pedido, // ID_Pedidos, seccion, producto, cantidad, opcion, precio, total, aleatorio, fecha, hora, montoTotal, despacho, formaPago, codigoPago, capture
                    'informacion_usuario' => $Usuario, //nombre_usu, apellido_usu, cedula_usu, telefono_usu, correo_usu, direccion_usu, montoTotal
                    'informacion_tienda' => $Tienda, //ID_Tienda, correo_AfiCom, nombre_Tien
                ];

                // CORREOS
                // **************************************** 
                //Carga la plantilla de correo orden de compra dirigida al cliente y al marketplace
                $this->correo("ordenCompra_mail", $DatosCorreo); 
                
                //Carga la plantilla de correo recibo de compra dirigida al usuario
                $this->correo("reciboCompra_mail", $DatosCorreo); 

                // ****************************************
                $this->vista("inc/header");
                $this->vista("paginas/RecibePedido_V");
            }
            else{
                header('location:' . RUTA_URL);
            } 
        }
    }
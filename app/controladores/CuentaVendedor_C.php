<?php
    class CuentaVendedor_C extends Controlador{
        private $Mayorista;
        private $ID_Mayorista;
        public $SeccionesMay;

        public function __construct(){
            session_start();  
            $this->ConsultaVendedor_M = $this->modelo("CuentaVendedor_M");
            
            //Sesiones creadas en Login_C
            $this->ID_Mayorista = $_SESSION['ID_Mayorista'];
            
            //Se CONSULTAN las secciones de un mayorista en particular, solicitado en el header y otros metodos
            $this->SeccionesMay = $this->ConsultaVendedor_M->consultarSeccionesMayorista($this->ID_Mayorista);
            // echo '<pre>';
            // print_r($this->SeccionesMay); //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay, nombreMay
            // echo '</pre>';
            // exit;

            $this->Mayorista = $this->SeccionesMay[0]['nombreMay'];

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        //llamado desde Login_C
        public function index(){                     
            //CONSULTA un pedidos con deudas pendientes de un vendedor
            $PediddosDeudas = $this->ConsultaVendedor_M->consultarPedidosPorCobrar_Ven($_SESSION['ID_Vendedor']);

            $Datos = [
                'nombreMay' => $this->Mayorista,
                'nombreVen' => $_SESSION['Nombre_Vendedor'],
                'apellidoVen' => $_SESSION['Apellido_Vendedor'],
                'comisiones' => $PediddosDeudas //montoTotal, fecha, nombre_AfiMin, pedidomayorista.numeroorden_May 
            ];
            
            // echo '<pre>';
            // print_r($Datos); //
            // echo '</pre>';
            // exit;

            $this->vista('header/header_AfiVen', $Datos); 
            $this->vista('view/cuenta_vendedor/cuenta_inicioVen_V', $Datos);
        }
        
        //llamado desde header_AfiVen.php
        public function clienteVen(){            
            //CONSULTA las clientes de un vendedor especifico
            $ClientesVen = $this->ConsultaVendedor_M->consultarClientes_Ven($_SESSION['ID_Vendedor']);//Sesion creadas en Login_C
            
            $Datos = [
                'clientes_ven' => $ClientesVen, //ID_AfiliadoMin, nombre_AfiMin, codigodespacho
                'nombreMay' => $this->Mayorista,
                'nombreVen' => $_SESSION['Nombre_Vendedor'],
                'apellidoVen' => $_SESSION['Apellido_Vendedor']
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('header/header_AfiVen', $Datos); 
            $this->vista('view/cuenta_vendedor/cuenta_clientesVen_V', $Datos);
        }
        
        //llamado desde A_Cuenta_clientesVen.js
        public function detallesClientesVen($ID_Minorista){  
            //CONSULTA un cliente de un vendedor especifico
            $Detalle_Cliente = $this->ConsultaVendedor_M->consultarDetalleClientes_Ven($ID_Minorista);
            
            $Datos = [
                'detallecliente' => $Detalle_Cliente, //ID_AfiliadoMin, nombre_AfiMin, rif_AfiMin, telefono_AfiMin, correo_AfiMin, direccion_AfiMin, codigodespacho
                'nombreMay' => $this->Mayorista,
                'nombreVen' => $_SESSION['Nombre_Vendedor'],
                'apellidoVen' => $_SESSION['Apellido_Vendedor']
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('view/cuenta_vendedor/cuenta_ClientedetalleVen_V', $Datos);
        }

        //llamado desde cuenta_clientesVen_V.php
        public function agregarclienteVen(){
            //se crea una sesion llamada AGRECA_CLIENTE, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de nuevo cliente, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
            $_SESSION['AGREGA_MINORISTA'] = 'AGR_MIN';

            $Datos = [
                'nombreMay' => $this->Mayorista,
                'nombreVen' => $_SESSION['Nombre_Vendedor'],
                'apellidoVen' => $_SESSION['Apellido_Vendedor']
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista('header/header_AfiVen', $Datos ); 
            $this->vista('view/cuenta_vendedor/cuenta_agregarclienteVen_V');
        }
        
        //Invocado en cuenta_agregarminorista_V.php recibe el formulario para cargar un nuevo minorista
        public function recibeAgregarCliente(){  
            if($_SESSION['AGREGA_MINORISTA'] == 'AGR_MIN'){// Anteriormente en el metodo agregarminorista() de este mismo archivo se generó la variable $_SESSION['AGREGA_MINORISTA'] con un valor de AGR_MIN; con esto se evita que no se pueda recarga la página que carga los minorista.
                unset($_SESSION['AGREGA_MINORISTA']);//se borra la sesión verifica. 

                //Se reciben todos los campos del formulario, desde cuenta_agregarminorista_V.php se verifica que son enviados por POST y que no estan vacios
                if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nombreMin']) && !empty($_POST['rifMin']) && !empty($_POST['telefonoMin']) && !empty($_POST['correoMin']) && !empty($_POST['direccionMin']) && !empty($_POST['zonaMin'])){
                    $RecibeMinorista = [
                        //Recibe datos del producto que se va a cargar al sistema
                        'nombre_Min' => filter_input(INPUT_POST, 'nombreMin', FILTER_SANITIZE_STRING),
                        'rif_Min' => filter_input(INPUT_POST, 'rifMin', FILTER_SANITIZE_STRING),
                        'telefono_Min' => filter_input(INPUT_POST, "telefonoMin", FILTER_SANITIZE_STRING),
                        'correo_Min' => filter_input(INPUT_POST, "correoMin", FILTER_SANITIZE_STRING),
                        'direccion_Min' => filter_input(INPUT_POST, 'direccionMin', FILTER_SANITIZE_STRING),
                        'Zona_Min' => filter_input(INPUT_POST, 'zonaMin', FILTER_SANITIZE_STRING),
                        'id_vendedor' => filter_input(INPUT_POST, 'id_vendedor', FILTER_SANITIZE_STRING)
                    ];
                    // echo '<pre>';
                    // print_r($RecibeMinorista);
                    // echo '</pre>';
                    // exit;
                }
                else{
                    echo 'Llene todos los campos del formulario ';
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }
                                
                //IMAGEN VENDEDOR
                //********************************************************
                //Si se selecionó alguna imagen entra
                if($_FILES['fotoMin']["name"] != ''){
                    $nombre_imgMinorista = $_FILES['fotoMin']['name'] != '' ? $_FILES['fotoMin']['name'] : 'imagen.png';
                    $tipo_imgMinorista = $_FILES['fotoMin']['type'] != '' ? $_FILES['fotoMin']['type'] : 'image/png';
                    $tamanio_imgMinorista = $_FILES['fotoMin']['size'] != '' ?  $_FILES['fotoMin']['size'] : '28,0 KB';

                    // echo 'Nombre de la imagen = ' . $nombre_imgMinorista . '<br>';
                    // echo 'Tipo de archivo = ' .$tipo_imgMinorista .  '<br>';
                    // echo 'Tamaño = ' . $tamanio_imgMinorista . '<br>';
                    // echo 'Tamaño maximo permitido = 2.000.000' . '<br>';// en bytes
                    // echo 'Ruta del servidor = ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
                    // exit();

                    //Si existe fotoMin y tiene un tamaño correcto (maximo 2Mb)
                    if(($nombre_imgMinorista == !NULL) AND ($tamanio_imgMinorista <= 2000000)){
                        //indicamos los formatos que permitimos subir a nuestro servidor
                        if(($tipo_imgMinorista == 'image/jpeg')
                            || ($tipo_imgMinorista == 'image/jpg') || ($tipo_imgMinorista == 'image/png')){

                            //Ruta donde se guardarán las imágenes que subamos la variable superglobal
                            //$_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                            //Usar en remoto
                            // $directorio_2 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/proveedor/Don_Rigo/minorista';

                            // usar en local
                            $directorio_2 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/proveedor/Don_Rigo/minorista';

                            //Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                            move_uploaded_file($_FILES['fotoMin']['tmp_name'], $directorio_2.$nombre_imgMinorista);
                        }
                        else{
                            //si no cumple con el formato
                            echo 'Solo puede cargar imagenes con formato jpg, jpeg o png';
                            echo '<a href="javascript: history.go(-1)">Regresar</a>';
                            exit();
                        }
                    }
                    else{//si se pasa del tamaño permitido
                        echo 'La imagen principal es demasiado grande ';
                        echo '<a href="javascript: history.go(-1)">Regresar</a>';
                        exit();
                    }
                }
                else{//si no se selecciono ninguna imagen
                    $nombre_imgMinorista = $_FILES['fotoMin']['name'] = 'Perfil.jpg';
                    $tipo_imgMinorista = $_FILES['fotoMin']['name'] = 'jpg';
                    $tamanio_imgMinorista = $_FILES['fotoMin']['name'] = '20,0 KB';
                }
                
                // SE GENERA EL CODIGO DE DESPACHO DEL MINORISTA
                $Ale_CodigoMinorista = mt_rand(99999,999999);

                //********************************************************
                //Las siguientes consultas se deben realizar por medio de Transacciones BD
                //Se INSERTA el minorista en la BD
                $this->ConsultaVendedor_M->insertarMinorista($RecibeMinorista, $nombre_imgMinorista, $tipo_imgMinorista, $tamanio_imgMinorista, $Ale_CodigoMinorista);
                                
                $this->clienteVen();
            }
            else{
                $this->agregarclienteVen();
            } 
        }
                
        //llamado desde header_AfiVen.php
        public function pedidosVen(){            
            //CONSULTA las clientes de un vendedor especifico
            $PedidosVen = $this->ConsultaVendedor_M->consultarPedidos_Ven($_SESSION['ID_Vendedor']);//Sesion creadas en Login_C

            $Nro_Orden = $PedidosVen[0]['numeroorden_May'];

            //CONSULTA el saldo total abonado a un pedido
            // $DeudaPedidoVen = $this->ConsultaVendedor_M->consultarDeudaPedido_Ven($Nro_Orden);
            
            // $Total = $PedidoVen[0]['montoTotal'];
            // $TotalAbonado = $DeudaPedidoVen[0]['TotalAbonado'];

            // // se cambia el formato de los decimales, de coma a punto, para procesar la operacion ( a pesar que en MySQL estan en formato decimal  .) 
            // $Total = str_replace(',', '.', $Total);   
            // $Deuda = str_replace(',', '.', $TotalAbonado);  

            // //Se calcula la deuda pendiente del pedido especifico
            // $Deuda = $Total - $TotalAbonado; 
            
            $Datos = [
                'pedidos_ven' => $PedidosVen, //nombre_AfiMin, numeroorden_May, montoTotal, fecha, hora, factura, pagado
                // 'deuda' => $Deuda,
                'nombreMay' => $this->Mayorista,
                'nombreVen' => $_SESSION['Nombre_Vendedor'],
                'apellidoVen' => $_SESSION['Apellido_Vendedor']
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('header/header_AfiVen', $Datos); 
            $this->vista('view/cuenta_vendedor/cuenta_PedidosVen_V', $Datos);
        }
         
        //llamado desde A_Cuenta_pedidosVen.js
        public function pedidodetalleVen($Nro_Orden){            
            //CONSULTA un pedido especifico de un vendedor
            $PedidoVen = $this->ConsultaVendedor_M->consultarPedido_Ven($Nro_Orden);

            //CONSULTA el detalle de un pedido especifico de un vendedor
            $DetallePedidoVen = $this->ConsultaVendedor_M->consultarDetallePedido_Ven($Nro_Orden);
            
            //CONSULTA los abonos parciales realizados un pedido
            $AbonosPedidoVen = $this->ConsultaVendedor_M->consultarAbonosPedido_Ven($Nro_Orden);

            //CONSULTA el saldo total abonado a un pedido
            $DeudaPedidoVen = $this->ConsultaVendedor_M->consultarDeudaPedido_Ven($Nro_Orden);
            
            $Total = $PedidoVen[0]['montoTotal'];
            $TotalAbonado = $DeudaPedidoVen[0]['TotalAbonado'];

            // se cambia el formato de los decimales, de coma a punto, para procesar la operacion ( a pesar que en MySQL estan en formato decimal  .) 
            $Total = str_replace(',', '.', $Total);   
            $Deuda = str_replace(',', '.', $TotalAbonado);  

            //Se calcula la deuda pendiente del pedido especifico
            $Deuda = $Total - $TotalAbonado;      

            $Datos = [
                'NroOrden' => $Nro_Orden,
                'pedido' => $PedidoVen, //numeroorden_May , montoTotal, factura
                'detallepedido_ven' => $DetallePedidoVen, //nombre_AfiMin, seccion_May, producto_May, opcion_May, cantidad_May, precio_May, total_May, fecha, hora 
                'pagos' => $AbonosPedidoVen, //factura, abono, fechaabono, formapago, pagada
                'deuda_May' => $Deuda,
                'nombreMay' => $this->Mayorista,
                'nombreVen' => $_SESSION['Nombre_Vendedor'],
                'apellidoVen' => $_SESSION['Apellido_Vendedor']
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();
 
            $this->vista('view/cuenta_vendedor/cuenta_PedidodetalleVen_V', $Datos);
        }  
         
        //llamado desde cuenta_pedidodetallleVen_V.php y 
        public function asignarNroFactura($Nro_Orden){    
            //se crea una sesion llamada ASIGNAR_FACTURA, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de asignar factura, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
            $_SESSION['ASIGNAR_FACTURA'] = 'ASI_FAC';

            $Datos = [
            'nroorden' => $Nro_Orden,
            'nombreMay' => $this->Mayorista,
            'nombreVen' => $_SESSION['Nombre_Vendedor'],
            'apellidoVen' => $_SESSION['Apellido_Vendedor']
            ];

            $this->vista('header/header_AfiVen', $Datos); 
            $this->vista('modal/modal_AsigarFactura_V', $Datos);
        }  
         
        //llamado desde cuenta_pedidodetalleVen_V.php
        public function recibeAsignarNroFactura(){            
            if($_SESSION['ASIGNAR_FACTURA'] == 'ASI_FAC'){// Anteriormente en el metodo asignarNroFactura() de este mismo archivo se generó la variable $_SESSION['ASIGNAR_FACTURA'] con un valor de ASI_FAC; con esto se evita que no se pueda recarga la página que carga los abonos.
                unset($_SESSION['ASIGNAR_FACTURA']);//se borra la sesión verifica. 

                //Se reciben todos los campos del formulario, desde modal_agregarPagoVen_V.php_V.php se verifica que son enviados por POST y que no estan vacios
                if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nro_factura']) && !empty($_POST['nro_orden'])){
                    $RecibeFactura = [
                        //Recibe datos del producto que se va a cargar al sistema
                        'Nro_factura' => filter_input(INPUT_POST, 'nro_factura', FILTER_SANITIZE_STRING),
                        'Nro_orden' => filter_input(INPUT_POST, 'nro_orden', FILTER_SANITIZE_STRING)
                    ];
                    // echo '<pre>';
                    // print_r($RecibeFactura);
                    // echo '</pre>';
                    // exit;

                    //ACTUALIZA el campo factura
                    $this->ConsultaVendedor_M->actualizarFactura($RecibeFactura);
                    
                    header('location:' . RUTA_URL. '/CuentaVendedor_C/pedidosVen/');
                }
                else{
                    echo 'Llene todos los campos del formulario ';
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }
            }
            else{
                header('location:' . RUTA_URL. '/CuentaVendedor_C/pedidosVen/');
            } 
        }
        //llamado desde header_AfiVen.php y 
        public function porcobrar(){            
            //CONSULTA un pedidos con deudas pendientes de un vendedor
            $PediddosDeudas = $this->ConsultaVendedor_M->consultarPedidosPorCobrar_Ven($_SESSION['ID_Vendedor']);
            
            $Datos = [
                // 'detallepedido_ven' => $PediddosDeudas, //
                'nombreMay' => $this->Mayorista,
                'nombreVen' => $_SESSION['Nombre_Vendedor'],
                'apellidoVen' => $_SESSION['Apellido_Vendedor']
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();
 
            $this->vista('header/header_AfiVen', $Datos); 
            $this->vista('view/cuenta_vendedor/cuenta_porcobrarVen_V', $Datos);
        }
          
        //llamado desde cuenta_pedidodetalleVen_V.php
        public function agregarpagoVen($DatosAgrupados){ 
            //$DatosAgrupados contiene una cadena con el separados por -, se convierte en array para separar los elementos
            $DatosAgrupados = explode('-', $DatosAgrupados);

            $Nro_Orden = $DatosAgrupados[0];
            $MontoTotal = $DatosAgrupados[1];

            //CONSULTA un pedido especifico de un vendedor para verificar si esta pagado en su totalidad
            $PedidoVen = $this->ConsultaVendedor_M->consultarPedido_Ven($Nro_Orden);

            if($PedidoVen[0]['factura'] != 'No Asignada'){
                if($PedidoVen[0]['pagado'] == 0){
                    //se crea una sesion llamada AGREGA_ABONO, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de nuevo cliente, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
                    $_SESSION['AGREGA_ABONO'] = 'AGR_ABO';
                    
                    $Datos = [
                        'nroorden' => $Nro_Orden, 
                        'montoTotal' => $MontoTotal,
                        'nombreMay' => $this->Mayorista,
                        'nombreVen' => $_SESSION['Nombre_Vendedor'],
                        'apellidoVen' => $_SESSION['Apellido_Vendedor']
                    ];
                    
                    // echo '<pre>';
                    // print_r($Datos);
                    // echo '</pre>';
                    // exit();
        
                    $this->vista('header/header_AfiVen', $Datos); 
                    $this->vista('modal/modal_agregarPagoVen_V', $Datos);
                }
                else{
                    echo 'El pedido ya ha sido pagado en su totalidad';
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }
            }
            else{
                echo 'No hay factura asignada a esta orden de despacho';
                echo '<br>';
                echo '<br>';
                echo '"Edite" el pedido y asigne el número de factura correspondiente';
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }
        }
         
        //llamado desde cuenta_pedidodetalleVen_V.php
        public function recibeAgregarPagoVen(){            
            if($_SESSION['AGREGA_ABONO'] == 'AGR_ABO'){// Anteriormente en el metodo agregarpagoVen() de este mismo archivo se generó la variable $_SESSION['AGREGA_ABONO'] con un valor de AGR_ABO; con esto se evita que no se pueda recarga la página que carga los abonos.
                unset($_SESSION['AGREGA_ABONO']);//se borra la sesión verifica. 

                //Se reciben todos los campos del formulario, desde modal_agregarPagoVen_V.php_V.php se verifica que son enviados por POST y que no estan vacios
                if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['fechaAbono']) && !empty($_POST['montoAbono']) && !empty($_POST['metodoAbono']) && !empty($_POST['nro_orden'])){
                    $RecibeAbono = [
                        //Recibe datos del producto que se va a cargar al sistema
                        'Fecha_Abono' => filter_input(INPUT_POST, 'fechaAbono', FILTER_SANITIZE_STRING),
                        'Monto_Abono' => filter_input(INPUT_POST, 'montoAbono', FILTER_SANITIZE_STRING),
                        'Metodo_Abono' => filter_input(INPUT_POST, "metodoAbono", FILTER_SANITIZE_STRING),
                        'Nro_Orden' => filter_input(INPUT_POST, "nro_orden", FILTER_SANITIZE_STRING),
                        'Factura' => filter_input(INPUT_POST, "factura", FILTER_SANITIZE_STRING),
                        'montoTotal' => filter_input(INPUT_POST, "montoTotal", FILTER_SANITIZE_STRING)
                    ];
                    // echo '<pre>';
                    // print_r($RecibeAbono);
                    // echo '</pre>';
                    // exit;

                    //CONSULTA los pagos realizados y si el pedido tiene deuda pendiente
                    $PedidoMora = $this->ConsultaVendedor_M->consultarAbonosPedido_Ven($RecibeAbono['Nro_Orden']);
                    
                    // echo '<pre>';
                    // print_r($PedidoMora);
                    // echo '</pre>';
                    // echo $RecibeAbono['montoTotal'] . "<br>";
                    // echo $PedidoMora[0]['abono']. "<br>";
                    // exit;

                    // se cambia el formato de los decimales, de coma a punto, para procesar la operacion matematica 
                    $MontoTotal_1 = str_replace(',', '.', $RecibeAbono['montoTotal']);   
                    $Abono_1 = str_replace(',', '.', $PedidoMora[0]['abono']);  
    
                    if($MontoTotal_1 > $Abono_1){
                        //Se INSERTA el pago abonado en la BD
                        $this->ConsultaVendedor_M->insertarPagoAbonado($RecibeAbono);
                    }

                    //Se actualiza si el pedido se pago completamente o queda con deuda
                    //CONSULTA el saldo total abonado a un pedido
                    $DeudaPedidoVen = $this->ConsultaVendedor_M->consultarDeudaPedido_Ven($RecibeAbono['Nro_Orden']);

                    // se cambia el formato de los decimales, de coma a punto, para procesar la operacion matematica    
                    $Abono_2 = str_replace(',', '.', $DeudaPedidoVen[0]['TotalAbonado']); 

                    if($MontoTotal_1 == $Abono_2){
                        //Se ACTUALIZA el status de morosidad del pedido
                        $this->ConsultaVendedor_M->actualizarPagoAbonado($RecibeAbono);
                    }

                    header('location:' . RUTA_URL. '/CuentaVendedor_C/pedidosVen/');
                }
                else{
                    echo 'Llene todos los campos del formulario ';
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }
            }
            else{
                header('location:' . RUTA_URL. '/CuentaVendedor_C/pedidosVen/');
            } 
        }
    }
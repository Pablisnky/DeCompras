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
            $Datos = [
                'nombreMay' => $this->Mayorista,
                'nombreVen' => $_SESSION['Nombre_Vendedor'],
                'apellidoVen' => $_SESSION['Apellido_Vendedor'],
            ];

            $this->vista('header/header_AfiVen', $Datos); 
            $this->vista('view/cuenta_vendedor/cuenta_inicioVen_V');
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
        public function recibeAgregarCliente(){;  
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
                        'Zona_Ven' => filter_input(INPUT_POST, 'zonaMin', FILTER_SANITIZE_STRING),
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
            
            $Datos = [
                'pedidos_ven' => $PedidosVen, //nombre_AfiMin, numeroorden_May, montoTotal, fecha, hora
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
            $DetallePedidoVen = $this->ConsultaVendedor_M->consultarDetallePedido_Ven($Nro_Orden);
            
            $Datos = [
                'detallepedido_ven' => $DetallePedidoVen, //seccion_May, producto_May, opcion_May, cantidad_May, precio_May, total_May, fecha, hora
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
    }
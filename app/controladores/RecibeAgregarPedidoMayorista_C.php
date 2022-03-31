<?php
    class RecibeAgregarPedidoMayorista_C extends Controlador{

        public function __construct(){
            session_start();  
            
            $this->ConsultaRecibePedidoMayorista_M = $this->modelo("RecibePedidoMayorista_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
            
            //Para utilizar dos consultas a BD que ya existen en este archivo
            // require(RUTA_APP . "/modelos/RecibePedidoMayorista_M.php");
        }
        
        //Invocado en carritoMayoristaAgregar_V.php
        public function index(){    
            $Verfica_pedido = $_SESSION['verfica_pedido'];  
            
            if($Verfica_pedido == 2022){// Anteriormente en CarritoMayorista_C/index se generó la variable $_SESSION["verfica_pedido"] con un valor de 1906; con esto se evita que no se pueda recarga esta página.
                unset($_SESSION['verfica_pedido']);//se borra la sesión verifica.        
            
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    //si son enviados por POST y sino estan vacios, entra aqui
                    $RecibeDatosMinorista = [
                        // DATOS DEL USUARIO                        
                        'nro_Orden' => $_SESSION['Nro_Orden'],     
                        'ID_Minorista' => $_POST['id_minorista'],
                        'CodigoMinorista' => $_POST['codigoMinorista'],    
                        'MontoTienda' => $_POST['montoTienda'] 
                    ];
                    // echo '<pre>';
                    // print_r($RecibeDatosMinorista);
                    // echo '</pre>';
                    // exit();               
                    
                    //El pedido como es un string en formato json se recibe sin filtrar o sanear desde vitrina.js PedidoEnCarrito() para que el metodo jsodecode lo pueda reconocer y convertir en un array.
                    $RecibeDirecto = $_POST['pedido'];

                    $Resultado = json_decode($RecibeDirecto, true); 

                    // echo '<pre>';
                    // print_r($Resultado);
                    // echo '</pre>';
                    // exit();
                    // $Ale_NroOrden, $Seccion, $Producto, $Opcion, $Cantidad, $Precio, $Total, $ID_Producto
                    
                    //Se INSERTA el pedido en la BD
                    $this->ConsultaRecibePedidoMayorista_M->insertarPedidoMayorista($RecibeDatosMinorista, $RecibeDatosMinorista['nro_Orden']);

                    //Se reciben los detalles del pedido
                    if(is_array($Resultado) || is_object($Resultado)){
                        foreach($Resultado as $Key => $Value)   :
                            $Seccion = $Value['Seccion'];
                            $Producto = $Value['Producto'];
                            $Cantidad = $Value['Cantidad'];
                            $Opcion = $Value['Opcion'];
                            $Precio = $Value['Precio'];
                            $Total = $Value['Total'];
                            $ID_Opcion = $Value['ID_Opcion'];
                            $ID_Producto = $Value['ID_Producto'];
                            
                            //Se INSERTAN los detalles del pedido en la BD
                            $this->ConsultaRecibePedidoMayorista_M->insertarDetallePedidoMayorista( $RecibeDatosMinorista['nro_Orden'], $Seccion, $Producto, $Opcion, $Cantidad, $Precio, $Total, $ID_Producto);
                            
                            // Se ACTUALIZA el inventario de los productos pedidos
                            //Se consulta la cantidad de existencia del producto
                            $Existencia = $this->ConsultaRecibePedidoMayorista_M->consultarExistenciaMayorista($ID_Opcion);
                        
                            foreach($Existencia as $Key) :
                                $Key['cantidadMay'];
                            endforeach;

                            //Se resta lo que el usuario pidio y el resultado se introduce en BD
                            $Inventario = $Key['cantidadMay'] - $Cantidad;
                            
                            $this->ConsultaRecibePedidoMayorista_M->UpdateInventarioMayorista($ID_Opcion, $Inventario);
                        endforeach;
                    }
                    else{
                        echo 'Error en la entrega de los detalles del pedido';
                        echo '<br>';
                    }
                }
                else{
                    echo 'Llene todos los campos del formulario de registro' . '<br>';
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }

                // ****************************************
                // //DATOS ENVIADOS POR CORREOS
                // //Se CONSULTA el pedido recien ingresado a la BD
                // $Pedido = $this->ConsultaRecibePedidoMayorista_M->consultarPedido($Ale_NroOrden);
                
                // //Se CONSULTA el usuario que realizó el pedido
                // $Usuario = $this->ConsultaRecibePedidoMayorista_M->consultarUsuario($RecibeCodigoMinorista['Cedula']);
                
                // //Se CONSULTA el correo y el nombre de la tienda
                // $Tienda = $this->ConsultaRecibePedidoMayorista_M->consultarCorreo($RecibeDatosPedido['ID_Tienda']);

                // // Se genera el código de despacho que será solicitado por el despachador
                // $Ale_CodigoDespacho = mt_rand(0001,9999);

                // $DatosCorreo = [
                //     'informacion_pedido' => $Pedido, // ID_Pedidos, seccion, producto, cantidad, opcion, precio, total, numeroorden, fecha, hora, montoDelivery, montoTienda, montoTotal, despacho, formaPago, codigoPago, capture
                //     'informacion_usuario' => $Usuario, //nombre_usu, apellido_usu, cedula_usu, telefono_usu, correo_usu, Estado_usu, Ciudad_usu, direccion_usu
                //     'informacion_tienda' => $Tienda, //ID_Tienda, correo_AfiCom, nombre_Tien
                //     'Codigo_despacho' => $Ale_CodigoDespacho
                // ];

                // // echo '<pre>';
                // // print_r($DatosCorreo);
                // // echo '</pre>';
                // // exit;

                // $Datos = [
                //     'Codigo_despacho' => $Ale_CodigoDespacho
                // ];

                // // CORREOS
                // // **************************************** 
                // echo 'Correos';
                // //Carga la plantilla de correo recibo de compra dirigida al usuario
                // $this->correo('reciboCompra_mail', $DatosCorreo); 

                // //Carga la plantilla de correo orden de compra dirigida al cliente y al marketplace
                // $this->correo('ordenCompra_mail', $DatosCorreo); 
                
                unset($_SESSION['Nro_Orden']);//se borra la sesión, creada en CuentaVendedor_C/agregarProductoAPedido

                // $this->vista('header/header');
                // $this->vista('view/RecibePedidoMayorista_V', $Datos);
                header('location:' . RUTA_URL . '/CuentaVendedor_C/pedidosVen/');
            }
            else{
                header('location:' . RUTA_URL . '/Inicio_C/NoVerificaLink');
            } 
        }
    }
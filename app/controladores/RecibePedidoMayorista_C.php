<?php
    class RecibePedidoMayorista_C extends Controlador{

        public function __construct(){
            session_start();  
            
            $this->ConsultaRecibePedidoMayorista_M = $this->modelo("RecibePedidoMayorista_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        //Invocado en carritoMayorista_V.php 
        public function index(){              
            if($_SESSION['verfica_pedido'] == 'VER_PED'){// Anteriormente en CarritoMayorista_C/index se generó la variable $_SESSION["verfica_pedido"] con esto se evita que no se pueda recarga esta página.
                unset($_SESSION['verfica_pedido']);//se borra la sesión verifica.        
            
                if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['codigoMinorista'])){
                    //si son enviados por POST y sino estan vacios, entra aqui

                    // se cambia el formato de los decimales, de coma a punto, para introducirlo a la BD)
                    $Monto = $_POST['montoTienda'];
                    $Monto = str_replace(',', '.', $Monto);

                    $RecibeDatosMinorista = [
                        // DATOS DEL USUARIO                        
                        'ID_Minorista' => $_POST['id_minorista'],
                        'CodigoMinorista' => $_POST['codigoMinorista'],    
                        'MontoTienda' => $Monto,
                        'codgoVenta_vendedor' => $_POST['codigo_venta'],
                        'nombre_minorista' => $_POST['nombre_minorista'],
                        'rif_minorista' => $_POST['rif_minorista'],
                    ];              
                    
                    // echo '<pre>';
                    // print_r($RecibeDatosMinorista);
                    // echo '</pre>';
                    // exit();

                    //Se genera un número Ale_NroOrden que sera el numero de orden del pedido
                    $Ale_NroOrden = mt_rand(1000000,999999999);
                    
                    //El pedido como es un string en formato json se recibe sin filtrar o sanear desde E_VitrinaMayorista.js por medio de PedidoEnCarrito() para que el metodo jsodecode lo pueda reconocer y convertir en un array.
                    $RecibeDirecto = $_POST['pedido'];

                    $Resultado = json_decode($RecibeDirecto, true); 

                    // echo '<pre>';
                    // print_r($Resultado);
                    // echo '</pre>';
                    // exit();
                    
                    //Se INSERTA el pedido en la BD
                    $this->ConsultaRecibePedidoMayorista_M->insertarPedidoMayorista($RecibeDatosMinorista, $Ale_NroOrden);

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
                            $this->ConsultaRecibePedidoMayorista_M->insertarDetallePedidoMayorista( $Ale_NroOrden, $Seccion, $Producto, $Opcion, $Cantidad, $Precio, $Total, $ID_Producto);
                            
                            //Se consulta la cantidad de existencia del producto
                            $Existencia = $this->ConsultaRecibePedidoMayorista_M->consultarExistenciaMayorista($ID_Opcion);
                        
                            foreach($Existencia as $Key) :
                                $Key['cantidadMay'];
                            endforeach;

                            //Se resta lo que el usuario pidio y el resultado se introduce en BD
                            $Inventario = $Key['cantidadMay'] - $Cantidad;
                            
                            // Se ACTUALIZA el inventario de los productos pedidos
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
                //DATOS ENVIADOS POR CORREOS
                //Se CONSULTA el pedido recien ingresado a la BD
                $PedidoMayorista = $this->ConsultaRecibePedidoMayorista_M->consultarPedidoMayorista($Ale_NroOrden);
                                
                //Se CONSULTA DATOS DEL VENDEDOR QUE REALIZA EL PEDIDO
                $Vendedor = $this->ConsultaRecibePedidoMayorista_M->consultarCorreo($RecibeDatosMinorista['codgoVenta_vendedor']);

                $DatosCorreo = [
                    'informacion_pedido' => $PedidoMayorista, // ID_Pedido_May, seccion_May, producto_May, cantidad_May, opcion_May, precio_May, total_May, numeroorden_May, fecha, hora, montoTotal
                    'informacion_vendedor' => $Vendedor, // nombre_AfiVen, apellido_AfiVen, correo_AfiVen
                    'nombre_minorista' => $RecibeDatosMinorista['nombre_minorista'],
                    'rif_minorista' => $RecibeDatosMinorista['rif_minorista']
                ];

                // echo '<pre>';
                // print_r($DatosCorreo);
                // echo '</pre>';
                // exit;

                // // CORREOS
                // // **************************************** 
                // echo 'Correos';
                //Carga la plantilla de correo recibo de compra dirigida al usuario
                // $this->correo('reciboCompra_mail', $DatosCorreo); 

                //Carga la plantilla de correo orden de compra dirigida al cliente y al marketplace
                $this->correo('ordenCompraMayorista_mail', $DatosCorreo); 

                $this->vista('header/header');
                $this->vista('view/RecibePedidoMayorista_V');
            }
            else{
                header('location:' . RUTA_URL . '/Inicio_C/NoVerificaLink');
            } 
        }
    }
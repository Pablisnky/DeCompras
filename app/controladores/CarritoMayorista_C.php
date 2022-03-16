<?php
    class CarritoMayorista_C extends Controlador{

        public function __construct(){
            session_start();  
            
            $this->ConsultaCarritoVitrina_M = $this->modelo("CarritoMayorista_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        // llamado desde A_VitrinaMayorista.js por medio de llamar_PedidoEnCarrito()
        public function index(){  
            $Verfica_pedido = 2022;  
            $_SESSION['verfica_pedido'] = $Verfica_pedido; 
            //Se crea esta sesion para impedir que se acceda a la pagina que procesa el formulario (RecibePedidoMayorista_V.php) o se recargue mandandolo varias veces a la base de datos
            
            //SELECT para buscar información del responsable de la tienda
            // $ContactoTienda = $this->ConsultaCarrito_M->consultarResponsableTienda($ID_Mayorista);
            
            //Solicita el precio del dolar
            require(RUTA_APP . "/controladores/Menu_C.php");
            $this->PrecioDolar = new Menu_C();

            // echo '<pre>';
            // print_r($this->PrecioDolar);
            // echo '</pre>';

            $DolarHoy = $this->PrecioDolar->Dolar;

            //El delivery cuesta 1,3 dolares, se entrega un numero entero
            $CostoDelivery = 1.30 * $DolarHoy;

            $Datos = [
                // 'ID_Mayorista' => $ID_Mayorista,
                'Delivery' => $CostoDelivery,
                'DolarHoy' => $DolarHoy          
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
                        
            $this->vista("view/carritoMayorista_V", $Datos);
        }        
        
        //Invocado en A_VitrinaMayorista.js por medio de Llamar_datosMinorista()
        public function informacionMinorista($CodigoDespacho){
            //Se CONSULTA si el minorista esta suscrito
            $Minorista = $this->ConsultaCarritoVitrina_M->consultarMinorista($CodigoDespacho);

            // echo "<pre>";
            // print_r($Minorista);
            // echo "</pre>";          
            // exit();

            if($Minorista == Array ()){
                echo 'Código invalido';
            }
            else{ 
                //Se separa cada variable pooque llegara a Javascript como una cadena de texto, luego se convertira en un array utilizando las , como caracter separador 
                echo $Minorista[0]['nombre_AfiMin'] . ',' . $Minorista[0]['rif_AfiMin'] . ',' .  $Minorista[0]['telefono_AfiMin'] . ',' .$Minorista[0]['correo_AfiMin'] . ',' . $Minorista[0]['zona_AfiMin'] . ',' . $Minorista[0]['codigodespacho'] . ',' . $Minorista[0]['direccion_AfiMin']. ',' . $Minorista[0]['ID_AfiliadoMin'];
            }
        }              
        
        //Invocado en A_VitrinaMayorista.js por medio de Llamar_datosMinorista()
        public function listaMinorista($CodigoVenta){
            //Se CONSULTA los minoristas asignados a un vnededor
            $MinoristaVen = $this->ConsultaCarritoVitrina_M->consultarMinoristasVen($CodigoVenta);
            
            $Datos = [
                'minoristaVen' => $MinoristaVen, // nombre_AfiMin, rif_AfiMin, codigodespacho      
            ];

            // echo "<pre>";
            // print_r($MinoristaVen);
            // echo "</pre>";          
            // exit();
            
            $this->vista("view/ajax/listadoMinorista_V", $Datos);
        }
    }
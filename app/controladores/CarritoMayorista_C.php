<?php
    //Archivo llamado desde A_Vitrina.js por medio de llamar_PedidoEnCarrito()

    class CarritoMayorista_C extends Controlador{

        public function __construct(){
            session_start();  
            
            $this->ConsultaCarritoVitrina_M = $this->modelo("CarritoMayorista_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
    
        public function index($ID_Mayorista){  
            //SELECT para buscar información del responsable de la tienda
            // $ContactoTienda = $this->ConsultaCarrito_M->consultarResponsableTienda($ID_Mayorista);

            // //SELECT para buscar información de pago por transferencia de la tienda
            // $Banco = $this->ConsultaCarrito_M->consultarCtaBanco($ID_Mayorista); 
            
            // //SELECT para buscar información de pago por PagoMovil de la tienda
            // $PagoMovil = $this->ConsultaCarrito_M->consultarPagoMovil($ID_Mayorista); 
            
            // //SELECT para buscar información de pago por Reserve de la tienda
            // $Reserve = $this->ConsultaCarrito_M->consultarReserve($ID_Mayorista); 
            
            // //SELECT para buscar información de pago por Paypal de la tienda
            // $Paypal = $this->ConsultaCarrito_M->consultarPaypal($ID_Mayorista); 
            
            // //SELECT para buscar información de pago por Zelle de la tienda
            // $Zelle = $this->ConsultaCarrito_M->consultarZelle($ID_Mayorista); 
            
            // //SELECT para buscar información de otros metodos de pago de la tienda
            // $OtrosPagos = $this->ConsultaCarrito_M->consultarOtrosPagos($ID_Mayorista); 
            
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
                // 'Banco' => $Banco, //bancoNombre, bancoCuenta, bancoTitular, bancoRif
                // 'Pagomovil' => $PagoMovil, //cedula_pagomovil, banco_pagomovil, telefono_pagomovil               
                // 'Reserve' => $Reserve,//usuarioReserve
                // 'Paypal' => $Paypal,//correo_paypal
                // 'Zelle' => $Zelle,//correo_zelle
                // 'OtrosPagos' => $OtrosPagos, //efectivoBolivar, efectivoDolar, acordado
                // 'ID_Mayorista' => $ID_Mayorista,
                // 'TelefonoTienda' => $ContactoTienda, //telefono_AfiCom
                'Delivery' => $CostoDelivery,
                'DolarHoy' => $DolarHoy          
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";          
            // exit();
            
            $verifica_2 = 1906;  
            $_SESSION['verifica_2'] = $verifica_2; 
            //Se crea esta sesion para impedir que se acceda a la pagina que procesa el formulario (RecibePedido_V.php) o se recargue mandandolo varias veces a la base de datos
            
            $this->vista("view/carritoMayorista_V", $Datos);
        }        
        
        public function informacionMinorista($CodigoDespacho){
            //Se CONSULTA si el minorista esta suscrito
            $Minorista = $this->ConsultaCarritoVitrina_M->consultarMinorista($CodigoDespacho);

            // echo "<pre>";
            // print_r($Minorista);
            // echo "</pre>";          
            // exit();

            if($Minorista == Array ()){
                echo 'Minorista no registrado';
            }
            else{
                //Se separa cada variable pooque llegara a Javascript como una cadena de texto, luego se convertira en un array utilizando las , como caracter separador 
                echo $Minorista[0]['nombre_AfiMin'] . ',' . $Minorista[0]['rif_AfiMin'] . ',' .  $Minorista[0]['telefono_AfiMin'] . ',' .$Minorista[0]['correo_AfiMin'] . ',' . $Minorista[0]['zona_AfiVen'] . ',' . $Minorista[0]['codigo_AfiMin'] . ',' . $Minorista[0]['direccion_AfiMin'];
            }
        }
    }
<?php
    //Archivo llamado desde A_Vitrina.js por medio de llamar_PedidoEnCarrito()

    class Carrito_C extends Controlador{

        public function __construct(){
            session_start();  
            
            $this->ConsultaCarrito_M = $this->modelo("Carrito_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
    
        public function index($ID_Tienda){  
            //SELECT para buscar información del responsable de la tienda
            $ContactoTienda = $this->ConsultaCarrito_M->consultarResponsableTienda($ID_Tienda);

            //SELECT para buscar información de pago por transferencia de la tienda
            $Banco = $this->ConsultaCarrito_M->consultarCtaBanco($ID_Tienda); 
            
            //SELECT para buscar información de pago por PagoMovil de la tienda
            $PagoMovil = $this->ConsultaCarrito_M->consultarPagoMovil($ID_Tienda); 
            
            //SELECT para buscar información de pago por Reserve de la tienda
            $Reserve = $this->ConsultaCarrito_M->consultarReserve($ID_Tienda); 
            
            //SELECT para buscar información de pago por Paypal de la tienda
            $Paypal = $this->ConsultaCarrito_M->consultarPaypal($ID_Tienda); 
            
            //SELECT para buscar información de pago por Zelle de la tienda
            $Zelle = $this->ConsultaCarrito_M->consultarZelle($ID_Tienda); 
            
            //SELECT para buscar información de otros metodos de pago de la tienda
            $OtrosPagos = $this->ConsultaCarrito_M->consultarOtrosPagos($ID_Tienda); 
            
            //Solicita el precio del dolar
            require(RUTA_APP . "/controladores/Menu_C.php");
            $this->PrecioDolar = new Menu_C();

            // echo '<pre>';
            // print_r($this->PrecioDolar);
            // echo '</pre>';

            $DolarHoy = $this->PrecioDolar->Dolar;

            //El delivery cuesta 1,3 dolares, se entrega un numero entero
            $CostoDelivery = intval(1.30 * $DolarHoy);

            $Datos = [
                'Banco' => $Banco, //bancoNombre, bancoCuenta, bancoTitular, bancoRif
                'Pagomovil' => $PagoMovil, //cedula_pagomovil, banco_pagomovil, telefono_pagomovil               
                'Reserve' => $Reserve,//usuarioReserve
                'Paypal' => $Paypal,//correo_paypal
                'Zelle' => $Zelle,//correo_zelle
                'OtrosPagos' => $OtrosPagos, //efectivoBolivar, efectivoDolar, acordado
                'ID_Tienda' => $ID_Tienda,
                'TelefonoTienda' => $ContactoTienda, //telefono_AfiCom
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
            
            $this->vista("view/carrito_V", $Datos);
        }        
        
        public function UsuarioRegistrado($Cedula){
            //Se CONSULTA si el usuario esta suscrito
            $Usuario = $this->ConsultaCarrito_M->consultarUsuario($Cedula);

            if($Usuario == Array ()){
                echo 'Usuario no registrado';
            }
            else{
                //Se separa cada variable pooque llegara a Javascript como una cadena de texto, luego se convertira en un array utilizando las , como caracter separador 
                echo $Usuario[0]['nombre_usu'] . ',' . $Usuario[0]['apellido_usu'] . ',' .  $Usuario[0]['cedula_usu'] . ',' .$Usuario[0]['telefono_usu'] . ',' . $Usuario[0]['correo_usu'] . ',' . $Usuario[0]['estado_usu'] . ',' . $Usuario[0]['ciudad_usu'] . ',' . $Usuario[0]['direccion_usu'] . ',' . $Usuario[0]['ID_Usuario'];
            }
        }
    }
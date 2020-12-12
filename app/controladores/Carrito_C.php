<?php
    //Archivo llamado desde A_Vitrina.js por medio de llamar_PedidoEnCarrito()
    class Carrito_C extends Controlador{

        public function __construct(){
            session_start();  
            
            $this->ConsultaCarrito_M = $this->modelo("Carrito_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
    
        //Invocado desde A_Vitrina.js
        public function index($ID_Tienda){  
            //SELECT para buscar información de cuentas bancarias de la tienda
            $Banco = $this->ConsultaCarrito_M->consultarCtaBanco($ID_Tienda); 
            
            //SELECT para buscar información de cuentas bancarias de la tienda
            $PagoMovil = $this->ConsultaCarrito_M->consultarPagoMovil($ID_Tienda); 
            
            $Datos = [
                'Banco' => $Banco, //bancoNombre, bancoCuenta, bancoTitular, bancoRif
                'Pagomovil' => $PagoMovil, //cedula_pagomovil, banco_pagomovil, telefono_pagomovil
                'ID_Tienda' => $ID_Tienda                
            ];
            
            $verifica_2 = 1906;  
            $_SESSION['verifica_2'] = $verifica_2; 
            //Se crea esta sesion para impedir que se acceda a la pagina que procesa el formulario (RecibePedido_V.php) o se recargue mandandolo varias veces a la base de datos
            
            $this->vista("paginas/carrito_V", $Datos);
        }        
    }
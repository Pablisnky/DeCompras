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
            // echo "<pre>";
            // print_r($Banco);
            // echo "</pre>";            
            // exit();

            $Datos = [
                'Banco' => $Banco, //bancoNombre, bancoCuenta, bancoTitular, bancoRif
                'ID_Tienda' => $ID_Tienda                
            ];
            
            $this->vista("paginas/carrito_V", $Datos);
        }        
    }
?>    
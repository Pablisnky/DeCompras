<?php
    class Ciudades_C extends Controlador{

        public function __construct(){
            session_start();
            
            $this->ConsultaCiudades_M = $this->modelo("Ciudades_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){
            //Se CONSULTAN todos los estados en los cuales existen tiendas disponibles para mostrar a usuarios
            $EstadosTiendas = $this->ConsultaCiudades_M->consultarEstadosTiendas();

            //Se CONSULTAN todas las ciudades en las cuales existen tiendas
            $CiudadesTiendas = $this->ConsultaCiudades_M->consultarCiudadesTiendas();
            
            $Datos = [
                'estados' => $EstadosTiendas, //estado_Tien
                'ciudades' => $CiudadesTiendas, //parroquia_Tien, estado_Tien
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista("header/header"); 
            $this->vista("view/ciudades_V", $Datos); 
        }
    }
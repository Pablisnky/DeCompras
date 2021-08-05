<?php
    class Buscador_C extends Controlador{
        
        public function __construct(){
            $this->ConsultaBuscador_M = $this->modelo("Buscador_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index($Buscar){
            //CONSULTA las tiendas donde exista el producto solicitado por el usuario mediante el input buscador en inicio_V.php
            $Datos = $this->ConsultaBuscador_M->consultarBusquedaTienda($Buscar);
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("view/ajax/buscador_V", $Datos);
        } 
    }
?>
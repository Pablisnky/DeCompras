<?php
    class Buscador_C extends Controlador{
        public function __construct(){
            $this->ConsultaBuscador_M = $this->modelo("Buscador_M");
        }
        
        public function index($Buscar){
            //CONSULTA las tiendas donde exista el producto solicitado por el usuario mediante el input buscador en inicio_V.php
            $Datos = $this->ConsultaBuscador_M->consultarBusquedaTienda($Buscar);
            
            $this->vista("paginas/buscador_V", $Datos);
        } 
    }
?>    
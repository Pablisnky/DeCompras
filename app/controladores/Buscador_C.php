<?php
    class Buscador_C extends Controlador{
        public function __construct(){
            $this->ConsultaBuscador_M = $this->modelo("Buscador_M");
        }
        
        public function index(){
            $this->vista("paginas/Buscador_V");
        }

        public function buscarPedido($Buscar){
            //CONSULTA las tiendas donde exista el producto solicitado por el usuario mediante el input buscador en inicio_V.php
            $Consulta = $this->ConsultaBuscador_M->consultarBusquedaTienda($Buscar);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            //         exit();
            $this->vista("paginas/buscador_V", $Datos);
        } 
    }
?>    
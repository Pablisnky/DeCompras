<?php
    class Buscador_C extends Controlador{
        public function __construct(){
            $this->ConsultaBuscador_M = $this->modelo("Buscador_M");
        }
        
        public function index(){
            $this->vista("paginas/Buscador_V");
        }

        public function buscarPedido($Buscar){
            //CONSULTA el pedido solicitado por el usuario mediante el input buscador en Buscador_V.php
            $Consulta = $this->ConsultaBuscador_M->consultarBusquedaTienda($Buscar);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $this->vista("paginas/buscador_V", $Datos);
        }
        
        public function buscarProducto($Buscar){
            //CONSULTA el producto solicitado por el usuario mediante el input buscador en cuenta_publicar_V.php
            // $Consulta = $this->ConsultaBuscador_M->consultarBusquedaProducto($Buscar);
            // $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            echo $Buscar;
            // $this->vista("paginas/cuenta_pblicar_V", $Datos);
        }
    }
?>    
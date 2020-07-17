<?php
    class Vitrina_C extends Controlador{

        public function __construct(){
            $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");
        }
        
        public function index(){
            $this->vista("paginas/vitrina_V");
        }
        
        public function Delivery(){
            //Se CONSULTAN los Licores y comidas de restaurant
            $Consulta = $this->ConsultaVitrina_M->consultarDelivery();
            $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);

            $this->vista("paginas/vitrina_V",  $Datos);
        }

        public function Ropa(){
            //Se CONSULTAN los Licores y comidas de restaurant
            $Consulta = $this->ConsultaVitrina_M->consultarRopa();
            $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);

            $this->vista("paginas/vitrina_V", $Datos);
        }

        public function Bar(){
            //Se CONSULTAN los Licores y comidas de restaurant
            $Consulta = $this->ConsultaVitrina_M->consultarLicoresRest();
            $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);

            $this->vista("paginas/vitrina_V", $Datos);
        }

        public function Alimentos(){
            //Se CONSULTAN los alimentos
            $Consulta = $this->ConsultaVitrina_M->consultarAlimentos();
            $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);
            
            $this->vista("paginas/vitrina_V", $Datos);
        }

        public function Productos(){
            //Se CONSULTAN los productos
            $Consulta = $this->ConsultaVitrina_M->consultarProductos();
            $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);
            
            $this->vista("paginas/vitrina_V", $Datos);
        }

        public function Maquinas(){
            //Se CONSULTAN las máquinas
            $Consulta = $this->ConsultaVitrina_M->consultarMaquinas();
            $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);

            $this->vista("paginas/vitrina_V", $Datos);
        }
    }
?>    
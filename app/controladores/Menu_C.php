<?php
    class Menu_C extends Controlador{

        public function __construct(){
            // $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){
            $this->vista("paginas/afiliacion_V");
        }

        public function afiliacion($Datos){
            $this->vista("paginas/afiliacion_V", $Datos);
        }

        public function instruccion(){
            $this->vista("paginas/instrucion_V");
        }

        public function ciudad($Datos){
            $this->vista("paginas/ciudad_V", $Datos);
        }

        public function PWA(){
            $this->vista("inc/header_Modal");
            $this->vista("paginas/pwa_V");
        }
        
        public function nuestroADN(){
            $this->vista("inc/header_Modal");
            $this->vista("paginas/quienesSomos_V");
        }
    }
?>    
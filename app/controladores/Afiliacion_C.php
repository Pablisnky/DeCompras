<?php
//Archivo llamado desde 

    class Afiliacion_C extends Controlador{

        public function __construct(){
            // $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");
        }
        
        public function index(){
            $this->vista("paginas/afiliacion_V");
        }

        public function registroAfiliacion(){
            $this->vista("paginas/registro_V");
        }

        public function PWA(){
            $this->vista("paginas/pwa_V");
        }
    }
?>    
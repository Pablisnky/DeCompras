<?php
//Archivo llamado desde 

    class Menu_C extends Controlador{

        public function __construct(){
            // $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");
        }
        
        public function index(){
            $this->vista("paginas/afiliacion_V");
        }

        public function afiliacion(){
            $this->vista("paginas/afiliacion_V");
        }

        public function instruccion(){
            $this->vista("paginas/instrucion_V");
        }

        public function ciudad(){
            $this->vista("paginas/ciudad_V");
        }
    }
?>    
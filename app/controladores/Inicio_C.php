<?php
    class Inicio_C extends Controlador{
        public function __construct(){
        }
        
        public function index(){
            $this->vista("paginas/inicio_V");
        }
    }
?>    
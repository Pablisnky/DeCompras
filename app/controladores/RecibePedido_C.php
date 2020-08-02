<?php
//Archivo llamado desde 

    class RecibePedido_C extends Controlador{

        public function __construct(){
            // $this->ConsultaRecibePedido_M = $this->modelo("RecibePedido_M");
        }
        
        public function index(){

            $this->vista("paginas/RecibePedido_V");
        }
    }
?>    
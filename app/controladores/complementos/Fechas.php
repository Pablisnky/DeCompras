<?php
    class Fechas{

        public $FechaDotacion;
        public $fechaReposicion;
        
        public function __construct(){
            $this->FechaDotacion = date('d-m-Y');

            //Se suman siete dias a la fecha actual
            $this->fechaReposicion = date('d-m-Y', strtotime($this->FechaDotacion.'+ 7 days'));
        }
    }
?>
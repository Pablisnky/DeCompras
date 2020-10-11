<?php
    class Inicio_C extends Controlador{

        public function __construct(){
            $this->ConsultaInicio_M = $this->modelo("Inicio_M");
        }
        
        public function index(){
            //Se CONSULTA la cantidad de tiendas que estan afiliadas por categorias
            $Datos = $this->ConsultaInicio_M->consultarCantidadTiendas();

            $this->vista("paginas/inicio_V", $Datos);
        }
    }
?>    
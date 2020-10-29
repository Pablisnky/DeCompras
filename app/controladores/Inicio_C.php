<?php
    class Inicio_C extends Controlador{

        public function __construct(){
            $this->ConsultaInicio_M = $this->modelo("Inicio_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){
            //Se CONSULTA la cantidad de tiendas que estan afiliadas por categorias
            $Datos = $this->ConsultaInicio_M->consultarCantidadTiendas();

            $this->vista("paginas/inicio_V", $Datos);
        }
    }
?>    
<?php
    class Afiliacion_C extends Controlador{

        public function __construct(){
            
            // $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){
            $this->vista("paginas/afiliacion_V");
        }
    }
?>    
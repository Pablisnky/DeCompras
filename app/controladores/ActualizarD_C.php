<?php
    class ActualizarD_C extends Controlador{

        public $Dolar;

        public function __construct(){
            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){     
            $DolarHoy = json_decode(file_get_contents('https://s3.amazonaws.com/dolartoday/data.json'),true);
            // echo '<pre>';
            // print_r($DolarHoy);
            // echo '</pre>';
                
            $this->Dolar = $DolarHoy['USD']['promedio_real'];           
        }
    }
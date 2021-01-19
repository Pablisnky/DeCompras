<?php
    class CalculoDolar_C extends Controlador{

        public function __construct(){
            // $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function TasaCambio($Monto){
            //Dolar al dia de hoy
            $Dolar = 1174992;

            $PrecioEnDolar = $Dolar * $$Monto;

            $PrecioEnDolar = number_format($PrecioEnDolar, 0, '', '.');
            
            return $PrecioEnDolar;
        }
    }
?>
<?php
    class CambioDolar_C extends Controlador{

        public $PrecioDolar;
        public $Reserve;
        public $TasaReserve;

        public function __construct(){
            $this->ConsultaCambioDolar_M = $this->complementos("CambioDolar_M");

                        
            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function AjusteCambioMonetario($ValorDolar, $Reserve){
            $this->PrecioDolar = $ValorDolar;
            $this->Reserve = $Reserve;
            // echo $this->PrecioDolar . '<br>';
            // echo $this->Reserve . '<br>';

            // Se calcula la tasa 'Reserve' para comprar dolares
            // $this->TasaReserve = $this->Reserve - $this->PrecioDolar;
            // echo $this->TasaReserve;
            // exit;
            
            //Se consultan los precios en dolares.
            $Precios = $this->ConsultaCambioDolar_M->ConsultaPrecios();
            // echo '<pre>';
            // print_r($Precios);
            // echo '</pre>';
            // exit;

            //Se declara un array donde se almacenaran los precios actualizados de cada producto
            $NuevoPrecioBolivar = [];
            $Intermedio = [];

            foreach($Precios as $Key):
                $ID_Opcion = $Key['ID_Opcion'];
                // $PrecioActualBs = ($Key['precioDolar'] * $this->PrecioDolar) + $this->TasaReserve;
                $PrecioActualBs = ($Key['precioDolar'] * $this->PrecioDolar);

                $Intermedio = ['ID_Opcion' => $ID_Opcion, 'precioActualizadoBs' => $PrecioActualBs];
                array_push($NuevoPrecioBolivar, $Intermedio);
            endforeach;
            
            // echo '<pre>';
            // print_r($NuevoPrecioBolivar);
            // echo '</pre>';
            // exit;

            //Se actualizan los precios de los productos existente en BD
            $this->ConsultaCambioDolar_M->ActualizarPrecio($NuevoPrecioBolivar);
        }
    }
?>
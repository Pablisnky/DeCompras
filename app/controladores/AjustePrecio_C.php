<?php
    class AjustePrecio_C extends Controlador{
        
        public $Dolar;
        public $Reserve;

        public function __construct(){
            $this->AjustePrecio_M = $this->modelo("AjustePrecio_M");

            $this->Dolar = 4122223;
            $this->Reserve = 4160000;
            
            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){             
            $this->Dolar;
            $this->Reserve;
            echo $this->Dolar . '<br>';
            echo $this->Reserve . '<br>';
            // exit;

            // Se calcula la tasa 'Reserve' para comprar dolares
            // $this->TasaReserve = $this->Reserve - $this->Dolar;
            // echo $this->TasaReserve;
            // exit;
            
            //Se consultan los precios de los productos, en dolares.
            $Precios = $this->AjustePrecio_M->ConsultaPrecios();
            echo '<pre>';
            print_r($Precios);
            echo '</pre>';
            exit;

            //Se declara un array donde se almacenaran los precios actualizados de cada producto
            $NuevoPrecioBolivar = [];
            $Intermedio = [];

            foreach($Precios as $Key):
                $ID_Opcion = $Key['ID_Opcion'];
                // $PrecioActualBs = ($Key['precioDolar'] * $this->Dolar) + $this->TasaReserve;
                $PrecioActualBs = ($Key['precioDolar'] * $this->PrecioDolar);

                $Intermedio = [
                    'ID_Opcion' => $ID_Opcion, 
                    'precioActualizadoBs' => $PrecioActualBs
                ];

                array_push($AjustePorAumentoDolar, $Intermedio);
            endforeach;
            
            // echo '<pre>';
            // print_r($NuevoPrecioBolivar);
            // echo '</pre>';
            // exit;

            //se ajusta el precio base para cuando se realice la reposición, este ajuste esta dado en 0,6% diario 
            //a partir de la fecha de la ultima reposición de cada producto, se hara un ajuste diario
            $this->AjustePrecio_M->ConsultarFechaSuministro();






           

            //Se actualizan los precios de los productos existente en BD
            $this->AjustePrecio_M->ActualizarPrecio($NuevoPrecioBolivar);
            
            echo 'Perfecto, Dolar y tasa "Reserve" actualizado' . '<br>';
            echo "<a href='javascript: history.go(-1)'>Regresar</a>";
        }

        public function afiliacion(){

            $PlanEmprendedorBs = 2;
            $PlanBasicoBs = 5;
            $PlanMedioBs = 8;
            $PlanMaximoBs = 13;
            $PlanFullBs = 20;

            $PlanEmprendedor = $this->Dolar * $PlanEmprendedorBs;
            $PlanBasico = $this->Dolar * $PlanBasicoBs;
            $PlanMedio = $this->Dolar * $PlanMedioBs;
            $PlanMaximo = $this->Dolar * $PlanMaximoBs;
            $PlanFull = $this->Dolar * $PlanFullBs;

            $PlanEmprendedor = number_format($PlanEmprendedor, 0, '', '.');
            $PlanBasico = number_format($PlanBasico, 0, '', '.');
            $PlanMedio = number_format($PlanMedio, 0, '', '.');
            $PlanMaximo = number_format($PlanMaximo, 0, '', '.');
            $PlanFull = number_format($PlanFull, 0, '', '.');

            $Datos = [
                'emprendedor' => $PlanEmprendedor,
                'basico' => $PlanBasico,
                'medio' => $PlanMedio,
                'maximo' => $PlanMaximo,
                'full' => $PlanFull
            ];

            $this->vista("header/header");
            $this->vista("view/afiliacion_V", $Datos);
        }
    }
?>
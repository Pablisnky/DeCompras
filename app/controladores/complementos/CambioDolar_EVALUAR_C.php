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
            // echo 'Precio dolar BCV = ' . $this->PrecioDolar . '<br>';
            // echo 'Compra Reserve = ' .  $this->Reserve . '<br>';

            // Se calcula la tasa 'Reserve' para comprar dolares
            $this->TasaReserve = $this->Reserve - $this->PrecioDolar;
            // echo 'Tasa Reserve = ' .  $this->TasaReserve . '<br>';
            // exit;
            
            //Se consultan los precios en bolivares.
            $Precios = $this->ConsultaCambioDolar_M->ConsultaPrecios();
            // echo '<pre>';
            // print_r($Precios);
            // echo '</pre>';
            // exit;

            $PrecioBolsa_3kg = 32.197;

            //Se declara un array donde se almacenaran los precios actualizados de cada producto
            $NuevoPrecioBolivar = [];
            $Intermedio = [];

            foreach($Precios as $Key):
                $ID_Opcion = $Key['ID_Opcion'];

                // echo 'Precio mayorista = ' . round($Key['precioBolivar']) . '<br>';

                //Se incrementa 0,5% al precio del mayorista para proteger la inversión
                $PrecioReposicion = ($Key['precioBolivar'] * 0.5)/100 + $Key['precioBolivar'];
                // echo 'Precio reposicion = ' . round($PrecioReposicion) . '<br>';
                // exit;  round(1.95583, 2)
                
                //Se incrementa 5% al precio de reposicion, esto sera la utilidad
                $PrecioPedidoRemoto = ($PrecioReposicion * 5)/100 + $PrecioReposicion;
                // echo 'Precio PrecioPedidoRemoto = ' . round($PrecioPedidoRemoto) . '<br>';
                // exit;

                //Se incrementa la tasa por cambio a reserve
                $Precio_Reserve = $PrecioPedidoRemoto + $PrecioPedidoRemoto/$Key['precioBolivar'] * $this->TasaReserve; 
                // echo 'Precio_Reserve = ' . round($Precio_Reserve) . '<br>';
                // exit;

                //Se incrementa el costo de la bolsa de despacho
                $Precio_Final = $Precio_Reserve + $PrecioBolsa_3kg; 
                // echo 'Precio Final = ' . round($Precio_Final) . '<br>';
                // exit;

                $Intermedio = ['ID_Opcion' => $ID_Opcion, 'precioActualizadoBs' => $Precio_Final];
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
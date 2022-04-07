<?php
    class MontoAbonado_C extends Controlador{

        public function __construct(){
            $this->ConsultaMontoAbonado_M = $this->complementos("MontoAbonado_M");

                        
            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function facturasAbonadas($Ordenes){
            //Consulta las facturas que tienen pagos abonados
            $PedidosFacturadosAbonados = []; // Contienen solo ordenes abonadas
            $OrdeneseAbonadas = $this->ConsultaMontoAbonado_M->consultarOrdeneseAbonadas($Ordenes);

            if(!empty($OrdeneseAbonadas)){
                foreach($OrdeneseAbonadas as $Key)    :
                    $Nro_Orden_2 = $Key['numeroorden_May'];
                    array_push($PedidosFacturadosAbonados, $Nro_Orden_2);
                endforeach;

                return $PedidosFacturadosAbonados;
            }
        }
        
        public function OrdenesSinAbono($Ordenes){

            $FacturadosAbonados = $this->facturasAbonadas($Ordenes);

            if(!empty($FacturadosAbonados)){
                $OrdenesSinAbono = array_diff($Ordenes, $FacturadosAbonados);

                return $OrdenesSinAbono;
            }
        }
        
        public function DeudaEnFacturas($Facturas_Abonados){
            $FacturasConDeudas = [];
            $SaldoAbonado = $this->ConsultaMontoAbonado_M->consultarDeudasEnPedido_Ven($Facturas_Abonados);
            // echo 'SaldoAbonado';
            // echo '<pre>';
            // print_r($SaldoAbonado);
            // echo '</pre>';
            // exit;

            if(!empty($SaldoAbonado[0][0]['TotalAbonado']) != ''){
                //Se calcula cuanto es la deuda por pagar de cada pedido
                foreach($SaldoAbonado as $Key)    :
                    $Nro_Orden_3 = $Key[0]['numeroorden_May'];
                    $TotalAbonado = $Key[0]['TotalAbonado'];
                    $MontoTotal = $Key[0]['montoTotal'];

                    // se cambia el formato de los decimales, de coma a punto, para procesar la operacion ( a pesar que en MySQL estan en formato decimal  .)
                    $Total = str_replace(',', '.', $MontoTotal);
                    $Deuda = str_replace(',', '.', $TotalAbonado);

                    //Se calcula la deuda pendiente del pedido especifico
                    $Deuda = $Total - $TotalAbonado;

                    $OrdeneseAbonadas_3 = ['deuda' => $Deuda, 'numeroordenMay' => $Nro_Orden_3];
                    array_push($FacturasConDeudas, $OrdeneseAbonadas_3);
                endforeach;
            }

            return $FacturasConDeudas;
        }
    }
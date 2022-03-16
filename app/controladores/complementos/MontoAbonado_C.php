<?php
    class MontoAbonado_C extends Controlador{

        public function __construct(){
            $this->ConsultaMontoAbonado_M = $this->complementos("MontoAbonado_M");

                        
            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function saldopendiente($Nro_Orden){
            //CONSULTA el saldo abonado de un pedido especifico de un vendedor
            $PagoPedidoVen = $this->ConsultaMontoAbonado_M->consultarSaldoPedido_Ven($Nro_Orden);

            $Total = $PagoPedidoVen[0]['montoTotal'];
            $Abono = $PagoPedidoVen[0]['abono'];
            // se cambia el formato de los decimales, de coma a punto, para procesar la operacion  
            $Total = str_replace(',', '.', $Total);   
            $Abono = str_replace(',', '.', $Abono);  

            //Se calcula la deuda pendiente del pedido especifico
            $Deuda = $Total - $Abono;  
            
            // se cambia el formato de los decimales, de punto a coma, para mostrar en pantalla y guardar en BD  
            $Deuda = str_replace('.', ',', $Deuda); 
        }
    }
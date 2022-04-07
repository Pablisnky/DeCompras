<?php
    class MontoAbonado_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

        // CONSULTA CON UN POSIBLE ERROR - VERIFICAR QUE NRO_ORDEN NO EXITE
        //SELECT del saldo total abonado a un pedido
        public function consultarOrdeneseAbonadas($Ordenes){ 
            //Debido a que $Ordenes es un array con todas los Nro. de ordenes del vendedor especificado, deben consultarse uno a uno mediante un ciclo
            foreach($Ordenes as $key)  :
                $stmt = $this->dbh->prepare(
                    "SELECT DISTINCT numeroorden_May 
                    FROM pagosmayorista 
                    WHERE abono != '' " 
                );
                
                $stmt->bindParam(':NRO_ORDEN', $key, PDO::PARAM_INT);
            
                $stmt->execute();
                
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            endforeach;
        }        
        
        //SELECT del saldo total abonado por cada pedido
        public function consultarDeudasEnPedido_Ven($Ordenes){ 
            //Debido a que $Ordenes es un array con todas los Nro. de ordenes del vendedor especificado, deben consultarse uno a uno mediante un ciclo
            $AlmacenarOrdenes = [];
            if(!empty($Ordenes)){
                foreach($Ordenes as $key)  :
                    $stmt = $this->dbh->prepare(
                        "SELECT SUM(abono) AS TotalAbonado, pedidomayorista.numeroorden_May, montoTotal 
                        FROM pagosmayorista 
                        INNER JOIN pedidomayorista ON pagosmayorista.numeroorden_May=pedidomayorista.numeroorden_May 
                        WHERE pedidomayorista.numeroorden_May = :NRO_ORDEN"
                    );
                    
                    $stmt->bindParam(':NRO_ORDEN', $key, PDO::PARAM_INT);
                
                    $stmt->execute();

                array_push($AlmacenarOrdenes, $stmt->fetchAll(PDO::FETCH_ASSOC));
                endforeach;
                return $AlmacenarOrdenes;
            }
        }        
    }
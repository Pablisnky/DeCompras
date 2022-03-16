<?php
    class MontoAbonado_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

        //SELECT del saldo de pedido de un vendedor especifico
        public function consultarSaldoPedido_Ven($Nro_Orden){ 
            $stmt = $this->dbh->prepare(
                "SELECT montoTotal, abono
                FROM pagosmayorista 
                INNER JOIN pedidomayorista ON pagosmayorista.numeroorden_May=pedidomayorista.numeroorden_May 
                WHERE pagosmayorista.numeroorden_May = :NRO_ORDEN"
            );
            
            $stmt->bindParam(':NRO_ORDEN', $Nro_Orden, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }   
    }
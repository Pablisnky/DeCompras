<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Carrito_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function consultarPedido($PedidoCarrito){
            //SELECT con las opciones y el precio del pedido
            $stmt = $this->dbh->prepare("SELECT * FROM opciones WHERE ID_Opcion IN ($PedidoCarrito)");      
            // $stmt->bindParam(':ID_Opcion', $PedidoCarrito, PDO::PARAM_STR);
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        public function consultarMontoTotal($PedidoCarrito){
            //SELECT con el monto total del pedido
            $stmt = $this->dbh->prepare("SELECT SUM(precio) As total FROM opciones WHERE ID_Opcion IN ($PedidoCarrito)");    
            // $stmt->bindParam(':ID_Opcion', $PedidoCarrito, PDO::PARAM_STR);
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
    }
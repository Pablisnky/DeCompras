<?php
    // require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Carrito_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function consultarCtaBanco($ID_Tienda){
            //SELECT con las opciones y el precio del pedido
            $stmt = $this->dbh->prepare("SELECT bancoNombre, bancoCuenta, bancoTitular, bancoRif FROM bancos WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarPagoMovil($ID_Tienda){
            //SELECT con los datos para realizar PagoMovil
            $stmt = $this->dbh->prepare("SELECT cedula_pagomovil, banco_pagomovil, telefono_pagomovil FROM pagomovil WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<?php
    class Carrito_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        //SELECT con los datos de cuentas bancarias
        public function consultarCtaBanco($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT bancoNombre, bancoCuenta, bancoTitular, bancoRif FROM bancos WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    
        //SELECT de los datos para realizar PagoMovil
        public function consultarPagoMovil($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT cedula_pagomovil, banco_pagomovil, telefono_pagomovil FROM pagomovil WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 

        //SELECT de los datos para realizar pagos con otros metodos
        public function consultarOtrosPagos($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT efectivoBolivar, efectivoDolar, acordado FROM otrospagos WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
       
        //SELECT de los datos para contactar con la tienda
        public function consultarResponsableTienda($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT telefono_AfiCom 
                 FROM afiliado_com  
                 INNER JOIN tiendas ON afiliado_com.ID_AfiliadoCom=tiendas.ID_AfiliadoCom
                 WHERE ID_Tienda = :ID_TIENDA"
            );

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    }
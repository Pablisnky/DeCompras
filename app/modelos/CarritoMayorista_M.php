<?php
    class CarritoMayorista_M extends Conexion_BD{

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
            $stmt = $this->dbh->prepare(
                "SELECT cedula_pagomovil, banco_pagomovil, telefono_pagomovil 
                 FROM pagomovil 
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
    
        //SELECT de los datos para realizar pago via Reserve
        public function consultarReserve($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT usuarioReserve
                 FROM pago_reserve 
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
    
        //SELECT de los datos para realizar pago via Paypal
        public function consultarPaypal($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT correo_paypal
                 FROM pago_paypal 
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
    
        //SELECT de los datos para realizar pago via Zelle
        public function consultarZelle($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT correo_zelle
                 FROM pago_zelle 
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
       
        //SELECT de los datos de un miorista
        public function consultarMinorista($CodigoDespacho){
            $stmt = $this->dbh->prepare(
                "SELECT ID_AfiliadoMin, nombre_AfiMin, rif_AfiMin, telefono_AfiMin, correo_AfiMin, zona_AfiMin, codigodespacho, direccion_AfiMin
                 FROM minorista  
                 WHERE codigodespacho = :CODIGODESPACHO"
            );

            $stmt->bindParam(':CODIGODESPACHO', $CodigoDespacho, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de los mioristas asignados a un vnededor
        public function consultarMinoristasVen($CodigoVenta){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_AfiMin, rif_AfiMin, codigodespacho
                 FROM minorista 
                 INNER JOIN afiliado_ven ON afiliado_ven.ID_AfiliadoVen=minorista.ID_Vendedor
                 WHERE codigoVenta_AfiVen = :CODIGOVENTA"
            );

            $stmt->bindParam(':CODIGOVENTA', $CodigoVenta, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    }
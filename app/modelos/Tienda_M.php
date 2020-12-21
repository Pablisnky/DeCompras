<?php
    // require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Tienda_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function consultarTiendas($Categoria){
            //Se CONSULTAN las tiendas afiliadas en una categoria especifica
            $stmt = $this->dbh->prepare("SELECT tiendas.ID_Tienda, nombre_Tien, direccion_Tien, telefono_Tien, fotografia_Tien, categorias.categoria FROM tiendas INNER JOIN tiendas_categorias ON tiendas.ID_Tienda=tiendas_categorias.ID_Tienda INNER JOIN categorias ON categorias.ID_Categoria=tiendas_categorias.ID_Categoria WHERE categorias.categoria = :CATEGORIA AND publicar = :PUBLICAR ORDER BY nombre_Tien");      
            
            $stmt->bindValue(':CATEGORIA', $Categoria, PDO::PARAM_STR);
            $stmt->bindValue(':PUBLICAR', 1, PDO::PARAM_INT);
                        
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        // SELECT con las tiendas que aceptan pagos por transferencia
        public function consultarTransferencias($IDs_Tiendas){
            $stmt = $this->dbh->prepare("SELECT DISTINCT ID_Tienda FROM bancos WHERE ID_Tienda IN ($IDs_Tiendas)");    
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        // SELECT con las tiendas que aceptan pagos por PagoMovil
        public function consultarPagoMovil($IDs_Tiendas){
            $stmt = $this->dbh->prepare("SELECT DISTINCT ID_Tienda FROM pagomovil WHERE ID_Tienda IN ($IDs_Tiendas)");    
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
        
        // SELECT con las tiendas que aceptan otros medios de pago
        public function consultarPagoBolivar($IDs_Tiendas){
            $stmt = $this->dbh->prepare("SELECT DISTINCT ID_Tienda, efectivoBolivar, efectivoDolar, acordado FROM otrospagos WHERE ID_Tienda IN ($IDs_Tiendas)");    
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        } 
    }
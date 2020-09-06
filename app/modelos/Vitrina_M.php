<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Vitrina_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

        //SELECT de las secciones de la tienda seleccionada
        public function consultarSecciones($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT seccion FROM secciones WHERE ID_Tienda = :Tienda");  
            $stmt->bindParam(':Tienda', $ID_Tienda, PDO::PARAM_INT);             
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
        
        //SELECT de los productos de la tienda seleccionada
        public function consultarProductos($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT * FROM productos INNER JOIN tiendas_productos ON productos.ID_Producto=tiendas_productos.ID_Producto WHERE tiendas_productos.ID_Tienda = :Tienda");  
            $stmt->bindParam(':Tienda', $ID_Tienda, PDO::PARAM_INT);             
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        public function consultarNombreTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT nombre_Tien FROM tiendas WHERE ID_Tienda = :Tienda");  
            $stmt->bindParam(':Tienda', $ID_Tienda, PDO::PARAM_INT);       
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
    }
<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Opciones_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function consultarOpciones($ID_Tienda, $Producto){
            $stmt = $this->dbh->prepare("SELECT * FROM opciones INNER JOIN productos_opciones ON opciones.ID_Opcion=productos_opciones.ID_Opcion INNER JOIN tiendas_productos ON tiendas_productos.ID_Producto=productos_opciones.ID_Producto INNER JOIN productos ON tiendas_productos.ID_Producto=productos.ID_Producto WHERE tiendas_productos.ID_Tienda = '$ID_Tienda' AND productos.producto = '$Producto'");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        // public function consultarOpcionesDelivery($Departamento, $ID_Producto){
        //     $stmt = $this->dbh->prepare("SELECT * FROM delivery INNER JOIN descripcion_delivery ON delivery.ID_Producto=descripcion_delivery.ID_Producto WHERE ID_Tienda = $Departamento AND delivery.ID_Producto = $ID_Producto");      
        //     if($stmt->execute()){
        //         return $stmt;
        //     }
        //     else{
        //         return false;
        //     }
        // }
    }
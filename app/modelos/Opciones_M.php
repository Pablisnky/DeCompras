<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Opciones_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function consultarOpciones($ID_Departamento, $NombreProducto){
            $stmt = $this->dbh->prepare("SELECT * FROM opciones INNER JOIN secciones ON opciones.ID_Seccion=secciones.ID_Seccion WHERE opciones.ID_Departamento = '$ID_Departamento' AND seccion = '$NombreProducto'");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        // public function consultarOpcionesDelivery($Departamento, $ID_Producto){
        //     $stmt = $this->dbh->prepare("SELECT * FROM delivery INNER JOIN descripcion_delivery ON delivery.ID_Producto=descripcion_delivery.ID_Producto WHERE ID_Departamento = $Departamento AND delivery.ID_Producto = $ID_Producto");      
        //     if($stmt->execute()){
        //         return $stmt;
        //     }
        //     else{
        //         return false;
        //     }
        // }
    }
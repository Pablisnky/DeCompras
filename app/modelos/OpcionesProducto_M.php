<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class OpcionesProducto_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function consultarOpciones($Departamento, $ID_Producto){
            $stmt = $this->dbh->prepare("SELECT * FROM ropa INNER JOIN descripcion_ropa ON ropa.ID_Producto=descripcion_ropa.ID_Producto WHERE ID_Departamento = $Departamento AND ropa.ID_Producto = $ID_Producto");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

    }
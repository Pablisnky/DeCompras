<?php
    // require(RUTA_APP . "/clases/Conexion_BD.php");

    class Entrada_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarProductosTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT * FROM tiendas_productos INNER JOIN productos ON tiendas_productos.ID_Producto=productos.ID_Producto INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion WHERE tiendas_productos.ID_Tienda = '$ID_Tienda'");
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }
    }
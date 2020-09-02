<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Opciones_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        //SELECT de las opciones que tiene un producto de una tienda
        public function consultarOpciones($ID_Tienda, $Producto){
            $stmt = $this->dbh->prepare("SELECT seccion, opciones.ID_Opcion, productos.producto, opcion, precio FROM opciones INNER JOIN productos_opciones ON opciones.ID_Opcion=productos_opciones.ID_Opcion INNER JOIN productos ON productos_opciones.ID_Producto=productos.ID_Producto INNER JOIN secciones_productos ON productos.ID_Producto=secciones_productos.ID_Producto INNER JOIN secciones ON secciones_productos.ID_Seccion=secciones.ID_Seccion INNER JOIN tiendas_secciones ON secciones.ID_Seccion=tiendas_secciones.ID_Seccion INNER JOIN tiendas ON tiendas_secciones.ID_Tienda=tiendas.ID_Tienda WHERE tiendas.ID_Tienda = :ID_TIENDA AND secciones.seccion = :SECCION");      

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            $stmt->bindParam(':SECCION', $Producto, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
    }
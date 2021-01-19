<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Opciones_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        //SELECT de las opciones que tiene un producto de una tienda
        public function consultarOpciones($ID_Tienda, $Seccion){
            $stmt = $this->dbh->prepare("SELECT tiendas.nombre_Tien, tiendas.slogan_Tien, seccion, productos.ID_Producto, opciones.ID_Opcion, opciones.fotografia, productos.producto, opcion, especificacion, precioBolivar, precioDolar FROM opciones INNER JOIN productos_opciones ON opciones.ID_Opcion=productos_opciones.ID_Opcion INNER JOIN productos ON productos_opciones.ID_Producto=productos.ID_Producto INNER JOIN secciones_productos ON productos.ID_Producto=secciones_productos.ID_Producto INNER JOIN secciones ON secciones_productos.ID_Seccion=secciones.ID_Seccion INNER JOIN tiendas_secciones ON secciones.ID_Seccion=tiendas_secciones.ID_Seccion INNER JOIN tiendas ON tiendas_secciones.ID_Tienda=tiendas.ID_Tienda WHERE tiendas.ID_Tienda = :ID_TIENDA AND secciones.seccion = :SECCION ORDER BY opciones.opcion");      

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            $stmt->bindParam(':SECCION', $Seccion, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de las caracteristicas de los productos de una tienda
        public function consultarCaracterisicasProducto($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT ID_Producto, caracteristica FROM caracteristicaproducto WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
        
        //SELECT de las caracteristicas de un producto especifico
        public function consultarCaracterisicaProductoEsp($ID_Producto){
            $stmt = $this->dbh->prepare("SELECT ID_Producto, caracteristica FROM caracteristicaproducto WHERE ID_Producto = :ID_PRODUCTO");

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de las caracteristicas de los productos de una tienda
        public function consultarImagenesProducto($ID_Producto){
            $stmt = $this->dbh->prepare("SELECT nombre_img FROM imagenes WHERE ID_Producto = :ID_PRODUCTO");

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de slogan de la tienda
        public function consultarSloganTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT slogan_Tien FROM tiendas WHERE ID_Tienda = :ID_Tienda");

            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }
    }
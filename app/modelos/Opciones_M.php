<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Opciones_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        //SELECT de los productos de una sección en una tienda especifica
        public function consultarOpciones($ID_Tienda, $ID_Seccion){
            $stmt = $this->dbh->prepare(
                "SELECT tiendas.nombre_Tien, tiendas.slogan_Tien, productos.ID_Producto, producto, opciones.ID_Opcion, opcion, opciones.precioBolivar, opciones.precioDolar, opciones.cantidad, secciones.seccion, imagenes.nombre_img 
                FROM tiendas 
                INNER JOIN tiendas_secciones ON tiendas.ID_Tienda =tiendas_secciones.ID_Tienda 
                INNER JOIN secciones ON tiendas_secciones.ID_Seccion=secciones.ID_Seccion 
                INNER JOIN secciones_productos ON secciones.ID_Seccion=secciones_productos.ID_Seccion 
                INNER JOIN productos ON secciones_productos.ID_Producto=productos.ID_Producto 
                INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto 
                INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion 
                INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto 
                WHERE tiendas_secciones.ID_Tienda = :ID_TIENDA AND secciones.ID_Seccion = :ID_SECCION AND imagenes.fotoPrincipal = :PRINCIPAL 
                ORDER BY secciones.seccion, productos.producto, opciones.opcion"
            );      
        
            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            $stmt->bindParam(':ID_SECCION', $ID_Seccion, PDO::PARAM_STR);
            $stmt->bindValue(':PRINCIPAL', 1, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
                
        //SELECT de las fotografias principales de los productos de una tienda
        public function consultarFotografiaPrincipal($ID_Tienda, $ID_Seccion){
            $stmt = $this->dbh->prepare("SELECT imagenes.ID_Producto, nombre_img FROM imagenes INNER JOIN secciones_productos ON imagenes.ID_Producto=secciones_productos.ID_Producto INNER JOIN secciones ON secciones_productos.ID_Seccion=secciones.ID_Seccion WHERE secciones.ID_Tienda = :ID_TIENDA AND secciones.ID_Seccion = :ID_SECCION AND fotoPrincipal = 1");     

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            $stmt->bindParam(':ID_SECCION', $ID_Seccion, PDO::PARAM_STR);

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
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

//     SELECT tiendas.nombre_Tien, tiendas.slogan_Tien, productos.ID_Producto, producto, opciones.ID_Opcion, opcion, opciones.precioBolivar, opciones.precioDolar, secciones.seccion, imagenes.nombre_img, fotoSeccion FROM tiendas 

// INNER JOIN tiendas_secciones ON tiendas.ID_Tienda =tiendas_secciones.ID_Tienda

// INNER JOIN secciones ON tiendas_secciones.ID_Seccion=secciones.ID_Seccion 

// INNER JOIN secciones_productos ON secciones.ID_Seccion=secciones_productos.ID_Seccion 

// INNER JOIN productos ON secciones_productos.ID_Producto=productos.ID_Producto 

// INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto 

// INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion 

// INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto 

// WHERE tiendas_secciones.ID_Tienda = 225 AND seccion = 'Bebidas sin alcohol' AND imagenes.fotoPrincipal = 1 ORDER BY secciones.seccion, productos.producto, opciones.opcion
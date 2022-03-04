<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Opciones_Mayorista_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        //SELECT de los productos de una sección de mayorista especifica
        public function consultarOpcionesMayorista($ID_Mayorista, $ID_Seccion){
            $stmt = $this->dbh->prepare(
                "SELECT nombreMay, productosmayorista.ID_ProductoMay, productosmayorista.productoMay, opcionesmayorista.ID_OpcionMay, opcionesmayorista.opcionMay, opcionesmayorista.precioBolivarMay, opcionesmayorista.precioDolarMay, opcionesmayorista.cantidadMay, opcionesmayorista.disponibleMay, seccionesmayorista.seccionMay, imagenesmayorista.nombre_imgMay 
                FROM mayorista  
                INNER JOIN mayorista_seccionesmayorista ON mayorista.ID_Mayorista =mayorista_seccionesmayorista.ID_Mayorista 
                INNER JOIN seccionesmayorista ON mayorista_seccionesmayorista.ID_SeccionMay=seccionesmayorista.ID_SeccionMay 
                INNER JOIN seccionesmayorista_productosmayorista ON seccionesmayorista.ID_SeccionMay=seccionesmayorista_productosmayorista.ID_SeccionMay 
                INNER JOIN productosmayorista ON seccionesmayorista_productosmayorista.ID_ProductoMay=productosmayorista.ID_ProductoMay
                INNER JOIN productosmayorista_opcionesmayorista ON productosmayorista.ID_ProductoMay=productosmayorista_opcionesmayorista.ID_ProductoMay
                INNER JOIN opcionesmayorista ON productosmayorista_opcionesmayorista.ID_OpcionMay=opcionesmayorista.ID_OpcionMay 
                INNER JOIN imagenesmayorista ON productosmayorista.ID_ProductoMay=imagenesmayorista.ID_ProductoMay
                WHERE mayorista.ID_Mayorista = :ID_MAYORISTA AND seccionesmayorista.ID_SeccionMay = :ID_SECCIONMAY AND imagenesmayorista.fotoPrincipalMay = :PRINCIPALMAY 
                ORDER BY seccionesmayorista.seccionMay, productosmayorista.productoMay, opcionesmayorista.opcionMay"
            );      
        
            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);
            $stmt->bindParam(':ID_SECCIONMAY', $ID_Seccion, PDO::PARAM_STR);
            $stmt->bindValue(':PRINCIPALMAY', 1, PDO::PARAM_INT);

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
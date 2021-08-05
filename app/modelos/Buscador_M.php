<?php
    class Buscador_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //SELECT de tiendas o de productos ofrecidos en tiendas
        public function consultarBusquedaTienda($Buscar){                                
            $stmt = $this->dbh->prepare(
                "SELECT productos.ID_Producto, producto, opcion, tiendas.nombre_Tien, tiendas.ID_Tienda, secciones.seccion, nombre_img 
                 FROM opciones 
                 INNER JOIN productos_opciones ON opciones.ID_Opcion=productos_opciones.ID_Opcion 
                 INNER JOIN productos ON productos_opciones.ID_Producto=productos.ID_Producto 
                 INNER JOIN secciones_productos ON productos.ID_Producto=secciones_productos.ID_Producto 
                 INNER JOIN secciones ON secciones_productos.ID_Seccion=secciones.ID_Seccion 
                 INNER JOIN tiendas_secciones ON secciones.ID_Seccion=tiendas_secciones.ID_Seccion 
                 INNER JOIN tiendas ON tiendas_secciones.ID_Tienda=tiendas.ID_Tienda 
                 INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto
                 WHERE producto LIKE '$Buscar%' OR opciones.opcion LIKE '$Buscar%' OR tiendas.nombre_Tien LIKE '$Buscar%' 
                 GROUP BY ID_Producto");

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    }
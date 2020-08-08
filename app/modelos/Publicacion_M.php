<?php
    // require(RUTA_APP . "/clases/Conexion_BD.php");

    class Publicacion_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
        //SELECT de los productos 
        public function consultarCategoriaProductos(){
            $stmt = $this->dbh->prepare("SELECT * FROM productos");
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de las opciones que tiene un producto especifico
        public function consultarOpcionesProductos($OpcionProd){
            $stmt = $this->dbh->prepare("SELECT opcion FROM opciones INNER JOIN productos_opciones ON opciones.ID_Opcion=productos_opciones.ID_Opcion INNER JOIN productos ON productos_opciones.ID_Producto=productos.ID_Producto WHERE producto = '$OpcionProd'");
            $stmt->execute();
            return $stmt;
        }

        //INSERT del producto en la BD
        public function insertarProducto($RecibeDatos){           
            $stmt = $this->dbh->prepare("INSERT INTO productos_opciones(ID_Producto, ID_Opcion, ID_Tienda, precio) VALUES (:ID_producto, :ID_opcion, :ID_tienda, :precio)");
            
            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':ID_producto', $id_producto);
            $stmt->bindParam(':ID_opcion', $id_opcion);
            $stmt->bindParam(':ID_tienda', $id_tienda);
            $stmt->bindParam(':precio', $precio);

            // insertar una fila
            $id_producto = $RecibeDatos['Categoria_pro'];
            $id_opcion = $RecibeDatos['Descripcion_pro'];
            $id_tienda = $RecibeDatos['ID_Tienda'];
            $precio = $RecibeDatos['Precio_pro'];
            
            //Se ejecuta la inserción de los datos en la tabla
            $stmt->execute();
        }
    }
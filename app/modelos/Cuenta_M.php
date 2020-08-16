<?php
    // require(RUTA_APP . "/clases/Conexion_BD.php");

    class Cuenta_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
        
        //SELECT de las categorias en las que una tienda se ha postulado
        public function consultarCatgorias(){
            $stmt = $this->dbh->prepare("SELECT categoria FROM categorias");

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de las categorias en las que una tienda se ha postulado
        public function consultarCategoriaProductos($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT categoria FROM categorias INNER JOIN tiendas_categorias ON categorias.ID_Categoria=tiendas_categorias.ID_Categoria WHERE tiendas_categorias.ID_Tienda = :ID_Tienda");
            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de los productos que tiene una tienda especifica
        public function consultarProductosTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT producto, opcion, precio FROM tiendas_productos INNER JOIN productos ON tiendas_productos.ID_Producto=productos.ID_Producto INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion WHERE tiendas_productos.ID_Tienda = :ID_Tienda");
            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

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

        //SELECT de datos del responsable de la tienda
        public function consultarResponsableTienda($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT nombre_AfiCom, apellido_AfiCom, cedula_AfiCom, telefono_AfiCom, correo_AfiCom FROM afiliado_com WHERE ID_AfiliadoCom = :ID_Afiliado");
            $stmt->bindValue(':ID_Afiliado', $ID_Afiliado, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de datos de la tienda
        public function consultarDatosTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT nombre_Tien, direccion_Tien, telefono_Tien, categoria_Tien FROM tiendas WHERE ID_Tienda = :ID_Tienda");
            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }
        
        //SELECT de datos de cuentas bancarias de la tienda
        public function consultarBancosTienda($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT bancoNombre, bancoCuenta, bancoTitular, bancoRif FROM bancos WHERE ID_Usuario = :ID_Afiliado");
            $stmt->bindValue(':ID_Afiliado', $ID_Afiliado, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }
    }
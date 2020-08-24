<?php
    // require(RUTA_APP . "/clases/Conexion_BD.php");

    class Cuenta_M extends Conexion_BD{

        public function __construct(){
            parent::__construct();
        }


        //SELECT de las categorias de tiendas que existen en la aplicación
        public function consultarCatgorias(){
            $stmt = $this->dbh->prepare("SELECT ID_Categoria, categoria FROM categorias");

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de las secciones que tiene una tiendao
        public function consultarSecciones($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT  seccion FROM secciones WHERE ID_Tienda = :ID_Tienda");
            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }
          //SELECT de secciones de la tienda
          public function consultarSeccionesTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT ID_Seccion, seccion FROM secciones WHERE ID_Tienda = :ID_Tienda");
            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }







        //SELECT de las categorias en las que una tienda se ha postulado
        public function consultarCategoriaTiendas($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT tiendas_categorias.ID_Categoria, categoria FROM categorias INNER JOIN tiendas_categorias ON categorias.ID_Categoria=tiendas_categorias.ID_Categoria WHERE tiendas_categorias.ID_Tienda = :ID_Tienda");
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
        // public function insertarProducto($RecibeDatos){
        //     $stmt = $this->dbh->prepare("INSERT INTO productos_opciones(ID_Producto, ID_Opcion, ID_Tienda, precio) VALUES (:ID_producto, :ID_opcion, :ID_tienda, :precio)");

        //     //Se vinculan los valores de las sentencias preparadas
        //     //ztmt es una abreviatura de statement
        //     $stmt->bindParam(':ID_producto', $id_producto);
        //     $stmt->bindParam(':ID_opcion', $id_opcion);
        //     $stmt->bindParam(':ID_tienda', $id_tienda);
        //     $stmt->bindParam(':precio', $precio);

        //     // insertar una fila
        //     $id_producto = $RecibeDatos['Categoria_pro'];
        //     $id_opcion = $RecibeDatos['Descripcion_pro'];
        //     $id_tienda = $RecibeDatos['ID_Tienda'];
        //     $precio = $RecibeDatos['Precio_pro'];

        //     //Se ejecuta la inserción de los datos en la tabla
        //     $stmt->execute();
        // }

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
            $stmt = $this->dbh->prepare("SELECT nombre_Tien, direccion_Tien, telefono_Tien , rif_Tien   FROM tiendas WHERE ID_Tienda = :ID_Tienda");
            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

      

        //DELETE de las categorias de una tienda
        public function eliminarCategoriaTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("DELETE FROM tiendas_categorias WHERE ID_Tienda = :ID_Tienda");
            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);
            $stmt->execute();          
        }

        
        //DELETE de las secciones de una tienda
        public function eliminarSeccionesTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("DELETE FROM secciones WHERE ID_Tienda = :ID_Tienda");
            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);
            $stmt->execute();          
        }
        //SELECT de datos de cuentas bancarias de la tienda
        public function consultarBancosTienda($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT ID_Banco, bancoNombre, bancoCuenta, bancoTitular, bancoRif FROM bancos WHERE ID_Usuario = :ID_Afiliado");
            $stmt->bindValue(':ID_Afiliado', $ID_Afiliado, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de las categorias en las que una tienda esta registrada
        public function consultarCategoriaTIenda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT categoria FROM categorias INNER JOIN tiendas_categorias ON categorias.ID_Categoria=tiendas_categorias.ID_Categoria WHERE ID_TIENDA = :ID_TIENDA");
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //UPDATE de los datos del afiliado
        public function actualizarAfiliadoComercial($ID_AfiliadoCom, $RecibeDatos){
            $stmt = $this->dbh->prepare("UPDATE afiliado_com SET nombre_AfiCom = :NOMBRE_AFI, apellido_AfiCom = :APELLIDO_AFI, cedula_AfiCom = :CEDULA_AFI, telefono_AfiCom = :TELEFONO_AFI, correo_AfiCom = :CORREO_AFI WHERE ID_AfiliadoCom = :AFILIADO");

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':NOMBRE_AFI', $RecibeDatos['Nombre_Afcom']);
            $stmt->bindValue(':APELLIDO_AFI', $RecibeDatos['Apellido_Afcom']);
            $stmt->bindValue(':CEDULA_AFI', $RecibeDatos['Cedula_Afcom']);
            $stmt->bindValue(':TELEFONO_AFI', $RecibeDatos['Telefono_Afcom']);
            $stmt->bindValue(':CORREO_AFI', $RecibeDatos['Correo_Afcom']);
            $stmt->bindValue(':AFILIADO', $ID_AfiliadoCom);

            //Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //UPDATE de los datos de LA TIENDA
        public function actualizarTienda($ID_AfiliadoCom, $RecibeDatos){
            $stmt = $this->dbh->prepare("UPDATE tiendas SET nombre_Tien = :NOMBRE_TIEN, direccion_Tien = :DIRECCION_TIEN, telefono_Tien = :TELEFONO_TIEN, rif_Tien = :RIF_TIEN WHERE ID_AfiliadoCom = :AFILIADO");

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':NOMBRE_TIEN', $RecibeDatos['Nombre_com']);
            $stmt->bindValue(':DIRECCION_TIEN', $RecibeDatos['Direccion_com']);
            $stmt->bindValue(':TELEFONO_TIEN', $RecibeDatos['Telefono_com']);
            $stmt->bindValue(':RIF_TIEN', $RecibeDatos['Rif_com']);
            $stmt->bindValue(':AFILIADO', $ID_AfiliadoCom);

            //Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function consultarID_Categoria($Categoria){
            $Elementos = count($Categoria);
            $Busqueda = "";
            //Se convierte el array en una cadena con sus elementos entre comillas
            for($i = 0; $i < $Elementos; $i++){
                $Busqueda .= " '" . $Categoria[$i] . "', ";
            }
            // Esto quita el ultimo espacio y coma del string generado con lo cual
            // el string queda 'id1','id2','id3'
            $Busqueda = substr($Busqueda,0,-2);

            $stmt = $this->dbh->prepare("SELECT ID_Categoria FROM categorias WHERE categoria IN ($Busqueda)");
            // $stmt->bindParam(':CATEGORIA', $Categoria, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt;
        }

        //UPDATE de los datos de las categorias en las que esta registrada una tienda
        // public function actualizarCategoriaTienda($ID_Tienda, $ID_Categoria){
        //     print_r($ID_Categoria);
        //     for($i = 0; $i<count($ID_Categoria); $i++){
        //         foreach($ID_Categoria[$i] as $key){
        //             $key;  
        //             echo $key;
        //         }

        //         $stmt = $this->dbh->prepare("UPDATE tiendas_categorias SET ID_Categoria = :ID_CATEGORIA WHERE ID_Tienda = :ID_TIENDA");

        //         //Se vinculan los valores de las sentencias preparadas
        //         $stmt->bindParam(':ID_CATEGORIA' , $key);
        //         $stmt->bindParam(':ID_TIENDA' , $ID_Tienda);

        //         //Se ejecuta la actualización de los datos en la tabla
        //         if($stmt->execute()){
        //             return true;
        //         }
        //         else{
        //             return false;
        //         }
        //     }
        // }

        //UPDATE de los datos de cuentas bancarias de una tienda
        public function actualizarBancos($ID_Banco, $Banco, $Titular, $NumeroCuenta, $Rif){
            foreach(array_keys($_POST['banco']) as $key){
                $Banco = $_POST['banco'][$key];
                $Titular = $_POST['titular'][$key];
                $NumeroCuenta = $_POST['numeroCuenta'][$key];
                $Rif = $_POST['rif'][$key];
                $ID_Banco = $_POST['id_banco'][$key];

                $stmt = $this->dbh->prepare("UPDATE bancos SET bancoNombre = :NOMBRE_BANCO, bancoCuenta = :CUENTA_BANCO, bancoTitular = :TITULAR_BANCO, bancoRif = :RIF_BANCO WHERE ID_Banco = :ID_BANCO");

                //Se vinculan los valores de las sentencias preparadas
                $stmt->bindParam(':NOMBRE_BANCO', $Banco);
                $stmt->bindParam(':ID_BANCO', $ID_Banco);
                $stmt->bindParam(':CUENTA_BANCO', $NumeroCuenta);
                $stmt->bindParam(':TITULAR_BANCO', $Titular);
                $stmt->bindParam(':RIF_BANCO', $Rif);

                //Se ejecuta la actualización de los datos en la tabla
                $stmt->execute();
            }
        }

        public function insertarProducto($RecibeProducto){
            $stmt = $this->dbh->prepare("INSERT INTO productos(producto) VALUES (:PRODUCTO)");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':PRODUCTO', $Producto);

            // insertar una fila
            $Producto = $RecibeProducto['Producto'];

            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        }

        public function insertarDescripcionProducto($RecibeProducto){
            $stmt = $this->dbh->prepare("INSERT INTO opciones(opcion) VALUES (:OPCION)");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':OPCION', $Opcion);

            // insertar una fila
            $Opcion = $RecibeProducto['Descripcion'];

            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        }

        public function insertarDT_ProOpcTie($RecibeProducto, $ID_Producto, $ID_Opcion){
            $stmt = $this->dbh->prepare("INSERT INTO productos_opciones(ID_Producto, ID_Opcion, ID_Tienda, precio) VALUES(:ID_PRODUCTO, :ID_OPCION, :ID_TIENDA, :PRECIO)");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $id_producto);
            $stmt->bindParam(':ID_OPCION', $opcion);
            $stmt->bindParam(':ID_TIENDA', $id_tienda);
            $stmt->bindParam(':PRECIO', $precio);

            // insertar una fila
            $id_producto = $ID_Producto;
            $opcion = $ID_Opcion;
            $id_tienda = $RecibeProducto['ID_Tienda'];
            $precio = $RecibeProducto['Precio'];

            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function insertarDT_ProTie($RecibeProducto, $ID_Producto){
            $stmt = $this->dbh->prepare("INSERT INTO tiendas_productos(ID_Producto, ID_Tienda) VALUES(:ID_PRODUCTO, :ID_TIENDA)");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $id_producto);
            $stmt->bindParam(':ID_TIENDA', $id_tienda);

            // insertar una fila
            $id_producto = $ID_Producto;
            $id_tienda = $RecibeProducto['ID_Tienda'];

            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }   

        public function insertarSeccionesTienda($ID_Tienda, $Seccion){
            foreach(array_keys($_POST['seccion']) as $key){
                $Seccion = $_POST['seccion'][$key];

                $stmt = $this->dbh->prepare("INSERT INTO secciones(ID_Tienda, seccion) VALUES(:ID_TIENDA, :SECCION)");

                //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
                $stmt->bindParam(':ID_TIENDA', $ID_Tienda);
                $stmt->bindParam(':SECCION', $Seccion);

                //Se ejecuta la inserción de los datos en la tabla
                $stmt->execute();
            }
        }




























        public function insertarDT_CatTie($ID_Categoria, $ID_Tienda){            
            // $Elementos = count($Categoria);
            // $Busqueda = "";
            // //Se convierte el array en una cadena con sus elementos entre comillas
            // for($i = 0; $i < $Elementos; $i++){
            //     $Busqueda .= " '" . $Categoria[$i] . "', ";
            // }
            // // Esto quita el ultimo espacio y coma del string generado con lo cual
            // // el string queda 'id1','id2','id3'
            // $Busqueda = substr($Busqueda,0,-2);
            // exit();







            for($i = 0; $i<count($ID_Categoria); $i++){
                foreach($ID_Categoria[$i] as $key){
                    $key;  
                }
                
                $stmt = $this->dbh->prepare("INSERT INTO tiendas_categorias(ID_Categoria, ID_Tienda) VALUES(:ID_CATEGORIA, :ID_TIENDA)");

                //Se vinculan los valores de las sentencias preparadas
                //stmt es una abreviatura de statement 
                $stmt->bindParam(':ID_CATEGORIA', $key);
                $stmt->bindParam(':ID_TIENDA', $ID_Tienda);
                
                // //Se ejecuta la inserción de los datos en la tabla
                $stmt->execute();
            }
        }         
    }



<?php
    class CuentaMayorista_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        //INSERT de un producto
        public function insertarProductoMayorista($RecibeProducto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO productosmayorista(productoMay) 
                 VALUES (:PRODUCTO)
            ");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':PRODUCTO', $RecibeProducto['ProductoMay']);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                //se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        }

        //INSERT de la opcion y el precio de un producto
        public function insertarOpcionesProductoMayorista($RecibeProducto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO opcionesmayorista(opcionMay, precioBolivarMay, precioDolarMay, cantidadMay, disponibleMay) 
                VALUES (:OPCION, :PRECIOBS, :PRECIODOLAR, :CANTIDAD, :DISPONIBLE)"
            );

            //Se da formato al precio, dos decimales
            $PrecioDolar = number_format($RecibeProducto['PrecioDolarMay'], 2, '.', '');

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':OPCION', $RecibeProducto['DescripcionMay']);
            $stmt->bindParam(':PRECIOBS', $RecibeProducto['PrecioBsMay']);
            $stmt->bindParam(':PRECIODOLAR', $PrecioDolar);
            $stmt->bindParam(':CANTIDAD', $RecibeProducto['CantidadMay']);
            $stmt->bindParam(':DISPONIBLE', $RecibeProducto['DisponibleMay']);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        }

        public function insertarDT_ProMayOpcMay( $ID_ProductoMay, $ID_OpcionMay){
            $stmt = $this->dbh->prepare(
                "INSERT INTO productosmayorista_opcionesmayorista(ID_ProductoMay, ID_OpcionMay) 
                VALUES(:ID_PRODUCTO, :ID_OPCION)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $id_productoMay);
            $stmt->bindParam(':ID_OPCION', $opcionMay);
            
            // insertar una fila
            $id_productoMay = $ID_ProductoMay;
            $opcionMay = $ID_OpcionMay;

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function insertarDT_SecMayOpcMay($ID_SeccionMay, $ID_OpcionMay){      
            $stmt = $this->dbh->prepare(
                "INSERT INTO seccionesmayorista_opcionesmayorista(ID_SeccionMay, ID_OpcionMay) 
                VALUES(:ID_SECCIONMAY, :ID_OPCIONMAY)"
            );

            //Se vinculan los valores de las sentencias preparadas
            //stmt es una abreviatura de statement 
            $stmt->bindParam(':ID_SECCIONMAY', $ID_SeccionMay[0]['ID_SeccionMay']);
            $stmt->bindParam(':ID_OPCIONMAY', $ID_OpcionMay);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();    
        }            
    
        public function insertarDT_SecMayProMay($ID_SeccionMay, $ID_ProductoMay){   
            $stmt = $this->dbh->prepare(
                "INSERT INTO seccionesmayorista_productosmayorista(ID_SeccionMay, ID_ProductoMay) 
                VALUES(:ID_SECCIONMAY, :ID_PRODUCTOMAY)"
            );

            //Se vinculan los valores de las sentencias preparadas
            //stmt es una abreviatura de statement 
            $stmt->bindParam(':ID_SECCIONMAY', $ID_SeccionMay[0]['ID_SeccionMay']);
            $stmt->bindParam(':ID_PRODUCTOMAY', $ID_ProductoMay);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();    
        }                 

        public function insertarDT_maysecMay($ID_Mayorista, $ID_SeccionMay){
            $stmt = $this->dbh->prepare(
                "INSERT INTO mayorista_seccionesmayorista(ID_Mayorista, ID_SeccionMay) 
                VALUES (:ID_MAYORISTA, :ID_SECCION)");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista);
            $stmt->bindParam(':ID_SECCION', $ID_SeccionMay);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }

        //INSERT de la imagen principal de un producto en mayorista
        public function insertaImagenPrincipalMayorista($ID_Producto, $nombre_imgProducto, $tipo_imgProducto, $tamanio_imgProducto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenesmayorista(ID_ProductoMay, nombre_imgMay, tipoArchivoMay, tamanoArchivoMay, fotoPrincipalMay, fechaMay, horaMay) 
                VALUES(:ID_PRODUCTO, :NOMBRE_IMG, :TIPO_ARCHIVO, :TAMANIO_ARCHIVO, :PRINCIPAL, CURDATE(), CURTIME())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto);
            $stmt->bindParam(':NOMBRE_IMG', $nombre_imgProducto);
            $stmt->bindParam(':TIPO_ARCHIVO', $tipo_imgProducto);
            $stmt->bindParam(':TAMANIO_ARCHIVO', $tamanio_imgProducto);
            $stmt->bindValue(':PRINCIPAL', 1);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();

            //se recupera el ID del registro insertado
            return $this->dbh->lastInsertId();
        } 

        //INSERT de la imagen principal por defecto en caso de no seleccionar ninguna
        public function insertaImagenPorDefectoMayorista($ID_Producto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenesmayorista(ID_ProductoMay, nombre_imgMay) 
                VALUES(:ID_PRODUCTO, :NOMBRE_IMG)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto);
            $stmt->bindValue(':NOMBRE_IMG', 'imagen.png');

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }

        //INSERT de datos de vendedor
        public function insertarVendeodr($ID_Mayorista, $RecibeVendedor, $nombre_imgVendedor, $tipo_imgVendedor, $tamanio_imgVendedor){
            $stmt = $this->dbh->prepare(
                "INSERT INTO afiliado_ven (ID_Mayorista, nombre_AfiVen, apellido_AfiVen, cedula_AfiVen, telefono_AfiVen, correo_AfiVen, direccion_AfiVen, zona_AfiVen, Fechaincorporación_AfiVen, Fechadesincorporación_AfiVen, Status_AfiVen, nombre_imgAfiVen, tipo_imgAfiVen, tamanio_imgAfiVen) 
                VALUES(:ID_MAYORISTA, :NOMBRE_AFIVEN, :APELLIDO_AFIVEN, :CEDULA_AFIVEN, :TELEFONO_AFIVEN, :CORREO_AFIVEN, :DIRECCION_AFIVEN, :ZONA_AFIVEN, CURDATE(), CURDATE(), :STATUS_AFIVEN, :NOMBREIMG_AFIVEN, :TIPOIMG_AFIVEN, :TAMANIOIMG_AFIVEN)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista);
            $stmt->bindParam(':NOMBRE_AFIVEN', $RecibeVendedor['Nombre_Ven']);
            $stmt->bindParam(':APELLIDO_AFIVEN', $RecibeVendedor['Apellido_Ven']);
            $stmt->bindParam(':CEDULA_AFIVEN', $RecibeVendedor['Cedula_Ven']);
            $stmt->bindParam(':TELEFONO_AFIVEN', $RecibeVendedor['Telefono_Ven']);
            $stmt->bindParam(':CORREO_AFIVEN', $RecibeVendedor['Correo_Ven']);
            $stmt->bindParam(':DIRECCION_AFIVEN', $RecibeVendedor['Direccion_Ven']);
            $stmt->bindParam(':ZONA_AFIVEN', $RecibeVendedor['Zona_Ven']);
            $stmt->bindParam(':STATUS_AFIVEN', $RecibeVendedor['Status_Ven']);
            $stmt->bindParam(':NOMBREIMG_AFIVEN', $nombre_imgVendedor);
            $stmt->bindParam(':TIPOIMG_AFIVEN', $tipo_imgVendedor);
            $stmt->bindParam(':TAMANIOIMG_AFIVEN', $tamanio_imgVendedor);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();

            //se recupera el ID del registro insertado
            return $this->dbh->lastInsertId();
        } 

        //Se INSERTAN los datos de acceso de un vendedor
        public function insertarContraeniaVendedor($ID_Vendedor, $ClaveVenCifrada){         
            $stmt = $this->dbh->prepare(
                "INSERT INTO afiliado_veningreso(ID_AfiliadoVen, claveCifradaVen) 
                VALUES (:ID_AFILIADOVEN, :CLAVE)"
            );

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':ID_AFILIADOVEN', $ID_Vendedor);
            $stmt->bindParam(':CLAVE', $ClaveVenCifrada);
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        //INSERT de datos de minorista
        public function insertarMinorista($RecibeMinorista, $nombre_imgMinorista, $tipo_imgMinorista, $tamanio_imgMinorista, $Ale_CodigoMinorista){
            $stmt = $this->dbh->prepare(
                "INSERT INTO minorista (ID_Vendedor, nombre_AfiMin, rif_AfiMin, codigodespacho, telefono_AfiMin, correo_AfiMin, zona_AfiVen, direccion_AfiMin, nombreImg_AfiMin, tipo_AfiMin, tamanio_AfiMin, fecha, hora) 
                VALUES(:ID_VENDEDOR, :NOMBRE_AFIMIN, :RIF_AFIMIN, :CODIGO_AFIMIN, :TELEFONO_AFIMIN, :CORREO_AFIMIN, :ZONA_AFIMIN, :DIRECCION_AFIMIN, :NOMBREIMG_AFIMIN, :TIPOIMG_AFIMIN, :TAMANIOIMG_AFIMIN, CURDATE(), CURDATE())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_VENDEDOR', $RecibeMinorista['id_vendedor']);
            $stmt->bindParam(':NOMBRE_AFIMIN', $RecibeMinorista['nombre_Min']);
            $stmt->bindParam(':RIF_AFIMIN', $RecibeMinorista['rif_Min']);
            $stmt->bindParam(':CODIGO_AFIMIN', $Ale_CodigoMinorista);
            $stmt->bindParam(':TELEFONO_AFIMIN', $RecibeMinorista['telefono_Min']);
            $stmt->bindParam(':CORREO_AFIMIN', $RecibeMinorista['correo_Min']);
            $stmt->bindParam(':ZONA_AFIMIN', $RecibeMinorista['Zona_Ven']);
            $stmt->bindParam(':DIRECCION_AFIMIN', $RecibeMinorista['direccion_Min']);
            $stmt->bindParam(':NOMBREIMG_AFIMIN', $nombre_imgMinorista);
            $stmt->bindParam(':TIPOIMG_AFIMIN', $tipo_imgMinorista);
            $stmt->bindParam(':TAMANIOIMG_AFIMIN', $tamanio_imgMinorista);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        } 
















        

        
        

    
        public function consultarSeccionesMayorista($ID_Mayorista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_SeccionMay, mayorista.ID_Mayorista, seccionMay, nombre_img_seccionMay, nombreMay
                FROM seccionesmayorista  
                INNER JOIN mayorista ON seccionesmayorista.ID_Mayorista=mayorista.ID_Mayorista
                WHERE mayorista.ID_Mayorista = :ID_MAYORISTA"
            );      
        
            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }     


        //SELECT de la seccion donde esta un producto especifico
        public function consultarSeccionProductosMayorista($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT ID_SeccionMay
                FROM seccionesmayorista_productosmayorista 
                WHERE ID_ProductoMay = :ID_PRODUCTO"
            );

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }

        //SELECT de los productos por sección del mayorista seleccionado
        public function consultarCant_ProductosSeccion($ID_Mayorista){
            $stmt = $this->dbh->prepare(
                "SELECT mayorista_seccionesmayoristas.ID_SeccionMayorista, COUNT(ID_ProductoMayorista) AS CantidadPro 
                FROM mayorista_seccionesmayoristas 
                INNER JOIN seccionesmayoristas_productosmayoristas ON mayorista_seccionesmayoristas.ID_Seccion=seccionesmayoristas_productosmayoristas.ID_Seccion WHERE mayorista_seccionesmayoristas.ID_Mayorista = :ID_MAYORISTA 
                GROUP BY mayorista_seccionesmayoristas.ID_Seccion" 
            );

            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);   

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de datos del mayorista
        public function consultarDatosMayorista($ID_Mayorista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_Mayorista , nombreMay, estadoMay, municipioMay, parroquiaMay, direccionMay, fotografiaMay, desactivarMay
                 FROM mayorista 
                 WHERE ID_Mayorista = :ID_MAYORISTA"
            );

            $stmt->bindValue(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo';
            }
        }

        //SELECT del ID_SecciónMay de una sección en un mayorista especifico
        public function consultarID_SeccionMayorista($RecibeDatos){
            $stmt = $this->dbh->prepare(
                "SELECT ID_SeccionMay  
                FROM seccionesmayorista  
                WHERE seccionMay  = :SECCIONMAY AND ID_Mayorista = :ID_MAYORISTA"
            );

            $stmt->bindParam(':SECCIONMAY', $Seccion, PDO::PARAM_STR);
            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);

            $Seccion = $RecibeDatos['SeccionMay'];
            $ID_Mayorista = $RecibeDatos['ID_Mayorista'];

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo';
            }
        }

        //SELECT de todos los productos que tiene un mayorista especifico
        public function consultarTodosProductosMayorista($ID_Mayorista){
            $stmt = $this->dbh->prepare(
                "SELECT productosmayorista.ID_ProductoMay, productosmayorista.destacarMay, productoMay, opcionesmayorista.ID_OpcionMay, opcionMay, opcionesmayorista.precioBolivarMay, opcionesmayorista.precioDolarMay, cantidadMay, disponibleMay, seccionesmayorista.seccionMay, imagenesmayorista.nombre_imgMay
                FROM mayorista 
                INNER JOIN seccionesmayorista ON mayorista.ID_Mayorista=seccionesmayorista.ID_Mayorista 
                INNER JOIN seccionesmayorista_productosmayorista ON seccionesmayorista.ID_SeccionMay=seccionesmayorista_productosmayorista.ID_SeccionMay 
                INNER JOIN productosmayorista ON  seccionesmayorista_productosmayorista.ID_ProductoMay=productosmayorista.ID_ProductoMay 
                INNER JOIN productosmayorista_opcionesmayorista ON productosmayorista.ID_ProductoMay=productosmayorista_opcionesmayorista.ID_ProductoMay 
                INNER JOIN opcionesmayorista ON productosmayorista_opcionesmayorista.ID_OpcionMay=opcionesmayorista.ID_OpcionMay 
                INNER JOIN imagenesmayorista ON productosmayorista.ID_ProductoMay=imagenesmayorista.ID_ProductoMay 
                WHERE mayorista.ID_Mayorista = :ID_MAYORISTA
                ORDER BY seccionesmayorista.seccionMay, productosmayorista.productoMay, opcionesmayorista.opcionMay"
            );

            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }

        //SELECT de los productos de una sección especifica en un mayorista
        public function consultarProductosMayorista($ID_Mayorista, $Seccion){
            $stmt = $this->dbh->prepare(
                "SELECT productosmayorista.ID_ProductoMay, destacarMay, productoMay, opcionesmayorista.ID_OpcionMay, opcionMay, opcionesmayorista.precioBolivarMay, opcionesmayorista.precioDolarMay, cantidadMay, disponibleMay, seccionesmayorista.ID_SeccionMay, seccionesmayorista.seccionMay, imagenesmayorista.nombre_imgMay
                FROM mayorista
                INNER JOIN seccionesmayorista ON mayorista.ID_Mayorista=seccionesmayorista.ID_Mayorista 
                INNER JOIN seccionesmayorista_productosmayorista ON seccionesmayorista.ID_SeccionMay=seccionesmayorista_productosmayorista.ID_SeccionMay
                INNER JOIN productosmayorista ON seccionesmayorista_productosmayorista.ID_ProductoMay=productosmayorista.ID_ProductoMay 
                INNER JOIN productosmayorista_opcionesmayorista ON productosmayorista.ID_ProductoMay=productosmayorista_opcionesmayorista.ID_ProductoMay
                INNER JOIN opcionesmayorista ON productosmayorista_opcionesmayorista.ID_OpcionMay=opcionesmayorista.ID_OpcionMay 
                INNER JOIN imagenesmayorista ON productosmayorista.ID_ProductoMay=imagenesmayorista.ID_ProductoMay 
                WHERE mayorista.ID_Mayorista= :ID_MAYORISTA AND seccionesmayorista.seccionMay= :SECCION 
                ORDER BY seccionesmayorista.seccionMay, productosmayorista.productoMay, opcionesmayorista.opcionMay
            ");

            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);
            $stmt->bindParam(':SECCION', $Seccion, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }

        //SELECT de las caracteristicas de los productos de un mayorista
        public function consultarCaracterisicasMayorista($ID_Mayorista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_OpcionMay , opcionMay 
                FROM opcionesmayorista 
                WHERE ID_Mayorista = :ID_MAYORISTA"
            );

            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }        
    
        //SELECT de todas las imagenes de un producto mayorista
        public function consultarImagenesEliminarMay($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_imgMay 
                FROM  imagenesmayorista  
                WHERE ID_ProductoMay = :ID_PRODUCTOMAY"
            );

            $stmt->bindParam(':ID_PRODUCTOMAY', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de un producto especificao de un mayorista determinada
        public function consultarDescripcionProductoMay($ID_Mayorista, $ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT productosmayorista.ID_ProductoMay, destacarMay, opcionesmayorista.ID_OpcionMay, productoMay, opcionMay, precioBolivarMay, precioDolarMay, cantidadMay, disponibleMay, seccionMay, seccionesmayorista.ID_SeccionMay, seccionesmayorista_productosmayorista.ID_SP 
                FROM mayorista 
                INNER JOIN seccionesmayorista ON mayorista.ID_Mayorista=seccionesmayorista.ID_Mayorista 
                INNER JOIN seccionesmayorista_productosmayorista ON seccionesmayorista.ID_SeccionMay=seccionesmayorista_productosmayorista.ID_SeccionMay 
                INNER JOIN productosmayorista ON seccionesmayorista_productosmayorista.ID_ProductoMay=productosmayorista.ID_ProductoMay 
                INNER JOIN productosmayorista_opcionesmayorista ON productosmayorista.ID_ProductoMay=productosmayorista_opcionesmayorista.ID_ProductoMay 
                INNER JOIN opcionesmayorista ON productosmayorista_opcionesmayorista.ID_OpcionMay=opcionesmayorista.ID_OpcionMay 
                WHERE mayorista.ID_Mayorista = :ID_MAYORISTA AND productosmayorista.ID_ProductoMay = :ID_PRODUCTO");

            $stmt->bindParam(':ID_MAYORISTA', $id_tienda, PDO::PARAM_STR);
            $stmt->bindParam(':ID_PRODUCTO', $id_producto, PDO::PARAM_INT);

            $id_tienda = $ID_Mayorista;
            $id_producto = $ID_Producto;

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de la IMAGEN de un producto determinado
        public function consultarImagenProducto($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT ID_ImagenMay, nombre_imgMay 
                FROM imagenesmayorista 
                WHERE ID_ProductoMay = :ID_PRODUCTO"
            );

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }

        //SELECT de la IMAGEN de un producto determinado
        public function consultarVendedoresMay($ID_Mayorista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_AfiliadoVen, nombre_AfiVen, apellido_AfiVen, cedula_AfiVen, telefono_AfiVen, zona_AfiVen, Status_AfiVen, correo_AfiVen
                FROM  afiliado_ven  
                WHERE ID_Mayorista = :ID_MAYORISTA"
            );

            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }

        }
        

        //SELECT de la IMAGEN de un producto determinado
        public function consultarClientes_Ven($ID_Vendedor){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_AfiMin, rif_AfiMin, telefono_AfiMin, correo_AfiMin, direccion_AfiMin, codigodespacho
                FROM  minorista  
                WHERE ID_Vendedor = :ID_VENDEDOR"
            );

            $stmt->bindParam(':ID_VENDEDOR', $ID_Vendedor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }
        //SELECT de los clientes de un mayorista
        public function consultarClientes(){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_AfiMin, rif_AfiMin, telefono_AfiMin, correo_AfiMin, direccion_AfiMin, codigodespacho, zona_AfiMin
                FROM  minorista"
            );

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }

        }
        
        //SELECT de secciones de un mayorista especifico
        public function consultarSecciones($ID_Mayorista){
            $stmt = $this->dbh->prepare("SELECT seccionMay FROM seccionesmayorista WHERE ID_Mayorista = :ID_MAYORISTA");

            $stmt->bindValue(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_COLUMN);
            }
            else{
                return  'Existe un fallo';
            }
        }












        
//***************************************************************************************************
//Las siguientes cinco consultas de eliminación deben realizarse por transacciones
//***************************************************************************************************
        //DELETE de productos de una tienda
        public function eliminarProductoSeccion($ID_Producto){
            $stmt = $this->dbh->prepare(
                "DELETE FROM seccionesmayorista_productosmayorista 
                WHERE ID_ProductoMay = :ID_PRODUCTO"
            );
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }
        
        //DELETE de opciones de producto de una tienda
        public function eliminarProductoOpcion($ID_Producto){
            $stmt = $this->dbh->prepare(
                "DELETE FROM productosmayorista_opcionesmayorista 
                WHERE ID_ProductoMay = :ID_PRODUCTO"
            );
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }

        //DELETE de productos de una tienda
        public function eliminarOpcionSeccion($ID_Opcion){
            $stmt = $this->dbh->prepare(
                "DELETE FROM opcionesmayorista 
                WHERE ID_OpcionMay = :ID_OPCION"
            );
            $stmt->bindValue(':ID_OPCION', $ID_Opcion, PDO::PARAM_INT);
            $stmt->execute();          
        }

        //DELETE de fotografia principal de un producto
        public function eliminarImagenProducto($ID_Imagen){
            $stmt = $this->dbh->prepare(
                "DELETE FROM imagenesmayorista
                WHERE ID_ImagenMay = :ID_IMAGEN"
            );
            $stmt->bindParam(':ID_IMAGEN', $ID_Imagen, PDO::PARAM_INT);
            $stmt->execute();          
        }    

        //DELETE de productos de una tienda
        public function eliminarProducto($ID_Producto){
            $stmt = $this->dbh->prepare(
                "DELETE FROM productosmayorista
                WHERE ID_ProductoMay = :ID_PRODUCTO"
            );
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }
        
        //DELETE de Dependencia Transitiva entre productos y opciones
        public function eliminarOpcion($ID_Opcion){
            $stmt = $this->dbh->prepare(
                "DELETE FROM seccionesmayorista_opcionesmayorista 
                WHERE ID_OpcionMay = :ID_OPCION"
            );
            $stmt->bindValue(':ID_OPCION', $ID_Opcion, PDO::PARAM_INT);
            $stmt->execute();          
        }  
    
        public function Transaccion_eliminarSeccionesMayorista($ID_Seccion){  
            try{  
                $this->dbh->beginTransaction();  
                
                // *********** OPERACION 1 *******************
                //DELETE de una seccion de un mayorista
                $stmt = $this->dbh->prepare("DELETE FROM seccionesmayorista WHERE ID_SeccionMay = :ID_SECCION");
                $stmt->bindValue(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);
                $stmt->execute();

                //Se envia información de cuantos registros se vieron afectados por la consulta
                // return $stmt->rowCount(); 

                // *********** OPERACION 2 *******************  
                //DELETE de Dependencia Transitiva entre seccionesmayorista y opcionesmayorista
                $stmt = $this->dbh->prepare("DELETE FROM seccionesmayorista_opcionesmayorista WHERE ID_SeccionMay  = :ID_SECCION");
                $stmt->bindValue(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);
                $stmt->execute();          

                // *********** OPERACION 3 ******************* 
                 //DELETE de Dependencia Transitiva entre seccionesmayorista y productosmayorista
                $stmt = $this->dbh->prepare("DELETE FROM seccionesmayorista_productosmayorista WHERE ID_SeccionMay = :ID_SECCION");
                $stmt->bindValue(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);
                $stmt->execute();       

                // *********** OPERACION 4 ******************* 
                $stmt = $this->dbh->prepare("DELETE FROM mayorista_seccionesmayorista WHERE ID_Mayorista  = :ID_SECCION");
                $stmt->bindValue(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);
                $stmt->execute();          
                    
                $this->dbh->commit();  
            }
            catch(PDOException $e){
                $this->dbh->rollback();  
                $this->error = $e->getMessage();
                echo 'Error al conectarse con la base de datos: ' . $this->error;
            }
        }















    
        
        //UPDATE de una opcion
        public function actualizarOpcion($RecibeProducto){   
            $stmt = $this->dbh->prepare(
                "UPDATE opcionesmayorista 
                 SET opcionMay = :OPCION, precioBolivarMay = :PRECIOBOLIVAR, precioDolarMay = :PRECIODOLAR, cantidadMay = :CANTIDAD, disponibleMay = :DISPONIBLE 
                  WHERE ID_OpcionMay = :ID_OPCION"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':OPCION', $RecibeProducto['Descripcion']);
            $stmt->bindValue(':PRECIOBOLIVAR', $RecibeProducto['PrecioBolivar']);
            $stmt->bindValue(':PRECIODOLAR', $RecibeProducto['PrecioDolar']);
            $stmt->bindValue(':CANTIDAD', $RecibeProducto['Cantidad']);
            $stmt->bindValue(':DISPONIBLE', $RecibeProducto['Disponible']);
            $stmt->bindValue(':ID_OPCION', $RecibeProducto['ID_Opcion']);

            // Se ejecuta la actualización de los datos en la tabla
            $stmt->execute();
        
            //Se envia información de cuantos registros se vieron afectados por la consulta
            // return $stmt->rowCount();
        }

        //UPDATE de un producto
        public function actualizarProducto($RecibeProducto){
            $stmt = $this->dbh->prepare(
                "UPDATE productosmayorista 
                SET productoMay = :PRODUCTO, destacarMay = :DESTACAR 
                WHERE ID_ProductoMay = :ID_PRODUCTO"
            );

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_PRODUCTO', $RecibeProducto['ID_Producto']);
            $stmt->bindValue(':PRODUCTO', $RecibeProducto['Producto']);
            $stmt->bindValue(':DESTACAR', $RecibeProducto['producto_destacado']);

            //Se ejecuta la actualización de los datos en la tabla
            $stmt->execute();
        }
        
        //UPDATE de una seccion
        public function actualizacionSeccion($RecibeProducto){ 
            $stmt = $this->dbh->prepare(
                "UPDATE seccionesmayorista_productosmayorista 
                SET ID_SeccionMay = :ID_SECCION 
                WHERE ID_SP= :ID_SP"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_SP', $RecibeProducto['ID_SP']);
            $stmt->bindValue(':ID_SECCION', $RecibeProducto['ID_Seccion']);

            // Se ejecuta la actualización de los datos en la tabla
            $stmt->execute();
        }

        //UPDATE de la fotografia de un producto mayorista
        public function actualizarImagenProducto($ID_Producto, $nombre_imgProducto){
            $stmt = $this->dbh->prepare(
                "UPDATE imagenesmayorista 
                SET nombre_imgMay = :FOT_PRODUCTO 
                WHERE ID_ProductoMay = :ID_PRODUCTO"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':FOT_PRODUCTO', $nombre_imgProducto);
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto); 

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        //UPDATE de reposicion
        // public function actualizacionReposicion($RecibeProducto){ 
        //     $stmt = $this->dbh->prepare(
        //         "UPDATE fechareposicion  
        //          SET fecha_dotacion = :FECHA_DOTACION, incremento = :INCREMENTO, fecha_reposicion = :FECHA_REPOSICION
        //          WHERE ID_Producto = :ID_PRODUCTO"
        //     );

        //     // Se vinculan los valores de las sentencias preparadas
        //     //Se introduce la fecha en la BD en formato año - mes - dia
        //     $stmt->bindValue(':FECHA_DOTACION', date('Y-m-d', strtotime($RecibeProducto['FechaDotacion'])));
        //     $stmt->bindValue(':INCREMENTO', $RecibeProducto['Incremento']);
        //     $stmt->bindValue(':FECHA_REPOSICION', date('Y-m-d', strtotime($RecibeProducto['FechaReposicion'])));
        //     $stmt->bindValue(':ID_PRODUCTO', $RecibeProducto['ID_Producto']);

        //     // Se ejecuta la actualización de los datos en la tabla
        //     if($stmt->execute()){    
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }
        
        //UPDATE de la fotografia de mayorista
        public function actualizarFotografiaMayorista($ID_Mayorista, $nombre_imgMayorista){
            $stmt = $this->dbh->prepare("UPDATE mayorista SET fotografiaMay = :FOTOGRAFIA WHERE ID_Mayorista = :ID_MAYORISTA ");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_MAYORISTA', $ID_Mayorista);
            $stmt->bindValue(':FOTOGRAFIA', $nombre_imgMayorista);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }



        
        
        //UPDATE de los datos del mayorista
        public function actualizarMayorista($RecibeDatos){
            $stmt = $this->dbh->prepare(
                "UPDATE mayorista 
                SET nombreMay = :NOMBRE_MAY WHERE ID_Mayorista  = :ID_MAYORISTA"
            );

            //Se vinculan los valores de las sentencias preparadas 
            $stmt->bindValue(':NOMBRE_MAY', $RecibeDatos['Nombre_may']);
            $stmt->bindValue(':ID_MAYORISTA', $RecibeDatos['id_mayorista']);

            //Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                // echo 'Bien';
                // exit;
                return true;
            }
            else{
                // echo 'Mal';
                // exit;
                return false;
            }
        }

        //INSERT de las secciones de un mayorista
        public function insertarSeccionesMayorista($ID_Mayorista, $Seccion){ 
            //Debido a que $Seccion es un array con todas las secciones, deben introducirse una a una mediante un ciclo    
            foreach($Seccion as $key)   :
                // echo $key . "<br>";
                // echo $ID_Tienda . "<br>";
                $stmt = $this->dbh->prepare(
                    "INSERT INTO seccionesmayorista(ID_Mayorista, seccionMay ) 
                     VALUES(:ID_MAYORISTA, :SECCION)"
                );

                //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
                $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista);
                $stmt->bindParam(':SECCION', $key);

                //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
                $stmt->execute();
            endforeach;
        }
        
        //SELECT de los ID_Sección de las secciónes de una tienda especifica
        public function consultarTodosID_SeccionMayorista($ID_Mayorista){
            $stmt = $this->dbh->prepare("SELECT ID_SeccionMay  FROM seccionesmayorista WHERE ID_Mayorista  = :ID_MAYORISTA");

            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function insertarDT_mayorista_seccionesmayorista($ID_Tienda, $ID_Seccion){
            //Debido a que $ID_Seccion es un array con todas las secciones, deben introducirse una a una mediante un ciclo
            for($i = 0; $i<count($ID_Seccion); $i++){
                foreach($ID_Seccion[$i] as $key){
                    $key;  
                }
                $stmt = $this->dbh->prepare("INSERT INTO mayorista_seccionesmayorista(ID_Mayorista , ID_SeccionMay) VALUES (:ID_MAYORISTA, :ID_SECCION) ON DUPLICATE KEY UPDATE ID_Mayorista = :ID_MAYORISTA, ID_SeccionMay = :ID_SECCION ");

                //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
                $stmt->bindParam(':ID_MAYORISTA', $ID_Tienda);
                $stmt->bindParam(':ID_SECCION', $key);

                //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
                $stmt->execute();
            }
        }
        
        //UPDATE de la imagen de seccion de mayorista
        public function actualizaImagenSeccionMayorista($ID_Seccion, $nombre_imgSeccion, $tipo_imgSeccion, $tamanio_imgSeccion){
            $stmt = $this->dbh->prepare(
                "UPDATE seccionesmayorista
                 SET nombre_img_seccionMay = :NOMBRE_IMG, tipoArchivo_img_seccionMay = :TIPO_ARCHIVO, tamanoArchivo_img_seccionMay = :TAMANIO_ARCHIVO
                 WHERE ID_SeccionMay  = :ID_SECCION"
            );

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_SECCION', $ID_Seccion);
            $stmt->bindParam(':NOMBRE_IMG', $nombre_imgSeccion);
            $stmt->bindParam(':TIPO_ARCHIVO', $tipo_imgSeccion);
            $stmt->bindParam(':TAMANIO_ARCHIVO', $tamanio_imgSeccion);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();

            //se recupera el ID del registro insertado
            // return $this->dbh->lastInsertId();
        } 
                
        //UPDATE del nombre de una sección
        public function ActualizarSeccion($Seccion, $ID_Seccion){
            $stmt = $this->dbh->prepare(
                "UPDATE seccionesmayorista  
                SET seccionMay  = :SECCION_MAY
                WHERE ID_SeccionMay  = :ID_SECCION"
                );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_SECCION', $ID_Seccion);
            $stmt->bindValue(':SECCION_MAY', $Seccion );

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }
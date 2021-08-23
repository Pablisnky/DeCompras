<?php
    class Cuenta_M extends Conexion_BD{

        public function __construct(){
            parent::__construct();
        }

        //SELECT de las categorias de tiendas que existen en la aplicación 
        public function consultarCatgorias(){
            $stmt = $this->dbh->query("SELECT ID_Categoria, categoria FROM categorias ORDER BY categoria");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
                         
        //SELECT de secciones de una tienda especifica
        public function consultarSeccionesTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT ID_Seccion, seccion FROM secciones WHERE ID_Tienda = :ID_Tienda");

            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
        
        //SELECT de secciones de una tienda especifica
        public function consultarSecciones_2($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT seccion FROM secciones WHERE ID_Tienda = :ID_Tienda");

            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_COLUMN);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de la seccion donde esta un producto de una tienda
        public function consultarSeccionActiva($ID_Producto){
            $stmt = $this->dbh->prepare("SELECT ID_Seccion FROM secciones_productos WHERE ID_Producto = :ID_PRODUCTO");

            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de la seccion segun su ID_Seccion
        public function consultarSeccion($ID_Seccion){
            $stmt = $this->dbh->prepare("SELECT DISTINCT seccion FROM secciones WHERE ID_Seccion = :ID_SECCION");

            $stmt->bindValue(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);

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
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
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

        //SELECT del estatus de la notificacion de la tienda
        public function consultarNotificacionTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT publicar FROM tiendas WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de los productos que tiene una tienda especifica 
        public function consultarTodosProductosTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT productos.ID_Producto, producto, opciones.ID_Opcion, opcion, opciones.precioBolivar, opciones.precioDolar, cantidad, disponible, secciones.seccion, nombre_img, fotoSeccion FROM tiendas_secciones INNER JOIN secciones ON tiendas_secciones.ID_Seccion=secciones.ID_Seccion INNER JOIN secciones_productos ON secciones.ID_Seccion=secciones_productos.ID_Seccion INNER JOIN productos ON secciones_productos.ID_Producto=productos.ID_Producto INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto WHERE tiendas_secciones.ID_Tienda = :ID_Tienda  AND fotoPrincipal = :FOTOPRINCIPAL ORDER BY secciones.seccion, productos.producto, opciones.opcion");

            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);
            $stmt->bindValue(':FOTOPRINCIPAL', 1, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de los productos de una sección en una tienda especifica
        public function consultarProductosTienda($ID_Tienda, $Seccion){
            $stmt = $this->dbh->prepare(
                "SELECT productos.ID_Producto, producto, opciones.ID_Opcion, opcion, opciones.precioBolivar, opciones.precioDolar, cantidad, disponible, secciones.ID_Seccion, secciones.seccion, imagenes.nombre_img, fotoSeccion 
                FROM tiendas_secciones 
                INNER JOIN secciones ON tiendas_secciones.ID_Seccion=secciones.ID_Seccion 
                INNER JOIN secciones_productos ON secciones.ID_Seccion=secciones_productos.ID_Seccion
                INNER JOIN productos ON secciones_productos.ID_Producto=productos.ID_Producto 
                INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto
                INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion 
                INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto 
                WHERE tiendas_secciones.ID_Tienda = :ID_Tienda AND seccion = :SECCION AND imagenes.fotoPrincipal = :PRINCIPAL 
                ORDER BY secciones.seccion, productos.producto, opciones.opcion
            ");

            $stmt->bindParam(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);
            $stmt->bindParam(':SECCION', $Seccion, PDO::PARAM_STR);
            $stmt->bindValue(':PRINCIPAL', 1, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

        //SELECT de datos del responsable de la tienda
        public function consultarResponsableTienda($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT nombre_AfiCom, apellido_AfiCom, cedula_AfiCom, telefono_AfiCom, correo_AfiCom, fotografia_AfiCom FROM afiliado_com WHERE ID_AfiliadoCom = :ID_Afiliado");

            $stmt->bindValue(':ID_Afiliado', $ID_Afiliado, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de datos de la tienda
        public function consultarDatosTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT nombre_Tien, estado_Tien, municipio_Tien, parroquia_Tien, direccion_Tien, telefono_Tien, slogan_Tien, fotografia_Tien FROM tiendas WHERE ID_Tienda = :ID_Tienda");

            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de datos de cuentas bancarias de la tienda
        public function consultarBancosTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT ID_Tienda, bancoNombre, bancoCuenta, bancoTitular, bancoRif FROM bancos WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
 
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de las categorias en las que una tienda esta registrada
        public function consultarCategoriaTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT categoria FROM categorias INNER JOIN tiendas_categorias ON categorias.ID_Categoria=tiendas_categorias.ID_Categoria WHERE ID_TIENDA = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
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
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT del ID_Sección de una sección en una tienda especifica
        public function consultarID_Seccion($RecibeDatos){
            $stmt = $this->dbh->prepare("SELECT ID_Seccion FROM secciones WHERE seccion = :SECCION AND ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':SECCION', $Seccion, PDO::PARAM_STR);
            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            $Seccion = $RecibeDatos['Seccion'];
            $ID_Tienda = $RecibeDatos['ID_Tienda'];

            $stmt->execute();
            return $stmt;
        }
        
        //SELECT de los ID_Sección de las secciónes de una tienda especifica
        public function consultarTodosID_Seccion($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT ID_Seccion FROM secciones WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de un producto especificao de una tienda determinada
        public function consultarDescripcionProducto($ID_Tienda, $ID_Producto){
            $stmt = $this->dbh->prepare("SELECT productos.ID_Producto, opciones.ID_Opcion, producto, opcion, precioBolivar, precioDolar, cantidad, disponible, seccion, secciones.ID_Seccion, secciones_productos.ID_SP FROM tiendas_secciones INNER JOIN secciones ON tiendas_secciones.ID_Seccion=secciones.ID_Seccion INNER JOIN secciones_productos ON secciones.ID_Seccion=secciones_productos.ID_Seccion INNER JOIN productos ON secciones_productos.ID_Producto=productos.ID_Producto INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion WHERE tiendas_secciones.ID_Tienda = :ID_TIENDA AND productos.ID_Producto = :ID_PRODUCTO");

            $stmt->bindParam(':ID_TIENDA', $id_tienda, PDO::PARAM_STR);
            $stmt->bindParam(':ID_PRODUCTO', $id_producto, PDO::PARAM_INT);

            $id_tienda = $ID_Tienda;
            $id_producto = $ID_Producto;

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        //SELECT de slogan de la tienda
        public function consultarSloganTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT slogan_Tien FROM tiendas WHERE ID_Tienda = :ID_Tienda");

            $stmt->bindParam(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT del link de acceso directo        
        public function consultarLinkTienda($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT link_acceso 
                 FROM destinos 
                 WHERE ID_Tienda = :ID_Tienda"
            );

            $stmt->bindParam(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
        
        //SELECT de las caracteristicas de un producto determinado
        public function consultarCaracteristicasProducto($ID_Tienda, $ID_Producto){
            $stmt = $this->dbh->prepare("SELECT ID_Caracteristica, caracteristica FROM caracteristicaproducto WHERE ID_Tienda = :ID_TIENDA AND ID_Producto = :ID_PRODUCTO");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
        
        //SELECT de las caracteristicas de un producto determinado
        public function consultarReposicionProducto($ID_Producto){
            $stmt = $this->dbh->prepare( 
                "SELECT incremento, DATE_FORMAT(fecha_dotacion, '%d-%m-%Y') AS fecha_dotacion, DATE_FORMAT(fecha_reposicion, '%d-%m-%Y') AS fecha_reposicion  
                 FROM fechareposicion  
                 WHERE ID_Producto = :ID_PRODUCTO"
            );

            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
        
        //SELECT de la IMAGEN PRINCIPAL de un producto determinado
        public function consultarImagenPrincipal($ID_Producto){
            $stmt = $this->dbh->prepare("SELECT ID_Imagen, nombre_img, fotoSeccion FROM imagenes WHERE ID_Producto = :ID_PRODUCTO AND fotoPrincipal = :PRINCIPAL");

            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->bindValue(':PRINCIPAL', 1, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de las IMAGENES de un producto determinado
        public function consultarImagnesProducto($ID_Producto){
            $stmt = $this->dbh->prepare("SELECT ID_Imagen, nombre_img FROM imagenes WHERE ID_Producto = :ID_PRODUCTO AND fotoPrincipal = :PRINCIPAL");

            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->bindValue(':PRINCIPAL', 0, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT de la cantidad de imagenes secundarias de un producto determinado
        public function consultarCantidadImagenProducto($ID_Producto){
            $stmt = $this->dbh->prepare("SELECT COUNT(*) AS cantidad FROM imagenes WHERE ID_Producto = :ID_PRODUCTO");

            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de las caracteristicas de un producto determinado
        public function consultaPermisoPublicar($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT publicar FROM tiendas WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarSecciones($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT ID_Seccion FROM secciones WHERE ID_Tienda = :ID_TIENDA");
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            if($stmt->execute()){
                //Se envia información de cuantos registros se vieron afectados por la consulta
                return $stmt->rowCount();
            }
            else{
                return false;
            }
        }
        
        //SELECT de las cuentas de pagomovil de una tienda especifica
        public function consultarCuentasPagomovil($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT cedula_pagomovil, banco_pagomovil, telefono_pagomovil FROM pagomovil WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return  $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
                
        //SELECT de las cuentas de pagomovil de una tienda especifica
        public function consultarOtrosMediosPago($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT efectivoBolivar, efectivoDolar, acordado FROM otrospagos WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                //Se envia información de cuantos registros se vieron afectados por la consulta
                return  $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT que cuenta la cantidad de productos de una tienda
        public function consultarCantidadProductos($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT COUNT(secciones_productos.ID_Producto) AS cantidadProductos FROM tiendas_secciones INNER JOIN secciones_productos ON tiendas_secciones.ID_Seccion=secciones_productos.ID_Seccion WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return  $stmt->fetchAll(PDO::FETCH_ASSOC);;
            }
            else{
                return false;
            }
        }

        //SELECT del horario de una tienda de lunes a viernes formato 12 horas
        public function consultarHorarioTienda_LV($ID_Tienda){
        $stmt = $this->dbh->prepare("SELECT *, DATE_FORMAT(inicio_m, '%h:%i %p') AS inicio_m, DATE_FORMAT(culmina_m, '%h:%i %p') AS culmina_m, DATE_FORMAT(inicia_t, '%h:%i %p') AS inicia_t, DATE_FORMAT(culmina_t, '%h:%i %p') AS culmina_t FROM horarios WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT del horario de una tienda para el dia sábado
        public function consultarHorarioTienda_Sab($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT *, DATE_FORMAT(inicia_m_Sab, '%h:%i %p') AS inicia_m_Sab, DATE_FORMAT(culmina_m_Sab, '%h:%i %p') AS culmina_m_Sab, DATE_FORMAT(inicia_t_Sab, '%h:%i %p') AS inicia_t_Sab, DATE_FORMAT(culmina_t_Sab, '%h:%i %p') AS culmina_t_Sab FROM horariosabado WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT del horario de una tienda para el dia domingo (formato 12 horas)
        public function consultarHorarioTienda_Dom($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT *, DATE_FORMAT(inicia_m_Dom, '%h:%i %p') AS inicia_m_Dom, DATE_FORMAT(culmina_m_Dom, '%h:%i %p') AS culmina_m_Dom, DATE_FORMAT(inicia_t_Dom, '%h:%i %p') AS inicia_t_Dom, DATE_FORMAT(culmina_t_Dom, '%h:%i %p') AS culmina_t_Dom FROM horariodomingo WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT del horario de una tienda para el dia de excepción (formato 12 horas)
        public function consultarHorarioTienda_Esp($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT *, DATE_FORMAT(inicia_m_Esp, '%h:%i %p') AS inicia_m_Esp, DATE_FORMAT(culmina_m_Esp, '%h:%i %p') AS culmina_m_Esp, DATE_FORMAT(inicia_t_Esp, '%h:%i %p') AS inicia_t_Esp, DATE_FORMAT(culmina_t_Esp, '%h:%i %p') AS culmina_t_Esp FROM horarioespecial WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        // SELECT de la cantidad de imagenes que tiene un producto especifico
        public function consultarCantidadImagenes($ID_Producto){
            $stmt = $this->dbh->prepare("SELECT COUNT(ID_Producto) AS CantidadFotos FROM imagenes WHERE ID_Producto = :ID_PRODUCTO");

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    
        //SELECT para encontrar la imagen de una sección especifica
        public function consultarImagenSeccion($RecibeProducto){
            $stmt = $this->dbh->prepare("SELECT ID_Imagen FROM imagenes INNER JOIN secciones_productos ON imagenes.ID_Producto=secciones_productos.ID_Producto WHERE ID_Seccion = :ID_SECCION AND fotoSeccion = :FOTO_SECCION");

            $stmt->bindValue(':ID_SECCION', $RecibeProducto['ID_Seccion'], PDO::PARAM_INT);
            $stmt->bindValue(':FOTO_SECCION', 1, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    
        //SELECT de todas las imagenes de un producto
        public function consultarImagenesEliminar($ID_Producto){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_img 
                FROM imagenes 
                WHERE ID_Producto = :ID_PRODUCTO");

            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT del inventario que tiene una tienda especifica 
        public function consultarInventario($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT productos.ID_Producto, producto, opciones.ID_Opcion, opcion, opciones.precioBolivar, opciones.precioDolar, cantidad, disponible, secciones.seccion, nombre_img, fotoSeccion, DATE_FORMAT(fecha_dotacion, '%d-%m-%Y') AS fecha_dotacion, DATE_FORMAT(fecha_reposicion, '%d-%m-%Y') AS fecha_reposicion, incremento 
                
                FROM tiendas_secciones 
                INNER JOIN secciones ON tiendas_secciones.ID_Seccion=secciones.ID_Seccion 
                INNER JOIN secciones_productos ON secciones.ID_Seccion=secciones_productos.ID_Seccion 
                INNER JOIN productos ON secciones_productos.ID_Producto=productos.ID_Producto 
                INNER JOIN productos_opciones ON productos.ID_Producto=productos_opciones.ID_Producto 
                INNER JOIN opciones ON productos_opciones.ID_Opcion=opciones.ID_Opcion 
                INNER JOIN imagenes ON productos.ID_Producto=imagenes.ID_Producto 
                INNER JOIN fechareposicion ON productos.ID_Producto=fechareposicion.ID_Producto 
                WHERE tiendas_secciones.ID_Tienda = :ID_Tienda  AND fotoPrincipal = :FOTOPRINCIPAL 
                ORDER BY secciones.seccion, productos.producto, opciones.opcion"
            );

            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);
            $stmt->bindValue(':FOTOPRINCIPAL', 1, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

            //Se envia información de cuantos registros se vieron afectados por la consulta
            return $stmt->rowCount();
        }
        
//***************************************************************************************************
//Las siguientes cuatro consultas de eliminación deben realizarse por transacciones
//***************************************************************************************************
        //DELETE de Dependencia Transitiva entre tiendas y secciones
        public function eliminarDT_Tienda_Secciones($ID_Tienda, $SeccionNoEliminar){
            // echo "ID_Seccion que no se eliminaran";
            // // echo $ID_Tienda;
            // echo "<pre>";
            // print_r($SeccionNoEliminar);
            // echo "</pre>";

            $Busqueda_3 = "";
            foreach($SeccionNoEliminar as $key) :
                //Se da formato a la cadena para convertir el array en un string separado por comas y entre comillas
                $Busqueda_3 .=  $key['ID_Seccion'] . ",";
            endforeach;

            // echo $Busqueda_3 ;
            // Esto quita el ultimo espacio y coma del string generado con lo cual
            // el string queda 'id1','id2','id3'
            // $Busqueda_3 = substr($Busqueda_3, 0, -1);

            $array = explode(",", $Busqueda_3);
            // print_r($array);

            for($i = 0; $i<count($array); $i++){
                $Cambio = settype($array[$i],"integer");
                // echo $Cambio  ."<br>";
            }

            settype($array[0],"integer");
            // echo gettype($Busqueda_3) ."<br>";
            // echo "Para concluir " .  $Busqueda_3 ."<br>";
               exit();
            $stmt = $this->dbh->prepare("DELETE FROM tiendas_secciones WHERE ID_Tienda = :ID_TIENDA AND ID_Seccion NOT IN ($Busqueda_3)");
            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            $stmt->execute();  
        }

        //DELETE de las secciones de una tienda
        public function eliminarSeccionesTienda($ID_Tienda, $EliminarSeccion){
            // echo "<pre>";
            // print_r($EliminarSeccion);
            // echo "</pre>";
            $Busqueda_2 = "";
            foreach($EliminarSeccion as $key) :
                //Se da formato a la cadena para convertir el array en un string separado por comas y entre comillas                
                $Busqueda_2 .= "'" . $key  . "',";
            endforeach;
            // Esto quita el ultimo espacio y coma del string generado con lo cual
            // el string queda 'id1','id2','id3'
            $Busqueda_2 = substr($Busqueda_2, 0, -2);
            // echo "Para concluir " .  $Busqueda_2 ."<br>";
                
            $stmt = $this->dbh->prepare("DELETE FROM secciones WHERE ID_Tienda = :ID_Tienda AND seccion NOT IN($Busqueda_2)");
            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);
            $stmt->execute(); 
        }

        //DELETE de Dependencia Transitiva entre secciones y opciones
        public function eliminarDT_Seccion_Opcion($ID_Seccion){
            //Debido a que $ID_Seccion es un array con todas los ID_Seccion, deben eliminarse uno a uno mediante un ciclo
            foreach($ID_Seccion as $key){
                $stmt = $this->dbh->prepare("DELETE FROM secciones_opciones WHERE ID_Seccion = :ID_SECCION");
                $stmt->bindValue(':ID_SECCION', $key['ID_Seccion'], PDO::PARAM_INT);
                $stmt->execute();  
            }
        }

        //DELETE de Dependencia Transitiva entre secciones y productos
        public function eliminarDT_Seccion_Producto($ID_Seccion){
            //Debido a que $ID_Seccion es un array con todas los ID_Seccion, deben eliminarse uno a uno mediante un ciclo
            foreach($ID_Seccion as $key){                
                $stmt = $this->dbh->prepare("DELETE FROM secciones_productos WHERE ID_Seccion = :ID_SECCION");
                $stmt->bindParam(':ID_SECCION', $key['ID_Seccion'], PDO::PARAM_INT);
                $stmt->execute();  
            }
        }

        
//***************************************************************************************************
//Las siguientes cinco consultas de eliminación deben realizarse por transacciones
//***************************************************************************************************
        //DELETE de productos de una tienda
        public function eliminarProductoSeccion($ID_Producto){
            $stmt = $this->dbh->prepare("DELETE FROM secciones_productos WHERE ID_Producto = :ID_PRODUCTO");
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }
        
        //DELETE de opciones de producto de una tienda
        public function eliminarProductoOpcion($ID_Producto){
            $stmt = $this->dbh->prepare("DELETE FROM productos_opciones WHERE ID_Producto = :ID_PRODUCTO");
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }

        //DELETE de productos de una tienda
        public function eliminarProducto($ID_Producto){
            $stmt = $this->dbh->prepare("DELETE FROM productos WHERE ID_Producto = :ID_PRODUCTO");
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }

        //DELETE de fecha de reposicion de un producto
        public function eliminarFechaReposicion($ID_Producto){
            $stmt = $this->dbh->prepare(
                "DELETE FROM fechareposicion  
                 WHERE ID_Producto = :ID_PRODUCTO"
            );
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }
        
        //DELETE de Dependencia Transitiva entre productos y opciones
        public function eliminarOpcion($ID_Opcion){
            $stmt = $this->dbh->prepare("DELETE FROM secciones_opciones WHERE ID_Opcion = :ID_OPCION");
            $stmt->bindValue(':ID_OPCION', $ID_Opcion, PDO::PARAM_INT);
            $stmt->execute();          
        }
        
        //DELETE de productos de una tienda
        public function eliminarOpcionSeccion($ID_Opcion){
            $stmt = $this->dbh->prepare("DELETE FROM opciones WHERE ID_Opcion = :ID_OPCION");
            $stmt->bindValue(':ID_OPCION', $ID_Opcion, PDO::PARAM_INT);
            $stmt->execute();          
        }
        
        //DELETE de caracteristicas de un producto especifico
        public function eliminarCaracteristicas($ID_Tienda){
            $stmt = $this->dbh->prepare("DELETE FROM caracteristicaproducto WHERE ID_Producto = :ID_PRODUCTO");
            $stmt->bindValue(':ID_PRODUCTO', $ID_Tienda, PDO::PARAM_INT);
            $stmt->execute();          
        }

        //DELETE de fotografia principal de un producto
        public function eliminarImagenProducto($ID_Imagen){
            $stmt = $this->dbh->prepare("DELETE FROM imagenes WHERE ID_Imagen = :ID_IMAGEN");
            $stmt->bindParam(':ID_IMAGEN', $ID_Imagen, PDO::PARAM_INT);
            $stmt->execute();          
        }       

        //DELETE de fotografia principal de un producto
        public function eliminarImagenPrincipal($ID_Producto){
            $stmt = $this->dbh->prepare("DELETE FROM imagenes WHERE ID_Producto = :ID_PRODUCTO");
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto, PDO::PARAM_INT);
            $stmt->execute();          
        }     
               
//***************************************************************************************************
//Las siguientes cuatro consultas de eliminación deben realizarse por transacciones
//***************************************************************************************************
        //DELETE de Dependencia Transitiva entre tiendas y secciones
        public function eliminarTiendasSecciones($ID_Seccion){
            $stmt = $this->dbh->prepare("DELETE FROM tiendas_secciones WHERE ID_Seccion = :ID_SECCION");
            $stmt->bindValue(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);
            $stmt->execute();

            //Se envia información de cuantos registros se vieron afectados por la consulta
            // return $stmt->rowCount();          
        }

        //DELETE de Dependencia Transitiva entre secciones y opciones
        public function eliminarSeccionesOpciones($ID_Seccion){
            $stmt = $this->dbh->prepare("DELETE FROM secciones_opciones WHERE ID_Seccion = :ID_SECCION");
            $stmt->bindValue(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);
            $stmt->execute();          
        } 
        
        //DELETE de Dependencia Transitiva entre Secciones y Productos
        public function eliminarSeccionesProductos($ID_Seccion){
            $stmt = $this->dbh->prepare("DELETE FROM secciones_productos WHERE ID_Seccion = :ID_SECCION");
            $stmt->bindValue(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);
            $stmt->execute();          
        }
                
        //DELETE de seccion 
        public function eliminarSecciones($ID_Seccion){
            $stmt = $this->dbh->prepare("DELETE FROM secciones WHERE ID_Seccion = :ID_SECCION");
            $stmt->bindValue(':ID_SECCION', $ID_Seccion, PDO::PARAM_INT);
            $stmt->execute();          
        }
                
        //DELETE de cuentas bancarias 
        public function eliminarCuentaBancaria($ID_Tienda){
            $stmt = $this->dbh->prepare("DELETE FROM bancos WHERE ID_Tienda = :ID_TIENDA");
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            $stmt->execute();          
        }
                
        //DELETE de cuentas bancarias 
        public function eliminarPagoMovil($ID_Tienda){
            $stmt = $this->dbh->prepare("DELETE FROM pagomovil WHERE ID_Tienda = :ID_TIENDA");
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            $stmt->execute();          
        }

        //DELETE de otros pagos
        public function eliminarOtrosPagos($ID_Tienda){
            $stmt = $this->dbh->prepare("DELETE FROM otrospagos WHERE ID_Tienda = :ID_TIENDA");
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            $stmt->execute();          
        }


























//***************************************************************************************************
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
                // echo 'Bien';
                // // exit;
                return true;
            }
            else{
                // echo 'Fallo';
                // exit;
                return false;
            }
        }

        //UPDATE de los datos de la tienda
        public function actualizarTienda($ID_AfiliadoCom, $RecibeDatos){
            // echo "<pre>";
            // print_r($RecibeDatos);
            // echo "</pre>";
            // echo $ID_AfiliadoCom;
            // exit;
            $stmt = $this->dbh->prepare("UPDATE tiendas SET nombre_Tien = :NOMBRE_TIEN, estado_Tien = :ESTADO_TIEN, municipio_Tien = :MUNICIPIO_TIEN, parroquia_Tien = :PARROQUIA_TIEN, direccion_Tien = :DIRECCION_TIEN, slogan_Tien = :SLOGAN_TIEN WHERE ID_AfiliadoCom = :AFILIADO");

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':NOMBRE_TIEN', $RecibeDatos['Nombre_com']);
            $stmt->bindValue(':ESTADO_TIEN', $RecibeDatos['Estado_com']);
            $stmt->bindValue(':MUNICIPIO_TIEN', $RecibeDatos['Municipio_com']);
            $stmt->bindValue(':PARROQUIA_TIEN', $RecibeDatos['Parroquia_com']);
            $stmt->bindValue(':DIRECCION_TIEN', $RecibeDatos['Direccion_com']);
            $stmt->bindValue(':SLOGAN_TIEN', $RecibeDatos['Slogan_com']);
            $stmt->bindValue(':AFILIADO', $ID_AfiliadoCom);

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
        
        //UPDATE de un producto
        public function actualizarProducto($RecibeProducto){
            $stmt = $this->dbh->prepare("UPDATE productos SET producto = :PRODUCTO WHERE ID_Producto = :ID_PRODUCTO");

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_PRODUCTO', $RecibeProducto['ID_Producto']);
            $stmt->bindValue(':PRODUCTO', $RecibeProducto['Producto']);

            //Se ejecuta la actualización de los datos en la tabla
            $stmt->execute();
        }
        
        //UPDATE de una opcion
        public function actualizarOpcion($RecibeProducto){   
            $stmt = $this->dbh->prepare(
                "UPDATE opciones 
                 SET opcion = :OPCION, precioBolivar = :PRECIOBOLIVAR, precioDolar = :PRECIODOLAR, cantidad = :CANTIDAD, disponible = :DISPONIBLE 
                  WHERE ID_Opcion = :ID_OPCION"
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
        
        //UPDATE de una seccion
        public function actualizacionSeccion($RecibeProducto){ 
            $stmt = $this->dbh->prepare("UPDATE secciones_productos SET ID_Seccion = :ID_SECCION WHERE ID_SP= :ID_SP");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_SP', $RecibeProducto['ID_SP']);
            $stmt->bindValue(':ID_SECCION', $RecibeProducto['ID_Seccion']);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){    
                return true;
            }
            else{
                return false;
            }
        }
        
        //UPDATE de reposicion
        public function actualizacionReposicion($RecibeProducto){ 
            $stmt = $this->dbh->prepare(
                "UPDATE fechareposicion  
                 SET fecha_dotacion = :FECHA_DOTACION, incremento = :INCREMENTO, fecha_reposicion = :FECHA_REPOSICION
                 WHERE ID_Producto = :ID_PRODUCTO"
            );

            // Se vinculan los valores de las sentencias preparadas
            //Se introduce la fecha en la BD en formato año - mes - dia
            $stmt->bindValue(':FECHA_DOTACION', date('Y-m-d', strtotime($RecibeProducto['FechaDotacion'])));
            $stmt->bindValue(':INCREMENTO', $RecibeProducto['Incremento']);
            $stmt->bindValue(':FECHA_REPOSICION', date('Y-m-d', strtotime($RecibeProducto['FechaReposicion'])));
            $stmt->bindValue(':ID_PRODUCTO', $RecibeProducto['ID_Producto']);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){    
                return true;
            }
            else{
                return false;
            }
        }

        //UPDATE de la fotografia principal de un producto
        public function actualizarImagenPrincipalProducto($ID_Producto, $nombre_imgProducto){
            $stmt = $this->dbh->prepare("UPDATE imagenes SET nombre_img = :FOT_PRODUCTO WHERE ID_Producto = :ID_PRODUCTO AND fotoPrincipal = :FOTOPRINCIPAL");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':FOT_PRODUCTO', $nombre_imgProducto);
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto); 
            $stmt->bindValue(':FOTOPRINCIPAL', 1);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //UPDATE de la fotografia principal de un producto
        public function actualizarImagenSeccionSeleccionar($RecibeProducto){
            $stmt = $this->dbh->prepare("UPDATE imagenes SET fotoSeccion = :FOT_SECCION WHERE ID_Imagen = :ID_IMAGEN_PONER");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_IMAGEN_PONER', $RecibeProducto['ID_Imagen']);
            $stmt->bindValue(':FOT_SECCION', 1); 

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //UPDATE de la fotografia principal de un producto
        public function actualizarImagenSeccionDeseleccionar($ID_ImagenSeccion){ 
            $stmt = $this->dbh->prepare("UPDATE imagenes SET fotoSeccion = :FOT_SECCION WHERE ID_Imagen = :ID_IMAGEN_QUITAR");
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_IMAGEN_QUITAR', $ID_ImagenSeccion[0]['ID_Imagen']);
            $stmt->bindValue(':FOT_SECCION', 0); 

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        //UPDATE de la fotografia de la tienda
        public function actualizarFotografiaTienda($ID_Tienda, $nombre_imgTienda){
            $stmt = $this->dbh->prepare("UPDATE tiendas SET fotografia_Tien = :FOTOGRAFIA WHERE ID_Tienda = :ID_TIENDA ");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);
            $stmt->bindValue(':FOTOGRAFIA', $nombre_imgTienda);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
                
        //UPDATE de la fotografia de la tienda
        public function ActualizarSeccion($Seccion, $ID_Seccion){
            $stmt = $this->dbh->prepare("UPDATE secciones SET seccion = :SECCION WHERE ID_Seccion = :ID_SECCION ");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_SECCION', $ID_Seccion);
            $stmt->bindValue(':SECCION', $Seccion );

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
                
        //UPDATE del campo publicar (autoriza a publicar la tienda en el catalogo de tiendas)
        public function actualizarTiendaPublicar($ID_Tienda){
            $stmt = $this->dbh->prepare("UPDATE tiendas SET publicar = :PUBLICAR WHERE ID_Tienda = :ID_TIENDA ");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':PUBLICAR', 1);
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
             
        //UPDATE del campo publicar (no autoriza a publicar la tienda en el catalogo de tiendas)
        public function actualizarPublicarTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("UPDATE tiendas SET publicar = :PUBLICAR WHERE ID_Tienda = :ID_TIENDA ");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':PUBLICAR', 0);
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //UPDATE de horarios de tienda de lunes a viernes
        public function actualizarHorarioTienda_LV($ID_Tienda, $RecibeHorario_LV){
            $stmt = $this->dbh->prepare("UPDATE horarios SET inicio_m = :INICIA_M, culmina_m = :CULMINA_M, lunes_m = :LUNES_M, martes_m = :MARTES_M, miercoles_m = :MIERCOLES_M, jueves_m = :JUEVES_M, viernes_m = :VIERNES_M, inicia_t = :INICIA_T, culmina_t = :CULMINA_T, lunes_t = :LUNES_T, martes_t = :MARTES_T, miercoles_t = :MIERCOLES_T, jueves_t = :JUEVES_T, viernes_t = :VIERNES_T WHERE ID_Tienda = :ID_TIENDA");

            // Se vinculan los valores de las sentencias preparadas
            //Se introduce en la BD en formato 24 horas
            $stmt->bindValue(':INICIA_M', date('H:i', strtotime($RecibeHorario_LV['Inicio_M'])));
            $stmt->bindValue(':CULMINA_M', date('H:i', strtotime($RecibeHorario_LV['Culmina_M'])));
            $stmt->bindValue(':LUNES_M', $RecibeHorario_LV['Lunes_M']);
            $stmt->bindValue(':MARTES_M', $RecibeHorario_LV['Martes_M']);
            $stmt->bindValue(':MIERCOLES_M', $RecibeHorario_LV['Miercoles_M']);
            $stmt->bindValue(':JUEVES_M', $RecibeHorario_LV['Jueves_M']);
            $stmt->bindValue(':VIERNES_M', $RecibeHorario_LV['Viernes_M']);
            //Se introduce en la BD en formato 24 horas
            $stmt->bindValue(':INICIA_T', date('H:i', strtotime($RecibeHorario_LV['Inicia_T'])));
            $stmt->bindValue(':CULMINA_T', date('H:i', strtotime($RecibeHorario_LV['Culmina_T'])));
            $stmt->bindValue(':LUNES_T', $RecibeHorario_LV['Lunes_T']);
            $stmt->bindValue(':MARTES_T', $RecibeHorario_LV['Martes_T']);
            $stmt->bindValue(':MIERCOLES_T', $RecibeHorario_LV['Miercoles_T']);
            $stmt->bindValue(':JUEVES_T', $RecibeHorario_LV['Jueves_T']);
            $stmt->bindValue(':VIERNES_T', $RecibeHorario_LV['Viernes_T']);
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //UPDATE de horarios de tienda del día sábado
        public function actualizarHorarioTienda_Sab($ID_Tienda, $RecibeHorario_Sab){
            $stmt = $this->dbh->prepare("UPDATE horariosabado SET inicia_m_Sab = :INICIA_M_SAB, culmina_m_Sab = :CULMINA_M_SAB, sabado_m = :SABADO_M, inicia_t_Sab = :INICIA_T_SAB, culmina_t_Sab = :CULMINA_T_SAB, sabado_t = :SABADO_T WHERE ID_Tienda = :ID_TIENDA");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':INICIA_M_SAB', date('H:i', strtotime($RecibeHorario_Sab['Inicio_M_Sab'])));
            $stmt->bindValue(':CULMINA_M_SAB', date('H:i', strtotime($RecibeHorario_Sab['Culmina_M_Sab'])));
            $stmt->bindValue(':SABADO_M', $RecibeHorario_Sab['Sabado_M']);
            $stmt->bindValue(':INICIA_T_SAB', date('H:i', strtotime($RecibeHorario_Sab['Inicia_T_Sab'])));
            $stmt->bindValue(':CULMINA_T_SAB', date('H:i', strtotime($RecibeHorario_Sab['Culmina_T_Sab'])));
            $stmt->bindValue(':SABADO_T', $RecibeHorario_Sab['Sabado_T']);
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //UPDATE de horarios de tienda del día domingo
        public function actualizarHorarioTienda_Dom($ID_Tienda, $RecibeHorario_Dom){
            $stmt = $this->dbh->prepare("UPDATE horariodomingo SET inicia_m_Dom = :INICIA_M_DOM, culmina_m_Dom = :CULMINA_M_DOM, domingo_m = :DOMINGO_M, inicia_t_Dom = :INICIA_T_DOM, culmina_t_Dom = :CULMINA_T_DOM, domingo_t = :DOMINGO_T WHERE ID_Tienda = :ID_TIENDA");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':INICIA_M_DOM', date('H:i', strtotime($RecibeHorario_Dom['Inicio_M_Dom'])));
            $stmt->bindValue(':CULMINA_M_DOM', date('H:i', strtotime($RecibeHorario_Dom['Culmina_M_Dom'])));
            $stmt->bindValue(':DOMINGO_M', $RecibeHorario_Dom['Domingo_M']);
            $stmt->bindValue(':INICIA_T_DOM', date('H:i', strtotime($RecibeHorario_Dom['Inicia_T_Dom'])));
            $stmt->bindValue(':CULMINA_T_DOM', date('H:i', strtotime($RecibeHorario_Dom['Culmina_T_Dom'])));
            $stmt->bindValue(':DOMINGO_T', $RecibeHorario_Dom['Domingo_T']);
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        //UPDATE de horarios de tienda de un día especifico que entra como exepción
        public function actualizarHorarioTienda_Esp($ID_Tienda, $RecibeHorario_Esp){
            $stmt = $this->dbh->prepare("UPDATE horarioespecial SET inicia_m_Esp = :INICIA_M_ESP, culmina_m_Esp = :CULMINA_M_ESP, especial_m = :ESPECIAL_M, inicia_t_Esp = :INICIA_T_ESP, culmina_t_Esp = :CULMINA_T_ESP, especial_t = :ESPECIAL_T  WHERE ID_Tienda = :ID_TIENDA");

            // Se vinculan los valores de las sentencias preparadas
            //Se introduce en la BD en formato 24 horas
            $stmt->bindValue(':INICIA_M_ESP', date('H:i', strtotime($RecibeHorario_Esp['Inicio_M_Esp'])));
            $stmt->bindValue(':CULMINA_M_ESP', date('H:i', strtotime($RecibeHorario_Esp['Culmina_M_Esp'])));
            $stmt->bindValue(':ESPECIAL_M', $RecibeHorario_Esp['DiaEspecial_M']);
            //Se introduce en la BD en formato 24 horas
            $stmt->bindValue(':INICIA_T_ESP', date('H:i', strtotime($RecibeHorario_Esp['Inicia_T_Esp'])));
            $stmt->bindValue(':CULMINA_T_ESP', date('H:i', strtotime($RecibeHorario_Esp['Culmina_T_Esp'])));
            $stmt->bindValue(':ESPECIAL_T', $RecibeHorario_Esp['DiaEspecial_T']);
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        //UPDATE del link de acceso directo de la tienda
        public function actualizarLinkTienda($ID_Tienda, $LinkAcceso){
            $stmt = $this->dbh->prepare(
                "UPDATE destinos 
                 SET link_acceso = :LINK
                 WHERE ID_Tienda = :ID_TIENDA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':LINK', $LinkAcceso);
            $stmt->bindParam(':ID_TIENDA', $ID_Tienda);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function actualizarMostarTienda($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "UPDATE tiendas 
                SET publicar = 0 
                WHERE ID_Tienda = :ID_TIENDA"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_TIENDA', $ID_Tienda);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        //UPDATE de la imagen de seccion
        public function actualizaImagenSeccion($ID_Seccion, $nombre_imgSeccion, $tipo_imgSeccion, $tamanio_imgSeccion){
            $stmt = $this->dbh->prepare(
                "UPDATE secciones
                 SET ID_Seccion = :ID_SECCION, nombre_img_seccion = :NOMBRE_IMG, tipoArchivo_img_seccion = :TIPO_ARCHIVO, tamanoArchivo_img_seccion = :TAMANIO_ARCHIVO
                 WHERE ID_Seccion = :ID_SECCION"
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










        
















        
        //INSERT de un producto
        public function insertarProducto($RecibeProducto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO productos(producto) 
                VALUES (:PRODUCTO)
            ");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':PRODUCTO', $Producto);

            // insertar una fila
            $Producto = $RecibeProducto['Producto'];

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
        public function insertarOpcionesProducto($RecibeProducto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO opciones(opcion, precioBolivar, precioDolar, cantidad, disponible) 
                VALUES (:OPCION, :PRECIOBS, :PRECIODOLAR, :CANTIDAD, :DISPONIBLE)"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':OPCION', $RecibeProducto['Descripcion']);
            $stmt->bindParam(':PRECIOBS', $RecibeProducto['PrecioBs']);
            $stmt->bindParam(':PRECIODOLAR', $RecibeProducto['PrecioDolar']);
            $stmt->bindParam(':CANTIDAD', $RecibeProducto['Cantidad']);
            $stmt->bindParam(':DISPONIBLE', $RecibeProducto['Disponible']);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        }

        //INSERT de la opcion y el precio de un producto
        public function insertarReposicion($RecibeProducto, $ID_Producto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO  fechareposicion(ID_Producto, incremento, fecha_dotacion, fecha_reposicion) 
                VALUES (:ID_PRODUCTO, :INCREMENTO, :FECHA_DOTACION, :FECHA_REPOSICION)"
            );
            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto);
            $stmt->bindParam(':INCREMENTO', $RecibeProducto['Incremento']);
            //Se introduce la fecha en la BD en formato año - mes - dia
            $stmt->bindParam(':FECHA_DOTACION', date('Y-m-d', strtotime($RecibeProducto['Fecha_dotacion'])));
            $stmt->bindParam(':FECHA_REPOSICION', date('Y-m-d', strtotime($RecibeProducto['Fecha_reposicion'])));
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                // se recupera el ID del registro insertado
                return true;
            }
            else{
                return false;
            }
        }

        //INSERT de las caracteristicas de un producto
        public function insertarCaracteristicasProducto($RecibeProducto, $ID_Producto, $Caracteristica){
            //Debido a que $Caracteristica es un array con todas las caracteristicas, deben introducirse una a una mediante un ciclo
            for($i = 0; $i<count($Caracteristica); $i++){
                $stmt = $this->dbh->prepare("INSERT INTO caracteristicaproducto(ID_Tienda, ID_Producto, caracteristica) VALUES(:ID_TIENDA, :ID_PRODUCTO, :CARACTERISTICA)");

                //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
                $stmt->bindParam(':ID_TIENDA', $RecibeProducto['ID_Tienda']);
                $stmt->bindParam(':ID_PRODUCTO', $ID_Producto);
                $stmt->bindParam(':CARACTERISTICA', $Caracteristica[$i]);

                //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
                $stmt->execute();
            }
        }

        //INSERT de la imagen principal de un producto
        public function insertaImagenPrincipalProducto($ID_Producto, $nombre_imgProducto, $tipo_imgProducto, $tamanio_imgProducto){
            $stmt = $this->dbh->prepare(
                "INSERT INTO imagenes(ID_Producto, nombre_img, tipoArchivo, tamanoArchivo, fotoPrincipal, fotoSeccion, fecha, hora) 
                VALUES(:ID_PRODUCTO, :NOMBRE_IMG, :TIPO_ARCHIVO, :TAMANIO_ARCHIVO, :PRINCIPAL, :SECCION, CURDATE(), CURTIME())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto);
            $stmt->bindParam(':NOMBRE_IMG', $nombre_imgProducto);
            $stmt->bindParam(':TIPO_ARCHIVO', $tipo_imgProducto);
            $stmt->bindParam(':TAMANIO_ARCHIVO', $tamanio_imgProducto);
            $stmt->bindValue(':PRINCIPAL', 1);
            $stmt->bindValue(':SECCION', 0);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();

            //se recupera el ID del registro insertado
            return $this->dbh->lastInsertId();
        } 

        //INSERT de Dependencia transitiva en seccion e imagen
        // public function insertarDT_SecImg($ID_Seccion, $ID_Imagen){
        //     // echo '<pre>';
        //     // print_r($ID_Seccion);
        //     // echo '</pre>';
        //     // echo '<pre>';
        //     // print_r($ID_Imagen);
        //     // echo '</pre>';
        //     // exit;
        //     $stmt = $this->dbh->prepare("INSERT INTO secciones_imagenes(ID_Seccion, ID_Imagen) VALUES(:ID_SECCION, :ID_IMAGEN)");

        //     //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
        //     $stmt->bindParam(':ID_SECCION', $ID_Seccion[0]['ID_Seccion']);
        //     $stmt->bindParam(':ID_IMAGEN', $ID_Imagen);

        //     //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
        //     $stmt->execute();
        // }

        //INSERT en la tabla imagenes las fotografias secundarias
        public function insertarFotografiasSecun($ID_Producto, $archivonombre, $tipo, $tamanio){
            $stmt = $this->dbh->prepare("INSERT INTO imagenes(ID_Producto, nombre_img, tipoArchivo, tamanoArchivo, fotoPrincipal, fecha, hora)VALUES (:ID_PRODUCTO, :NOMBRE_IMG, :TIPO_ARCHIVO, :TAMANIO_ARCHIVO, :PRINCIPAL, CURDATE(), CURTIME())");
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_PRODUCTO', $ID_Producto,);
            $stmt->bindParam(':NOMBRE_IMG', $archivonombre);
            $stmt->bindParam(':TIPO_ARCHIVO', $tipo);
            $stmt->bindParam(':TAMANIO_ARCHIVO', $tamanio);
            $stmt->bindValue(':PRINCIPAL', 0);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }

        public function insertarDT_ProOpc( $ID_Producto, $ID_Opcion){
            $stmt = $this->dbh->prepare("INSERT INTO productos_opciones(ID_Producto, ID_Opcion) VALUES(:ID_PRODUCTO, :ID_OPCION)");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PRODUCTO', $id_producto);
            $stmt->bindParam(':ID_OPCION', $opcion);
            
            // insertar una fila
            $id_producto = $ID_Producto;
            $opcion = $ID_Opcion;

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

//***************************************************************************************************
//Las siguientes dos consultas de inserción deben realizarse por transacciones
//***************************************************************************************************
        //INSERT de las secciones de una tienda
        public function insertarSeccionesTienda($ID_Tienda, $Seccion){ 
            //Debido a que $Seccion es un array con todas las secciones, deben introducirse una a una mediante un ciclo    
            foreach($Seccion as $key){
                // echo $key . "<br>";
                $stmt = $this->dbh->prepare("INSERT INTO secciones(ID_Tienda, seccion) VALUES(:ID_TIENDA, :SECCION)");

                //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
                $stmt->bindParam(':ID_TIENDA', $ID_Tienda);
                $stmt->bindParam(':SECCION', $key);

                //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada)
                if($stmt->execute()){           
                }
                else{
                    return false;
                }
            }
        }

        public function insertarDT_TieSec($ID_Tienda, $ID_Seccion){
            //Debido a que $ID_Seccion es un array con todas las secciones, deben introducirse una a una mediante un ciclo
            for($i = 0; $i<count($ID_Seccion); $i++){
                foreach($ID_Seccion[$i] as $key){
                    $key;  
                }
                $stmt = $this->dbh->prepare("INSERT INTO tiendas_secciones(ID_Tienda, ID_Seccion) VALUES (:ID_TIENDA, :ID_SECCION) ON DUPLICATE KEY UPDATE ID_Tienda = :ID_TIENDA, ID_Seccion = :ID_SECCION ");

                //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
                $stmt->bindParam(':ID_TIENDA', $ID_Tienda);
                $stmt->bindParam(':ID_SECCION', $key);

                //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
                $stmt->execute();
            }
        }

        public function insertarDT_CatTie($ID_Categoria, $ID_Tienda){  
            for($i = 0; $i<count($ID_Categoria); $i++){
                foreach($ID_Categoria[$i] as $key){
                    $key;  
                }
                
                $stmt = $this->dbh->prepare("INSERT INTO tiendas_categorias(ID_Categoria, ID_Tienda) VALUES(:ID_CATEGORIA, :ID_TIENDA)");

                //Se vinculan los valores de las sentencias preparadas
                //stmt es una abreviatura de statement 
                $stmt->bindParam(':ID_CATEGORIA', $key);
                $stmt->bindParam(':ID_TIENDA', $ID_Tienda);
                
                //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
                $stmt->execute();

                //Se envia información de cuantos registros se vieron afectados por la consulta
                // return $stmt->rowCount();
            }
        }  

        public function insertarDT_SecOpc($ID_Seccion, $ID_Opcion){      
            $stmt = $this->dbh->prepare("INSERT INTO secciones_opciones(ID_Seccion, ID_Opcion) VALUES(:ID_SECCION, :ID_OPCION)");

            //Se vinculan los valores de las sentencias preparadas
            //stmt es una abreviatura de statement 
            $stmt->bindParam(':ID_SECCION', $ID_Seccion[0]['ID_Seccion']);
            $stmt->bindParam(':ID_OPCION', $ID_Opcion);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();    
        }       
    
        public function insertarDT_SecPro($ID_Seccion, $ID_Producto){   
            $stmt = $this->dbh->prepare("INSERT INTO secciones_productos(ID_Seccion, ID_Producto) VALUES(:ID_SECCION, :ID_PRODUCTO)");

            //Se vinculan los valores de las sentencias preparadas
            //stmt es una abreviatura de statement 
            $stmt->bindParam(':ID_SECCION', $ID_Seccion[0]['ID_Seccion']);
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();    
        }             
    
        public function insertarDTC($RecibeProducto, $ID_Producto){   
            $stmt = $this->dbh->prepare("INSERT INTO dtc(ID_Tienda, ID_Producto) VALUES(:ID_TIENDA, :ID_PRODUCTO)");

            //Se vinculan los valores de las sentencias preparadas
            //stmt es una abreviatura de statement 
            $stmt->bindParam(':ID_TIENDA', $id_tienda);
            $stmt->bindParam(':ID_PRODUCTO', $id_producto);

            // insertar una fila
            $id_producto = $ID_Producto;
            $id_tienda = $RecibeProducto['ID_Tienda'];
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();    
        } 

        //INSERT de cuenta bancaria
        public function insertarCuentaBancaria($ID_Tienda, $Banco, $Titular, $NumeroCuenta, $Rif){
            $stmt = $this->dbh->prepare("INSERT INTO bancos(ID_Tienda, bancoNombre, bancoCuenta, bancoTitular, bancoRif, fecha, hora)VALUES (:ID_TIENDA, :BAN_NOMBRE, :BAN_CUENTA, :BAN_TITULAR, :BAN_RIF, CURDATE(), CURTIME())");
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);
            $stmt->bindValue(':BAN_NOMBRE', $Banco);
            $stmt->bindParam(':BAN_CUENTA', $NumeroCuenta);
            $stmt->bindParam(':BAN_TITULAR', $Titular);
            $stmt->bindParam(':BAN_RIF', $Rif);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }

        //INSERT de cuenta pagomovil
        public function insertarPagoMovil($ID_Tienda, $CedulapagoMovil, $BancopagoMovil, $TelefonopagoMovil){
            $stmt = $this->dbh->prepare("INSERT INTO pagomovil(ID_Tienda, cedula_pagomovil, banco_pagomovil, telefono_pagomovil, fecha, hora)VALUES (:ID_TIENDA, :CEDULA_PAGOMOVIL, :BANCO_PAGOMOVIL, :TELEFONO_PAGOMOVIL, CURDATE(), CURTIME())");
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);
            $stmt->bindValue(':CEDULA_PAGOMOVIL', $CedulapagoMovil);
            $stmt->bindValue(':BANCO_PAGOMOVIL', $BancopagoMovil);
            $stmt->bindParam(':TELEFONO_PAGOMOVIL', $TelefonopagoMovil);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }        
        
        //INSERT de link acceso a tienda
        public function insertarLinkTienda($ID_Tienda, $LinkAcceso){
            $stmt = $this->dbh->prepare(
                "INSERT INTO destinos(ID_Tienda, link_acceso, fecha, hora)
                 VALUES (:ID_TIENDA, :LINK_ACCESO, CURDATE(), CURTIME())"
            );
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);
            $stmt->bindValue(':LINK_ACCESO', $LinkAcceso);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }

        //INSERT de otros medios de pago
        function insertarOtrosPagos($ID_Tienda, $PagoBolivar, $PagoDolar, $PagoAcordado){
            $stmt = $this->dbh->prepare("INSERT INTO otrospagos(ID_Tienda, efectivoBolivar , efectivoDolar, acordado) VALUES (:ID_TIENDA, :PAGOBOLIVAR, :PAGODOLAR, :ACORDADO)");
            
            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda);
            $stmt->bindValue(':PAGOBOLIVAR', $PagoBolivar);
            $stmt->bindValue(':PAGODOLAR', $PagoDolar);
            $stmt->bindValue(':ACORDADO', $PagoAcordado);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        }
        // //INSERT de las caracteristicas de un producto especifico
        // public function insertarCaracteristicas($ID_Tienda, $ID_Producto, $Caracteristica){
        //     //Debido a que $Caracteristica es un array con varios elemento se hace un recorrido de cada uno para actualizar en cada vuelta
        //     foreach(array_keys($_POST['caracteristica'])as $key){
        //         $Caracteristica = $_POST['caracteristica'][$key];
        //         $stmt = $this->dbh->prepare("INSERT INTO caracteristicaproducto(ID_Tienda, ID_Producto, caracteristica) VALUES(:ID_TIENDA, :ID_PRODUCTO, :CARACTERISTICA)");

        //         // Se vinculan los valores de las sentencias preparadas
        //         $stmt->bindValue(':ID_TIENDA', $ID_Tienda);
        //         $stmt->bindValue(':ID_PRODUCTO', $ID_Producto);
        //         $stmt->bindValue(':CARACTERISTICA', $Caracteristica);

        //         // Se ejecuta la actualización de los datos en la tabla
        //         $stmt->execute();  
        //     } 
        // }

        // public function insertarFotografia($ID_Opcion, $nombre_imgProducto){  
        //     $stmt = $this->dbh->prepare("INSERT INTO opciones(ID_Opcion, fotografia) VALUES(:ID_OPCION,:FOTOGRAFIA)");

        //     //Se vinculan los valores de las sentencias preparadas
        //     //stmt es una abreviatura de statement 
        //     $stmt->bindParam(':FOTOGRAFIA', $nombre_imgProducto);
        //     $stmt->bindParam(':ID_OPCION', $ID_Opcion);
            
        //     //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
        //     $stmt->execute(); 

        //     //Se envia información de cuantos registros se vieron afectados por la consulta
        //     return $stmt->rowCount();
        // }
    }
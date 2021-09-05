<?php
    class RecibePedido_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

        public function insertarUsuario($RecibeDatosUsuario){
            $stmt = $this->dbh->prepare(
                "INSERT INTO usuarios(nombre_usu, apellido_usu, cedula_usu, telefono_usu, correo_usu, Estado_usu, Ciudad_usu, direccion_usu, fecha, hora)
                VALUES(:Nombre, :Apellido, :Cedula, :Telefono, :Correo, :Estado, :Ciudad, :Direccion, CURDATE(), CURTIME())"
            );

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':Nombre', $nombre);
            $stmt->bindParam(':Apellido', $apellido);
            $stmt->bindParam(':Cedula', $cedula);
            $stmt->bindParam(':Telefono', $telefono);
            $stmt->bindParam(':Correo', $correo);
            $stmt->bindParam(':Estado', $Estado);
            $stmt->bindParam(':Ciudad', $Ciudad);
            $stmt->bindParam(':Direccion', $direccion);
            
            // insertar una fila
            $nombre = $RecibeDatosUsuario['Nombre'];
            $apellido = $RecibeDatosUsuario['Apellido'];
            $cedula = $RecibeDatosUsuario['Cedula'];
            $telefono = $RecibeDatosUsuario['Telefono'];
            $correo = $RecibeDatosUsuario['Correo'];
            $Estado = $RecibeDatosUsuario['Estado'];
            $Ciudad = $RecibeDatosUsuario['Ciudad'];
            $direccion = $RecibeDatosUsuario['Direccion'];
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return 'Existe un fallo';
            }
        }
        
        public function insertarPedido($RecibeDatosUsuario, $CodigoTransferencia, $RecibeDatosPedido, $Ale_NroOrden, $Delivery){

            $stmt = $this->dbh->prepare(
                "INSERT INTO pedido(ID_Tienda, ID_Usuario, numeroorden, montoDelivery, montoTienda, montoTotal, despacho, formaPago, codigoPago, fecha, hora)
                VALUES(:ID_Tienda, :ID_Usuario, :NumeroOrden, :MontoDelivery, :MontoTienda, :MontoTotal, :Despacho, :FormaPago, :CodigoPago, CURDATE(), CURTIME())"
            ); 

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':ID_Tienda', $RecibeDatosPedido['ID_Tienda']);
            $stmt->bindParam(':ID_Usuario', $RecibeDatosUsuario['ID_Usuario']);
            $stmt->bindParam(':MontoTienda', $RecibeDatosUsuario['MontoTienda']);
            $stmt->bindParam(':MontoTotal', $RecibeDatosUsuario['MontoTotal']);
            $stmt->bindParam(':NumeroOrden', $Ale_NroOrden);
            $stmt->bindParam(':MontoDelivery', $Delivery);
            $stmt->bindParam(':CodigoPago', $CodigoTransferencia);
            $stmt->bindParam(':Despacho', $RecibeDatosPedido['Despacho']);
            $stmt->bindParam(':FormaPago', $RecibeDatosPedido['FormaPago']);
                        
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return 'Existe un fallo';
            }
        }
        
        function insertarDetallePedido($RecibeDatosPedido, $Ale_NroOrden, $Seccion, $Producto, $Cantidad, $Opcion, $Precio, $Total){
            $stmt = $this->dbh->prepare(
                "INSERT INTO detallepedido(ID_Tienda, numeroorden, seccion, producto, cantidad, opcion, precio, total)
                VALUES(:ID_TIENDA, :Ale_NroOrden, :SECCION, :PRODUCTO, :CANTIDAD, :OPCION, :PRECIO, :TOTAL)"
            ); 

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':ID_TIENDA', $RecibeDatosPedido);
            $stmt->bindParam(':Ale_NroOrden', $Ale_NroOrden);
            $stmt->bindParam(':SECCION', $Seccion);
            $stmt->bindParam(':PRODUCTO', $Producto);
            $stmt->bindParam(':CANTIDAD', $Cantidad);
            $stmt->bindParam(':OPCION', $Opcion);
            $stmt->bindParam(':PRECIO', $Precio);
            $stmt->bindParam(':TOTAL', $Total);

             //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return 'Existe un fallo';
            }
        }

        // SELECT del detalle del pedido realizado
        function consultarPedido($Ale_NroOrden){                    
            $stmt = $this->dbh->prepare(
                "SELECT ID_Pedidos, seccion, producto, cantidad, opcion, precio, total, detallepedido.numeroorden, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, DATE_FORMAT(hora, '%h:%i %p') AS hora, pedido.montoDelivery, pedido.montoTienda, pedido.montoTotal, pedido.despacho, pedido.formaPago, pedido.codigoPago, pedido.capture 
                FROM detallepedido INNER JOIN pedido ON detallepedido.numeroorden=pedido.numeroorden 
                WHERE detallepedido.numeroorden = :ALE_NUMERO_ORDEN"
            );
            
            $stmt->bindValue(':ALE_NUMERO_ORDEN', $Ale_NroOrden, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo';
            }
        }

        // SELECT del usuario que realizó un pedido
        function consultarUsuario($Cedula){                    
            $stmt = $this->dbh->prepare(
                "SELECT nombre_usu, apellido_usu, cedula_usu, telefono_usu, correo_usu, Estado_usu, Ciudad_usu, direccion_usu
                FROM usuarios 
                WHERE cedula_usu = :CEDULA");
            
            $stmt->bindValue(':CEDULA', $Cedula, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo';
            }        
        } 

        // SELECT del pedido realizado
        function consultarCorreo($ID_Tienda){                    
            $stmt = $this->dbh->prepare("SELECT ID_Tienda, correo_AfiCom, tiendas.nombre_Tien FROM afiliado_com INNER JOIN tiendas ON afiliado_com.ID_AfiliadoCom=tiendas.ID_AfiliadoCom WHERE ID_Tienda = :ID_TIENDA");
            
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo';
            }        
        }

        //UPDATE para agregar la imagen del capture de pago
        function UpdateCapturePago($Ale_NroOrden, $archivonombre){
            $stmt = $this->dbh->prepare(
                "UPDATE pedido 
                 SET capture = :CAPTURE 
                 WHERE numeroorden = :Ale_NroOrden"
            );

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':CAPTURE', $archivonombre);
            $stmt->bindValue(':Ale_NroOrden', $Ale_NroOrden);

            //Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return 'Existe un fallo';
            }
            
        }
    }
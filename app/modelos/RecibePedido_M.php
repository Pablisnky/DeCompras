<?php
    class RecibePedido_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function insertarUsuario($RecibeDatosUsuario, $CodigoTransferencia, $RecibeDatosPedido, $Aleatorio, $Delivery){
            // echo "<pre>";
            // print_r($RecibeDatosPedido);
            // echo "</pre>";
            
            // echo "<pre>";
            // print_r($RecibeDatosUsuario);
            // echo "</pre>";
            
            // echo "<pre>";
            // print_r($CodigoTransferencia);
            // echo "</pre>";
            
            // echo "<pre>";
            // print_r($Delivery);
            // echo "</pre>";
                        
            // echo "<pre>";
            // print_r($Aleatorio);
            // echo "</pre>";
            // exit();
            $stmt = $this->dbh->prepare("INSERT INTO usuarios(ID_Pedido, nombre_usu, apellido_usu, cedula_usu, telefono_usu, correo_usu, direccion_usu, montoDelivery, montoTienda, montoTotal, despacho, formaPago, codigoPago)VALUES (:ID_Pedido, :Nombre, :Apellido, :Cedula, :Telefono, :Correo, :Direccion, :MontoDelivery, :MontoTienda, :MontoTotal, :Despacho, :FormaPago, :CodigoPago)"); 

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':Nombre', $nombre);
            $stmt->bindParam(':Apellido', $apellido);
            $stmt->bindParam(':Cedula', $cedula);
            $stmt->bindParam(':Telefono', $telefono);
            $stmt->bindParam(':Correo', $correo);
            $stmt->bindParam(':Direccion', $direccion);
            $stmt->bindParam(':MontoDelivery', $Delivery);
            $stmt->bindParam(':MontoTienda', $montoTienda);
            $stmt->bindParam(':MontoTotal', $montoTotal);
            $stmt->bindParam(':Despacho', $despacho);
            $stmt->bindParam(':FormaPago', $formaPago);
            $stmt->bindParam(':CodigoPago', $codigoPago);
            $stmt->bindParam(':ID_Pedido', $ID_Pedido);
            
            // insertar una fila
            $nombre = $RecibeDatosUsuario['Nombre'];
            $apellido = $RecibeDatosUsuario['Apellido'];
            $cedula = $RecibeDatosUsuario['Cedula'];
            $telefono = $RecibeDatosUsuario['Telefono'];
            $correo = $RecibeDatosUsuario['Correo'];
            $direccion = $RecibeDatosUsuario['Direccion'];
            $montoTienda = $RecibeDatosUsuario['MontoTienda']; 
            $montoTotal = $RecibeDatosUsuario['MontoTotal']; 
            $despacho = $RecibeDatosPedido['Despacho']; 
            $formaPago = $RecibeDatosPedido['FormaPago']; 
            $codigoPago = $CodigoTransferencia ;
            $ID_Pedido = $Aleatorio;
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        // Warning: PDOStatement::execute(): SQLSTATE[23000]: Integrity constraint violation: 1048 Column 'codigoPago' cannot be null in C:\xampp\htdocs\proyectos\PidoRapido\app\modelos\RecibePedido_M.php on line 46


        
        function insertarPedido($Seccion, $Producto, $Cantidad, $Opcion, $Precio, $Total, $Aleatorio, $RecibeDatosPedido, $Hora){
            $stmt = $this->dbh->prepare("INSERT INTO pedidos(seccion, producto, cantidad, opcion, precio, total, aleatorio, ID_Tienda, fecha, hora)VALUES (:SECCION, :PRODUCTO, :CANTIDAD, :OPCION, :PRECIO, :TOTAL, :ALEATORIO, :ID_TIENDA, CURDATE(), :HORA)"); 

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':SECCION', $Seccion);
            $stmt->bindParam(':PRODUCTO', $Producto);
            $stmt->bindParam(':CANTIDAD', $Cantidad);
            $stmt->bindParam(':OPCION', $Opcion);
            $stmt->bindParam(':PRECIO', $Precio);
            $stmt->bindParam(':TOTAL', $Total);
            $stmt->bindParam(':ALEATORIO', $Aleatorio);
            $stmt->bindParam(':ID_TIENDA', $RecibeDatosPedido['ID_Tienda']);
            $stmt->bindParam(':HORA', $Hora);
            
            //Se ejecuta la inserción de los datos en la tabla por medio de sentencia preparada
            $stmt->execute();            
            return true;
        }

        // SELECT del pedido realizado
        function consultarPedido($Aleatorio){                    
            $stmt = $this->dbh->prepare("SELECT ID_Pedidos, seccion, producto, cantidad, opcion, precio, total, aleatorio, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, DATE_FORMAT(hora, '%h:%i:%p') AS hora, usuarios.montoDelivery, usuarios.montoTienda, usuarios.montoTotal, usuarios.despacho, usuarios.formaPago, usuarios.codigoPago, usuarios.capture FROM pedidos INNER JOIN usuarios ON pedidos.aleatorio=usuarios.ID_Pedido WHERE aleatorio = :ALEATORIO");
            
            $stmt->bindValue(':ALEATORIO', $Aleatorio, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        // SELECT del usuario que realizó un pedido
        function consultarUsuario($Aleatorio){                    
            $stmt = $this->dbh->prepare("SELECT nombre_usu, apellido_usu, cedula_usu, telefono_usu, correo_usu, direccion_usu, montoDelivery, montoTienda, montoTotal FROM usuarios WHERE ID_Pedido = :ALEATORIO");
            
            $stmt->bindValue(':ALEATORIO', $Aleatorio, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
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
                return false;
            }        
        }

        //UPDATE para agregar la imagen del capture de pago
        function UpdateCapturePago($Aleatorio, $archivonombre){
            $stmt = $this->dbh->prepare("UPDATE usuarios SET capture = :CAPTURE WHERE ID_PEDIDO = :ALEATORIO");

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':CAPTURE', $archivonombre);
            $stmt->bindValue(':ALEATORIO', $Aleatorio);

            //Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
            
        }
    }
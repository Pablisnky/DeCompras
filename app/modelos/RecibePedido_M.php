<?php
    class RecibePedido_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function insertarUsuario($RecibeDatosUsuario, $RecibeDatosPedido, $CodigoPago, $Aleatorio){
            $stmt = $this->dbh->prepare("INSERT INTO usuarios(nombre_usu, apellido_usu, cedula_usu, telefono_usu, correo_usu, direccion_usu, montoTotal, despacho, formaPago, codigoPago, ID_Pedido)VALUES (:Nombre, :Apellido, :Cedula, :Telefono, :Correo, :Direccion, :MontoTotal, :Despacho, :FormaPago, :CodigoPago, :ID_Pedido)"); 

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':Nombre', $nombre);
            $stmt->bindParam(':Apellido', $apellido);
            $stmt->bindParam(':Cedula', $cedula);
            $stmt->bindParam(':Telefono', $telefono);
            $stmt->bindParam(':Correo', $correo);
            $stmt->bindParam(':Direccion', $direccion);
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
            $montoTotal = $RecibeDatosUsuario['MontoTotal']; 
            $despacho = $RecibeDatosPedido['Despacho']; 
            $formaPago = $RecibeDatosPedido['FormaPago']; 
            $codigoPago = $CodigoPago;
            $ID_Pedido = $Aleatorio;
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        function insertarPedido($Seccion, $Producto, $Cantidad, $Opcion, $Precio, $Total, $Aleatorio, $RecibeDatosPedido){
            $stmt = $this->dbh->prepare("INSERT INTO pedidos(seccion, producto, cantidad, opcion, precio, total, aleatorio, ID_Tienda, fecha, hora)VALUES (:SECCION, :PRODUCTO, :CANTIDAD, :OPCION, :PRECIO, :TOTAL, :ALEATORIO, :ID_TIENDA, CURDATE(), time_format(NOW(),'%H:%i'))"); 

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
            
            //Se ejecuta la inserción de los datos en la tabla
            $stmt->execute();

            //Se envia información de cuantos registros se vieron afectados por la consulta
            // return $stmt->rowCount();
        }

        // SELECT del pedido realizado
        function consultarPedido($Aleatorio){                    
            $stmt = $this->dbh->prepare("SELECT ID_Pedidos, seccion, producto, cantidad, opcion, precio, total, aleatorio, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, DATE_FORMAT(hora, '%h:%i:%p') AS hora, usuarios.montoTotal, usuarios.despacho, usuarios.formaPago, usuarios.codigoPago FROM pedidos INNER JOIN usuarios ON pedidos.aleatorio=usuarios.ID_Pedido WHERE aleatorio = :ALEATORIO");
            
            $stmt->bindValue(':ALEATORIO', $Aleatorio, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        // SELECT del pedido realizado
        function consultarUsuario($Aleatorio){                    
            $stmt = $this->dbh->prepare("SELECT nombre_usu, apellido_usu, cedula_usu, telefono_usu, correo_usu, direccion_usu, montoTotal FROM usuarios WHERE ID_Pedido = :ALEATORIO");
            
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
    }
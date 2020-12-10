<?php
    class RecibePedido_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function insertarUsuario($RecibeDatos, $Aleatorio){
            $stmt = $this->dbh->prepare("INSERT INTO usuarios(nombre_usu, apellido_usu, cedula_usu, telefono_usu, direccion_usu, ID_Pedido)VALUES (:Nombre, :Apellido, :Cedula, :Telefono, :Direccion, :ID_Pedido)"); 

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':Nombre', $nombre);
            $stmt->bindParam(':Apellido', $apellido);
            $stmt->bindParam(':Cedula', $cedula);
            $stmt->bindParam(':Telefono', $telefono);
            $stmt->bindParam(':Direccion', $direccion);
            $stmt->bindParam(':ID_Pedido', $ID_Pedido);

            // insertar una fila
            $nombre = $RecibeDatos['Nombre'];
            $apellido = $RecibeDatos['Apellido'];
            $cedula = $RecibeDatos['Cedula'];
            $telefono = $RecibeDatos['Telefono'];
            $direccion = $RecibeDatos['Direccion'];
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
            $stmt = $this->dbh->prepare("INSERT INTO pedidos(seccion, producto, cantidad, opcion, precio, total, aleatorio, ID_Tienda, codigoPago, fecha, hora)VALUES (:SECCION, :PRODUCTO, :CANTIDAD, :OPCION, :PRECIO, :TOTAL, :ALEATORIO, :ID_TIENDA, :CODIGO_PAGO, CURDATE(), time_format(NOW(),'%H:%i'))"); 

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
            $stmt->bindParam(':CODIGO_PAGO', $RecibeDatosPedido['CodigoPago']);
            
            //Se ejecuta la inserción de los datos en la tabla
            $stmt->execute();
        }
    }
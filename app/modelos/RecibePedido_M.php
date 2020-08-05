<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class RecibePedido_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        //Se CONSULTAN los productos de la tienda seleccionada, llamada desde funcionesVarios.js en la funcion vitrina()
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
        
        function insertarPedio($Pedido, $Aleatorio){
            foreach($Pedido as $item){
                $stmt = $this->dbh->prepare("INSERT INTO pedidos(cantidad, producto, precio, total, aleatorio, fecha, hora)VALUES (:cantidad, :producto, :precio, :total, :aleatorio, CURDATE(), time_format(NOW(), '%H:%i'))"); 

                //Se vinculan los valores de las sentencias preparadas
                //ztmt es una abreviatura de statement 
                $stmt->bindParam(':cantidad', $Cantidad);
                $stmt->bindParam(':producto', $Producto);
                $stmt->bindParam(':precio', $Precio);
                $stmt->bindParam(':total', $Total);
                $stmt->bindParam(':aleatorio', $Aleatorio);

                // insertar una fila
                $Cantidad = $item['Cantidad'];
                $Producto = $item['Producto'];
                $Precio = $item['Precio'];
                $Total = $item['Total'];
                
                //Se ejecuta la inserción de los datos en la tabla
                $stmt->execute();
            }
        }
    }
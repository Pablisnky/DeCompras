<?php
    class RecibePedidoMayorista_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function insertarPedidoMayorista($RecibeDatosMinorista, $Ale_NroOrden){

            $stmt = $this->dbh->prepare(
                "INSERT INTO pedidomayorista(ID_AfiliadoMin, codigoDespacho, numeroorden_May, montoTotal, fecha, hora)
                VALUES(:ID_MINORISTA, :CODIGODESPACHO, :NUMEROORDEN, :MONTOTOTAL, CURDATE(), CURTIME())"
            ); 

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':CODIGODESPACHO', $RecibeDatosMinorista['CodigoMinorista']);
            $stmt->bindParam(':ID_MINORISTA', $RecibeDatosMinorista['ID_Minorista']);
            $stmt->bindParam(':NUMEROORDEN', $Ale_NroOrden);
            $stmt->bindParam(':MONTOTOTAL', $RecibeDatosMinorista['MontoTienda']);
                        
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return 'Existe un fallo';
            }
        }
        
        function insertarDetallePedidoMayorista($Ale_NroOrden, $Seccion, $Producto, $Opcion, $Cantidad, $Precio, $Total){
            $stmt = $this->dbh->prepare(
                "INSERT INTO detallepedidomayorista(numeroorden_May, seccion_May, producto_May, opcion_May,cantidad_May, precio_May, total_May)
                VALUES(:ALE_N_ORDEN, :SECCION, :PRODUCTO, :OPCION, :CANTIDAD, :PRECIO, :TOTAL)"
            ); 

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':ALE_N_ORDEN', $Ale_NroOrden);
            $stmt->bindParam(':SECCION', $Seccion);
            $stmt->bindParam(':PRODUCTO', $Producto);
            $stmt->bindParam(':OPCION', $Opcion);
            $stmt->bindParam(':CANTIDAD', $Cantidad);
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

        // SELECT 
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

        // SELECT de unidades en existencia de un producto
        function consultarExistenciaMayorista($ID_Opcion){                    
            $stmt = $this->dbh->prepare(
                "SELECT cantidadMay
                 FROM opcionesmayorista
                 WHERE ID_OpcionMay  = :ID_OPCION_MAY"
            );
            
            $stmt->bindValue(':ID_OPCION_MAY', $ID_Opcion, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo';
            }        
        }

        //UPDATE para actualizar invenario
        function UpdateInventarioMayorista($ID_Opcion, $Inventario){
            $stmt = $this->dbh->prepare(
                "UPDATE opcionesmayorista
                 SET cantidadMay = :CANTIDAD 
                 WHERE ID_OpcionMay = :ID_OPCION"
            );

            //Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_OPCION', $ID_Opcion);
            $stmt->bindValue(':CANTIDAD', $Inventario);

            //Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return 'Existe un fallo';
            } 
        }
    }
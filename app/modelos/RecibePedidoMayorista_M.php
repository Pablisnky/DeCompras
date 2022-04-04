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
        
        function insertarDetallePedidoMayorista($Ale_NroOrden, $Seccion, $Producto, $Opcion, $Cantidad, $Precio, $Total, $ID_Producto){ 
            $stmt = $this->dbh->prepare(
                "INSERT INTO detallepedidomayorista(numeroorden_May, seccion_May, producto_May, opcion_May,cantidad_May, precio_May, total_May, ID_ProductoMay)
                VALUES(:ALE_N_ORDEN, :SECCION, :PRODUCTO, :OPCION, :CANTIDAD, :PRECIO, :TOTAL, :ID_PRODUCTO)"
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
            $stmt->bindParam(':ID_PRODUCTO', $ID_Producto);

             //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return 'Existe un fallo';
            }
        }

        // SELECT del detalle del pedido realizado  detallepedidomayorista.numeroorden
        function consultarPedidoMayorista($Ale_NroOrden){                    
            $stmt = $this->dbh->prepare(
                "SELECT ID_Pedido_May, seccion_May, producto_May, cantidad_May, opcion_May, precio_May, total_May, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, DATE_FORMAT(hora, '%h:%i %p') AS hora, pedidomayorista.montoTotal, pedidomayorista.numeroorden_May
                FROM detallepedidomayorista  
                INNER JOIN pedidomayorista ON detallepedidomayorista.numeroorden_May=pedidomayorista.numeroorden_May 
                WHERE detallepedidomayorista.numeroorden_May = :ALE_NUMERO_ORDEN"
            );
            
            $stmt->bindValue(':ALE_NUMERO_ORDEN', $Ale_NroOrden, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo';
            }
        }

        // SELECT del destinatario del correo
        function consultarCorreo($Codigo_Venta){                    
            $stmt = $this->dbh->prepare(
                "SELECT nombre_AfiVen, apellido_AfiVen, correo_AfiVen
                FROM  afiliado_ven 
                WHERE codigoVenta_AfiVen = :CODIGO_VENTA"
            );
            
            $stmt->bindValue(':CODIGO_VENTA', $Codigo_Venta, PDO::PARAM_STR);

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
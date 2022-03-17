<?php
    class CuentaVendedor_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
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
           
        //SELECT de la IMAGEN de un producto determinado
        public function consultarClientes_Ven($ID_Vendedor){
            $stmt = $this->dbh->prepare(
                "SELECT ID_AfiliadoMin, nombre_AfiMin, codigodespacho
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

        //SELECT de la IMAGEN de un producto determinado
        public function consultarDetalleClientes_Ven($ID_Minorista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_AfiliadoMin, nombre_AfiMin, rif_AfiMin, telefono_AfiMin, correo_AfiMin, direccion_AfiMin, codigodespacho
                FROM  minorista  
                WHERE ID_AfiliadoMin = :ID_MINORISTA"
            );

            $stmt->bindParam(':ID_MINORISTA', $ID_Minorista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }

        //INSERT de datos de minorista
        public function insertarMinorista($RecibeMinorista, $nombre_imgMinorista, $tipo_imgMinorista, $tamanio_imgMinorista, $Ale_CodigoMinorista){
            $stmt = $this->dbh->prepare(
                "INSERT INTO minorista (ID_Vendedor, nombre_AfiMin, rif_AfiMin, codigodespacho, telefono_AfiMin, correo_AfiMin, Zona_AfiMin, direccion_AfiMin, nombreImg_AfiMin, tipo_AfiMin, tamanio_AfiMin, fecha, hora) 
                VALUES(:ID_VENDEDOR, :NOMBRE_AFIMIN, :RIF_AFIMIN, :CODIGO_AFIMIN, :TELEFONO_AFIMIN, :CORREO_AFIMIN, :ZONA_AFIMIN, :DIRECCION_AFIMIN, :NOMBREIMG_AFIMIN, :TIPOIMG_AFIMIN, :TAMANIOIMG_AFIMIN, CURDATE(), CURDATE())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_VENDEDOR', $RecibeMinorista['id_vendedor']);
            $stmt->bindParam(':NOMBRE_AFIMIN', $RecibeMinorista['nombre_Min']);
            $stmt->bindParam(':RIF_AFIMIN', $RecibeMinorista['rif_Min']);
            $stmt->bindParam(':CODIGO_AFIMIN', $Ale_CodigoMinorista);
            $stmt->bindParam(':TELEFONO_AFIMIN', $RecibeMinorista['telefono_Min']);
            $stmt->bindParam(':CORREO_AFIMIN', $RecibeMinorista['correo_Min']);
            $stmt->bindParam(':ZONA_AFIMIN', $RecibeMinorista['Zona_Min']);
            $stmt->bindParam(':DIRECCION_AFIMIN', $RecibeMinorista['direccion_Min']);
            $stmt->bindParam(':NOMBREIMG_AFIMIN', $nombre_imgMinorista);
            $stmt->bindParam(':TIPOIMG_AFIMIN', $tipo_imgMinorista);
            $stmt->bindParam(':TAMANIOIMG_AFIMIN', $tamanio_imgMinorista);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        } 
        
        //SELECT de los pedidos correspondientes a un vendedor especifico 
        public function consultarPedidos_Ven($ID_Vendedor){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_AfiMin, numeroorden_May, montoTotal, pedidomayorista.factura, DATE_FORMAT(fecha, '%d-%m-%y') AS FechaPedido, DATE_FORMAT(hora, '%h:%i %p') AS HoraPedido, pagado                
                FROM minorista                                 
                INNER JOIN pedidomayorista ON pedidomayorista.codigoDespacho=minorista.codigoDespacho 
                WHERE ID_Vendedor = :ID_VENDEDOR                               
                ORDER BY fecha DESC, hora DESC"
            );

            $stmt->bindParam(':ID_VENDEDOR', $ID_Vendedor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }

        //SELECT del detalle de un pedido de un vendedor especifico
        public function consultarDetallePedido_Ven($Nro_Orden){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_AfiMin, seccion_May, producto_May, opcion_May, cantidad_May, precio_May, total_May, DATE_FORMAT(fecha,'%d-%m-%y') AS FechaPedido, DATE_FORMAT(hora,'%h:%i %p') AS HoraPedido
                FROM pedidomayorista 
                INNER JOIN detallepedidomayorista ON pedidomayorista.numeroorden_May =detallepedidomayorista.numeroorden_May 
                INNER JOIN minorista ON pedidomayorista.ID_AfiliadoMin=minorista.ID_AfiliadoMin 
                WHERE pedidomayorista.numeroorden_May = :NRO_ORDEN"
            );
            
            $stmt->bindParam(':NRO_ORDEN', $Nro_Orden, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }    

        //SELECT de un pedido de un vendedor especifico
        public function consultarPedido_Ven($Nro_Orden){ 
            $stmt = $this->dbh->prepare(
                "SELECT montoTotal, pagado, factura
                FROM pedidomayorista  
                WHERE numeroorden_May = :NRO_ORDEN"
            );
            
            $stmt->bindParam(':NRO_ORDEN', $Nro_Orden, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return 'Existe un fallo';
            }
        }    

        //SELECT de los pedidos por pagar de un vendedor especifico
        public function consultarPedidosPorCobrar_Ven($ID_Vendedor){
            $stmt = $this->dbh->prepare(
                "SELECT montoTotal, pedidomayorista.fecha, minorista.nombre_AfiMin, pedidomayorista.numeroorden_May 
                FROM pedidomayorista                 
                INNER JOIN minorista ON pedidomayorista.ID_AfiliadoMin =minorista.ID_AfiliadoMin  
                WHERE minorista.ID_Vendedor = :ID_VENDEDOR AND pagado = 0 
                ORDER BY fecha DESC"
            );

            $stmt->bindParam(':ID_VENDEDOR', $ID_Vendedor, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }
        
        //SELECT del saldo total abonado a un pedido
        public function consultarDeudaPedido_Ven($Nro_Orden){ 
            $stmt = $this->dbh->prepare(
                "SELECT  SUM(abono) AS TotalAbonado, numeroorden_May 
                FROM pagosmayorista 
                WHERE numeroorden_May = :NRO_ORDEN"
            );
            
            $stmt->bindParam(':NRO_ORDEN', $Nro_Orden, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }     

        //SELECT del saldo total abonado a un pedido
        public function consultarOrdeneseAbonadas($Ordenes){ 
            //Debido a que $Ordenes es un array con todas los Nro. de ordenes del vendedor especificado, deben consultarse uno a uno mediante un ciclo
            foreach($Ordenes as $key)  :
                $stmt = $this->dbh->prepare(
                    "SELECT DISTINCT numeroorden_May 
                    FROM pagosmayorista 
                    WHERE abono != '' " 
                );
                
                $stmt->bindParam(':NRO_ORDEN', $key, PDO::PARAM_INT);
            
                $stmt->execute();
                
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            endforeach;
        }        

        //SELECT del saldo total abonado a un pedido
        public function consultarDeudasEnPedido_Ven($Ordenes){ 
            //Debido a que $Ordenes es un array con todas los Nro. de ordenes del vendedor especificado, deben consultarse uno a uno mediante un ciclo
            $AlmacenarOrdenes = [];
            foreach($Ordenes as $key)  :
                $stmt = $this->dbh->prepare(
                    "SELECT SUM(abono) AS TotalAbonado, pedidomayorista.numeroorden_May, montoTotal 
                    FROM pagosmayorista 
                    INNER JOIN pedidomayorista ON pagosmayorista.numeroorden_May=pedidomayorista.numeroorden_May 
                    WHERE pedidomayorista.numeroorden_May = :NRO_ORDEN"
                );
                
                $stmt->bindParam(':NRO_ORDEN', $key, PDO::PARAM_INT);
            
                $stmt->execute();

               array_push($AlmacenarOrdenes, $stmt->fetchAll(PDO::FETCH_ASSOC));
            endforeach;
            return $AlmacenarOrdenes;
        }        
        
        //SELECT del saldo total abonado a un pedido 
        public function consultarAbonosPedido_Ven($Nro_Orden){ 
            $stmt = $this->dbh->prepare(
                "SELECT pedidomayorista.factura, abono, fechaabono, formapago
                FROM pagosmayorista 
                INNER JOIN pedidomayorista ON pagosmayorista.numeroorden_May=pedidomayorista.numeroorden_May
                WHERE pedidomayorista.numeroorden_May = :NRO_ORDEN"
            );
            
            $stmt->bindParam(':NRO_ORDEN', $Nro_Orden, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }       

        //INSERT de saldo a bonado a un pedido
        public function insertarPagoAbonado($RecibeAbono){
            $stmt = $this->dbh->prepare(
                "INSERT INTO pagosmayorista(numeroorden_May, factura, abono, formapago, fechaabono,  horaabono) 
                VALUES(:NUMEROORDEN, :FACTURA, :ABONO, :FORMAPAGO, CURDATE(), CURTIME())"
            );

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':NUMEROORDEN', $RecibeAbono['Nro_Orden']);
            $stmt->bindParam(':FACTURA', $RecibeAbono['Factura']);
            $stmt->bindParam(':ABONO', str_replace(',', '.', $RecibeAbono['Monto_Abono']));//en BD los decimales deben entrar con .
            $stmt->bindParam(':FORMAPAGO', $RecibeAbono['Metodo_Abono']);

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();
        } 

        //UPDATE del status del pedido, se cambia a pagado totalmente
        public function actualizarPagoAbonado($RecibeAbono){
            $stmt = $this->dbh->prepare(
                "UPDATE  pedidomayorista   
                SET pagado = :PAGADO
                WHERE numeroorden_May = :NUMEROORDEN"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':PAGADO', 1);
            $stmt->bindParam(':NUMEROORDEN', $RecibeAbono['Nro_Orden']); 

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        //UPDATE del Nro de factura
        public function actualizarFactura($RecibeFactura){ 
            $stmt = $this->dbh->prepare(
                "UPDATE pedidomayorista   
                SET factura = :NUMEROFACTURA
                WHERE numeroorden_May = :NUMEROORDEN"
            );

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindParam(':NUMEROFACTURA', $RecibeFactura['Nro_factura']);
            $stmt->bindParam(':NUMEROORDEN', $RecibeFactura['Nro_orden']); 

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        //SELECT 
        public function consultarDatosMayorista($ID_Mayorista){ 
            $stmt = $this->dbh->prepare(
                "SELECT nombreMay, fotografiaMay
                FROM mayorista 
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
    }
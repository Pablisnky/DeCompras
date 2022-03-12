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
        
        //SELECT de los pedidos de n vendedor especifico
        public function consultarPedidos_Ven($ID_Vendedor){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_AfiMin, numeroorden_May, montoTotal, pedidomayorista.fecha, pedidomayorista.hora 
                FROM minorista 
                INNER JOIN pedidomayorista ON pedidomayorista.codigoDespacho=minorista.codigoDespacho 
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
        
        //SELECT de los pedidos de n vendedor especifico
        public function consultarDetallePedido_Ven($Nro_Orden){
            $stmt = $this->dbh->prepare(
                "SELECT seccion_May, producto_May, opcion_May, cantidad_May, precio_May, total_May, fecha, hora 
                FROM pedidomayorista  
                INNER JOIN  detallepedidomayorista ON pedidomayorista.numeroorden_May =detallepedidomayorista.numeroorden_May  
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
    }
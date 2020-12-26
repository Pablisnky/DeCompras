<?php
    class NoConformidad_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //INSERT de una no conformidad en un despacho
        public function insertarNoConformidad($RecibeNoConformidad){
            // echo "<pre>";
            // print_r($RecibeNoConformidad);
            // echo "</pre>";
            // exit();
            $stmt = $this->dbh->prepare("INSERT INTO noconformidades(ID_Pedido, ID_Tienda, noConformidad_1, noConformidad_2, noConformidad_3, noConformidad_4, descripcion) VALUES(:ID_PEDIDO, :ID_TIENDA, :NOCONFORMIDAD_1, :NOCONFORMIDAD_2, :NOCONFORMIDAD_3, :NOCONFORMIDAD_4, :DESCRIPCION)");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ID_PEDIDO', $id_pedido);
            $stmt->bindParam(':ID_TIENDA', $id_tienda);
            $stmt->bindParam(':NOCONFORMIDAD_1', $noConformidad_1);
            $stmt->bindParam(':NOCONFORMIDAD_2', $noConformidad_2);
            $stmt->bindParam(':NOCONFORMIDAD_3', $noConformidad_3);
            $stmt->bindParam(':NOCONFORMIDAD_4', $noConformidad_4);
            $stmt->bindParam(':DESCRIPCION', $descripcion);
            
            // insertar una fila
            $id_pedido = $RecibeNoConformidad['ID_Pedido'];
            $id_tienda = $RecibeNoConformidad['ID_Tienda'];
            $noConformidad_1 = $RecibeNoConformidad['NoConformidad_1'];
            $noConformidad_2 = $RecibeNoConformidad['NoConformidad_2'];
            $noConformidad_3 = $RecibeNoConformidad['NoConformidad_3'];
            $noConformidad_4 = $RecibeNoConformidad['NoConformidad_4'];
            $descripcion = $RecibeNoConformidad['OtraNoConformidad'];

            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            $stmt->execute();

            //Se envia información de cuantos registros se vieron afectados por la consulta
            // return $stmt->rowCount();
        }
    }
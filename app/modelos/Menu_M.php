<?php
    class Menu_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //SELECT de tiendas o de productos ofrecidos en tiendas
        public function consultarImagenePrincipal(){                                
            $stmt = $this->dbh->prepare("SELECT ID_Producto, fotografia  FROM opciones INNER JOIN productos_opciones ON opciones.ID_Opcion=productos_opciones.ID_Opcion");

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function InsertarImagenePrincipal($Imagenes){
            foreach($Imagenes as $Key):
                $stmt = $this->dbh->prepare("INSERT INTO imagenes(ID_Producto, nombre_img, fecha, hora) VALUES(:ID_PRODUCTO, :NOMBRE_IMG, CURDATE(), CURTIME())");

                //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
                $stmt->bindParam(':ID_PRODUCTO', $Key['ID_Producto']);
                $stmt->bindParam(':NOMBRE_IMG', $Key['fotografia']);
                
                //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
                $stmt->execute();       
            endforeach;         
        }
    }
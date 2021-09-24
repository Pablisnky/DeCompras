<?php
    class Ciudades_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //SELECT de las ciudades con tiendas disponibles para mostrar a usuarios
        public function consultarEstadosTiendas(){                                
            $stmt = $this->dbh->query(
                "SELECT DISTINCT estado_Tien 
                FROM tiendas 
                WHERE parroquia_Tien != '' 
                AND publicar = 1 
                ORDER BY estado_Tien 
                ASC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de las ciudades con tiendas
        public function consultarCiudadesTiendas(){                                
            $stmt = $this->dbh->query(
                "SELECT DISTINCT parroquia_Tien, estado_Tien 
                 FROM tiendas 
                 WHERE parroquia_Tien != '' 
                 AND publicar = 1 "
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
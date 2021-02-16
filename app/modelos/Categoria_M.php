<?php
    class Categoria_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //SELECT de las ciudades con tiendas
        public function consultarEstadosTiendas(){                                
            $stmt = $this->dbh->query("SELECT DISTINCT estado_Tien FROM tiendas WHERE parroquia_Tien != '' AND publicar = 1");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de las ciudades con tiendas
        public function consultarCiudadesTiendas(){                                
            $stmt = $this->dbh->query("SELECT DISTINCT parroquia_Tien, estado_Tien FROM tiendas WHERE parroquia_Tien != '' ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        //SELECT de tiendas que pueden ser publicadas en el catalogo de tiendas
        public function consultarCantidadTiendas($Parroquia){                                
            $stmt = $this->dbh->prepare("SELECT COUNT(*) AS cantidad, tiendas_categorias.ID_Categoria FROM tiendas INNER JOIN tiendas_categorias ON tiendas.ID_Tienda=tiendas_categorias.ID_Tienda WHERE publicar = :PUBLICAR AND parroquia_Tien = :PARROQUIA GROUP BY ID_Categoria");
            
            $stmt->bindValue(':PUBLICAR', 1, PDO::PARAM_INT);
            $stmt->bindParam(':PARROQUIA', $Parroquia, PDO::PARAM_STR);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    }
?>
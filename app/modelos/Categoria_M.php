<?php
    class Categoria_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //SELECT de las ciudades con tiendas disponibles para mostrar a usuarios
        public function consultarEstadosTiendas(){                                
            $stmt = $this->dbh->query(
                "SELECT DISTINCT estado_Tien 
                FROM tiendas 
                WHERE parroquia_Tien != '' 
                AND publicar_Tien = 1 
                ORDER BY estado_Tien 
                ASC"
            );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT de las ciudades con tiendas
        public function consultarCiudadesTiendas(){                                
            $stmt = $this->dbh->query("SELECT DISTINCT parroquia_Tien, estado_Tien FROM tiendas WHERE parroquia_Tien != '' ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        //SELECT de tiendas que pueden ser publicadas en el catalogo de tiendas y estan afiliadas en una ciudad por categorias
        public function consultarCantidadTiendas($Parroquia){                                
            $stmt = $this->dbh->prepare("SELECT COUNT(*) AS cantidad, tiendas_categorias.ID_Categoria, parroquia_Tien FROM tiendas INNER JOIN tiendas_categorias ON tiendas.ID_Tienda=tiendas_categorias.ID_Tienda WHERE publicar_Tien = :PUBLICAR AND desactivar_Tien = :DESACTIVAR AND parroquia_Tien = :PARROQUIA GROUP BY ID_Categoria ORDER BY cantidad DESC");
            
            $stmt->bindValue(':PUBLICAR', 1, PDO::PARAM_INT);
            $stmt->bindValue(':DESACTIVAR', 0, PDO::PARAM_INT);
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
<?php
    class Inicio_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
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

        //SELECT de los link de acceso existentes
        public function consultarLinkTiendas(){                                
            $stmt = $this->dbh->query(
                "SELECT link_acceso, url 
                 FROM destinos"
                );
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        //SELECT con la información de la hora y fecha del servidor MySQL
        public function consultarFechaHora(){                          
            $stmt = $this->dbh->query("SELECT CURDATE() AS Fecha_MySQL, time_format(NOW(),'%H:%i') AS hora_MySQL ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
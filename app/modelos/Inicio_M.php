<?php
    class Inicio_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
        //SELECT de tiendas que pueden ser publicadas en el catalogo de tiendas
        public function consultarCantidadTiendas(){                                
            $stmt = $this->dbh->prepare("SELECT COUNT(*) AS cantidad, tiendas_categorias.ID_Categoria FROM tiendas INNER JOIN tiendas_categorias ON tiendas.ID_Tienda=tiendas_categorias.ID_Tienda WHERE publicar = :PUBLICAR GROUP BY ID_Categoria");
            
            $stmt->bindValue(':PUBLICAR', 1, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de los link de acceso existentes
        public function consultarLinkTiendas(){                                
            $stmt = $this->dbh->query("SELECT link_acceso, url FROM destinos");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
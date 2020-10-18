<?php
    class Inicio_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }
        
        //SELECT de tiendas o de productos ofrecidos en tiendas
        public function consultarCantidadTiendas(){                                
            $stmt = $this->dbh->prepare("SELECT COUNT(*) AS cantidad, tiendas_categorias.ID_Categoria FROM tiendas INNER JOIN tiendas_categorias ON tiendas.ID_Tienda=tiendas_categorias.ID_Tienda GROUP BY ID_Categoria");

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
    }
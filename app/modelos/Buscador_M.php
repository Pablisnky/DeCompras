<?php
    // require(RUTA_APP . "/clases/Conexion_BD.php");

    class Buscador_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarBusquedaTienda($Buscar){           
            // $Comodin = '$Buscar%';                                 
            // echo $Comodin;                                      
            $stmt = $this->dbh->prepare("SELECT * FROM opciones INNER JOIN productos_opciones ON opciones.ID_Opcion=productos_opciones.ID_Opcion INNER JOIN productos ON productos_opciones.ID_Producto=productos.ID_Producto INNER JOIN tiendas ON productos_opciones.ID_Tienda=tiendas.ID_Tienda WHERE opcion LIKE '$Buscar%' OR productos.producto LIKE '$Buscar%'");

            // $stmt->bindParam(':Buscar', $Comodin, PDO::PARAM_STR);
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
    }
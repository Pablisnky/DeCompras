<?php
    // require(RUTA_APP . "/clases/Conexion_BD.php");

    class Buscador_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarBusquedaTienda($Buscar){           
            // $Comodin = '$Buscar%';                                 
            // echo $Comodin;                                      
            $stmt = $this->dbh->prepare("SELECT * FROM opciones WHERE opcion LIKE '$Buscar%' ");

            // $stmt->bindParam(':Buscar', $Comodin, PDO::PARAM_STR);
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
    }
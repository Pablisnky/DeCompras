<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Vitrina_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
        
        public function consultarDelivery(){
            $stmt = $this->dbh->prepare("SELECT * FROM delivery");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        public function consultarLicoresRest(){
            $stmt = $this->dbh->prepare("SELECT * FROM bar_resto");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        public function consultarAlimentos(){
            $stmt = $this->dbh->prepare("SELECT * FROM alimentos");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        public function consultarRopa(){
            $stmt = $this->dbh->prepare("SELECT * FROM ropa");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        public function consultarProductos(){
            $stmt = $this->dbh->prepare("SELECT * FROM productos");      
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }
    }
<?php
    class Conexion_BD{
        private $Host= DB_HOST;
        private $Usuario= DB_USUARIO;
        private $Password= DB_PASSWORD;
        private $Nombre_base= DB_NOMBRE;

        public $dbh; //database handler
        private $error;

        public function __construct(){
            $dsn= "mysql:host=" . $this->Host . ";dbname=" . $this->Nombre_base;
            $Opciones= array(
                            PDO::ATTR_PERSISTENT => true,
                            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING 
                            //ERRMODE_EXCEPTION   usar en remoto
                       );
            try{
                $this->dbh = new PDO($dsn, $this->Usuario, $this->Password, $Opciones);
                $this->dbh->exec("set names utf8");
            }
            catch(PDOException $e){
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }
    }    
?>
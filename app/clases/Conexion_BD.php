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
                // PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION   //Muestra excepciones en (try catch)
            );
            try{
                $this->dbh = new PDO($dsn, $this->Usuario, $this->Password, $Opciones);
                $this->dbh->exec("set names utf8");

                // print_r($this->dbh);
                // exit;
            }
            catch(PDOException $exepcion){
                $this->error = $exepcion->getMessage();
                echo 'Error al conectarse con la base de datos: ' . $this->error;
            }
        }
    }    
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

                // print_r($this->dbh);
            }
            catch(PDOException $e){
                $this->error = $e->getMessage();
                echo 'Error al conectarse con la base de datos: ' . $this->error;
            }
        }

        //Este método le indica a PDO que inicie una transacción y desactive la confirmación automática hasta que se emita un comando de confirmación.
        public function startTransaction(){   
            $this->dbh->beginTransaction();
        }

        //Este método confirma los cambios de forma permanente en la base de datos 
        public function Commit(){   
            $this->dbh->commit();
        }
        
        //Si hay un error y las transacciones tienen un problema, el método invoca el método rollBack() para hacer que la base de datos regrese a su estado original en caso de que se produzca una excepción de PDO.
        public function Rollback(){  
            $this->dbh->rollback();
        }
    }    
?>
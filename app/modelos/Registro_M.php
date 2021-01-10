<?php
    class Registro_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //INSERTA los datos del afiliado comercial
        public function insertarAfiliadoComercial($RecibeDatos){            
            $stmt = $this->dbh->prepare("INSERT INTO afiliado_com(nombre_AfiCom, correo_AfiCom) VALUES (:Nombre,:Correo)");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':Nombre', $nombre);
            $stmt->bindParam(':Correo', $correo);

            // insertar una fila
            $nombre = $RecibeDatos['Nombre_Afcom'];
            $correo = $RecibeDatos['Correo_Afcom'];
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        }      

        //INSERTA los datos del afiliado despachador
        public function insertarAfiliadoDespachador($RecibeDatos){            
            $stmt = $this->dbh->prepare("INSERT INTO afiliado_des(nombre_AfiDes, apellido_AfiDes,  cedula_AfiDes, telefono_AfiDes, correo_AfiDes, fecha_AfiDes, hora_AfiDes) VALUES (:NOMBRE, :APELLIDO, :CEDULA, :TELEFONO, :CORREO, CURDATE(), CURTIME())");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':NOMBRE', $Nombre);
            $stmt->bindParam(':APELLIDO', $Apellido);
            $stmt->bindParam(':CEDULA', $Cedula);
            $stmt->bindParam(':TELEFONO', $Telefono);
            $stmt->bindParam(':CORREO', $Correo);

            // insertar una fila
            $Nombre = $RecibeDatos['Nombre_AfiDes'];
            $Apellido = $RecibeDatos['Apellido_AfiDes'];
            $Cedula = $RecibeDatos['Cedula_AfiDes'];
            $Telefono = $RecibeDatos['Telefono_AfiDes'];
            $Correo = $RecibeDatos['Correo_AfiDes'];
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        } 

        public function insertarAccesoComerciante($ID_AfiliadoCom, $ClaveCifrada){         
            $stmt = $this->dbh->prepare("INSERT INTO afiliado_comingreso(ID_Afiliado, claveCifrada) VALUES (:ID_Usuario, :Clave)");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':ID_Usuario', $id_usuario);
            $stmt->bindParam(':Clave', $clave);

            // insertar una fila
            $id_usuario = $ID_AfiliadoCom;
            $clave = $ClaveCifrada;
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function insertarAccesoDespachador($ID_AfiliadoDes, $ClaveCifradaDes){         
            $stmt = $this->dbh->prepare("INSERT INTO afiliado_desingreso(ID_AfiliadoDes, claveCifradaDes) VALUES (:ID_AFILIADO, :CLAVE)");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':ID_AFILIADO', $ID_AfiliadoDes);
            $stmt->bindParam(':CLAVE', $ClaveCifradaDes);
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function insertarTienda($RecibeDatos, $ID_AfiliadoCom){            
            $stmt = $this->dbh->prepare("INSERT INTO tiendas(nombre_Tien, ID_AfiliadoCom, fecha_afiliacion, hora_afiliacion) VALUES (:Nombre_Ti, :ID_Afiliado_Ti, CURDATE(), time_format(NOW(), '%H:%i'))");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':Nombre_Ti', $nombre_T);
            $stmt->bindParam(':ID_Afiliado_Ti', $responsable_T);

            // insertar una fila
            $nombre_T = $RecibeDatos['Nombre_tienda'];
            $responsable_T = $ID_AfiliadoCom;
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        }
        
        //INSERTA para habilitar un registro completo que almacenará el horario de la tienda
        public function insertarHabilitarHorario_LV($ID_Tienda){  
            $stmt = $this->dbh->prepare("INSERT INTO horarios(ID_Tienda) VALUES (:ID_TIENDA)");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':ID_TIENDA', $ID_Tienda);
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }

        }
        
        //INSERTA para habilitar un registro completo que almacenará el horario de la tienda
        public function insertarHabilitarHorario_FS($ID_Tienda){  
            $stmt = $this->dbh->prepare("INSERT INTO horariosfinsemana(ID_Tienda) VALUES (:ID_TIENDA)");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':ID_TIENDA', $ID_Tienda);
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        //CONSULTA los correos de comerciantes existentes en la BD
        public function consultarCorreoCom(){  
            $stmt = $this->dbh->prepare("SELECT correo_AfiCom FROM afiliado_com");
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }  

        //CONSULTA los correos de despachadores existentes en la BD
        public function consultarCorreoDes(){  
            $stmt = $this->dbh->prepare("SELECT correo_AfiDes FROM afiliado_des");
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }  

        //CONSULTA las claves de despachadores existentes en la BD
        public function consultarClaveDes(){ 
            $stmt = $this->dbh->prepare("SELECT claveCifradaDes FROM afiliado_desingreso");
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }

        //CONSULTA las claves de comerciantes existentes  en la BD
        public function consultarClaveCom(){ 
            $stmt = $this->dbh->prepare("SELECT claveCifrada FROM afiliado_comingreso");
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return false;
            }
        }      
    }
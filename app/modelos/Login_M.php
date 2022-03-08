<?php
    class Login_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

        public function consultarAfiliadosCom($Correo){
            $stmt = $this->dbh->prepare(
                "SELECT * 
                FROM afiliado_com 
                WHERE correo_AfiCom = :CORREO");
            $stmt->bindValue(':CORREO', $Correo, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarAfiliadosMay($Correo){
            $stmt = $this->dbh->prepare(
                "SELECT * 
                FROM afiliado_may 
                WHERE correo_AfiMay = :CORREO");
            $stmt->bindValue(':CORREO', $Correo, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarAfiliadosDes($Correo){
            $stmt = $this->dbh->prepare("SELECT * FROM afiliado_des WHERE correo_AfiDes = :correo");
            $stmt->bindValue(':correo', $Correo, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarAfiliadosVen($Correo){
            $stmt = $this->dbh->prepare(
                "SELECT * 
                FROM afiliado_ven 
                WHERE correo_AfiVen = :CORREO");
            $stmt->bindValue(':CORREO', $Correo, PDO::PARAM_STR);
            
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        public function consultarContrasenaCom($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT * FROM afiliado_comingreso WHERE ID_Afiliado = :id_afiliado");
            $stmt->bindValue(':id_afiliado', $ID_Afiliado, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        } 
        
        public function consultarContrasenaMay($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT * FROM afiliado_mayingreso WHERE ID_AfiliadoMay = :ID_AFILIADO");
            $stmt->bindValue(':ID_AFILIADO', $ID_Afiliado, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        } 
        
        public function consultarContrasenaVen($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT * FROM afiliado_veningreso WHERE ID_AfiliadoVen = :ID_AFILIADO");
            $stmt->bindValue(':ID_AFILIADO', $ID_Afiliado, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        } 

        public function consultarContrasenaDes($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT * FROM afiliado_desingreso WHERE ID_AfiliadoDes = :id_afiliado");
            $stmt->bindValue(':id_afiliado', $ID_Afiliado, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        } 

        public function consultarID_Tienda($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT ID_Tienda, nombre_Tien, ID_AfiliadoCom, publicar_Tien FROM tiendas WHERE ID_AfiliadoCom = :ID_AFILIADO");

            $stmt->bindValue(':ID_AFILIADO', $ID_Afiliado, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt;
        } 

        public function consultarID_Mayorista($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT ID_Mayorista, nombreMay, ID_AfiliadoMay FROM mayorista WHERE ID_AfiliadoMay = :ID_AFILIADO_MAY");

            $stmt->bindValue(':ID_AFILIADO_MAY', $ID_Afiliado, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt;
        }

        public function consultarID_AfiliadoVen($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT ID_Mayorista, nombre_AfiVen, codigo_AfiVen FROM afiliado_ven  WHERE ID_AfiliadoVen = :ID_AFILIADO_VEN");

            $stmt->bindValue(':ID_AFILIADO_VEN', $ID_Afiliado, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt;
        }


        public function consultarUsuarioRecordado($Cookie_usuario){
            $stmt = $this->dbh->prepare("SELECT correo_AfiCom FROM afiliado_com WHERE ID_AfiliadoCom = :ID_AFILIADO ");
            $stmt->bindValue(':ID_AFILIADO', $Cookie_usuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public function consultarSecciones($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT ID_Seccion FROM secciones WHERE ID_Tienda = :ID_TIENDA");
            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);
            if($stmt->execute()){
                //Se envia información de cuantos registros se vieron afectados por la consulta
                return $stmt->rowCount();
            }
            else{
                return false;
            }
        }

        public function consultarCodigoAleatorio( $Correo, $Aleatorio){
            $stmt = $this->dbh->prepare("SELECT * FROM codigo_recuperacion WHERE codigoAleatorio = :ALEATORIO AND correo = :CORREO");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ALEATORIO', $Aleatorio);
            $stmt->bindParam(':CORREO', $Correo);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){                
                //Se envia información de cuantos registros se vieron afectados por la consulta
                return $stmt->rowCount(); 
            }
            else{
                return false;
            }           
        }

        public function consultaID_Afiliado($Correo){
            $stmt = $this->dbh->prepare("SELECT ID_AfiliadoCom FROM afiliado_com WHERE correo_AfiCom = :CORREO");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':CORREO', $Correo);
            
            if($stmt->execute()){   
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }           
        }

        public function insertarCodigoAleatorio($Correo, $Aleatorio){
            $stmt = $this->dbh->prepare("INSERT INTO codigo_recuperacion(correo, codigoAleatorio, fechaSolicitud) VALUES(:CORREO, :ALEATORIO, NOW())");

            //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement
            $stmt->bindParam(':ALEATORIO', $Aleatorio);
            $stmt->bindParam(':CORREO', $Correo);
            
            //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }            
        }

        public function actualizarcodigoVerificado($CodigoUsuario){
            $stmt = $this->dbh->prepare("UPDATE codigo_recuperacion SET codigoVerificado = 1 WHERE codigoAleatorio = :ALEATORIO");
            
            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ALEATORIO', $CodigoUsuario);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function actualizarClave($ID_Afiliado, $ClaveCifrada){
            $stmt = $this->dbh->prepare("UPDATE afiliado_comingreso SET claveCifrada = :CLAVE_CIFRADA WHERE ID_Afiliado = :ID_AFILIADO");
           
            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_AFILIADO', $ID_Afiliado[0]['ID_AfiliadoCom']);
            $stmt->bindValue(':CLAVE_CIFRADA', $ClaveCifrada);

            // Se ejecuta la actualización de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }

           
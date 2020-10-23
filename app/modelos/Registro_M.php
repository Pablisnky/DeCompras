<?php
    // require(RUTA_APP . "/clases/Conexion_BD.php");

    class Registro_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        // public function consultarCategorias(){
        //     $stmt = $this->dbh->prepare("SELECT * FROM categorias");
        //     if($stmt->execute()){
        //         return $stmt;
        //     }
        //     else{
        //         return "No se pudo";
        //     }
        // }

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
                return true;
            }
            else{
                return false;
            }
        }

        public function insertarBancos($Banco, $Titular, $NumeroCuenta, $Rif, $ID_Afiliado){    
            foreach(array_keys($_POST['banco']) as $key){
                 $Banco = $_POST['banco'][$key];  
                $Titular = $_POST['titular'][$key]; 
                $NumeroCuenta = $_POST['numeroCuenta'][$key];
                $Rif = $_POST['rif'][$key];  

                $stmt = $this->dbh->prepare("INSERT INTO bancos(bancoNombre, bancoCuenta, bancoTitular, bancoRif, ID_Usuario) VALUES (:BancoNombre, :BancoCuenta, :BancoTitular, :BancoRif, :ID_Usuario)");

                //Se vinculan los valores de las sentencias preparadas, stmt es una abreviatura de statement 
                $stmt->bindParam(':BancoNombre', $Banco);
                $stmt->bindParam(':BancoCuenta', $NumeroCuenta);
                $stmt->bindParam(':BancoTitular', $Titular);
                $stmt->bindParam(':BancoRif', $Rif);
                $stmt->bindParam(':ID_Usuario', $ID_Afiliado);
                
                //Se ejecuta la inserción de los datos en la tabla
                $stmt->execute();
            }
        }
        
        public function consultarID_Categoria($Categoria){  
            $Elementos = count($Categoria);
            $Busqueda = "";
            //Se convierte el array en una cadena con sus elementos entre comillas
            for($i = 0; $i < $Elementos; $i++){
                $Busqueda .= " '" . $Categoria[$i] . "', ";
            }
            // Esto quita el ultimo espacio y coma del string generado con lo cual
            // el string queda 'id1','id2','id3'
            $Busqueda = substr($Busqueda,0,-2);
            
            $stmt = $this->dbh->prepare("SELECT ID_Categoria FROM categorias WHERE categoria IN ($Busqueda)");
            // $stmt->bindParam(':CATEGORIA', $Categoria, PDO::PARAM_STR);   
            $stmt->execute();
            return $stmt;
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
        
        public function insertarCategoriaTienda($ID_Categoria, $ID_Tienda){
            for($i = 0; $i<count($ID_Categoria); $i++){
                foreach($ID_Categoria[$i] as $key){
                    $key;  
                }
                
                $stmt = $this->dbh->prepare("INSERT INTO tiendas_categorias(ID_Categoria, ID_Tienda) VALUES (:ID_CATEGORIA, :ID_TIENDA)");

                //Se vinculan los valores de las sentencias preparadas
                //stmt es una abreviatura de statement 
                $stmt->bindParam(':ID_CATEGORIA', $key);
                $stmt->bindParam(':ID_TIENDA', $ID_Tienda);
                
                // //Se ejecuta la inserción de los datos en la tabla
                $stmt->execute();
            }
        }        
    }
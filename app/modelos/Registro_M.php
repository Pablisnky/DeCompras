<?php
    // require(RUTA_APP . "/clases/Conexion_BD.php");

    class Registro_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        public function consultarCategorias(){
            $stmt = $this->dbh->prepare("SELECT * FROM categorias");
            if($stmt->execute()){
                return $stmt;
            }
            else{
                return "No se pudo";
            }
        }

        public function insertarAfiliadoComercial($RecibeDatos){            
            $stmt = $this->dbh->prepare("INSERT INTO afiliado_com(nombre_AfiCom, apellido_AfiCom, cedula_AfiCom, telefono_AfiCom, correo_AfiCom, fecha_AfiCom, hora_AfiCom) VALUES (:Nombre,:Apellido, :Cedula, :Telefono, :Correo, CURDATE(), time_format(NOW(), '%H:%i'))");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':Nombre', $nombre);
            $stmt->bindParam(':Apellido', $apellido);
            $stmt->bindParam(':Cedula', $cedula);
            $stmt->bindParam(':Telefono', $telefono);
            $stmt->bindParam(':Correo', $correo);

            // insertar una fila
            $nombre = $RecibeDatos['Nombre_Afcom'];
            $apellido = $RecibeDatos['Apellido_Afcom'];
            $cedula = $RecibeDatos['Cedula_Afcom'];
            $telefono = $RecibeDatos['Telefono_Afcom'];
            $correo = $RecibeDatos['Correo_Afcom'];
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return $this->dbh->lastInsertId();
            }
            else{
                return false;
            }
        }      

        public function insertarTienda($RecibeDatos, $ID_AfiliadoCom){            
            $stmt = $this->dbh->prepare("INSERT INTO tiendas(nombre_Tien, direccion_Tien, telefono_Tien, horario_Tien, categoria_Tien, ID_AfiliadoCom, fecha_afiliacion, hora_afiliacion) VALUES (:Nombre_Ti,:Direccion_Ti, :Telefono_Ti, :Horario_Ti, :Categoria_Tien, :ID_Afiliado_Ti, CURDATE(), time_format(NOW(), '%H:%i'))");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':Nombre_Ti', $nombre_T);
            $stmt->bindParam(':Direccion_Ti', $telefono_T);
            $stmt->bindParam(':Telefono_Ti', $direccion_T);
            $stmt->bindParam(':Horario_Ti', $horario_T);
            $stmt->bindParam(':Categoria_Tien', $categoria_T);
            $stmt->bindParam(':ID_Afiliado_Ti', $responsable_T);

            // insertar una fila
            $nombre_T = $RecibeDatos['Nombre_com'];
            $telefono_T = $RecibeDatos['Telefono_com'];
            $direccion_T = $RecibeDatos['Direccion_com'];
            $horario_T = $RecibeDatos['Horario_com'];
            $categoria_T = $RecibeDatos['Categoria_com'];
            $responsable_T = $ID_AfiliadoCom;
            
            //Se ejecuta la inserción de los datos en la tabla
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function insertarAccesoAfiliado($ID_AfiliadoCom, $ClaveCifrada){         
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

        public function insertarBancos($Banco, $Titular, $NumeroCuenta, $Rif, $ID_Afiliado){    
            foreach(array_keys($_POST['banco']) as $key){
                $Banco = $_POST['banco'][$key];  
                $Titular = $_POST['titular'][$key]; 
                $NumeroCuenta = $_POST['numeroCuenta'][$key];
                $Rif = $_POST['rif'][$key];     

                $stmt = $this->dbh->prepare("INSERT INTO bancos(bancoNombre, bancoCuenta, bancoTitular, bancoRif, ID_Usuario) VALUES (:BancoNombre, :BancoCuenta, :BancoTitular, :BancoRif, :ID_Usuario)");

                //Se vinculan los valores de las sentencias preparadas
                //ztmt es una abreviatura de statement 
                $stmt->bindParam(':BancoNombre', $Banco);
                $stmt->bindParam(':BancoCuenta', $NumeroCuenta);
                $stmt->bindParam(':BancoTitular', $Titular);
                $stmt->bindParam(':BancoRif', $Rif);
                $stmt->bindParam(':ID_Usuario', $ID_Afiliado);
                
                //Se ejecuta la inserción de los datos en la tabla
                $stmt->execute();
            }
        }

    }
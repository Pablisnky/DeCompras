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
        // public function consultarUsuario($Cedula){         
        //     //Se consulta en la tabla afiliado el ID_Afiliado del afiliado que se esta registrando
        //     $this->db->Consulta("SELECT ID_Afiliado FROM afiliado WHERE cedula ='$Cedula'");

        //     //registros() es un metodo de la clase Conexion_BD
        //     $resultados =  $this->db->registro();
        //     return $resultados;
        // }

        // public function insertarClaveUsuario($Datos, $ClaveCifrada){
        //     $this->db->Insertar("INSERT INTO usuario(ID_Afiliado, clave) VALUES(:ID_Afiliado, '$ClaveCifrada')");

        //     //Se traen los datos obtenidos en la consulta consultarUsuario
        //     foreach($Datos["ID_Afiliado"] as $ID_Afiliado){
        //         $NombreAfiliado = $ID_Afiliado -> ID_Afiliado;
        //         echo "ID_Afiliado: " . $NombreAfiliado  . "<br>"; 
        //     } 

        //     //Se vinculan los valores de las sentencias preparadas
        //     $this->db->bind(':ID_Afiliado' , $ID_Afiliado);
            
        //     //Se ejecuta la inserción de los datos en la tabla
        //     if($this->db->execute()){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }
    }
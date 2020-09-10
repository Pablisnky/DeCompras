<?php
    // require(RUTA_APP . "/clases/Conexion_BD.php");

    class Login_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

        public function consultarAfiliadosCom($Correo){
            $stmt = $this->dbh->prepare("SELECT * FROM afiliado_com WHERE correo_AfiCom = :correo");
            $stmt->bindValue(':correo', $Correo, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt;
        }
        
        public function consultarContrasena($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT * FROM afiliado_comingreso WHERE ID_Afiliado = :id_afiliado");
            $stmt->bindValue(':id_afiliado', $ID_Afiliado, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        } 

        public function consultarID_Tienda($ID_Afiliado){
            $stmt = $this->dbh->prepare("SELECT ID_Tienda, nombre_Tien, ID_AfiliadoCom FROM tiendas WHERE ID_AfiliadoCom = :id_afiliado");
            $stmt->bindValue(':id_afiliado', $ID_Afiliado, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public function consultarUsuarioRecordado($Cookie_usuario){
            $stmt = $this->dbh->prepare("SELECT correo_AfiCom FROM afiliado_com WHERE ID_AfiliadoCom = :ID_AFILIADO ");
            $stmt->bindValue(':ID_AFILIADO', $Cookie_usuario, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }
    }
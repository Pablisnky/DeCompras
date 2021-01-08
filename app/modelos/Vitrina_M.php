<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class Vitrina_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }

        //SELECT de las secciones de la tienda seleccionada
        public function consultarCategoria($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT categoria FROM categorias INNER JOIN tiendas_categorias ON categorias.ID_Categoria=tiendas_categorias.ID_Categoria INNER JOIN tiendas ON tiendas_categorias.ID_Tienda=tiendas.ID_Tienda WHERE tiendas.ID_Tienda = :Tienda");  
            $stmt->bindParam(':Tienda', $ID_Tienda, PDO::PARAM_INT);             
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de las secciones de la tienda seleccionada
        public function consultarSecciones($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT seccion FROM secciones WHERE ID_Tienda = :Tienda");  
            $stmt->bindParam(':Tienda', $ID_Tienda, PDO::PARAM_INT);             
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de los productos de la tienda seleccionada
        // public function consultarProductos($ID_Tienda){
        //     $stmt = $this->dbh->prepare("SELECT * FROM productos INNER JOIN tiendas_productos ON productos.ID_Producto=tiendas_productos.ID_Producto WHERE tiendas_productos.ID_Tienda = :Tienda");  
        //     $stmt->bindParam(':Tienda', $ID_Tienda, PDO::PARAM_INT);             
        //     if($stmt->execute()){
        //         return $stmt;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        // public function consultarNombreTienda($ID_Tienda){
        //     $stmt = $this->dbh->prepare("SELECT nombre_Tien FROM tiendas WHERE ID_Tienda = :Tienda");  
        //     $stmt->bindParam(':Tienda', $ID_Tienda, PDO::PARAM_INT);       
        //     if($stmt->execute()){
        //         return $stmt;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        public function consultarFotografia($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT fotografia_Tien FROM tiendas WHERE ID_Tienda = :Tienda");  
            $stmt->bindParam(':Tienda', $ID_Tienda, PDO::PARAM_INT);       
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
        
        //SELECT de slogan de la tienda
        public function consultarSloganTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT slogan_Tien FROM tiendas WHERE ID_Tienda = :ID_Tienda");

            $stmt->bindValue(':ID_Tienda', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
        
        //SELECT con horas de apertura de la tienda formto 24 horas
        public function consultarAperturaTienda($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT DATE_FORMAT(inicio_m, '%H:%i') AS inicio_m, DATE_FORMAT(inicia_t, '%H:%i') AS inicia_t, DATE_FORMAT(culmina_t, '%H:%i') AS culmina_t  FROM horarios WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
    }
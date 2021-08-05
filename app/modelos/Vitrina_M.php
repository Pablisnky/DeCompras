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
            $stmt = $this->dbh->prepare("SELECT ID_Seccion, seccion FROM secciones WHERE ID_Tienda = :Tienda");  
            $stmt->bindParam(':Tienda', $ID_Tienda, PDO::PARAM_INT);             
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
           
        //SELECT de las imagenes principales de cada sección de una tienda
        public function consultarImagenesSecciones($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT nombre_img, secciones.ID_Seccion FROM imagenes INNER JOIN secciones_productos ON imagenes.ID_Producto=secciones_productos.ID_Producto INNER JOIN secciones ON secciones_productos.ID_Seccion=secciones.ID_Seccion WHERE ID_Tienda = :ID_TIENDA AND fotoSeccion = :FOTOSECCION GROUP BY secciones.ID_Seccion");  
            
            $stmt->bindValue(':FOTOSECCION', 1, PDO::PARAM_INT);        
            $stmt->bindParam(':ID_TIENDA', $ID_Tienda , PDO::PARAM_INT); 

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }
           
        //SELECT de las imagenes principales de cada sección de una tienda (seleccion forzada por la aplicación)
        public function consultarImagenesSeccionForzada($ID_Tienda){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_img, secciones.ID_Seccion 
                 FROM imagenes 
                 INNER JOIN secciones_productos ON imagenes.ID_Producto=secciones_productos.ID_Producto 
                 INNER JOIN secciones ON secciones_productos.ID_Seccion=secciones.ID_Seccion 
                 WHERE ID_Tienda = :ID_TIENDA  
                 GROUP BY secciones.ID_Seccion"
            );  
                    
            $stmt->bindParam(':ID_TIENDA', $ID_Tienda , PDO::PARAM_INT); 

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        //SELECT de los productos por sección de la tienda seleccionada
        public function consultarCant_ProductosSeccion($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT tiendas_secciones.ID_Seccion, COUNT(ID_Producto) AS CantidadPro FROM tiendas_secciones INNER JOIN secciones_productos ON tiendas_secciones.ID_Seccion=secciones_productos.ID_Seccion WHERE tiendas_secciones.ID_Tienda = :ID_TIENDA GROUP BY tiendas_secciones.ID_Seccion" );  
            $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);             
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

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
        public function consultarAperturaTienda_LV($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT *, DATE_FORMAT(inicio_m, '%H:%i') AS inicio_m, DATE_FORMAT(culmina_m, '%H:%i') AS culmina_m, DATE_FORMAT(inicia_t, '%H:%i') AS inicia_t, DATE_FORMAT(culmina_t, '%H:%i') AS culmina_t FROM horarios WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT con horas de apertura de la tienda el día sábado formto 24 horas   
        public function consultarAperturaTienda_Sab($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT sabado_m, sabado_t, DATE_FORMAT(inicia_m_Sab, '%H:%i') AS inicia_m_Sab, DATE_FORMAT(culmina_m_Sab, '%H:%i') AS culmina_m_Sab, DATE_FORMAT(inicia_t_Sab, '%H:%i') AS inicia_t_Sab, DATE_FORMAT(culmina_t_Sab, '%H:%i') AS culmina_t_Sab FROM horariosabado WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }

        //SELECT con horas de apertura de la tienda el día domingo formto 24 horas   
        public function consultarAperturaTienda_Dom($ID_Tienda){
            $stmt = $this->dbh->prepare("SELECT DATE_FORMAT(inicia_m_Dom, '%H:%i') AS inicia_m_Dom, DATE_FORMAT(culmina_m_Dom, '%H:%i') AS culmina_m_Dom, DATE_FORMAT(inicia_t_Dom, '%H:%i') AS inicia_t_Dom, DATE_FORMAT(culmina_t_Dom, '%H:%i') AS culmina_t_Dom FROM horariodomingo WHERE ID_Tienda = :ID_TIENDA");

            $stmt->bindValue(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return "No se pudo";
            }
        }
    }
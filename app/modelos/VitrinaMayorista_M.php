<?php
    require_once(RUTA_APP . "/clases/Conexion_BD.php");

    class VitrinaMayorista_M extends Conexion_BD{

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
        
        //SELECT con los mayoristas afiliados
        public function consultarMayorista(){
            $stmt = $this->dbh->query(
                "SELECT ID_Mayorista, nombreMay, fotografiaMay, telefonoMay, direccionMay, municipioMay, estadoMay
                FROM mayorista"
            );      
                        
            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }

        public function consultarSeccionesMayorista($ID_Mayorista){
            $stmt = $this->dbh->prepare(
                "SELECT ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
                FROM seccionesmayorista  
                WHERE ID_Mayorista = :ID_MAYORISTA"
            );      
        
            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }  

        //SELECT de los datos de un vendedor
        public function consultarVendedoresMay($ID_Mayorista){
            $stmt = $this->dbh->prepare(
                "SELECT nombre_AfiVen, telefono_AfiVen, zona_AfiVen, Status_AfiVen
                FROM  afiliado_ven  
                WHERE ID_Mayorista = :ID_MAYORISTA AND Status_AfiVen = 1"
            );

            $stmt->bindParam(':ID_MAYORISTA', $ID_Mayorista, PDO::PARAM_INT);

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return  'Existe un fallo';
            }
        }

        //SELECT de las imagenes principales de cada sección establecida por el afiliado de una tienda
        // public function consultarImagenesSecciones($ID_Tienda){
        //     $stmt = $this->dbh->prepare(
        //         "SELECT ID_Seccion, nombre_img_seccion
        //          FROM secciones
        //          WHERE ID_TIENDA = :ID_TIENDA"
        //     );  
                   
        //     $stmt->bindParam(':ID_TIENDA', $ID_Tienda , PDO::PARAM_INT); 

        //     if($stmt->execute()){
        //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     }
        //     else{
        //         return false;
        //     }
        // }

        //SELECT de los productos por sección de la tienda seleccionada
        // public function consultarCant_ProductosSeccion($ID_Tienda){
        //     $stmt = $this->dbh->prepare("SELECT tiendas_secciones.ID_Seccion, COUNT(ID_Producto) AS CantidadPro FROM tiendas_secciones INNER JOIN secciones_productos ON tiendas_secciones.ID_Seccion=secciones_productos.ID_Seccion WHERE tiendas_secciones.ID_Tienda = :ID_TIENDA GROUP BY tiendas_secciones.ID_Seccion" );  
        //     $stmt->bindParam(':ID_TIENDA', $ID_Tienda, PDO::PARAM_INT);             
        //     if($stmt->execute()){
        //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     }
        //     else{
        //         return false;
        //     }
        // }
           
        //SELECT de las imagenes principales de cada sección de una tienda (seleccion forzada por la aplicación)
        // public function consultarImagenesSeccionForzada($ID_Tienda){
        //     $stmt = $this->dbh->prepare(
        //         "SELECT nombre_img, secciones.ID_Seccion 
        //          FROM imagenes 
        //          INNER JOIN secciones_productos ON imagenes.ID_Producto=secciones_productos.ID_Producto 
        //          INNER JOIN secciones ON secciones_productos.ID_Seccion=secciones.ID_Seccion 
        //          WHERE ID_Tienda = :ID_TIENDA  
        //          GROUP BY secciones.ID_Seccion"
        //     );  
                    
        //     $stmt->bindParam(':ID_TIENDA', $ID_Tienda , PDO::PARAM_INT); 

        //     if($stmt->execute()){
        //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
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

        // public function consultarFotografia($ID_Tienda){
        //     $stmt = $this->dbh->prepare("SELECT fotografia_Tien FROM tiendas WHERE ID_Tienda = :Tienda");  
        //     $stmt->bindParam(':Tienda', $ID_Tienda, PDO::PARAM_INT);       
        //     if($stmt->execute()){
        //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     }
        //     else{
        //         return false;
        //     }
        // }
    }
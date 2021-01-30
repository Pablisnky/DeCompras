<?php
    class Menu_M extends Conexion_BD{

        public function __construct(){    
            parent::__construct();       
        }

        //SELECT de tiendas o de productos ofrecidos en tiendas
        public function consultarImagenePrincipal(){                                
            $stmt = $this->dbh->prepare("SELECT ID_Producto, fotografia  FROM opciones INNER JOIN productos_opciones ON opciones.ID_Opcion=productos_opciones.ID_Opcion");

            if($stmt->execute()){
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
            else{
                return false;
            }
        }










        // NO APLICA
        public function consultarSecciones(){
            $stmt = $this->dbh->query("SELECT secciones.ID_Seccion, ID_Imagen FROM secciones INNER JOIN secciones_productos ON secciones.ID_Seccion=secciones_productos.ID_Seccion INNER JOIN imagenes ON secciones_productos.ID_Producto=imagenes.ID_Producto");
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);  
        }

        //INSERTA los datos del afiliado comercial
        public function InsertarsECCIONES_IMAGENES($RecibeDatos){ 
            foreach($RecibeDatos as $row) :           
            $stmt = $this->dbh->prepare("INSERT INTO secciones_imagenes(ID_Seccion, ID_Imagen) VALUES (:ID_SECCION,:ID_IMAGEN)");

            //Se vinculan los valores de las sentencias preparadas
            //ztmt es una abreviatura de statement 
            $stmt->bindParam(':ID_SECCION', $ID_Seccion);
            $stmt->bindParam(':ID_IMAGEN', $ID_Imagen);

            // insertar una fila
            $ID_Seccion = $row['ID_Seccion'];
            $ID_Imagen = $row['ID_Imagen'];
            
            //Se ejecuta la inserción de los datos en la tabla y se recupera el ID del registro insertado
            $stmt->execute();

            endforeach;
        }     

        //CONSULTA LA SECCION DE UNA IMAGEN        
        public function consultarSeccionesImagenes(){
            $stmt = $this->dbh->query("SELECT imagenes.ID_Imagen, secciones_productos.ID_Seccion FROM `imagenes` INNER JOIN secciones_productos ON imagenes.ID_Producto=secciones_productos.ID_Producto");
            
            return $stmt->fetchAll(PDO::FETCH_ASSOC);  
        }
        
        //INSERTA a que seccion pertenece una imagen
        public function ActualizaSeccionesImgenes($RecibeProducto){ 
            foreach($RecibeProducto as $Row) :
            $stmt = $this->dbh->prepare("UPDATE imagenes SET ID_Seccion = :ID_SECCION WHERE ID_Imagen= :ID_IMAGEN");

            // Se vinculan los valores de las sentencias preparadas
            $stmt->bindValue(':ID_IMAGEN', $Row['ID_Imagen']);
            $stmt->bindValue(':ID_SECCION', $Row['ID_Seccion']);

            // Se ejecuta la actualización de los datos en la tabla
            $stmt->execute();
            endforeach;
        }
    }
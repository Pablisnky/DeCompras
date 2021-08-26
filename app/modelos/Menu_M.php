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

//********************************************************************************************
//********************************************************************************************
//********************************************************************************************
        //Ulilizada en su momento para cargar o eliminar datos 
        // public function consultarID_Productos(){

        //     $stmt = $this->dbh->prepare(
        //         "SELECT productos.ID_Producto 
        //         FROM productos 
        //         INNER JOIN secciones_productos ON secciones_productos.ID_Producto=productos.ID_Producto 
        //         INNER JOIN tiendas_secciones ON tiendas_secciones.ID_Seccion=secciones_productos.ID_Seccion 
        //         WHERE ID_TIenda = :ID_TIENDA"
        //     );

        //     $stmt->bindValue(':ID_TIENDA', 260, PDO::PARAM_INT);

        //     if($stmt->execute()){
        //         return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     }
        //     else{
        //         return false;
        //     }
        // }
        
        //Ulilizada en su momento 
        // public function Insertar_ID_Producto($ID_Producto){
        //     // Debido a que $Caracteristica es un array con todas las caracteristicas, deben introducirse una a una mediante un ciclo
        //     // echo $ID_Producto[0]['ID_Producto'];
        //     // echo '<pre>';
        //     // print_r($ID_Producto);
        //     // echo '</pre>'; 
        //     foreach($ID_Producto as $row){
        //         $stmt = $this->dbh->prepare(
        //             "INSERT INTO fechareposicion(ID_Producto) 
        //              VALUES(:ID_PRODUCTO)");

        //         $stmt->bindParam(':ID_PRODUCTO', $row['ID_Producto']);

        //         //Se ejecuta la inserción de los datos en la tabla(ejecuta una sentencia preparada )
        //         $stmt->execute();
        //     }
        // }
    }
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
        
        public function ConsultaPreciosBs(){

            $stmt = $this->dbh->query("SELECT ID_Opcion, precioBolivar FROM opciones");

            return  $stmt->fetchAll(PDO::FETCH_ASSOC);

        }
        
        // public function actualizarNuevoConoMonetario($NuevoPrecioBolivar){
        //     // echo "<pre>";
        //     // print_r($NuevoPrecioBolivar);
        //     // echo "</pre>";
        //     // exit();
        //     foreach($NuevoPrecioBolivar as $key)    :
        //         $key;  
        //         // echo $key['ID_Opcion'] . '<br>';

        //         $stmt = $this->dbh->prepare("UPDATE opciones SET precioBolivar = :PRECIOBOLIVAR WHERE ID_Opcion = :ID_OPCION");

        //         //Se vinculan los valores de las sentencias preparadas
        //         $stmt->bindValue(':PRECIOBOLIVAR', $key['precioActualizadoBs']);
        //         $stmt->bindValue(':ID_OPCION', $key['ID_Opcion']);

        //         //Se ejecuta la actualización de los datos en la tabla
        //         $stmt->execute();
        //     endforeach;
        // }
    }
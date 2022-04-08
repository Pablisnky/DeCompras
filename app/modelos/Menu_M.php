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
        
        public function ConsultarMontos(){
            $stmt = $this->dbh->query(
                "SELECT ID_DetallePedido_May , precio_May, total_May 
                FROM detallepedidomayorista"
            );
            return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        // public function actualizarMontos($NuevoArrayMontos){
        //     // echo "<pre>";
        //     // print_r($NuevoArrayMontos);
        //     // echo "</pre>";
        //     // exit();
        //     foreach($NuevoArrayMontos as $key)    :
        //         $key;  

        //         $stmt = $this->dbh->prepare(
        //             "UPDATE detallepedidomayorista  
        //             SET precio_May = :PRECIO, total_May = :TOTAL 
        //             WHERE ID_DetallePedido_May  = :ID_DETALLE_PEDIDO"
        //         );

        //         //Se vinculan los valores de las sentencias preparadas
        //         $stmt->bindValue(':PRECIO', $key['precio_May']);
        //         $stmt->bindValue(':TOTAL', $key['total']);
        //         $stmt->bindValue(':ID_DETALLE_PEDIDO', $key['ID_DetallePedido_May']);

        //         //Se ejecuta la actualización de los datos en la tabla
        //         $stmt->execute();
        //     endforeach;
        // }
    }
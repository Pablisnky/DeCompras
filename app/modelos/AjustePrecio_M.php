<?php
    class AjustePrecio_M extends Conexion_BD{

        public function __construct(){ 
            parent::__construct();  
        }
    
        public function ConsultaPrecios(){
            $stmt = $this->dbh->query(
                "SELECT ID_Opcion, precioDolar 
                 FROM opciones"
            );
            return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        }


        //UPDATE de los precios de los productos según el precio del dolar
        public function ActualizarPrecio($NuevoPrecioDolar){
            // SE realiza un foreach porque $NuevoPrecioDolar es un array con el precio de cada producto
            foreach($NuevoPrecioDolar as $Key):
                $stmt = $this->dbh->prepare(
                    "UPDATE opciones 
                     SET precioBolivar = :PRECIOBOLIVAR 
                     WHERE ID_Opcion = :ID_OPCION"
                );

                //Se vinculan los valores de las sentencias preparadas
                $stmt->bindValue(':ID_OPCION', $Key['ID_Opcion']);
                $stmt->bindValue(':PRECIOBOLIVAR', $Key['precioActualizadoBs']);

                //Se ejecuta la actualización de los datos en la tabla
                $stmt->execute();
            endforeach;
        }

        
    }
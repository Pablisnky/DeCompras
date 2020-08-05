<?php
//Archivo llamado desde 

    class Vitrina_C extends Controlador{

        public function __construct(){
            $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");
        }
        
        public function index($ID_Tienda){
            //Se CONSULTAN los productos de una tienda en particular
            $Consulta_1 = $this->ConsultaVitrina_M->consultarProductos($ID_Tienda);
            $Productos = $Consulta_1->fetchAll(PDO::FETCH_BOTH);  

            $Consulta_2 = $this->ConsultaVitrina_M->consultarNombreTienda($ID_Tienda);
            $Nombre = $Consulta_2->fetch(PDO::FETCH_ASSOC);
            $Datos=[
                "Inf_Productos" => $Productos,
                "NombreTienda" => $Nombre,
            ];

            $this->vista("paginas/vitrina_V",  $Datos);
        }

        public function alertPersonal(){
            $this->vista("inc/alert");
        }
    }
?>    
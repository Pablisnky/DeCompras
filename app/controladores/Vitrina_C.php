<?php
//Archivo llamado desde funcionesVarias.js por medio de vitrina()
    class Vitrina_C extends Controlador{

        public function __construct(){
            $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");
        }
        
        //Metodo cargado desde funcionesVarias por medio de window.open en funcion vitrina()
        public function index($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con las variable estado, municipio, parroquia, servicio y fecha separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(",", $DatosAgrupados);
            // print_r($DatosAgrupados);
            
            $ID_Tienda = $DatosAgrupados[0];
            $NombreTienda = $DatosAgrupados[1];

            //Se CONSULTAN las secciones de una tienda en particular
            $Consulta_1 = $this->ConsultaVitrina_M->consultarSecciones($ID_Tienda);
            $Secciones = $Consulta_1->fetchAll(PDO::FETCH_BOTH);  
            
            //Se CONSULTAN los productos de una tienda segun su seccion 
            // $Consulta_1 = $this->ConsultaVitrina_M->consultarProductos($ID_Tienda);
            // $Productos = $Consulta_1->fetchAll(PDO::FETCH_BOTH);  
           
            $Consulta_2 = $this->ConsultaVitrina_M->consultarNombreTienda($ID_Tienda);
            $Nombre = $Consulta_2->fetch(PDO::FETCH_ASSOC);
            $Datos=[
                'id_tienda' => $ID_Tienda,
                "seccion" => $Secciones,
                "NombreTienda" => $NombreTienda,
            ];

            $this->vista("paginas/vitrina_V",  $Datos);
            $this->vista("inc/header_Tienda",  $Datos);
        }

        public function alertPersonal(){
            $this->vista("inc/alert");
        }
    }
?>    
<?php
//Archivo llamado desde funcionesVarias.js por medio de vitrina()
    class Vitrina_C extends Controlador{

        public function __construct(){
            $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");
        }
        
        //Metodo cargado desde E_Tiendas.js - E_Inicio.js
        public function index($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Tienda, el nombre de tienda, la seccion y la opcion separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(",", $DatosAgrupados);
            $ID_Tienda = $DatosAgrupados[0];
            $NombreTienda = $DatosAgrupados[1];
            $SeccionBuscada = $DatosAgrupados[2];
            $OpcionBuscada = $DatosAgrupados[3];

            //Se CONSULTAN las secciones de una tienda en particular
            $Consulta_1 = $this->ConsultaVitrina_M->consultarSecciones($ID_Tienda);
            $Secciones = $Consulta_1->fetchAll(PDO::FETCH_BOTH);  
            
            //Se CONSULTAN la fotografia de una tienda en particular
            $Consulta_2 = $this->ConsultaVitrina_M->consultarFotografia($ID_Tienda);
            $Fotografia = $Consulta_2->fetchAll(PDO::FETCH_BOTH);

            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta = $this->ConsultaVitrina_M->consultarSloganTienda($ID_Tienda);
            $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos=[
                'id_tienda' => $ID_Tienda,
                "seccion" => $Secciones,
                "NombreTienda" => $NombreTienda,
                "fotografia" => $Fotografia,
                'slogan' => $Slogan,
                'Seccion' => $SeccionBuscada,
                'Opcion' => $OpcionBuscada,
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            $this->vista("inc/header_Tienda",  $Datos);
            $this->vista("paginas/vitrina_V",  $Datos);
        }

        public function alertPersonal(){
            $this->vista("inc/alert");
        } 
    }
?>    
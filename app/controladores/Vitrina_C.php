<?php
    class Vitrina_C extends Controlador{

        public function __construct(){
            $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
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
            $Secciones = $this->ConsultaVitrina_M->consultarSecciones($ID_Tienda);
            
            //Se CONSULTAN la fotografia de una tienda en particular
            $Fotografia = $this->ConsultaVitrina_M->consultarFotografia($ID_Tienda);

            //Se CONSULTAN el slogan de una tienda en particular
            $Slogan = $this->ConsultaVitrina_M->consultarSloganTienda($ID_Tienda);

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
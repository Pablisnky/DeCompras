<?php
//Archivo llamado desde funcionesVarias.js por medio de vitrina()
    class Vitrina_C extends Controlador{

        public function __construct(){
            $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");
        }
        
        //Metodo cargado desde funcionesVarias por medio de window.open en funcion vitrina() 
        public function index($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Tienda y el nombre de tienda separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(",", $DatosAgrupados);
            // print_r($DatosAgrupados);
            
            $ID_Tienda = $DatosAgrupados[0];
            $NombreTienda = $DatosAgrupados[1];

            //Se CONSULTAN las secciones de una tienda en particular
            $Consulta_1 = $this->ConsultaVitrina_M->consultarSecciones($ID_Tienda);
            $Secciones = $Consulta_1->fetchAll(PDO::FETCH_BOTH);  
            
            //Se CONSULTAN la fotografia de una tienda en particular
            $Consulta_2 = $this->ConsultaVitrina_M->consultarFotografia($ID_Tienda);
            $Fotografia = $Consulta_2->fetchAll(PDO::FETCH_BOTH);

            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta = $this->ConsultaVitrina_M->consultarSloganTienda($ID_Tienda);
            $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //Se CONSULTAN los productos de una tienda segun su seccion 
            // $Consulta_1 = $this->ConsultaVitrina_M->consultarProductos($ID_Tienda);
            // $Productos = $Consulta_1->fetchAll(PDO::FETCH_BOTH);  
           
            // $Consulta_2 = $this->ConsultaVitrina_M->consultarNombreTienda($ID_Tienda);
            // $Nombre = $Consulta_2->fetch(PDO::FETCH_ASSOC);

            $Datos=[
                'id_tienda' => $ID_Tienda,
                "seccion" => $Secciones,
                "NombreTienda" => $NombreTienda,
                "fotografia" => $Fotografia,
                'slogan' => $Slogan
            ];

            $this->vista("inc/header_Tienda",  $Datos);
            $this->vista("paginas/vitrina_V",  $Datos);
        }

        public function alertPersonal(){
            $this->vista("inc/alert");
        }

        // PENDIENTE_ PENDIENTE con este metodo se prente cargar el producto que el usuario solicitud desde el buscador
        //Metodo cargado desde funcionesVarias por medio de window.open en Inicio.js con la funcion OpcionSeleccionada() 
        // public function CargarProducto($DatosAgrupados){
        //     //$DatosAgrupados contiene una cadena con el ID_Tienda y el nombre de tienda separados por coma, se convierte en array para separar los elementos
        //     $DatosAgrupados = explode(",", $DatosAgrupados);
        //     // print_r($DatosAgrupados);
            
        //     $ID_Tienda = $DatosAgrupados[0];
        //     $NombreTienda = $DatosAgrupados[1];
        //     $SeccionTIenda = $DatosAgrupados[2];
        //     $FotografiaTIenda = $DatosAgrupados[3];

        //     //Se CONSULTAN las secciones de una tienda en particular
        //     // $Consulta_1 = $this->ConsultaVitrina_M->consultarSecciones($ID_Tienda);
        //     // $Secciones = $Consulta_1->fetchAll(PDO::FETCH_BOTH);  
            
        //     // //Se CONSULTAN la fotografia de una tienda en particular
        //     // $Consulta_2 = $this->ConsultaVitrina_M->consultarFotografia($ID_Tienda);
        //     // $Fotografia = $Consulta_2->fetchAll(PDO::FETCH_BOTH);
           
        //     $Datos=[
        //         'id_tienda' => $ID_Tienda,
        //         "seccion" => $SeccionTIenda,
        //         "NombreTienda" => $NombreTienda,
        //         "fotografia" => $FotografiaTIenda
        //     ];
        //     echo "<pre>";
        //     print_r($Datos);
        //     echo "</pre>";
        //     exit();

        //     $this->vista("inc/header_Tienda",  $Datos);
        //     $this->vista("paginas/vitrina_V",  $Datos);
        // }
    }
?>    
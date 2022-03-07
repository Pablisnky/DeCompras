<?php
    class VitrinaMayorista_C extends Controlador{
        private $ID_Mayorista;

        public function __construct(){
            // session_start();

            $this->ConsultaVitrina_M = $this->modelo('VitrinaMayorista_M');

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }     
        
        //llamado desde header_inicio
        public function index(){   
            //Se CONSULTAN los mayoristas que estan afiliados       
            $this->Mayorista = $this->ConsultaVitrina_M->consultarMayorista(); 
                     
            // echo '<pre>';
            // print_r($this->Mayorista);
            // echo '</pre>';
            // exit;
            
            $Datos = [
                'mayoristas_afiliados' => $this->Mayorista, //ID_Mayorista, nombreMay, fotografiaMay, telefonoMay, direccionMay, municipioMay, estadoMay
            ];

            $this->vista("header/header");
            $this->vista("view/mayoristas_V", $Datos);
        }  

        //Llamado desde E_Mayorista.js
        public function vitrina_Mayorista($DatosAgrupados){
            //$DatosAgrupados contiene una cadena separados por coma, se convierte en array para separar los elementos
            // echo 'Datos agrupados= ' . $DatosAgrupados . '<br>';
            // exit;

            $DatosAgrupados = explode(',', $DatosAgrupados);

            $ID_Mayorista = $DatosAgrupados[0];
            $NombreMayorista = $DatosAgrupados[1]; 
            $Foto_Mayorista = $DatosAgrupados[2];
            // exit();

            //Solicita el precio del dolar
            require(RUTA_APP . '/controladores/Menu_C.php');
            $this->PrecioDolar = new Menu_C();
            
            //CONSULTA las secciones de productos de un mayorista
            $Secciones = $this->ConsultaVitrina_M->consultarSeccionesMayorista($ID_Mayorista);
            
            //Se CONSULTAN la cantidad de productos por seccion de un mayorista
            // $Cant_ProductosSeccion = $this->ConsultaMayorista_M->consultarCant_ProductosSeccion($ID_Mayorista);
            
            $Datos = [
                'id_mayorista' => $ID_Mayorista,
                'nombreMayorista' => $NombreMayorista,
                'fotoMayorista' => $Foto_Mayorista,
                'categoriaMayorista' => $Secciones, //ID_Mayorista, ID_SeccionMay, seccionMay,nombre_img_seccionMay 
                'dolarHoy' => $this->PrecioDolar->Dolar
            ];
   
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista("header/header_Mayorista", $Datos);
            $this->vista("modal/modal_codigoMayorista_V", $Datos);
            $this->vista("view/VitrinaMayorista_V", $Datos);
        }
    }
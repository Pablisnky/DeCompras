<?php
    class VitrinaMayorista_C extends Controlador{

        public function __construct(){
            session_start();

            $this->ConsultaVitrina_M = $this->modelo('VitrinaMayorista_M');

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }     
        
        //llamado desde header_inicio
        public function index(){   
            //Se CONSULTAN los mayoristas que estan afiliados       
            $Mayorista = $this->ConsultaVitrina_M->consultarMayorista(); 
            
            $Datos = [
                'mayoristas_afiliados' => $Mayorista, //ID_Mayorista, nombreMay, fotografiaMay, telefonoMay, direccionMay, municipioMay, estadoMay
            ];
              
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("header/header");
            $this->vista("view/mayoristas_V", $Datos);
            // $this->vista("footer/footer");
        }  

        //Llamado desde E_Mayorista.js - CuentaVendedor_C/agregarProductoAPedido
        public function vitrina_Mayorista($DatosAgrupados){
            //$DatosAgrupados contiene una cadena separados por coma, se convierte en array para separar los elementos
            // echo 'Datos agrupados= ' . $DatosAgrupados . '<br>';
            // exit;

            $DatosAgrupados = explode(',', $DatosAgrupados);

            $ID_Mayorista = $DatosAgrupados[0];
            $NombreMayorista = $DatosAgrupados[1]; 
            $Foto_Mayorista = $DatosAgrupados[2];
            $Token = $DatosAgrupados[3];
           
            // $Token es un string, se convierte a booleano
            $Token = filter_var($Token, FILTER_VALIDATE_BOOLEAN);
            // var_dump($Tokenizado);
            // exit; 

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
            if($Token == false){//No carga la ventana modal si viene de una cuenta de usuario
                $this->vista("modal/modal_codigoMayorista_V", $Datos);
            }
            $this->vista("view/vitrinaMayorista_V", $Datos);
        }
        
        //invocado en header_Maorista.php
        public function solicitarCodigoDespacho(){
            //CONSULTA los vendeoores activos segun la zona que atienden
            $ID_Mayorista = 1; //ID_Mayorista de Don_Rigo
            $VendedorActivo = $this->ConsultaVitrina_M->consultarVendedoresMay($ID_Mayorista);

            $Datos = [
                'nombreMayorista' => 'Distribuidora Don Rigo',
                'vendedor_activo' => $VendedorActivo, //
            ];
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista("header/header_Mayorista", $Datos);
            $this->vista('view/agregarMinorista_V', $Datos);
        }
    }
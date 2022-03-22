<?php
    class Mayorista_C extends Controlador{
        private $Mayorista;
        private $ID_Mayorista;
        public $SeccionesMay;
        private $Nombre_Mayorista;

        public function __construct(){
            session_start();  
            $this->ConsultaMayorista_M = $this->modelo("Mayorista_M");
            
            //Sesiones creadas en Login_C
            $this->ID_Mayorista = $_SESSION['ID_Mayorista'];
            
            //Se CONSULTAN las secciones de un mayorista en particular, solicitado en el header y otros metodos
            $this->SeccionesMay = $this->ConsultaMayorista_M->consultarSeccionesMayorista($this->ID_Mayorista);
            // echo '<pre>';
            // print_r($this->SeccionesMay); //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
            // echo '</pre>';
            // exit;

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        // //llamado desde login_C
        // public function admin(){            
        //     //Sesiones creadas en Login_C
        //     // $this->ID_Mayorista = $_SESSION['ID_Mayorista'];

        //     $Datos = [
        //         'seccionesMay' => $this->SeccionesMay ////ID_Mayorista, ID_SeccionMay, seccionMay,nombre_img_seccionMay 
        //     ];
            
        //     $this->vista("header/header_AfiMay", $Datos);
        //     $this->vista("view/cuenta_mayorista/cuenta_inicioMay_V");
        // }

        //Metodo invocado desde A_Cuenta_publicarMay.js
        public function SeccionesDisponiblesMay(){
            $Datos = [
                'seccionesMay' => $this->SeccionesMay, //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('modal/modal_SeccionesDisponiblesMay_V', $Datos);
        }

        //Metodo invocado desde A_Cuenta_editar_proMay.js
        public function SeccionesSeleccionadasMay($ID_Producto){
            //CONSULTA la seccion donde se encuentra el producto
            $SeccionActiva= $this->ConsultaMayorista_M->consultarSeccionProductosMayorista($ID_Producto);

            $Datos = [
                'seccionActiva' => $SeccionActiva, //ID_SeccionMay
                'seccionesMay' => $this->SeccionesMay, //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
            ];
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            // $this->vista('modal/modal_SeccionesSeleccionadasMay_V', $Datos);
        }
    }
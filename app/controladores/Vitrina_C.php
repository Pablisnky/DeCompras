<?php
    class Vitrina_C extends Controlador{

        public function __construct(){
            $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");
        }
        
        //Se CONSULTAN los productos de la tienda seleccionada, llamada desde funcionesVarios.js en la funcion vitrina()
        public function index($ID_Tienda){
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
        
        // public function Delivery(){
        //     //Se CONSULTAN el departamento de Delivery y Rotiseria
        //     $Consulta = $this->ConsultaVitrina_M->consultarDelivery();
        //     $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);
            
        //     $this->vista("paginas/vitrina_V",  $Datos);
        // }

        //public function Ropa(){
            //Se CONSULTAN los Licores y comidas de restaurant
            // $Consulta = $this->ConsultaVitrina_M->consultarRopa();
            // $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);

            // $this->vista("paginas/vitrina_V", $Datos);
        //}

        // public function Bar(){
        //     //Se CONSULTAN los Licores y comidas de restaurant
        //     $Consulta = $this->ConsultaVitrina_M->consultarLicoresRest();
        //     $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);

        //     $this->vista("paginas/vitrina_V", $Datos);
        // }

        // public function Alimentos(){
        //     //Se CONSULTAN los alimentos
        //     $Consulta = $this->ConsultaVitrina_M->consultarAlimentos();
        //     $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);
            
        //     $this->vista("paginas/vitrina_V", $Datos);
        // }

        // public function Productos(){
        //     //Se CONSULTAN los productos
        //     $Consulta = $this->ConsultaVitrina_M->consultarProductos();
        //     $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);
            
        //     $this->vista("paginas/vitrina_V", $Datos);
        // }

        // public function Maquinas(){
        //     //Se CONSULTAN las máquinas
        //     $Consulta = $this->ConsultaVitrina_M->consultarMaquinas();
        //     $Datos = $Consulta->fetchAll(PDO::FETCH_BOTH);

        //     $this->vista("paginas/vitrina_V", $Datos);
        // }
        
        public function Opciones($ID_Producto, $Departamento){
            //Se CONSULTAN las ociones
            $Consulta = $this->ConsultaOpciones_M->consultarOpciones($Departamento, $ID_Producto);
            $Datos= $Consulta->fetchAll(PDO::FETCH_BOTH);
            print_r($Datos);
            ?>
            <style>
                .section_3{/*vitrina*/
                    display: block;
                    background-color: rgba(165, 42, 42, 0.8)
                }            
                html{
                    overflow:"hidden";
                }
            </style>
                 <?php
            //  $this->vista("paginas/vitrina_V", $Datos);
        }
    }
?>    
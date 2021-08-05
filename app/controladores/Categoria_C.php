<?php
    class Categoria_C extends Controlador{

        public function __construct(){
            session_start();
            
            $this->ConsultaCategoria_M = $this->modelo("Categoria_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){
            //Se CONSULTAN todos los estados en los cuales existen tiendas disponibles para mostrar a usuarios
            $EstadosTiendas = $this->ConsultaCategoria_M->consultarEstadosTiendas();

            //Se CONSULTAN todas las ciudades en las cuales existen tiendas
            $CiudadesTiendas = $this->ConsultaCategoria_M->consultarCiudadesTiendas();
            
            $Datos = [
                'estados' => $EstadosTiendas, //estado_Tien
                'ciudades' => $CiudadesTiendas, //parroquia_Tien, estado_Tien
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista("inc/header"); 
            $this->vista("view/categoria_V", $Datos); 
        }

        //Metodo invocado en A_Categorias.js por medio de Llamar_TiendasCiudad()
        function TiendasPorCategorias($Parroquia){
            //Se CONSULTA la cantidad de tiendas que estan afiliadas en una ciudad por categorias
            $CantidadTiendas = $this->ConsultaCategoria_M->consultarCantidadTiendas($Parroquia);

            $Datos = [
                'cantidadTiendasCategoria' => $CantidadTiendas //ID_Categoria, parroquia_Tien, (Count cantidad)
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("view/CantidadTiendas_Ajax_V", $Datos); 
        }
    }
?>
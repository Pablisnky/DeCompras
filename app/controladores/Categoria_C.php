<?php
    class Categoria_C extends Controlador{

        public function __construct(){
            $this->ConsultaCategoria_M = $this->modelo("Categoria_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){
            //Se CONSULTAN todas las ciudades en las cuales existen tiendas
            $CiudadesTiendas = $this->ConsultaCategoria_M->consultarCiudadesTiendas();
           
            $Datos = [
                'ciudades' => $CiudadesTiendas, //parroquia_Tien
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista("inc/header"); 
            $this->vista("paginas/categoria_V", $Datos); 
        }

        function TiendasPorCategorias($Parroquia){
            //Se CONSULTA la cantidad de tiendas que estan afiliadas por categorias
            $CantidadTiendas = $this->ConsultaCategoria_M->consultarCantidadTiendas($Parroquia);

            $Datos = [
                'cantidadTiendasCategoria' => $CantidadTiendas
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("paginas/CantidadTiendas_Ajax_V", $Datos); 
        }
    }
?>
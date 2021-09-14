<?php
    class Categoria_C extends Controlador{

        public function __construct(){
            session_start();
            
            $this->ConsultaCategoria_M = $this->modelo("Categoria_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        //Metodo invocado en ( E_Ciudades.js ) muestra las categorias
        function index($Parroquia){
            //Se CONSULTA la cantidad de tiendas que estan afiliadas en una ciudad por categorias
            $CantidadTiendas = $this->ConsultaCategoria_M->consultarCantidadTiendas($Parroquia);

            $Datos = [
                'cantidadTiendasCategoria' => $CantidadTiendas //ID_Categoria, parroquia_Tien, (Count cantidad)
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("header/header"); 
            $this->vista("view/categorias_V", $Datos); 
        }
    }
?>
<?php
session_start();

    class Publicacion_C extends Controlador{
        public function __construct(){
            $this->ConsultaPublicacion_M = $this->modelo("Publicacion_M");
        }
        
        public function index(){
            $this->vista("paginas/entrada_V");
        }
        
        public function MisPublicaciones(){
            //CONSULTA las categorias de productos que existen en la BD
            $Consulta = $this->ConsultaPublicacion_M->consultarCategoriaProductos();
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC); 

            $this->vista("paginas/publicacion_V", $Datos);
        }

        public function ConsultarOpciones($OpcionProd){
            // CONSULTA las opciones de productos que existen en la BD segun la categoria seleccionada
            $Consulta = $this->ConsultaPublicacion_M->consultarOpcionesProductos($OpcionProd);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);
        
            $this->vista("inc/Select_Ajax_V", $Datos);
        }

        public function recibeRegistro(){            
            // Se reciben todos los campos del formulario, desde registro_V.php 
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["categoria_pro"]) && !empty($_POST["descripcion_pro"]) && !empty($_POST["precio"])){
                //si son enviados por POST y sino estan vacios, entra aqui
                $RecibeDatos = [
                    'Categoria_pro' => filter_input(INPUT_POST, "categoria_pro", FILTER_SANITIZE_STRING),
                    'Descripcion_pro' => filter_input(INPUT_POST, "descripcion_pro", FILTER_SANITIZE_STRING),
                    'Precio_pro' => filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING),
                    'ID_Tienda' => filter_input(INPUT_POST, "ID_Tienda", FILTER_SANITIZE_STRING),
                ];
            }
            else{
                echo "Llene todos los campos del formulario de registro";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }
            
            //Se INSERTAN los datos del producto en la BD
            $this->ConsultaPublicacion_M->insertarProducto($RecibeDatos);

            //Redirecciona, La función redireccionar se encuantra en url_helper.php
            // redireccionar("/Login_C/");
        }
    }
?>    
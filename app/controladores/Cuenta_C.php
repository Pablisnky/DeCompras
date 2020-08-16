<?php
    session_start();

    class Cuenta_C extends Controlador{
        private $ID_Tienda;
        private $ID_Afiliado;

        public function __construct(){
            $this->ConsultaCuenta_M = $this->modelo("Cuenta_M");
            
            //Sesion creada en Login_C
            $this->ID_Tienda = $_SESSION["ID_Tienda"];
            
            //Sesion creada en Login_C
            $this->ID_Afiliado = $_SESSION["ID_Afiliado"];
        }
        
        public function index(){
            //CONSULTA los productos de una tienda en especifico
            $Consulta = $this->ConsultaCuenta_M->consultarProductosTienda($this->ID_Tienda);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            $this->vista("paginas/cuenta_V", $Datos);
        }
        
        public function Editar(){
            //CONSULTA los datos de la tienda
            $Consulta = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);
            $DatosTienda = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //CONSULTA los datos del responsable de la tienda
            $Consulta = $this->ConsultaCuenta_M->consultarResponsableTienda($this->ID_Afiliado);
            $DatosResposable = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            // //CONSULTA los datos de cuentas bancarias de la tienda
            $Consulta = $this->ConsultaCuenta_M->consultarBancosTienda($this->ID_Afiliado);
            $DatosBancos = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            // //CONSULTA las categorias de productos que existen en la BD
            // $Consulta = $this->ConsultaCuenta_M->consultarCategoriaProductos($this->ID_Tienda );
            // $Categorias = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'datosTienda' => $DatosTienda,
                'datosResposable' => $DatosResposable,
                'datosBancos' => $DatosBancos,
                // 'categorias' => $Categorias,
            ];

            $this->vista("paginas/cuenta_editar_V", $Datos);
        }

        public function Publicar(){
            //CONSULTA las categorias de productos que existen en la BD
            $Consulta = $this->ConsultaCuenta_M->consultarCategoriaProductos($this->ID_Tienda );
            $Categorias = $Consulta->fetchAll(PDO::FETCH_ASSOC); 

            $Datos = [
                'categorias' => $Categorias,
            ];
            
            $this->vista("paginas/cuenta_publicar_V", $Datos);
        }

        public function ConsultarOpciones($OpcionProd){
            //CONSULTA las opciones de productos que existen en la BD segun la categoria seleccionada
            $Consulta = $this->ConsultaCuenta_M->consultarOpcionesProductos($OpcionProd);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);
        
            $this->vista("inc/Select_Ajax_V", $Datos);
        }

        public function recibeRegistro(){            
            //Se reciben todos los campos del formulario de carga de productos, desde publicaciones_V.php 
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
            $this->ConsultaCuenta_M->insertarProducto($RecibeDatos);

            //Redirecciona, La función redireccionar se encuantra en url_helper.php
            // redireccionar("/Login_C/");
        }
        
        public function Categorias(){
            //CONSULTA las categorias que exiten en la BD
            $Consulta = $this->ConsultaCuenta_M->consultarCatgorias();
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);
        
            $this->vista("inc/Categorias_Ajax_V", $Datos);
        }
    }
?>    
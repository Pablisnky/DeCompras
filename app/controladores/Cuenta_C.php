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

            //CONSULTA los datos de cuentas bancarias de la tienda
            $Consulta = $this->ConsultaCuenta_M->consultarBancosTienda($this->ID_Afiliado);
            $DatosBancos = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //CONSULTA las categorias en la que la tienda esta registrada
            $Consulta = $this->ConsultaCuenta_M->consultarCategoriaTIenda($this->ID_Afiliado);
            $Categoria = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'datosTienda' => $DatosTienda,
                'datosResposable' => $DatosResposable,
                'datosBancos' => $DatosBancos,
                'categoria' => $Categoria,
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

        public function recibeRegistroEditado(){             
            // Se reciben todos los campos del formulario, desde registro_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre_Afcom"]) && !empty($_POST["apellido_Afcom"]) && !empty($_POST["cedula_Afcom"]) && !empty($_POST["telefono_Afcom"]) && !empty($_POST["correo_Afcom"]) && !empty($_POST["nombre_com"]) && !empty($_POST["telefono_com"]) && !empty($_POST["direccion_com"]) && !empty($_POST["rif_com"])){
               
                $RecibeDatos = [
                    // Recibe datos de la persona responsable
                    'Nombre_Afcom' => filter_input(INPUT_POST, "nombre_Afcom", FILTER_SANITIZE_STRING),
                    'Apellido_Afcom' => filter_input(INPUT_POST, "apellido_Afcom", FILTER_SANITIZE_STRING),
                    'Cedula_Afcom' => filter_input(INPUT_POST, "cedula_Afcom", FILTER_SANITIZE_STRING),
                    'Telefono_Afcom' => filter_input(INPUT_POST, "telefono_Afcom", FILTER_SANITIZE_STRING),
                    'Correo_Afcom' => filter_input(INPUT_POST, "correo_Afcom", FILTER_SANITIZE_STRING),
                    
                    // Recibe datos de la tienda
                    'Nombre_com' => filter_input(INPUT_POST, "nombre_com", FILTER_SANITIZE_STRING),
                    'Telefono_com' => filter_input(INPUT_POST, "telefono_com", FILTER_SANITIZE_STRING),
                    'Direccion_com' => filter_input(INPUT_POST, "direccion_com", FILTER_SANITIZE_STRING),
                    'Rif_com' => filter_input(INPUT_POST, "rif_com", FILTER_SANITIZE_STRING),
                ];
                // echo "<pre>";
                // print_r($RecibeDatos);
                // echo "</pre>";
                // exit;
                // $RecibeDatos = [
                //         'Nombre' => ucwords($_POST["nombre"]),                       
                //         'Cedula' => is_numeric($_POST["cedula"]) ? $_POST["cedula"]: false,
                //         'Telefono' => is_numeric($_POST["telefono"]) ? $_POST["telefono"]: false,
                //         'Correo' => mb_strtolower($_POST["correo"]),  
                //         'Clave' => $_POST["clave"],
                //         'RepiteClave' => $_POST["confirmarClave"],
                // ];

                //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                // if($RecibeDatos["Telefono_Afcom"] == false){      
                //     exit("El telefono debe ser solo números");
                // }
                // //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                // if($RecibeDatos["Cedula_Afcom"] == false){      
                //     exit("La cedula debe ser solo números");
            }
            else{
                echo "Llene todos los campos del formulario de registro";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            // Recibe las categorias seleccionadas
            foreach(array_keys($_POST['categoria']) as $key){
                if(!empty($_POST['categoria'][$key])){
                    $Categoria = $_POST['categoria'][$key];  
                }   
                else{
                    echo "Ingrese al menos una categoría";
                    exit();
                }
            }

            //Recibe datos bancarios
            foreach(array_keys($_POST['banco']) as $key){
                if(!empty($_POST['banco'][$key]) && !empty($_POST['titular'][$key]) && !empty($_POST['numeroCuenta'][$key]) && !empty($_POST['rif'][$key])){
                    $Banco = $_POST['banco'][$key];  
                    $Titular = $_POST['titular'][$key]; 
                    $NumeroCuenta = $_POST['numeroCuenta'][$key];
                    $Rif = $_POST['rif'][$key];
                    $ID_Banco = $_POST['id_banco'][$key];
                }   
                else{
                    echo "Ingrese datos bancarios completos";
                    exit();
                }
            }

            //Se ACTUALIZAN los datos personales del responsable de la tienda en la BD y se retorna el ID recien insertado
            $this->ConsultaCuenta_M->actualizarAfiliadoComercial($this->ID_Afiliado, $RecibeDatos);
           
            //Se ACTUALIZAN los datos de la tienda en la BD
            $this->ConsultaCuenta_M->actualizarTienda($this->ID_Afiliado, $RecibeDatos);
            
            //Se ACTUALIZAN las categorias en las que se encuentra una tienda
            $this->ConsultaCuenta_M->actualizarCategoriaTienda($this->ID_Afiliado, $Categoria);

            //Se ACTUALIZAN los datos bancarios de la tienda en la BD
            $this->ConsultaCuenta_M->actualizarBancos($ID_Banco, $Banco, $Titular, $NumeroCuenta, $Rif);

            //Redirecciona, La función redireccionar se encuantra en url_helper.php
            redireccionar("/Cuenta_C/");
        }
        
        //Llamado desde Funciones_Ajax.js por medio de Llamar_categorias()
        public function Categorias(){
            //CONSULTA las categorias que exiten en la BD
            $Consulta = $this->ConsultaCuenta_M->consultarCatgorias();
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);
        
            $this->vista("inc/Categorias_Ajax_V", $Datos);
        }

        public function recibeProducto(){
            // Se reciben todos los campos del formulario, desde cuenta_publicar_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["producto"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"])){

                $RecibeProducto = [
                    // Recibe datos de la persona responsable
                    'Producto' => filter_input(INPUT_POST, "producto", FILTER_SANITIZE_STRING),
                    'Descripcion' => filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING),
                    'Precio' => filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING),
                ];
            }
            else{
                echo "Llene todos los campos del formulario de producto";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }
            
            //Se INSERTAN el producto en la BD
            $this->ConsultaCuenta_M->insertarProducto($RecibeProducto);
            
            //Se INSERTAN la descripcion del producto en la BD
            $this->ConsultaCuenta_M->insertarDescripcionProducto($RecibeProducto);
            
            $this->vista("paginas/cuenta_publicar_V");
        }
    }
?>    
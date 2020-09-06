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
            
            //Se CONSULTAN las secciones de una tienda en particular
            // $Consulta = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            // $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            //     echo "<pre>";
            //     print_r($Secciones);
            //     echo "</pre>";
        
            // $this->vista("inc/header_AfiCom",  $Secciones);
        }
        
        public function index(){

            $this->vista("paginas/cuenta_V");
        }

        public function Productos(){
            //CONSULTA los productos de una tienda en especifico
            $Consulta = $this->ConsultaCuenta_M->consultarProductosTienda($this->ID_Tienda);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            $this->vista("paginas/cuenta_productos_V", $Datos);
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
            $Consulta = $this->ConsultaCuenta_M->consultarCategoriaTIenda($this->ID_Tienda);
            $Categoria = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            //CONSULTA las secciones de la tienda
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'datosTienda' => $DatosTienda,
                'datosResposable' => $DatosResposable,
                'datosBancos' => $DatosBancos,
                'categoria' => $Categoria,
                'secciones' => $Secciones,
            ];

            $this->vista("paginas/cuenta_editar_V", $Datos);
        }

        public function Publicar(){ 
            //CONSULTA las categorias en las que una tienda se ha postulado
            $Consulta = $this->ConsultaCuenta_M->consultarCategoriaTiendas($this->ID_Tienda );
            $Categorias = $Consulta->fetchAll(PDO::FETCH_ASSOC); 
            
            //CONSULTA las secciones que tiene una tienda
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $Datos = [
                'categorias' => $Categorias,
                'secciones' => $Secciones
            ];
            
            //Se crea una sesión con el contenido de una seccion para verificar que el usuario ya las tiene creadas cuando vaya a cargar un producto
            foreach($Datos['secciones'] as $Key){
                $Seccion = $Key['seccion'];
            }                   
            $_SESSION['Seccion'] = $Seccion;
            
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
            if($_SERVER["REQUEST_METHOD"] == "POST" 
            // && !empty($_POST["nombre_Afcom"]) && !empty($_POST["apellido_Afcom"]) && !empty($_POST["cedula_Afcom"]) && !empty($_POST["telefono_Afcom"]) && !empty($_POST["correo_Afcom"]) && !empty($_POST["nombre_com"]) && !empty($_POST["telefono_com"]) && !empty($_POST["direccion_com"]) && !empty($_POST["rif_com"])
            ){
               
                $RecibeDatos = [
                    // Recibe datos de la persona responsable
                    'Nombre_Afcom' => filter_input(INPUT_POST, "nombre_Afcom", FILTER_SANITIZE_STRING),
                    'Apellido_Afcom'=> filter_input(INPUT_POST, "apellido_Afcom", FILTER_SANITIZE_STRING),
                    'Cedula_Afcom' => filter_input(INPUT_POST, "cedula_Afcom", FILTER_SANITIZE_STRING),
                    'Telefono_Afcom'=> filter_input(INPUT_POST, "telefono_Afcom", FILTER_SANITIZE_STRING),
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
            // else{
            //     echo "Llene todos los campos del formulario de registro";
            //     echo "<a href='javascript: history.go(-1)'>Regresar</a>";
            //     exit();
            // }

            // Recibe las categorias seleccionadas
            if(!empty($_POST['categoria'])){
                foreach($_POST['categoria'] as $Categoria){
                    $Categoria = $_POST['categoria']; 
                } 
            } 
            else{
                echo "Ingrese al menos una categoría";
                exit();
            }            

            // Recibe las secciones 
            if(!empty($_POST['seccion'])){
                foreach($_POST['seccion'] as $Seccion){
                    $Seccion = $_POST['seccion']; 
                } 
                //El array trae elemenos duplicados, se eliminan los duplicado
                $SeccionTienda = array_unique($Seccion); 
            } 
            else{
                echo "Ingrese al menos una sección";
                exit();
            }

            //Recibe datos bancarios
            // foreach(array_keys($_POST['banco']) as $key){
            //     // if(!empty($_POST['banco'][$key]) && !empty($_POST['titular'][$key]) && !empty($_POST['numeroCuenta'][$key]) && !empty($_POST['rif'][$key])){
            //         $Banco = $_POST['banco'][$key];  
            //         $Titular = $_POST['titular'][$key]; 
            //         $NumeroCuenta = $_POST['numeroCuenta'][$key];
            //         $Rif = $_POST['rif'][$key];
            //         $ID_Banco = $_POST['id_banco'][$key];
                // }   
                // else{
                //     echo "Ingrese datos bancarios completos";
                //     exit();
                // }
            // }


            // **********************************************************************************
            //Procedimiento para INSERTAR la categoria de la tienda esto debe ser por medio de TRANSACCIONES
            // **********************************************************************************
            // 1-Se ELIMINAN todas las categorias que tiene la tienda
            $this->ConsultaCuenta_M->eliminarCategoriaTienda($this->ID_Tienda);
            
            // 2-Se consulta el ID_Categoria de las categorias seleccionadas
            $ID_Categoria = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);
            $ID_Categ = $ID_Categoria->fetchAll(PDO::FETCH_ASSOC); 

            //Se INSERTA la dependenciatransitiva entre la tienda y la categoria a la que pertenece
            $this->ConsultaCuenta_M->insertarDT_CatTie($ID_Categ, $this->ID_Tienda);

            // **********************************************************************************
            //Procedimiento para INSERTAR las secciones de la tienda estos deben ser por medio de TRANSACCIONES
            // **********************************************************************************
            // 1-Se ELIMINAN todas las secciones que tiene la tienda
            $this->ConsultaCuenta_M->eliminarSeccionesTienda($this->ID_Tienda);

            //2-Se INSERTAN las secciones de la tienda  
            $this->ConsultaCuenta_M->insertarSeccionesTienda($this->ID_Tienda, $SeccionTienda);
            
            // **********************************************************************************
            // **********************************************************************************

            //Se ACTUALIZAN los datos personales del responsable de la tienda en la BD y se retorna el ID recien insertado
            $this->ConsultaCuenta_M->actualizarAfiliadoComercial($this->ID_Afiliado, $RecibeDatos);
           
            //Se ACTUALIZAN los datos de la tienda en la BD
            $this->ConsultaCuenta_M->actualizarTienda($this->ID_Afiliado, $RecibeDatos);
            
            //Se consulta el ID_Categoria de las categorias seleccionadas
            // $ID_Categoria = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);
            // $ID_Categ = $ID_Categoria->fetchAll(PDO::FETCH_ASSOC); 

            // //Se ACTUALIZAN las categorias en las que se encuentra una tienda
            // $this->ConsultaCuenta_M->actualizarCategoriaTienda($this->ID_Tienda, $ID_Categ);

            //Se ACTUALIZAN los datos bancarios de la tienda en la BD
            $this->ConsultaCuenta_M->actualizarBancos($ID_Banco, $Banco, $Titular, $NumeroCuenta, $Rif);

            //Redirecciona, La función redireccionar se encuantra en url_helper.php
            redireccionar("/Cuenta_C/");
        }
        
        //Llamado desde Funciones_Ajax.js por medio de Llamar_categorias()
        public function Categorias(){
            //CONSULTA las categorias que exiten en la BD
            $Consulta = $this->ConsultaCuenta_M->consultarCatgorias();
            $Categorias = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            //CONSULTA las categorias en las que una tienda se ha postulado
            $Consulta = $this->ConsultaCuenta_M->consultarCategoriaTiendas($this->ID_Tienda );
            $CategoriasTienda = $Consulta->fetchAll(PDO::FETCH_ASSOC);
                        
            $Datos = [
                'categorias' => $Categorias,
                'categoriasTienda' => $CategoriasTienda
            ];
        
            $this->vista("inc/Categorias_Ajax_V", $Datos);
        }

        //Metodo invocado desde Funciones_Ajax.js
        public function Secciones(){
            //Muestra las secciones que tiene una tienda llamada desde Funciones_Ajax.js
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            $Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'seccion' => $Seccion
            ];
                   
            $this->vista("inc/Secciones_Ajax_V", $Datos);
        }

        public function recibeProducto(){
            // Se reciben todos los campos del formulario, desde cuenta_publicar_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["seccion"]) && !empty($_POST["producto"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"])){

                $RecibeProducto = [
                    //Recibe datos de la persona responsable
                    'Seccion' => filter_input(INPUT_POST, "seccion", FILTER_SANITIZE_STRING),
                    'Producto' => filter_input(INPUT_POST, "producto", FILTER_SANITIZE_STRING),
                    'Descripcion' => filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING),
                    'Precio' => filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING),
                    'ID_Tienda' => filter_input(INPUT_POST, "id_tienda", FILTER_SANITIZE_STRING),
                ];
            }
            else{
                echo "Llene todos los campos del formulario de producto";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }
            
            //Se INSERTA el producto en la BD y se retorna el ID recien insertado
            $ID_Producto = $this->ConsultaCuenta_M->insertarProducto($RecibeProducto);
            
            //Se INSERTA la descripcion del producto en la BD y se retorna el ID recien insertado
            $ID_Opcion = $this->ConsultaCuenta_M->insertarDescripcionProducto($RecibeProducto);

            //Se CONSULTA el ID_Seccion de la seccion del producto
            $Consulta = $this->ConsultaCuenta_M->consultarID_Seccion($RecibeProducto);
            $ID_Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
        
            //Se INSERTA el ID_Seccion y el ID_Tienda del producto en la BD
            // $Seccion = $this->ConsultaCuenta_M->insertarDT_SecPro($RecibeProducto, $ID_Seccion);

            //Se INSERTA la dependenciatransitiva entre  producto, opciones
            $this->ConsultaCuenta_M->insertarDT_ProOpc($ID_Producto, $ID_Opcion);
            
            //Se INSERTA la dependenciatransitiva entre producto y la tienda que ofrece el producto
            // $this->ConsultaCuenta_M->insertarDT_ProTie($RecibeProducto, $ID_Producto);

            //Se INSERTA la dependenciatransitiva entre secciones y las opciones (en los casos que no hay especificidad de producto)            
            $this->ConsultaCuenta_M->insertarDT_SecOpc($ID_Seccion, $ID_Opcion);

            //Se INSERTA la dependenciatransitiva entre secciones y los productos
            $this->ConsultaCuenta_M->insertarDT_SecPro($ID_Seccion, $ID_Producto);

            //Se INSERTA la dependenciatransitiva en la tabla central
            // $this->ConsultaCuenta_M->insertarDTC($RecibeProducto, $ID_Producto);

            //Se consulta el ID_Categoria de las categorias seleccionadas
            // $Consulta = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);
            // $ID_Categoria = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            // //Se INSERTA la dependenciatransitiva entre la tienda y la categoria a la que pertenece
            // $this->ConsultaCuenta_M->insertarDT_CatTie($ID_Categoria, $this->ID_Tienda);

            $this->vista("paginas/cuenta_publicar_V");
        }
                
        //Metodo invocada desde cuenta_editar_pro_V.php
        public function recibeAtualizarProducto(){
            // Se reciben todos los campos del formulario, se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["seccion"]) && !empty($_POST["producto"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"])){

                $RecibeProducto = [
                    //Recibe datos de la persona responsable
                    'Seccion' => filter_input(INPUT_POST, "seccion", FILTER_SANITIZE_STRING),
                    'Producto' => filter_input(INPUT_POST, "producto", FILTER_SANITIZE_STRING),
                    'Descripcion' => filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING),
                    'Precio' => filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING),
                    'ID_Producto' => filter_input(INPUT_POST, "id_producto", FILTER_SANITIZE_STRING),
                    'ID_Opcion' => filter_input(INPUT_POST, "id_opcion", FILTER_SANITIZE_STRING),
                ];
            }
            else{
                echo "Llene todos los campos del formulario de producto";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            // Estas dos sentencias de actualización deben realizarce por medio de transsacciones
            $this->ConsultaCuenta_M->actualizarOpcion($RecibeProducto);
            $this->ConsultaCuenta_M->actualizarProducto($RecibeProducto);

            $Datos = $this->Productos();
            $this->vista("paginas/cuenta_productos_V", $Datos);
        }

        //metodo invocado desde cuenta_productos_V.php
        public function actualizarProducto($ID_Producto){
            //Consulta las especiicaciones de un producto determinado y de una tienda especifica
            $Consulta = $this->ConsultaCuenta_M->consultarDescripcionProducto($this->ID_Tienda, $ID_Producto);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $this->vista("paginas/cuenta_editar_prod_V", $Datos);
        }

        //metodo invocado desde cuenta_productos_V.php
        public function eliminarProducto($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Opcion y ID_Producto separados por coma, se convierte en array para separar los elementos
            
            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Producto = $DatosAgrupados[0];
            $ID_Opcion = $DatosAgrupados[1];

            // *************************************************************************************
            //La siguientes cinco consultas entran en el procedimeinto para ELIMINAR un producto de una tienda, esto debe hacerse mediante transacciones            
            // *************************************************************************************
            $this->ConsultaCuenta_M->eliminarProductoSeccion($ID_Producto);
            $this->ConsultaCuenta_M->eliminarProductoOpcion($ID_Producto);
            $this->ConsultaCuenta_M->eliminarProductoTienda($ID_Producto);
            $this->ConsultaCuenta_M->eliminarOpcion($ID_Opcion);
            $this->ConsultaCuenta_M->eliminarOpcionSeccion($ID_Opcion);            
            // *************************************************************************************
            // *************************************************************************************

            $Datos = $this->Productos();
            $this->vista("paginas/cuenta_productos_V", $Datos);
        }
    }
?>    
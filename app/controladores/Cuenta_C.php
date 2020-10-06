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
            //CONSULTA los productos de una sección en especifico según la tienda
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //CONSULTA la imagen de la tienda 
            $Consulta = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);
            $Fotografia = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
            $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $Datos = [
                'secciones' => $Secciones,
                'fotografiaTienda' => $Fotografia,
                'slogan' => $Slogan
            ];

            $this->vista("paginas/cuenta_V", $Datos);
        }

        //Entrada del cliente a su cuenta de usuario, muestra todos los productos publicados o los de una sección en especifico
        public function Productos($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Producto y el ID_ContProducto separados por coma, se convierte en array para separar los elementos
            
            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $Seccion = $DatosAgrupados[0];
            $Puntero = empty($DatosAgrupados[1]) ? 'NoAplica' : $DatosAgrupados[1];
            //$Seccion cuando es una frase de varias palabras, la cadena llega unida, por lo que la busqueda en la BD no es la esperada.
            // - poner cada inicio de palabra con mayuscula para separarlas por medio de array, esto conlleva a que al recibir las secciones por parte del usuario en el formulario de configuración se conviertan estas letrs en mayuscula porque el usuario puede ingresarlas en minusculas
            // - Recibirla la variable sin que se elimine el espacio entre palabras
            //Provicionalmente se comento la sentencia que sanitiza la URL en Core.php que es donde se quitan los espacios en blancos
            urldecode($Seccion);
            
            if($Seccion  == 'Todos'){
                //CONSULTA todos los productos de una tienda
                $Consulta = $this->ConsultaCuenta_M->consultarTodosProductosTienda($this->ID_Tienda);
                $Productos = $Consulta->fetchAll(PDO::FETCH_ASSOC);
                
                //CONSULTA el estatus de la notificacion de una tienda
                $Consulta = $this->ConsultaCuenta_M->consultarNotificacionTienda($this->ID_Tienda);
                $Notificacion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
                
                //Se desglosa el valor para que sea solo igual el valor "1"
                $Notificacion = $Notificacion[0]['notificacion'];
               
                //ACTUALIZA el estatus de la notificacion de una tienda
                // $this->ConsultaCuenta_M->actualizarStatusTienda($this->ID_Tienda);
                
                $Seccion  = 'Todos';
            }
            else{
                //CONSULTA los productos de una sección en especifico según la tienda
                $Consulta = $this->ConsultaCuenta_M->consultarProductosTienda($this->ID_Tienda, $Seccion);
                $Productos = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                //Se da el valor de notifiación directamente debido a que si la condicion entró en el ELSE ya el afiliado a visitado la página y no tiene notificaciones por leer
                $Notificacion = 1;
                
                // $Seccion  = 'Seccion especifica';
            }
            
            //Se CONSULTAN las secciones de una tienda en particular
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
            $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'secciones' => $Secciones, //necesario en header_AfiCom, arma el item productos del menu
                'productos' => $Productos,
                'notificacion' => $Notificacion,
                'Seccion' => $Seccion, //necesario para identificar la sección en la banda naranja 
                'Apunta' => $Puntero,
                'slogan' => $Slogan
            ];
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            
            $this->vista("inc/header_AfiCom", $Datos);//Evaluar como mandar solo la seccion del array $Datos
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
            
            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
            $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);


            $Datos = [
                'datosTienda' => $DatosTienda,
                'datosResposable' => $DatosResposable,
                'datosBancos' => $DatosBancos,
                'categoria' => $Categoria,
                'secciones' => $Secciones,
                'slogan' => $Slogan
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
            
            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
            $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $Datos = [
                'categorias' => $Categorias,
                'secciones' => $Secciones,
                'slogan' => $Slogan
            ];
            
            //Se crea una sesión con el contenido de una seccion para verificar que el usuario ya las tiene creadas cuando vaya a cargar un producto
            foreach($Datos['secciones'] as $Key){
                $Seccion = $Key['seccion'];
            }                   
            $_SESSION['Seccion'] = $Seccion;
            
            // $this->vista("inc/header_AfiCom", $Datos);
            $this->vista("paginas/cuenta_publicar_V", $Datos);
        }

        //metodo invocado desde cuenta_productos_V.php
        public function actualizarProducto($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Producto y la opcion separados por coma, se convierte en array para separar los elementos
            
            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Producto = $DatosAgrupados[0];
            $Opcion = $DatosAgrupados[1];
            
            //CONSULTA los productos de una sección en especifico según la tienda
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            //CONSULTA las especiicaciones de un producto determinado y de una tienda especifica
            $Consulta = $this->ConsultaCuenta_M->consultarDescripcionProducto($this->ID_Tienda, $ID_Producto);
            $Especificaciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
            $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $Datos = [
                'secciones' => $Secciones, //Usado en header_AfiCom.php
                'especificaciones' => $Especificaciones,
                'puntero' => $Opcion,
                'slogan' => $Slogan
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            $this->vista("paginas/cuenta_editar_prod_V", $Datos);
        }

        public function ConsultarOpciones($OpcionProd){
            //CONSULTA las opciones de productos que existen en la BD segun la categoria seleccionada
            $Consulta = $this->ConsultaCuenta_M->consultarOpcionesProductos($OpcionProd);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);
        
            $this->vista("inc/Select_Ajax_V", $Datos);
        }

        //Metodo que recibe el formulario de actualizacion de los datos de una tienda invocado en cuenta_editar_V.php
        public function recibeRegistroEditado(){             
            // Se reciben todos los campos del formulario desde cuenta_editar_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" 
            // && !empty($_POST["nombre_Afcom"]) && !empty($_POST["apellido_Afcom"]) && !empty($_POST["cedula_Afcom"]) && !empty($_POST["telefono_Afcom"]) && !empty($_POST["correo_Afcom"]) && !empty($_POST["nombre_com"]) && !empty($_POST["telefono_com"]) && !empty($_POST["direccion_com"]) && !empty($_POST["rif_com"])
            ){
               
                $RecibeDatos = [
                    //Recibe datos de la persona responsable
                    'Nombre_Afcom' => filter_input(INPUT_POST, 'nombre_Afcom', FILTER_SANITIZE_STRING),
                    'Apellido_Afcom'=> filter_input(INPUT_POST, 'apellido_Afcom', FILTER_SANITIZE_STRING),
                    'Cedula_Afcom' => filter_input(INPUT_POST, 'cedula_Afcom', FILTER_SANITIZE_STRING),
                    'Telefono_Afcom'=> filter_input(INPUT_POST, 'telefono_Afcom', FILTER_SANITIZE_STRING),
                    'Correo_Afcom' => filter_input(INPUT_POST, 'correo_Afcom', FILTER_SANITIZE_STRING),
                    
                    // Recibe datos de la tienda            
                    'Nombre_com' => filter_input(INPUT_POST, 'nombre_com', FILTER_SANITIZE_STRING),
                    'Telefono_com' => filter_input(INPUT_POST, 'telefono_com', FILTER_SANITIZE_STRING),
                    'Direccion_com' => filter_input(INPUT_POST, 'direccion_com', FILTER_SANITIZE_STRING),
                    'Slogan_com' => filter_input(INPUT_POST, 'slogan_com', FILTER_SANITIZE_STRING),
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
            
            // ********************************************************
            //Recibe la imagen de perfil
            $nombre_img = $_FILES['imagen_Perfil']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
            $tipo = $_FILES['imagen_Perfil']['type'];
            $tamaño = $_FILES['imagen_Perfil']['size'];
            
            // echo "Nombre de la imagen = " . $nombre_img . "<br>";
            // echo "Tipo de archivo = " .$tipo .  "<br>";
            // echo "Tamaño = " . $tamaño . "<br>";
            // echo "Tamaño maximo permitido = 7.000.000" . "<br>";// en bytes
            // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

            //Si existe imagen_Perfil y tiene un tamaño correcto 
            if(($nombre_img == !NULL) AND ($tamaño <= 7000000)){
                //indicamos los formatos que permitimos subir a nuestro servidor
                if (($_FILES["imagen_Perfil"]["type"] == "image/jpeg")
                    || ($_FILES["imagen_Perfil"]["type"] == "image/jpg") || ($_FILES["imagen_Perfil"]["type"] == "image/png")){
                    
                    // Ruta donde se guardarán las imágenes que subamos la variable superglobal 
                    //usar en remoto
                    // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                    //Usar en remoto
                    // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/Reavivados/images/usuarios/'; 
                    // echo $_SERVER['DOCUMENT_ROOT'] . 'Versus_20_2/images/usuarios/';

                    //usar en local
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/perfiles/';

                    //se muestra el directorio temporal donde se guarda el archivo
                    //echo $_FILES['imagen']['tmp_name'];
                    // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                    move_uploaded_file($_FILES['imagen_Perfil']['tmp_name'], $directorio.$nombre_img);

                    //Para actualizar fotografia de perfil solo si se ha presionado el boton de buscar fotografia
                    if(($_FILES['imagen_Perfil']['name']) != ""){
                        //Se ACTUALIZA la fotografia el responsable de tienda
                        $this->ConsultaCuenta_M->actualizarFotografia($this->ID_Afiliado, $nombre_img);
                   }
                } 
                else{
                    //si no cumple con el formato
                    echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                    // echo "<a href='../tarjeta/perfil_ingeniero.php'>Regresar</a>";
                    exit();
                }
            } 
            else{
            //si existe imagen_Perfil pero se pasa del tamaño permitido
            if($nombre_img == !NULL){
                    echo "La imagen es demasiado grande "; 
                    // echo "<a href='perfil.php'>Regresar</a>";
                    exit();
                }
            }

            // ********************************************************
            //Recibe la imagen de la tienda
            $nombre_imgTienda = $_FILES['imagen_Tienda']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
            $tipo_imgTienda = $_FILES['imagen_Tienda']['type'];
            $tamaño_imgTienda = $_FILES['imagen_Tienda']['size'];
            
            // echo "Nombre de la imagen = " . $nombre_imgTienda . "<br>";
            // echo "Tipo de archivo = " .$tipo_imgTienda .  "<br>";
            // echo "Tamaño = " . $tamaño_imgTienda . "<br>";
            // echo "Tamaño maximo permitido = 7.000.000" . "<br>";// en bytes
            // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

            //Si existe imagen_Tienda y tiene un tamaño correcto 
            if(($nombre_imgTienda == !NULL) AND ($tamaño <= 7000000)){
                //indicamos los formatos que permitimos subir a nuestro servidor
                if (($_FILES["imagen_Tienda"]["type"] == "image/jpeg")
                    || ($_FILES["imagen_Tienda"]["type"] == "image/jpg") || ($_FILES["imagen_Tienda"]["type"] == "image/png")){
                    
                    // Ruta donde se guardarán las imágenes que subamos la variable superglobal 
                    //usar en remoto
                    // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                    //Usar en remoto
                    // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/Reavivados/images/usuarios/'; 
                    // echo $_SERVER['DOCUMENT_ROOT'] . 'Versus_20_2/images/usuarios/';

                    //usar en local
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/';

                    //se muestra el directorio temporal donde se guarda el archivo
                    //echo $_FILES['imagen']['tmp_name'];
                    // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                    move_uploaded_file($_FILES['imagen_Tienda']['tmp_name'], $directorio.$nombre_imgTienda);

                    //Para actualizar fotografia de perfil solo si se ha presionado el boton de buscar fotografia
                    if(($_FILES['imagen_Tienda']['name']) != ""){
                        //Se ACTUALIZA la fotografia de la tienda
                        $this->ConsultaCuenta_M->actualizarFotografiaTienda($this->ID_Tienda, $nombre_imgTienda);
                   }
                } 
                else{
                    //si no cumple con el formato
                    echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                    // echo "<a href='../tarjeta/perfil_ingeniero.php'>Regresar</a>";
                    exit();
                }
            } 
            else{
            //si existe imagen_Tienda pero se pasa del tamaño permitido
            if($nombre_imgTienda == !NULL){
                    echo "La imagen es demasiado grande "; 
                    // echo "<a href='perfil.php'>Regresar</a>";
                    exit();
                }
            }

            // ********************************************************
            //Recibe las categorias seleccionadas
            if(!empty($_POST['categoria'])){
                foreach($_POST['categoria'] as $Categoria){
                    $Categoria = $_POST['categoria']; 
                } 
            } 
            else{
                echo "Ingrese al menos una categoría";
                exit();
            }            

            // ********************************************************
            //Recibe las secciones 
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
            
            // ********************************************************
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
            //Todo este procedimiento debe ser por medio de TRANSACCIONES
            // **********************************************************************************
            // 1-Se ELIMINAN todas las categorias que tiene la tienda
            $this->ConsultaCuenta_M->eliminarCategoriaTienda($this->ID_Tienda);
            
            // 2-Se consulta el ID_Categoria de las categorias seleccionadas
            $ID_Categoria = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);
            $ID_Categ = $ID_Categoria->fetchAll(PDO::FETCH_ASSOC); 

            //Se INSERTA la dependenciatransitiva entre la tienda y la categoria a la que pertenece
            $this->ConsultaCuenta_M->insertarDT_CatTie($ID_Categ, $this->ID_Tienda);

            //Se INSERTAN las secciones de la tienda, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
            $this->ConsultaCuenta_M->insertarSeccionesTienda($this->ID_Tienda, $SeccionTienda);

            //Se CONSULTA el ID_Seccion de las secciones que tiene la tienda
            $ID_Seccion = $this->ConsultaCuenta_M->consultarTodasID_Seccion($this->ID_Tienda);
            $ID_Seccion = $ID_Seccion->fetchAll(PDO::FETCH_ASSOC);

            //Se INSERTAN la dependencia  transitiva entre las secciones y la tienda, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
            $this->ConsultaCuenta_M->insertarDT_TieSec($this->ID_Tienda, $ID_Seccion);
            
            //Se ACTUALIZAN los datos personales del responsable de la tienda en la BD y se retorna el ID recien insertado
            $this->ConsultaCuenta_M->actualizarAfiliadoComercial($this->ID_Afiliado, $RecibeDatos);
           
            //Se ACTUALIZAN los datos de la tienda en la BD
            $this->ConsultaCuenta_M->actualizarTienda($this->ID_Afiliado, $RecibeDatos);
            
            //Se ACTUALIZAN los datos bancarios de la tienda en la BD
            // $this->ConsultaCuenta_M->actualizarBancos($ID_Banco, $Banco, $Titular, $NumeroCuenta, $Rif);

            //Se consulta el ID_Categoria de las categorias seleccionadas
            // $ID_Categoria = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);
            // $ID_Categ = $ID_Categoria->fetchAll(PDO::FETCH_ASSOC); 

            // //Se ACTUALIZAN las categorias en las que se encuentra una tienda
            // $this->ConsultaCuenta_M->actualizarCategoriaTienda($this->ID_Tienda, $ID_Categ);

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
        public function Secciones($ID_Producto){
            //CONSULTA las secciones que tiene una tienda llamada desde Funciones_Ajax.js
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            $Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            // echo "<pre>";
            // print_r($Seccion);
            // echo "</pre>";

            //CONSULTA el ID_Sección al que pertenece un producto de una tienda especifica
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionActiva($ID_Producto);
            $ID_Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            // echo "<pre>";
            // print_r($ID_Seccion);
            // echo "</pre>";

            //La consulta devuelve el ID_Seccion en una array, se convierte en una variable
            $ID_Seccion = $ID_Seccion[0]['ID_Seccion'];

            //CONSULTA la seccion correspondiente al ID_Seccion
            $Consulta = $this->ConsultaCuenta_M->consultarSeccion($ID_Seccion);
            $SeccionActiva = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'seccion' => $Seccion,
                'seccionActiva' => $SeccionActiva
            ];
                   
            $this->vista("inc/Secciones_Ajax_V", $Datos);
        }

        //Metodo invocado desde A_Cuenta_publicar.js
        public function SeccionesDisponibles(){
            // CONSULTA las secciones que tiene una tienda llamada desde Funciones_Ajax.js
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            $Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'seccion' => $Seccion,
            ];
                   
            $this->vista("inc/SeccionesDisponibles_Ajax_V", $Datos);
        }

        //Metodo invocado desde cuenta_publicar_V.php
        public function recibeProducto(){
            // Se reciben todos los campos del formulario, desde cuenta_publicar_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["seccion"]) && !empty($_POST["producto"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"])){

                $RecibeProducto = [
                    //Recibe datos del producto que se va a cargar al sistema
                    'Producto' => filter_input(INPUT_POST, "producto", FILTER_SANITIZE_STRING),
                    'Descripcion' => filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING),
                    'Precio' => filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING),
                    'Seccion' => filter_input(INPUT_POST, "seccion", FILTER_SANITIZE_STRING),
                    'ID_Tienda' => filter_input(INPUT_POST, "id_tienda", FILTER_SANITIZE_STRING),
                ];
                // echo "<pre>";
                // print_r($RecibeProducto );
                // echo "</pre>";
                // exit();
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
        
            //Se INSERTA la dependenciatransitiva entre  producto, opciones
            $this->ConsultaCuenta_M->insertarDT_ProOpc($ID_Producto, $ID_Opcion);
            
            //Se INSERTA la dependenciatransitiva entre secciones y las opciones (en los casos que no hay especificidad de producto)            
            $this->ConsultaCuenta_M->insertarDT_SecOpc($ID_Seccion, $ID_Opcion);

            //Se INSERTA la dependenciatransitiva entre secciones y los productos
            $this->ConsultaCuenta_M->insertarDT_SecPro($ID_Seccion, $ID_Producto);

            //Se INSERTA la fotografia
            $nombre_imgProducto = $_FILES['foto_Producto']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
            $tipo = $_FILES['foto_Producto']['type'];
            $tamaño = $_FILES['foto_Producto']['size'];
            
            // echo "Nombre de la imagen = " . $nombre_imgProducto . "<br>";
            // echo "Tipo de archivo = " .$tipo .  "<br>";
            // echo "Tamaño = " . $tamaño . "<br>";
            // echo "Tamaño maximo permitido = 7.000.000" . "<br>";// en bytes
            // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

            //Si existe foto_Producto y tiene un tamaño correcto 
            if(($nombre_imgProducto == !NULL) AND ($tamaño <= 7000000)){
                //indicamos los formatos que permitimos subir a nuestro servidor
                if (($_FILES["foto_Producto"]["type"] == "image/jpeg")
                    || ($_FILES["foto_Producto"]["type"] == "image/jpg") || ($_FILES["foto_Producto"]["type"] == "image/png")){
                    
                    // Ruta donde se guardarán las imágenes que subamos la variable superglobal 
                    //usar en remoto
                    // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                    //Usar en remoto
                    // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/Reavivados/images/usuarios/'; 
                    // echo $_SERVER['DOCUMENT_ROOT'] . 'Versus_20_2/images/usuarios/';

                    //usar en local
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/productos/';

                    //se muestra el directorio temporal donde se guarda el archivo
                    //echo $_FILES['imagen']['tmp_name'];
                    // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                    move_uploaded_file($_FILES['foto_Producto']['tmp_name'], $directorio.$nombre_imgProducto);

                    //Se ACTUALIZA la imagen (No se inserta porque ya en la sentencia de este controlador insertarDescripcionProducto() se insertaron los detalles del producto)
                    $this->ConsultaCuenta_M->actualizarFotoProducto($ID_Opcion, $nombre_imgProducto); 
                } 
                else{
                    //si no cumple con el formato
                    echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                    // echo "<a href='../tarjeta/perfil_ingeniero.php'>Regresar</a>";
                    exit();
                }
            } 
            else{
            //si existe foto_Producto pero se pasa del tamaño permitido
            if($nombre_imgProducto == !NULL){
                    echo "La imagen es demasiado grande "; 
                    // echo "<a href='perfil.php'>Regresar</a>";
                    exit();
                }
            }
            //Se INSERTA el ID_Seccion y el ID_Tienda del producto en la BD
            // $Seccion = $this->ConsultaCuenta_M->insertarDT_SecPro($RecibeProducto, $ID_Seccion);

            //Se INSERTA la dependenciatransitiva entre producto y la tienda que ofrece el producto
            // $this->ConsultaCuenta_M->insertarDT_ProTie($RecibeProducto, $ID_Producto);

            //Se INSERTA la dependenciatransitiva en la tabla central
            // $this->ConsultaCuenta_M->insertarDTC($RecibeProducto, $ID_Producto);

            //Se consulta el ID_Categoria de las categorias seleccionadas
            // $Consulta = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);
            // $ID_Categoria = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            // //Se INSERTA la dependenciatransitiva entre la tienda y la categoria a la que pertenece
            // $this->ConsultaCuenta_M->insertarDT_CatTie($ID_Categoria, $this->ID_Tienda);

            //Redirecciona al controlador publicar para que cargue las secciones, si se envia directamente a la vista cuenta_publicar_V en el menu no apareceran las secciones de la tienda
            // $this->vista("paginas/cuenta_publicar_V");            
            $this->Publicar();
        }
                
        //Metodo invocada desde cuenta_editar_prod_V.php
        public function recibeAtualizarProducto(){
            // Se reciben todos los campos del formulario, se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["seccion"]) && !empty($_POST["producto"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"])){

                $RecibeProducto = [
                    //Recibe datos del producto a actualizar
                    'Seccion' => filter_input(INPUT_POST, "seccion", FILTER_SANITIZE_STRING),
                    'ID_Seccion' => filter_input(INPUT_POST, "id_seccion", FILTER_SANITIZE_STRING),
                    'ID_SP' => filter_input(INPUT_POST, "id_sp", FILTER_SANITIZE_STRING),
                    'Producto' => filter_input(INPUT_POST, "producto", FILTER_SANITIZE_STRING),
                    'Descripcion' => filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING),
                    'Especificacion' => filter_input(INPUT_POST, "especificacion", FILTER_SANITIZE_STRING),
                    'Precio' => filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING),
                    'ID_Producto' => filter_input(INPUT_POST, "id_producto", FILTER_SANITIZE_STRING),
                    'ID_Opcion' => filter_input(INPUT_POST, "id_opcion", FILTER_SANITIZE_STRING),
                    'Puntero' => filter_input(INPUT_POST, "puntero", FILTER_SANITIZE_STRING),
                ];
                // echo "<pre>";
                // print_r($RecibeProducto );
                // echo "</pre>";
                // exit();
            }
            else{
                echo "Llene todos los campos obligatorios";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            // ********************************************************
            //Recibe la imagen del producto a actualizar
            $nombre_imgProducto = $_FILES['imagen_EditarProducto']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
            $tipo = $_FILES['imagen_EditarProducto']['type'];
            $tamaño = $_FILES['imagen_EditarProducto']['size'];
            
            // echo "Nombre de la imagen = " . $nombre_imgProducto . "<br>";
            // echo "Tipo de archivo = " .$tipo .  "<br>";
            // echo "Tamaño = " . $tamaño . "<br>";
            // echo "Tamaño maximo permitido = 7.000.000" . "<br>";// en bytes
            // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

            //Si existe imagen_EditarProducto y tiene un tamaño correcto 
            if(($nombre_imgProducto == !NULL) AND ($tamaño <= 7000000)){
                //indicamos los formatos que permitimos subir a nuestro servidor
                if (($_FILES["imagen_EditarProducto"]["type"] == "image/jpeg")
                    || ($_FILES["imagen_EditarProducto"]["type"] == "image/jpg") || ($_FILES["imagen_EditarProducto"]["type"] == "image/png")){
                    
                    // Ruta donde se guardarán las imágenes que subamos la variable superglobal 
                    //usar en remoto
                    // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                    //Usar en remoto
                    // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/Reavivados/images/usuarios/'; 
                    // echo $_SERVER['DOCUMENT_ROOT'] . 'Versus_20_2/images/usuarios/';

                    //usar en local
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/productos/';

                    //se muestra el directorio temporal donde se guarda el archivo
                    //echo $_FILES['imagen']['tmp_name'];
                    // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                    move_uploaded_file($_FILES['imagen_EditarProducto']['tmp_name'], $directorio.$nombre_imgProducto);
                } 
                else{
                    //si no cumple con el formato
                    echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                    // echo "<a href='../tarjeta/perfil_ingeniero.php'>Regresar</a>";
                    exit();
                }
            } 
            else{
            //si existe imagen_EditarProducto pero se pasa del tamaño permitido
            if($nombre_imgProducto == !NULL){
                    echo "La imagen es demasiado grande "; 
                    // echo "<a href='perfil.php'>Regresar</a>";
                    exit();
                }
            }

            //Estas cuatro sentencias de actualización deben realizarce por medio de transsacciones
            $this->ConsultaCuenta_M->actualizarOpcion($RecibeProducto);
            $this->ConsultaCuenta_M->actualizarProducto($RecibeProducto);

            //Se consulta el ID_SP para apuntar directamente al producto dentro de la seccion
            // $Consulta = $this->ConsultaCuenta_M->consultarSeccion_Producto($RecibeProducto);
            // $ID_SP = $Consulta->fetchAll(PDO::FETCH_ASSOC);
      
            //     echo "<pre>";
            //     print_r($ID_SP );
            //     echo "</pre>";
            //     exit();
            
            $DB = $this->ConsultaCuenta_M->actualizacionSeccion($RecibeProducto);
            // print("Se actualizaron $DB registros."); 

            //Para actualizar fotografia de perfil solo si se ha presionado el boton de buscar fotografia
            if(($_FILES['imagen_EditarProducto']['name']) != ""){
                //Se ACTUALIZA la fotografia el responsable de tienda
                $this->ConsultaCuenta_M->actualizarFotografiaProducto($RecibeProducto, $nombre_imgProducto);
           }

            //Se envia la sección donde esta el producto actualizado para redireccionar a esa sección
            $Seccion = $RecibeProducto['Seccion'];
            
            //Se envia el puntero hacia el producto que se actualizó
            $Puntero = $RecibeProducto['Puntero'];

            //$Seccion y $Puntero Se deben convertir en cadena porque el controlador Productos recibe una cadena de datos agrupados separados por coma
            $Seccion_Puntero = $Seccion . ',' . $Puntero;
            
            $this->Productos($Seccion_Puntero);
            // $this->vista("paginas/cuenta_productos_V");
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

            $this->Productos('Todos');
            // $this->vista("paginas/cuenta_productos_V", $Datos);
        }
    }
?>    
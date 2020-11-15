<?php
    class Cuenta_C extends Controlador{
        private $ID_Tienda;
        private $ID_Afiliado;

        public function __construct(){
            session_start();

            $this->ConsultaCuenta_M = $this->modelo("Cuenta_M");

            //Sesion creada en Login_C
            if(isset($_SESSION["ID_Tienda"])){
                $this->ID_Tienda = $_SESSION["ID_Tienda"];
            }

            //Sesion creada en Login_C
            $this->ID_Afiliado = $_SESSION["ID_Afiliado"];

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        // invocado desde el metodo recibeRegistroEditado() en este mismo archivo
        public function index(){
            //CONSULTA los productos de una sección en especifico según la tienda
            $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            // $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //CONSULTA la imagen de la tienda
            $Consulta = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);
            $Fotografia = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
            $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'secciones' => $Secciones,
                'fotografiaTienda' => $Fotografia,
                'slogan' => $Slogan,
            ];

            $this->vista("paginas/cuenta_V", $Datos);
        }

        public function Despachador(){
            $this->vista("paginas/cuenta_despachador_V");

        }

        //Invocado desde login_C/ValidarSesion - Cuenta_C/eliminarProducto - Cuenta_C/recibeAtualizarProducto - header_AfiCom.php, muestra todos los productos publicados o los de una sección en especifico
        public function Productos($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Producto y el ID_ContProducto separados por coma, se convierte en array para separar los elementos
            // echo $DatosAgrupados;
            // exit();

            $DatosAgrupados = explode(",", $DatosAgrupados);

            $Seccion = $DatosAgrupados[0];
            //Mediante operador ternario
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
                // $Consulta = $this->ConsultaCuenta_M->consultarNotificacionTienda($this->ID_Tienda);
                // $Notificacion = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                //CONSULTA las caracteristicas de los productos de una sección de una tienda
                $Consulta = $this->ConsultaCuenta_M->consultarCaracterisicasProducto($this->ID_Tienda);
                $Caracteristicas = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                //Se desglosa el valor para que sea solo igual el valor "1"
                // $Notificacion = $Notificacion[0]['notificacion'];

                $Seccion  = 'Todos';
            }
            else{
                //CONSULTA los productos de una sección en especifico según la tienda
                $Consulta = $this->ConsultaCuenta_M->consultarProductosTienda($this->ID_Tienda, $Seccion);
                $Productos = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                //CONSULTA las caracteristicas de los productos de una sección de una tienda
                $Consulta = $this->ConsultaCuenta_M->consultarCaracterisicasProducto($this->ID_Tienda);
                $Caracteristicas = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                //Se da el valor de notifiación directamente debido a que si la condicion entró en el ELSE ya el afiliado a visitado la página y no tiene notificaciones por leer
                $Notificacion = 1;

                // $Seccion  = 'Seccion especifica';
            }

            //Se CONSULTAN las secciones de una tienda en particular
            $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            // $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
            $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'secciones' => $Secciones, //ID_Seccion, seccion (necesario en header_AfiCom, arma el item productos del menu)
                'productos' => $Productos, //ID_Producto, producto, ID_Opcion, opcion, precio, seccion, fotografia
                // 'notificacion' => $Notificacion,
                'Seccion' => $Seccion, //necesario para identificar la sección en la banda naranja
                'Apunta' => $Puntero,
                'slogan' => $Slogan,
                'variosCaracteristicas' => $Caracteristicas
            ];
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();

            //En el caso que no se haya configurado ninguna seccion o categoria
            if($Datos['secciones'] == Array ()){
                redireccionar("/Modal_C/tiendaSinProductos");
            }
            else{
                $this->vista("inc/header_AfiCom", $Datos);//Evaluar como mandar solo la seccion del array $Datos
                $this->vista("paginas/cuenta_productos_V", $Datos);
            }
        }

        public function Editar(){
            //CONSULTA los datos de la tienda
            $Consulta = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);
            $DatosTienda = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //CONSULTA los datos del responsable de la tienda
            $Consulta = $this->ConsultaCuenta_M->consultarResponsableTienda($this->ID_Afiliado);
            $DatosResposable = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //CONSULTA los datos de cuentas bancarias de la tienda
            $DatosBancos = $this->ConsultaCuenta_M->consultarBancosTienda($this->ID_Tienda);

            //CONSULTA los datos de cuentas pagmovil de la tienda
            $DatosPagoMovil = $this->ConsultaCuenta_M->consultarCuentasPagomovil($this->ID_Tienda);

            //CONSULTA las categorias en la que la tienda esta registrada
            $Consulta = $this->ConsultaCuenta_M->consultarCategoriaTIenda($this->ID_Tienda);
            $Categoria = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //CONSULTA las secciones de la tienda
            $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            // $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
            $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'datosTienda' => $DatosTienda,
                'datosResposable' => $DatosResposable,
                'datosBancos' => $DatosBancos,
                'datosPagomovil' => $DatosPagoMovil,
                'categoria' => $Categoria,
                'secciones' => $Secciones,
                'slogan' => $Slogan
            ];
            
            //Se crea una sesión con el contenido de una seccion para verificar que el usuario ya las tiene creadas cuando vaya a cargar un producto
            if(!empty($Datos['secciones'])){
                foreach($Datos['secciones'] as $Key){
                    $Seccion = $Key['seccion'];
                }
                $_SESSION['Seccion'] = $Seccion;
            }

            $this->vista("paginas/cuenta_editar_V", $Datos);
        }

        public function Publicar(){
            //CONSULTA si existe al menos una sección donde cargar productos
            $Cant_Seccion = $this->ConsultaCuenta_M->consultarSecciones($this->ID_Tienda);
            // echo "Registros encontrados: " . $Cant_Seccion;
            
            //En el caso que no se haya configurado ninguna seccion o categoria
            if($Cant_Seccion == 0){ 
                redireccionar("/Modal_C/tiendaSinSecciones");
            }
            else{
                //CONSULTA las categorias en las que una tienda se ha postulado
                $Consulta = $this->ConsultaCuenta_M->consultarCategoriaTiendas($this->ID_Tienda );
                $Categorias = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                //CONSULTA las secciones que tiene una tienda
                $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
                // $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                //Se CONSULTAN el slogan de una tienda en particular
                $Consulta = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
                $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                $Datos = [
                    'categorias' => $Categorias,
                    'secciones' => $Secciones,
                    'slogan' => $Slogan
                ];

                $this->vista("inc/header_AfiCom", $Datos);
                $this->vista("paginas/cuenta_publicar_V", $Datos);
            }
        }

        public function ventas(){
            //CONSULTA si existe al menos una sección donde cargar productos
            $Cant_Seccion = $this->ConsultaCuenta_M->consultarSecciones($this->ID_Tienda);
            // echo "Registros encontrados: " . $Cant_Seccion;
            
            //En el caso que no se haya configurado ninguna seccion o categoria
            if($Cant_Seccion == 0){ 
                redireccionar("/Modal_C/tiendaSinSecciones");
            }
            else{
                //CONSULTA las categorias en las que una tienda se ha postulado
                $Consulta = $this->ConsultaCuenta_M->consultarCategoriaTiendas($this->ID_Tienda );
                $Categorias = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                //CONSULTA las secciones que tiene una tienda
                $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
                // $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                //Se CONSULTAN el slogan de una tienda en particular
                $Consulta = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
                $Slogan = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                $Datos = [
                    'categorias' => $Categorias,
                    'secciones' => $Secciones,
                    'slogan' => $Slogan
                ];

                $this->vista("inc/header_AfiCom", $Datos);
                $this->vista("paginas/cuenta_ventas_V", $Datos);
            }
        }        

        //Invocado desde cuenta_productos_V.php
        public function actualizarProducto($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Producto y la opcion separados por coma, se convierte en array para separar los elementos

            $DatosAgrupados = explode(",", $DatosAgrupados);

            $ID_Producto = $DatosAgrupados[0];
            $Opcion = $DatosAgrupados[1];

            //CONSULTA los productos de una sección en especifico según la tienda
            $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            // $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //CONSULTA las especiicaciones de un producto determinado y de una tienda especifica
            $Consulta = $this->ConsultaCuenta_M->consultarDescripcionProducto($this->ID_Tienda, $ID_Producto);
            $Especificaciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //Se CONSULTAN el slogan de una tienda en particular
            $Consulta_1 = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);
            $Slogan = $Consulta_1->fetchAll(PDO::FETCH_ASSOC);

            //Se CONSULTAN las caracteristicas añadidas del producto
            $Consulta_2 = $this->ConsultaCuenta_M->consultarCaracteristicasProducto($this->ID_Tienda, $ID_Producto);
            $Caracteristicas = $Consulta_2->fetchAll(PDO::FETCH_ASSOC);

            //Se CONSULTAN las imagenes añadidas del producto
            $Consulta_3 = $this->ConsultaCuenta_M->consultarImagnesProducto($ID_Producto);
            $Imagenes = $Consulta_3->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'secciones' => $Secciones, //Usado en header_AfiCom.php
                'especificaciones' => $Especificaciones, //ID_Producto, ID_Opcion, fotografia, producto, opcion, precio, seccion, ID_Seccion, ID_SP
                'puntero' => $Opcion,
                'slogan' => $Slogan,
                'caracteristicas' => $Caracteristicas, //ID_Caracteristica, caracteristica
                'imagenesVarias' => $Imagenes //ID_Imagen, nombre_img
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

        //Recibe el formulario de actualizacion de los datos de una tienda invocado en cuenta_editar_V.php
        public function recibeRegistroEditado(){
            //Se reciben todos los campos del formulario desde cuenta_editar_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre_Afcom"]) && !empty($_POST["apellido_Afcom"]) && !empty($_POST["cedula_Afcom"]) && !empty($_POST["telefono_Afcom"]) && !empty($_POST["correo_Afcom"]) && !empty($_POST["nombre_com"]) && !empty($_POST["telefono_com"]) && !empty($_POST["direccion_com"])
            ){
                $RecibeDatos = [
                    //Recibe datos de la persona responsable
                    'Nombre_Afcom' => filter_input(INPUT_POST, 'nombre_Afcom', FILTER_SANITIZE_STRING),
                    'Apellido_Afcom'=> filter_input(INPUT_POST, 'apellido_Afcom', FILTER_SANITIZE_STRING),
                    'Cedula_Afcom' => filter_input(INPUT_POST, 'cedula_Afcom', FILTER_SANITIZE_STRING),
                    'Telefono_Afcom'=> filter_input(INPUT_POST, 'telefono_Afcom', FILTER_SANITIZE_STRING),
                    'Correo_Afcom' => filter_input(INPUT_POST, 'correo_Afcom', FILTER_SANITIZE_STRING),

                    //Recibe datos de la tienda
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
            //Recibe la imagen de la tienda solo si se ha presionado el boton de buscar fotografia
            if(($_FILES['imagen_Tienda']['name']) != ""){
                //Al nombre de la imagen se le añade un prefijo para evitar que sobreescriba otra imagen ya existente en el directorio dondes se guardan las imagenes
                $nombre_imgTienda = $this->ID_Tienda . $_FILES['imagen_Tienda']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
                $tipo_imgTienda = $_FILES['imagen_Tienda']['type'];
                $tamaño_imgTienda = $_FILES['imagen_Tienda']['size'];

                // echo "Nombre de la imagen = " . $nombre_imgTienda . "<br>";
                // echo "Tipo de archivo = " .$tipo_imgTienda .  "<br>";
                // echo "Tamaño = " . $tamaño_imgTienda . "<br>";
                // echo "Tamaño maximo permitido = 7.000.000" . "<br>";// en bytes
                // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

                //Si existe imagen_Tienda y tiene un tamaño correcto
                if(($nombre_imgTienda == !NULL) AND ($tamaño_imgTienda <= 70000000)){
                    //indicamos los formatos que permitimos subir a nuestro servidor
                    if(($_FILES["imagen_Tienda"]["type"] == "image/jpeg")
                        || ($_FILES["imagen_Tienda"]["type"] == "image/jpg") || ($_FILES["imagen_Tienda"]["type"] == "image/png")){

                        // Ruta donde se guardarán las imágenes que subamos la variable superglobal
                        // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                        //Usar en remoto
                        // $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/productos/';

                        //usar en local
                        $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/';

                        //se muestra el directorio temporal donde se guarda el archivo
                        //echo $_FILES['imagen']['tmp_name'];
                        // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                        move_uploaded_file($_FILES['imagen_Tienda']['tmp_name'], $directorio_1.$nombre_imgTienda);

                        //Para actualizar fotografia de perfil solo si se ha presionado el boton de buscar fotografia
                        if(($_FILES['imagen_Tienda']['name']) != ""){
                            //Se ACTUALIZA la fotografia de la tienda
                            $this->ConsultaCuenta_M->actualizarFotografiaTienda($this->ID_Tienda, $nombre_imgTienda);
                        }
                    }
                }
                else{
                    //si no cumple con el formato
                    echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                    echo "<br>";
                    echo "<a href='javascript:history.back()'>Regresar</a>";
                    exit();
                }

                //si existe imagen_Tienda pero se pasa del tamaño permitido
                if($nombre_imgTienda == !NULL){
                    echo "La imagen es demasiado grande ";
                    echo "<br>";
                    echo "<a href='javascript:history.back()'>Regresar</a>";
                    exit();
                }
            }

            // CATEGORIAS
            // ********************************************************
            //Recibe las categorias seleccionadas
            if(!empty($_POST['categoria'])){
                foreach($_POST['categoria'] as $Categoria){
                    $Categoria = $_POST['categoria'];
                }
            }
            else{
                echo "Ingrese al menos una categoría";
                echo "<br>";
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            // echo "Categorias recibidas";
            // echo "<pre>";
            // print_r($Categoria);
            // echo "</pre>";
            // exit();

            // SECCIONES
            // ********************************************************
            //Recibe las secciones por nombre (son las nuevas creadas)
            if(!empty($_POST['seccion'])){
                foreach($_POST['seccion'] as $Seccion){
                    $Seccion = $_POST['seccion'];
                }
                //El array trae elemenos duplicados, se eliminan los duplicado
                $SeccionesRecibidas = array_unique($Seccion);
            }
            else{
                echo "Ingrese al menos una sección";
                echo "<br>";
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            // echo "Secciones recibidas";
            // echo "<pre>";
            // print_r($SeccionesRecibidas);
            // echo "</pre>";

            //Se CONSULTA las secciones existenete en BD
            $SecccionesExistentes = $this->ConsultaCuenta_M->consultarSecciones_2($this->ID_Tienda);
            // echo "Secciones existentes";
            // echo "<pre>";
            // print_r($SecccionesExistentes);
            // echo "</pre>";

            
            $resultado = array_diff($SeccionesRecibidas, $SecccionesExistentes);
            // echo "Secciones a insertar";
            // echo "<pre>";
            // print_r($resultado);
            // echo "</pre>";
            // exit();
            
            //INFORMACION DE PAGOS
            // ********************************************************            
            //Se ELIMINAN todas las cuentas bancarias
            $this->ConsultaCuenta_M->eliminarCuentaBancaria($this->ID_Tienda);
                     
            // Se ELIMINAN todas las cuentas de pagomovil
            $this->ConsultaCuenta_M->eliminarPagoMovil($this->ID_Tienda);

            if($_POST['banco'] == "" && $_POST['cuentapagoMovil'] == ""){
                echo "Ingrese datos de pagos";
                echo "<br>";
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            else{
                // DATOS BANCARIOS
                foreach(array_keys($_POST['banco']) as $key){
                    if(!empty($_POST['BANCO'][$key]) && !empty($_POST['titular'][$key]) && !empty($_POST['numeroCuenta'][$key]) && !empty($_POST['rif'][$key])
                    ){
                        $Banco = $_POST['banco'][$key];
                        $Titular = $_POST['titular'][$key];
                        $NumeroCuenta = $_POST['numeroCuenta'][$key];
                        $Rif = $_POST['rif'][$key];
                        
                        //Se INSERTA la cuenta bancaria
                        $this->ConsultaCuenta_M->insertarCuentaBancaria($this->ID_Tienda, $Banco, $Titular, $NumeroCuenta, $Rif);
                    }
                    // else{
                    //     echo "Ingrese datos bancarios completos";
                    //     echo "<br>";
                    //     echo "<a href='javascript:history.back()'>Regresar</a>";
                    //     exit();
                    // }
                }
                
                // ******************************************************** 
                // DATOS PAGOMOVIL  
                foreach(array_keys($_POST['cuentapagoMovil']) as $key){
                    if(!empty($_POST['cuentapagoMovil'][$key]) || !empty($_POST['bancopagoMovil'][$key])){
                        $CuentapagoMovil = $_POST['cuentapagoMovil'][$key];
                        $BancopagoMovil = $_POST['bancopagoMovil'][$key];
                        
                        //Se INSERTA la cuenta de CuentapagoMovil
                        $this->ConsultaCuenta_M->insertarPagoMovil($this->ID_Tienda, $BancopagoMovil, $CuentapagoMovil);
                    }
                    // else{
                    //     echo "Ingrese datos pagoMovil";
                    //     echo "<br>";
                    //     echo "<a href='javascript:history.back()'>Regresar</a>";
                    //     exit();
                    // }
                }
            }
            // echo "Todos los campos estan llenos";
            // exit();

            // **********************************************************************************
            //Todo este procedimiento debe ser por medio de TRANSACCIONES
            // ***************************************print_r*******************************************
            //Se ELIMINAN todas las categorias que tiene la tienda
            $this->ConsultaCuenta_M->eliminarCategoriaTienda($this->ID_Tienda);

            //Se consulta el ID_Categoria de las categorias seleccionadas
            $ID_Categoria = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);
            $ID_Categ = $ID_Categoria->fetchAll(PDO::FETCH_ASSOC);

            //Se INSERTA la dependenciatransitiva entre la tienda y la categoria a la que pertenece
            $this->ConsultaCuenta_M->insertarDT_CatTie($ID_Categ, $this->ID_Tienda);         

            //Se INSERTAN las secciones de la tienda, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
            $this->ConsultaCuenta_M->insertarSeccionesTienda($this->ID_Tienda, $Seccion);

            //Se CONSULTA el ID_Seccion de las secciones que tiene la tienda
            $ID_Seccion = $this->ConsultaCuenta_M->consultarTodosID_Seccion($this->ID_Tienda);

            //Se INSERTAN la dependencia transitiva entre las secciones y la tienda, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
            $this->ConsultaCuenta_M->insertarDT_TieSec($this->ID_Tienda, $ID_Seccion);

            //Se ACTUALIZAN los datos personales del responsable de la tienda en la BD y se retorna el ID recien insertado, el registro de la tienda fue creado cuando el afiliado creo la tienda
            $this->ConsultaCuenta_M->actualizarAfiliadoComercial($this->ID_Afiliado, $RecibeDatos);

            //Se ACTUALIZAN los datos de la tienda, el registro de la tienda fue creado cuando el afiliado creo la tienda
            $this->ConsultaCuenta_M->actualizarTienda($this->ID_Afiliado, $RecibeDatos);
           
            //Se consulta el ID_Categoria de las categorias seleccionadas
            // $ID_Categoria = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);
            // $ID_Categ = $ID_Categoria->fetchAll(PDO::FETCH_ASSOC);

            // //Se ACTUALIZAN las categorias en las que se encuentra una tienda
            // $this->ConsultaCuenta_M->actualizarCategoriaTienda($this->ID_Tienda, $ID_Categ);

            //Redirecciona, La función redireccionar se encuantra en url_helper.php
            redireccionar("/Cuenta_C/Editar");
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

        //Invocado desde A_Cuenta_editar.js entrega las secciones activas de una tienda
        public function Secciones($ID_Producto){
            //CONSULTA las secciones que tiene una tienda llamada desde Funciones_Ajax.js
            $Seccion = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            // $Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            // echo "<pre>";
            // print_r($Seccion);
            // echo "</pre>";
            // exit();

            //CONSULTA el ID_Sección al que pertenece un producto de una tienda especifica
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionActiva($ID_Producto);
            $ID_Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            // echo "<pre>";
            // print_r($ID_Seccion);
            // echo "</pre>";
            // exit();

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
            $Seccion = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            // $Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $Datos = [
                'seccion' => $Seccion,
            ];

            $this->vista("inc/SeccionesDisponibles_Ajax_V", $Datos);
        }

        //Invocado en cuenta_publicar_V.php recibe el formulario de cargar un nuevo producto
        public function recibeProductoPublicar(){
            //Se reciben todos los campos del formulario, desde cuenta_publicar_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["seccion"]) && !empty($_POST["producto"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"])
            ){
                $RecibeProducto = [
                    //Recibe datos del producto que se va a cargar al sistema
                    'Producto' => filter_input(INPUT_POST, "producto", FILTER_SANITIZE_STRING),
                    'Descripcion' => filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING),
                    'Precio' => filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING),
                    'Seccion' => filter_input(INPUT_POST, "seccion", FILTER_SANITIZE_STRING),
                    'ID_Tienda' => filter_input(INPUT_POST, "id_tienda", FILTER_SANITIZE_STRING),
                ];
                // echo "<pre>";
                // print_r($RecibeProducto);
                // echo "</pre>";
            }
            else{
                echo "Llene todos los campos del formulario ";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            // SECCION CARACTERISTICAS
            // ********************************************************
            // Si se selecionó alguna nueva caracteristica entra, destaca que se esta recibiendo un array
            if($_POST['caracteristica'][0] != ""){
                foreach($_POST['caracteristica'] as $Caracteristica){
                    $Caracteristica = $_POST['caracteristica'];
                }
                // echo "<pre>";
                // print_r($Caracteristica);
                // echo "</pre>";
                // exit();

                // El array trae elemenos duplicados, se eliminan los duplicado
                $caracteristicaProducto = array_unique($Caracteristica);
            }

            // ********************************************************
            //Las siguientes consultas se deben realizar por medio de Transacciones BD
            //Se INSERTA el producto en la BD y se retorna el ID recien insertado
            $ID_Producto = $this->ConsultaCuenta_M->insertarProducto($RecibeProducto);

            //Se INSERTA la opcion y precio del producto en la BD y se retorna el ID recien insertado
            $ID_Opcion = $this->ConsultaCuenta_M->insertarOpcionesProducto($RecibeProducto);

            if($_POST['caracteristica'][0] != ""){
                //Se INSERTAN las caracteristicas del producto
                $this->ConsultaCuenta_M->insertarCaracteristicasProducto($RecibeProducto, $ID_Producto, $Caracteristica);
            }

            //Se CONSULTA el ID_Seccion de la seccion del producto
            $Consulta = $this->ConsultaCuenta_M->consultarID_Seccion($RecibeProducto);
            $ID_Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //Se INSERTA la dependenciatransitiva entre  producto, opciones
            $this->ConsultaCuenta_M->insertarDT_ProOpc($ID_Producto, $ID_Opcion);

            //Se INSERTA la dependenciatransitiva entre secciones y las opciones (en los casos que no hay especificidad de producto)
            $this->ConsultaCuenta_M->insertarDT_SecOpc($ID_Seccion, $ID_Opcion);

            //Se INSERTA la dependenciatransitiva entre secciones y los productos
            $this->ConsultaCuenta_M->insertarDT_SecPro($ID_Seccion, $ID_Producto);

            //Se ACTUALIZA el campo "publicar en la tabla "tiendas", para que la tienda comience a aparecer en el catalogo de tiendas
            $this->ConsultaCuenta_M->actualizarTiendaPublicar($RecibeProducto['ID_Tienda']);

            //SECCION IMAGEN PRINCIPAL
            // ********************************************************
            //Si se selecionó alguna imagen entra
            if($_FILES['foto_Producto']["name"] != ""){
                $nombre_imgProducto = $_FILES['foto_Producto']['name'];
                $tipo = $_FILES['foto_Producto']['type'];
                $tamaño = $_FILES['foto_Producto']['size'];

                // echo "Nombre de la imagen = " . $nombre_imgProducto . "<br>";
                // echo "Tipo de archivo = " .$tipo .  "<br>";
                // echo "Tamaño = " . $tamaño . "<br>";
                // echo "Tamaño maximo permitido = 7.000.000" . "<br>";// en bytes
                // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
                // exit();
                //Si existe foto_Producto y tiene un tamaño correcto
                // if(($nombre_imgProducto == !NULL) AND ($tamaño <= 7000000)){
                //     //indicamos los formatos que permitimos subir a nuestro servidor
                //indicamos los formatos que permitimos subir a nuestro servidor
                //     if(($_FILES["foto_Producto"]["type"] == "image/jpeg")
                //         || ($_FILES["foto_Producto"]["type"] == "image/jpg") || ($_FILES["foto_Producto"]["type"] == "image/png")){

                //         //Ruta donde se guardarán las imágenes que subamos la variable superglobal
                //         //$_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                    //Usar en remoto
                    // $directorio_2 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/productos/';

                    // usar en local
                    $directorio_2 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/productos/';

                    //se muestra el directorio temporal donde se guarda el archivo
                    //echo $_FILES['imagen']['tmp_name'];

                    //Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                    move_uploaded_file($_FILES['foto_Producto']['tmp_name'], $directorio_2.$nombre_imgProducto);

                    //Se ACTUALIZA la imagen principal(No se inserta porque ya en la sentencia insertarDescripcionProducto() de este controlador se insertaron los detalles del producto)
                    $this->ConsultaCuenta_M->actualizarImagenPrincipalProducto($ID_Opcion, $nombre_imgProducto);
            //     }
            //     else{
            //         //si no cumple con el formato
            //         echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
            //         // echo "<a href='../tarjeta/perfil_ingeniero.php'>Regresar</a>";
            //         exit();
            //     }
            // // }
            // // else{
            // // //si existe foto_Producto pero se pasa del tamaño permitido
            // // if($nombre_imgProducto == !NULL){
            // //         echo "La imagen es demasiado grande ";
            // //         // echo "<a href='perfil.php'>Regresar</a>";
            // //         exit();
            //     // }
            // }
            }

            //SECCION IMAGENES SECUNDARIAS
            // ********************************************************
            //Si se selecionó alguna nueva imagen entra
            if($_FILES['imagenes']["name"] != ""){
                $Cantidad = count($_FILES["imagenes"]["name"]);
                for($i = 0; $i < $Cantidad; $i++){
                    //nombre original del fichero en la máquina cliente.
                    $archivonombre = $_FILES['imagenes']['name'][$i];
                    $Ruta_Temporal = $_FILES['imagenes']['tmp_name'][$i];
                    $tipo = $_FILES['imagenes']['type'][$i];
                    $tamanio = $_FILES['imagenes']['size'][$i];
                    // echo $archivonombre  ."<br>";
                    // exit();

                    //Usar en remoto
                    // $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/productos/';

                    //usar en local
                    $directorio_3 = $_SERVER['DOCUMENT_ROOT'].'/proyectos/PidoRapido/public/images/productos/';

                    //Subimos el fichero al servidor
                    move_uploaded_file($Ruta_Temporal, $directorio_3.$_FILES["imagenes"]["name"][$i]);

                    //Se INSERTAN las fotografias del producto
                    $this->ConsultaCuenta_M->insertarFotografiasSecun($ID_Producto, $archivonombre, $tipo, $tamanio);
                }
            }
            $this->Publicar();
        }

        //Invocada desde cuenta_editar_prod_V.php
        public function recibeAtualizarProducto(){
            // Se reciben todos los campos del formulario, se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["seccion"]) && !empty($_POST["producto"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"])){

                $RecibeProducto = [
                    //Recibe datos del producto a actualizar
                    'ID_Tienda' => filter_input(INPUT_POST, "id_tienda", FILTER_SANITIZE_STRING),
                    'Seccion' => filter_input(INPUT_POST, "seccion", FILTER_SANITIZE_STRING),
                    'ID_Seccion' => filter_input(INPUT_POST, "id_seccion", FILTER_SANITIZE_STRING),
                    'ID_SP' => filter_input(INPUT_POST, "id_sp", FILTER_SANITIZE_STRING),
                    'Producto' => filter_input(INPUT_POST, "producto", FILTER_SANITIZE_STRING),
                    'Descripcion' => filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING),
                    'Precio' => filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING),
                    'ID_Producto' => filter_input(INPUT_POST, "id_producto", FILTER_SANITIZE_STRING),
                    'ID_Opcion' => filter_input(INPUT_POST, "id_opcion", FILTER_SANITIZE_STRING),
                    'Puntero' => filter_input(INPUT_POST, "puntero", FILTER_SANITIZE_STRING),
                ];
                // echo "<pre>";
                // print_r($RecibeProducto);
                // echo "</pre>";
                // exit();
            }
            else{
                echo "Llene todos los campos obligatorios";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            //SECCION IMAGEN PRINCIPAL
            // ********************************************************
            // Si se selecionó alguna nueva imagen
            if(isset($_FILES['imagenPrinci_Editar']["name"])){
                $nombre_imgProducto = $_FILES['imagenPrinci_Editar']['name'];
                $tipo = $_FILES['imagenPrinci_Editar']['type'];
                $tamanio = $_FILES['imagenPrinci_Editar']['size'];

                // echo "Nombre de la imagen = " . $nombre_imgProducto . "<br>";
                // echo "Tipo de archivo = " . $tipo .  "<br>";
                // echo "Tamaño = " . $tamanio . "<br>";
                // echo "Tamaño maximo permitido = 7.000.000" . "<br>";// en bytes
                // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br><br>";

                //Si existe imagenPrinci_Editar y tiene un tamaño correcto
                if(($nombre_imgProducto == !NULL) AND ($tamanio <= 7000000)){
                    //indicamos los formatos que permitimos subir a nuestro servidor
                    if (($_FILES["imagenPrinci_Editar"]["type"] == "image/jpeg")
                        || ($_FILES["imagenPrinci_Editar"]["type"] == "image/jpg") || ($_FILES["imagenPrinci_Editar"]["type"] == "image/png")){

                        // Ruta donde se guardarán las imágenes que subamos la variable superglobal
                        // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                        //Usar en remoto
                        // $directorio_4 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/productos/';

                        //usar en local
                        $directorio_4 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/productos/';

                        //se muestra el directorio temporal donde se guarda el archivo
                        //echo $_FILES['imagen']['tmp_name'];
                        // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                        move_uploaded_file($_FILES['imagenPrinci_Editar']['tmp_name'], $directorio_4.$nombre_imgProducto);
                    }
                    else{
                        //si no cumple con el formato
                        echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                        // echo "<a href='../tarjeta/perfil_ingeniero.php'>Regresar</a>";
                        exit();
                    }
                }
                else{
                //si existe imagenPrinci_Editar pero se pasa del tamaño permitido
                    if($nombre_imgProducto == !NULL){
                        echo "La imagen es demasiado grande ";
                        // echo "<a href='perfil.php'>Regresar</a>";
                        exit();
                    }
                }
            }

            //SECCION CARACTERISTICAS
            // ********************************************************
            // Recibe las caracteristicas del producto
            foreach($_POST['caracteristica'] as $Caracteristica){
                $Caracteristica = $_POST['caracteristica'];
            }

            //Se eliminan los elementos repetido que se reciben en caracteristicas
            $CaracteristicaSinDuplicado = array_unique($Caracteristica);

            // echo "<pre>";
            // print_r($CaracteristicaSinDuplicado);
            // echo "</pre>";
            // exit();

            //SECCION IMAGENES SECUNDARIAS
            // ********************************************************
            //Se verifican cuantas imagenes se estan recibiendo, incluyendo las que ya existen en la BD
            $Cantidad = count($_FILES["imagen_EditarVarias"]["name"]);
            // echo $Cantidad . "<br>";
            for($i = 0; $i < $Cantidad ; $i++){
                //Las imagenes que existian en la BD se reciben sin su nombre por lo que no van a entrar en bucle, solo las imagenes que vienen por medio del input de agregar imagen son las que entran en el bucle
                if($_FILES['imagen_EditarVarias']["name"][$i] != ""){
                    $nombre_imgVarias = $_FILES['imagen_EditarVarias']['name'][$i];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
                    $tipo_imgVarias = $_FILES['imagen_EditarVarias']['type'][$i];
                    $tamanio_imgVarias = $_FILES['imagen_EditarVarias']['size'][$i];

                    // echo "Nombre de la imagen = " . $nombre_imgVarias . "<br>";
                    // echo "Tipo de archivo = " .$tipo_imgVarias .  "<br>";
                    // echo "Tamaño = " . $tamanio_imgVarias . "<br>";
                    // echo "Tamaño maximo permitido = 7.000.000" . "<br>";// en bytes
                    // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br><br>";

                    //Si existe imagen_EditarVarias y tiene un tamaño correcto
                    // if(($nombre_imgVarias == !NULL) AND ($tamanio_imgVarias <= 7000000)){
                    //     //indicamos los formatos que permitimos subir a nuestro servidor
                    //     if (($_FILES["imagen_EditarVarias"]["type"][$i] == "image/jpeg")
                    //         || ($_FILES["imagen_EditarVarias"]["type"][$i] == "image/jpg") || ($_FILES["imagen_EditarVarias"]["type"][$i] == "image/png")){

                    //         // Ruta donde se guardarán las imágenes que subamos la variable superglobal
                    //         // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                            //Usar en remoto
                            // $directorio_5 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/productos/';

                            //usar en local
                            $directorio_5 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/productos/';

                            //se muestra el directorio temporal donde se guarda el archivo
                            //echo $_FILES['imagen']['tmp_name'];
                            // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                            move_uploaded_file($_FILES['imagen_EditarVarias']['tmp_name'][$i], $directorio_5.$nombre_imgVarias);

                            //Para actualizar fotografias varias solo si se ha presionado el boton de buscar fotografia; en realidad no se actualizan, simplemente se insertan las que se reciben del formulario

                            //Se INSERTAN las fotografias del producto
                            $this->ConsultaCuenta_M->insertarFotografiasSecun($RecibeProducto['ID_Producto'], $nombre_imgVarias, $tipo_imgVarias, $tamanio_imgVarias);
                    //     }
                    //     else{
                    //         //si no cumple con el formato
                    //         echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                    //         // echo "<a href='../tarjeta/perfil_ingeniero.php'>Regresar</a>";
                    //         exit();
                    //     }
                    // }
                    // else{
                    // //si existe imagen_EditarVarias pero se pasa del tamaño permitido
                    //     if($nombre_imgVarias == !NULL){
                    //         echo "Una imagen es demasiado grande ";
                    //         // echo "<a href='perfil.php'>Regresar</a>";
                    //         exit();
                    //     }
                    // }
                }
                else{
                    echo "Imagen sin nombre";
                }
            }

            //Estas cinco sentencias de actualización deben realizarce por medio de transsacciones
            $this->ConsultaCuenta_M->actualizarOpcion($RecibeProducto);
            $this->ConsultaCuenta_M->actualizarProducto($RecibeProducto);
            $this->ConsultaCuenta_M->actualizacionSeccion($RecibeProducto);
            // Se eliminan las caracteristicas existentes de un producto especifica
            $this->ConsultaCuenta_M->eliminarCaracteristicas($RecibeProducto['ID_Producto'],);
            $this->ConsultaCuenta_M->insertarCaracteristicasProducto($RecibeProducto, $RecibeProducto ['ID_Producto'], $CaracteristicaSinDuplicado);

            //Para actualizar fotografia principal solo si se ha presionado el boton de buscar fotografia
            if(($_FILES['imagenPrinci_Editar']['name']) != ""){
                //Se ACTUALIZA la fotografia principal del producto
                $this->ConsultaCuenta_M->actualizarImagenPrincipalProducto($RecibeProducto['ID_Opcion'], $nombre_imgProducto);
            }

            //Se envia la sección donde esta el producto actualizado para redireccionar a esa sección
            $Seccion = $RecibeProducto['Seccion'];

            //Se envia el puntero hacia el producto que se actualizó
            // $Puntero = $RecibeProducto['Puntero']; //$Puntero se refiere al producto a donde se va a colocar el foco

            //$Seccion y $Puntero Se deben convertir en cadena porque el controlador Productos recibe una cadena de datos agrupados separados por coma
            // $Seccion_Puntero = $Seccion . ',' . $Puntero;

            $this->Productos($Seccion);
            // $this->vista("paginas/cuenta_productos_V");
        }

        //Invocado desde cuenta_productos_V.php
        public function eliminarProducto($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Opcion, ID_Producto y la sección separados por coma, se convierte en array para separar los elementos
            // echo $DatosAgrupados;
            // exit();

            $DatosAgrupados = explode(",", $DatosAgrupados);

            $ID_Producto = $DatosAgrupados[0];
            $ID_Opcion = $DatosAgrupados[1];
            $Seccion = $DatosAgrupados[2];

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

            //Se redirecciona a la vista donde se encontraba el producto eliminado
            $this->Productos($Seccion);
            // $this->vista("paginas/cuenta_productos_V", $Datos);
        }

        //Invocado desde A_Cuenta_editar_prod.js por medio de Llamar_EliminarImagenSecundaria()
        public function eliminarImagen($ID_Imagen){
            $this->ConsultaCuenta_M->eliminarImagenProducto($ID_Imagen);
        }
        
        //Invocado desde cuenta_editar_V.php
        public function eliminarSeccion($ID_Seccion){
            // *************************************************************************************
            //La siguientes cuatro consultas entran en el procedimeinto para ELIMINAR una seccion de una tienda, esto debe hacerse mediante transacciones
            // *************************************************************************************
            $this->ConsultaCuenta_M->eliminarTiendasSecciones($ID_Seccion);
            $this->ConsultaCuenta_M->eliminarSeccionesProductos($ID_Seccion);
            $this->ConsultaCuenta_M->eliminarSeccionesOpciones($ID_Seccion);
            $this->ConsultaCuenta_M->eliminarSecciones($ID_Seccion);

            //Se redirecciona a la vista de configuración para dejar al usuario donde estaba
            $this->Editar();
        }
        
        //Invocado desde cuenta_editar_V.php
        public function ActualizarSeccion($Seccion, $ID_Seccion){
            //Se ACTUALIZA una seccion 
            $this->ConsultaCuenta_M->ActualizarSeccion($Seccion, $ID_Seccion);

            //Se redirecciona a la vista de configuración para dejar al usuario donde estaba
            $this->Editar();
        }

        //Invocado en cuenta_editar_V.php autoriza si la tienda se suspende o se publica en el catalogo de tiendas
        public function publicarTienda(){            
            $Consulta = $this->ConsultaCuenta_M->consultaPermisoPublicar($this->ID_Tienda);
            // echo "<pre>";
            // print_r($Consulta);
            // echo "</pre>";
            if($Consulta[0]['publicar'] == 0){
                echo "Es necesario configurar la totalidad de la tienda";  
            }
        }
    }
?>
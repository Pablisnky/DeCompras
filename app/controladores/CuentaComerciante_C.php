<?php
    class CuentaComerciante_C extends Controlador{
        // private $ID_Tienda;
        private $ID_Afiliado;
        public $Horario;

        public function __construct(){
            session_start();

            $this->ConsultaCuenta_M = $this->modelo('CuentaComerciante_M');

            //Sesion creada en Login_C
            if(isset($_SESSION['ID_Tienda'])){
                $this->ID_Tienda = $_SESSION['ID_Tienda'];
            }

            //Sesion creada en Login_C
            $this->ID_Afiliado = $_SESSION['ID_Afiliado'];

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        // invocado desde el metodo recibeRegistroEditado() en esta misma clase
        public function index(){
            //CONSULTA los datos de la tienda
            $DatosTienda = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);

            //CONSULTA los productos de una sección en especifico según la tienda
            $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            // $Secciones = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            //CONSULTA la imagen de la tienda
            $Fotografia = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);

            //Se CONSULTAN el slogan de una tienda en particular
            $Slogan = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);

            $Datos = [
                'datosTienda' => $DatosTienda, //nombre_Tien, estado_Tien, municipio_Tien,
                'secciones' => $Secciones,
                'fotografiaTienda' => $Fotografia,
                'slogan' => $Slogan,
            ];

            $this->vista('view/cuenta_comerciante/cuenta_V', $Datos);
        }

        public function Despachador(){
            $this->vista('view/cuenta_comerciante/cuenta_despachador_V');
        }

        //Invocado desde login_C/ValidarSesion - CuentaComerciante_C/eliminarProducto - CuentaComerciante_C/recibeAtualizarProducto - CuentaComerciante_C/recibeProductoPublicar - header_AfiCom.php, muestra todos los productos publicados o los de una sección en especifico
        public function Productos($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el separados por coma, se convierte en array para separar los elementos
            // echo 'Datos agrupados= ' . $DatosAgrupados . '<br>';
            // echo 'ID_Tienda= ' . $this->ID_Tienda . '<br>';
            // exit;

            $DatosAgrupados = explode(',', $DatosAgrupados);

            $Seccion = $DatosAgrupados[0];
            //Mediante operador ternario
            $ID_Seccion = empty($DatosAgrupados[1]) ? 'NoAplica' : $DatosAgrupados[1];
            $Puntero =  empty($DatosAgrupados[2]) ? 'NoAplica' : $DatosAgrupados[2];
            // echo $Seccion . '<br>';
            // echo $Puntero . '<br>';
            // echo $ID_Seccion . '<br>';
            // exit();

            //$Seccion cuando es una frase de varias palabras, la cadena llega unida, por lo que la busqueda en la BD no es la esperada.
            // - poner cada inicio de palabra con mayuscula para separarlas por medio de array, esto conlleva a que al recibir las secciones por parte del usuario en el formulario de configuración se conviertan estas letrs en mayuscula porque el usuario puede ingresarlas en minusculas
            // - Recibirla la variable sin que se elimine el espacio entre palabras
            //Provicionalmente se comento la sentencia que sanitiza la URL en Core.php que es donde se quitan los espacios en blancos
            urldecode($Seccion);

            if($Seccion  == 'Todos'){
                //CONSULTA todos los productos de una tienda
                $Productos = $this->ConsultaCuenta_M->consultarTodosProductosTienda($this->ID_Tienda);
                // echo '<pre>';
                // print_r($Productos);
                // echo '</pre>';
                // exit();

                //Si no hay productos cargados, la tienda se oculta a los usuarios
                if($Productos == Array()){
                    $this->ConsultaCuenta_M->actualizarMostarTienda($this->ID_Tienda);
                }

                //CONSULTA las caracteristicas de los productos de una sección de una tienda
                $Caracteristicas = $this->ConsultaCuenta_M->consultarCaracterisicasProducto($this->ID_Tienda);

                //Se desglosa el valor para que sea solo igual el valor '1'
                // $Notificacion = $Notificacion[0]['notificacion'];

                $Seccion  = 'Todos';
            }
            else{
                //CONSULTA los productos de una sección en especifico según la tienda
                $Productos= $this->ConsultaCuenta_M->consultarProductosTienda($this->ID_Tienda, $Seccion);

                // echo '<pre>';
                // print_r($Productos);
                // echo '</pre>';
                // exit();

                //CONSULTA las caracteristicas de los productos de una sección de una tienda
                $Caracteristicas = $this->ConsultaCuenta_M->consultarCaracterisicasProducto($this->ID_Tienda);

                //Se da el valor de notifiación directamente debido a que si la condicion entró en el ELSE ya el afiliado a visitado la página y no tiene notificaciones por leer
                $Notificacion = 1;
            }

            //CONSULTA los datos de la tienda
            $DatosTienda = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);

            //Se CONSULTAN las secciones de una tienda en particular
            $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);

            //Se CONSULTAN el slogan de una tienda en particular
            $Slogan = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);

            $Datos = [
                'datosTienda' => $DatosTienda, //nombre_Tien, estado_Tien, municipio_Tien, 
                'secciones' => $Secciones, //ID_Seccion, seccion (necesario en header_AfiCom, arma el item productos del menu)
                'productos' => $Productos, //ID_Seccion, destacar, ID_Producto, producto, ID_Opcion, opcion, precioBolivar, prcioDolar, cantidad, disponible, seccion, nombre_img
                // 'notificacion' => $Notificacion,
                'Seccion' => $Seccion, //necesario para identificar la sección en la banda naranja
                'Apunta' => $Puntero,
                'slogan' => $Slogan,
                'variosCaracteristicas' => $Caracteristicas,
                'ID_Seccion' => $ID_Seccion //ID_Seccion de la cual se estan visualizando sus productos
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            //En el caso que no se haya configurado ninguna seccion o categoria
            if($Datos['secciones'] == Array ()){
                header('location:' . RUTA_URL. '/Modal_C/tiendaSinProductos');
            }
            else{
                $this->vista('header/header_AfiCom', $Datos);//Evaluar como mandar solo la seccion del array $Datos
                $this->vista('view/cuenta_comerciante/cuenta_productos_V', $Datos);
            }
        }

        //Muestra el formulario de configuración
        public function Editar(){
            //CONSULTA los datos de la tienda
            $DatosTienda = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);

            //CONSULTA los datos del responsable de la tienda
            $DatosResposable = $this->ConsultaCuenta_M->consultarResponsableTienda($this->ID_Afiliado);
            
            //Se CONSULTAN el horario de lunes a viernes de la tienda
            $Horario_LV = $this->ConsultaCuenta_M->consultarHorarioTienda_LV($this->ID_Tienda);

            //Se CONSULTAN el horario del dia sábado de la tienda
            $Horario_Sab = $this->ConsultaCuenta_M->consultarHorarioTienda_Sab($this->ID_Tienda);

            //Se CONSULTAN el horario del dia domingo de la tienda
            $Horario_Dom = $this->ConsultaCuenta_M->consultarHorarioTienda_Dom($this->ID_Tienda);
            
            //Se CONSULTAN el horario del dia de excepcion de la tienda
            $Horario_Esp = $this->ConsultaCuenta_M->consultarHorarioTienda_Esp($this->ID_Tienda);

            //CONSULTA los datos de cuentas bancarias de la tienda
            $DatosBancos = $this->ConsultaCuenta_M->consultarBancosTienda($this->ID_Tienda);

            //CONSULTA los datos de cuentas pagmovil de la tienda
            $DatosPagoMovil = $this->ConsultaCuenta_M->consultarCuentasPagomovil($this->ID_Tienda);

            //CONSULTA los datos de cuentas Reserve de la tienda
            $DatosReserve = $this->ConsultaCuenta_M->consultarCuentasReserve($this->ID_Tienda);

            //CONSULTA los datos de cuentas Paypal de la tienda
            $DatosPaypal = $this->ConsultaCuenta_M->consultarCuentasPaypal($this->ID_Tienda);

            //CONSULTA los datos de cuentas Zelle de la tienda
            $DatosZelle = $this->ConsultaCuenta_M->consultarCuentasZelle($this->ID_Tienda);

            //CONSULTA otros medios de pago
            $OtrosPagos = $this->ConsultaCuenta_M->consultarOtrosMediosPago($this->ID_Tienda);

            //CONSULTA las categorias en la que la tienda esta registrada
            $Categoria = $this->ConsultaCuenta_M->consultarCategoriaTienda($this->ID_Tienda);

            //CONSULTA las secciones de la tienda
            $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);

            //Se CONSULTAN el slogan de una tienda en particular
            $Slogan = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);

            //Se CONSULTAN el link de acceso directo de una tienda en particular
            $Link_Tien = $this->ConsultaCuenta_M->consultarLinkTienda($this->ID_Tienda);
            
            //Se verifica si existe el link de acceso directo y se crea en caso de no existir
            if(empty($Link_Tien)): 
                //Se crea el link de aceso';  
                $LinkAcceso = RUTA_URL .'/' . $DatosTienda[0]['nombre_Tien'];

                //Se guarda el link de acceso y la url real en la configuración de la tienda
                //INSERT del link de acceso directo de una tienda en particular
                $this->ConsultaCuenta_M->insertarLinkTienda($this->ID_Tienda, $LinkAcceso);

                //Se CONSULTA el link de acceso directo creado para insertar en el array $Datos
                $Link_Tien = $this->ConsultaCuenta_M->consultarLinkTienda($this->ID_Tienda);
            endif;

            $Datos = [
                'datosTienda' => $DatosTienda, //nombre_Tien, estado_Tien, municipio_Tien, parroquia_Tien, direccion_Tien, slogan_Tien, fotografia_Tien, desactivar_Tien
                'datosResposable' => $DatosResposable,
                'horario_LV' => $Horario_LV,
                'horario_Sab' => $Horario_Sab,
                'horario_Dom' => $Horario_Dom,
                'horario_Esp' => $Horario_Esp,
                'datosBancos' => $DatosBancos,
                'datosPagomovil' => $DatosPagoMovil,
                'datosReserve' => $DatosReserve, //usuarioReserve, telefonoReserve
                'datosPaypal' => $DatosPaypal, //correo_paypal
                'datosZelle' => $DatosZelle,
                'categoria' => $Categoria, // categoria
                'secciones' => $Secciones,
                'slogan' => $Slogan,
                'link_Tien' => $Link_Tien, //link_acceso, url 
                'otrosPagos' => $OtrosPagos
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            //Se crea una sesión con el contenido de una seccion de la tienda, para verificar que el usuario ya tiene creada al menos una cuando vaya a cargar un producto
            if(!empty($Datos['secciones'])){
                foreach($Datos['secciones'] as $Key){
                    $Seccion = $Key['seccion'];
                }
                $_SESSION['Seccion'] = $Seccion;
            }

            $this->vista('header/header_AfiCom', $Datos); 
            $this->vista('view/cuenta_comerciante/cuenta_editar_V', $Datos);
        }

        // Carga la vista donde se carga un producto
        public function Publicar(){
            //CONSULTA los datos de la tienda
            $DatosTienda = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);

            //CONSULTA si existe al menos una sección donde cargar productos
            $Cant_Seccion = $this->ConsultaCuenta_M->consultarSecciones($this->ID_Tienda);
            // echo 'Registros encontrados: ' . $Cant_Seccion;
            
            //En el caso que no se haya configurado ninguna seccion o categoria
            if($Cant_Seccion == 0){ 
                header('location:' . RUTA_URL. '/Modal_C/tiendaSinSecciones');
            }
            else{
                //CONSULTA la categoria de una tienda 
                $Categorias = $this->ConsultaCuenta_M->consultarCategoriaTiendas($this->ID_Tienda);

                //CONSULTA las secciones que tiene una tienda
                $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);

                //Se CONSULTAN el slogan de una tienda en particular
                $Slogan = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);

                //Solicita el precio del dolar
                require(RUTA_APP . '/controladores/Menu_C.php');
                $this->PrecioDolar = new Menu_C();

                //Solicita la fecha actual
                require(RUTA_APP . '/controladores/complementos/Fechas.php');
                $this->Fecha = new Fechas();
        
                $Datos = [
                    'datosTienda' => $DatosTienda, //nombre_Tien, estado_Tien, municipio_Tien,
                    'categorias' => $Categorias,
                    'secciones' => $Secciones,
                    'slogan' => $Slogan,
                    'dolarHoy' => $this->PrecioDolar->Dolar,
                    'fechaDotacion' => $this->Fecha->FechaDotacion, 
                    'fechaReposicion' => $this->Fecha->fechaReposicion
                ];
                
                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";
                // exit();

                $verifica_2 = 1906;  
                $_SESSION['verifica_2'] = $verifica_2; 
                //Se crea esta sesion para impedir que se recargue la información enviada por el formulario mandandolo varias veces a la base de datos

                $this->vista('header/header_AfiCom', $Datos);
                $this->vista('view/cuenta_comerciante/cuenta_publicar_V', $Datos);
            }
        }

        //Invocado desde cuenta_productos_V.php
        public function actualizarProducto($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Producto y la opcion separados por coma, se convierte en array para separar los elementos

            $DatosAgrupados = explode(",", $DatosAgrupados);

            $ID_Producto = $DatosAgrupados[0];
            $Opcion = $DatosAgrupados[1];

            //CONSULTA los datos de la tienda
            $DatosTienda = $this->ConsultaCuenta_M->consultarDatosTienda($this->ID_Tienda);

            //CONSULTA los productos de una sección en especifico según la tienda
            $Secciones = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);

            //CONSULTA las especiicaciones de un producto determinado y de una tienda especifica
            $Especificaciones = $this->ConsultaCuenta_M->consultarDescripcionProducto($this->ID_Tienda, $ID_Producto);

            //CONSULTAN el slogan de una tienda en particular
            $Slogan = $this->ConsultaCuenta_M->consultarSloganTienda($this->ID_Tienda);

            //CONSULTAN las caracteristicas añadidas del producto
            $Caracteristicas = $this->ConsultaCuenta_M->consultarCaracteristicasProducto($this->ID_Tienda, $ID_Producto);
            
            //CONSULTAN los datos de reposicion del producto
            // $Reposicion = $this->ConsultaCuenta_M->consultarReposicionProducto($ID_Producto);

            //CONSULTAN la imagenes principal del producto
            $ImagenPrin = $this->ConsultaCuenta_M->consultarImagenPrincipal($ID_Producto);

            //CONSULTAN las imagenes secundarias del producto
            $Imagenes = $this->ConsultaCuenta_M->consultarImagnesProducto($ID_Producto);

            //CONSULTAN si el producto es imagen de sección
            // $ImagenSeccion = $this->ConsultaCuenta_M->consultarImagenSeccionEstablecida($ID_Producto);

            //Solicita el precio del dolar
            require(RUTA_APP . "/controladores/Menu_C.php");
            $this->PrecioDolar = new Menu_C();

            $Datos = [
                'datosTienda' => $DatosTienda, //nombre_Tien, estado_Tien, municipio_Tien, parroquia_Tien, direccion_Tien, telefono_Tien, slogan_Tien, fotografia_Tien
                'secciones' => $Secciones, //ID_Seccion, seccion  - Usado en header_AfiCom.php
                'especificaciones' => $Especificaciones, //ID_Producto, destacar, ID_Opcion, producto, opcion, precioBolivar, precioDolar, cantidad, disponible, seccion, ID_Seccion, ID_SP
                'puntero' => $Opcion,
                'slogan' => $Slogan,
                'caracteristicas' => $Caracteristicas, //ID_Caracteristica, caracteristica
                'imagenPrin' => $ImagenPrin, //ID_Imagen, nombre_img
                'imagenesVarias' => $Imagenes, //ID_Imagen, nombre_img
                'dolarHoy' => $this->PrecioDolar->Dolar,
                // 'reposicion'=> $Reposicion
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('header/header_AfiCom', $Datos); 
            $this->vista('view/cuenta_comerciante/cuenta_editar_prod_V', $Datos);
        }
        
        //*****************************************************************************
        //*****************************************************************************
        // HASTA AQUI SON LOS METODOS QUE RESPONDEN AL MENU
        //*****************************************************************************
        //*****************************************************************************

        public function ConsultarOpciones($OpcionProd){
            //CONSULTA las opciones de productos que existen en la BD segun la categoria seleccionada
            $Consulta = $this->ConsultaCuenta_M->consultarOpcionesProductos($OpcionProd);
            $Datos = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            $this->vista('header/Select_Ajax_V', $Datos);
        }

        //Llamado desde A_Cuenta_editar.js
        public function Categorias(){
            //CONSULTA las categorias que exiten en la BD
            $Categorias = $this->ConsultaCuenta_M->consultarCatgorias();

            //CONSULTA las categorias en las que una tienda se ha postulado
            $CategoriasTienda = $this->ConsultaCuenta_M->consultarCategoriaTiendas($this->ID_Tienda );

            $Datos = [
                'categorias' => $Categorias,
                'categoriasTienda' => $CategoriasTienda
            ];

            $this->vista('header/Categorias_Ajax_V', $Datos);
        }

        //Invocado desde A_Cuenta_editar_prod.js entrega las secciones activas de una tienda
        public function Secciones($ID_Producto){
            //CONSULTA las secciones que tiene una tienda llamada desde Funciones_Ajax.js
            $Seccion = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);
            // $Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            // echo '<pre>';
            // print_r($Seccion);
            // echo '</pre>';
            // exit();

            //CONSULTA el ID_Sección al que pertenece un producto de una tienda especifica
            $Consulta = $this->ConsultaCuenta_M->consultarSeccionActiva($ID_Producto);
            $ID_Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            // echo '<pre>';
            // print_r($ID_Seccion);
            // echo '</pre>';
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

            $this->vista('header/Secciones_Ajax_V', $Datos);
        }

        //Metodo invocado desde A_Cuenta_publicar.js
        public function SeccionesDisponibles(){
            // CONSULTA las secciones que tiene una tienda llamada desde Funciones_Ajax.js
            $Seccion = $this->ConsultaCuenta_M->consultarSeccionesTienda($this->ID_Tienda);

            $Datos = [
                'seccion' => $Seccion,
            ];

            $this->vista('header/SeccionesDisponibles_Ajax_V', $Datos);
        }

        //Recibe el formulario de configuracion de tienda invocado en cuenta_editar_V.php
        public function recibeRegistroEditado(){
            //Se reciben todos los campos del formulario desde cuenta_editar_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nombre_Afcom']) && !empty($_POST['apellido_Afcom']) && !empty($_POST['cedula_Afcom']) && !empty($_POST['telefono_Afcom']) && !empty($_POST['correo_Afcom']) && !empty($_POST['nombre_com']) && !empty($_POST['direccion_com'])
            ){
                $RecibeDatos = [
                    //RECIBE DATOS PERSONA RESPONSABLE
                    'Nombre_Afcom' => filter_input(INPUT_POST, 'nombre_Afcom', FILTER_SANITIZE_STRING),
                    'Apellido_Afcom'=> filter_input(INPUT_POST, 'apellido_Afcom', FILTER_SANITIZE_STRING),
                    'Cedula_Afcom' => filter_input(INPUT_POST, 'cedula_Afcom', FILTER_SANITIZE_STRING),
                    'Telefono_Afcom'=> filter_input(INPUT_POST, 'telefono_Afcom', FILTER_SANITIZE_STRING),
                    'Correo_Afcom' => filter_input(INPUT_POST, 'correo_Afcom', FILTER_SANITIZE_STRING),

                    //RECIBE DATOS DE LA TIENDA
                    'Nombre_com' => filter_input(INPUT_POST, 'nombre_com', FILTER_SANITIZE_STRING),
                    'Estado_com' => filter_input(INPUT_POST, 'estado_com', FILTER_SANITIZE_STRING),
                    'Municipio_com' => filter_input(INPUT_POST, 'municipio_com', FILTER_SANITIZE_STRING),
                    'Parroquia_com' => filter_input(INPUT_POST, 'parroquia_com', FILTER_SANITIZE_STRING),
                    'Direccion_com' => filter_input(INPUT_POST, 'direccion_com', FILTER_SANITIZE_STRING),
                    'Slogan_com' => filter_input(INPUT_POST, 'slogan_com', FILTER_SANITIZE_STRING),
                    'Desactivar_com' => empty($_POST['desactivar_com']) ? 0 : 1
                ];

                // echo '<pre>';
                // print_r($RecibeDatos);
                // echo '</pre>';
                // exit;
                // $RecibeDatos = [
                //         'Nombre' => ucwords($_POST['nombre']),
                //         'Cedula' => is_numeric($_POST['cedula']) ? $_POST['cedula']: false,
                //         'Telefono' => is_numeric($_POST['telefono']) ? $_POST['telefono']: false,
                //         'Correo' => mb_strtolower($_POST['correo']),
                //         'Clave' => $_POST['clave'],
                //         'RepiteClave' => $_POST['confirmarClave'],
                // ];

                //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                // if($RecibeDatos['Telefono_Afcom'] == false){
                //     exit('El telefono debe ser solo números');
                // }
                // //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                // if($RecibeDatos['Cedula_Afcom'] == false){
                //     exit('La cedula debe ser solo números');
                
                //Se ACTUALIZAN los datos de la tienda, el registro de la tienda fue creado cuando el afiliado creo la tienda
                $this->ConsultaCuenta_M->actualizarTienda($this->ID_Afiliado, $RecibeDatos);
            }
            else{
                echo 'Llene todos los campos del formulario de registro';
                echo '<br>';
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            //RECIBE IMAGEN TIENDA
            // ********************************************************
            //Recibe la imagen de la tienda solo si se ha presionado el boton de buscar fotografia
            if(($_FILES['imagen_Tienda']['name']) != ''){
                //Al nombre de la imagen se le añade un prefijo para evitar que sobreescriba otra imagen ya existente en el directorio dondes se guardan las imagenes
                $nombre_imgTienda = $this->ID_Tienda . $_FILES['imagen_Tienda']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
                $tipo_imgTienda = $_FILES['imagen_Tienda']['type'];
                $tamaño_imgTienda = $_FILES['imagen_Tienda']['size'];

                // echo 'Nombre de la imagen = ' . $nombre_imgTienda . '<br>';
                // echo 'Tipo de archivo = ' .$tipo_imgTienda .  '<br>';
                // echo 'Tamaño = ' . $tamaño_imgTienda . '<br>';
                // echo 'Tamaño maximo permitido = 7.000.000' . '<br>';// en bytes
                // echo 'Ruta del servidor = ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';

                //Si existe imagen_Tienda y tiene un tamaño correcto
                //Si existe imagenPrinci_Editar y tiene un tamaño correcto (2Mb)
                if(($nombre_imgTienda == !NULL) AND ($tamaño_imgTienda <= 2000000)){
                    //indicamos los formatos que permitimos subir a nuestro servidor
                    if(($_FILES['imagen_Tienda']['type'] == 'image/jpeg')
                        || ($_FILES['imagen_Tienda']['type'] == 'image/jpg') || ($_FILES['imagen_Tienda']['type'] == 'image/png')){
                        // Ruta donde se guardarán las imágenes que subamos la variable superglobal
                        // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                        //Se crea el directorio donde iran las imagenes de la tienda
                        // Usar en remoto
                        $CarpetaImagenes = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/' . $_SESSION['nombre_Tien'] . $_SESSION['nombre_Tien'];

                        // Usar en local
                        // $CarpetaImagenes = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/' . $_SESSION['nombre_Tien'];

                        if(!file_exists($CarpetaImagenes)){
                            mkdir($CarpetaImagenes, 0777, true);
                        }
                        
                        // Se inserta la imagen en el directorio correspondiente
                        //Usar en remoto
                        $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/';

                        //usar en local
                        // $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/';
                        
                        //se muestra el directorio temporal donde se guarda el archivo
                        //echo $_FILES['imagen']['tmp_name'];
                        // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                        move_uploaded_file($_FILES['imagen_Tienda']['tmp_name'], $directorio_1.$nombre_imgTienda);

                        //Para actualizar fotografia de perfil solo si se ha presionado el boton de buscar fotografia
                        if(($_FILES['imagen_Tienda']['name']) != ''){
                            //Se ACTUALIZA la fotografia de la tienda
                            $this->ConsultaCuenta_M->actualizarFotografiaTienda($this->ID_Tienda, $nombre_imgTienda);
                        }
                    }
                }
                else{
                    //si no cumple con el formato
                    echo 'Solo puede cargar imagenes con formato jpg, jpeg o png';
                    echo '<br>';
                    echo "<a href='javascript:history.back()'>Regresar</a>";
                    exit();
                }

                //si existe imagen_Tienda pero se pasa del tamaño permitido
                // if($nombre_imgTienda == !NULL){
                //     echo "La imagen es demasiado grande ";
                //     echo "<br>";
                //     echo "<a href='javascript:history.back()'>Regresar</a>";
                //     exit();
                // }
            }
            else{
                //Se crea el directorio donde iran las imagenes de la tienda
                $CarpetaImagenes = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/' . $_SESSION['nombre_Tien'];

                if(!file_exists($CarpetaImagenes)){
                    mkdir($CarpetaImagenes, 0777, true);
                }
            }

            //RECIBE CATEGORIAS
            // ********************************************************
            //Recibe las categorias seleccionadas
            if(!empty($_POST['categoria'])){
                foreach($_POST['categoria'] as $Categoria){
                    $Categoria = $_POST['categoria'];
                }
            }
            else{
                echo 'Ingrese al menos una categoría';
                echo '<br>';
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            // echo 'Categorias recibidas';
            // echo '<pre>';
            // print_r($Categoria);
            // echo '</pre>';
            // exit();

            //RECIBE SECCIONES
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
                echo 'Ingrese al menos una sección';
                echo '<br>';
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            // echo 'Secciones recibidas';
            // echo '<pre>';
            // print_r($SeccionesRecibidas);
            // echo '</pre>';

            //Se CONSULTA las secciones existenete en BD
            $SecccionesExistentes = $this->ConsultaCuenta_M->consultarSecciones_2($this->ID_Tienda);
            // echo 'Secciones existentes';
            // echo '<pre>';
            // print_r($SecccionesExistentes);
            // echo '</pre>';
            
            $Secciones = array_diff($SeccionesRecibidas, $SecccionesExistentes);
            // echo 'Secciones a insertar';
            // echo '<pre>';
            // print_r($Secciones);
            // echo '</pre>';
            // exit();
            
            //RECIBE HORARIO
            //Seccion datos horarios de atencion al cliente, se almacenará en la tabla horarios
            if(!empty($_POST['lunes_M']) || !empty($_POST['martes_M']) || !empty($_POST['miercoles_M']) || !empty($_POST['jueves_M']) || !empty($_POST['viernes_M']) || !empty($_POST['sabado_M']) &&! empty($_POST['domingo_M']) || !empty($_POST['lunes_T']) || !empty($_POST['martes_T']) || !empty($_POST['miercoles_T']) || !empty($_POST['jueves_T']) || !empty($_POST['viernes_T']) || !empty($_POST['sabado_T']) || !empty($_POST['domingo_T'])){
                $RecibeHorario_LV = [
                    'Inicio_M' => $_POST['inicioManana'],
                    'Culmina_M' => $_POST['culminaManana'],
                    
                    'Lunes_M' => isset($_POST['lunes_M']) == 'Lunes' ? $_POST['lunes_M'] : 0,
                    'Martes_M' => isset($_POST['martes_M']) == 'Martes' ? $_POST['martes_M'] : 0,
                    'Miercoles_M' => isset($_POST['miercoles_M']) == 'Miercoles' ? $_POST['miercoles_M']:0,
                    'Jueves_M' => isset($_POST['jueves_M']) == 'Jueves' ? $_POST['jueves_M'] : 0,
                    'Viernes_M' => isset($_POST['viernes_M']) == 'Viernes' ? $_POST['viernes_M'] : 0,

                    'Inicia_T' => $_POST['iniciaTarde'],
                    'Culmina_T' => $_POST['culminaTarde'],
                    'Lunes_T' => isset($_POST['lunes_T']) == 'Lunes' ? $_POST['lunes_T'] : 0,
                    'Martes_T' => isset($_POST['martes_T']) == 'Martes' ? $_POST['martes_T'] : 0,
                    'Miercoles_T' => isset($_POST['miercoles_T']) == 'Miercoles' ? $_POST['miercoles_T']:0,
                    'Jueves_T' => isset($_POST['jueves_T']) == 'Jueves' ? $_POST['jueves_T'] : 0,
                    'Viernes_T' => isset($_POST['viernes_T']) == 'Viernes' ? $_POST['viernes_T'] : 0
                ];
                $RecibeHorario_Sab = [
                    'Inicio_M_Sab' => isset($_POST['inicioManana_Sab']) != '' ? $_POST['inicioManana_Sab'] : 0,
                    'Culmina_M_Sab' => isset($_POST['culminaManana_Sab']) != '' ? $_POST['culminaManana_Sab'] : 0,
                    'Sabado_M' => isset($_POST['sabado_M']) == 'Sabado' ? $_POST['sabado_M'] : 0,

                    'Inicia_T_Sab' => isset($_POST['inicioTarde_Sab']) == 'Sabado' ? $_POST['inicioTarde_Sab'] : 0,
                    'Culmina_T_Sab' => isset($_POST['culminaTarde_Sab']) == 'Sabado' ? $_POST['culminaTarde_Sab'] : 0,
                    'Sabado_T' => isset($_POST['sabado_T']) == 'Sabado' ? $_POST['sabado_T'] : 0,
                ];
                $RecibeHorario_Dom = [
                    'Inicio_M_Dom' => isset($_POST['inicioManana_Dom']) == 'Domingo' ? $_POST['inicioManana_Dom'] : 0,
                    'Culmina_M_Dom' => isset($_POST['culminaManana_Dom']) == 'Domingo' ? $_POST['culminaManana_Dom'] : 0,
                    'Domingo_M' => isset($_POST['domingo_M']) == 'Domingo' ? $_POST['domingo_M'] : 0,
                    'Inicia_T_Dom' => isset($_POST['inicioTarde_Dom']) == 'Domingo' ? $_POST['inicioTarde_Dom'] : 0,
                    'Culmina_T_Dom' => isset($_POST['culminaTarde_Dom']) == 'Domingo' ? $_POST['culminaTarde_Dom'] : 0,
                    'Domingo_T' => isset($_POST['domingo_T']) == 'Domingo' ? $_POST['domingo_T'] : 0,
                ];
                $RecibeHorario_Esp = [
                    'Inicio_M_Esp' => isset($_POST['inicioManana_Esp']) != '' ? $_POST['inicioManana_Esp'] : 0,
                    'Culmina_M_Esp' => isset($_POST['culminaManana_Esp']) != '' ? $_POST['culminaManana_Esp'] : 0,
                    'DiaEspecial_M' => isset($_POST['horario_Espec_M']) != '' ? $_POST['horario_Espec_M'] : 0,
                    'Inicia_T_Esp' => isset($_POST['inicioTarde_Esp']) != '' ? $_POST['inicioTarde_Esp'] : 0,
                    'Culmina_T_Esp' => isset($_POST['culminaTarde_Esp']) != '' ? $_POST['culminaTarde_Esp'] : 0,
                    'DiaEspecial_T' => isset($_POST['horario_Espec_T']) != '' ? $_POST['horario_Espec_T'] : 0,
                ];

                // echo '<pre>';
                // print_r($RecibeHorario_LV);
                // echo '</pre>';
                // echo '<pre>';
                // print_r($RecibeHorario_Sab);
                // echo '</pre>';
                // echo '<pre>';
                // print_r($RecibeHorario_Dom);
                // echo '</pre>';
                // echo '<pre>';
                // print_r($RecibeHorario_Esp);
                // echo '</pre>';
                // exit;
                
                //Se ELIMINAN el horario de la tienda de lunes a viernes
                $this->ConsultaCuenta_M->eliminarHorarioTienda_LV($this->ID_Tienda);
                //Se INSERTA el horario de la tienda de lunes a viernes
                $this->ConsultaCuenta_M->insertarHorarioTienda_LV($this->ID_Tienda, $RecibeHorario_LV);
                
                //Se ELIMINAN el horario de la tienda del dia sabado
                $this->ConsultaCuenta_M->eliminarHorarioTienda_Sab($this->ID_Tienda);
                //Se INSERTA el horario de la tienda del dia sabado
                $this->ConsultaCuenta_M->insertarHorarioTienda_Sab($this->ID_Tienda, $RecibeHorario_Sab);
                
                //Se ELIMINAN el horario de la tienda del dia domingo
                $this->ConsultaCuenta_M->eliminarHorarioTienda_Dom($this->ID_Tienda);
                //Se INSERTA el horario de la tienda del dia domingo
                $this->ConsultaCuenta_M->insertarHorarioTienda_Dom($this->ID_Tienda, $RecibeHorario_Dom);
                
                //Se ELIMINAN el horario de la tienda del dia especial
                $this->ConsultaCuenta_M->eliminarHorarioTienda_Esp($this->ID_Tienda);
                //Se INSERTA el horario de la tienda del dia especial
                $this->ConsultaCuenta_M->insertarHorarioTienda_Esp($this->ID_Tienda, $RecibeHorario_Esp);

            }
            else{
                echo 'Ingrese el horario de despacho';
                echo '<br>';
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }

            //RECIBE INFORMACION DE PAGOS
            // ********************************************************            
            // echo 'Banco transferencia: ' . $_POST['banco'][0] . '<br>';
            // echo 'Banco PagoMovil: ' . $_POST['bancoPagoMovil'][0] . '<br>';
            // echo '<pre>';
            // print_r($_POST['banco']);
            // echo '</pre>';
            // echo '<pre>';
            // print_r($_POST['bancoPagoMovil']);
            // echo '</pre>';

            //RECIBE TRANSFERENCIAS
            if(($_POST['banco'][0] == '') && ($_POST['bancoPagoMovil'][0] == '') && $_POST['bolivar'] == '' && $_POST['dolar'] == '' && $_POST['acordado'] == ''){
                echo 'Ingrese datos de pagos';
                echo '<br>';
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }
            else{
                //Se ELIMINAN todas las cuentas bancarias
                $this->ConsultaCuenta_M->eliminarCuentaBancaria($this->ID_Tienda);

                if($_POST['banco'][0] != ''){
                    foreach(array_keys($_POST['banco']) as $key){
                        if(!empty($_POST['banco'][$key]) && !empty($_POST['titular'][$key]) && !empty($_POST['numeroCuenta'][$key]) && !empty($_POST['rif'][$key])
                        ){
                            $Banco = $_POST['banco'][$key];
                            $Titular = $_POST['titular'][$key];
                            $NumeroCuenta = $_POST['numeroCuenta'][$key];
                            $Rif = $_POST['rif'][$key];
                            
                            //Se INSERTA la cuenta bancaria
                            $this->ConsultaCuenta_M->insertarCuentaBancaria($this->ID_Tienda, $Banco, $Titular, $NumeroCuenta, $Rif);
                        }
                        else{
                            echo 'Ingrese datos bancarios completos';
                            echo '<br>';
                            echo "<a href='javascript:history.back()'>Regresar</a>";
                            exit();
                        }
                    }
                }
            }
                
            // ******************************************************** 
            //RECIBE PAGOMOVIL 
            // Se ELIMINAN todas las cuentas de pagomovil
            $this->ConsultaCuenta_M->eliminarPagoMovil($this->ID_Tienda);

            // echo $_POST['cedulaPagoMovil'][0] . '<br>';
            // echo $_POST['bancoPagoMovil'][0] . '<br>';
            // echo $_POST['telefonoPagoMovil'][0] . '<br>';
            // exit;

            if($_POST['cedulaPagoMovil'][0] != '' || $_POST['bancoPagoMovil'][0] != '' || $_POST['telefonoPagoMovil'][0] != ""){                                         
                foreach(array_keys($_POST['telefonoPagoMovil']) as $key){
                    if(!empty($_POST['cedulaPagoMovil'][$key]) && !empty($_POST['telefonoPagoMovil'][$key]) && !empty($_POST['bancoPagoMovil'][$key])){
                        $CedulapagoMovil = $_POST['cedulaPagoMovil'][$key];
                        $TelefonopagoMovil = $_POST['telefonoPagoMovil'][$key];
                        $BancopagoMovil = $_POST['bancoPagoMovil'][$key];

                        //Se INSERTA la cuenta de CuentapagoMovil
                        $this->ConsultaCuenta_M->insertarPagoMovil($this->ID_Tienda, $CedulapagoMovil, $BancopagoMovil, $TelefonopagoMovil);
                    }
                    else{
                        echo 'Ingrese datos pagoMovil';
                        echo '<br>';
                        echo "<a href='javascript:history.back()'>Regresar</a>";
                        exit();
                    }
                }
            }
                
            // ******************************************************** 
            //RECIBE RESERVE 
            // Se ELIMINAN todas las cuentas de Reserve
            $this->ConsultaCuenta_M->eliminarReserve($this->ID_Tienda);

            // echo $_POST['usuario_reserve'][0] . '<br>';
            // echo $_POST['telefono_reserve'][0] . '<br>';
            // exit;

            if($_POST['usuario_reserve'][0] != ''|| $_POST['telefono_reserve'][0] != ""){
                foreach(array_keys($_POST['telefono_reserve']) as $key)    :
                    if(!empty($_POST['usuario_reserve'][$key]) && !empty($_POST['telefono_reserve'][$key])){
                        $UsuarioReserve = $_POST['usuario_reserve'][$key];
                        $TelefonoReserve = $_POST['telefono_reserve'][$key];

                        //Se INSERTA la cuenta de Reserve
                        $this->ConsultaCuenta_M->insertarReserve($this->ID_Tienda, $UsuarioReserve, $TelefonoReserve);
                    }
                    else{
                        echo 'Ingrese datos de cuenta Reserve';
                        echo '<br>';
                        echo "<a href='javascript:history.back()'>Regresar</a>";
                        exit();
                    }
                endforeach;
            }

             // ******************************************************** 
            //RECIBE PAYPAL 
            // Se ELIMINAN todas las cuentas de Reserve
            $this->ConsultaCuenta_M->eliminarPaypal($this->ID_Tienda);

            // echo $_POST['correro_paypal'][0] . '<br>';
            // exit;

            if($_POST['correro_paypal'][0] != ''){
                foreach(array_keys($_POST['correro_paypal']) as $key)    :
                    if(!empty($_POST['correro_paypal'][$key])){
                        $CorreoPaypal = $_POST['correro_paypal'][$key];

                        //Se INSERTA la cuenta de Paypal
                        $this->ConsultaCuenta_M->insertarPaypal($this->ID_Tienda, $CorreoPaypal);
                    }
                    else{
                        echo 'Ingrese datos de cuenta Paypal';
                        echo '<br>';
                        echo "<a href='javascript:history.back()'>Regresar</a>";
                        exit();
                    }
                endforeach;
            }

            // ******************************************************** 
           //RECIBE ZELLE 
           // Se ELIMINAN todas las cuentas de Reserve
           $this->ConsultaCuenta_M->eliminarZelle($this->ID_Tienda);

           // echo $_POST['correro_paypal'][0] . '<br>';
           // exit;

           if($_POST['correro_zelle'][0] != ''){
               foreach(array_keys($_POST['correro_zelle']) as $key)    :
                   if(!empty($_POST['correro_zelle'][$key])){
                       $CorreoZelle = $_POST['correro_zelle'][$key];

                       //Se INSERTA la cuenta de Zelle
                       $this->ConsultaCuenta_M->insertarZelle($this->ID_Tienda, $CorreoZelle);
                   }
                   else{
                       echo 'Ingrese datos de cuenta Zelle';
                       echo '<br>';
                       echo "<a href='javascript:history.back()'>Regresar</a>";
                       exit();
                   }
               endforeach;
           }
            
            //RECIBE OTROS MEDIOS DE PAGO
            // ********************************************************
            $PagoBolivar = empty($_POST['bolivar']) ? 0 : 1;
            $PagoDolar = empty($_POST['dolar']) ? 0 : 1; 
            $PagoAcordado = empty($_POST['acordado']) ? 0 : 1;
            // echo $PagoBolivar . '<br>';
            // echo $PagoDolar . '<br>';
            // echo $PagoAcordado . '<br>';

            //Se ELIMINAN todas los medios de pago alternativos que existan
            $this->ConsultaCuenta_M->eliminarOtrosPagos($this->ID_Tienda);
            
            //Se INSERTA los medios de pago alternativos
            $this->ConsultaCuenta_M->insertarOtrosPagos($this->ID_Tienda, $PagoBolivar, $PagoDolar, $PagoAcordado);

            // echo 'Todos los campos estan llenos';
            // exit();

            //RECIBE LINK DE ACCESO
            //Se quitan los espacios en blanco en el nombre de la tienda en caso de existir
            $LinkTienda = str_replace(' ', '', $RecibeDatos['Nombre_com']);
            
            //Se eliminan los acentos del nombre de la tienda
            function eliminar_tildes($LinkTienda){            
                //Ahora reemplazamos las letras
                $LinkTienda = str_replace(
                    array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
                    array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
                    $LinkTienda);            
                $LinkTienda = str_replace(
                    array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
                    array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
                    $LinkTienda);
                $LinkTienda = str_replace(
                    array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
                    array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
                    $LinkTienda);            
                $LinkTienda = str_replace(
                    array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
                    array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
                    $LinkTienda );
                $LinkTienda = str_replace(
                    array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
                    array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
                    $LinkTienda);
                $LinkTienda = str_replace(
                    array('ñ', 'Ñ', 'ç', 'Ç'),
                    array('n', 'N', 'c', 'C'),
                    $LinkTienda);
            
                return $LinkTienda;
            }

            function ConvierteMinuscula($LinkTienda){
                $LinkTienda = strtolower($LinkTienda);
                
                return $LinkTienda;
            }

            //Se llama la función que reemplaza acentos y letra ñ
            $LinkTienda = eliminar_tildes($LinkTienda);
            
            //Se llama la función que convierte aminusculas
            $LinkTienda = ConvierteMinuscula($LinkTienda);

            //Se crea el link de acceso;  
            $LinkAcceso = RUTA_URL .'/' . $LinkTienda;
            // echo $LinkAcceso;
            // exit;

            //Se actualiza el link de acceso directo de una tienda en particular
            $this->ConsultaCuenta_M->actualizarLinkTienda($this->ID_Tienda, $LinkAcceso);

            // **********************************************************************************
            //Todo este procedimiento debe ser por medio de TRANSACCIONES
            // **********************************************************************************
            //Se ELIMINAN todas las categorias que tiene la tienda
            $this->ConsultaCuenta_M->eliminarCategoriaTienda($this->ID_Tienda);
            
            //Se consulta el ID_Categoria de las categorias seleccionadas
            $ID_Categ = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);

            //Se INSERTA la dependenciatransitiva entre la tienda y la categoria a la que pertenece
            $this->ConsultaCuenta_M->insertarDT_CatTie($ID_Categ, $this->ID_Tienda);
            
            //Se INSERTAN las secciones de la tienda, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
            $this->ConsultaCuenta_M->insertarSeccionesTienda($this->ID_Tienda, $Secciones); 
            
            //Se CONSULTA el ID_Seccion de las secciones que tiene la tienda
            $ID_Seccion = $this->ConsultaCuenta_M->consultarTodosID_Seccion($this->ID_Tienda);
            
            //Se INSERTAN la dependencia transitiva entre las secciones y la tienda, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
            $this->ConsultaCuenta_M->insertarDT_TieSec($this->ID_Tienda, $ID_Seccion); 

            //Se ACTUALIZAN los datos personales del responsable de la tienda en la BD y se retorna el ID recien insertado, el registro de la tienda fue creado cuando el afiliado creo la tienda
            $this->ConsultaCuenta_M->actualizarAfiliadoComercial($this->ID_Afiliado, $RecibeDatos);
           
            //Se consulta el ID_Categoria de las categorias seleccionadas
            // $ID_Categoria = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);
            // $ID_Categ = $ID_Categoria->fetchAll(PDO::FETCH_ASSOC);

            // //Se ACTUALIZAN las categorias en las que se encuentra una tienda
            // $this->ConsultaCuenta_M->actualizarCategoriaTienda($this->ID_Tienda, $ID_Categ);

        	header('location:' . RUTA_URL. '/CuentaComerciante_C/Editar');
        }
        
        //Invocado en cuenta_publicar_V.php recibe el formulario para cargar un nuevo producto
        public function recibeProductoPublicar(){
            $verifica_2 = $_SESSION['verifica_2'];  
            if($verifica_2 == 1906){// Anteriormente en se generó la variable $_SESSION["verfica_2"] con un valor de 1906; con esto se evita que no se pueda recarga esta página.
                unset($_SESSION['verifica_2']);//se borra la sesión verifica. 

                //Se reciben todos los campos del formulario, desde cuenta_publicar_V.php se verifica que son enviados por POST y que no estan vacios
                //SECCION DATOS DEL PRODUCTO
                if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['seccion']) && !empty($_POST['producto']) && !empty($_POST['descripcion']) && !empty($_POST['precioBs']) && (!empty($_POST['precioDolar']) || $_POST['precioDolar'] == 0)){
                    $RecibeProducto = [
                        //Recibe datos del producto que se va a cargar al sistema
                        'Producto' => filter_input(INPUT_POST, 'producto', FILTER_SANITIZE_STRING),
                        'Descripcion' => filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING),
                        // 'Descripcion' => preg_replace('[\n|\r|\n\r|\]','',filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING)), //evita los saltos de lineas realizados por el usuario al separar parrafos
                        'PrecioBs' => filter_input(INPUT_POST, "precioBs", FILTER_SANITIZE_STRING),
                        'PrecioDolar' => filter_input(INPUT_POST, "precioDolar", FILTER_SANITIZE_STRING),
                        'Cantidad' => empty($_POST['cantidad']) ? 0 : $_POST['cantidad'],
                        'Producto_Destacado' => empty($_POST['produc_destacado']) ? 0 : 1,
                        'Seccion' => filter_input(INPUT_POST, "seccion", FILTER_SANITIZE_STRING),
                        'ID_Tienda' => filter_input(INPUT_POST, "id_tienda", FILTER_SANITIZE_STRING)
                    ];
                    // echo '<pre>';
                    // print_r($RecibeProducto);
                    // echo '</pre>';
                    // exit;
                }
                else{
                    echo 'Llene todos los campos del formulario ';
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }

                //CARACTERISTICAS
                //********************************************************
                //Si se selecionó alguna nueva caracteristica entra, destaca que se esta recibiendo un array
                if($_POST['caracteristica'][0] != ''){
                    foreach($_POST['caracteristica'] as $Caracteristica){
                        $Caracteristica = $_POST['caracteristica'];
                    }
                    // echo "<pre>";
                    // print_r($Caracteristica);
                    // echo "</pre>";
                    // exit();

                    //El array trae elemenos duplicados, se eliminan los duplicado
                    $caracteristicaProducto = array_unique($Caracteristica);
                }

                //********************************************************
                //Las siguientes consultas se deben realizar por medio de Transacciones BD

                //Se INSERTA el producto en la BD y se retorna el ID recien insertado
                $ID_Producto = $this->ConsultaCuenta_M->insertarProducto($RecibeProducto);

                //Se INSERTA la opcion y precio del producto en la BD y se retorna el ID recien insertado
                $ID_Opcion = $this->ConsultaCuenta_M->insertarOpcionesProducto($RecibeProducto);
                
                //Se INSERTA la informacion de reposicion
                // $this->ConsultaCuenta_M->insertarReposicion($RecibeProducto, $ID_Producto);

                if($_POST['caracteristica'][0] != ''){
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

                //Se ACTUALIZA el campo "publicar_Tien" en la tabla "tiendas", para que la tienda comience a aparecer en el catalogo de tiendas
                $this->ConsultaCuenta_M->actualizarTiendaPublicar($RecibeProducto['ID_Tienda']);

                //IMAGEN PRINCIPAL
                //********************************************************
                //Si se selecionó alguna imagen entra
                if($_FILES['foto_Producto']["name"] != ''){
                    $nombre_imgProducto = $_FILES['foto_Producto']['name'] != '' ? $_FILES['foto_Producto']['name'] : 'imagen.png';
                    $tipo_imgProducto = $_FILES['foto_Producto']['type'] != '' ? $_FILES['foto_Producto']['type'] : 'image/png';
                    $tamanio_imgProducto = $_FILES['foto_Producto']['size'] != '' ?  $_FILES['foto_Producto']['size'] : '28,0 KB';

                    // echo 'Nombre de la imagen = ' . $nombre_imgProducto . '<br>';
                    // echo 'Tipo de archivo = ' .$tipo_imgProducto .  '<br>';
                    // echo 'Tamaño = ' . $tamanio_imgProducto . '<br>';
                    // echo 'Tamaño maximo permitido = 2.000.000' . '<br>';// en bytes
                    // echo 'Ruta del servidor = ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
                    // exit();

                    //Si existe foto_Producto y tiene un tamaño correcto (maximo 2Mb)
                    if(($nombre_imgProducto == !NULL) AND ($tamanio_imgProducto <= 2000000)){
                        //indicamos los formatos que permitimos subir a nuestro servidor
                        if(($tipo_imgProducto == 'image/jpeg')
                            || ($tipo_imgProducto == 'image/jpg') || ($tipo_imgProducto == 'image/png')){

                            //Ruta donde se guardarán las imágenes que subamos la variable superglobal
                            //$_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor
                            
                            //Se crea el directorio donde iran las imagenes de la tienda
                            // Usar en remoto
                            $CarpetaProductos = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/' . $_SESSION['nombre_Tien'] . '/productos';

                            // Usar en local
                            // $CarpetaProductos = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/' . $_SESSION['nombre_Tien'] . '/productos';
                            
                            if(!file_exists($CarpetaProductos)){
                                mkdir($CarpetaProductos, 0777, true);
                            }

                            //Usar en remoto
                            $directorio_2 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/productos/';

                            //usar en local
                            // $directorio_2 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/productos/';                      

                            //Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                            move_uploaded_file($_FILES['foto_Producto']['tmp_name'], $directorio_2.$nombre_imgProducto);

                            //Se INSERTA la imagen principal y devuelve el ID_Imagen
                            $ID_Imagen = $this->ConsultaCuenta_M->insertaImagenPrincipalProducto($ID_Producto, $nombre_imgProducto, $tipo_imgProducto, $tamanio_imgProducto);
                            
                            //Se INSERTA la dependenciatransitiva entre secciones e imagenes
                            // $this->ConsultaCuenta_M->insertarDT_SecImg($ID_Seccion, $ID_Imagen);
                        }
                        else{
                            //si no cumple con el formato
                            echo 'Solo puede cargar imagenes con formato jpg, jpeg o png';
                            echo '<a href="javascript: history.go(-1)">Regresar</a>';
                            exit();
                        }
                    }
                    else{//si se pasa del tamaño permitido
                        echo 'La imagen principal es demasiado grande ';
                        echo '<a href="javascript: history.go(-1)">Regresar</a>';
                        exit();
                    }
                }
                else{//si no se selecciono ninguna imagen principal
                    //Se crea el directorio donde iran las imagenes de la tienda

                    // Usar en remoto
                    $CarpetaProductos = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/' . $_SESSION['nombre_Tien'] . '/productos';

                    // Usar en local
                    // $CarpetaProductos = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/' . $_SESSION['nombre_Tien'] . '/productos';
                    
                    if(!file_exists($CarpetaProductos)){
                        mkdir($CarpetaProductos, 0777, true);
                    }
                }

                //IMAGENES SECUNDARIAS
                //********************************************************
                if($_FILES['imagenes']['name'][0] != ''){
                    $Cantidad = count($_FILES['imagenes']['name']);
                    for($i = 0; $i < $Cantidad; $i++){
                        //nombre original del fichero en la máquina cliente.
                        $archivonombre = $_FILES['imagenes']['name'][$i];
                        $Ruta_Temporal = $_FILES['imagenes']['tmp_name'][$i];
                        $tipo = $_FILES['imagenes']['type'][$i];
                        $tamanio = $_FILES['imagenes']['size'][$i];

                        //Usar en remoto
                        $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/productos/';

                        //usar en local
                        // $directorio_3 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/productos/';

                        //Subimos el fichero al servidor
                        move_uploaded_file($Ruta_Temporal, $directorio_3.$_FILES['imagenes']['name'][$i]);

                        //Se INSERTAN las fotografias secundarias del producto
                        $this->ConsultaCuenta_M->insertarFotografiasSecun($ID_Producto, $archivonombre, $tipo, $tamanio);
                    }
                }
                $this->Productos('Todos');
            }
            else{
                $this->Productos('Todos');
            } 
        }

        //Invocado desde cuenta_editar_prod_V.php actualiza la información de un producto
        public function recibeAtualizarProducto(){
            //Se reciben todos los campos del formulario, se verifica que son enviados por POST y que no estan vacios
            if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['seccion']) && !empty($_POST['producto']) && !empty($_POST['descripcion']) && !empty($_POST['precioBolivar']) && (!empty($_POST['precioDolar']) || $_POST['precioDolar'] == 0)){
            // {&& !empty($_POST['fecha_dotacion']) && !empty($_POST['incremento']) && !empty($_POST['fecha_reposicion'])

                $RecibeProducto = [
                    //Recibe datos del producto a actualizar
                    'ID_Tienda' => filter_input(INPUT_POST, 'id_tienda', FILTER_SANITIZE_STRING),
                    'Seccion' => filter_input(INPUT_POST, 'seccion', FILTER_SANITIZE_STRING),
                    'ID_Seccion' => filter_input(INPUT_POST, 'id_seccion', FILTER_SANITIZE_STRING),
                    'ID_SP' => filter_input(INPUT_POST, 'id_sp', FILTER_SANITIZE_STRING),
                    'Producto' => preg_replace('[\n|\r|\n\r]','',filter_input(INPUT_POST, 'producto', FILTER_SANITIZE_STRING)), //evita los saltos de lineas realizados por el usuario al separar parrafos
                    'Descripcion' => preg_replace('[\n|\r|\n\r]','',filter_input(INPUT_POST, 'descripcion', FILTER_SANITIZE_STRING)), //evita los saltos de lineas realizados por el usuario al separar parrafos
                    'PrecioBolivar' => filter_input(INPUT_POST, 'precioBolivar', FILTER_SANITIZE_STRING),
                    'PrecioDolar' => filter_input(INPUT_POST, 'precioDolar', FILTER_SANITIZE_STRING),
                    'Cantidad' => empty($_POST['uni_existencia']) ? 0 : $_POST['uni_existencia'],
                    'ID_Producto' => filter_input(INPUT_POST, 'id_producto', FILTER_SANITIZE_STRING),
                    'ID_Opcion' => filter_input(INPUT_POST, 'id_opcion', FILTER_SANITIZE_STRING),
                    'Puntero' => filter_input(INPUT_POST, 'puntero', FILTER_SANITIZE_STRING),
                    'ID_Imagen' => filter_input(INPUT_POST, 'id_imagen', FILTER_SANITIZE_STRING),
                    'producto_destacado' => empty($_POST['pro_destacado']) ? 0 : 1
                    // 'FechaDotacion' => $_POST['fecha_dotacion'],
                    // 'Incremento' => $_POST['incremento'],
                    // 'FechaReposicion' => $_POST['fecha_reposicion']
                ];
                // echo '<pre>';
                // print_r($RecibeProducto);
                // echo '</pre>';
                // exit();
            }
            else{
                echo 'Llene todos los campos obligatorios' . '<br>';
                echo '<a href="javascript: history.go(-1)">Regresar</a>';
                exit();
            }

            //IMAGEN PRINCIPAL
            // ********************************************************
            // Si se selecionó alguna nueva imagen
            if($_FILES['imagenPrinci_Editar']["name"] != ''){
                $nombre_imgProducto = $_FILES['imagenPrinci_Editar']['name'];
                $tipo = $_FILES['imagenPrinci_Editar']['type'];
                $tamanio = $_FILES['imagenPrinci_Editar']['size'];

                // echo "Nombre de la imagen = " . $nombre_imgProducto . "<br>";
                // echo "Tipo de archivo = " . $tipo .  "<br>";
                // echo "Tamaño = " . $tamanio . "<br>";
                // echo "Tamaño maximo permitido = 2.000.000" . "<br>";// en bytes
                // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br><br>";
                // exit;

                //Si existe imagenPrinci_Editar y tiene un tamaño correcto
                if(($nombre_imgProducto == !NULL) AND ($tamanio <= 2000000)){
                    //indicamos los formatos que permitimos subir a nuestro servidor
                    if (($_FILES["imagenPrinci_Editar"]["type"] == "image/jpeg")
                        || ($_FILES["imagenPrinci_Editar"]["type"] == "image/jpg") || ($_FILES["imagenPrinci_Editar"]["type"] == "image/png")){

                        // Ruta donde se guardarán las imágenes que subamos la variable superglobal
                        // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                        //Usar en remoto
                        $directorio_4 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/productos/';

                        //usar en local
                        // $directorio_4 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/productos/';

                        //se muestra el directorio temporal donde se guarda el archivo
                        //echo $_FILES['imagen']['tmp_name'];
                        // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                        move_uploaded_file($_FILES['imagenPrinci_Editar']['tmp_name'], $directorio_4.$nombre_imgProducto);
                    }
                    else{
                        //si no cumple con el formato
                        echo 'Solo puede cargar imagenes con formato jpg, jpeg o png' . '<br>';
                        echo '<a href="javascript: history.go(-1)">Regresar</a>';
                        exit();
                    }
                }
                else{
                //si existe imagenPrinci_Editar pero se pasa del tamaño permitido
                    if($nombre_imgProducto == !NULL){
                        echo 'La imagen es demasiado grande.' . '<br>';
                        echo '<a href="javascript:history.back()">Regresar</a>';
                        exit();
                    }
                }
            }
            // else{
            //     echo 'No seleciono imagen principal' . '<br>';
            // }

            //IMAGENES SECUNDARIAS
            // ********************************************************
            //Se verifican cuantas imagenes se estan recibiendo, incluyendo las que ya existen en la BD
            if(isset($_FILES["imagen_EditarVarias"]["name"])) :
                $Cantidad = count($_FILES["imagen_EditarVarias"]["name"]);
                // echo 'Imagenes recibidas= ' . $Cantidad . '<br>';

                //Bucle que inserta las imagenes secundarias en la BD, cada vuelta inserta una imagen
                for($i = 0; $i < $Cantidad ; $i++) :
                    //Las imagenes que existian en la BD se reciben sin su nombre por lo que no van a entrar en bucle, solo las imagenes que vienen por medio del input de agregar imagen son las que entran en el bucle
                    if($_FILES['imagen_EditarVarias']['name'][$i] != ''){
                        $nombre_imgVarias = $_FILES['imagen_EditarVarias']['name'][$i];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
                        $tipo_imgVarias = $_FILES['imagen_EditarVarias']['type'][$i];
                        $tamanio_imgVarias = $_FILES['imagen_EditarVarias']['size'][$i];

                        // echo "Nombre de imagen secundaria= " . $nombre_imgVarias . '<br>';
                        // echo "Tipo de archivo = " .$tipo_imgVarias .  "<br>";
                        // echo "Tamaño = " . $tamanio_imgVarias . "<br>";
                        // echo "Tamaño maximo permitido = 2.000.000" . "<br>";// en bytes
                        // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br><br>";

                        //Se verifica que tenga un formato y tamaño correcto
                        if(($nombre_imgVarias == !NULL) AND ($tamanio_imgVarias <= 2000000)){
                            //indicamos los formatos que permitimos subir a nuestro servidor
                            if(($_FILES["imagen_EditarVarias"]["type"][$i] == "image/jpeg")
                                || ($_FILES["imagen_EditarVarias"]["type"][$i] == "image/jpg") || ($_FILES["imagen_EditarVarias"]["type"][$i] == "image/png")){

                                // Ruta donde se guardarán las imágenes que subamos la variable superglobal
                                // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                                //Usar en remoto
                                $directorio_5 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/productos/';

                                //usar en local
                                // $directorio_5 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/productos/';

                                //se muestra el directorio temporal donde se guarda el archivo
                                //echo $_FILES['imagen']['tmp_name'];
                                
                                // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                                move_uploaded_file($_FILES['imagen_EditarVarias']['tmp_name'][$i], $directorio_5.$nombre_imgVarias);

                                //Para actualizar fotografias varias solo si se ha presionado el boton de buscar fotografia; en realidad no se actualizan, simplemente se insertan las que se reciben del formulario

                                //Se consulta la cantidad de imagenes que tiene el producto en BD
                                $CantidadImagenes = $this->ConsultaCuenta_M->consultarCantidadImagenes($RecibeProducto['ID_Producto']);
                                // echo 'Cantidad de imagenes en BD= ' . $CantidadImagenes[0]['CantidadFotos'] . '<br>';
                                // exit;

                                $ImagenesRecibidas = $CantidadImagenes[0]['CantidadFotos'];
                                // echo 'Cantidad de imagenes secundarias a isertar en BD= ' .  $ImagenesRecibidas . '<br>';
                                // exit;

                                if($ImagenesRecibidas < 5){
                                    //Se INSERTAN las fotografias secundarias del producto
                                    $this->ConsultaCuenta_M->insertarFotografiasSecun($RecibeProducto['ID_Producto'], $nombre_imgVarias, $tipo_imgVarias, $tamanio_imgVarias,$RecibeProducto['ID_Seccion']);
                                    // echo 'Imagen insertada existosamente' . '<br>';
                                }
                                else{
                                    echo 'Solo puede cargar cuatro imagenes adicionales' . '<br>';
                                    echo '<a href="javascript:history.back()">Regresar</a>';
                                    exit();
                                }
                            }
                            else{
                                echo 'La imagen no tiene el formato correcto' . '<br>';
                                echo '<a href="javascript:history.back()">Regresar</a>';
                                exit();
                            }
                        }
                        else{
                            echo 'Una imagen es demasiado grande' . '<br>';
                            echo '<a href="javascript:history.back()">Regresar</a>';
                            exit();
                        }
                    }
                    // echo '<br>';
                endfor;            
            endif;
            
            // exit;
            //CARACTERISTICAS
            // ********************************************************
            // Recibe las caracteristicas del producto
            if($_POST['caracteristica'][0] != ''){
                // echo 'Se recibieron caracteristicas';
                foreach($_POST['caracteristica'] as $Caracteristica){
                    $Caracteristica = $_POST['caracteristica'];
                }
                
                //Se eliminan los elementos repetido que se reciben en caracteristicas
                $CaracteristicaSinDuplicado = array_unique($Caracteristica);

                $this->ConsultaCuenta_M->insertarCaracteristicasProducto($RecibeProducto, $RecibeProducto ['ID_Producto'], $CaracteristicaSinDuplicado);
            }
            // else{
            //     echo 'No se recibieron caracteristicas';
            // }

            // echo "<pre>";
            // print_r($CaracteristicaSinDuplicado);
            // echo "</pre>";
            // exit();

            // ********************************************************
            //Estas seis sentencias de actualización deben realizarce por medio de transsacciones
            $this->ConsultaCuenta_M->actualizarOpcion($RecibeProducto);
            $this->ConsultaCuenta_M->actualizarProducto($RecibeProducto);
            $this->ConsultaCuenta_M->actualizacionSeccion($RecibeProducto);
            // $this->ConsultaCuenta_M->actualizacionReposicion($RecibeProducto);
            // Se eliminan las caracteristicas existentes de un producto especifica
            $this->ConsultaCuenta_M->eliminarCaracteristicas($RecibeProducto['ID_Producto'],);

            //Para actualizar fotografia principal solo si se ha presionado el boton de buscar fotografia
            if(($_FILES['imagenPrinci_Editar']['name']) != ""){
                //Se ACTUALIZA la fotografia principal del producto
                $this->ConsultaCuenta_M->actualizarImagenPrincipalProducto($RecibeProducto['ID_Producto'], $nombre_imgProducto);
                
                //Se ACTUALIZA la dependenciatransitiva entre secciones e imagenes
                // $this->ConsultaCuenta_M->actualizarDT_SecImg($RecibeProducto['ID_Seccion'], $RecibeProducto['ID_Imagen']);   actualizarImagenSeccionDeseleccionar
            }

            //Para establecer como producto destacado  
            if($RecibeProducto['producto_destacado'] == '1'){
                //Se consultan cuantos productos estan seleccionadas como destacadas (solo pueden ser nueve productos)
                $productos_destacados = $this->ConsultaCuenta_M->consultarPoductosDestacados($RecibeProducto);
            
                // echo "<pre>";
                // print_r($productos_destacados);
                // echo "</pre>";
                // exit();
                
                foreach($productos_destacados as $value) :
                    settype($value, 'integer');
                endforeach;
                
                if($value < 9){
                    //Se seleciona la imagen que esta establecida actualmente
                    $this->ConsultaCuenta_M->actualizarProductoDestacadoOn($RecibeProducto);
                }
                else{
                    echo 'Ha alcanzado máximo de productos a destacar, recuerde son solo nueve productos' . '<br>';
                    echo '<a href="javascript:history.back()">Regresar</a>';
                    exit();
                }
            }
            else if(empty($RecibeProducto['producto_destacado'])){
                //Se deseleciona de los productos destacados            
                $this->ConsultaCuenta_M->actualizarProductoDestacadoOff($RecibeProducto);
            }
            
            //Se envia la sección donde esta el producto actualizado para redireccionar a esa sección
            $Seccion = $RecibeProducto['Seccion'];

            //Se envia el puntero hacia el producto que se actualizó
            // $Puntero = $RecibeProducto['Puntero']; //$Puntero se refiere al producto a donde se va a colocar el foco

            //$Seccion y $Puntero Se deben convertir en cadena porque el controlador Productos recibe una cadena de datos agrupados separados por coma
            // $Seccion_Puntero = $Seccion . ',' . $Puntero;

            $this->Productos($Seccion);
        }

        //Invocado desde cuenta_productos_V.php
        public function eliminarProducto($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Opcion, ID_Producto y la sección separados por coma, se convierte en array para separar los elementos
            // echo $DatosAgrupados;
            // exit();

            $DatosAgrupados = explode(',', $DatosAgrupados);

            $ID_Producto = $DatosAgrupados[0];
            $ID_Opcion = $DatosAgrupados[1];
            $Seccion = $DatosAgrupados[2];

            // *************************************************************************************
            //La siguientes cinco consultas entran en el procedimeinto para ELIMINAR un producto de una tienda, esto debe hacerse mediante transacciones
            // *************************************************************************************
            // *************************************************************************************

            //Se consulta el nombre de la imagen principal y las imagenes secundaria del producto
            $ImagenesEliminar = $this->ConsultaCuenta_M->consultarImagenesEliminar($ID_Producto);
            // echo '<pre>';
            // print_r($ImagenesEliminar);
            // echo '</pre>';
            // exit;

            $this->ConsultaCuenta_M->eliminarProductoSeccion($ID_Producto);
            $this->ConsultaCuenta_M->eliminarProductoOpcion($ID_Producto);
            $this->ConsultaCuenta_M->eliminarOpcionSeccion($ID_Opcion);
            $this->ConsultaCuenta_M->eliminarImagenPrincipal($ID_Producto);
            $this->ConsultaCuenta_M->eliminarFechaReposicion($ID_Producto);
            $this->ConsultaCuenta_M->eliminarProducto($ID_Producto);
            $this->ConsultaCuenta_M->eliminarOpcion($ID_Opcion);
            
            //Se eliminan los archivo de la carpeta public/images/productos
            foreach($ImagenesEliminar as $KeyImagenes)  :
                $NombreImagenEliminar = $KeyImagenes['nombre_img'];

                //Usar en remoto
                unlink($_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/productos/' . $NombreImagenEliminar);
                    
                //usar en local
                // unlink($_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/productos/' . $NombreImagenEliminar);
            endforeach;
              
            // *************************************************************************************
            // *************************************************************************************

            //Se CONSULTA si existen productos en la tienda, de no haber se cambia el valor de publicar en la tabla tiendas
            $cantidadProductos = $this->ConsultaCuenta_M->consultarCantidadProductos($this->ID_Tienda);
            // echo $cantidadProductos[0]['cantidadProductos'];
            if($cantidadProductos[0]['cantidadProductos'] == 0){
                $this->ConsultaCuenta_M->actualizarPublicarTienda($this->ID_Tienda);
            }

            //Se redirecciona a la vista donde se encontraba el producto eliminado
            $this->Productos($Seccion);
            // $this->vista('view/cuenta_comerciante/cuenta_productos_V', $Datos);
        }

        //Invocado desde A_Cuenta_editar_prod.js por medio de Llamar_EliminarImagenSecundaria()
        public function eliminarImagen($ID_Imagen, $ID_Producto){
            //Elimina la imagen selecciona
            $this->ConsultaCuenta_M->eliminarImagenProducto($ID_Imagen);

            //Consulta de cuantas imagenes secundarias tiene un producto
            $TotalImagenes = $this->ConsultaCuenta_M->consultarCantidadImagenProducto($ID_Producto);
            $Datos = ($TotalImagenes[0]['cantidad']);
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista('header/BotonImagen_Ajax_V', $Datos);
        }
        
        //Invocado desde A_Cuenta_editar.js.php por medio de la funcion Llamar_EliminarSeccion()
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
        
        //Invocado desde cuenta_editar_V.php - A_Cuenta_editar.js
        public function ActualizarSeccion($Seccion, $ID_Seccion){
            //Se ACTUALIZA una seccion 
            $this->ConsultaCuenta_M->ActualizarSeccion($Seccion, $ID_Seccion);

            //Se redirecciona a la vista de configuración para dejar al usuario donde estaba
            $this->Editar();
        }

        //Invocado en cuenta_editar_V.php autoriza si la tienda se suspende o se publica en el catalogo de tiendas
        // public function publicarTienda(){            
        //     $Consulta = $this->ConsultaCuenta_M->consultaPermisoPublicar($this->ID_Tienda);
        //     // echo '<pre>';
        //     // print_r($Consulta);
        //     // echo '</pre>';
        //     if($Consulta[0]['publicar'] == 0){
        //         echo 'Es necesario configurar la totalidad de la tienda';  
        //     }
        // }

        //Invocado desde E_Cuenta_Productos.js
        public function EstablecerImageSeccion($ID_Seccion){

            $Datos = $ID_Seccion;
            // echo $Datos;
            // exit;

            $this->vista('header/header_Modal'); 
            $this->vista('modal/modal_establecerImageSeccion_V', $Datos);
        }

        //Invocado desde .php actualiza la imagen de un producto
        public function recibeImagenSeccion(){
            $nombre_imgSeccion = $_FILES['img_Seccion']['name'] != '' ? $_FILES['img_Seccion']['name'] : 'imagen.png';
            $tipo_imgSeccion = $_FILES['img_Seccion']['type'] != '' ? $_FILES['img_Seccion']['type'] : 'image/png';
            $tamanio_imgSeccion = $_FILES['img_Seccion']['size'] != '' ?  $_FILES['img_Seccion']['size'] : '20,0 KB';
            $ID_Seccion = $_POST['id_seccion'];

            // echo 'Nombre de la imagen = ' . $nombre_imgSeccion . '<br>';
            // echo 'Tipo de archivo = ' .$tipo_imgSeccion .  '<br>';
            // echo 'Tamaño = ' . $tamanio_imgSeccion . '<br>';
            // echo 'Tamaño maximo permitido = 2.000.000' . '<br>';// en bytes
            // echo 'ID_Seccion = ' . $ID_Seccion;
            // exit();

            //Si existe img_Seccion y tiene un tamaño correcto (maximo 2Mb)
            if(($nombre_imgSeccion == !NULL) AND ($tamanio_imgSeccion <= 2000000)){
                //indicamos los formatos que permitimos subir a nuestro servidor
                if(($tipo_imgSeccion == 'image/jpeg')
                    || ($tipo_imgSeccion == 'image/jpg') || ($tipo_imgSeccion == 'image/png')){

                    //Se crea el directorio donde iran las imagenes de la tienda
                    // Usar en remoto                    
                    $CarpetaSecciones = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/' . $_SESSION['nombre_Tien'] . '/secciones';

                    // Usar en local
                    // $CarpetaSecciones = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/' . $_SESSION['nombre_Tien'] . '/secciones';
                    
                    if(!file_exists($CarpetaSecciones)){
                        mkdir($CarpetaSecciones, 0777, true);
                    }

                    //Usar en remoto
                    $directorio_6 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/secciones/';

                    //usar en local
                    // $directorio_6 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/tiendas/'. $_SESSION['nombre_Tien'] . '/secciones/';
                    
                    //Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                    move_uploaded_file($_FILES['img_Seccion']['tmp_name'], $directorio_6.$nombre_imgSeccion);

                    //Se INSERTA la imagen de la seccion
                    $this->ConsultaCuenta_M->actualizaImagenSeccion($ID_Seccion, $nombre_imgSeccion, $tipo_imgSeccion, $tamanio_imgSeccion);
                }
                else{
                    //si no cumple con el formato
                    echo 'Solo puede cargar imagenes con formato jpg, jpeg o png';
                    echo '<a href="javascript: history.go(-1)">Regresar</a>';
                    exit();
                }
            }
            else{//si se pasa del tamaño permitido
                echo 'La imagen principal es demasiado grande ';
                echo '<a href="javascript: history.go(-1)">Regresar</a>';
                exit();
            }

             //Para actualizar fotografia de seccion solo si se ha presionado el boton de buscar fotografia
            //  if(($_FILES['imagenPrinci_Editar']['name']) != ""){
            //     //Se ACTUALIZA la fotografia principal del producto
            //     $this->ConsultaCuenta_M->actualizarImagenPrincipalProducto($RecibeProducto['ID_Producto'], $nombre_imgProducto);
                
                //Se ACTUALIZA la dependenciatransitiva entre secciones e imagenes
                // $this->ConsultaCuenta_M->actualizarDT_SecImg($RecibeProducto['ID_Seccion'], $RecibeProducto['ID_Imagen']);
            // }
            
            echo '<script>window.close();</script>';
        }
    }
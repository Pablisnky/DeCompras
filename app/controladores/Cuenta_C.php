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

        //Invocado desde login_C/ValidarSesion, muestra todos los productos publicados o los de una sección en especifico
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
                
                //CONSULTA las caracteristicas de los productos de una sección de una tienda
                $Consulta = $this->ConsultaCuenta_M->consultarCaracterisicasProducto($this->ID_Tienda);
                $Caracteristicas = $Consulta->fetchAll(PDO::FETCH_ASSOC); 
                
                //Se desglosa el valor para que sea solo igual el valor "1"
                $Notificacion = $Notificacion[0]['notificacion'];
               
                //ACTUALIZA el estatus de la notificacion de una tienda con el valor = 1
                $this->ConsultaCuenta_M->actualizarStatusTienda($this->ID_Tienda);
                
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
                'slogan' => $Slogan,
                'variosCaracteristicas' => $Caracteristicas
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

        //Invocado desde cuenta_productos_V.php
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
            
            //Se CONSULTAN las caracteristicas añadidas del producto
            $Consulta = $this->ConsultaCuenta_M->consultarCaracteristicasProducto($this->ID_Tienda, $ID_Producto);
            $Caracteristicas = $Consulta->fetchAll(PDO::FETCH_ASSOC);
            
            $Datos = [
                'secciones' => $Secciones, //Usado en header_AfiCom.php
                'especificaciones' => $Especificaciones, //ID_Producto, ID_Opcion, fotografia, producto, opcion, precio, seccion, ID_Seccion, ID_SP
                'puntero' => $Opcion,
                'slogan' => $Slogan,
                'caracteristicas' => $Caracteristicas //ID_Caracteristica, caracteristica 
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
                } 
                else{
                    //si no cumple con el formato
                    echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
                    echo "<br>";
                    echo "<a href='javascript:history.back()'>Regresar</a>";
                    exit();
                }
            } 
            else{
                //si existe imagen_Tienda pero se pasa del tamaño permitido
                if($nombre_imgTienda == !NULL){
                    echo "La imagen es demasiado grande "; 
                    echo "<br>";
                    echo "<a href='javascript:history.back()'>Regresar</a>";
                    exit();
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
                echo "Secciones recibidas";
                echo "<pre>";
                print_r($Seccion);
                echo "</pre>";
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
                // ***************************************print_r*******************************************
                //Se ELIMINAN todas las categorias que tiene la tienda
                $this->ConsultaCuenta_M->eliminarCategoriaTienda($this->ID_Tienda);
                
                //Se consulta el ID_Categoria de las categorias seleccionadas
                $ID_Categoria = $this->ConsultaCuenta_M->consultarID_Categoria($Categoria);
                $ID_Categ = $ID_Categoria->fetchAll(PDO::FETCH_ASSOC); 

                //Se INSERTA la dependenciatransitiva entre la tienda y la categoria a la que pertenece
                $this->ConsultaCuenta_M->insertarDT_CatTie($ID_Categ, $this->ID_Tienda);
                
                //Se consultan las secciones de la tienda
                $Consulta_3 = $this->ConsultaCuenta_M-> consultarSeccionesTienda($this->ID_Tienda);
                $SeccionesExistentes = $Consulta_3->fetchAll(PDO::FETCH_ASSOC); 
                // echo "<pre>";
                // print_r($SeccionesExistentes);
                // echo "</pre>";

                //Se recorre el resultado de la consulta y solo se toma el valor sección del array $SeccionesExistentes y estos valores se guardan en un nuevo arrray
                $Seccion_3 = array();
                foreach($SeccionesExistentes as $arr) :
                    $Secciones_4 = $arr['seccion']   . "<br>";
                    array_push($Seccion_3, $Secciones_4);
                endforeach;
                echo "Secciones existentes";
                echo "<pre>";
                print_r($Seccion_3);
                echo "</pre>";

                //Se comparan las secciones recibidas con las existentes y se manda a insertar las que no existan
                $result = array_diff_key($Seccion, $Seccion_3);
                echo "Secciones a insertar";
                echo "<pre>";
                print_r($result);
                echo "</pre>";
                //Se INSERTAN las secciones de la tienda, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
                $this->ConsultaCuenta_M->insertarSeccionesTienda($this->ID_Tienda, $result);

                //Si no hay secciones para añadir se elimnan las seccions que no se recibieron del formulario, es decir, las que el usuario quito del formulario
                if(empty($result)){            
                    $SinEliminarSeccion = array_intersect_key($Seccion, $Seccion_3);
                    echo "secciones a no eliminar";
                    echo "<pre>";
                    print_r($SinEliminarSeccion);
                    echo "</pre>";

                    //Se consulta el ID_Seccion de las secciones de la tienda que no se van a eliminar
                    $ID_SeccionNoEliminar = $this->ConsultaCuenta_M->consultarID_SecionesNoEliminar($SinEliminarSeccion);
                    $ID_SeccionNoEliminar = $ID_SeccionNoEliminar->fetchAll(PDO::FETCH_ASSOC); 
                    // echo "<pre>";
                    // print_r($ID_SeccionNoEliminar);
                    // echo "</pre>";

                    //Se elimina la Dependencia Transitiva entre tiendas y secciones
                    // $this->ConsultaCuenta_M->eliminarDT_Tienda_Secciones($this->ID_Tienda, $ID_SeccionNoEliminar); 

                    // //Se elimina las secciones
                    // $this->ConsultaCuenta_M->eliminarSeccionesTienda($this->ID_Tienda, $SinEliminarSeccion);                
                }

                //Se CONSULTA el ID_Seccion de las secciones que tiene la tienda
                $ID_Seccion = $this->ConsultaCuenta_M->consultarTodosID_Seccion($this->ID_Tienda);

                //Se INSERTAN la dependencia transitiva entre las secciones y la tienda, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
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

        //Invocado desde cuenta_publicar_V.php recibe el formulario de cargar un nuevo producto
        public function recibeProducto(){
            // Se reciben todos los campos del formulario, desde cuenta_publicar_V.php se verifica que son enviados por POST y que no estan vacios
            // if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["seccion"]) && !empty($_POST["producto"]) && !empty($_POST["descripcion"]) && !empty($_POST["precio"])
            // ){

                $RecibeProducto = [
                    //Recibe datos del producto que se va a cargar al sistema
                    'Producto' => filter_input(INPUT_POST, "producto", FILTER_SANITIZE_STRING),
                    'Descripcion' => filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING),
                    'Precio' => filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING),
                    'Seccion' => filter_input(INPUT_POST, "seccion", FILTER_SANITIZE_STRING),
                    'ID_Tienda' => filter_input(INPUT_POST, "id_tienda", FILTER_SANITIZE_STRING),
                ];
            //     // echo "<pre>";
            //     // print_r($RecibeProducto);
            //     // echo "</pre>";
            // // }
            // // else{
            // //     echo "Llene todos los campos del formulario ";
            // //     echo "<a href='javascript: history.go(-1)'>Regresar</a>";
            // //     exit();
            // // }
            
            // // ********************************************************
            // //Recibe las caracteristicas añadidas dinamicamente 
            // if(!empty($_POST['caracteristica'])){
            //     foreach($_POST['caracteristica'] as $Caracteristica){
            //         $Caracteristica = $_POST['caracteristica'];
            //     } 
            //     // echo "<pre>";
            //     // print_r($Caracteristica);
            //     // echo "</pre>";
            //     // exit();
            //     //El array trae elemenos duplicados, se eliminan los duplicado
            //     // $caracteristicaProducto = array_unique($caracteristica); 
            // } 
            // else{
            //     echo "Tiene campos de caracteristicas sin llenar";
            //     exit();
            // }
           
            // // ********************************************************
            // // Las siguientes consultas se deben realizar por medio de Transacciones BD
            //Se INSERTA el producto en la BD y se retorna el ID recien insertado
            $ID_Producto = $this->ConsultaCuenta_M->insertarProducto($RecibeProducto);
            
            // //Se INSERTA la opcion y precio del producto en la BD y se retorna el ID recien insertado
            // $ID_Opcion = $this->ConsultaCuenta_M->insertarOpcionesProducto($RecibeProducto);
            
            // //Se INSERTAN las caracteristicas del producto
            // $this->ConsultaCuenta_M->insertarCaracteristicasProducto($RecibeProducto, $ID_Producto, $ID_Opcion, $Caracteristica);

            // //Se CONSULTA el ID_Seccion de la seccion del producto
            // $Consulta = $this->ConsultaCuenta_M->consultarID_Seccion($RecibeProducto);
            // $ID_Seccion = $Consulta->fetchAll(PDO::FETCH_ASSOC);
        
            // //Se INSERTA la dependenciatransitiva entre  producto, opciones
            // $this->ConsultaCuenta_M->insertarDT_ProOpc($ID_Producto, $ID_Opcion);
            
            // //Se INSERTA la dependenciatransitiva entre secciones y las opciones (en los casos que no hay especificidad de producto)            
            // $this->ConsultaCuenta_M->insertarDT_SecOpc($ID_Seccion, $ID_Opcion);

            // //Se INSERTA la dependenciatransitiva entre secciones y los productos
            // $this->ConsultaCuenta_M->insertarDT_SecPro($ID_Seccion, $ID_Producto);

            //SECCION FOTOGRAFIA INDIVIDUAL
            // $nombre_imgProducto = $_FILES['foto_Producto']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
            // $tipo = $_FILES['foto_Producto']['type'];
            // $tamaño = $_FILES['foto_Producto']['size'];
            
            // // echo "Nombre de la imagen = " . $nombre_imgProducto . "<br>";
            // // echo "Tipo de archivo = " .$tipo .  "<br>";
            // // echo "Tamaño = " . $tamaño . "<br>";
            // // echo "Tamaño maximo permitido = 7.000.000" . "<br>";// en bytes
            // // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br>";

            // //Si existe foto_Producto y tiene un tamaño correcto 
            // if(($nombre_imgProducto == !NULL) AND ($tamaño <= 7000000)){
            //     //indicamos los formatos que permitimos subir a nuestro servidor
            //     if (($_FILES["foto_Producto"]["type"] == "image/jpeg")
            //         || ($_FILES["foto_Producto"]["type"] == "image/jpg") || ($_FILES["foto_Producto"]["type"] == "image/png")){
                    
            //         // Ruta donde se guardarán las imágenes que subamos la variable superglobal 
            //         //usar en remoto
            //         // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

            //         //Usar en remoto
            //         // $directorio = $_SERVER['DOCUMENT_ROOT'] . '/Reavivados/images/usuarios/'; 
            //         // echo $_SERVER['DOCUMENT_ROOT'] . 'Versus_20_2/images/usuarios/';

            //         //usar en local
            //         $directorio = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/productos/';

            //         //se muestra el directorio temporal donde se guarda el archivo
            //         //echo $_FILES['imagen']['tmp_name'];

            //         // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
            //         move_uploaded_file($_FILES['foto_Producto']['tmp_name'], $directorio.$nombre_imgProducto);

            //         //Se ACTUALIZA la imagen (No se inserta porque ya en la sentencia de este controlador insertarDescripcionProducto() se insertaron los detalles del producto)
            //         $this->ConsultaCuenta_M->actualizarFotoProducto($ID_Opcion, $nombre_imgProducto); 
            //     } 
            //     else{
            //         //si no cumple con el formato
            //         echo "Solo puede cargar imagenes con formato jpg, jpeg o png";
            //         // echo "<a href='../tarjeta/perfil_ingeniero.php'>Regresar</a>";
            //         exit();
            //     }
            // } 
            // else{
            // //si existe foto_Producto pero se pasa del tamaño permitido
            // if($nombre_imgProducto == !NULL){
            //         echo "La imagen es demasiado grande "; 
            //         // echo "<a href='perfil.php'>Regresar</a>";
            //         exit();
            //     }
            // }
            
            //SECCION GALERIA DE FOTOGRAFIAS
            if(isset($_FILES['imagenes']["name"][0])){  
                $Cantidad = count($_FILES["imagenes"]["name"]); 
                echo $Cantidad;
                for($i = 0; $i < $Cantidad; $i++){                
                    //nombre original del fichero en la máquina cliente. 
                    $archivonombre = $_FILES['imagenes']['name'][$i];
                    $Ruta_Temporal = $_FILES['imagenes']['tmp_name'][$i];
                    $tipo = $_FILES['imagenes']['type'][$i];
                    $tamanio = $_FILES['imagenes']['size'][$i];
                    
                    $carpeta = $_SERVER['DOCUMENT_ROOT'].'/proyectos/PidoRapido/public/images/productos/';
                    
                    //Subimos el fichero al servidor
                    move_uploaded_file($Ruta_Temporal,$carpeta.$_FILES["imagenes"]["name"][$i]);
                    
                    //Se INSERTAN las fotografias del producto
                    $this->ConsultaCuenta_M->insertarFotografiasAdicionales($ID_Producto, $archivonombre, $tipo, $tamanio);
                    $validar=true;
                }
                $validar=false;
            }
            exit();

                //Declaramos el nombre de la carpeta que guardara los archivos
                // En local
                $carpeta = $_SERVER['DOCUMENT_ROOT'].'/proyectos/PidoRapido/public/images/productos/';

                // En remoto
                // $carpeta = $_SERVER['DOCUMENT_ROOT'] . '/images/';
                // if(!file_exists($carpeta)){
                // mkdir($carpeta, 0777) or die("Hubo un error al crear el directorio de almacenamiento");
                // }

                // // $dir=opendir($carpeta);
                // $target_path = $carpeta . $archivonombre; //indicamos la ruta de destino de los archivos
                // // echo $target_path . "<br>"; 

                // if(move_uploaded_file($tmp_name, $target_path)){
                //     // echo "El archivo $archivonombre se ha cargado de forma    correcta" . "<br><br>";
                // }
                // closedir($dir); //Cerramos la conexion con la carpeta destino
                
                //Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                // move_uploaded_file($_FILES['imgAdicional']['tmp_name'], $carpeta.$archivonombre);
                
                //Se INSERTAN las fotografias del producto
                $this->ConsultaCuenta_M->insertarFotografiasAdicionales($ID_Producto, $archivonombre, $tipo, $tamanio);
            $this->Publicar();
        }
                
        //Metodo invocada desde cuenta_editar_prod_V.php
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
                // print_r($RecibeProducto );
                // echo "</pre>";
                // exit();
                
                // ********************************************************
                //Recibe las caracteristicas del producto
                // if(!empty($_POST['caracteristica'])){
                //     foreach($_POST['caracteristica'] as $Caracteristica){
                //         $ID_Caracteristica = $_POST['id_caracteristica']; 
                //         $Caracteristica = $_POST['caracteristica']; 
                //     } 
                // } 
                // else{
                //     echo "Ingrese al menos una categoría";
                //     exit();
                // }            
                // echo "<pre>";
                // print_r($Caracteristica);
                // echo "</pre>";
                // exit();

                // ********************************************************

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
            
            //Estas cinco sentencias de actualización deben realizarce por medio de transsacciones
            $this->ConsultaCuenta_M->actualizarOpcion($RecibeProducto);
            $this->ConsultaCuenta_M->actualizarProducto($RecibeProducto);
            // $this->ConsultaCuenta_M->actualizarCaracteristicas($RecibeProducto, $ID_Caracteristica,  $Caracteristica);
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
<?php
    class CuentaMayorista_C extends Controlador{
        private $Mayorista;
        private $ID_Mayorista;
        public $SeccionesMay;
        private $ID_Vendedor;

        public function __construct(){
            session_start();  
            $this->ConsultaMayorista_M = $this->modelo("CuentaMayorista_M");
            
            //Sesiones creadas en Login_C
            $this->ID_Mayorista = $_SESSION['ID_Mayorista'];
            // echo $this->ID_Mayorista;

            //Se CONSULTAN las secciones de un mayorista en particular, solicitado en el header y otros metodos
            $this->SeccionesMay = $this->ConsultaMayorista_M->consultarSeccionesMayorista($this->ID_Mayorista);
            // echo '<pre>';
            // print_r($this->SeccionesMay); //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay, nombreMay
            // echo '</pre>';
            // exit;

            $this->Mayorista = $this->SeccionesMay[0]['nombreMay'];

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        //llamado desde login_C
        public function admin(){            
            //Sesiones creadas en Login_C
            // $this->ID_Mayorista = $_SESSION['ID_Mayorista'];

            $Datos = [
                'nombreMay' => $this->Mayorista 
            ];
            
            $this->vista("header/header_AfiMay", $Datos);
            $this->vista("view/cuenta_mayorista/cuenta_inicioMay_V");
        }

        // invocado desde el header_AfiMay.php
        public function configurar(){
            //CONSULTA los datos del mayorista
            $DatosMayorista = $this->ConsultaMayorista_M->consultarDatosMayorista($this->ID_Mayorista);

            $Datos = [
                'datosMayorista' => $DatosMayorista, //ID_Mayorista , nombreMay, estadoMay, municipioMay, parroquiaMay, direccionMay, fotografiaMay, desactivarMay
                'seccionesMay' => $this->SeccionesMay
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();

            $this->vista('header/header_AfiMay', $Datos);
            $this->vista('view/cuenta_mayorista/cuenta_editarMay_V', $Datos);
        }

        //Recibe el formulario de configuracion de mayorista invocado en cuenta_editarMay_V.php
        public function recibeRegistroEditado(){
            //Se reciben todos los campos del formulario desde cuenta_editar_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nombre_May'])){
                $RecibeDatos = [
                    //RECIBE DATOS DE LA TIENDA
                    'Nombre_may' => filter_input(INPUT_POST, 'nombre_May', FILTER_SANITIZE_STRING),
                    'id_mayorista' => filter_input(INPUT_POST, 'ID_Mayorista', FILTER_SANITIZE_STRING)
                ];
            }
            else{
                echo 'Llene todos los campos del formulario de registro';
                echo '<br>';
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            //RECIBE IMAGEN MAYORISTA
            // ********************************************************
            //Recibe la imagen de la tienda solo si se ha presionado el boton de buscar fotografia
            if(($_FILES['imagen_mayorista']['name']) != ''){
                $nombre_imgMayorista = $_FILES['imagen_mayorista']['name'];//se recibe un archivo cn $_FILE y el nombre del campo en el formulario, luego se hace referencia a la propiedad que se va a guardar en la variable.
                $tipo_imgMayorista = $_FILES['imagen_mayorista']['type'];
                $tamaño_imgMayorista = $_FILES['imagen_mayorista']['size'];

                // echo 'Nombre de la imagen = ' . $nombre_imgMayorista . '<br>';
                // echo 'Tipo de archivo = ' .$tipo_imgMayorista .  '<br>';
                // echo 'Tamaño = ' . $tamaño_imgMayorista . '<br>';
                // echo 'Tamaño maximo permitido = 7.000.000' . '<br>';// en bytes
                // echo 'Ruta del servidor = ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';

                //Si existe imagen_mayorista y tiene un tamaño correcto
                //Si existe imagenPrinci_Editar y tiene un tamaño correcto (2Mb)
                if(($nombre_imgMayorista == !NULL) AND ($tamaño_imgMayorista <= 2000000)){
                    //indicamos los formatos que permitimos subir a nuestro servidor
                    if(($_FILES['imagen_mayorista']['type'] == 'image/jpeg')
                        || ($_FILES['imagen_mayorista']['type'] == 'image/jpg') || ($_FILES['imagen_mayorista']['type'] == 'image/png')){

                        // Ruta donde se guardarán las imágenes que subamos la variable superglobal
                        // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                        //Usar en remoto
                        $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/proveedor/Don_Rigo/';

                        //usar en local
                        // $directorio_1 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/proveedor/Don_Rigo/';

                        //se muestra el directorio temporal donde se guarda el archivo
                        //echo $_FILES['imagen']['tmp_name'];
                        // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                        move_uploaded_file($_FILES['imagen_mayorista']['tmp_name'], $directorio_1.$nombre_imgMayorista);

                        //Para actualizar fotografia de perfil solo si se ha presionado el boton de buscar fotografia
                        if(($_FILES['imagen_mayorista']['name']) != ''){
                            //Se ACTUALIZA la fotografia de la Mayorista
                            $this->ConsultaMayorista_M->actualizarFotografiaMayorista($this->ID_Mayorista, $nombre_imgMayorista);
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

                //si existe imagen_mayorista pero se pasa del tamaño permitido
                // if($nombre_imgTienda == !NULL){
                //     echo "La imagen es demasiado grande ";
                //     echo "<br>";
                //     echo "<a href='javascript:history.back()'>Regresar</a>";
                //     exit();
                // }
            }

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
            $SecccionesExistentes = $this->ConsultaMayorista_M->consultarSecciones($this->ID_Mayorista);
            // echo 'Secciones existentes';
            // echo '<pre>';
            // print_r($SecccionesExistentes);
            // echo '</pre>';
            
            $Secciones = array_diff($SeccionesRecibidas, $SecccionesExistentes);
            // echo 'Secciones a insertar';
            // echo '<pre>';
            // print_r($Secciones);
            // echo '</pre>';
            // echo $this->ID_Mayorista;
            // exit();
        

            // **********************************************************************************
            //Todo este procedimiento debe ser por medio de TRANSACCIONES
            // **********************************************************************************
            
            //Se ACTUALIZAN los datos del mayorista, el registro de la tienda fue creado cuando el afiliado creo la tienda
            $this->ConsultaMayorista_M->actualizarMayorista($RecibeDatos);

            //Se INSERTAN las secciones del mayorista, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una mismo mayorista
            $this->ConsultaMayorista_M->insertarSeccionesMayorista($this->ID_Mayorista, $Secciones); 
            
            //Se CONSULTA el ID_Seccion de las secciones que tiene el mayorista
            $ID_Seccion = $this->ConsultaMayorista_M->consultarTodosID_SeccionMayorista($this->ID_Mayorista);
            
            //Se INSERTAN la dependencia transitiva entre las seccionesmayoristas y la tabla mayorista, en caso de que sean las mismas secciones existentes la tabla tiene un indice unico que impide insertar secciones repetidas en una misma tienda
            $this->ConsultaMayorista_M->insertarDT_mayorista_seccionesmayorista($this->ID_Mayorista, $ID_Seccion); 

        	header('location:' . RUTA_URL. '/CuentaMayorista_C/configurar');
        }

        //Invocado desde A_Cuenta_editarMayorista.js
        public function ActualizarSeccion($Seccion, $ID_Seccion){
            //Se ACTUALIZA una seccion 
            $this->ConsultaMayorista_M->ActualizarSeccion($Seccion, $ID_Seccion);

            //Se redirecciona a la vista de configuración para dejar al usuario donde estaba
            $this->configurar();
        }
        
        //Invocado desde A_Cuenta_editarMayorista.js por medio de la funcion Llamar_EliminarSeccion()
        public function eliminarSeccion($ID_Seccion){
            $this->ConsultaMayorista_M->Transaccion_eliminarSeccionesMayorista($ID_Seccion);

            // $this->ConsultaMayorista_M->eliminarSeccionesMayorista($ID_Seccion);
            // $this->ConsultaMayorista_M->eliminarSeccionesMayorista_OpcionesMayorista($ID_Seccion);
            // $this->ConsultaMayorista_M->eliminarSeccionesMayorista_ProductosMayorista($ID_Seccion);
            // $this->ConsultaMayorista_M->eliminarSeccionesMayorista_Mayorista($ID_Seccion);

            //Se redirecciona a la vista de configuración para dejar al usuario donde estaba
            $this->configurar();
        }

        // Carga la vista donde se carga un producto de mayorista
        public function Publicar(){
            //CONSULTA los datos del mayorista
            $DatosMayorista = $this->ConsultaMayorista_M->consultarDatosMayorista($this->ID_Mayorista);

            // //CONSULTA si existe al menos una sección donde cargar productos
            // $Cant_Seccion = $this->ConsultaMayorista_M->consultarSecciones($this->ID_Mayorista);
            // // echo 'Registros encontrados: ' . $Cant_Seccion;
            
            // //CONSULTA la categoria de una tienda 
            // $Categorias = $this->ConsultaMayorista_M->consultarCategoriaTiendas($this->ID_Mayorista);

            //CONSULTA las secciones que tiene un mayorista
            // $Secciones = $this->ConsultaMayorista_M->consultarSeccionesMayorista($this->ID_Mayorista);

            //Solicita el precio del dolar
            require(RUTA_APP . '/controladores/Menu_C.php');
            $this->PrecioDolar = new Menu_C();

            //Solicita la fecha actual
            // require(RUTA_APP . '/controladores/complementos/Fechas.php');
            // $this->Fecha = new Fechas();
    
            $Datos = [
                'DatosMayorista' => $DatosMayorista, //nombreMay, estadoMay, municipioMay, parroquiaMay, direccionMay, fotografiaMay, desactivarMay
                'seccionesMay' => $this->SeccionesMay, //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
                'dolarHoy' => $this->PrecioDolar->Dolar,
                // 'fechaDotacion' => $this->Fecha->FechaDotacion, 
                // 'fechaReposicion' => $this->Fecha->fechaReposicion
            ];
            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();

            $verifica_3 = 1906;  
            $_SESSION['verifica_3'] = $verifica_3; 
            //Se crea esta sesion para impedir que se recargue la información enviada por el formulario mandandolo varias veces a la base de datos

            $this->vista('header/header_AfiMay', $Datos);
            $this->vista('view/cuenta_mayorista/cuenta_publicarMay_V', $Datos);
        }

        //Invocado en cuenta_publicarMay_V.php recibe el formulario para cargar un nuevo producto de mayorista
        public function recibeProductoPublicarMay(){
            // $verifica_2 = $_SESSION['verifica_2'];  
            // if($verifica_2 == 1906){// Anteriormente en se generó la variable $_SESSION["verfica_2"] con un valor de 1906; con esto se evita que no se pueda recarga la página que carga los productos.
            //     unset($_SESSION['verifica_2']);//se borra la sesión verifica. 

                //Se reciben todos los campos del formulario, desde cuenta_publicarMay_V.php se verifica que son enviados por POST y que no estan vacios
                if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['seccionMay']) && !empty($_POST['productoMay']) && !empty($_POST['precioBsMay']) && (!empty($_POST['precioDolarMay']) || $_POST['precioDolarMay'] == 0)){
                    // && !empty($_POST['fecha_dotacion']) && !empty($_POST['incremento']) && !empty($_POST['fecha_reposicion'])
                    $RecibeProducto = [
                        //Recibe datos del producto que se va a cargar al sistema
                        'ProductoMay' => filter_input(INPUT_POST, 'productoMay', FILTER_SANITIZE_STRING),
                        'DescripcionMay' => filter_input(INPUT_POST, 'descripcionMay', FILTER_SANITIZE_STRING),
                        // 'Descripcion' => preg_replace('[\n|\r|\n\r|\]','',filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING)), //evita los saltos de lineas realizados por el usuario al separar parrafos
                        'PrecioBsMay' => filter_input(INPUT_POST, "precioBsMay", FILTER_SANITIZE_STRING),
                        'PrecioDolarMay' => filter_input(INPUT_POST, "precioDolarMay", FILTER_SANITIZE_STRING),
                        'CantidadMay' => empty($_POST['cantidadMay']) ? 0 : $_POST['cantidadMay'],
                        'DisponibleMay' => empty($_POST['disponibleMay']) ? 0 : 1,
                        'SeccionMay' => filter_input(INPUT_POST, "seccionMay", FILTER_SANITIZE_STRING),
                        'ID_Mayorista' => filter_input(INPUT_POST, "id_mayorista", FILTER_SANITIZE_STRING)
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

                //********************************************************
                //Las siguientes consultas se deben realizar por medio de Transacciones BD
                //Se INSERTA el producto mayorista en la BD y se retorna el ID recien insertado
                $ID_ProductoMay = $this->ConsultaMayorista_M->insertarProductoMayorista($RecibeProducto);

                //Se INSERTA la opcion y precio del producto mayorista en la BD y se retorna el ID recien insertado
                $ID_OpcionMay = $this->ConsultaMayorista_M->insertarOpcionesProductoMayorista($RecibeProducto);
               
                //Se CONSULTA el ID_SeccionMay de la seccion del producto mayorista
                $ID_SeccionMay = $this->ConsultaMayorista_M->consultarID_SeccionMayorista($RecibeProducto);
                // echo '<pre>';
                // print_r($ID_SeccionMay);
                // echo '</pre>';
                // exit;
                
                //Se INSERTA la dependenciatransitiva entre productomayorista, opcionesmayorista
                $this->ConsultaMayorista_M->insertarDT_ProMayOpcMay($ID_ProductoMay, $ID_OpcionMay);

                //Se INSERTA la dependenciatransitiva entre seccionesmayorista y las opcionesmayorista (en los casos que no hay especificidad de producto)
                $this->ConsultaMayorista_M->insertarDT_SecMayOpcMay($ID_SeccionMay, $ID_OpcionMay);

                //Se INSERTA la dependenciatransitiva entre secciones y los productos
                $this->ConsultaMayorista_M->insertarDT_SecMayProMay($ID_SeccionMay, $ID_ProductoMay);

                //Se INSERTA la dependenciatransitiva entre mayorista y la seccion del producto(esta consulta no permite datos dulicados, si ya existe la relación entre el mayorista y la sección se obvia)
                // $this->ConsultaMayorista_M->insertarDT_maysecMay( $this->ID_Mayorista, $ID_SeccionMay[0]['ID_SeccionMay']);
                
                //IMAGEN PRODUCTO
                //********************************************************
                //Si se selecionó alguna imagen entra
                if($_FILES['foto_ProductoMay']["name"] != ''){
                    $nombre_imgProducto = $_FILES['foto_ProductoMay']['name'] != '' ? $_FILES['foto_ProductoMay']['name'] : 'imagen.png';
                    $tipo_imgProducto = $_FILES['foto_ProductoMay']['type'] != '' ? $_FILES['foto_ProductoMay']['type'] : 'image/png';
                    $tamanio_imgProducto = $_FILES['foto_ProductoMay']['size'] != '' ?  $_FILES['foto_ProductoMay']['size'] : '28,0 KB';

                    // echo 'Nombre de la imagen = ' . $nombre_imgProducto . '<br>';
                    // echo 'Tipo de archivo = ' .$tipo_imgProducto .  '<br>';
                    // echo 'Tamaño = ' . $tamanio_imgProducto . '<br>';
                    // echo 'Tamaño maximo permitido = 2.000.000' . '<br>';// en bytes
                    // echo 'Ruta del servidor = ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
                    // exit();

                    //Si existe foto_ProductoMay y tiene un tamaño correcto (maximo 2Mb)
                    if(($nombre_imgProducto == !NULL) AND ($tamanio_imgProducto <= 2000000)){
                        //indicamos los formatos que permitimos subir a nuestro servidor
                        if(($tipo_imgProducto == 'image/jpeg')
                            || ($tipo_imgProducto == 'image/jpg') || ($tipo_imgProducto == 'image/png')){

                            //Ruta donde se guardarán las imágenes que subamos la variable superglobal
                            //$_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                            //Usar en remoto
                            $directorio_2 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/proveedor/Don_Rigo/';

                            // usar en local
                            // $directorio_2 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/proveedor/Don_Rigo/';

                            //Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                            move_uploaded_file($_FILES['foto_ProductoMay']['tmp_name'], $directorio_2.$nombre_imgProducto);

                            //Se INSERTA la imagen principal y devuelve el ID_Imagen
                            $ID_Imagen = $this->ConsultaMayorista_M->insertaImagenPrincipalMayorista($ID_ProductoMay, $nombre_imgProducto, $tipo_imgProducto, $tamanio_imgProducto);
                            
                            //Se INSERTA la dependenciatransitiva entre secciones e imagenes
                            // $this->ConsultaMayorista_M->insertarDT_SecImg($ID_Seccion, $ID_Imagen);
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
                else{//si no se selecciono ninguna imagen principal se inserta la imagen por defecto
                    $ID_Imagen = $this->ConsultaMayorista_M->insertaImagenPorDefectoMayorista($ID_ProductoMay);
                }
                
                $this->Productos();
            // }
            // else{
            //     $this->Productos('Todos');
            // } 
        }

        // invocado desde el metodo eliminarProductoMay() - recibeProductoPublicarMay - recibeAtualizarProductoMay - header_AfiMay.php - 
        public function Productos($DatosAgrupados = 'Todos,falas,false'){
            //$DatosAgrupados contiene una cadena con el separados por coma, se convierte en array para separar los elementos
            // echo 'Datos agrupados= ' . $DatosAgrupados . '<br>';
            // echo 'ID_Mayorista= ' . $this->ID_Mayorista . '<br>';
            // exit;

            $DatosAgrupados = explode(',', $DatosAgrupados);

            $Seccion = $DatosAgrupados[0];
            $ID_Seccion = $DatosAgrupados[1];
            $ID_Producto = $DatosAgrupados[2];
            //Mediante operador ternario
            // $ID_Seccion = empty($DatosAgrupados[1]) ? 'NoAplica' : $DatosAgrupados[1];
            // $Puntero =  empty($DatosAgrupados[2]) ? 'NoAplica' : $DatosAgrupados[2];
            // echo $Seccion . '<br>';
            echo $Seccion . '<br>';
            echo $ID_Seccion . '<br>';
            echo $ID_Producto . '<br>';
            exit();

            //$Seccion cuando es una frase de varias palabras, la cadena llega unida, por lo que la busqueda en la BD no es la esperada.
            // - poner cada inicio de palabra con mayuscula para separarlas por medio de array, esto conlleva a que al recibir las secciones por parte del usuario en el formulario de configuración se conviertan estas letrs en mayuscula porque el usuario puede ingresarlas en minusculas
            // - Recibirla la variable sin que se elimine el espacio entre palabras
            //Provicionalmente se comento la sentencia que sanitiza la URL en Core.php que es donde se quitan los espacios en blancos
            urldecode($Seccion);

            if($Seccion  == 'Todos'){
                //CONSULTA todos los productos de un mayorista
                $Productos = $this->ConsultaMayorista_M->consultarTodosProductosMayorista($this->ID_Mayorista);
                // echo '<pre>';
                // print_r($Productos);
                // echo '</pre>';
                // exit();

                //CONSULTA las caracteristicas de los productos de una sección de una tienda
                // $Caracteristicas = $this->ConsultaMayorista_M->consultarCaracterisicasMayorista($this->ID_Mayorista);
                // echo '<pre>';
                // print_r($Productos);
                // echo '</pre>';
                // exit();
                //Se desglosa el valor para que sea solo igual el valor '1'
                // $Notificacion = $Notificacion[0]['notificacion'];

                $Seccion  = 'Todos';
            }
            else{
                //CONSULTA los productos de una sección en especifico de un mayorista
                $Productos= $this->ConsultaMayorista_M->consultarProductosMayorista($this->ID_Mayorista, $Seccion);

                // echo '<pre>';
                // print_r($Productos);
                // echo '</pre>';
                // exit();

                //CONSULTA las caracteristicas de los productos de una sección de una tienda
                // $Caracteristicas = $this->ConsultaMayorista_M->consultarCaracterisicasProducto($this->ID_Mayorista);
                // echo '<pre>';
                // print_r($Productos);
                // echo '</pre>';
                // exit();
                //Se da el valor de notifiación directamente debido a que si la condicion entró en el ELSE ya el afiliado a visitado la página y no tiene notificaciones por leer
                // $Notificacion = 1;
            }

            //CONSULTA los datos de la tienda
            // $DatosTienda = $this->ConsultaMayorista_M->consultarDatosTienda($this->ID_Mayorista);

            //Se CONSULTAN las secciones de una tienda en particular
            // $Secciones = $this->ConsultaMayorista_M->consultarSeccionesTienda($this->ID_Mayorista);

            //Se CONSULTAN el slogan de una tienda en particular
            // $Slogan = $this->ConsultaMayorista_M->consultarSloganTienda($this->ID_Mayorista);

            $Datos = [
                'seccionInvocada' => $Seccion, //seccionMay 
                'seccionesMay' => $this->SeccionesMay, //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
                'productos' => $Productos, //ID_ProductoMay, destacarMay, productoMay, ID_OpcionMay, opcionMay, precioBolivarMay, precioDolarMay, cantidadMay, disponibleMay, seccionMay, nombre_imgMay               
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista("header/header_AfiMay", $Datos);
            $this->vista("view/cuenta_mayorista/cuenta_productoMay_V", $Datos);
        }

        //Invocado desde E_Cuenta_ProductoMayorista.js
        public function EstablecerImageSeccionMayorista($ID_Seccion){

            $Datos = $ID_Seccion;
            $Token = true;
            
            $Datos = [
                'token' => $Token,
                'id_seccion' => $ID_Seccion
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista('header/header_Modal'); 
            $this->vista('modal/modal_establecerImageSeccion_V', $Datos);
        }

        //Invocado desde modal_establecerimagenSeccion_V.php actualiza la imagen de un producto
        public function recibeImagenSeccionMayorista(){
            $nombre_imgSeccionMayorista = $_FILES['img_SeccionMay']['name'] != '' ? $_FILES['img_SeccionMay']['name'] : 'imagen.png';
            $tipo_imgSeccion = $_FILES['img_SeccionMay']['type'] != '' ? $_FILES['img_SeccionMay']['type'] : 'image/png';
            $tamanio_imgSeccion = $_FILES['img_SeccionMay']['size'] != '' ?  $_FILES['img_SeccionMay']['size'] : '20,0 KB';
            $ID_SeccionMay = $_POST['id_seccionMay'];

            // echo 'Nombre de la imagen = ' . $nombre_imgSeccionMayorista . '<br>';
            // echo 'Tipo de archivo = ' .$tipo_imgSeccion .  '<br>';
            // echo 'Tamaño = ' . $tamanio_imgSeccion . '<br>';
            // echo 'Tamaño maximo permitido = 2.000.000' . '<br>';// en bytes
            // echo 'ID_Seccion = ' . $ID_SeccionMay;
            // exit();

            //Si existe img_SeccionMay y tiene un tamaño correcto (maximo 2Mb)
            if(($nombre_imgSeccionMayorista == !NULL) AND ($tamanio_imgSeccion <= 2000000)){
                //indicamos los formatos que permitimos subir a nuestro servidor
                if(($tipo_imgSeccion == 'image/jpeg')
                    || ($tipo_imgSeccion == 'image/jpg') || ($tipo_imgSeccion == 'image/png')){

                    //Usar en remoto
                    $directorio_6 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/proveedor/Don_Rigo/secciones/';

                    // usar en local
                    // $directorio_6 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/proveedor/Don_Rigo/secciones/';

                    //Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                    move_uploaded_file($_FILES['img_SeccionMay']['tmp_name'], $directorio_6.$nombre_imgSeccionMayorista);

                    //Se INSERTA la imagen de la seccion
                    $this->ConsultaMayorista_M->actualizaImagenSeccionMayorista($ID_SeccionMay, $nombre_imgSeccionMayorista, $tipo_imgSeccion, $tamanio_imgSeccion);
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
            //     $this->ConsultaMayorista_M->actualizarImagenPrincipalProducto($RecibeProducto['ID_Producto'], $nombre_imgProducto);
                
                //Se ACTUALIZA la dependenciatransitiva entre secciones e imagenes
                // $this->ConsultaMayorista_M->actualizarDT_SecImg($RecibeProducto['ID_Seccion'], $RecibeProducto['ID_Imagen']);
            // }
            
            echo '<script>window.close();</script>';
        }

        //Metodo invocado desde A_Cuenta_publicarMay.js
        public function SeccionesDisponiblesMay(){
            $Datos = [
                'seccionesMay' => $this->SeccionesMay, //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('modal/modal_SeccionesDisponiblesMay_V', $Datos);
        }

        //Metodo invocado desde A_Cuenta_editar_proMay.js
        public function SeccionesSeleccionadasMay($ID_Producto){
            //CONSULTA la seccion donde se encuentra el producto
            $SeccionActiva= $this->ConsultaMayorista_M->consultarSeccionProductosMayorista($ID_Producto);

            $Datos = [
                'seccionActiva' => $SeccionActiva, //ID_SeccionMay
                'seccionesMay' => $this->SeccionesMay, //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
            ];
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('modal/modal_SeccionesSeleccionadasMay_V', $Datos);
        }

        //Invocado desde mayorista_productos_V.php
        public function eliminarProductoMay($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Opcion, ID_Producto y la sección separados por coma, se convierte en array para separar los elementos
            // echo $DatosAgrupados;
            // exit();

            $DatosAgrupados = explode(',', $DatosAgrupados);

            $ID_Producto = $DatosAgrupados[0];
            $ID_Opcion = $DatosAgrupados[1];
            $Seccion = $DatosAgrupados[2];

            // *************************************************************************************
            //La siguientes seis consultas entran en el procedimeinto para ELIMINAR un producto de una tienda, esto debe hacerse mediante transacciones            
                $this->ConsultaMayorista_M->eliminarProductoSeccion($ID_Producto);
                $this->ConsultaMayorista_M->eliminarProductoOpcion($ID_Producto);
                $this->ConsultaMayorista_M->eliminarOpcionSeccion($ID_Opcion);
                $this->ConsultaMayorista_M->eliminarImagenProducto($ID_Producto);
                $this->ConsultaMayorista_M->eliminarProducto($ID_Producto);
                $this->ConsultaMayorista_M->eliminarOpcion($ID_Opcion);

            // *************************************************************************************

            //Se consulta el nombre de la imagen del producto mayorista
            $ImageneEliminarMay = $this->ConsultaMayorista_M->consultarImagenesEliminarMay($ID_Producto);
            // echo '<pre>';
            // print_r($ImageneEliminarMay);
            // echo '</pre>';
            // exit;
            
            //Se eliminan los archivo de la carpeta public/images/proveedor/Don_Rigo
            foreach($ImageneEliminarMay as $KeyImagenes)  :
                $NombreImagenEliminar = $KeyImagenes['nombre_imgMay'];

                //Usar en remoto
                unlink($_SERVER['DOCUMENT_ROOT'] . '/public/images/proveedor/Don_Rigo/' . $NombreImagenEliminar);
                    
                //usar en local
                // unlink($_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/proveedor/Don_Rigo/' . $NombreImagenEliminar);                
            endforeach;
              
            //Se redirecciona a la vista donde se encontraba el producto eliminado
            $this->Productos($Seccion);
            // $this->vista('view/cuenta_comerciante/cuenta_productos_V', $Datos);
        }      

        //Muestra el formulario dondes se actualiza un producto, invocado desde cuenta_productosMay_V.php
        public function actualizarProductoMay($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Producto y la opcion separados por coma, se convierte en array para separar los elementos

            $DatosAgrupados = explode(",", $DatosAgrupados);

            $ID_Producto = $DatosAgrupados[0];
            $Opcion = $DatosAgrupados[1];

            //CONSULTA los datos del mayorista
            // $DatosTienda = $this->ConsultaMayorista_M->consultarDatosTienda($this->ID_Mayorista);

            //CONSULTA los productos de una sección en especifico según la tienda
            // $Secciones = $this->ConsultaMayorista_M->consultarSecciones($this->ID_Mayorista);

            //CONSULTA las especiicaciones de un producto determinado y de un mayorista especifica
            $Especificaciones = $this->ConsultaMayorista_M->consultarDescripcionProductoMay($this->ID_Mayorista, $ID_Producto);
            
            //CONSULTAN la imagenes principal del producto
            $ImagenProducto = $this->ConsultaMayorista_M->consultarImagenProducto($ID_Producto);

            //Solicita el precio del dolar
            require(RUTA_APP . "/controladores/Menu_C.php");
            $this->PrecioDolar = new Menu_C();
            
            $Datos = [
                // 'datosTienda' => $DatosTienda, //nombre_Tien, estado_Tien, municipio_Tien, parroquia_Tien, direccion_Tien, telefono_Tien, slogan_Tien, fotografia_Tien
                // 'secciones' => $Secciones, //ID_Seccion, seccion  - Usado en header_AfiCom.php
                'especificaciones' => $Especificaciones, //ID_ProductoMay, destacarMay, ID_OpcionMay, productoMay, opcionMay, precioBolivarMay, precioDolarMay, cantidadMay, disponibleMay, seccionMay, ID_SeccionMay
                'imagenProducto' => $ImagenProducto, //ID_ImagenMay, nombre_imgMay
                // 'imagenesVarias' => $Imagenes, //ID_Imagen, nombre_img
                'dolarHoy' => $this->PrecioDolar->Dolar,
                'seccionesMay' => $this->SeccionesMay, //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
                // 'reposicion'=> $Reposicion
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('header/header_AfiMay', $Datos); 
            $this->vista('view/cuenta_mayorista/cuenta_editar_prodMay_V', $Datos);
        }

        //Invocado desde cuenta_editar_prodMay_V.php
        public function recibeAtualizarProductoMay(){
            //Se reciben todos los campos del formulario, se verifica que son enviados por POST y que no estan vacios
            if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['seccionMay']) && !empty($_POST['productoMay']) && !empty($_POST['precioBolivarMay']) && (!empty($_POST['precioDolarMay']) || $_POST['precioDolarMay'] == 0)){
            // {&& !empty($_POST['fecha_dotacion']) && !empty($_POST['incremento']) && !empty($_POST['fecha_reposicion'])

                $RecibeProducto = [
                    //Recibe datos del producto a actualizar
                    // 'ID_Tienda' => filter_input(INPUT_POST, 'id_mayoristaMay', FILTER_SANITIZE_STRING),
                    'Seccion' => filter_input(INPUT_POST, 'seccionMay', FILTER_SANITIZE_STRING),
                    'ID_Seccion' => filter_input(INPUT_POST, 'id_seccionMay', FILTER_SANITIZE_STRING),
                    'ID_SP' => filter_input(INPUT_POST, 'id_sp', FILTER_SANITIZE_STRING),
                    'Producto' => preg_replace('[\n|\r|\n\r]','',filter_input(INPUT_POST, 'productoMay', FILTER_SANITIZE_STRING)), //evita los saltos de lineas realizados por el usuario al separar parrafos
                    'Descripcion' => preg_replace('[\n|\r|\n\r]','',filter_input(INPUT_POST, 'descripcionMay', FILTER_SANITIZE_STRING)), //evita los saltos de lineas realizados por el usuario al separar parrafos
                    'PrecioBolivar' => filter_input(INPUT_POST, 'precioBolivarMay', FILTER_SANITIZE_STRING),
                    'PrecioDolar' => filter_input(INPUT_POST, 'precioDolarMay', FILTER_SANITIZE_STRING),
                    'Cantidad' => empty($_POST['uni_existenciaMay']) ? 0 : $_POST['uni_existenciaMay'],
                    'Disponible' => empty($_POST['disponibleMay']) ? 0 : 1,
                    'ID_Producto' => filter_input(INPUT_POST, 'id_productoMay', FILTER_SANITIZE_STRING),
                    'ID_Opcion' => filter_input(INPUT_POST, 'id_opcionMay', FILTER_SANITIZE_STRING),
                    // 'ID_Imagen' => filter_input(INPUT_POST, 'id_imagenMay', FILTER_SANITIZE_STRING),
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
            if(isset($_FILES['imagenProductorMay']["name"])){
                $nombre_imgProducto = $_FILES['imagenProductorMay']['name'];
                $tipo = $_FILES['imagenProductorMay']['type'];
                $tamanio = $_FILES['imagenProductorMay']['size'];

                // echo "Nombre de la imagen = " . $nombre_imgProducto . "<br>";
                // echo "Tipo de archivo = " . $tipo .  "<br>";
                // echo "Tamaño = " . $tamanio . "<br>";
                // echo "Tamaño maximo permitido = 2.000.000" . "<br>";// en bytes
                // echo "Ruta del servidor = " . $_SERVER['DOCUMENT_ROOT'] . "<br><br>";
                // exit;

                //Si existe imagenProductorMay y tiene un tamaño correcto
                if(($nombre_imgProducto == !NULL) AND ($tamanio <= 2000000)){
                    //indicamos los formatos que permitimos subir a nuestro servidor
                    if (($_FILES["imagenProductorMay"]["type"] == "image/jpeg")
                        || ($_FILES["imagenProductorMay"]["type"] == "image/jpg") || ($_FILES["imagenProductorMay"]["type"] == "image/png")){

                        // Ruta donde se guardarán las imágenes que subamos la variable superglobal
                        // $_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                        //Usar en remoto
                        $directorio_4 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/proveedor/Don_Rigo/';

                        //usar en local
                        // $directorio_4 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/proveedor/Don_Rigo/';

                        //se muestra el directorio temporal donde se guarda el archivo
                        //echo $_FILES['imagen']['tmp_name'];
                        // finalmente se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                        move_uploaded_file($_FILES['imagenProductorMay']['tmp_name'], $directorio_4.$nombre_imgProducto);
                    }
                    else{
                        //si no cumple con el formato
                        echo 'Solo puede cargar imagenes con formato jpg, jpeg o png' . '<br>';
                        echo '<a href="javascript: history.go(-1)">Regresar</a>';
                        exit();
                    }
                }
                else{
                //si existe imagenProductorMay pero se pasa del tamaño permitido
                    if($nombre_imgProducto == !NULL){
                        echo 'La imagen es demasiado grande.' . '<br>';
                        echo '<a href="javascript:history.back()">Regresar</a>';
                        exit();
                    }
                }
            }

            // ********************************************************
            //Estas seis sentencias de actualización deben realizarce por medio de transsacciones
            $this->ConsultaMayorista_M->actualizarOpcion($RecibeProducto);
            $this->ConsultaMayorista_M->actualizarProducto($RecibeProducto);
            $this->ConsultaMayorista_M->actualizacionSeccion($RecibeProducto);
            // $this->ConsultaMayorista_M->actualizacionReposicion($RecibeProducto);

            //Para actualizar fotografia principal solo si se ha presionado el boton de buscar fotografia
            if(($_FILES['imagenProductorMay']['name']) != ""){
                //Se ACTUALIZA la fotografia principal del producto
                $this->ConsultaMayorista_M->actualizarImagenProducto($RecibeProducto['ID_Producto'], $nombre_imgProducto);
                
                //Se ACTUALIZA la dependenciatransitiva entre secciones e imagenes
                // $this->ConsultaMayorista_M->actualizarDT_SecImg($RecibeProducto['ID_Seccion'], $RecibeProducto['ID_Imagen']);   actualizarImagenSeccionDeseleccionar
            }
            
            //Se envia la sección donde esta el producto actualizado para redireccionar a esa sección, tambien se envia el ID_Producto para ponerle el cursor
            $DatosAgrupados = $RecibeProducto['Seccion'] . ',' . $RecibeProducto['ID_Producto'];

            $this->Productos($DatosAgrupados);
        }   

        //llamado desde header_AfiMay.php
        public function vendedores(){
            //CONSULTA las vendedores de un mayorista especifico
            $Vendedores = $this->ConsultaMayorista_M->consultarVendedoresMay($this->ID_Mayorista);
            
            $Datos = [
                'seccionesMay' => $this->SeccionesMay, //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
                'vendedores' => $Vendedores //ID_AfiliadoVen, nombre_AfiVen, apellido_AfiVen, cedula_AfiVen, telefono_AfiVen, zona_AfiVen, Status_AfiVen, correo_AfiVen 
            ];

            $this->vista('header/header_AfiMay', $Datos); 
            $this->vista('view/cuenta_mayorista/cuenta_vendedorMay_V', $Datos);
        }

        //llamado desde cuenta_vendedorMay_V
        public function agregarVendedor(){
            //se crea una sesion llamada AGRECA_VENDEDOR, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de nuevo vendedor, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
            $_SESSION['AGREGA_VENDEDOR'] = 'AGR_VEN';

            //CONSULTA las vendedores de un mayorista especifico
            // $Vendedores = $this->ConsultaMayorista_M->consultarVendedoresMay($this->ID_Mayorista);

            $Datos = [
                'seccionesMay' => $this->SeccionesMay //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
            ];

            $this->vista('header/header_AfiMay', $Datos); 
            $this->vista('view/cuenta_mayorista/cuenta_agregarvendedorMay_V', $Datos);
        }

        //Invocado en cuenta_agregarvendedorrMay_V.php recibe el formulario para cargar un nuevo vendedor
        public function recibeAgregarVendedorrMay(){;  
            if($_SESSION['AGREGA_VENDEDOR'] == 'AGR_VEN'){// Anteriormente en el metodo agregarVendedor() de este mismo archivo se generó la variable $_SESSION['AGRECA_VENDEDOR'] con un valor de AGR_VEN; con esto se evita que no se pueda recarga la página que carga los vendedores.
                unset($_SESSION['AGREGA_VENDEDOR']);//se borra la sesión verifica. 

                //Se reciben todos los campos del formulario, desde cuenta_publicarMay_V.php se verifica que son enviados por POST y que no estan vacios
                if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nombreVen']) && !empty($_POST['apellidoVen']) && !empty($_POST['cedulaVen']) && !empty($_POST['telefonoVen']) && !empty($_POST['correoVen']) && !empty($_POST['zonaVen'])){
                    $RecibeVendedor = [
                        //Recibe datos del producto que se va a cargar al sistema
                        'Nombre_Ven' => filter_input(INPUT_POST, 'nombreVen', FILTER_SANITIZE_STRING),
                        'Apellido_Ven' => filter_input(INPUT_POST, 'apellidoVen', FILTER_SANITIZE_STRING),
                        // 'Descripcion' => preg_replace('[\n|\r|\n\r|\]','',filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_STRING)), //evita los saltos de lineas realizados por el usuario al separar parrafos
                        'Cedula_Ven' => filter_input(INPUT_POST, "cedulaVen", FILTER_SANITIZE_STRING),
                        'Telefono_Ven' => filter_input(INPUT_POST, "telefonoVen", FILTER_SANITIZE_STRING),
                        'Correo_Ven' => filter_input(INPUT_POST, 'correoVen', FILTER_SANITIZE_STRING),
                        'Direccion_Ven' => filter_input(INPUT_POST, 'direccionVen', FILTER_SANITIZE_STRING),
                        'Zona_Ven' => filter_input(INPUT_POST, 'zonaVen', FILTER_SANITIZE_STRING)
                    ];
                    // echo '<pre>';
                    // print_r($RecibeVendedor);
                    // echo '</pre>';
                    // exit;
                }
                else{
                    echo 'Llene todos los campos del formulario ';
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }
                                
                //IMAGEN VENDEDOR
                //********************************************************
                //Si se selecionó alguna imagen entra
                if($_FILES['foto_vendedor']["name"] != ''){
                    $nombre_imgVendedor = $_FILES['foto_vendedor']['name'] != '' ? $_FILES['foto_vendedor']['name'] : 'imagen.png';
                    $tipo_imgVendedor = $_FILES['foto_vendedor']['type'] != '' ? $_FILES['foto_vendedor']['type'] : 'image/png';
                    $tamanio_imgVendedor = $_FILES['foto_vendedor']['size'] != '' ?  $_FILES['foto_vendedor']['size'] : '28,0 KB';

                    // echo 'Nombre de la imagen = ' . $nombre_imgVendedor . '<br>';
                    // echo 'Tipo de archivo = ' .$tipo_imgVendedor .  '<br>';
                    // echo 'Tamaño = ' . $tamanio_imgVendedor . '<br>';
                    // echo 'Tamaño maximo permitido = 2.000.000' . '<br>';// en bytes
                    // echo 'Ruta del servidor = ' . $_SERVER['DOCUMENT_ROOT'] . '<br>';
                    // exit();

                    //Si existe foto_vendedor y tiene un tamaño correcto (maximo 2Mb)
                    if(($nombre_imgVendedor == !NULL) AND ($tamanio_imgVendedor <= 2000000)){
                        //indicamos los formatos que permitimos subir a nuestro servidor
                        if(($tipo_imgVendedor == 'image/jpeg')
                            || ($tipo_imgVendedor == 'image/jpg') || ($tipo_imgVendedor == 'image/png')){

                            //Ruta donde se guardarán las imágenes que subamos la variable superglobal
                            //$_SERVER['DOCUMENT_ROOT'] nos coloca en la base de nuestro directorio en el servidor

                            //Usar en remoto
                            $directorio_2 = $_SERVER['DOCUMENT_ROOT'] . '/public/images/proveedor/Don_Rigo/equipo';

                            // usar en local
                            // $directorio_2 = $_SERVER['DOCUMENT_ROOT'] . '/proyectos/PidoRapido/public/images/proveedor/Don_Rigo/equipo';

                            //Se mueve la imagen desde el directorio temporal a nuestra ruta indicada anteriormente utilizando la función move_uploaded_files
                            move_uploaded_file($_FILES['foto_vendedor']['tmp_name'], $directorio_2.$nombre_imgVendedor);

                            //Se INSERTA la imagen principal y devuelve el ID_Imagen
                            // $ID_Imagen = $this->ConsultaMayorista_M->insertaImagenVendedor($ID_Vendedor, $nombre_imgVendedor, $tipo_imgVendedor, $tamanio_imgVendedor);
                            
                            //Se INSERTA la dependenciatransitiva entre secciones e imagenes
                            // $this->ConsultaMayorista_M->insertarDT_SecImg($ID_Seccion, $ID_Imagen);
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
                    $nombre_imgVendedor = $_FILES['foto_vendedor']['name'] = 'Perfil.jpg';
                    $tipo_imgVendedor = $_FILES['foto_vendedor']['name'] = 'jpg';
                    $tamanio_imgVendedor = $_FILES['foto_vendedor']['name'] = '20,0 KB';
                }
                
                //********************************************************
                // SE GENERA EL CODIGO DE VENTA DEL VENDEDOR, ESTE MISMO SE UTILIZARA COMO CONTRASEÑA PROVISONAL PARA LA CUENTA DEL VENDEDOR
                $Ale_CodigoVendedor = mt_rand(99999,999999);

                //Las siguientes consultas se deben realizar por medio de Transacciones BD
                //Se INSERTA el vendedor en la BD y se retorna el ID recien insertado
                $ID_Vendedor = $this->ConsultaMayorista_M->insertarVendeodr($this->ID_Mayorista, $RecibeVendedor, $nombre_imgVendedor, $tipo_imgVendedor, $tamanio_imgVendedor, $Ale_CodigoVendedor);
                // echo '<pre>';
                // print_r($ID_Vendedor);
                // echo '</pre>';
                // exit;

                //se cifran el codigo de vendedor con un algoritmo de encriptación, para insertarlo como contraseña en la cuenta de vendedor  luego el vendedor debera cambiarla
                $ClaveVenCifrada= password_hash($Ale_CodigoVendedor, PASSWORD_DEFAULT);

                //Se INSERTA los datos de inicio de sesion de vendedor
                $this->ConsultaMayorista_M->insertarContraeniaVendedor($ID_Vendedor, $ClaveVenCifrada);
               
                // echo '<pre>';
                // print_r($ID_SeccionMay);
                // echo '</pre>';
                // exit;
                
                $this->vendedores();
            }
            else{
                $this->agregarVendedor();
            } 
        }
        
        //llamado desde header_AfiMay.php
        public function clientes(){            
            //CONSULTA todos los clientes de la compañia
            $Clientes = $this->ConsultaMayorista_M->consultarClientes();
            
            $Datos = [
                'clientes_may' => $Clientes, //nombre_AfiMin, rif_AfiMin. telefono_AfiMin, correo_AfiMin, direccion_AfiMin, codigodespacho, zona_AfiVen
                'nombreMay' => $this->Mayorista,
                'seccionesMay' => $this->SeccionesMay //ID_SeccionMay, ID_Mayorista, seccionMay, nombre_img_seccionMay
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit();

            $this->vista('header/header_AfiMay', $Datos); 
            $this->vista('view/cuenta_mayorista/cuenta_clientesMay_V', $Datos);
        }
    }
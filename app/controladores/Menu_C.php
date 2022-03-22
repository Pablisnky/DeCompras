<?php
    class Menu_C extends Controlador{

        public $Dolar;
        public $Reserve;

        public function __construct(){
            $this->ConsultaMenu_M = $this->modelo("Menu_M");

            $this->Dolar = 4.2980;
            $this->Reserve = 4;
            
            //Se conecta a la API de DolarToday para actualizar el valor del dolar
            // $DolarHoy = json_decode(file_get_contents('https://s3.amazonaws.com/dolartoday/data.json'),true);
            // echo '<pre>';
            // print_r($DolarHoy);
            // echo '</pre>';
            // exit;

            // $this->Dolar = $DolarHoy['USD']['promedio_real']; 
            // $this->Dolar = number_format($this->Dolar, 0, '', '');
            // echo $this->Dolar;
            // exit;

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){ 
            require(RUTA_APP . "/controladores/complementos/CambioDolar_C.php");
            $this->ActualizarPrecio = new CambioDolar_C();
            $this->ActualizarPrecio->AjusteCambioMonetario($this->Dolar, $this->Reserve);
            
            echo 'Perfecto, Dolar y tasa "Reserve" actualizado' . '<br>';
            echo "<a href='javascript: history.go(-1)'>Regresar</a>";
        }

        public function afiliacion(){

            $PlanEmprendedorBs = 2;
            $PlanBasicoBs = 5;
            $PlanMedioBs = 8;
            $PlanMaximoBs = 13;
            $PlanFullBs = 20;

            $PlanEmprendedor = $this->Dolar * $PlanEmprendedorBs;
            $PlanBasico = $this->Dolar * $PlanBasicoBs;
            $PlanMedio = $this->Dolar * $PlanMedioBs;
            $PlanMaximo = $this->Dolar * $PlanMaximoBs;
            $PlanFull = $this->Dolar * $PlanFullBs;

            $PlanEmprendedor = number_format($PlanEmprendedor, 6, '', '.');
            $PlanBasico = number_format($PlanBasico, 6, ',', '.');
            $PlanMedio = number_format($PlanMedio, 6, ',', '.');
            $PlanMaximo = number_format($PlanMaximo, 6, ',', '.');
            $PlanFull = number_format($PlanFull, 6, ',', '.');

            $Datos = [
                'emprendedor' => $PlanEmprendedor,
                'basico' => $PlanBasico,
                'medio' => $PlanMedio,
                'maximo' => $PlanMaximo,
                'full' => $PlanFull
            ];

            $this->vista('header/header');
            $this->vista('view/afiliacion_V', $Datos);
        }

        public function codigo_QR(){
            //Se agrega la libreria que genera el códigos QR
            require(RUTA_APP . '/codigo_QR/phpqrcode/qrlib.php');
            
            //Se declara una carpeta temporal para guardar la imagenes generadas
            $dir = RUTA_APP . '/codigo_QR/codigosRegistrados/';
            
            //Si no existe la carpeta se crea
            if(!file_exists($dir))
                mkdir($dir);
            
            //Se declara la ruta y nombre del archivo a generar (archivo que contiene el codigo_QR)
            $filename = $dir . 'La_Bodega_Digital.png';
        
            //Parametros de Condiguración
            $tamaño = 6; //Tamaño de Pixel
            $level = 'H'; //Precisión Alta
            $framSize = 3; //Tamaño en blanco
        
            //Se inserta la ruta a donde va a llevar el código QR
            $contenido = "https://www.pedidoremoto.com/Tiendas_C/tiendasEnCatalogo/Bodega"; 
            
            //Se envian los parametros a la Función para generar código QR 
            QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
            
            //Se muestra la imagen generada
            echo '<img alt="Codigo QR" src="' . $filename . '"/>'; 

            // ***************************************************************************************
            // Linea 13, Se escribe el nombre del archivo donde esta el codigo QR
            // Linea 20, Se introduce la url asignada al afiliado en el archivo .php
            // Se abre el proyecto pidorapido en localhost y se añade a la url de inicio el siguiente complemento ( Menu_C/codigo_QR ) para generar el código QR de la tienda
        }

        public function PWA(){
            $this->vista("header/header_Modal");
            $this->vista("view/pwa_V");
        }
                
        public function recibeContactenos(){         
            // Se reciben todos los campos del formulario, desde  
            // if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombreUsuario"]) && !empty($_POST["telefonoUsuario"]) && !empty($_POST["correoUsuario"]) && !empty($_POST["asunto"])){
            //     //si son enviados por POST y sino estan vacios, entra aqui
            //     $RecibeDatos = [
            //         // DATOS DEL USUARIO
            //         'Nombre' => filter_input(INPUT_POST, "nombreUsuario", FILTER_SANITIZE_STRING),
            //         'Telefono' => filter_input(INPUT_POST, "telefonoUsuario", FILTER_SANITIZE_NUMBER_INT),
            //         'Correo' => $_POST['correoUsuario'],
            //         'Asunto' => filter_input(INPUT_POST, "asunto", FILTER_SANITIZE_STRING)
            //     ];
            // }

            // echo "<pre>";
            // print_r($RecibeDatos);
            // echo "</pre>";
            // exit();
            
            // // ****************************************

            //Se envia al correo pcabeza7@gmail.com el mensaje que el usaurio a dejado
            // $email_subject = 'Mensaje desde contactenos'; 
            // $email_to = 'pcabeza7@gmail.com';  
            // $headers = 'From: PedidoRemoto'.'<'.$RecibeDatos['Correo'].'>';
            // $email_message = $RecibeDatos['Asunto'];

            // mail($email_to, $email_subject, $email_message, $headers); 

            // ****************************************

            // $this->vista("header/header");
            // $this->vista("view/quienesSomos_V");
        }
        
        public function descargaApp(){
            $this->vista('header/header');
            $this->vista('view/descargaApp_V');
        }

        public function categorias(){ 
            header('Location: ../Categoria_C');
        }
        
//********************************************************************************************
//********************************************************************************************
//********************************************************************************************
        //Ulilizada en su momento para cargar o eliminar datos 
        // public function borrar(){
        //     //Se consultan los precios en bolivares.
        //     $Precios = $this->ConsultaMenu_M->ConsultaPreciosBs();

        //     //Se quitan los seis ceros de la reconversion
            
        //     //Se declara un array donde se almacenaran los precios actualizados de cada producto
        //     $NuevoPrecioBolivar = [];
        //     $Intermedio = [];

        //     //Se cambian los precios al nuevo cono monetario
        //     foreach($Precios as $Key):
        //         $ID_Opcion = $Key['ID_Opcion'];
        //         // $PrecioActualBs = ($Key['precioDolar'] * $this->PrecioDolar) + $this->TasaReserve;
        //         $PrecioActualBs = ($Key['precioBolivar'] * 1000000);

        //         $Intermedio = [
        //             'ID_Opcion' => $ID_Opcion, 
        //             'precioActualizadoBs' => $PrecioActualBs
        //         ];

        //         array_push($NuevoPrecioBolivar, $Intermedio);
        //     endforeach;
        //     // echo "<pre>";
        //     // print_r($NuevoPrecioBolivar);
        //     // echo "</pre>";
        //     // exit();
            
        //     //Se ACTUALIZAN los precios en bolivares.
        //     $this->ConsultaMenu_M->actualizarNuevoConoMonetario($NuevoPrecioBolivar);            
        // }
        
    }
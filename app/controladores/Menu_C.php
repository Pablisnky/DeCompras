<?php
    class Menu_C extends Controlador{

        public $Dolar;
        public $Reserve;

        public function __construct(){
            $this->ConsultaMenu_M = $this->modelo("Menu_M");

            $this->Dolar = 4087136;
            $this->Reserve = 4170000;
            
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

            $PlanEmprendedor = number_format($PlanEmprendedor, 0, '', '.');
            $PlanBasico = number_format($PlanBasico, 0, '', '.');
            $PlanMedio = number_format($PlanMedio, 0, '', '.');
            $PlanMaximo = number_format($PlanMaximo, 0, '', '.');
            $PlanFull = number_format($PlanFull, 0, '', '.');

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

        public function instruccion(){
            $this->vista("view/instrucion_V");
        }

        public function PWA(){
            $this->vista("header/header_Modal");
            $this->vista("view/pwa_V");
        }
        
        public function nuestroADN(){
            $this->vista("header/header");
            $this->vista("view/quienesSomos_V");
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
        //     $ID_Producto = $this->ConsultaMenu_M->consultarID_Productos();

        //     // echo '<pre>';
        //     // print_r($ID_Producto);
        //     // echo '</pre>';
        //     // exit;

        //     $this->ConsultaMenu_M->Insertar_ID_Producto($ID_Producto);
            
        //     // $SeccionesImagenes = $this->ConsultaMenu_M->consultarSeccionesImagenes();
        //     // echo '<pre>';
        //     // print_r($SeccionesImagenes);
        //     // echo '</pre>';
        //     // exit;

        //     // $this->ConsultaMenu_M->ActualizaSeccionesImgenes($SeccionesImagenes);
        // }
    }
?>
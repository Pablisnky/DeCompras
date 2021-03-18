<?php
    class Menu_C extends Controlador{

        public $Dolar;

        public function __construct(){
            $this->ConsultaMenu_M = $this->modelo("Menu_M");

            // $this->Dolar =   1804479 ;
            
            // //Se conecta a la API de DolarToday para actualizar el valor del dolar
            // $DolarHoy = json_decode(file_get_contents('https://s3.amazonaws.com/dolartoday/data.json'),true);
            // echo '<pre>';
            // print_r($DolarHoy);
            // echo '</pre>';
            // exit;

            // $this->Dolar = $DolarHoy['USD']['promedio_real']; 

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){     
             //Se conecta a la API de DolarToday para actualizar el valor del dolar
            $DolarHoy = file_get_contents('https://s3.amazonaws.com/dolartoday/data.json');
            
            // $JsonBien = '[{
            //     "id": 6,
            //     "text": "10",
            //     "item": 0
            // }, {
            //     "id": 7,
            //     "text": "45",
            //     "item": 1
            // }, {
            //     "id": 8,
            //     "text": "3^2",
            //     "item": 2
            // }, {
            //     "id": 9,
            //     "text": "6",
            //     "item": 3
            // }, {
            //     "id": 10,
            //     "text": "666",
            //     "item": 4
            // }]';
            
            // echo 'Precio Dolar= ' . $JsonBien . '<br>';
            
            echo 'Precio Dolar= ' . $DolarHoy . '<br>';
            
            $DolarHoy_Json = json_decode($DolarHoy);
            echo $DolarHoy_Json; 
            switch(json_last_error()) {
                case JSON_ERROR_NONE:
                    echo ' - Sin errores';
                break;
                case JSON_ERROR_DEPTH:
                    echo ' - Excedido tamaño máximo de la pila';
                break;
                case JSON_ERROR_STATE_MISMATCH:
                    echo ' - Desbordamiento de buffer o los modos no coinciden';
                break;
                case JSON_ERROR_CTRL_CHAR:
                    echo ' - Encontrado carácter de control no esperado';
                break;
                case JSON_ERROR_SYNTAX:
                    echo ' - Error de sintaxis, JSON mal formado';
                break;
                case JSON_ERROR_UTF8:
                    echo ' - Caracteres UTF-8 malformados, posiblemente están mal codificados';
                break;
                default:
                    echo ' - Error desconocido';
                break;
            }
            
            // echo '<pre>';
            // var_dump($DolarHoy);
            // echo '</pre>';
            exit;

            $this->Dolar = $DolarHoy['USD']['promedio_real']; 
            require(RUTA_APP . "/controladores/complementos/CambioDolar_C.php");

            $this->ActualizarPrecio = new CalculoDolar_C();
            $this->ActualizarPrecio->AjusteCambioMonetario($this->Dolar);
            
            echo 'Perfecto, Dolar actualizado' . '<br>';
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

            $this->vista("inc/header");
            $this->vista("paginas/afiliacion_V", $Datos);
        }

        public function instruccion(){
            $this->vista("paginas/instrucion_V");
        }

        public function ciudad($Datos){
            $this->vista("paginas/ciudad_V", $Datos);
        }

        public function PWA(){
            $this->vista("inc/header_Modal");
            $this->vista("paginas/pwa_V");
        }
        
        public function nuestroADN(){
            $this->vista("inc/header");
            $this->vista("paginas/quienesSomos_V");
        }
                
        public function recibeContactenos(){         
            // Se reciben todos los campos del formulario, desde quienesSomos_V.php 
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombreUsuario"]) && !empty($_POST["telefonoUsuario"]) && !empty($_POST["correoUsuario"]) && !empty($_POST["asunto"])){
                //si son enviados por POST y sino estan vacios, entra aqui
                $RecibeDatos = [
                    // DATOS DEL USUARIO
                    'Nombre' => filter_input(INPUT_POST, "nombreUsuario", FILTER_SANITIZE_STRING),
                    'Telefono' => filter_input(INPUT_POST, "telefonoUsuario", FILTER_SANITIZE_NUMBER_INT),
                    'Correo' => $_POST['correoUsuario'],
                    'Asunto' => filter_input(INPUT_POST, "asunto", FILTER_SANITIZE_STRING)
                ];
            }

            // echo "<pre>";
            // print_r($RecibeDatos);
            // echo "</pre>";
            // exit();
            
            // // ****************************************

            //Se envia al correo pcabeza7@gmail.com el mensaje que el usaurio a dejado
            $email_subject = 'Mensaje desde contactenos'; 
            $email_to = 'pcabeza7@gmail.com';  
            $headers = 'From: PedidoRemoto'.'<'.$RecibeDatos['Correo'].'>';
            $email_message = $RecibeDatos['Asunto'];

            mail($email_to, $email_subject, $email_message, $headers); 

            // ****************************************

            $this->vista("inc/header");
            $this->vista("paginas/quienesSomos_V");
        }
        
        public function descargaApp(){
            $this->vista("inc/header");
            $this->vista("paginas/descargaApp_V");
        }

        public function categorias(){ 
            header("Location: ../Categoria_C");
        }
        
        //Ulilizada en su momento para pasar imagene de la tabla opciones a la tabla imagenes
        public function borrar(){
            // $Fotografia = $this->ConsultaMenu_M->consultarSecciones();

            // echo '<pre>';
            // print_r($Fotografia);
            // echo '</pre>';
            // exit;

            // $this->ConsultaMenu_M->InsertarsECCIONES_IMAGENES($Fotografia);
            
            // $SeccionesImagenes = $this->ConsultaMenu_M->consultarSeccionesImagenes();
            // echo '<pre>';
            // print_r($SeccionesImagenes);
            // echo '</pre>';
            // exit;

            // $this->ConsultaMenu_M->ActualizaSeccionesImgenes($SeccionesImagenes);
        }
    }
?>
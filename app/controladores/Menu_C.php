<?php
    class Menu_C extends Controlador{

        public function __construct(){
            // $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){
            $this->vista("paginas/afiliacion_V");
        }

        public function afiliacion(){
            $this->vista("inc/header");
            $this->vista("paginas/afiliacion_V");
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
                    'Correo' => filter_input(INPUT_POST, "correoUsuario", FILTER_SANITIZE_STRING),
                    'Asunto' => filter_input(INPUT_POST, "asunto", FILTER_SANITIZE_STRING)
                ];
            }

            // echo "<pre>";
            // print_r($RecibeDatos);
            // echo "</pre>";
            // exit();

            //Se envia al correo pcabeza7@gmail.com el mensaje que el usaurio a dejado
            $email_to = "pcabeza7@gmail.com";
            $email_subject = "Mensaje de usuario de PedidoRemoto";  
            $email_message = $RecibeDatos['Asunto'];
            $headers = 'From: ' . $RecibeDatos['Correo'] . "\r\n".

            'Reply-To: ' . $RecibeDatos['Correo'] . "\r\n" .

            'X-Mailer: PHP/' . phpversion();

            mail($email_to, $email_subject, $email_message, $headers); 

            $this->vista("inc/header");
            $this->vista("paginas/quienesSomos_V");
        }
        
        public function descargaApp(){
            $this->vista("inc/header");
            $this->vista("paginas/descargaApp_V");
        }
    }
?>
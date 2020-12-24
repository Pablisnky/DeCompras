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
        
        //Invocado desde reciboCompra.php
        public function noConformidad($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Pedido, Fecha de la compra, hora de la compra y la tienda separados por coma, se convierte en array para separar los elementos

            $DatosAgrupados = explode(",", $DatosAgrupados);

            $ID_Pedido = $DatosAgrupados[0];
            $Fecha = $DatosAgrupados[1];
            $Hora = $DatosAgrupados[2];
            $Tienda = $DatosAgrupados[3];

            $Datos = [
                'id_pedido' => $ID_Pedido,
                'fecha' => $Fecha,
                'hora' => $Hora,
                'tienda' => $Tienda,
            ];
            
            $this->vista("inc/header");
            $this->vista("paginas/noConformidad_V", $Datos);
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
    }
?>
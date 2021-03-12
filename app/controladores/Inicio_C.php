<?php
    class Inicio_C extends Controlador{

        public function __construct(){
            $this->ConsultaInicio_M = $this->modelo("Inicio_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();

            //Consulta fecha y hora de servidores php y MySQL  
            // date_default_timezone_set('America/Caracas');
            // $Fecha_Hora = $this->ConsultaInicio_M->consultarFechaHora();
            // echo date('D') . '<br>';
            // echo 'Hora PHP ' . date('H:i a') . '<br>';
            // echo 'Hora PHP ' . date('h:i a') . '<br>';
            // echo '<pre>';
            // print_r($Fecha_Hora);
            // echo '</pre>';
            // exit;
        }
        
        public function index(){
            //Si se ha escrito en la url un controlador que no existe, se CONSULTA si es un acceso directo a tienda 
            $Link_Tienda = $this->ConsultaInicio_M->consultarLinkTiendas();
            // echo '<pre>';
            // print_r($Link_Tienda);
            // echo '</pre>';
            // exit;

            foreach($Link_Tienda as $row){
                $Link = $row['link_acceso'];
                $url = $row['url'];
                // echo RUTA_URL . '/' . $_GET["url"];
                // echo '<br>';
                // echo $_GET["url"];
                // exit;
                // if(!empty($_GET["url"])){
                    if($Link == RUTA_URL . '/' . $_GET["url"]){   
                        header("Location: $url");
                    // }
                }
            }
            
            $this->vista("inc/header_inicio"); 
            $this->vista("paginas/inicio_V");            
        }
        
        // Llamado desde CerrarS_C.php
        public function NoVerificaLink(){
            $this->vista("inc/header_inicio"); 
            $this->vista("paginas/inicio_V");            
        }
    }
?>
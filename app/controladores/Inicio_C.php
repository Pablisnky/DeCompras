<?php
    class Inicio_C extends Controlador{

        public function __construct(){
            $this->ConsultaInicio_M = $this->modelo("Inicio_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index(){
            //Si se ha escrito en la url un controlador que no existe, se CONSULTA si es un acceso directo a tienda 
            $Link_Tienda = $this->ConsultaInicio_M->consultarLinkTiendas();
            // print_r($Link_Tienda);
            // echo '<br>';
            foreach($Link_Tienda as $row){
                $Link = $row['link_acceso'];
                $url = $row['url'];
                // echo $url;
                // echo '<br>';
                // echo 'http://localhost/proyectos/PidoRapido/Vitrina_C/index/243,Otaku%20Claud%20Gat,NoNecesario_1,NoNecesario_2#no-back-button';
                // echo '<br>';
                // echo $Link;
                // echo '<br>';
                // kuecho RUTA_URL . '/' . $_GET["url"];
                    // exit;
                if(!empty($_GET["url"])){
                    if($Link == RUTA_URL . '/' . $_GET["url"]){                
                        //Redirección
                        header("Location: $url");
                    }
                }
            }
            //Se CONSULTA la cantidad de tiendas que estan afiliadas por categorias
            $Datos = $this->ConsultaInicio_M->consultarCantidadTiendas();
            
            $this->vista("inc/header_inicio", $Datos); 
            $this->vista("paginas/inicio_V", $Datos);
            
        }
    }
?>
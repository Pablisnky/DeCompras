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

            // $Dolar = "<p id='XX'></p>";
            
            // require(RUTA_APP . "/controladores/complementos/CambioDolar_C.php");
            // $this->ActualizarPrecio = new CalculoDolar_C();
            // $this->ActualizarPrecio->AjusteCambioMonetario($Dolar);
            
            // echo 'Perfecto, Dolar actualizado' . '<br>';
            // echo "<a href='javascript: history.go(-1)'>Regresar</a>";            
            ?>

            <!-- Se consume la API de DolarToday para obtener el precio del dolar, no se puede utilizar la funcion nativa de php json_decode porque la API viene con un error en el Json, una palabra "sábado" tiene problemas con acento -->
            <!-- <script>
                async function TraerPais(){
                    const respuesta = await fetch('https://s3.amazonaws.com/dolartoday/data.json');

                    const API_Json = respuesta.json();

                    return API_Json;
                }

                function PrecioDolar(n){
                    document.getElementById("XX").innerHTML = n.USD['promedio_real'];
                }

                TraerPais().then(PrecioDolar);
            </script>  -->
        <?php
        }
        
        public function index(){
            //Si se ha escrito en la url (www.pedidoremot.com/lo_que_sea) se procede a consultar si es un acceso directo a una tienda 
            $Link_Tienda = $this->ConsultaInicio_M->consultarLinkTiendas();
            // echo '<pre>';
            // print_r($Link_Tienda);
            // echo '</pre>';
            
            // echo '**********************<br>';
            // exit;

            if(!empty($_GET["url"])){
                foreach($Link_Tienda as $row)   :
                    $Link = $row['link_acceso'];
                    $url = RUTA_URL . '/' . $_GET['url'];
                    $LinkTienda = $row['url'];
                    // echo '<b>Link en BD:</b> ' . '<br>';
                    // echo $Link . '<br><br>';
                    // echo  '<b>url escrita por el usuario: </b>' . '<br>';
                    // echo  $url . '<br><br>';
                    // echo  '<b>Dirección real de la tienda, guardada en BD: </b>' . '<br>';
                    // echo $LinkTienda . '<br><br>';
                    // echo  '<b>Dirección real de la tienda: </b>' . '<br>';
                    // echo "https://www.pedidoremoto.com/Vitrina_C/index/265,La%20Bodega%20Digital,NoNecesario_1,NoNecesario_2,Cerrado,AbreTarde,02:00%20PM#no-back-button" . '<br>';
                    // echo '<br>';
                    // // echo $_GET["url"];
                    // exit;
                    if($Link == $url){   
                        header('Location:' . $LinkTienda);
                        // terminamos inmediatamente la ejecución del script, evitando que se envíe más salida al cliente.
                        die();
                    }
                endforeach;
            }
            else{                  
                $this->vista("inc/header_inicio"); 
                $this->vista("view/inicio_V");   
            }     
        }
        
        // Llamado desde CerrarS_C.php
        public function NoVerificaLink(){
            $this->vista("inc/header_inicio"); 
            $this->vista("view/inicio_V");            
        }
    }
?>
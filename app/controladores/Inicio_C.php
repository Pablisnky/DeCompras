<?php
    class Inicio_C extends Controlador{

        public $DolarHoy; //Declarada public todos los metodos de esta clase pueden consumir esta propiedad

        public function __construct(){
            $this->ConsultaInicio_M = $this->modelo("Inicio_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
            
            //Solicita el precio del dolar
            require(RUTA_APP . "/controladores/Menu_C.php");
            $this->PrecioDolar = new Menu_C();
            $this->DolarHoy = $this->PrecioDolar->Dolar;
        }
        
        public function index(){
            //Si se ha escrito en la url (www.pedidoremot.com/lo_que_sea) $_GET["url"] no estará vacio por lo que se procede a consultar si es un acceso directo a una tienda 
            $Link_Tienda = $this->ConsultaInicio_M->consultarLinkTiendas();
            // echo '<pre>';
            // print_r($Link_Tienda);
            // echo '</pre>';
            // echo RUTA_URL . '/' . $_GET['url'] . '<br>';

            $Datos = $this->DolarHoy;

            if(!empty($_GET['url'])){
                foreach($Link_Tienda as $row)   :
                    if(RUTA_URL . '/' . $_GET['url'] == $row['link_acceso']){
                        // Se consulta el nombre de la tienda segun el link recibido
                        $Nombre_Tienda = $this->ConsultaInicio_M->consultarNombreTienda($row['ID_Tienda']);
                        // echo '<pre>';
                        // print_r($Nombre_Tienda);
                        // echo '</pre>';

                        $Nombre_Tienda = $Nombre_Tienda[0]['nombre_Tien'];
                        // echo $Nombre_Tienda;

                        //CALCULO DE DISPONIBILIDAD HORARIA (necesaria para construir la ruta URL)     
                        require(RUTA_APP . "/controladores/complementos/CalculoApertura_C.php");
                        $this->Horario = new CalculoApertura_C;

                        //se declara un array donde su primera posicion es otro array, esto es asi porque el metodo disponibilidadHoraria en CalculoApertura_C.php lo exige
                        $this->TiendasEnCategoria = array(array('ID_Tienda' => $row['ID_Tienda']));
                        
                        $DisponibilidaHoraria = $this->Horario->disponibilidadHoraria($this->TiendasEnCategoria);
                        // echo '<pre>';
                        // print_r($DisponibilidaHoraria);
                        // echo '</pre>';
                        // exit();

                        $Disponibilidad = $DisponibilidaHoraria[0]['disponibilidad'];
                        $proximoApertura = $DisponibilidaHoraria[0]['proximoApertura'];
                        $horaApertura = $DisponibilidaHoraria[0]['horaApertura'];

                        //Se construye la url real de la tienda
                        $URL = RUTA_URL.'/'.'Vitrina_C/index/'.$row['ID_Tienda'].','.$Nombre_Tienda.',NoNecesario_1,NoNecesario_2,'.$Disponibilidad.','.$proximoApertura.','.$horaApertura.'#no-back-button';

                        //Se rellenan los espacios en blanco en la url construida
                        $URL = str_replace(' ', '%20', $URL);
                        
                        header('Location:'. $URL);
                        // terminamos inmediatamente la ejecución del script, evitando que se envíe más salida al cliente.
                        die();
                    }
                endforeach; 
            }    
            else{                  
                $this->vista("header/header_inicio"); 
                $this->vista("view/inicio_V", $Datos);   
            }            
        }
        
        //Cargar el inicio menos cuando recien se entra a la aplicación
        public function NoVerificaLink(){            
            $Datos = $this->DolarHoy;

            $this->vista("header/header_inicio"); 
            $this->vista("view/inicio_V", $Datos);            
        }
    }
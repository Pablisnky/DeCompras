<?php
    class NoConformidad_C extends Controlador{

        public function __construct(){
            session_start();
            
            $this->ConsultaNoConformidad_M = $this->modelo("NoConformidad_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        public function index(){
        }

        //Invocado desde reciboCompra_mail.php; muestra el formulario de no conformidad
        public function noConformidad($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Pedido, Fecha de la compra, hora de la compra y la tienda separados por coma, se convierte en array para separar los elementos

            $DatosAgrupados = explode(",", $DatosAgrupados);

            $ID_Pedido = $DatosAgrupados[0];
            $Fecha = $DatosAgrupados[1];
            $Hora = $DatosAgrupados[2];
            $ID_Tienda = $DatosAgrupados[3];
            $Tienda = $DatosAgrupados[4];

            $Datos = [
                'id_tienda' => $ID_Tienda,
                'id_pedido' => $ID_Pedido,
                'fecha' => $Fecha,
                'hora' => $Hora,
                'tienda' => $Tienda,
            ];

            $ValorExigidoForm = 1906;  
            $_SESSION['verifica_NoConformidad'] = $ValorExigidoForm; 
            //Se crea esta sesion para impedir que se acceda a la pagina que procesa el formulario (noConformidad_V.php) o se recargue mandandolo varias veces a la base de datos
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;
            
            $this->vista("inc/header");
            $this->vista("paginas/noConformidad_V", $Datos);
        }
        
        //Invocado desde noConformidad_V.php para recibir el formulario de no conformidad
        public function recibeNoConformidad(){
            $ValorExigidoForm = $_SESSION['verifica_NoConformidad'];  
            if($ValorExigidoForm == 1906){// Anteriormente en el metodo noConformidad de esta clase se generó la variable $_SESSION["verifica_NoConformidad"] con un valor de 1906; con esto se evita que no se pueda recarga esta página.
                unset($_SESSION['verifica_NoConformidad']);//se borra la sesión verifica. 

                if($_SERVER["REQUEST_METHOD"] == "POST" && !empty(!empty($_POST["id_tienda"]) ||!empty($_POST["id_pedido"]) ||!empty($_POST["noConformidad_1"]) || !empty($_POST["noConformidad_2"]) || !empty($_POST["noConformidad_3"]) || !empty($_POST["noConformidad_4"]) || !empty($_POST["otraNoConformidad"]))) {
                    //si son enviados por POST y sino estan vacios, entra aqui 
                    $RecibeNoConformidad = [
                        'ID_Tienda' => filter_input(INPUT_POST, "id_tienda", FILTER_SANITIZE_NUMBER_INT),
                        'ID_Pedido' => filter_input(INPUT_POST, "id_pedido", FILTER_SANITIZE_NUMBER_INT),
                        'NoConformidad_1' => empty($_POST['noConformidad_1']) ? 0 : 1,
                        'NoConformidad_2' => empty($_POST['noConformidad_2']) ? 0 : 1,
                        'NoConformidad_3' => empty($_POST['noConformidad_3']) ? 0 : 1,
                        'NoConformidad_4' => empty($_POST['noConformidad_4']) ? 0 : 1,
                        'OtraNoConformidad' => filter_input(INPUT_POST, 'otraNoConformidad',FILTER_SANITIZE_STRING),
                    ];
                    // echo "<pre>";
                    // print_r($RecibeNoConformidad);
                    // echo "</pre>";
                    // exit();
                }
                else{
                    echo "No especificó una inconformidad" . "<br>";
                    echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                    exit();
                }
                
                //Se INSERTA la no conformidad en la BD
                $this->ConsultaNoConformidad_M->insertarNoConformidad($RecibeNoConformidad);
                
                // ****************************************
                $Datos = 'AcuseRecibo';
                $this->vista("inc/header");
                $this->vista("paginas/noConformidad_V", $Datos);
            }
            else{
                header('location:' . RUTA_URL);
            } 
        }
    }
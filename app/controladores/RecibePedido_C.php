<?php
//Archivo llamado desde 

    class RecibePedido_C extends Controlador{

        public function __construct(){
            $this->ConsultaRecibePedido_M = $this->modelo("RecibePedido_M");
        }
        
        public function index(){
            $this->vista("paginas/RecibePedido_V/recibeRegistro");
        }

        public function recibePedido(){          
            // Se reciben todos los campos del formulario, desde carrito_V.php 
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["cedula"]) && !empty($_POST["telefono"]) && !empty($_POST["direccion"]) && !empty($_POST["pedido"])){
                //si son enviados por POST y sino estan vacios, entra aqui
                $RecibeDatos = [
                    'Nombre' => filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING),
                    'Apellido' => filter_input(INPUT_POST, "apellido", FILTER_SANITIZE_STRING),
                    'Cedula' => filter_input(INPUT_POST, "cedula", FILTER_SANITIZE_STRING),
                    'Telefono' => filter_input(INPUT_POST, "telefono", FILTER_SANITIZE_STRING),
                    'Direccion' => filter_input(INPUT_POST, "direccion", FILTER_SANITIZE_STRING), 
                    'Pedido' => filter_input(INPUT_POST, "pedido", FILTER_SANITIZE_STRING), 
                ];
               
                $RecibeDatos = [
                        'Nombre' => ucwords($_POST["nombre"]),  
                        'Apellido' => mb_strtolower($_POST["apellido"]),                       
                        'Cedula' => is_numeric($_POST["cedula"]) ? $_POST["cedula"]: false,
                        'Telefono' => is_numeric($_POST["telefono"]) ? $_POST["telefono"]: false,
                        'Direccion' => $_POST["direccion"],
                        'Pedido' => $_POST["pedido"],
                ];
                
                //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                if($RecibeDatos["Telefono"] == false){      
                    exit("El telefono debe ser solo números");
                }
                //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                if($RecibeDatos["Cedula"] == false){      
                    exit("La cedula debe ser solo números");
                }
                
                //Se genera un número aleatorio para asociarlo al pedido
                $Aleatorio = mt_rand(1000000,999999999);
                
                //Se toma el pedido y como es un objeto JSON se guarda en un array asociativo
                $Pedido = json_decode($RecibeDatos["Pedido"], true);
            }
            else{
                echo "Llene todos los campos del formulario de registro";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            //Se INSERTAN los datos del usuario en la BD
            $this->ConsultaRecibePedido_M->insertarUsuario($RecibeDatos, $Aleatorio);
            
            //Se INSERTAN los datos del pedido en la BD
            $this->ConsultaRecibePedido_M->insertarPedio($Pedido, $Aleatorio);

            // //Se CONSULTA el ID_Afiliado del participante registrados en el sistema con la Cedula dado como argumento
            // // $ID_Afiliado= $this->ConsultaRegistro_M->consultarUsuario($RecibeDatos['Cedula']);
            // // $Datos=[
            // //     "ID_Afiliado" => $ID_Afiliado,
            // // ];
            // // print_r($ID_Afiliado);
            // // echo "<br>";

            // //Se INSERTA el ID_Afiliado en la tabla usuario para almacenar la contraseña.
            // // $this->ConsultaRegistro_M->insertarClaveUsuario($Datos, $ClaveCifrada);

            $this->vista("paginas/RecibePedido_V");
        }
    }
?>    
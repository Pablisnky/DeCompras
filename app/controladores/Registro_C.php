<?php
    class Registro_C extends Controlador{

        public function __construct(){            
            $this->ConsultaRegistro_M = $this->modelo("Registro_M");           
        }
        
        //Siempre cargara el metodo por defecto sino se pasa un metodo especifico
        public function index(){
            session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
            $verifica = 1906;  
            $_SESSION["verifica"] = $verifica; 
        }

        public function registroComerciante(){
            //CONSULTA las categorias de tiendas que existen en la BD
            $Categorias = $this->ConsultaRegistro_M->consultarCategorias();
            $Datos = $Categorias->fetchAll(PDO::FETCH_ASSOC); 

            $this->vista("paginas/registroCom_V", $Datos);
        }
        
        public function registroDespachador(){
            $this->vista("paginas/registroDes_V");
        }
   
        public function recibeRegistro(){            
            //Se reciben todos los campos del formulario, desde registro_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST"
            //  && !empty($_POST["nombre_Afcom"]) && !empty($_POST["correo_Afcom"]) && !empty($_POST["nombre_com"]) && !empty($_POST["clave_Afcom"]) && !empty($_POST["confirmarClave_Afcom"])
            ){
               
                $RecibeDatos = [
                    //Recibe datos de la persona responsable
                    'Nombre_Afcom' => filter_input(INPUT_POST, "nombre_Afcom", FILTER_SANITIZE_STRING),
                    'Correo_Afcom' => filter_input(INPUT_POST, "correo_Afcom", FILTER_SANITIZE_STRING),
                    
                    //Recibe datos de la tienda
                    'Nombre_com' => filter_input(INPUT_POST, "nombre_com", FILTER_SANITIZE_STRING),

                    //Recibe datos de acceso
                    'Clave_Afcom' => filter_input(INPUT_POST, "clave_Afcom", FILTER_SANITIZE_STRING), 
                    'RepiteClave_Afcom' => filter_input(INPUT_POST, "confirmarClave_Afcom", FILTER_SANITIZE_STRING),
                ];
                // echo "<pre>";
                // print_r($RecibeDatos);
                // echo "</pre>";
                // exit;
                // $RecibeDatos = [
                //         'Nombre' => ucwords($_POST["nombre"]),                       
                //         'Cedula' => is_numeric($_POST["cedula"]) ? $_POST["cedula"]: false,
                //         'Telefono' => is_numeric($_POST["telefono"]) ? $_POST["telefono"]: false,
                //         'Correo' => mb_strtolower($_POST["correo"]),  
                //         'Clave' => $_POST["clave"],
                //         'RepiteClave' => $_POST["confirmarClave"],
                // ];

                //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                // if($RecibeDatos["Telefono_Afcom"] == false){      
                //     exit("El telefono debe ser solo números");
                // }
                // //Despues de evaluar con is_numeric se da un aviso en caso de fallo
                // if($RecibeDatos["Cedula_Afcom"] == false){      
                //     exit("La cedula debe ser solo números");
            }
            else{
                echo "Llene todos los campos del formulario de registro";
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
                exit();
            }

            //Se INSERTAN los datos personales del responsable de la tienda en la BD y se retorna el ID del registro recien insertado
            $ID_AfiliadoCom = $this->ConsultaRegistro_M->insertarAfiliadoComercial($RecibeDatos);
           
            //Se INSERTAN los datos de la tienda en la BD
            $this->ConsultaRegistro_M->insertarTienda($RecibeDatos, $ID_AfiliadoCom);        

            //Se consulta el ID_Categoria de las categorias seleccionadas
            // $ID_Categoria = $this->ConsultaRegistro_M->consultarID_Categoria($Categoria);
            // $ID_Categ = $ID_Categoria->fetchAll(PDO::FETCH_ASSOC); 

            //Se INSERTAN los ID_Categoria de las categorias en las que se encuentra la tienda
            // $this->ConsultaRegistro_M->insertarCategoriaTienda($ID_Categ, $ID_Tienda);
            
            //Se INSERTAN los datos bancarios de la tienda en la BD
            // $this->ConsultaRegistro_M->insertarBancos($Banco, $Titular, $NumeroCuenta, $Rif, $ID_AfiliadoCom);

            //se cifran la contraseña del afiliado con un algoritmo de encriptación
            $ClaveCifrada= password_hash($RecibeDatos["Clave_Afcom"], PASSWORD_DEFAULT);
            
            //Se INSERTAN los datos de acceso de la cuenta comerciante en la BD
            $this->ConsultaRegistro_M->insertarAccesoAfiliado($ID_AfiliadoCom, $ClaveCifrada);

            //Redirecciona, La función redireccionar se encuantra en url_helper.php
            redireccionar("/Login_C/");
        }
    }
?>    
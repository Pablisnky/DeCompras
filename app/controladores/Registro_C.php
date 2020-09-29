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
            //Se reciben todos los campos del formulario, desde registroCom_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre_Afcom"]) && !empty($_POST["correo_Afcom"]) && !empty($_POST["nombre_tienda"]) && !empty($_POST["clave_Afcom"]) && !empty($_POST["confirmarClave_Afcom"])
            ){
               
                $RecibeDatos = [
                    //Recibe datos de la persona responsable
                    'Nombre_Afcom' => filter_input(INPUT_POST, "nombre_Afcom", FILTER_SANITIZE_STRING),
                    'Correo_Afcom' => filter_input(INPUT_POST, "correo_Afcom", FILTER_SANITIZE_STRING),
                    
                    //Recibe datos de la tienda
                    'Nombre_tienda' => filter_input(INPUT_POST, "nombre_tienda", FILTER_SANITIZE_STRING),

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
                //         'Correo' => mb_strtolower($_POST["correo"]),  
                //         'Clave' => $_POST["clave"],
                //         'RepiteClave' => $_POST["confirmarClave"],
                // ];
            }
            else{      
                echo "Debe Llenar todos los campos vacios". "<br>";
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }

            //Las siguientes tres inserciones se realizan por medio de transacciones
            try{
                //se cifran la contraseña del afiliado con un algoritmo de encriptación
                $ClaveCifrada= password_hash($RecibeDatos["Clave_Afcom"], PASSWORD_DEFAULT);
                
                $ID_AfiliadoCom = $this->ConsultaRegistro_M->startTransaction();

                    //Se INSERTAN los datos personales del responsable de la tienda en la BD y se retorna el ID del registro recien insertado
                    $ID_AfiliadoCom = $this->ConsultaRegistro_M->insertarAfiliadoComercial($RecibeDatos);
                
                    //Se INSERTAN los datos de la tienda en la BD
                    $this->ConsultaRegistro_M->insertarTienda($RecibeDatos, $ID_AfiliadoCom);        
                            
                    //Se INSERTAN los datos de acceso de la cuenta comerciante en la BD
                    $this->ConsultaRegistro_M->insertarAccesoAfiliado($ID_AfiliadoCom, $ClaveCifrada);

                $this->ConsultaRegistro_M->commit();
            }
            catch(Exception $e){
                $this->ConsultaRegistro_M->rollback();
            }

            //Redirecciona, La función redireccionar se encuantra en url_helper.php
            redireccionar("/Login_C/");
        }

        public function VerificarCorreo($Correo){
            //CONSULTA los correos de afiliados existente en la BD
            $Consulta = $this->ConsultaRegistro_M->consultarCorreo();
            $CorreoBD = $Consulta->fetchAll(PDO::FETCH_ASSOC); 

            foreach($CorreoBD as $key){
                $CorreoBD =  $key['correo_AfiCom'];

                if($CorreoBD == $Correo){
                    echo "La dirección de correo ya existe";  ?>
                    <style>
                        .contenedor_43{
                            background-color:yellow;  
                            display: block;
                            text-align: center; 
                            font-size: 0.9em;    
                        }
                    </style>
                    <?php
                }
            }
        }

        public function VerificarClave($Clave){
            //CONSULTA las claves de afiliados existente en la BD
            $Consulta = $this->ConsultaRegistro_M->consultarClave();
            $ClaveBD = $Consulta->fetchAll(PDO::FETCH_ASSOC);

            foreach($ClaveBD as $key){
                $ClaveBD =  $key['claveCifrada'];
                if($Clave == password_verify($Clave, $ClaveBD)){
                    echo "La contraseña que introdujo ya existe en nuestros registros"; ?>
                    <style>
                        .contenedor_3{
                            background-color: yellow;  
                            display: block;
                            text-align: center;     
                        }
                    </style>
                    <?php
                }
            }
        }
    }
?>    
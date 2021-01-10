<?php
    class Registro_C extends Controlador{

        public function __construct(){  
            session_start(); 

            $this->ConsultaRegistro_M = $this->modelo("Registro_M");  

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        //Siempre cargara el metodo por defecto sino se pasa un metodo especifico
        public function index(){
        }

        public function registroComerciante(){  
            //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
            $Verifica_AfiliacionComerciante = 1906;  
            $_SESSION["Verifica_AfiliacionComerciante"] = $Verifica_AfiliacionComerciante; 

            $this->vista("inc/header");
            $this->vista("paginas/registroCom_V");
        }
        
        public function registroDespachador(){
            $this->vista("paginas/registroDes_V");
        }
   
        public function recibeRegistroCom(){            
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
                
                    //Se INSERTAN los datos de la tienda en la BD y se retorna el ID del registro recien insertado
                    $ID_Tienda = $this->ConsultaRegistro_M->insertarTienda($RecibeDatos, $ID_AfiliadoCom);        
                            
                    //Se INSERTAN los datos de acceso de la cuenta comerciante en la BD
                    $this->ConsultaRegistro_M->insertarAccesoComerciante($ID_AfiliadoCom, $ClaveCifrada);
                    
                    //Se INSERTAN el campo de horario en la BD
                    $this->ConsultaRegistro_M->insertarHabilitarHorario_LV($ID_Tienda);
                    
                    //Se INSERTAN el campo de horario de sabado y domingo en la BD
                    $this->ConsultaRegistro_M->insertarHabilitarHorario_FS($ID_Tienda);

                $this->ConsultaRegistro_M->commit();
            }
            catch(Exception $e){
                $this->ConsultaRegistro_M->rollback();
            }
            
            // ****************************************

            //Se envia al correo pcabeza7@gmail.com la notificación de nuevo cliente registrado
            $email_subject = 'Nueva tienda registrada en PedidoRemoto'; 
            $email_to = 'pcabeza7@gmail.com'; 
            $headers = 'From: PedidoRemoto<master@pedidoremoto.com>';
            $email_message = 'Tienda afiliada' . ' ' . $RecibeDatos['Nombre_tienda'];

            mail($email_to, $email_subject, $email_message, $headers); 

            // ****************************************

            //Redirecciona, La función redireccionar se encuantra en url_helper.php
            redireccionar("/Login_C/index/CNE");
        }
   
        public function recibeRegistroDes(){            
            //Se reciben todos los campos del formulario, desde registroDes_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER['REQUEST_METHOD'] == 'POST' 
            // && !empty($_POST['nombre_AfiDes']) && !empty($_POST['apellido_AfiDes']) && !empty($_POST['cedula_AfiDes']) && !empty($_POST['telefono_AfiDes']) && !empty($_POST['correo_AfiDes']) && !empty($_POST['clave_AfiDes']) && !empty($_POST['confirmarClave_AfiDes'])
            ){
                //Se guarda en un arrya los datos recibidos; este paso solo es para verificar lo recibido con lo saneado
                $RecibeDatos = [
                    'Nombre_AfiDes' => $_POST['nombre_AfiDes'],
                    'Apellido_AfiDes' => $_POST['apellido_AfiDes'],
                    'Cedula_AfiDes' => $_POST['cedula_AfiDes'],
                    'Telefono_AfiDes' => $_POST['telefono_AfiDes'],
                    'Correo_AfiDes' => $_POST['correo_AfiDes'],
                    'Clave_AfiDes' => $_POST['clave_AfiDes'], 
                    'RepiteClave_AfiDes' => $_POST['confirmarClave_AfiDes'],
                ];
                // echo "<pre>";
                // print_r($RecibeDatos);
                // echo "</pre>";
                // exit();

                //Se realiza la primera etapa de saneamiento
                // $RecibeDatos = [
                //     'Nombre_AfiDes' => filter_input(INPUT_POST, "nombre_AfiDes", FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES),
                //     'Apellido_AfiDes' => filter_input(INPUT_POST, "apellido_AfiDes", FILTER_SANITIZE_STRING),
                //     'Cedula_AfiDes' => filter_input(INPUT_POST, "cedula_AfiDes", FILTER_SANITIZE_NUMBER_INT),
                //     'Telefono_AfiDes' => filter_input(INPUT_POST, "telefono_AfiDes", FILTER_SANITIZE_NUMBER_INT),
                //     'Correo_AfiDes' => filter_input(INPUT_POST, "correo_AfiDes", FILTER_SANITIZE_EMAIL),

                //     //Recibe datos de acceso
                //     'Clave_AfiDes' => filter_input(INPUT_POST, "clave_AfiDes", FILTER_SANITIZE_STRING), 
                //     'RepiteClave_AfiDes' => filter_input(INPUT_POST, "confirmarClave_AfiDes", FILTER_SANITIZE_STRING),
                // ];
                // echo "<pre>";
                // print_r($RecibeDatos);
                // echo "</pre>";
                // exit;
            }
            else{      
                echo "Debe Llenar todos los campos vacios". "<br>";
                echo "<a href='javascript:history.back()'>Regresar</a>";
                exit();
            }

            //Las siguientes dos inserciones se realizan por medio de transacciones
            //se cifra la contraseña del afiliado con un algoritmo de encriptación
            $ClaveCifrada= password_hash($RecibeDatos["Clave_AfiDes"], PASSWORD_DEFAULT);

            //Se INSERTAN los datos del despachador y se retorna el ID del registro recien insertado
            $ID_AfiliadoDes = $this->ConsultaRegistro_M->insertarAfiliadoDespachador($RecibeDatos);
                          
            //Se INSERTAN los datos de acceso del despachador
            $this->ConsultaRegistro_M->insertarAccesoDespachador($ID_AfiliadoDes, $ClaveCifrada);

            //Se envia al correo pcabeza7@gmail.com el mensaje que el usaurio a dejado
            $email_to = 'pcabeza7@gmail.com';
            $email_subject = 'Nuevo despachador en PedidoRemoto';  
            $email_message = 'Despachador afiliada';
            $headers = 'From: ' . 'master@pedidoremoto.com' . '\r\n'.

            'Reply-To: ' . 'master@pedidoremoto.com' . '\r\n' .

            'X-Mailer: PHP/' . phpversion();

            mail($email_to, $email_subject, $email_message, $headers);
            //Redirecciona, La función redireccionar se encuantra en url_helper.php
            header("location:" . RUTA_URL . "/Login_C");
        }

        public function VerificarCorreo($Correo, $Afiliado){
            if(($Afiliado) == 'AfiDes'){
                //CONSULTA los correos de despachadores existente en la BD
                $Consulta = $this->ConsultaRegistro_M->consultarCorreoDes();
                $CorreoBD = $Consulta->fetchAll(PDO::FETCH_ASSOC); 
                
                foreach($CorreoBD as $key){
                    $CorreoBD =  $key['correo_AfiDes'];

                    if($CorreoBD == $Correo){
                        echo "La dirección de correo ya existe";  ?>
                        <style>
                            .contenedor_43{
                                background-color: yellow;  
                                display: block;
                                text-align: center; 
                                font-size: 0.9em;    
                            }
                        </style>
                        <?php
                    }
                }
            }
            else{
                //CONSULTA los correos de comerciantes existente en la BD
                $Consulta = $this->ConsultaRegistro_M->consultarCorreoCom();
                $CorreoBD = $Consulta->fetchAll(PDO::FETCH_ASSOC); 
            
                foreach($CorreoBD as $key){
                    $CorreoBD =  $key['correo_AfiCom'];
    
                    if($CorreoBD == $Correo){
                        echo "La dirección de correo ya existe";  ?>
                        <style>
                            .contenedor_43{
                                background-color: yellow;  
                                display: block;
                                text-align: center; 
                                font-size: 0.9em;    
                            }
                        </style>
                        <?php
                    }
                }
            }
        }

        public function VerificarClave($Clave, $Afiliado){
            if(($Afiliado) == 'AfiDes'){
                //CONSULTA las claves de afiliados existente en la BD
                $Consulta = $this->ConsultaRegistro_M->consultarClaveDes();
                $ClaveBD = $Consulta->fetchAll(PDO::FETCH_ASSOC);

                foreach($ClaveBD as $key){
                    $ClaveBD =  $key['claveCifradaDes'];
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
            else{
                //CONSULTA las claves de afiliados existente en la BD
                $Consulta = $this->ConsultaRegistro_M->consultarClaveCom();
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
    }?>
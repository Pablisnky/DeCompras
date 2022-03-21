<?php
    class Registro_C extends Controlador{

        public function __construct(){  
            session_start(); 

            $this->ConsultaRegistro_M = $this->modelo('Registro_M');  

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        //Llamado desde afiliacion_V
        public function registroComerciante(){  
            //se crea una sesion llamada Verifica_AfiliacionComerciante, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
            $Verifica_AfiliacionComerciante = 1906;  
            $_SESSION['Verifica_AfiliacionComerciante'] = $Verifica_AfiliacionComerciante; 

            $this->vista('header/header');
            $this->vista('view/registroCom_V');
        }
        
        //Llamado desde afiliacion_V
        public function registroMayorista(){  
            //se crea una sesion llamada Verifica_AfiliacionMayorista, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
            $Verifica_AfiliacionMayorista = 1908;  
            $_SESSION['Verifica_AfiliacionMayorista'] = $Verifica_AfiliacionMayorista; 

            $this->vista('header/header');
            $this->vista('view/registroMay_V');
        }

        public function registroDespachador(){
            $this->vista('view/registroDes_V');
        }
   
        //Llamado desde 
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

            //Se verifica que el correo, la clave y el nombre de la tienda no existan en la BD, de no existir, se procede a crear la tienda, sesion creada en el metodo VerificarCorreo()
            if(!empty($_SESSION["CorreoExiste"])){
                echo 'El correo ya existe' .'<br>';
                unset($_SESSION['CorreoExiste']);
                exit("<a href='javascript:history.back()'>Regresar</a>");
            }
            else if(!empty($_SESSION["NombreIendaExiste"])){
                echo 'El nombre de tienda ya existe' .'<br>';
                unset($_SESSION['NombreIendaExiste']);
                exit("<a href='javascript:history.back()'>Regresar</a>");
            }
            else if(!empty($_SESSION["ClaveExiste"])){
                echo 'La clave no es permitida' .'<br>';
                unset($_SESSION['ClaveExiste']);
                exit("<a href='javascript:history.back()'>Regresar</a>");
            }
            else{//Si eL correo, la clave y el nombre de la tienda no existen, se procede a crear la tienda

                //se cifran la contraseña del afiliado con un algoritmo de encriptación
                $ClaveCifrada= password_hash($RecibeDatos["Clave_Afcom"], PASSWORD_DEFAULT);
                              
                $this->ConsultaRegistro_M->Transaccion_registrarTienda($RecibeDatos, $ClaveCifrada);
                                                            
                // //Se INSERTAN el campo de horario en la BD
                // $this->ConsultaRegistro_M->insertarHabilitarHorario_LV($ID_Tienda);
                
                // //Se INSERTAN el campo de horario para el día sábado en la BD
                // $this->ConsultaRegistro_M->insertarHabilitarHorario_SAB($ID_Tienda);
                
                // //Se INSERTAN el campo de horario para el día domingo en la BD
                // $this->ConsultaRegistro_M->insertarHabilitarHorario_DOM($ID_Tienda);

                // //Se INSERTAN el campo de horario para el día especial en la BD
                // $this->ConsultaRegistro_M->insertarHabilitarHorario_ESP($ID_Tienda);
                
                // ****************************************

                //Se envia al correo pcabeza7@gmail.com la notificación de nuevo cliente registrado
                $email_subject = 'Nueva tienda registrada en PedidoRemoto'; 
                $email_to = 'pcabeza7@gmail.com'; 
                $headers = 'From: PedidoRemoto<master@pedidoremoto.com>';
                $email_message = 'Tienda afiliada' . ' ' . $RecibeDatos['Nombre_tienda'];

                mail($email_to, $email_subject, $email_message, $headers); 

                header('location:' . RUTA_URL. '/Login_C/index/CNE');
            }
        }
   
        //Llamado desde registroMay_V
        public function recibeRegistroMay(){            
            //Se reciben todos los campos del formulario, desde registroMay_V.php se verifica que son enviados por POST y que no estan vacios
            if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre_AfiMay"]) && !empty($_POST["correo_AfiMay"]) && !empty($_POST["nombre_tienda"]) && !empty($_POST["clave_AfiMay"]) && !empty($_POST["confirmarClave_AfiMay"])
            ){               
                $RecibeDatos = [
                    //Recibe datos de la persona responsable
                    'Nombre_AfiMay' => filter_input(INPUT_POST, "nombre_AfiMay", FILTER_SANITIZE_STRING),
                    'Correo_AfiMay' => filter_input(INPUT_POST, "correo_AfiMay", FILTER_SANITIZE_STRING),
                    
                    //Recibe datos de la tienda
                    'Nombre_tienda' => filter_input(INPUT_POST, "nombre_tienda", FILTER_SANITIZE_STRING),

                    //Recibe datos de acceso
                    'Clave_AfiMay' => filter_input(INPUT_POST, "clave_AfiMay", FILTER_SANITIZE_STRING), 
                    'RepiteClave_AfiMay' => filter_input(INPUT_POST, "confirmarClave_AfiMay", FILTER_SANITIZE_STRING),
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

            //Se verifica que el correo, la clave y el nombre de la tienda no existan en la BD, de no existir, se procede a crear la tienda, sesion creada en el metodo VerificarCorreo()
            if(!empty($_SESSION["CorreoExiste"])){
                echo 'El correo ya existe' .'<br>';
                unset($_SESSION['CorreoExiste']);
                exit("<a href='javascript:history.back()'>Regresar</a>");
            }
            else if(!empty($_SESSION["NombreIendaExiste"])){
                echo 'El nombre de tienda ya existe' .'<br>';
                unset($_SESSION['NombreIendaExiste']);
                exit("<a href='javascript:history.back()'>Regresar</a>");
            }
            else if(!empty($_SESSION["ClaveExiste"])){
                echo 'La clave no es permitida' .'<br>';
                unset($_SESSION['ClaveExiste']);
                exit("<a href='javascript:history.back()'>Regresar</a>");
            }
            else{//Si eL correo, la clave y el nombre de la tienda no existen, se procede a crear la tienda

                //se cifran la contraseña del afiliado con un algoritmo de encriptación
                $ClaveCifrada= password_hash($RecibeDatos["Clave_AfiMay"], PASSWORD_DEFAULT);
                // echo $ClaveCifrada;
                // exit;
                              
                $this->ConsultaRegistro_M->Transaccion_registrarMayorista($RecibeDatos, $ClaveCifrada);
                                                                            
                // ****************************************

                //Se envia al correo pcabeza7@gmail.com la notificación de nuevo cliente registrado
                $email_subject = 'Nuevo vendedor registrado en PedidoRemoto'; 
                $email_to = 'pcabeza7@gmail.com'; 
                $headers = 'From: PedidoRemoto<master@pedidoremoto.com>';
                $email_message = 'Vendedor afiliado' . ' ' . $RecibeDatos['Nombre_tienda'];

                mail($email_to, $email_subject, $email_message, $headers); 

                header('location:' . RUTA_URL. '/Login_C/index/CNE');
            }
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

            header('location:' . RUTA_URL . '/Login_C');
        }

        public function VerificarCorreo($Correo, $Afiliado){
            if($Afiliado == 'AfiDes'){
                //CONSULTA los correos de despachadores existente en la BD
                $CorreoBD = $this->ConsultaRegistro_M->consultarCorreoDes();
                
                foreach($CorreoBD as $key){
                    $CorreoBD =  $key['correo_AfiDes'];

                    if($CorreoBD == $Correo){
                        echo 'La dirección de correo ya existe';  ?>
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
            else if($Afiliado == 'AfiCom'){
                //CONSULTA los correos de comerciantes existentes en la BD
                $CorreoBD = $this->ConsultaRegistro_M->consultarCorreoCom();
                
                if(!empty($_SESSION['CorreoExiste'])){
			        unset($_SESSION['CorreoExiste']);
                }
                
                foreach($CorreoBD as $key){
                    $CorreoBD =  $key['correo_AfiCom'];
                    
                    if($CorreoBD == $Correo){
                        echo "La dirección de correo que introdujo no es permitida";

                        //Se crea una sesion que se solicitara en el metodo recibeRegistroCom()          
                        $_SESSION["CorreoExiste"] = true;

                        ?>
                        <style>
                            #Mostrar_verificaCorreo{
                                background-color: yellow;  
                                display: block;
                                text-align: center; 
                            }
                        </style> 
                        <?php
                    }
                }
            }
            else if($Afiliado == 'AfiMay'){
                //CONSULTA los correos de mayoristas existentes en la BD
                $CorreoBD = $this->ConsultaRegistro_M->consultarCorreoMay();
                
                if(!empty($_SESSION['CorreoExiste'])){
			        unset($_SESSION['CorreoExiste']);
                }
                
                foreach($CorreoBD as $key){
                    $CorreoBD =  $key['correo_AfiMay'];
                    
                    if($CorreoBD == $Correo){
                        echo "La dirección de correo que introdujo no es permitida";

                        //Se crea una sesion que se solicitara en el metodo recibeRegistroCom()          
                        $_SESSION["CorreoExiste"] = true;

                        ?>
                        <style>
                            #Mostrar_verificaCorreo{
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

        public function verificarNombreTienda($Nombre_Tienda){
            //CONSULTA los nombres de tiendas existente en la BD
            $NombreTienda = $this->ConsultaRegistro_M->consultarNombresTiendas();
        
            foreach($NombreTienda as $key){
                $NombreTienda =  $key['nombre_Tien'];

                if($NombreTienda == $Nombre_Tienda){
                    echo "Una tienda con este nombre ya existe";  

                    //Se crea una sesion que se solicitara en el metodo recibeRegistroCom()          
                    $_SESSION["NombreIendaExiste"] = true;?>
                    
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

        public function verificarNombreMayorista($Nombre_Mayorista){
            //CONSULTA los nombres de mayorista existente en la BD
            $NombreTienda = $this->ConsultaRegistro_M->consultarNombresMayoristas();
        
            foreach($NombreTienda as $key){
                $NombreTienda =  $key['nombreMay'];

                if($NombreTienda == $Nombre_Mayorista){
                    echo "Una tienda con este nombre ya existe";  

                    //Se crea una sesion que se solicitara en el metodo recibeRegistroCom()          
                    $_SESSION["NombreIendaExiste"] = true;?>
                    
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

        public function VerificarClave($Clave, $Afiliado){
            if($Afiliado == 'AfiDes'){
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
            else if($Afiliado == 'AfiCom'){
                //CONSULTA las claves de comerciantes existentes en la BD
                $ClaveBD = $this->ConsultaRegistro_M->consultarClaveCom();
                
                if(!empty($_SESSION['ClaveExiste'])){
			        unset($_SESSION['ClaveExiste']);
                }

                foreach($ClaveBD as $key){
                    $ClaveBD =  $key['claveCifrada'];

                    if($Clave == password_verify($Clave, $ClaveBD)){
                        echo "La contraseña que introdujo no es permitida"; 
                        
                        //Se crea una sesion que se solicitara en el metodo recibeRegistroCom()          
                        $_SESSION["ClaveExiste"] = true;

                        ?>
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
            else if($Afiliado == 'AfiMay'){
                //CONSULTA las claves de mayoristas existentes en la BD
                $ClaveBD = $this->ConsultaRegistro_M->consultarClaveMay();
                
                if(!empty($_SESSION['ClaveExiste'])){
			        unset($_SESSION['ClaveExiste']);
                }

                foreach($ClaveBD as $key){
                    $ClaveBD =  $key['claveCifradaMay'];

                    if($Clave == password_verify($Clave, $ClaveBD)){
                        echo "La contraseña que introdujo no es permitida"; 
                        
                        //Se crea una sesion que se solicitara en el metodo recibeRegistroCom()          
                        $_SESSION["ClaveExiste"] = true;

                        ?>
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
    }
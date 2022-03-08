<?php 
    declare(strict_types = 1);

    class Login_C extends Controlador{
        
        public function __construct(){  
            session_start();
            $this->ConsultaLogin_M = $this->modelo("Login_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        //Es llamadao desde Registro_C.php - Cuenta_C - header_inicio.php - cuenta_publicar_V.php
        public function index(string $Datos){
            // echo "Datos = " . $Datos;
            // exit();

            //Se verifica si el usuario esta memorizado en las cookie de su computadora y las compara con la BD, para recuperar sus datos y autorellenar el formulario de inicio de sesion, las cookies de registro de usuario se crearon en validarSesion.php
            if(isset($_COOKIE["id_usuario"]) AND isset($_COOKIE["clave"])){//Si la variable $_COOKIE esta establecida o creada
                // echo "Cookie afiliado =" . $_COOKIE["id_usuario"] ."<br>";
                // echo "Cookie clave =" .  $_COOKIE["clave"] ."<br>";
                
                $Cookie_usuario = $_COOKIE["id_usuario"];
                $Cookie_clave = $_COOKIE["clave"];
                            
                //Se CONSULTA el correo registrado en el sistema con el ID_Usuario como argumento
                $CorreoRecord = $this->ConsultaLogin_M->consultarUsuarioRecordado($Cookie_usuario);
                while($arr = $CorreoRecord->fetch(PDO::FETCH_ASSOC)){
                    $Correo = $arr['correo_AfiCom'];
                }

                $Datos=[
                    'correoRecord' => $Correo,
                    'claveRecord' => $Cookie_clave
                ];

                //Se entra al formulario de sesion que esta rellenado con los datos del usuario
                $this->vista("view/login_Vrecord", $Datos);
            }
            else if($Datos == 1){
                $Datos = 'CE';
                //carga la vista login_V en formulario login
                $this->vista("header/header");
                $this->vista("view/login_V", $Datos);
            }
            else{
                //carga la vista login_V en acuse de recibo de registro de tienda
                $this->vista("header/header");
                $this->vista("view/login_V", $Datos);
            }
        }

        //Invocado desde login_V
        public function ValidarSesion(){
            $Recordar = isset($_POST["recordar"]) == 1 ? $_POST["recordar"] : "No desea recordar";
            $Clave = $_POST["clave_Arr"];
            $Correo = $_POST["correo_Arr"];

            //Se CONSULTA si el correo existe como comerciante
            $usuarioCom = $this->ConsultaLogin_M->consultarAfiliadosCom($Correo);
            
            // echo '<pre>';
            // print_r($usuarioCom); 
            // echo '</pre>';
            // exit();

            //Se CONSULTA si el correo existe como mayorista
            $usuarioMay = $this->ConsultaLogin_M->consultarAfiliadosMay($Correo);

            // echo '<pre>';
            // print_r($usuarioMay); 
            // echo '</pre>';
            // exit();

            //Se CONSULTA si el correo existe como despachador            
            $usuarioDes = $this->ConsultaLogin_M->consultarAfiliadosDes($Correo);

            // echo '<pre>';
            // print_r($usuarioDes); 
            // echo '</pre>';
            // exit();

            //Se CONSULTA si el correo existe como vendedor            
            $usuarioVen = $this->ConsultaLogin_M->consultarAfiliadosVen($Correo);

            // echo '<pre>';
            // print_r($usuarioVen); 
            // echo '</pre>';
            // exit();

            if($usuarioCom != Array() && $usuarioMay != Array()){//Existe como comerciante y como mayorista
                //Redirecciona a ventan donde se solicita que seleccione como desea ingresar, como comerciante o mayorista
                // echo '<br><br><br><br><br><br><br>';
                // echo 'HOLA';
                exit();
            } 
            else if($usuarioCom != Array() && $usuarioCom[0]['ID_AfiliadoCom'] != ""){//Existe como comerciante
                $ID_Afiliado = $usuarioCom[0]['ID_AfiliadoCom'];
                $CorreoBD = $usuarioCom[0]['correo_AfiCom'];
                $Nombre = $usuarioCom[0]['nombre_AfiCom'];

                $CuentaCom = true;
            }
            else if($usuarioMay != Array() && $usuarioMay[0]['ID_AfiliadoMay'] != ""){//Existe como mayorista
                $ID_Afiliado = $usuarioMay[0]['ID_AfiliadoMay'];
                $CorreoBD = $usuarioMay[0]['correo_AfiMay'];
                $Nombre = $usuarioMay[0]['nombre_AfiMay'];

                $CuentaMay = true;
            }
            else if($usuarioDes != Array() && $usuarioDes[0]['ID_AfiliadoDes'] != ""){
                $ID_Afiliado = $usuarioDes[0]['ID_AfiliadoDes'];
                $CorreoBD = $usuarioDes[0]['correo_AfiDes'];
                $Nombre = $usuarioDes[0]['nombre_AfiDes'];
                                
                $CuentaDes = true;
            }
            else if($usuarioVen != Array() && $usuarioVen[0]['ID_AfiliadoVen'] != ""){
                $ID_Afiliado = $usuarioVen[0]['ID_AfiliadoVen'];
                $CorreoBD = $usuarioVen[0]['correo_AfiVen'];
                $Nombre = $usuarioVen[0]['nombre_AfiVen'];
                                
                $CuentaVen = true;
            }
            else{                        
                header('location:' . RUTA_URL . '/Modal_C/loginIncorrecto');
            }
        
            //Se crean las cookies para recordar al usuario en caso de que $Recordar exista
            if(isset($_POST["recordar"]) && $_POST["recordar"] == 1): //si pidió memorizar el usuario, se recibe desde principal.php   
                 //1) Se crea una marca aleatoria en el registro de este usuario
                 //Se alimenta el generador de aleatorios
                //  mt_srand (time());
                //  //Se genera un número aleatorio
                //  $Aleatorio = mt_rand(1000000,999999999);
        
                 //3) Se introduce una cookie en el ordenador del usuario con el identificador del usuario y la cookie aleatoria porque el usuario marca la casilla de recordar
                setcookie("id_usuario", $ID_Afiliado, time()+365*24*60*60, "/");
                setcookie("clave", $Clave, time()+365*24*60*60, "/");
                //  echo "Se han creado las Cookies en validarSesion" . "<br>";
        
                // echo "La cookie ID_Usuario = " . $_COOKIE["id_usuario"] . "<br>";
                // echo "La cookie clave = " . $_COOKIE["clave"] . "<br>"; 
            endif;

            //Verifica si los campo que se van a recibir estan vacios
            if(empty($_POST["correo_Arr"]) || empty($_POST["clave_Arr"])){        
                echo "Debe Llenar todos los campos vacios". "<br>";
                echo "<a href='javascript:history.back()'>Regresar</a>";
            }
            else{
                //sino estan vacios se sanitizan y se reciben
                $Correo = filter_input( INPUT_POST, 'correo_Arr', FILTER_SANITIZE_STRING);
                $Clave = filter_input(INPUT_POST, 'clave_Arr', FILTER_SANITIZE_STRING);
        
                //Se CONSULTA la contraseña enviada, que sea igual a la contraseña de la BD
                if(isset($CuentaCom)){
                    $usuarios_2= $this->ConsultaLogin_M->consultarContrasenaCom($ID_Afiliado);
                    while($arr = $usuarios_2->fetch(PDO::FETCH_ASSOC)){
                        $ClaveBD = $arr['claveCifrada'];
                    }          

                    //se descifra la contraseña con un algoritmo de desencriptado.
                    if($Correo == $CorreoBD AND $Clave == password_verify($Clave, $ClaveBD)){
                        //SELECT para hallar el ID_Tienda, el nombre de la tienda, ID_Afiliado y si la tienda se puede mostrar al publico
                        $Consulta= $this->ConsultaLogin_M->consultarID_Tienda($ID_Afiliado);
                        while($arr = $Consulta->fetch(PDO::FETCH_ASSOC)){
                            $ID_Tienda = $arr["ID_Tienda"];
                            $ID_Afiliado = $arr["ID_AfiliadoCom"];
                            $NombreTienda = $arr["nombre_Tien"];
                            $Publicar = $arr["publicar_Tien"];
                            $Desactivar = $arr["desactivar_Tien"];
                        }
                        
                        //CONSULTA si existe al menos una sección donde cargar productos
                        $Cant_Seccion = $this->ConsultaLogin_M->consultarSecciones($ID_Tienda);
                        // echo "Registros encontrados: " . $Cant_Seccion;
                        
                        //Se crean sesiones exigidas en las páginas de una cuenta de comerciante           
                        $_SESSION["ID_Tienda"] = $ID_Tienda;
                        
                        //Se crea la sesion que guarda el ID_Afiliado, pedida en archivo de login           
                        $_SESSION['ID_Afiliado'] = $ID_Afiliado;
                            
                        // Se verifica a donde se redirecciona segun la condición de la tienda
                        if($Cant_Seccion == 0){//Sino hay seccion creada
                            header('location:' . RUTA_URL . '/Modal_C/tiendaSinSecciones'); 
                        }
                        else if($Publicar == 0){//Si hay seccion creada sin producto
                            header('location:' . RUTA_URL . '/Modal_C/tiendaSinProductos'); 
                        }   
                        else if($Desactivar == 1){//Si el cliente tiene desctivada su tienda
                            header('location:' . RUTA_URL . '/Modal_C/tiendaDesactiva'); 
                        }
                        else{//Si hay seccion creada con producto
                            header('location:' . RUTA_URL . '/Cuenta_C/Productos/Todos'); 
                        }      
                    }
                    else{ 
                        header('location:' . RUTA_URL . '/Modal_C/loginIncorrecto');
                    } 
                }
                else if(isset($CuentaMay)){
                    $usuarios_2= $this->ConsultaLogin_M->consultarContrasenaMay($ID_Afiliado);
                    while($arr = $usuarios_2->fetch(PDO::FETCH_ASSOC)){
                        $ClaveBD = $arr['claveCifradaMay'];
                    }          

                    //se descifra la contraseña con un algoritmo de desencriptado.
                    if($Correo == $CorreoBD AND $Clave == password_verify($Clave, $ClaveBD)){
                        //SELECT para hallar el ID_Mayorista, el nombre del mayorista, ID_AfiliadoMay
                        $Consulta= $this->ConsultaLogin_M->consultarID_Mayorista($ID_Afiliado);
                        while($arr = $Consulta->fetch(PDO::FETCH_ASSOC)){
                            $ID_Mayorista = $arr["ID_Mayorista"];
                            // $ID_AfiliadoMay = $arr["ID_AfiliadoMay"];
                            $Nombre_Mayorista = $arr["nombreMay"];
                        }
                                                                        
                        //Se crea la sesion que guarda el ID_Mayorista SOLICITADA EN TODOS LOS ARCHIVOS DE CUENTA MAYORISTA         
                        $_SESSION['ID_Mayorista'] = $ID_Mayorista;            
                        $_SESSION['Nombre_Mayorista'] = $Nombre_Mayorista;        
                            
                        header('location:' . RUTA_URL . '/CuentaMayorista_C/admin');    
                    }
                    else{ 
                        header('location:' . RUTA_URL . '/Modal_C/loginIncorrecto');
                    } 
                }
                //Entra en cuenta de vendedor
                else if(isset($CuentaVen)){
                    $usuarios_2= $this->ConsultaLogin_M->consultarContrasenaVen($ID_Afiliado);
                    while($arr = $usuarios_2->fetch(PDO::FETCH_ASSOC)){
                        $ClaveBD = $arr['claveCifradaVen'];
                    }          

                    //se descifra la contraseña con un algoritmo de desencriptado.
                    if($Correo == $CorreoBD AND $Clave == password_verify($Clave, $ClaveBD)){
                        //SELECT para hallar el nombre del vendedor
                        $Consulta= $this->ConsultaLogin_M->consultarID_AfiliadoVen($ID_Afiliado);
                        while($arr = $Consulta->fetch(PDO::FETCH_ASSOC)){
                            $ID_Mayorista = $arr["ID_Mayorista"];
                            $Nombre_AfiVen = $arr["nombre_AfiVen "];
                            $Codigo_AfiVen = $arr["codigo_AfiVen"];
                        }
                                                                        
                        //Se crea la sesion que guarda el ID_Mayorista SOLICITADA EN TODOS LOS ARCHIVOS DE CUENTA MAYORISTA         
                        $_SESSION['ID_Mayorista'] = $ID_Mayorista; 
                        $_SESSION['ID_Vendedor'] = $ID_Afiliado;            
                        $_SESSION['Nombre_Vendedor'] = $Nombre_AfiVen;         
                        $_SESSION['Codigo_Vendedor'] = $Codigo_AfiVen;        
                            
                        header('location:' . RUTA_URL . '/CuentaMayorista_C/adminVen');    
                    }
                    else{ 
                        header('location:' . RUTA_URL . '/Modal_C/loginIncorrecto');
                    } 
                }
                //Entra en cuenta de despachador
                else if(isset($CuentaDes)){
                    $usuarios_2= $this->ConsultaLogin_M->consultarContrasenaDes($ID_Afiliado);
                    while($arr = $usuarios_2->fetch(PDO::FETCH_ASSOC)){
                        $ClaveBD = $arr['claveCifradaDes'];
                    }

                    //se descifra la contraseña con un algoritmo de desencriptado.
                    if($Correo == $CorreoBD AND $Clave == password_verify($Clave, $ClaveBD)){

                        // Se crea la sesion que guarda el ID_Afiliado           
                        $_SESSION['ID_Afiliado'] = $ID_Afiliado;
    
                        // Se crea una sesión que almacena el nombre del despachador           
                        $_SESSION["NombreDespachador"] = $Nombre;
                            
                        header('location:' . RUTA_URL . '/Cuenta_C/Despachador');          
                    }
                    else{ 
                        header('location:' . RUTA_URL . '/Modal_C/loginIncorrecto');
                    } 
                }  
                else{
                    echo "Usuario o contraseña no son validos";
                }                   
            }   
        }
        
        public function RecuperarClave(){
            $Correo = $_POST['correo'];
            //echo 'Correo= ' . $Correo . '<br>';
        
            //Se genera un numero aleatorio que será el código de recuperación de contraseña
            //alimentamos el generador de aleatorios
            mt_srand (time());
            //generamos un número aleatorio
            $Aleatorio = mt_rand(100000,999999); 
                    
            //Se INSERTA el código aleatorio en la tabla "codigo-recuperacion y se asocia al correo del usuario
            $this->ConsultaLogin_M->insertarCodigoAleatorio($Correo, $Aleatorio);
            
            //Se envia correo al usuario informandole el código que debe insertar para verificar
            $email_to = $Correo;
            $email_subject = "Recuperación de contraseña";  
            $email_message ="Código de recuperación de contraseña: " . $Aleatorio;
            $headers = 'From: '. "PedidoRemoto<master@pedidoremoto.com>" ."\r\n".       
            'X-Mailer: PHP/' . phpversion();
        
            @mail($email_to, $email_subject, $email_message, $headers);
            
            $Datos = [
                'correo' => $Correo,
                'bandera' => 'aleatorioinsertado'
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("header/header_Modal", $Datos); 
            $this->vista("modal/modal_recuperarCorreo_V", $Datos); 
        }

        //LLamado desde modal_recuperarCorreo_V.php
        public function recibeCodigoRecuperacion(){
            $CodigoUsuario = $_POST["ingresarCodigo"];
            $Correo= $_POST["correo"];

            // EL numero aleatorio es de tipo string se debe cambiar a entero
            // echo gettype($CodigoUsuario) . "<br>";
            settype($CodigoUsuario,"integer");
            // echo gettype($CodigoUsuario) . "<br>";
            
            //Se comprueba el código enviado por el usuario con el código que hay en la BD
            $VerificaCodigo = $this->ConsultaLogin_M->consultarCodigoAleatorio($Correo, $CodigoUsuario);

            if($VerificaCodigo == 0){//Si el codigo que envia el usuario es diferente al del sistema             
                
                $Datos = [
                    'correo' => $Correo,
                    'bandera' => 'nuevoIntento'
                ];

                $this->vista("header/header_Modal"); 
                $this->vista("modal/modal_recuperarCorreo_V", $Datos);

                echo "<p class='Inicio_16'>Código invalido</p>";
                echo "<a class='Inicio_16' href='javascript:history.go(-1)'>Regresar</a>";
                exit();            
            }
            else{//Si los códigos coinciden se permite hacer el cambio de contraseña
                // echo "cambie la contraseña";

                //Se confirma en la BD que el codigo ha sido usado y verificado
                $this->ConsultaLogin_M->actualizarcodigoVerificado($CodigoUsuario);
                
                $Datos = [
                    'correo' => $Correo,
                    'bandera' => 'verificado'
                ];

                $this->vista("header/header_Modal", $Datos); 
                $this->vista("modal/modal_recuperarCorreo_V", $Datos); 
            }
        }

        public function recibeCambioClave(){
            $ClaveNueva = $_POST["clave"];
            $RepiteClaveNueva = $_POST["repiteClave"];
            $Correo = $_POST["correo"];

            // echo "Clave nueva= " . $ClaveNueva . "<br>";
            // echo "Repite clave nueva= " . $RepiteClaveNueva . "<br>";
            // echo "Correo= " . $Correo . "<br>";

            //Se verifica que las claves recibidas sean iguales
            if($ClaveNueva == $RepiteClaveNueva){
                //se cifra la contraseña con un algoritmo de encriptación
                $ClaveCifrada = password_hash($ClaveNueva, PASSWORD_DEFAULT);
                // echo "Clave cifrada= " . $ClaveCifrada . "<br>";
                
                //Se consulta el ID_Participante correspondiente al correo
                $ID_Afiliado = $this->ConsultaLogin_M->consultaID_Afiliado($Correo);

                if($ID_Afiliado == Array()){
                    echo 'No exist el correo';
                    echo "<a class='Inicio_16' href='javascript:history.go(-3)'>Regresar</a>";
                    exit;
                }
                else{
                    // echo '<pre>';
                    // print_r($ID_Afiliado);
                    // echo '</pre>';
                    // exit;

                    //Se actualiza en la base de datos la clave del usuario
                    $this->ConsultaLogin_M->actualizarClave($ID_Afiliado, $ClaveCifrada);

                    //Se destruyen las cookies que recuerdan la contraseña antigua, creadas en validarSesion.php
                    // echo "Cookie_usuario= " . $_COOKIE["id_usuario"] . "<br>";
                    // echo "Cookie_clave= " . $_COOKIE["clave"] . "<br>";

                    // setcookie("id_usuario",'',time()-100);
                    // setcookie("clave",'',time()-100);
                    
                    $this->vista('header/header_Modal'); 
                    $this->vista('modal/modal_recuperarCorreo_V'); 
                }
            }
            else{
                echo 'Las contraseñas no coinciden';
                echo '<br>';
                echo "<a href='javascript: history.go(-1)'>Regresar</a>";
            }
        }
    }
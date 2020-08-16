<?php
    session_start();
    class Login_C extends Controlador{
        
        public function __construct(){  
            $this->ConsultaLogin_M = $this->modelo("Login_M");
        }

        //Es llamadao desde Registro_C.php - header_inicio.php
        public function index($Datos){
            //Se verifica si el usuario esta memorizado en las cookie de su computadora y las compara con la BD, para recuperar sus datos y autorellenar el formulario de inicio de sesion, las cookies de registro de usuario se crearon en validarSesion.php
            if(isset($_COOKIE["id_usuario"]) AND isset($_COOKIE["clave"])){//Si la variable $_COOKIE esta establecida o creada
                // echo "Cookie afiliado =" . $_COOKIE["id_usuario"] ."<br>";
                // echo "Cookie clave =" .  $_COOKIE["clave"] ."<br>";
                
                $Cookie_usuario = $_COOKIE["id_usuario"];
                            
                //Se CONSULTA el usuario registrados en el sistema con el correo dado como argumento
                $usuarioRec= $this->ConsultaLogin_M->consultarUsuarioRecordado($Cookie_usuario);
                $Datos=[
                    "usuarioRecord"=>$usuarioRec,
                ];
                    
                //Se entra al formulario de sesion que esta rellenado con los datos del usuario
                $this->vista("paginas/login_Vrecord", $Datos);
            }
            else{
                //Se carga la vista login_V
                $this->vista("paginas/login_V", $Datos);
            }
        }

        public function ValidarSesion(){
            $Recordar = isset($_POST["recordar"]) == 1 ? $_POST["recordar"] : "No desea recordar";
            $Clave = $_POST["clave_Arr"];
            $Correo = $_POST["correo_Arr"];

            //Se CONSULTA el usuario registrados en el sistema con el correo dado como argumento
            $usuarios = $this->ConsultaLogin_M->consultarAfiliadosCom($Correo);
            while($arr = $usuarios->fetch(PDO::FETCH_ASSOC)){
                $ID_Afiliado = $arr['ID_AfiliadoCom'];
                $CorreoBD = $arr['correo_AfiCom'];
                $Nombre = $arr['nombre_AfiCom'];
            }
        
            //Se crean las cookies para recordar al usuario en caso de que $Recordar exista
            if(isset($_POST["recordar"]) && $_POST["recordar"] == 1){//si pidió memorizar el usuario, se recibe desde principal.php   
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
            }

            //Verifica si los campo que se van a recibir estan vacios
            if(empty($_POST["correo_Arr"]) || empty($_POST["clave_Arr"])){
        
                echo"<script>alert('Debe Llenar todos los campos vacios');window.location.href='../vista/principal.php';</script>";
            }
            else{
                //sino estan vacios se sanitizan y se reciben
                $Correo = filter_input( INPUT_POST, 'correo_Arr', FILTER_SANITIZE_STRING);
                $Clave = filter_input(INPUT_POST, 'clave_Arr', FILTER_SANITIZE_STRING);
        
                //Se CONSULTA la contraseña enviada, que sea igual a la contraseña de la BD
                $usuarios_2= $this->ConsultaLogin_M->consultarContrasena($ID_Afiliado);
                while($arr = $usuarios_2->fetch(PDO::FETCH_ASSOC)){
                    $ClaveBD = $arr['claveCifrada'];
                }
                                      
                //se descifra la contraseña con un algoritmo de desencriptado.
                if($Correo == $CorreoBD AND $Clave == password_verify($Clave, $ClaveBD)){

                    //SELECT para hallar el ID_Tienda y el nombre de la tienda correspondiente al afiliado
                    $Consulta= $this->ConsultaLogin_M->consultarID_Tienda($ID_Afiliado);
                    while($arr = $Consulta->fetch(PDO::FETCH_ASSOC)){
                        $ID_Tienda = $arr["ID_Tienda"];
                        $ID_Afiliado = $arr["ID_AfiliadoCom"];
                        $NombreTienda = $arr["nombre_Tien"];
                    }
                    // Se crea la sesiones que se exige en todas las páginas de su cuenta            
                    $_SESSION["ID_Tienda"] = $ID_Tienda;
                    
                    // Se crea la sesion que guarda el ID_Afiliado           
                    $_SESSION["ID_Afiliado"] = $ID_Afiliado;

                    // Se crea una sesión que almacena el nombre de la tienda           
                    $_SESSION["Nombre_Tienda"] = $NombreTienda;
                    
                    //se crea una $_SESSION llamada Nombre que almacena el Nombre del responsable de la tienda
                    $_SESSION["Nombre"] = $Nombre;

                    //Se da acceso y se redirije a la pagina de entrada en sesion de usuario
                    // if(!empty($DatosVarios)){
                    //     $Parametros = $DatosVarios;
                    //     header("location:" . RUTA_URL . "/Entrada_C/index/" . $Parametros);
                    // }
                    // else{
                    //     //Carga la vista 
                    //     $this->vista("paginas/Entrada_C");
                    // }
                    
                    header("location:" . RUTA_URL . "/Cuenta_C/");
                }
                else{  ?>
                        <script>
                            alert("USUARIO y CONTRASEÑA no son correctas");
                            history.back();
                        </script>
                        <?php 
                }    
            }   
        }
        
        public function RecuperarClave(){
            $Correo= $_POST["correo"];
            //echo "Correo= " . $Correo . "<br>";
        
            //Generamos un numero aleatorio que será el código de recuperación de contraseña
            //alimentamos el generador de aleatorios
            mt_srand (time());
            // //generamos un número aleatorio
            $Aleatorio = mt_rand(100000,999999);
            // echo "Nº aleatorio= " . $Aleatorio . "<br>"; 
                    
            //Se INSERTA el código aleatorio en la tabla "codigo-recuperacion y se asocia al correo del usuario
            $this->ConsultaLogin_M->insertarCodigoAleatorio($Correo, $Aleatorio);
            
            //Se envia correo al usuario informandole el código que debe insertar para verificar
            $email_to = $Correo;
            $email_subject = "Recuperación de contraseña";  
            $email_message ="Código de recuperación de contraseña: " . $Aleatorio;
            $headers = 'From: '. "admin@horebi.com" ."\r\n".
        
            'Reply-To: '. "admin@horebi.com"."\r\n" .        
            'X-Mailer: PHP/' . phpversion();
        
            @mail($email_to, $email_subject, $email_message, $headers);
            
            //Se redirecciona, la función redireccionar se encuentra en url_helper.php
            redireccionar("/RecuperarClave_C/index/$Correo"); 
        }
    }
?>    
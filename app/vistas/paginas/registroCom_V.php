<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$verifica = 1906;  
    $_SESSION["verifica"] = $verifica; 
    
    require(RUTA_APP . "/vistas/inc/header.php");
?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/flechaAbajo/style_flechaAbajo.css"/>		

<section class="section_5" id="Section_5">
    <div class="contenedor_42">
        <h1 class="h1_1">Afiliación como comerciante</h1>
        <form action="../Registro_C/recibeRegistro" method="POST" name="formRegistroCom" onsubmit="return validarAfiliacionCom()">
            <fieldset class="fieldset_1">
                <legend class="legend_1">Registro de tienda</legend> 
                <input class="placeholder borde_1" type="text" name="nombre_Afcom" id="Nombre" placeholder="Nombre del encargado" autocomplete="off"> 
                <input class="placeholder borde_1" type="text" name="correo_Afcom" id="CorreoAfiCom" placeholder="Correo electronico" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200)" onclick="ColorearCorreo()"  autocomplete="off">
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
                
                <input class="placeholder borde_1" type="text" name="nombre_tienda" id="NombreTienda" placeholder="Nombre de la tienda" autocomplete="off">
            </fieldset>      
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos de accceso</legend>  
                <div>
                    <input class="placeholder borde_1" type="password" name="clave_Afcom" id="Clave" placeholder="Contraseña" onchange="llamar_verificaClave()">

                    <!-- Se recibe respuesta de ajax llamar_verificaClave()-->
                    <div class="contenedor_3" id="Mostrar_verificaClave"></div>
                    <input class="placeholder borde_1" type="password" name="confirmarClave_Afcom" id="ConfirmarClave" placeholder="Repetir contraseña" onchange="verificarClaves()">
                </div>          
            </fieldset>        
            <div class="contenedor_66">            
                <input class="boton boton_4" type="submit" value="Crear tienda"/>
            </div>  
        </form>
    </div>
</section>

<!--div alimentado via Ajax por medio de la funcion Llamar_categorias() -->
<div id="Mostrar_Categorias"></div>

<!--div utilizado para tapar las etiquetas tipo input -->
<div class="tapa" id="Tapa"></div>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Registros.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Registros.js';?>"></script>

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
 
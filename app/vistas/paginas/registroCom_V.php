<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$Verifica_AfiliacionComerciante = 1906;  
    $_SESSION["Verifica_AfiliacionComerciante"] = $Verifica_AfiliacionComerciante; 
    
    require(RUTA_APP . "/vistas/inc/header.php");
?>

<section class="section_5">
    <div class="contenedor_42">
        <h1 class="h1_1">Afiliación como comerciante</h1>
        <form action="../Registro_C/recibeRegistroCom" method="POST" name="formRegistroCom" onsubmit="return validarAfiliacionCom()">
            <fieldset class="fieldset_1">
                <legend class="legend_1">Registro de tienda</legend> 

                <!-- Nombre afiliado -->
                <input class="placeholder borde_1" type="text" name="nombre_Afcom" id="Nombre" placeholder="Nombre del encargado" autocomplete="off" onkeydown="blanquearInput('Nombre')"> 

                <!-- Correo afiliado -->
                <input class="placeholder borde_1" type="text" name="correo_Afcom" id="CorreoAfiCom" placeholder="Correo electronico" onblur="llamar_verificaCorreo()" autocomplete="off" onkeydown="blanquearInput('CorreoAfiCom')">
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
                
                <!-- Nombre de la tienda -->
                <input class="placeholder borde_1" type="text" name="nombre_tienda" id="NombreTienda" placeholder="Nombre de la tienda" autocomplete="off" onkeydown="blanquearInput('NombreTienda')">
            </fieldset>      
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos de accceso</legend>  
                <div>
                    <!-- Clave -->
                    <input class="placeholder borde_1" type="password" name="clave_Afcom" id="Clave" placeholder="Contraseña" onblur="llamar_verificaClave()" onkeydown="blanquearInput('Clave')">
                    <!-- Se recibe respuesta de ajax llamar_verificaClave()-->
                    <div class="contenedor_3" id="Mostrar_verificaClave"></div>

                    <!-- Confirmar clave -->
                    <input class="placeholder borde_1" type="password" name="confirmarClave_Afcom" id="ConfirmarClave" placeholder="Repetir contraseña" onchange="verificarClaves()" onkeydown="blanquearInput('ConfirmarClave')">
                </div>          
            </fieldset>        
            <div class="contenedor_66">            
                <input class="boton boton_4" type="submit" value="Crear tienda"/>
            </div>  
        </form>
    </div>
</section>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Registros.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Registros.js';?>"></script>

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
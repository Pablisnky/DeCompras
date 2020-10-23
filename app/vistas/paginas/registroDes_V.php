<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$Verifica_AfiliacionDespachador = 1908;  
    $_SESSION["Verifica_AfiliacionDespachador"] = $Verifica_AfiliacionDespachador; 

    require(RUTA_APP . "/vistas/inc/header.php");
?>

<section class="section_5">
    <div class="contenedor_42">
        <h1 class="h1_1">Afiliación como despachador</h1>
        <form action="../Registro_C/recibeRegistroDes" method="POST" name="formRegistroDes" onsubmit="return validarAfiliacionDes()">
            <fieldset class="fieldset_1">
                <legend class="legend_1">Datos personales</legend> 

                <!-- NOMBRE -->
                <input class="placeholder borde_1" type="text" name="nombre_AfiDes" id="Nombre" placeholder="Nombre" autocomplete="off" onkeydown="blanquearInput('Nombre')">

                <!-- APELLIDO -->
                <input class="placeholder borde_1"  type="text" name="apellido_AfiDes" id="Apellido" placeholder="Apellido" onchange="" autocomplete="off" onkeydown="blanquearInput('Apellido')">

                <!-- CEDULA -->
                <input class="placeholder borde_1"  type="text" name="cedula_AfiDes" id="Cedula" placeholder="Cedula (solo números)" autocomplete="off" onkeydown="blanquearInput('Cedula'); SeparadorMiles(this.value)">

                <!-- TELEFONO -->
                <input class="placeholder borde_1"  type="text" name="telefono_AfiDes" id="Telefono" placeholder="Telefono (solo números)" autocomplete="off" onkeydown="blanquearInput('Telefono'); valida_LongitudTelefono()" onkeyup="mascaraTelefono(this.value)">

                <!-- CORREO -->
                <input class="placeholder borde_1"  type="text" name="correo_AfiDes" id="CorreoAfiDes" placeholder="Correo electronico" onblur="llamar_verificaCorreo(id, 'AfiDes')" onkeydown="blanquearInput('CorreoAfiDes')" autocomplete="off">
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
            </fieldset>         
            <fieldset class="fieldset_1">
                <legend class="legend_1">Datos de accceso</legend>  
                <div>

                    <!-- CLAVE -->
                    <input class="placeholder borde_1" type="password" name="clave_AfiDes" id="Clave" placeholder="Contraseña" onchange="llamar_verificaClave('AfiDes')" onkeydown="blanquearInput('Clave')">
                    <!-- recibe respuesta de ajax llamar_verificaClave()-->
                    <div class="contenedor_3" id="Mostrar_verificaClave"></div>

                    <!-- CONFIRMAR CLAVE -->
                    <input class="placeholder borde_1" type="password" name="confirmarClave_AfiDes" id="ConfirmarClave_AfiDes" placeholder="Repetir contraseña" onkeydown="blanquearInput('ConfirmarClave')">
                </div>          
            </fieldset> 
            <div class="contenedor_66">                    
                <input class="boton boton_4" type="submit" value="Registrarse">
            </div>
        </form>
    </div>
</section>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Registros.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Registros.js';?>"></script>

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$Verifica_AfiliacionComerciante = 1906;  
    $_SESSION["Verifica_AfiliacionComerciante"] = $Verifica_AfiliacionComerciante; 
?>

<section class="section_5">
    <div class="contenedor_42">
        <h1 class="h1_1">Crea tu tienda y muestrala a toda la ciudad</h1>
        <form action="../Registro_C/recibeRegistroCom" method="POST" name="formRegistroCom" onsubmit="return validarAfiliacionCom()">
            <fieldset class="fieldset_1">
                <legend class="legend_1">Registro de tienda</legend> 

                <!-- NOMBRE AFILIADO -->
                <input class="placeholder borde_1" type="text" name="nombre_Afcom" id="Nombre" placeholder="Nombre del encargado" autocomplete="off" tabindex="1" onkeydown="blanquearInput('Nombre')" > 

                <!-- CORREO AFILIADO -->
                <input class="placeholder borde_1" type="text" name="correo_Afcom" id="CorreoAfiCom" placeholder="Correo electronico" autocomplete="off" tabindex="2" onblur="llamar_verificaCorreo(id, 'AfiCom')" onkeydown="blanquearInput('CorreoAfiCom')" onfocus="removerContenidoDiv()"/>
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
                
                <!-- NOMBRE DE LA TIENDA -->
                <div style="width:100%; margin:auto">
                    <input class="placeholder placeholder_4 borde_1" type="text" name="nombre_tienda" id="NombreTienda" placeholder="Nombre de la tienda" autocomplete="off" tabindex="3" onkeydown="blanquearInput('NombreTienda')">
                    <input class="contador_2 contador_4" type="text" id="ContadorNombre" value="50" readonly/>
                </div>
            </fieldset>      
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos de accceso</legend>  
                <div>
                    <!-- CLAVE -->
                    <input class="placeholder borde_1" type="password" name="clave_Afcom" id="Clave" placeholder="Contraseña"  tabindex="4" onblur="llamar_verificaClave(this.value, 'AfiCom')" onkeydown="blanquearInput('Clave')">
                    <!-- Se recibe respuesta de ajax llamar_verificaClave()-->
                    <div class="contenedor_3" id="Mostrar_verificaClave"></div>

                    <!-- CONFIRMAR CLAVE -->
                    <input class="placeholder borde_1" type="password" name="confirmarClave_Afcom" id="ConfirmarClave" placeholder="Repetir contraseña" tabindex="5" onkeydown="blanquearInput('ConfirmarClave')">
                </div>          
            </fieldset>        
            <div class="contenedor_66">            
                <input class="boton boton_4" type="submit" value="Crear tienda"/>
            </div>  
        </form>
    </div>
</section>

<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Registros.js';?>"></script>
<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Registros.js';?>"></script>

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
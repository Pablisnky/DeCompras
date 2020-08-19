<?php require(RUTA_APP . "/vistas/inc/header.php"); ?>

<section>
	<div class="contenedor_42">
        <form action="<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method="POST">	
            <fieldset class="fieldset_1">
                <legend class="legend_1">Datos de acceso</legend>
                <input class="input_9 borde_2" type="email" name="correo_Arr" id="Correo" placeholder="e-mail" autocomplete="off">                
                <input class="input_9 borde_2" type="password" name="clave_Arr" id="Clave" placeholder="Contraseña" autocomplete="off">             
                <div class="contenedor_45">
                    <input type="checkbox" id="Recordar" name="recordar" value="1">
                    <label for="Recordar">Recordar datos en este equipo.</label>
                </div> 
            </fieldset>  
            <div class="contenedor_50">
                <input class="boton" id="Submit" type="submit" value="Entrar">
                <p class="p_4">¿Olvidaste tu contraseña?</p>
                <label class="label_7" onclick="NotificarContrasena()">Recuperala</label>
            </div>
        </form>
        <div class="contenedor_33">	
            <hr class="hr_3">
            <p class="p_4">¿Quieres afiliarte?<p>
            <a class="" href="<?php echo RUTA_URL . '/Afiliacion_C';?>">Afiliate</a>
        </div>
    </div>
</section>
    <div class="contenedor_43" id="Contenedor_43" onclick="OcultarDiv()">
        <form action="<?php echo RUTA_URL . '/Login_C/RecuperarClave';?>" method="POST" autocomplete="off">
            <fieldset class="Afiliacion_1" style="background-color: #F4FCFB; border-radius: 15px;">
                <p class="span_2">Indiquenos un correo al cual podamos enviarle un código de recuperación</p>
                <br>
                <input class="" type="text" name="correo"><!--llamar_VerificarCedula() esta en ajaxBuscador.js-->
                <input style="margin: auto; display: block;" type="submit" id="BotonGuardar" value="Enviar" onclick="">
            </fieldset>
        </form>
    </div>
		
<?php include(RUTA_APP . "/vistas/inc/footer.php");?>

<!-- <script type="text/javascript" src="../javascript/validarFormularios.js"></script> -->
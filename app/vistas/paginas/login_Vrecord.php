<?php require(RUTA_APP . "/vistas/inc/header.php"); ?>

<section class="section_5">
	<div class="contenedor_42">
        <form action="<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method="POST">	
            <fieldset class="fieldset_1">
                <legend class="legend_1">Datos de acceso</legend>
                <input class="placeholder borde_2" type="email" name="correo_Arr" id="Correo" value="<?php echo $Datos['correoRecord']?>" autocomplete="off">   

                <input class="placeholder borde_2" type="password" name="clave_Arr" id="Clave" value="<?php echo $Datos['claveRecord']?>" autocomplete="off">  
            </fieldset>  
            <div class="contenedor_50">
                <input class="boton" id="Submit" type="submit" value="Entrar">
            </div>
        </form>
    </div>   
</section>
		

<!-- <script type="text/javascript" src="../javascript/validarFormularios.js"></script> -->
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Login.js';?>"></script>

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>

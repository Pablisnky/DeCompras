<section class="section_5">
	<div class="contenedor_42">
        <form action="<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method="POST">	
            <fieldset class="fieldset_1">
                <legend class="legend_1">Datos de acceso</legend>
                <input class="input_13 input_13A borde_1" type="text" name="correo_Arr" id="Correo_Usu" value="<?php echo $Datos['correoRecord']?>" autocomplete="off">   

                <input class="input_13 input_13A borde_1" type="password" name="clave_Arr" id="Clave" value="<?php echo $Datos['claveRecord']?>" autocomplete="off"> 
                
                <div class="contenedor_45">
                    <input type="checkbox" id="Recordar" name="no_recordar" value="1">
                    <label class="label_20" for="Recordar">Dejar de recordar datos en este equipo.</label>
                </div>  
            </fieldset>  
            <div class="contenedor_50">            
                <!-- este input es solo para que no entre en conclicto con el archivo E_Login.js, debido a que este ultimo tiene un addEventListener  -->
                <input class="ocultar" type="text" id="Label_7"> 

                <input class="boton" type="submit" value="Entrar">
            </div>
        </form>
    </div>   
</section>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Login.js';?>"></script>

<?php include(RUTA_APP . "/vistas/footer/footer.php");?>
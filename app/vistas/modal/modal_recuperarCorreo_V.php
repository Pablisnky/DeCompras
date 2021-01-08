<!-- Cargada desde login_Modal_C/modal_sinSecciones_V.php -->
<?php 
if($Datos == ''){ ?>
    <section class="sectionModal" id="Section_1">
        <div class="contenedor_24">
            <form action="<?php echo RUTA_URL . '/Login_C/RecuperarClave';?>" method="POST" autocomplete="off">
                <fieldset class="Afiliacion_1" style="border-radius: 15px;">
                    <p class="">Indiquenos el correo afiliado, enviaremos un código de recuperación</p>
                    <br>
                    <input class="" type="text" name="correo"><!--llamar_VerificarCedula() esta en ajaxBuscador.js-->
                    <input style="margin: auto; display: block;" type="submit" id="BotonGuardar" value="Enviar" onclick="">
                </fieldset>
            </form>
        </div>        
    </section>       <?php
}
else if($Datos['bandera'] == 'aleatorioinsertado'){    ?> 
    <section class="sectionModal" id="Section_1">   
        <div class="contenedor_24">
            <p class='Inicio_16'>Se ha enviado un código de recuperación de contraseña al correo suministrado.</p> 
            <form action="<?php echo RUTA_URL . '/Login_C/recibeCodigoRecuperacion';?>"  method="POST">
                <input class="input_5" type="text" name="ingresarCodigo" placeholder="Ingresar Código"> 
                <input type= "text" style="display:" value="<?php echo $Datos['correo'];?>" name="correo">
                <input type="submit" value="enviar">
            </form>  
        </div>         
    </section>  <?php
}
else if($Datos['bandera'] == 'verificado'){   ?>  
    <section class="sectionModal" id="Section_1"> 
        <div class="contenedor_19" onclick= "ocultarMenu()">
            <form action="<?php echo RUTA_URL . '/Login_C/recibeCambioClave';?>" method="POST">
                <fieldset class="Afiliacion_4">
                    <input class="input_5" class='Inicio_1' type="password" name="clave" placeholder="Nueva clave">
                    <input class="input_5" class='Inicio_1' type="password" name="repiteClave" placeholder="Repetir clave">
                    <input type="text" value="<?php echo $Datos['correo'];?>" name="correo"  style="display:none">
                    <input type="submit" value="enviar" name="enviar_2">
                </fieldset>
            </form>
        </div>         
    </section>  <?php
}  
else{   ?>
    <section class="sectionModal" id="Section_1"> 
        <div class="contenedor_19"">
                <fieldset class="Afiliacion_4">          
                    <p class='Inicio_16'>Contraseña cambiada exitosamente</p>
                    <a class='Inicio_16' href='<?php echo RUTA_URL . '/Login_C';?>'>Inicie sesión</a>
                </fieldset>
        </div>         
    </section>  <?php    
} ?>
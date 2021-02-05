<!-- se muestra en login_V.php en div id = "Contenedor_43" -->
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>

<!-- Cargada desde login_Modal_C/modal_sinSecciones_V.php -->
<?php 
if($Datos == ''){ ?>
    <section class="sectionModal">        
        <a href="<?php echo RUTA_URL . '/Login_C';?>"><span class="icon-cancel-circle sectionModal__span"></span></a>
        <br>
        <div class="sectionModal__div sectionModal__div--corto">
            <form action="<?php echo RUTA_URL . '/Login_C/RecuperarClave';?>" method="POST" autocomplete="off">
                <p class="sectionModal__div__p">Indiquenos el correo afiliado, <br> enviaremos un código de recuperación</p>
                <br>
                <input class="input_13 input_13--centro borde_1"  type="text" name="correo" id="Input_13_JS">
                <div class="contBoton">
                    <input class="boton" type="submit" value="Enviar">
                </div>
            </form>
        </div>   
    </section>       <?php
}
else if($Datos['bandera'] == 'aleatorioinsertado'){    ?> 
    <section class="sectionModal">        
        <a href="<?php echo RUTA_URL . '/Login_C';?>"><span class="icon-cancel-circle sectionModal__span"></span></a>
        <br> 
        <div class="sectionModal__div sectionModal__div--corto">
            <p class='sectionModal__div__p'>Se ha enviado un código al correo suministrado.</p> 
            <br>
            <form action="<?php echo RUTA_URL . '/Login_C/recibeCodigoRecuperacion';?>" method="POST">
                <input class="input_13 input_13--sinFormato" type= "text" readonly value="<?php echo $Datos['correo'];?>" name="correo">
                <input class="input_13 input_13--centro borde_1" type="text" name="ingresarCodigo" placeholder="Ingresar Código"> 
                <div class="contBoton">
                    <input class="boton" type="submit" value="enviar">
                </div>
            </form>  
        </div>         
    </section>  <?php
}
else if($Datos['bandera'] == 'nuevoIntento'){    ?> 
    <section class="sectionModal">        
        <a href="<?php echo RUTA_URL . '/Login_C';?>"><span class="icon-cancel-circle sectionModal__span"></span></a>
        <br> 
        <div class="sectionModal__div sectionModal__div--corto">
            <p class='sectionModal__div__p'>El código insertado es invalido.</p> 
            <br>
            <form action="<?php echo RUTA_URL . '/Login_C/recibeCodigoRecuperacion';?>" method="POST">
                <input class="input_13 input_13--sinFormato" type= "text" readonly value="<?php echo $Datos['correo'];?>" name="correo">
                <input class="input_13 input_13--centro borde_1" type="text" name="ingresarCodigo" placeholder="Ingresar Código Nuevamente"> 
                <div class="contBoton">
                    <input class="boton" type="submit" value="enviar">
                </div>
            </form>  
        </div>         
    </section>  <?php
}
else if($Datos['bandera'] == 'verificado'){   ?>  
    <section class="sectionModal">         
        <a href="<?php echo RUTA_URL . '/Login_C';?>"><span class="icon-cancel-circle sectionModal__span"></span></a>
        <br> 
        <div class="sectionModal__div sectionModal__div--corto" onclick= "ocultarMenu()">
            <p class="sectionModal__div__p">Inserte nueva clave</p>
            <br>
            <form action="<?php echo RUTA_URL . '/Login_C/recibeCambioClave';?>" method="POST">
                <input class="input_13" type="password" name="clave" placeholder="Nueva clave">
                <input class="input_13" type="password" name="repiteClave" placeholder="Repetir clave">
                <input type="text" value="<?php echo $Datos['correo'];?>" name="correo"  style="display:none"> 
                <div class="contBoton">
                    <input class="boton"  type="submit" value="enviar" name="enviar_2">
                </div>
            </form>
        </div>         
    </section>  <?php
}  
else{   ?>
    <section class="sectionModal"> 
        <div class="sectionModal__div sectionModal__div--corto"">
            <p class='sectionModal__div__p'>Contraseña cambiada exitosamente</p>
            <div class="contBoton">
                <a class='boton' href='<?php echo RUTA_URL . '/Login_C';?>'>Inicie sesión</a>
            </div>
        </div>         
    </section>  <?php    
} ?>
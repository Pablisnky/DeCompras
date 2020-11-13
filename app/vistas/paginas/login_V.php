<?php require(RUTA_APP . "/vistas/inc/header.php");
// echo "<br><br><br><br>";
// echo "Datos = " . $Datos;
// exit();
    //$Datos viene desde Login_C/index
    if($Datos == 'CE'){  ?>
        <section class="section_5" id="Section_5">
            <div class="contenedor_42">
                <form action="<?php echo RUTA_URL . '/Login_C/ValidarSesion';?>" method="POST" name="formLogin" onsubmit = "return validarLogin()">	
                    <fieldset class="fieldset_1">
                        <legend class="legend_1">Datos de acceso</legend>
                        <input class="placeholder borde_1" type="text" name="correo_Arr" id="Correo" placeholder="e-mail" autocomplete="off" onkeydown="blanquearInput('Correo')">                
                        <input class="placeholder borde_1" type="password" name="clave_Arr" id="Clave" placeholder="Contraseña" autocomplete="off">             
                        <div class="contenedor_45">
                            <input type="checkbox" id="Recordar" name="recordar" value="1">
                            <label class="label_20" for="Recordar">Recordar datos en este equipo.</label>
                        </div> 
                    </fieldset>  
                    <div class="contenedor_50">
                        <input class="boton" type="submit" value="Entrar"/>
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
        </section>
        <?php
    } 
    else{  ?>
        <section class="" id="Section_10">
            <div class="contenedor_103 borde_1">
                <h1 class="h1_7">Felicitaciones</h1>
                <div class="contenedor_104">
                    <div class="contenedor_147" style="background-image: url('<?php echo RUTA_URL?>/public/images/tiendas/tienda.png')">
                    </div>
                    <div class="contenedor_117">
                        <h1 class="h1_1">Tú tienda digital ha sido creada.</h1>
                        <p class="p_6">Tienes 15 días completamente libre de pagos</p>
                        <ul class="ul_5">
                            <li>Inicia sesión</li>
                            <li>organiza tu tienda</li>
                            <li>carga tus productos</li>
                        </ul> 
                        <p class="p_6">Y bienvenida es tu tienda en toda la ciudad.</p>
                    </div>
                </div>
                <a class="label_21 boton" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>">Cerrar</a>
            </div>
        </section> 
        <?php
    }   ?> 
		
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Login.js';?>"></script>

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>

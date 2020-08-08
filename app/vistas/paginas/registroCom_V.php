<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$verifica = 1906;  
    $_SESSION["verifica"] = $verifica; 
    
    // Se carga el header 
   require(RUTA_APP . "/vistas/inc/header.php");
?>
    <section class="">
    <h1 class="h1_3">Afiliación como comerciante</h1>
        <div class="contenedor_42">
            <form action="../Registro_C/recibeRegistro" method="POST" name="registroGratis" onsubmit="return validar_01()">
                <fieldset class="fieldset_1">
                    <legend class="legend_1">Datos persona responsable</legend> 
                    <input class="input_9" type="text" name="nombre_Afcom" id="Nombre" placeholder="Nombre" onchange="" autocomplete="off">
                    <input class="input_9" type="text" name="apellido_Afcom" id="Apellido" placeholder="Apellido" onchange="" autocomplete="off">
                    <input class="input_9" type="text" name="cedula_Afcom" id="Cedula" placeholder="Cedula" onchange="" autocomplete="off">
                    <input class="input_9" type="text" name="telefono_Afcom" id="Telefono" placeholder="Telefono" onchange="" autocomplete="off">
                    <input class="input_9" type="text" name="correo_Afcom" id="Correo" placeholder="Correo electronico" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200)" onclick="ColorearCorreo()" autocomplete="off">
                    <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
                </fieldset>      
                <fieldset class="fieldset_1">
                    <legend class="legend_1">Datos establecimiento comercial</legend> 
                    <input class="input_9" type="text" name="nombre_com" id="Nombre" placeholder="Nombre" onchange="" autocomplete="off">
                    <input class="input_9" type="text" name="telefono_com" id="Telefono" placeholder="Telefono" onchange="" autocomplete="off">
                    <input class="input_9" type="text" name="direccion_com" id="Direccion" placeholder="Direccion"  autocomplete="off">
                    <input class="input_9" type="text" name="horario_com" id="Horario" placeholder="Horario"  autocomplete="off">
                    <label class="label_6">Seleccione una categoria:</label>
                    <select class="select_1" name="categoria_com">
                        <option></option>
                        <?php
                        foreach($Datos as $row){
                            $Categorias  = $row['categoria']; ?>
                            <option><?php echo $Categorias;?></option>
                            <?php
                        }   ?>
                    </select>
                </fieldset>            
                <fieldset class="fieldset_1">
                    <legend class="legend_1">Datos de accceso a la plataforma</legend>  
                    <div>
                        <input class="input_9" type="password" name="clave_Afcom" id="Clave" placeholder="Contraseña" onchange="llamar_verificaClave()">
                        <div class="contenedor_3" id="Mostrar_verificaClave"></div><!-- recibe respuesta de ajax llamar_verificaClave()-->
                        <input class="input_9" type="password" name="confirmarClave_Afcom" id="ConfirmarClave" placeholder="Repetir contraseña">
                    </div>          
                </fieldset>                      
                    <input class="boton boton_4" type="submit" name="Registrarse" value="Registrarse">
            </form>
        </div>
    </section>
    <footer>
        <?php include(RUTA_APP . "/vistas/inc/footer.php");?>
    </footer>
	</body>
</html>
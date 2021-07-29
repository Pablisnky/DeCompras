<section class="section_5">
    <div class="contenedor_42">
        <h1 class="h1_1 h1--corto">Crea tu tienda y muestrala a toda la ciudad</h1>
        <form action="../Registro_C/recibeRegistroCom" method="POST" id="FormularioCom" name="formRegistroCom" onsubmit="return validarAfiliacionCom()">
            <fieldset class="fieldset_1">
                <legend class="legend_1">Registro de tienda</legend> 
                
                <!-- NOMBRE AFILIADO -->
                <input class="placeholder borde_1" type="text" name="nombre_Afcom" id="Nombre" placeholder="Nombre del encargado" autocomplete="off" tabindex="1"/> 

                <!-- CORREO AFILIADO -->
                <input class="placeholder borde_1" type="text" name="correo_Afcom" id="CorreoAfiCom" placeholder="Correo electronico" autocomplete="off" tabindex="2" onblur="llamar_verificaCorreo(id, 'AfiCom')" onfocus="removerContenidoDiv()"/>
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
                
                <!-- NOMBRE DE LA TIENDA -->
                <div style="width:100%; margin:auto">
                    <input class="placeholder placeholder_4 borde_1" type="text" name="nombre_tienda" id="NombreTienda" placeholder="Nombre de la tienda" autocomplete="off" tabindex="3" onblur="llamar_verificarNombreTienda(this.value)"/>
                    <input class="contador_2 contador_4" type="text" id="ContadorNombre" value="50" readonly/>
                </div>
                <div class="contenedor_43" id="Mostrar_verificarNombreTienda"></div>
            </fieldset>      
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos de accceso</legend>  
                <div>
                    <!-- CLAVE -->
                    <input class="placeholder borde_1" type="password" name="clave_Afcom" id="Clave" placeholder="Contraseña" tabindex="4" onblur="llamar_verificaClave(this.value, 'AfiCom')"/>
                    <!-- Se recibe respuesta de ajax llamar_verificaClave()-->
                    <div class="contenedor_3" id="Mostrar_verificaClave"></div>

                    <!-- CONFIRMAR CLAVE -->
                    <input class="placeholder borde_1" type="password" name="confirmarClave_Afcom" id="ConfirmarClave" placeholder="Repetir contraseña" tabindex="5"/>
                </div>          
            </fieldset>        
            <div class="contenedor_66">            
                <input class="boton" type="submit" value="Crear tienda"/>
            </div>  
        </form>
    </div>
</section>

<script src="<?php echo RUTA_URL . '/public/javascript/E_Registros.js';?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/A_Registros.js';?>"></script>

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
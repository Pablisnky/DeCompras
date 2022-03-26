    <div class="contenedor_108">  
        
        <p class="font--titulo">Excelente</p>
        <P>Debes contar con la siguiente documentación</P>
        <ul>
            <li>Registro mercantil (C.A, S.A, SSRL; Cooperativa, Firma personal, </li>
            <li>Cedula identidad del representante legal</li>
            <li>Número de cuenta bancaria</li>
        </ul>
        <p>Dejanos tus datos y un representante de ventas te contactara en pocos minutos.</p>
        <form action="<?php echo RUTA_URL; ?>/Mayorista_C/recibeAgregaMinorista" method="POST" autocomplete="off"> <!--  onsubmit="return validarPublicacion()" -->

            <fieldset class="fieldset_1 fieldset_3"> 
                <legend class="legend_1">Solicitar código de despacho</legend>
                <div class="contenedor_47">   
                    <div>
                        <!-- NOMBRE SOLICITANTE -->
                        <input class="input_13 input_13A borde_1" type="text" name="nombre_sol" id="NombreSol" placeholder="Nombre" tabindex="4"/>
                        <br>

                        <!-- TELEFONO SOLICITANTE --> 
                        <input class="input_13 input_13A borde_1" type="text" name="telefono_sol" id="TelefonoSol" placeholder="telefono" tabindex="4"/>
                        <br>

                        <!-- ZONA SOLICITANTE --> 
                        <select class="select_2 borde_1" id="" name="zona_Sol">
                            <option>Zona</option>
                            <option>Barquisimeto</option>
                            <option>Cabudare</option>
                            <option>Carora</option>
                            <option>Yaritagua</option>
                        </select>
                    </div>          
                </div>
            </fieldset>
        
            <article>
                <div class="contenedor_49 contenedor_81"> <!-- contBoton -->
                    <input class="boton boton--largo" type="submit" value="Enviar"/>
                </div> 
            </article>
        </form>
    </div>        

<?php include(RUTA_APP . "/vistas/footer/footer.php");?>
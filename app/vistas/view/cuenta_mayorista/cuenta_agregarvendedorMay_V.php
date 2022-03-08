<?php    
//se invoca sesion con el ID_Mayorista creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION['ID_Mayorista'])){
    $ID_Mayorista = $_SESSION['ID_Mayorista'];
      ?>       
        
    <!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización de la imagen del producto--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <div class="contenedor_42">  
        <form action="<?php echo RUTA_URL; ?>/CuentaMayorista_C/recibeAgregarVendedorrMay" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarPublicacion()">

            <a id="Ancla_01" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3"> 
                <legend class="legend_1">Cargar vendedor</legend>
                <div class="contenedor_47">    
                    
                    <!-- IMAGEN VENDEDOR -->
                    <div class="contenedor_129 borde_1 borde_2">
                        <img class="contenedor_119__img" id="blah" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/proveedor/Don_Rigo/equipo/Perfil.jpg">
                        <label  for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                        <input class="ocultar" type="file" name="foto_vendedor" id="imgInp"/>   
                    </div>        

                    <div>
                        <!-- NOMBRE VENDEDOR -->
                        <input class="input_13 input_13A borde_1" type="text" name="nombreVen" id="" placeholder="Nombre" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        <br>

                        <!-- APELLIDO VENDEDOR -->
                        <input class="input_13 input_13A borde_1" type="text" name="apellidoVen" id="" placeholder="Apellido" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        <br>

                        <!-- CEDULA VENDEDOR --> 
                        <input class="input_13 input_13A borde_1" type="text" name="cedulaVen" id="" placeholder="Cedula" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        <br>
                        
                        <!-- TELEFONO VENDEDOR --> 
                        <input class="input_13 input_13A borde_1" type="text" name="telefonoVen" id="" placeholder="telefono" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        <br>

                        <!-- CORREO VENDEDOR --> 
                        <input class="input_13 input_13A borde_1" type="text" name="correoVen" id="" placeholder="Correo" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        <br>

                        <!-- DIRECCION VENDEDOR -->
                        <input class="input_13 input_13A borde_1" type="text" name="direccionVen" id="" placeholder="Direccion" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        <br>

                        <!-- ZONA VENDEDOR --> 
                        <!-- <label>Zona</label> -->
                        <!-- </br> -->
                        <select class="select_2 borde_1" id="" name="zonaVen">
                            <option>Zona</option>
                            <option>Barquisimeto</option>
                            <option>Cabudare</option>
                            <option>Carora</option>
                            <option>Yaritagua</option>
                        </select>

                        <!-- FECHA INCORPORACION VENDEDOR --> 
                        <input class="input_13 input_13A borde_1" type="text" name="fechaincorporacionVen" id="" placeholder="Fecha incorporacion" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        <br>

                        <!-- FECHA DESNCORPORACION VENDEDOR --> 
                        <!-- <input class="input_13 input_13A borde_1" type="text" name="fechadesincorporacionVen" id="" placeholder="Fecha desincorporacion" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        <br> -->

                        <!-- STATUS VENDEDOR --> 
                        <input class="input_13 input_13A borde_1" type="text" name="statusVen" id="" placeholder="Status" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        <br>

                        <!-- CODIGO VENDEDOR --> 
                        <!-- <input class="input_13 input_13A borde_1" type="text" name="codigoVen" id="" placeholder="Código" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/> -->
                    </div>          
                </div>
            </fieldset>
        
            <article>
                <div class="contenedor_49 contenedor_81">
                    <input class="ocultar" type="text" name="id_mayorista" value="<?php echo $ID_Mayorista;?>"/>
                    <input class="boton boton--largo" type="submit" value="Guardar cambios"/>
                </div> 
            </article>
        </form>
    </div>        

    <!-- <script src="<?php //echo RUTA_URL . '/public/javascript/E_Cuenta_publicarMay.js';?>"></script>  -->
    <!-- <script src="<?php //echo RUTA_URL . '/public/javascript/A_Cuenta_publicarMay.js';?>"></script>  -->

    <script> 
        //Da una vista previa de la imagen principal antes de guardarla en la BD
        function readImage(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#blah').attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            // Código a ejecutar cuando se detecta un cambio de imagen individual
            readImage(this);
        });
    </script>

    <?php include(RUTA_APP . "/vistas/footer/footer.php");
}
else{
    header("location:" . RUTA_URL. "/Login_C");
}   ?>
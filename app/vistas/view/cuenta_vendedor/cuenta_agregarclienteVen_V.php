<?php 
// if(!empty($_SESSION['AGREGA_MINORISTA'])){ //sesion creada en CUentaVendedor_C/agregarclienteVen()
    $ID_Vendedor = $_SESSION['ID_Vendedor']; //sesion creada en Logi_C/validarSesion
      ?>       
        
    <!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización de la imagen del producto--> 
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

    <div class="contenedor_42">  
        <form action="<?php echo RUTA_URL; ?>/CuentaVendedor_C/recibeAgregarCliente" method="POST" enctype="multipart/form-data" autocomplete="off"> <!-- onsubmit="return validarPublicacion()" -->

            <a id="Ancla_01" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3"> 
                <legend class="legend_1">Cargar cliente</legend>
                <div class="contenedor_47">    
                    
                    <!-- IMAGEN MINORISTA -->
                    <div class="contenedor_129 borde_1 borde_2">
                        <img class="contenedor_119__img" id="blah" alt="Fotografia del minorista" src="<?php echo RUTA_URL?>/public/images/proveedor/Don_Rigo/minorista/tienda.png">
                        <label  for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                        <input class="ocultar" type="file" name="fotoMin" id="imgInp"/> 
                    </div>        

                    <div>
                        <!-- RAZON SOCIAL MINORISTA -->
                        <input class="input_13 input_13A borde_1" type="text" name="nombreMin" id="NombreMin" placeholder="Razón social"/>
                        <br/>

                        <!-- RIF MINORISTA -->
                        <input class="input_13 input_13A borde_1" type="text" name="rifMin" id="RifMin" placeholder="RIF"/>
                        <br/>
                        
                        <!-- TELEFONO MINORISTA --> 
                        <input class="input_13 input_13A borde_1" type="text" name="telefonoMin" id="TelefonoMin" placeholder="telefono"/>
                        <br/>

                        <!-- CORREO MINORISTA --> 
                        <input class="input_13 input_13A borde_1" type="text" name="correoMin" id="CorreoMin" placeholder="Correo"/>
                        <br/>

                        <!-- DIRECCION MINORISTA -->
                        <input class="input_13 input_13A borde_1" type="text" name="direccionMin" id="DireccionMin" placeholder="Direccion"/>
                        <br/>

                        <select class="select_2 borde_1" id="ZonaMin" name="zonaMin">
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
                <div class="contenedor_49 contenedor_81">
                    <input class="ocultar" type="text" name="id_vendedor" value="<?php echo $ID_Vendedor;?>"/>
                    <input class="boton boton--largo" type="submit" value="Guardar cambios"/>
                </div> 
            </article>
        </form>
    </div>        

    <!-- <script src="<?php //echo RUTA_URL . '/public/javascript/E_Cuenta_publicarMay.js';?>"></script>  -->
    <!-- <script src="<?php //echo RUTA_URL . '/public/javascript/A_Cuenta_publicarMay.js';?>"></script>  -->

    <script> 
        //Da una vista previa de la imagen principal antes de guardarla en la BD
    //     function readImage(input){
    //         if(input.files && input.files[0]){
    //             var reader = new FileReader();
    //             reader.onload = function(e){
    //                 $('#blah').attr('src', e.target.result); // Renderizamos la imagen
    //             }
    //             reader.readAsDataURL(input.files[0]);
    //         }
    //     }

    //     $("#imgInp").change(function(){
    //         // Código a ejecutar cuando se detecta un cambio de imagen individual
    //         readImage(this);
    //     });
    // </script>

    <?php
    
    include(RUTA_APP . '/vistas/footer/footer.php');
// }
// else{
//     header("location:" . RUTA_URL. "/Login_C");
// }    
?>
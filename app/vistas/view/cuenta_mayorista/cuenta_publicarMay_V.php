<?php    
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Mayorista"])){
    $ID_Mayorista = $_SESSION["ID_Mayorista"];

    //Se da formato al precio, sin decimales y con separación de miles
    $PrecioDolar = number_format($Datos['dolarHoy'], 4, ",", "."); 
      ?>       
        
    <!-- SDN libreria JQuery, necesaria para la previsualización de la imagen del producto--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <div class="contenedor_42 contenedor_108">  
        <form action="<?php echo RUTA_URL; ?>/CuentaMayorista_C/recibeProductoPublicarMay" method="POST" enctype="multipart/form-data" autocomplete="off" > <!-- onsubmit="return validarPublicacion()" -->

            <fieldset class="fieldset_1 fieldset_3"> 
                <legend class="legend_1">Cargar producto</legend>
                <div class="contenedor_47">    
                    
                    <!-- IMAGEN PRODUCTO -->
                    <div class="contenedor_129 borde_1 borde_2">
                        <img class="contenedor_119__img" id="blah" alt="Icono imagen" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                        <label  for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                        <input class="ocultar" type="file" name="foto_ProductoMay" id="imgInp"/>   
                    </div>        

                    <div>
                        <!-- PRODUCTO -->
                        <textarea class="textarea_1 borde_1" name="productoMay" id="ContenidoPro" placeholder="Producto" tabindex="1" onkeydown="blanquearInput('ContenidoPro')"></textarea>
                        <input class="contador" type="text" id="ContadorPro" value="50" readonly/>

                        <!-- DESCRIPCION -->
                        <textarea class="textarea_1 textarea_4 borde_1" name="descripcionMay" id="ContenidoDes"  placeholder="Descripción" tabindex="2" onkeydown="blanquearInput('ContenidoDes')"></textarea>
                        <input class="contador" type="text" id="ContadorDes" value="500" readonly/>

                        <!-- SECCION --> 
                        <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="seccionMay" id="SeccionPublicarMay" placeholder="Sección" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        <br><br>

                        <!-- PRECIO -->                    
                        <div style="display: flex;	justify-content: space-around;">
                            <div>
                                <label>Bs.</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text"  name="precioBsMay" id="PrecioBs" placeholder="0.00" tabindex="3" onkeydown="blanquearInput('PrecioBs')"/>
                            </div>
                            <div>
                                <label>$</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text" name="precioDolarMay" id="PrecioDolar" placeholder="0.00" tabindex="3" onkeydown="blanquearInput('PrecioDolar')"/>
                            </div>
                        </div>
                        <small class="small_1">El sistema realiza automaticamente la conversión Bolivar / Dolar según BCV. <strong class="strong_1">( $ 1 = Bs. <?php echo $PrecioDolar;?>)</strong></small>
                        <input class="ocultar" id="CambioOficial" type="text" value="<?php echo $Datos['dolarHoy'];?>"/> 
                        <br>
                        
                        <!-- CANTIDAD EN EXISTENCIA -->
                        <div id="Contenedor_152">
                            <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="cantidadMay" id="Cantidad" placeholder="Unidades en existencia">
                            <br>
                            <div class="contInputRadio">     
                                <input type="checkbox" name="disponibleMay" id="Disponible"/>
                                <label class="contInputRadio__label small_3" for="Disponible">Siempre disponible</label>
                            </div>   
                        </div>  
                        <br>
                        
                        <!-- Recibe Ajax desde SeccionesDisponiblesMay_Ajax.php -->
                        <div id="Mostrar_Secciones"></div>
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

    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_publicarMay.js';?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_publicarMay.js';?>"></script> 

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
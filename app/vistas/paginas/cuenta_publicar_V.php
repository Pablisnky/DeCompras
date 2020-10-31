<?php    
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];
      ?>        
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/flechaAbajo/style_flechaAbajo.css"/>
        
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/lapiz/style_lapiz.css"/>
        
        <!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <div class="contenedor_42">    
            <p class="p_6">Carga un producto</p>
            <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeProductoPublicar" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarPublicacion()">
                <div class="contenedor_47">
                    <div class="contenedor_129 borde_1 borde_2">
                        <label  for="imgInp"><span class="icon-pencil span_18 borde_1"></span></label>
                        <img class="imagen_6 imagen_12" id="blah" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                        <input class="ocultar" type="file" name="foto_Producto" id="imgInp"/>
                    </div>        
                    <div>
                        <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="producto" id="ContenidoPro" placeholder="Producto"  tabindex="1" onkeydown="blanquearInput('ContenidoPro')"/>
                        <input class="contador" type="text" id="ContadorPro" value="20" readonly/>

                        <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="descripcion" id="ContenidoDes" placeholder="Descripcion breve"  tabindex="2" onkeydown="blanquearInput('ContenidoDes')"/>
                        <input class="contador" type="text" id="ContadorDes" value="20" readonly/>

                        <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="precio" id="Precio" placeholder="Precio ( Solo números )"  tabindex="3" onkeydown="blanquearInput('Precio')"/>
                        <br>
                        <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="seccion" id="SeccionPublicar" placeholder="Sección" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                        
                        <!-- Recibe Ajax desde SeccionesDisponibles_Ajax.php -->
                        <div id="Contenedor_80"></div>
                        
                        <br>
                        <div class="contenedor_80" onclick="AmpliarDescripcion()">
                            <label class="label_7">Ampliar información (Opcional)</label>
                            <span class="icon-circle-down span_10"></span>
                        </div>
                            <br>
                            <br>
                        <div class="contenedor_128" id="Contenedor_128">  
                            
                        <!-- SECCION CARACTERISTICAS -->
                        <div id="Contenedor_82" class="">
                            <input class="placeholder placeholder_2 borde_1 caract_js" id="Caracteristica" type="text" name="caracteristica[]" placeholder="Nueva caracteristica del producto (Opcional)"/>
                            <br>
                        </div>
                        <label class="label_5 label_23" id="Label_5">Añadir caracteristica</label>
                        <br>

                        <!-- SECCION IMAGEN SECUNDARIA -->
                        <div class="contenedor_130" id="muestrasImg_2"></div>  
                            <p class="p_5">Añada hasta 5 fotografias no mayor a 2Mb</p>

                            <label class="label_5 label_23" for="ImgInp_2" id="ioo">Añadir imagen</label>
                            <input class="ocultar" type="file" name="imagenes[]" multiple="multiple" id="ImgInp_2" onchange="muestraImg()"/>  
                        </div>     

                        <div class="contenedor_49 contenedor_81">
                            <input class="ocultar" type="text" name="id_tienda" value="<?php echo $ID_Tienda;?>">
                            <input class="boton" type="Submit" value="Guardar" tabindex="5"/>
                        </div> 
                    </div>          
                </div>
            </form>
        </div>
        

    <!--div alimentado desde Secciones_Ajax_V.php con las secciones que el usuario cargó previamente -->    
    <div id="Contenedor_80"></div>

    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_publicar.js';?>"></script> 
    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_publicar.js';?>"></script> 

    <script> 
        //Da una vista previa de la fotografia antes de guardarla en la BD usada en cuenta_editar_prod_V.php
        function readImage(input){
        console.log("______Desde readImage()______")
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

        // Muestra grupo de imagenes
        function muestraImg(){
            var contenedorPadre = document.getElementById("muestrasImg_2");
            var archivos = document.getElementById("ImgInp_2").files;
            for(i = 0; i < archivos.length; i++){
                imgTagCreada = document.createElement("img");
                imgTagCreada.height = 200; //ESTAS LINEAS NO SON "NECESARIAS"
                imgTagCreada.width = 290; //ÚNICAMENTE HACEN QUE LAS IMÁGENES SE VEAN
                imgTagCreada.id = i; // ORDENADAS CON UN TAMAÑO ESTÁNDAR
                imgTagCreada.src = URL.createObjectURL(archivos[i]);
                contenedorPadre.appendChild(imgTagCreada); 
            }
        }
    </script>

    <?php include(RUTA_APP . "/vistas/inc/footer.php");
}
else{
    echo "Página no  autorizada";
    redireccionar("/Login_C/");
}   ?>
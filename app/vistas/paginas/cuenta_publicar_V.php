<?php 
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];
    
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php");

    //Sesion creada en Cuenta_C/Publicar
    $Seccion = $_SESSION['Seccion'];

    if(!empty($Seccion)){   ?>        
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/flechaAbajo/style_flechaAbajo.css"/>
        
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/lapiz/style_lapiz.css"/>
        
        <!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

        <div class="contenedor_42">    
            <p class="p_6">Carga un producto</p>
            <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeProducto" method="POST" enctype="multipart/form-data" autocomplete="off" ><!--onsubmit = "return validarPublicacion()"-->
                <div class="contenedor_47">
                    <!-- <div class="contenedor_129 borde_1 borde_2">
                        <label  for="imgInp"><span class="icon-pencil span_18 borde_1"></span></label>
                        <img class="imagen_6 imagen_12" id="blah" alt="Fotografia del producto" src="http://localhost/proyectos/PidoRapido/public/images/imagen.png"/>
                        <input class="ocultar" type="file" name="foto_Producto" id="imgInp"/>
                    </div>         -->
                    <div>
                        <input class="placeholder placeholder_2 borde_1" type="text" name="producto"  id="ContenidoPro" placeholder="Producto"  tabindex="1"/>
                        <input class="contador" type="text" id="ContadorPro" value="20" readonly/>

                        <input class="placeholder placeholder_2 borde_1" type="text" name="descripcion" id="ContenidoDes" placeholder="Descripcion breve"  tabindex="2"/>
                        <input class="contador" type="text" id="ContadorDes" value="20" readonly/>

                        <input class="placeholder placeholder_2 borde_1" type="text" name="precio" id="Precio" placeholder="Precio ( Solo números )"  tabindex="3"/>
                        <br>
                        <input class="placeholder placeholder_2 borde_1" type="text" name="seccion" id="SeccionPublicar" placeholder="Sección" tabindex="4"/>
                        
                        <!-- Recibe Ajax desde SeccionesDisponibles_Ajax.php -->
                        <div id="Contenedor_80"></div>
                        
                        <br>

                        <label class="label_7" onclick="AmpliarDescripcion()">Ampliar información (Opcional)<span class="icon-circle-down span_10 span_12"></span></label>
                            <br>
                            <br>
                        <div class="contenedor_128" id="Contenedor_128">                            
                            <div id="Contenedor_82" class="">
                                <input class="placeholder placeholder_2 borde_1 caract_js" id="Caracteristica" type="text" name="caracteristica[]" placeholder="Nueva caracteristica del producto (Opcional)"/>
                                <br>
                            </div>
                            <label class="label_5 label_23" id="Label_5">Añadir caracteristica</label>
                            <br>

                            <div class="contenedor_130" id="muestrasImg_2"></div>  
                            <input class="placeholder placeholder_2 borde_1" type="text" placeholder="Añada hasta 5 fotografias no mayor a 2Mb" readonly/>
                            <br>

                            <!-- <label class="label_5 label_23" for="ImgInp_2" id="ioo">Añadir imagen</label> -->
                            <input class="" type="file" name="imagenes[]" multiple="multiple" id="ImgInp_2" onchange="muestraImg()"/>  
                        </div>                        
                        <div class="contenedor_49 contenedor_81">
                            <input class="ocultar" type="text" name="id_tienda" value="<?php echo $ID_Tienda;?>">
                            <input class="boton" type="Submit" value="Guardar" tabindex="5"/>
                        </div> 
                    </div>          
                </div>
            </form>
        </div>
        <!-- <p>No haz clasificado tu tienda en alguna categoria, ve a configurar y añade una o hasta tres categorias, tambien debes generar las secciones donde se organizaras los productos que cargues al mostrador.</p> -->
        <?php
    } 
    else{    ?>
        <section class="section_3"  id="Ejemplo_Secciones">
            <div class="contenedor_24 contenedor_118">
                    <p>No tienes secciones donde colocar tus producto, ve a configuración y añade secciones donde organizar tus productos y una categoria para tu tienda.</p>
                <div class="contenedor_87">
                    
                <a class="label_21 boton" href="<?php echo RUTA_URL . '/Cuenta_C/Editar';?>">Cerrar</a>
                </div>
            </div>
        </section>  <?php
    }   ?>



















































    <!-- div alimentado desde Secciones_Ajax_V.php con las secciones que el usuario cargó en su cuenta  -->    
    <section>  
        <div id="Contenedor_80"></div>
    </section> 

    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_publicar.js';?>"></script> 
    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_publicar.js';?>"></script> 

    <script> 
        //Da una vista previa de la fotografia antes de guardarla en la BD usada en cuenta_editar_prod_V.php
        // function readImage(input){
        // console.log("______Desde readImage()______")
        //     if(input.files && input.files[0]){
        //         var reader = new FileReader();
        //         reader.onload = function(e){
        //             $('#blah').attr('src', e.target.result); // Renderizamos la imagen
        //         }
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }

        // $("#imgInp").change(function(){
        //     // Código a ejecutar cuando se detecta un cambio de archivo
        //     readImage(this);
        // });

    //     function muestraImg(){
    //         var contenedorPadre = document.getElementById("muestrasImg_2");
    //         var archivos = document.getElementById("ImgInp_2").files;
    //         for(i = 0; i < archivos.length; i++){
    //             imgTagCreada = document.createElement("img");
    //             imgTagCreada.height = 200; //ESTAS LINEAS NO SON "NECESARIAS"
    //             imgTagCreada.width = 290; //ÚNICAMENTE HACEN QUE LAS IMÁGENES SE VEAN
    //             imgTagCreada.id = i; // ORDENADAS CON UN TAMAÑO ESTÁNDAR
    //             imgTagCreada.src = URL.createObjectURL(archivos[i]);
    //             contenedorPadre.appendChild(imgTagCreada); 
    //         }
    //     }
    // </script>

    <?php include(RUTA_APP . "/vistas/inc/footer.php");
}
else{
    echo "Página no  autorizada";
    redireccionar("/Login_C/");
}   ?>
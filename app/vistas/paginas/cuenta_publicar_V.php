<?php    
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];

    //Se da formato al precio, sin decimales y con separación de miles
    $PrecioDolar = number_format($Datos['dolarHoy'], 0, ",", "."); 
      ?>     

    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/flechaAbajo/style_flechaAbajo.css"/>    
        
    <!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <div class="contenedor_42">    
        <p class="p_6">Carga un producto</p>
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeProductoPublicar" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarPublicacion()">
            <div class="contenedor_47">            
                <!-- IMAGEN PRINCIPAL -->
                <div class="contenedor_129 borde_1 borde_2">
                    <img class="contenedor_119__img" id="blah" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                    <label  for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                    <input class="ocultar" type="file" name="foto_Producto" id="imgInp"/>
                </div>  
                <div>
                    <!-- PRODUCTO -->
                    <textarea class="textarea_1 borde_1" name="producto" id="ContenidoPro" placeholder="Producto" tabindex="1" onkeydown="blanquearInput('ContenidoPro')"></textarea>
                    <input class="contador" type="text" id="ContadorPro" value="50" readonly/>

                    <!-- DESCRIPCION -->
                    <textarea class="textarea_1 textarea_4 borde_1" name="descripcion" id="ContenidoDes"  placeholder="Descripción" tabindex="2" onkeydown="blanquearInput('ContenidoDes')"></textarea>
                    <input class="contador" type="text" id="ContadorDes" value="500" readonly/>

                    <!-- SECCION --> 
                    <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="seccion" id="SeccionPublicar" placeholder="Sección" tabindex="4" onkeydown="blanquearInput('SeccionPublicar')"/>
                    <br>

                    <!-- PRECIO -->                    
                    <div style="display: flex;	justify-content: space-around;">
                        <div>
                            <label>Bs.</label><br>
                            <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text"  name="precioBs" id="PrecioBs" placeholder="Precio Bs. ( 00000.0 )" tabindex="3" onkeydown="blanquearInput('Precio')"/>
                        </div>
                        <div>
                            <label>$</label><br>
                            <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text" name="precioDolar" id="PrecioDolar" placeholder="Precio $ ( 000.0 )" tabindex="3" onkeydown="blanquearInput('Precio')"/>
                        </div>
                    </div>
                    <small class="small_1">El sistema realiza automaticamente la conversión entre Bolivar y Dolar según BCV. <strong class="strong_1">( $ 1 = Bs. <?php echo $PrecioDolar;?>)</strong></small>
                    <input class="ocultar" id="CambioOficial" type="text" value="<?php echo $Datos['dolarHoy'];?>"/> 
                    <br>

                    <!-- CANTIDAD DISPONIBLE -->
                    <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="cantidad" id="Cantidad" placeholder="Cantidad disponible">
                    <div class="contInputRadio">     
                        <input type="checkbox" name="disponible" id="Disponible"/>
                        <label class="contInputRadio__label" for="Disponible">Siempre disponible</label>
                    </div>   
                    <br>
                    
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
                        
                    <!-- CARACTERISTICAS -->
                    <div id="Contenedor_82" class="">
                        <input class="placeholder placeholder_2 borde_1 caract_js" id="Caracteristica" type="text" name="caracteristica[]" placeholder="Nueva caracteristica (Opcional)"/>
                        <br>
                    </div>
                    <label class="label_5 label_23" id="Label_5">Añadir caracteristica</label>
                    <br>

                    <!-- IMAGENES SECUNDARIAS -->
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

    <script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_publicar.js';?>"></script> 
    <script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_publicar.js';?>"></script> 

    <script> 
        //Da una vista previa de la imagen principal antes de guardarla en la BD usada en cuenta_editar_prod_V.php
        function readImage(input){
        // console.log("______Desde readImage()______")
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

        //Array contiene cantidad de imagenes insertadas, sus elementos sumados no pueden exceder de 5
        SeleccionImagenes = [];
        function muestraImg(){
            // Muestra grupo de imagenes
            console.log("______Desde muestraImg()______")

            var contenedorPadre = document.getElementById("muestrasImg_2");
            var archivos = document.getElementById("ImgInp_2").files;
            
            var CantidadImagenes = archivos.length
            console.log("Cantidad Imagenes recibidas= ", CantidadImagenes)
        
            if(CantidadImagenes < 6){
                SeleccionImagenes.push(CantidadImagenes) 
                console.log("Imagenes recibidas= ",SeleccionImagenes)
                // Suma la cantidad de imagenes que se han insertado  
                TotalSeleccionImagenes = SeleccionImagenes.reduce((a, b) => a + b)
                console.log("Suma de Imagenes = ",TotalSeleccionImagenes)
                
                if(TotalSeleccionImagenes < 6){
                    for(i = 0; i < CantidadImagenes; i++){
                        console.log(i)
                        var imgTagCreada = document.createElement("img");
                        var spanTagCreada = document.createElement("span")

                        imgTagCreada.height = 200;
                        imgTagCreada.width = 290;
                        ImagenD = imgTagCreada.id = "Imagen_" + i;
                        imgTagCreada.marginBottom = 250
                        imgTagCreada.src = URL.createObjectURL(archivos[i]);

                        spanTagCreada.innerHTML = "Eliminar"
                        spanTagCreada.id = "Etiqueta_" + i
                        spanTagCreada.style.color = "rgb(24, 24, 238)"
                        spanTagCreada.style.cursor = "pointer"
                        //Se detecta la etiqueta dondes se hizo click
                        spanTagCreada.addEventListener("click", function(e){   
                            var click = e.target
                            EliminarImagenSecundaria(click, SeleccionImagenes)
                        }, false)

                        contenedorPadre.appendChild(imgTagCreada); 
                        contenedorPadre.appendChild(spanTagCreada); 
                    }
                }
                else{
                    alert("Máximo imagenes alcanzado (5)")
                    //Se elimina la ultima cantidad de imagenes que se quiso insertar
                    SeleccionImagenes.pop() 
                    console.log("Array imagenes seleccionadas= ", SeleccionImagenes)
                }
            }
            else{
                alert("Máximo 5 imagenes permitidas")
            }
        }
    </script>

    <?php include(RUTA_APP . "/vistas/inc/footer.php");
}
else{
    redireccionar("/Login_C/");
}   ?>
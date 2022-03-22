<?php    
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];

    //Se da formato al precio, sin decimales y con separación de miles
    $PrecioDolar = number_format($Datos['dolarHoy'], 4, ",", "."); 
      ?>       
        
    <!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización de la imagen del producto--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <div class="contenedor_42">  
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeProductoPublicar" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarPublicacion()">

            <a id="Ancla_01" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3"> 
                <legend class="legend_1">Cargar producto</legend>
                <div class="contenedor_47">    
                    
                    <!-- IMAGEN PRINCIPAL -->
                    <div class="contenedor_129 borde_1 borde_2">
                        <img class="contenedor_119__img" id="blah" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                        <label  for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                        <input class="ocultar" type="file" name="foto_Producto" id="imgInp"/>   
                        <div class="contInputRadio contInputRadio--center">     
                            <input type="checkbox" name="produc_destacado" id="Produc_Destacado"/>
                            <label class="contInputRadio__label" for="Produc_Destacado">Producto destacado</label>
                        </div> 
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
                                <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text"  name="precioBs" id="PrecioBs" placeholder="0.00" tabindex="3" onkeydown="blanquearInput('Precio')"/>
                            </div>
                            <div>
                                <label>$</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text" name="precioDolar" id="PrecioDolar" placeholder="0.00" tabindex="3" onkeydown="blanquearInput('Precio')"/>
                            </div>
                        </div>
                        <small class="small_1">El sistema realiza automaticamente la conversión Bolivar / Dolar según BCV. <strong class="strong_1">( $ 1 = Bs. <?php echo $PrecioDolar;?>)</strong></small>
                        <input class="ocultar" id="CambioOficial" type="text" value="<?php echo $Datos['dolarHoy'];?>"/> 
                        <br>
                        
                        <!-- CANTIDAD EN EXISTENCIA -->
                        <div id="Contenedor_152">
                            <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="cantidad" id="Cantidad" placeholder="Unidades en existencia">
                            <div class="contInputRadio">     
                                <input type="checkbox" name="disponible" id="Disponible"/>
                                <label class="contInputRadio__label small_3" for="Disponible">Siempre disponible</label>
                            </div>   
                        </div>  
                        <br>
                        
                        <!-- Recibe Ajax desde SeccionesDisponibles_Ajax.php -->
                        <div id="Contenedor_80"></div>
                    </div>          
                </div>
            </fieldset>
            
            <!-- <a id="Ancla_02" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3">
                <legend class="legend_1">Reposición</legend>-->
                                    
                <!-- % REPOSICION -->
                <!-- <label>% de incremento por reposición</label>
                <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="incremento" id="Incremento"/>
                <small class="small_1">Este % sera uzado para estimar cuanto costará el producto para la proxima fecha de reposición, de esta manera se garantiza el suministro de mercancia.</small>
                <br> -->

                <!-- PRECIO ESTIMADO PROXIMA REPOSICIÓN -->
                <!-- <label>Precio estimado para proxima reposición</label>
                <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="incremento" id="Incremento"/>
                <small class="small_1">Este precio es calculado al incrementar el precio del proveedor en el % que usted a estimado.</small>
                <br> -->

                <!-- FECHA DOTACION -->
                <!-- <label>Fecha dotación</label>
                <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="fecha_dotacion" id="Fecha_Dotacion" value="<?php echo $Datos['fechaDotacion'];?>"/>
                <br> -->
                
                <!-- FECHA REPOSICION -->
                <!-- <label>Fecha proxima reposición (sugerencia 7 dias)</label>
                <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="fecha_reposicion" id="Fecha_Reposicion" value="<?php echo $Datos['fechaReposicion'];?>"/>
                <small class="small_1">La fecha de reposición se recomienda sea de siete dias despues de la fecha de suministro, la tasa de incremento de inflación es alta y se ha observado cambios en 17% mensual en algunos productos de uso cotidiano.</small>
            </fieldset>    -->

            <a id="Ancla_03" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3">
                <legend class="legend_1">Inf. Adicional</legend>                  

                <div class="contenedor_80" onclick="AmpliarDescripcion()">
                            <label class="label_7">Ampliar información (Opcional)</label>
                            <i class="fas fa-arrow-down span_10"></i>
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
                            <p class="p_5">Añada hasta 4 fotografias no mayor a 2 Mb / CU</p>

                            <label class="label_5 label_23" for="ImgInp_2">Añadir imagen</label>
                            <input class="ocultar" type="file" name="imagenes[]" multiple="multiple" id="ImgInp_2" onchange="muestraImg()"/>  
                        </div>     

                        <div class="contenedor_49 contenedor_81">
                            <input class="ocultar" type="text" name="id_tienda" value="<?php echo $ID_Tienda;?>">
                        </div> 
            </fieldset>   

            <!-- MENU INDICE -->
            <section> 
                <div class="contenedor_83 borde_1">
                    <a class="marcador" href="#Ancla_01">Cargar Producto</a>
                    <!-- <a class="marcador" href="#Ancla_02">Reposición</a> -->
                    <a class="marcador" href="#Ancla_03">Inf. Adicional</a>
                    <div class="contenedor_49 contenedor_101">
                        <input class="ocultar" type="text" name="ID_Tienda" value="<?php echo $ID_Tienda;?>"/>
                        <input class="boton boton--largo" type="submit" value="Guardar cambios"/>
                    </div>          
                </div>
            </section> 
        </form>
    </div>        

    <!--div alimentado desde Secciones_Ajax_V.php con las secciones que el usuario cargó previamente -->    
    <div id="Contenedor_80"></div>

    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_publicar.js';?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_publicar.js';?>"></script> 
    <!-- <script src="<?php //echo RUTA_URL . '/public/javascript/funcionesVarias.js';?>"></script>  -->

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

                        imgTagCreada.width = 290;
                        imgTagCreada.height = 290;
                        ImagenD = imgTagCreada.id = "Imagen_" + i;
                        // imgTagCreada.marginBottom = 250
                        imgTagCreada.src = URL.createObjectURL(archivos[i]);

                        spanTagCreada.innerHTML = "Eliminar"
                        spanTagCreada.id = "Etiqueta_" + i
                        spanTagCreada.style.color = "rgb(24, 24, 238)"
                        spanTagCreada.style.cursor = "pointer"
                        spanTagCreada.style.marginBottom = 100

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

    <?php include(RUTA_APP . "/vistas/footer/footer.php");
}
else{
    header("location:" . RUTA_URL. "/Login_C");
}   ?>
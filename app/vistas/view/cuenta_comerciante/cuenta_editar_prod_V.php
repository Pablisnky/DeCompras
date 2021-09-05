<?php 
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];

    //$Datos viene del metodo Cuenta_C/actualizarProducto
    foreach($Datos['especificaciones'] as $arr) :
        $ID_Producto = $arr['ID_Producto'];
        $ID_Opcion = $arr['ID_Opcion'];
        $ID_Seccion = $arr['ID_Seccion'];
        $ID_SP = $arr['ID_SP'];
        $Producto = $arr['producto'];
        $Opcion = $arr['opcion'];
        $PrecioBolivar = $arr['precioBolivar'];
        $PrecioDolar = $arr['precioDolar'];
        $Seccion = $arr['seccion'];
        $Disponible = $arr['disponible'];
        $Cantidad = $arr['cantidad'];
        $Pro_Destacado = $arr['destacar'];
    endforeach;  

    //$Datos viene del metodo Cuenta_C/actualizarProducto
    foreach($Datos['imagenesVarias'] as $arr) :
        $Imagenes = $arr['nombre_img']; 
    endforeach;  

    foreach($Datos['imagenPrin'] as $arr) :
        $ID_ImagenPrincipal = $arr['ID_Imagen'];
        $ImagenPrincipal = $arr['nombre_img'];
    endforeach;  
    
    foreach($Datos['reposicion'] as $arr) :
        $Fecha_Dotacion = $arr['fecha_dotacion'];
        $Fecha_Reposicion = $arr['fecha_reposicion'];
        $Incremento = $arr['incremento'];
    endforeach; 
    
    // echo "<pre>";
    // print_r($Datos);
    // echo "</pre>";
    // exit();  
    ?>
    
    <!-- CDN libreria JQuery, necesario para la previsualización de la imagen   return validarActualizacion()--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    <div class="contenedor_42">    
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeAtualizarProducto" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit = "">

            <a id="Ancla_01" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3">
                <legend class="legend_1">Actualizar datos generales</legend>
                <div class="contenedor_47" id="Contenedor_47">
                
                    <!-- IMAGEN PRINCIPAL -->
                    <div>                    
                        <div class="contenedor_119 borde_1 borde_2">
                            <img class="contenedor_119__img" id="blah_2" alt="Fotografia de producto" src="../../public/images/productos/<?php echo $ImagenPrincipal;?>"/>
                            <label for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                            <input class="ocultar" type="file" name="imagenPrinci_Editar" id="imgInp"/>
                        </div>
                        <div class="contInputRadio contInputRadio--center">     
                            <input type="checkbox" name="pro_destacado" id="Pro_Destacado" <?php  if($Pro_Destacado == 1){echo 'checked';} ?>/>
                            <label class="contInputRadio__label" for="Pro_Destacado">Producto destacado</label>
                        </div>  
                    </div>
                
                    <div id="Contenedor_152">
                        <!-- PRODUCTO -->
                        <label>Producto</label>
                        <textarea class="textarea_1 borde_1" name="producto" id="ContenidoPro"><?php echo $Producto;?></textarea>
                        <input class="contador" type="text" id="ContadorPro" value="50"/>

                        <!-- DESCRIPCION -->
                        <label>Descripcion</label>
                        <textarea class="textarea_1 borde_1" name="descripcion" id="ContenidoDes"><?php echo $Opcion;?></textarea>
                        <input class="contador" type="text" id="ContadorDes" value="500"/>

                        <!-- SECCION -->
                        <label>Sección</label>
                        <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="seccion"  id="Seccion" value="<?php echo $Seccion;?>" onclick="Llamar_seccion('<?php echo $ID_Producto?>')">
                        <br>

                        <!-- CANTIDAD EN EXISTENCIA -->
                        <!-- <label>Unidades en existencia</label>
                        <?php
                       // if($Disponible == 1){   ?>
                            <input class="placeholder placeholder_2 placeholder_4" type="text" name="uni_existencia" id="Cantidad" disabled>
                            <?php
                       // else{   ?>                        
                            <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="uni_existencia" id="Cantidad" value="<?php echo $Cantidad;?>">   <?php
                       // }   ?>
                        <div class="contInputRadio">     
                            <input type="checkbox" name="disponible" id="Disponible" <?php if($Disponible == 1){echo 'checked';} ?>/>
                            <label class="contInputRadio__label" for="Disponible">Siempre en existencia</label>
                        </div>   
                        <br> -->

                        <!-- PRECIO -->
                        <label>Precio de venta</label>            
                        <br>
                        <div style="display: flex;">
                            <div>
                                <label>Bs.</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text" name="precioBolivar" id="PrecioBolivar" value="<?php echo $PrecioBolivar;?>"/>
                            </div>
                            <div>
                                <label>$</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text" name="precioDolar" id="PrecioDolar" value="<?php echo $PrecioDolar;?>"/>
                            </div>
                        </div> 
                        <small class="small_1">El sistema realiza automaticamente la conversión entre Bolivar y Dolar según BCV. <strong class="strong_1">( $ 1 = Bs. <?php echo number_format($Datos['dolarHoy'], 0, ",", ".");?>)</strong></small>
                        <input class="ocultar" id="CambioOficial" type="text" value="<?php echo $Datos['dolarHoy'];?>"/>
                    </div>  
                </div>
            </fieldset>   
            
            <a id="Ancla_02" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3">
                <legend class="legend_1">Actualizar reposición</legend>

                    <!-- CANTIDAD EN EXISTENCIA -->
                    <div id="Contenedor_152">
                        <label>Unidades cargadas</label>
                        <?php
                        if($Disponible == 1){   ?>
                            <input class="placeholder placeholder_2 placeholder_4" type="text" name="uni_existencia" id="Cantidad" disabled>
                            <?php
                        }
                        else{   ?>                        
                            <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="uni_existencia" id="Cantidad" value="<?php echo $Cantidad;?>">   <?php
                        }   ?>
                        <div class="contInputRadio">     
                            <input type="checkbox" name="disponible" id="Disponible" <?php if($Disponible == 1){echo 'checked';} ?>/>
                            <label class="contInputRadio__label small_3" for="Disponible">Siempre en existencia</label>
                        </div>   
                    </div>  
                    <br>
                    
                    <!-- % REPOSICION -->
                    <label>% de incremento por reposición</label>
                    <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="incremento" id="Incremento" value="<?php echo $Incremento;?>">
                    <small class="small_1">Este % sera uzado para estimar cuanto costará el producto para la proxima fecha de reposición, de esta manera se garantiza el suministro de mercancia.</small>
                    <br>
                    
                    <!-- FECHA DOTACION -->
                    <label>Fecha dotación</label>
                    <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="fecha_dotacion" id="Fecha_Dotacion" value="<?php echo $Fecha_Dotacion;?>" onchange="sumaFecha(7, this.value)"/>
                    <br>  
                    
                    <!-- FECHA REPOSICION -->
                    <label>Fecha proxima reposición (sugerencia 7 dias)</label>
                    <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="fecha_reposicion" id="Fecha_Reposicion" value="<?php echo $Fecha_Reposicion;?>">
                    <small class="small_1">La fecha de reposición se recomienda sea de siete dias despues de la fecha de suministro, la tasa de incremento de inflación es alta y se ha observado cambios en 17% mensual en algunos productos de uso cotidiano.</small>
            </fieldset>   

            <a id="Ancla_03" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3">
                <legend class="legend_1">Actualizar inf. Adicional</legend>
                        <!-- CARACTERISTICAS -->                     
                        <label>Caracteristica ( Opcional )</label>       
                        <div class="Contenedor_82" id="Contenedor_128">
                            <?php
                            //Entra en el IF cuando no hay caracteristicas creadas
                            if($Datos['caracteristicas'] == Array ()){    ?>
                                <div class="Contenedor_80" id="Contenedor_82">
                                    <input class="placeholder placeholder_2 placeholder_3 borde_1 caract_js" type="text" name="caracteristica[]" id="Caracteristica" placeholder="Nueva caracteristica"/>
                                    <i class="fas fa-times span_12_js"></i>
                                </div> 
                                <?php
                            }
                            else{                            
                                foreach($Datos['caracteristicas'] as $arr) : ?>    
                                    <div class="Contenedor_80" id="Contenedor_82">
                                        <input class="placeholder placeholder_2 placeholder_3 borde_1 caract_js" id="Caracteristica" type="text" name="caracteristica[]" value="<?php echo $arr['caracteristica'];?>"/>
                                        <i class="fas fa-times span_12_js"></i>
                                        <br>
                                    </div>
                                    <?php
                                endforeach;  
                            }    ?> 
                            <label class="label_5 label_23" id="Label_5">Añadir caracteristica</label>
                        </div>                        

                        <!-- IMAGENES SECUNDARIAS -->
                        <div class="contenedor_170">
                            <?php
                            $Cont = 1;
                            //Datos proviene de Cuenta_C/actualizarProducto
                            foreach($Datos['imagenesVarias'] as $arr) : 
                                $ID_Imagen =  $arr['ID_Imagen']  ?>
                                <div class="contenedor_119 contenedor_121" id="<?php echo 'DivImagenSecun_' . $Cont;?>">
                                        <span class=" spanCerrar--black" onclick="EliminarImagenSecundaria(<?php echo 'DivImagenSecun_' . $Cont;?>); Llamar_EliminarImagenSecundaria('<?php echo  $ID_Imagen;?>','<?php echo $Datos['especificaciones'][0]['ID_Producto'];?>')"><i class="fas fa-times "></i></span>
                                        <img class="contenedor_119__img" id="<?php echo $ID_Imagen;?>" alt="Fotografia del producto" src="../../public/images/productos/<?php echo $arr['nombre_img'];?>"/>
                                </div>
                                
                                <?php
                                $Cont ++;
                            endforeach; 
                            $CantidadImagenes = count($Datos['imagenesVarias']); 
                            if($CantidadImagenes < 4){ ?>
                                <div class="contenedor_49">
                                    <input class="ocultar" type="file" name="imagen_EditarVarias[]" multiple="multiple" id="ImgInp_2" onchange="muestraImg()"/>
                                    <p class="">Añada hasta 4 imagenes no mayor a 2 Mb / C.U</p>
                                    <br>
                                    <label class="label_5 label_23" for="ImgInp_2" id="ioo">Añadir imagen</label>
                                </div>  <?php
                            }
                            else{   ?>
                                <div class="contenedor_49" id="Contenedor_49">
                                    <p class="p_5">Máximo de imagenes añadidas</p>
                                </div>
                                <?php
                            }   ?>          
                        </div>

                        <!-- div que muestra la previsualización de las imagenes añadidas-->
                        <div class="contenedor_134" id="muestrasImg"></div> 
            </fieldset>   
                                        
            <div class="contenedor_49 contenedor_81">
                <input class="ocultar" type="text" name="id_tienda" value="<?php echo $ID_Tienda?>"/>
                <input class="ocultar" type="text" name="id_producto" value="<?php echo $ID_Producto;?>">
                <input class="ocultar" type="text" name="id_opcion" value="<?php echo $ID_Opcion;?>">
                <input class="ocultar" type="text" name="id_seccion" id="ID_Seccion" value="<?php echo $ID_Seccion;?>"/>
                <input class="ocultar" type="text" name="id_sp" value="<?php echo $ID_SP;?>"/>
                <input class="ocultar" type="text" name="puntero" value="<?php echo $Datos['puntero'];?>"/>
                <input class="ocultar" type="text" name="id_imagen" value="<?php echo $ID_ImagenPrincipal;?>"/>
                <!-- <input class="boton" type="submit" value="Guardar"/> -->
            </div> 

            <!-- MENU INDICE -->
            <section> 
                <div class="contenedor_83 borde_1">
                    <a class="marcador" href="#Ancla_01">Datos generales</a>
                    <a class="marcador" href="#Ancla_02">Reposición</a>
                    <a class="marcador" href="#Ancla_03">Inf. Adicional</a>
                    <div class="contenedor_49 contenedor_101">
                        <input class="ocultar" type="text" name="ID_Tienda" value="<?php echo $ID_Tienda;?>"/>
                        <input class="boton boton--largo" type="submit" value="Guardar cambios"/>
                    </div>          
                </div>
            </section> 
        </form>
    </div>
    
    <!-- div alimentado desde Secciones_Ajax_V.php con la seccion que el usuario cargó en su cuenta  -->       
    <div id="Contenedor_80"></div> 

    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar_prod.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_editar_prod.js?v=' . rand();?>"></script> 

    <script> 
        //Da una vista previa de la imagen principal antes de guardarla en la BD
        function readImage(input){
            // console.log("______Desde readImage()______", input)
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#blah_2').attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function(){
            //Código a ejecutar cuando se detecta un cambio de archivo en imagen principal
            readImage(this);
        });
        
        //Da una vista previa de las imagenes secundarias seleccionadas
        function muestraImg(){
            var contenedor = document.getElementById("muestrasImg");
            var archivos = document.getElementById("ImgInp_2").files;
            for(i = 0; i < archivos.length; i++){
                imgTag = document.createElement("img");
                imgTag.height = 100;//ESTAS LINEAS NO SON "NECESARIAS"
                imgTag.width = 200; //ÚNICAMENTE HACEN QUE LAS IMÁGENES SE VEAN
                // imgTag.class = "imagen_6";
                imgTag.id = i;      // ORDENADAS CON UN TAMAÑO ESTÁNDAR
                imgTag.src = URL.createObjectURL(archivos[i]);
                contenedor.appendChild(imgTag);
            }
        }

        //Array que contiene la cantidad de imagenes insertadas, sus elementos sumados no pueden exceder de 5
        SeleccionImagenes = [];
        function CantidadImg(){
            // console.log("______Desde CantidadImg()______")

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

    <?php include(RUTA_APP . "/vistas/footer/footer.php");
}
else{
    redireccionar("/Login_C/");
}   ?>
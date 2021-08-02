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
    endforeach;  

    //$Datos viene del metodo Cuenta_C/actualizarProducto
    foreach($Datos['imagenesVarias'] as $arr) :
        $Imagenes = $arr['nombre_img']; 
    endforeach;  

    foreach($Datos['imagenPrin'] as $arr) :
        $ID_ImagenPrincipal = $arr['ID_Imagen'];
        $ImagenPrincipal = $arr['nombre_img'];
        $ImgSeccion = $arr['fotoSeccion'];
    endforeach;  
    
    // echo "<pre>";
    // print_r($Datos);
    // echo "</pre>";
    // exit();  
    ?>
    
    <!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/> -->
        
    <div class="contenedor_42">    
        <p class="p_6">Actualizar datos de producto</p>
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeAtualizarProducto" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit = "return validarActualizacion()">
            <div class="contenedor_47" id="Contenedor_47">
                
                <!-- IMAGEN PRINCIPAL -->
                <div>                    
                    <div class="contenedor_119 borde_1 borde_2">
                        <img class="contenedor_119__img" id="blah_2" alt="Fotografia de producto" src="../../public/images/productos/<?php echo $ImagenPrincipal;?>"/>
                        <label for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                        <input class="ocultar" type="file" name="imagenPrinci_Editar" id="imgInp"/>
                    </div>
                    <div class="contInputRadio contInputRadio--center">     
                        <input type="checkbox" name="imgSeccion" id="ImgSeccion" <?php if($ImgSeccion == 1){echo 'checked';} ?>/>
                        <label class="contInputRadio__label" for="ImgSeccion">Imagen de sección</label>
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

                    <!-- PRECIO -->
                    <label>Precio</label><br>
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
                    <br>

                    <!-- CANTIDAD EN EXISTENCIA -->
                    <label>Unidades en existencia</label>
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
                        <label class="contInputRadio__label" for="Disponible">Siempre en existencia</label>
                    </div>   
                    <br>

                    <!-- SECCION -->
                    <label>Sección</label>
                    <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="seccion"  id="Seccion" value="<?php echo $Seccion;?>" onclick="Llamar_seccion('<?php echo $ID_Producto?>')">

                    <br>

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
                                      
                    <div class="contenedor_49 contenedor_81">
                        <input class="ocultar" type="text" name="id_tienda" value="<?php echo $ID_Tienda?>"/>
                        <input class="ocultar" type="text" name="id_producto" value="<?php echo $ID_Producto;?>">
                        <input class="ocultar" type="text" name="id_opcion" value="<?php echo $ID_Opcion;?>">
                        <input class="ocultar" type="text" name="id_seccion" id="ID_Seccion" value="<?php echo $ID_Seccion;?>"/>
                        <input class="ocultar" type="text" name="id_sp" value="<?php echo $ID_SP;?>"/>
                        <input class="ocultar" type="text" name="puntero" value="<?php echo $Datos['puntero'];?>"/>
                        <input class="ocultar" type="text" name="id_imagen" value="<?php echo $ID_ImagenPrincipal;?>"/>
                        <input class="boton" type="submit" value="Guardar"/>
                    </div> 
                </div>
            </div>
        </form>
    </div>
    
    <!-- div alimentado desde Secciones_Ajax_V.php con la seccion que el usuario cargó en su cuenta  -->       
    <div id="Contenedor_80"></div> 

    <script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar_prod.js?v=' . rand();?>"></script> 
    <script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_editar_prod.js?v=' . rand();?>"></script> 

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

    <?php include(RUTA_APP . "/vistas/inc/footer.php");
}
else{
    redireccionar("/Login_C/");
}   ?>
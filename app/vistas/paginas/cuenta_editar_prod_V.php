<?php 
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];

    require(RUTA_APP . "/vistas/inc/header_AfiCom.php");
    // echo '<br><br><br><br>';
    // echo '<pre>';
    // print_r($Datos);
    // echo '</pre>';
    // exit;

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
        $Fotografia = $arr['fotografia'];
    endforeach;     ?>
    
    <!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/lapiz/style_lapiz.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>
        
    <div class="contenedor_42">    
        <p class="p_6">Actualizar datos de producto</p>
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeAtualizarProducto" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit = "return validarActualizacion()">
            <div class="contenedor_47" id="Contenedor_47">
                
                    <!-- SECCION IMAGEN PRINCIPAL -->
                <div class="contenedor_129 borde_1 borde_2">
                    <label for="imgInp"><span class="icon-pencil span_18 borde_1"></span></label>
                    <img class="imagen_6" id="blah" alt="Fotografia del producto" src="../../public/images/productos/<?php echo $Fotografia;?>"/>
                    <input class="ocultar" type="file" name="imagenPrinci_Editar" id="imgInp"/>
                    <label>Imagen principal</label>
                </div>
                <div>
                    <!-- SECCION PRODUCTO -->
                    <label>Producto</label>
                    <textarea class="textarea_1 borde_1" name="producto" id="ContenidoPro"><?php echo $Producto;?></textarea>
                    <input class="contador" type="text" id="ContadorPro" value="50"/>

                    <!-- SECCION DESCRIPCION -->
                    <label>Descripcion</label>
                    <textarea class="textarea_1 borde_1" name="descripcion" id="ContenidoDes"><?php echo $Opcion;?></textarea>
                    <input class="contador" type="text" id="ContadorDes" value="500"/>

                    <!-- SECCION PRECIO -->
                    <label>Precio</label><br>
                    <div style="display: flex;">
                        <div>
                            <label>Bs.</label><br>
                            <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text" name="precioBolivar" id="PrecioBolivar" value="<?php echo $PrecioBolivar;?>"/>
                        </div>
                        <div>
                            <label>$ USD</label><br>
                            <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text" name="precioDolar" id="PrecioDolar" value="<?php echo $PrecioDolar;?>"/>
                        </div>
                    </div> 
                    <small class="small_1">El sistema realiza automaticamente la conversión entre Bolivar y Dolar según BCV. <strong class="strong_1">( 1 USD = <?php echo number_format($Datos['dolarHoy'], 0, ",", ".");?> Bs.)</strong></small>
                    <input class="ocultar" id="CambioOficial" type="text" value="<?php echo $Datos['dolarHoy'];?>"/>
                    <br>

                    <!-- SECCION SECCION -->
                    <label>Sección</label>
                    <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="seccion"  id="Seccion" value="<?php echo $Seccion;?>" onclick="Llamar_seccion('<?php echo $ID_Producto?>')">

                    <!-- div alimentado desde Secciones_Ajax_V.php con la seccion que el usuario cargó en su cuenta  -->       
                    <div id="Contenedor_80"></div> 
                    <br>

                    <!-- SECCION CARACTERISTICA -->                     
                    <label>Caracteristica ( Opcional )</label>       
                    <div class="Contenedor_82" id="Contenedor_128">
                        <?php
                        //Entra en el IF cuando no hay caracteristicas creadas
                        if($Datos['caracteristicas'] == Array ()){    ?>
                            <div class="Contenedor_80" id="Contenedor_82">
                                <input class="placeholder placeholder_2 placeholder_3 borde_1 caract_js" type="text" name="caracteristica[]" id="Caracteristica" placeholder="Nueva caracteristica"/>
                                <span class="icon-cancel-circle span_10 span_12_js"></span> 
                            </div> 
                            <?php
                        }
                        else{                            
                            foreach($Datos['caracteristicas'] as $arr) : ?>    
                                <div class="Contenedor_80" id="Contenedor_82">
                                    <input class="placeholder placeholder_2 placeholder_3 borde_1 caract_js" id="Caracteristica" type="text" name="caracteristica[]" value="<?php echo $arr['caracteristica'];?>"/>
                                    <span class="icon-cancel-circle span_10 span_12_js"></span>
                                    <br>
                                </div>
                                <?php
                            endforeach;  
                        }    ?> 
                        <label class="label_5 label_23" id="Label_5">Añadir caracteristica</label>
                    </div>                        

                    <!-- SECCION IMAGENES SECUNDARIAS -->
                    <divs>
                        <?php
                        $Cont = 1;
                        //Datos proviene de Cuenta_C/actualizarProducto
                        foreach($Datos['imagenesVarias'] as $arr) : 
                            $ID_Imagen =  $arr['ID_Imagen']  ?>
                            <div class="contenedor_119 contenedor_121 borde_1 borde_2" id="<?php echo 'DivImagenSecun_' . $Cont;?>">
                                <div>
                                    <span class="icon-cancel-circle span_18 borde_1" onclick="EliminarImagenSecundaria(<?php echo 'DivImagenSecun_' . $Cont;?>); Llamar_EliminarImagenSecundaria('<?php echo  $ID_Imagen;?>','<?php echo $Datos['especificaciones'][0]['ID_Producto'];?>')"></span>
                                    <img class="imagen_6" id="<?php echo $ID_Imagen;?>" alt="Fotografia del producto" src="../../public/images/productos/<?php echo $arr['nombre_img'];?>"/>
                                </div>
                            </div>
                            <?php
                            $Cont ++;
                        endforeach; 
                        ?>
                        <div id="Contenedor_114">
                            <?php
                            $CantidadImagenes = count($Datos['imagenesVarias']); 
                            if($CantidadImagenes < 5){ ?>
                                <div class="contenedor_49">
                                    <label class="label_5 label_23" for="ImgInp_2" id="ioo">Añadir imagen</label>
                                    <input class="ocultar" type="file" name="imagen_EditarVarias[]" multiple="multiple" id="ImgInp_2" onchange="muestraImg()"/> 
                                </div>
                                <?php
                            }
                            else{   ?>
                                <p class="p_5">Máximo de imagenes añadidas</p>
                                <?php
                            }   ?>                            
                        </div>
                    </div>

                    <!-- div muestra las imagenes que se van a añadir -->
                    <!-- <div class="contenedor_130" id="muestrasImg_2"></div>   -->

                    <!-- div que muestra la previsualización de las imagenes secundarias-->
                    <div class="contenedor_134" id="muestrasImg"></div> 
                                      
                    <div class="contenedor_49 contenedor_81">
                        <input class="ocultar" type="text" name="id_tienda" value="<?php echo $ID_Tienda?>"/>
                        <input class="ocultar" type="text" name="id_producto" value="<?php echo $ID_Producto;?>">
                        <input class="ocultar" type="text" name="id_opcion" value="<?php echo $ID_Opcion;?>">
                        <input class="ocultar" type="text" name="id_seccion" id="ID_Seccion" value="<?php echo $ID_Seccion;?>"/>
                        <input class="ocultar" type="text" name="id_sp" value="<?php echo $ID_SP;?>"/>
                        <input class="ocultar" type="text" name="puntero" value="<?php echo $Datos['puntero'];?>"/>
                        <input class="boton" type="submit" value="Guardar"/>
                    </div> 
                </div>
            </div>
        </form>
    </div>

    <script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar_prod.js';?>"></script> 
    <script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_editar_prod.js';?>"></script> 

    <script> 
        //Da una vista previa de la imagen principal
        function readImage(input, id_Label){
            // console.log("______Desde readImage()______", input + ' | ' + id_Label)
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    id_Label.attr('src', e.target.result); //Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgInp").change(function(){
            //Código a ejecutar cuando se detecta un cambio de archivo en imagen principal
            var id_Label = $('#blah');
            readImage(this, id_Label);
        });
        
        //Da una vista previa de las imagenes secundarias seleccionadas
        function muestraImg(){
            var contenedor = document.getElementById("muestrasImg");
            var archivos = document.getElementById("ImgInp_2").files;
            for(i = 0; i < archivos.length; i++){
                imgTag = document.createElement("img");
                imgTag.height = 100;//ESTAS LINEAS NO SON "NECESARIAS"
                imgTag.width = 200; //ÚNICAMENTE HACEN QUE LAS IMÁGENES SE VEAN
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
<?php 
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){
    // $ID_Tienda = $_SESSION["ID_Tienda"];

    //$Datos viene del metodo Cuenta_C/actualizarProductoMay
    foreach($Datos['especificaciones'] as $arr) :
        $ID_Producto = $arr['ID_ProductoMay'];
        $ID_Opcion = $arr['ID_OpcionMay'];
        $ID_Seccion = $arr['ID_SeccionMay'];
        $ID_SP = $arr['ID_SP'];
        $Producto = $arr['productoMay'];
        $Opcion = $arr['opcionMay'];
        $PrecioBolivar = $arr['precioBolivarMay'];
        $PrecioDolar = $arr['precioDolarMay'];
        $Seccion = $arr['seccionMay'];
        $Disponible = $arr['disponibleMay'];
        $Cantidad = $arr['cantidadMay'];
        $Pro_Destacado = $arr['destacarMay'];
    endforeach;  

    foreach($Datos['imagenProducto'] as $arr) :
        $ImagenProducto = $arr['nombre_imgMay'];
    endforeach;  
    
    // echo "<pre>";
    // print_r($Datos);
    // echo "</pre>";
    // exit();  
    ?>
    
    <!-- CDN libreria JQuery, necesario para la previsualización de la imagen   --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    <div class="contenedor_42">    
        <form action="<?php echo RUTA_URL; ?>/CuentaMayorista_C/recibeAtualizarProductoMay" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit = "return validarActualizacion()">

            <a id="Ancla_01" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3">
                <legend class="legend_1">Actualizar datos producto</legend>
                <div class="contenedor_47" id="Contenedor_47">
                
                    <!-- IMAGEN PRODUCTO -->
                    <div>                    
                        <div class="contenedor_119 borde_1 borde_2">
                            <?php
                            if($ImagenProducto == ''){ ?>
                                <img class="contenedor_119__img" id="blah_2" alt="Fotografia de producto" src="../../public/images/imagen.png"/>
                                <label for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                                <input class="ocultar" type="file" name="imagenProductorMay" id="imgInp"/>
                                <?php
                            }  
                            else{ ?>
                                <img class="contenedor_119__img" id="blah_2" alt="Fotografia de producto" src="../../public/images/proveedor/Don_Rigo/<?php echo $ImagenProducto;?>"/>
                                <label for="imgInp"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                                <input class="ocultar" type="file" name="imagenProductorMay" id="imgInp"/>
                                <?php
                            }  ?>
                        </div>
                    </div>
                
                    <div id="Contenedor_152">
                        <!-- PRODUCTO -->
                        <label>Producto</label>
                        <textarea class="textarea_1 borde_1" name="productoMay" id="ContenidoPro"><?php echo $Producto;?></textarea>
                        <input class="contador" type="text" id="ContadorPro" value="50"/>

                        <!-- DESCRIPCION -->
                        <label>Descripcion</label>
                        <textarea class="textarea_1 borde_1" name="descripcionMay" id="ContenidoDes"><?php echo $Opcion;?></textarea>
                        <input class="contador" type="text" id="ContadorDes" value="500"/>

                        <!-- SECCION -->
                        <label>Sección</label>
                        <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="seccionMay" id="Seccion" value="<?php echo $Seccion;?>" onclick="Llamar_seccionSeleccionadaMay('<?php echo $ID_Producto?>')">
                        <br><br><br>

                        <!-- PRECIO -->
                        <label>Precio de venta</label>            
                        <br>
                        <div style="display: flex;">
                            <div>
                                <label>Bs.</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text" name="precioBolivarMay" id="PrecioBolivar" value="<?php echo $PrecioBolivar;?>"/>
                            </div>
                            <div>
                                <label>$</label><br>
                                <input class="placeholder placeholder_2 placeholder_5 borde_1" type="text" name="precioDolarMay" id="PrecioDolar" value="<?php echo $PrecioDolar;?>"/>
                            </div>
                        </div> 
                        <small class="small_1">El sistema realiza automaticamente la conversión Bolivar / Dolar según BCV. <strong class="strong_1">( $ 1 = Bs. <?php echo number_format($Datos['dolarHoy'], 4, ",", ".");?>)</strong></small>
                        <input class="ocultar" id="CambioOficial" type="text" value="<?php echo $Datos['dolarHoy'];?>"/>
                        <br><br>

                        <!-- CANTIDAD EN EXISTENCIA -->
                        <div id="Contenedor_152">
                            <label>Unidades cargadas</label>
                            <?php
                            if($Disponible == 1){   ?>
                                <input class="placeholder placeholder_2 placeholder_4" type="text" name="uni_existenciaMay" id="Cantidad" disabled>
                                <?php
                            }
                            else{   ?>                        
                                <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="uni_existenciaMay" id="Cantidad" value="<?php echo $Cantidad;?>">   <?php
                            }   ?>
                            <div class="contInputRadio">     
                                <input type="checkbox" name="disponibleMay" id="Disponible" <?php if($Disponible == 1){echo 'checked';} ?>/>
                                <label class="contInputRadio__label small_3" for="Disponible">Siempre en existencia</label>
                            </div>   
                        </div>  
                    </div>  
                </div>
        
                <article>
                    <div class="contenedor_49 contenedor_81">
                        <input class="ocultar" type="text" name="id_productoMay" value="<?php echo $ID_Producto;?>">
                        <input class="ocultar" type="text" name="id_opcionMay" value="<?php echo $ID_Opcion;?>">
                        <input class="ocultar" type="text" name="id_seccionMay" id="ID_Seccion" value="<?php echo $ID_Seccion;?>"/>
                        <input class="ocultar" type="text" name="id_sp" value="<?php echo $ID_SP;?>"/>
                        <!-- <input class="ocultar" type="text" name="id_imagenMay" value="<?php //echo $ID_ImagenPrincipal;?>"/> -->
                        <!-- <input class="ocultar" type="text" name="id_mayoristaMay" value="<?php //echo $ID_Mayorista;?>"/> -->
                        <!-- <input class="ocultar" type="text" name="id_tienda" value="<?php echo $ID_Tienda?>"/> -->
                        <input class="boton boton--largo" type="submit" value="Guardar cambios"/>
                    </div> 
                </article>
            </fieldset>   
                            
            <!-- <a id="Ancla_02" class="ancla_1"></a>
            <fieldset class="fieldset_1 fieldset_3">
                <legend class="legend_1">Actualizar reposición</legend> -->
                    
                    <!-- % REPOSICION -->
                    <!-- <label>% de incremento por reposición</label>
                    <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="incremento" id="Incremento" value="<?php echo $Incremento;?>">
                    <small class="small_1">Este % sera uzado para estimar cuanto costará el producto para la proxima fecha de reposición, de esta manera se garantiza el suministro de mercancia.</small>
                    <br> -->
                    
                    <!-- FECHA DOTACION -->
                    <!-- <label>Fecha dotación</label>
                    <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="fecha_dotacion" id="Fecha_Dotacion" value="<?php echo $Fecha_Dotacion;?>" onchange="sumaFecha(7, this.value)"/>
                    <br>   -->
                    
                    <!-- FECHA REPOSICION -->
                    <!-- <label>Fecha proxima reposición (sugerencia 7 dias)</label>
                    <input class="placeholder placeholder_2 placeholder_4 borde_1" type="text" name="fecha_reposicion" id="Fecha_Reposicion" value="<?php echo $Fecha_Reposicion;?>">
                    <small class="small_1">La fecha de reposición se recomienda sea de siete dias despues de la fecha de suministro, la tasa de incremento de inflación es alta y se ha observado cambios en 17% mensual en algunos productos de uso cotidiano.</small>
            </fieldset>    -->
        </form>
    </div>
    
    <!-- div alimentado desde Secciones_Ajax_V.php con la seccion que el usuario cargó en su cuenta  -->       
    <div id="Contenedor_80"></div> 

    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar_prodMay.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_editar_prodMay.js?v=' . rand();?>"></script> 

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
    </script>

    <?php include(RUTA_APP . "/vistas/footer/footer.php");
// }
// else{
//     redireccionar("/Login_C/");
// }  
 ?>
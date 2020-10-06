<?php  include(RUTA_APP . "/vistas/inc/headerProductoModal.php"); 
    
    //$Datos proviene de Opciones_C/productoAmpliado
    $TipoInmueble = $Datos;
            // echo "<br><br><br><br><br>";
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();

            $Producto = $Datos['Producto'];
            $Opcion = $Datos['Opcion'];
            $Precio = $Datos['Precio'];
            $Fotografia_1 = $Datos['Fotografia_1'];
?>
    <section style="min-height: 100%;">
        <div class="contenedor_122"> 
            <div class="contenedor_123">
                <div class="contenedor_124"> 
                    <nav>
                        <ul class="ul_3">
                            <li class="">
                                <img class="imagen_9 imagen_10 borde_1 borde_2" id="Img_1" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Fotografia_1;?>">
                            </li>
                            <li class="">
                                <img class="imagen_9 borde_1 borde_2" id="Img_2" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Fotografia_1;?>">
                            </li>
                            <li class="">
                                <img class="imagen_9 borde_1 borde_2" id="Img_3" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Fotografia_1;?>">
                            </li>
                            <li class="">
                                <img class="imagen_9 borde_1 borde_2" id="Img_4" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Fotografia_1;?>">
                            </li>
                            <li class="">
                                <img class="imagen_9 borde_1 borde_2" id="Img_5" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Fotografia_1;?>">
                            </li> 
                        </ul> 
                    </nav>
                </div>
                <div class="contenedor_125">
                    <ul class="ul_3">      
                        <li> 
                            <img class="imagen_11 borde_1 borde_2" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Fotografia_1;?>" id="ImagenMiniatura_1" onclick="ImagenMiniatura_A()">
                            </label>
                        </li> 
                        <li>
                            <img class="imagen_11 borde_1 borde_2" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Fotografia_1;?>" id="ImagenMiniatura_2"  onclick="ImagenMiniatura_B()">
                            </label>
                        </li> 
                        <li>
                            <img class="imagen_11 borde_1 borde_2" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Fotografia_1;?>" id="ImagenMiniatura_3" onclick="ImagenMiniatura_C()">
                            </label>
                        </li> 
                        <li>
                            <img class="imagen_11 borde_1 borde_2" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Fotografia_1;?>" id="ImagenMiniatura_4" onclick="ImagenMiniatura_D()">
                            </label>
                        </li> 
                        <li>
                            <img class="imagen_11 borde_1 borde_2" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Fotografia_1;?>"id="ImagenMiniatura_5" onclick="ImagenMiniatura_E()">
                            </label>
                        </li> 
                    </ul>
                </div>
            </div>

            <div class="contenedor_126">
                <div class="contenedor_127">
                    <h1 class="h1_11"><?php echo $Producto, PHP_EOL, $Opcion?></h1>
                    <textarea>Especificacion_1 | Especificacion_2 |  Especificacion_3 | Especificacion_4 | Especificacion_5 |</textarea>
                    <br>
                    <textarea>Aqui texto general, información adicional, las especificaciones entre barras deen tener un máximo de 70 caracteres</textarea>
                    <br>
                    <label class="label_22"><?php echo $Precio?> Bs</label>
                </div>  
                <div class=" contenedor_29a">
                    <div class="contenedor_26" id="Contenedor_26">
                        <label class="boton boton_1">Agregar</label>
                        <label class="boton boton_1" onclick="cerrarVentana()">Regresar a mostrador</label>
                    </div>
                </div>           
            </div>
        </div>
    </section>
    
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Vitrina.js';?>"></script>

<?php include(RUTA_APP . "/vistas/inc/footer.php");   ?>
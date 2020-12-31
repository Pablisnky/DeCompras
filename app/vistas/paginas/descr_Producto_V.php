<!-- Archivo cargado mediante Opciones_C/productoAmpliado -->
<?php    
    // $Datos proviene de Opciones_C/productoAmpliado
    // echo "<br><br><br><br><br><br><br>";
    // echo "<pre>";
    // print_r($Datos);
    // echo "</pre>";
    // exit();

    $Producto = $Datos['Producto'];
    $Opcion = $Datos['Opcion'];
    $Precio = $Datos['Precio'];
    $Fotografia_1 = $Datos['Fotografia_1'];
    $ID_Producto = $Datos['ID_Producto'];
    $ID_LabelAgregar = $Datos['ID_EtiquetaAgregar'];
?>
    <!-- Se carga el preloader -->
    <div class='preloderTapa'>
        <div class='preloder preloaderCentrar'></div>
    </div>

    <section >
        <div class="contenedor_122"> 
            <div class="contGridUna">
                <!-- IMAGEN PRINCIPAL -->
                <div class="contenedor_124" id="Contenedor_124"> 
                    <img class="imagen_9 imagen_10" id="ImagenTemporal" alt="Imagen no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Datos['Fotografia_1'];?>">                              
                    <ul class="ul_3" id="Ul_1">     <?php   
                        $Contador = 1;  
                        //$Datos proviene de Opciones_C/productoAmpliado             
                        foreach($Datos['Imagenes'] as $key) :   ?>
                            <li class="li_4" >
                                <img class="imagen_9 imagen_10" id="Imagen_<?php echo $Contador ?>" alt="Foto no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $key['nombre_img'] ;?>">
                            </li>
                            <?php
                            $Contador ++;
                        endforeach; ?>
                    </ul>  
                </div>
                <!-- IMAGENES SECUNDARIAS (MINIATURAS) -->
                <div class="contenedor_125">   
                    <?php                
                    if($Datos['Imagenes'] != Array()){      
                        $Contador = 1;   
                        //$Datos proviene de Opciones_C/productoAmpliado                  
                        foreach($Datos['Imagenes'] as $key) :   ?>
                            <img class="imagen_11 borde_1 borde_2" id="Imagen_<?php echo $Contador ?>" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $key['nombre_img'] ;?>" onclick="verMiniatura('Imagen_<?php echo $Contador ?>')">
                            <?php
                            // echo  $Contador;
                            $Contador ++;
                        endforeach;
                    }
                    ?>  
                </div>
            </div>

            <div class="contGridUna">
                <h1 class="h1_11"><?php echo $Producto, PHP_EOL, $Opcion?></h1>
                <?php
                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";
                // exit();

                if($Datos['Caracteristicas'] != Array ()){  ?>
                    <div class="contenedor_127">
                        <ul>
                            <?php
                            foreach($Datos['Caracteristicas'] as $key) : 
                                if($key['ID_Producto'] == $ID_Producto){ ?>
                                    <li class="li_1"><?php echo $key['caracteristica']?></li>   <?php
                                }
                            endforeach
                            ?>
                        </ul>
                        <br>
                        <!-- <textarea class="textarea_3">Aqui texto general, información adicional, las especificaciones entre barras deen tener un máximo de 70 caracteres</textarea> -->
                        <br>
                    </div>  
                    <?php
                }
                else{   ?>
                    <!-- div Solo para generar espacio -->
                    <div class="contenedor_139"></div> <?php
                }   ?>
                <div>
                    <label class="label_22 borde_1 borde_2"><?php echo $Precio?> Bs</label>
                    <div class="contGridUna__div" id="Contenedor_26"> 
                        <label class="boton" onclick="cerrarAgregar()">Agregar</label>                    <label class="boton" onclick="cerrarRegresar()">Regresar</label>
                    </div>
                </div>           
            </div>
        </div>
    </section>
    
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_descr_Producto.js';?>"></script>

<?php// include(RUTA_APP . "/vistas/inc/footer.php");   ?>

<script>
    //Aqui tambien se pudo usar una funcion IIEEF intentarlo de sa manera
    window.onload = function (){
        document.querySelector(".preloderTapa").style.display = "none"
    }

    var textarea = document.querySelector('textarea');
    textarea.addEventListener('keydown', autosize);
    
    function autosize(){
        var el = this;
        setTimeout(function(){
            el.style.cssText = 'height:auto; padding:0';
            el.style.cssText = 'height:' + el.scrollHeight + 'px';
        },0);
    }

    function cerrarAgregar(){   
        // activarBotonAgregar()Se encuentra en vitrina_V.php debido a que los manejadores de envto de opciones_V.php dependen de vitrina_V.php por ser una ventna abierta con ajax
        window.opener.activarBotonAgregar('<?php echo $ID_LabelAgregar?>') 
        // window.opener.location.reload();        
        window.close()
    }
    function cerrarRegresar(){     
        window.close()
    }
</script>
<?php    
    // $Datos proviene de Opciones_C/productoAmpliado
    $Producto = $Datos['Producto'];
    $Opcion = $Datos['Opcion'];
    $PrecioBolivar = $Datos['PrecioBolivar'];
    $PrecioDolar = $Datos['PrecioDolar'];
    $ID_Producto = $Datos['ID_Producto'];
    $ID_LabelAgregar = $Datos['ID_EtiquetaAgregar'];
?>
    <!-- Se carga el preloader -->
    <section class="preloder_tapa--total">
        <div class='preloder preloaderCentrar'></div>
    </section>

    <section>
        <div class="contenedor_122"> 
            <div class="contGridUna">
                <!-- IMAGEN PRINCIPAL -->
                <div class="contenedor_124" id="Contenedor_124"> 
                    <img class="imagen_9 imagen_10" id="ImagenTemporal" alt="Imagen no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Datos['Imagenes']['0']['nombre_img'];?>">                              
                    <ul class="ul_3" id="Ul_1">     <?php   
                        $Contador = 1;  
                        //$Datos proviene de Opciones_C/productoAmpliado             
                        foreach($Datos['Imagenes'] as $key) :   ?>
                            <li class="li_4" >
                                <img class="imagen_9 imagen_10" id="Imagen_<?php echo $Contador ?>" alt="Foto no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $key['nombre_img'] ;?>" onclick="verImagenModal('ImagenModal_<?php echo $Contador ?>')"/>
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
                            <img class="imagen_11 borde_1 borde_2" id="Imagen_<?php echo $Contador ?>" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $key['nombre_img'] ;?>" onclick="verMiniatura('Imagen_<?php echo $Contador ?>')"/>
                            <?php
                            // echo  $Contador;
                            $Contador ++;
                        endforeach;
                    }
                    ?>  
                </div>
            </div>

            <div class="contGridUna">
                <h1 class="h1_1"><?php echo $Producto?></h1>
                <h1 class="h1_11"><?php echo $Opcion?></h1>
                <?php
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
                    </div>  
                    <?php
                }
                else{   ?>
                    <!-- div Solo para generar espacio -->
                    <div class="contenedor_139"></div> <?php
                }   ?>
                <div class="contGeneral">
                    <label class="label_22 borde_1 borde_2"><?php echo $PrecioBolivar?> Bs<br><small class="small_2"> <?php echo $PrecioDolar?> $ USD </small> </label>
                    <!-- <label class="label_22 borde_1 borde_2">$ USD</label> -->
                    <div class="contBoton contBoton--100" id="Contenedor_26">                  
                        <label class="boton" onclick="cerrarRegresar()">Regresar</label>
                        <label class="boton" onclick="cerrarAgregar()">Agregar</label>   
                    </div>
                </div>           
            </div>
        </div>
    </section>

    <!-- IMAGEN AMPLIADA -->
    <section class="ocultar" >
        <div class="contenedor_122"> 
            <div class="contenedor_123">
                <div class="contenedor_124" id="Contenedor_124"> 
                    <!-- $Datos proviene de Opciones_C/imagenAmpliado -->
                    <img class="imagen_9 imagen_10" id="ImagenTemporal" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $key['nombre_img'] ;?>"> 
                </div>
            </div>
        </div>
    </section>
    
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_descr_Producto.js';?>"></script>

<script>
    //Aqui tambien se pudo usar una funcion IIEEF
    window.onload = function (){
        if(document.readyState == "complete"){
            document.querySelector(".preloder_tapa--total").style.display = "none"
        }
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
<?php    
    // $Datos proviene de Opciones_C/productoAmpliado
    $Producto = $Datos['Producto'];
    $Opcion = $Datos['Opcion'];
    $PrecioBolivar = $Datos['PrecioBolivar'];
    $PrecioDolar = $Datos['PrecioDolar'];
    $ID_Producto = $Datos['ID_Producto'];
    $ID_LabelAgregar = $Datos['ID_EtiquetaAgregar'];
    $Existencia = $Datos['Existencia']; 
    $Disponible = $Datos['Disponible']; 
    
?>
    <!-- SE CARGA EL PRELOADER -->
    <section class="preloder_tapa--total">
        <div class='preloder preloaderCentrar'></div>
    </section>

    <section>
        <div class="contenedor_122"> 
            <div class="contGridUna">

                <!-- IMAGEN PRINCIPAL -->
                <div class="contenedor_124" id="Contenedor_124"> 
                    <img class="imagen_9 imagen_10" id="ImagenTemporal" alt="Imagen no disponible" src="<?php echo RUTA_URL?>/images/proveedor/Don_Rigo/productos/<?php echo $Datos['Fotografia_1'];?>?>">                         
                </div>
            </div>

            <div class="contGridUna">
                <h1 class="h1_1 h1_1--margin"><?php echo $Producto?></h1>
                <div class="contenedor_171">
                    <?php require(RUTA_APP . "/vistas/complementos/existencia.php");    ?>
                </div>
                
                <h3 class="h1_11"><?php echo $Opcion?></h3>

                <div class="contGeneral">
                    <label class="label_22 borde_1 borde_2">Bs. <?php echo $PrecioBolivar?><br><small class="small_2">$ <?php echo $PrecioDolar?></small></label>
                    <div class="contBoton contBoton--100" id="Contenedor_26">                  
                        <label class="boton" onclick="cerrarRegresar()">Regresar</label>
                        <?php
                        // if(){   ?>
                            <!-- <label class="boton" onclick="cerrarAgregar()">Agregar</label>    -->
                            <?php
                        // }
                        ?>

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
        if(AlContenedor === "undefined"){
            console.log("AlContenedor", AlContenedor)
        }
        else{
            console.log("AlContenedor no definido aún")
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
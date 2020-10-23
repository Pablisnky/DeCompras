<?php
    include(RUTA_APP . "/vistas/inc/headerProducto.php"); 
    
    //$Datos proviene de Opciones_C/imagenAmpliado
?>
    <section >
        <div class="contenedor_122"> 
            <div class="contenedor_123">
                <div class="contenedor_124" id="Contenedor_124"> 
                    <img class="imagen_9 imagen_10" id="ImagenTemporal" alt="Fotografia no disponible" src="<?php echo RUTA_URL?>/images/productos/<?php echo $Datos;?>"> 
                </div>
            </div>
        </div>
    </section>
    
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_descr_Producto.js';?>"></script>

<?php// include(RUTA_APP . "/vistas/inc/footer.php");   ?>



<script>
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
        // activarBotonAgregar()Se enecuentra en vitrina.js debido a que los manejadores de envto de opciones_V.php dependen de vitrina_V.php por ser una ventna abierta con ajax
        window.opener.activarBotonAgregar('<?php echo $ID_LabelAgregar?>') 
        // window.opener.location.reload();        
        window.close()
    }
    function cerrarRegresar(){     
        window.close()
    }
</script>


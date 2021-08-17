<!-- Se muestra en inicio_V.php en el div id = "Buscar_Pedido" via Ajax solicitado por A_Inicio.js en Llamar_buscador() -->
<?php 
    if(!empty($Datos)){
        foreach($Datos as $arr):
            $ID_Tienda = $arr["ID_Tienda"];
            $Seccion = $arr["seccion"];
            $Producto = $arr["producto"];
            $Opcion = $arr["opcion"];
            $Tienda = $arr["nombre_Tien"];
            $Imagen = $arr["nombre_img"];   ?>
            
            <div class="contMuestraBuscador borde_1" id="<?php echo $ID_Tienda;?>" onclick="OpcionSeleccionada('<?php echo $ID_Tienda;?>','<?php echo $Tienda;?>','<?php echo $Seccion?>','<?php echo $Opcion?>','NoNecesario_1')">
                <figure>
                    <img class="imagen_7" alt="Fotografia del producto" src="<?php echo RUTA_URL . '/public/images/productos/' . $Imagen?>"/>
                </figure>
                <textarea class="contMuestraBuscador__textarea" id="ContenedorBuscar" onchange="resize(ContenedorBuscar)" readonly><?php echo $Producto?></textarea>
                <hr class="hr_5"/>
                <label class="contMuestraBuscador__label"><?php echo $Tienda;?></label>
            </div>  <?php        
        endforeach;
    }
    else{   ?>
        <div class="contMuestraBuscador borde_1">
        <?php echo "No se encontró lo solicitado";?>
        </div>  <?php
    }
?>
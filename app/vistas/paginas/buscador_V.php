<!-- Se muestra en inicio_V.php via Ajax solicitado por A_Inicio.js en Llamar_buscador() -->
<?php 
// $Datos proviene de bscador_C/index
    if(!empty($Datos)){
        foreach($Datos as $arr):
            $ID_Tienda = $arr["ID_Tienda"];
            $Seccion = $arr["seccion"];
            $Producto = $arr["producto"];
            $Opcion = $arr["opcion"];
            $Tienda = $arr["nombre_Tien"];          ?>
            
            <div class="contenedor_59 borde_1" id="<?php echo $ID_Tienda;?>" onclick="OpcionSeleccionada('<?php echo $ID_Tienda;?>','<?php echo $Tienda;?>','<?php echo $Seccion?>','<?php echo $Opcion?>')">
                <label class="label_9"><?php echo $Producto;?></label>
                <label class="label_9"><?php echo $Opcion;?></label>
                <hr class="hr_3"/>
                <h3 class="h3_9 h3_10">Lo consigues en:</h3>
                <label class="label_9 label_10"><?php echo $Tienda;?></label>
            </div>
            <?php        
        endforeach;
    }
    else{   ?>
        <div class="contenedor_59 borde_1">
        <?php echo "No se encontró lo solicitado";?>
        </div>  <?php
    }
?>
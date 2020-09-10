<!-- Se muestra en inicio_V.php -->
<?php 
    foreach($Datos as $arr):
        // $ID_Tienda = $arr["ID_Tienda"];
        $Producto = $arr["producto"];
        $Opcion = $arr["opcion"];
        $Tienda = $arr["nombre_Tien"];  ?>
        
        <div class="contenedor_59 borde_1" id="<?php echo $ID_Tienda;?>" onclick="vitrina('<?php echo $ID_Tienda;?>', 'buscador_V')">
            <label class="label_9"><?php echo $Producto;?></label>
            <label class="label_9"><?php echo $Opcion;?></label>
            <hr class="hr_3"/>
            <label class="label_9 label_10"><?php echo $Tienda;?></label>
        </div>
        <?php        
    endforeach
?>
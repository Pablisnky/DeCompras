<!-- Se muestra en inicio_V.php -->
<section>
    <?php 
        foreach($Datos as $arr) :
            $Producto = $arr["opcion"]; ?>

            <label><?php echo $Producto;?></label>
                <?php        
        endforeach
    ?>
</section>  
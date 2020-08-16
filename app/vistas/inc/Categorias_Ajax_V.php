<!-- Alimenta el select de Descripcion en publicacion_V.php -->
<section class="section_3">     
        <?php
        foreach($Datos as $row){
            $Categoria =  $row['categoria'];
            ?>
            <label class="label_4"><?php echo $Categoria;?></label>
            <?php
        }
    ?>
</section>
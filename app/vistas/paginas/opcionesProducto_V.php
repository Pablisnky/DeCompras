<section class="section_1">
    <div class='contenedor_10'>
        <?php
            if(!empty($Datos)){
                foreach($Datos as $row){
                    $Talla = $row[0];
                    ?> 
                    <div class='contenedor_11'>
                        <div class="contenedor_12">
                            <h1><?php echo $Talla?></h1>
                        </div>
                        <?php
                }
            }
            else{
                echo "No hay productos";
            }   
        ?>
    </div>
</section>

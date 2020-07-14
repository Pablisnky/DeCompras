<section class="section_1">
    <div class='contenedor_10'>
        <?php
            foreach($Datos as $row){
                $Nombre = $row[1];
                $Precio = $row[2];
                $UnidadVenta = $row[3]; 
                ?> 
                <div class='contenedor_11'>
                    <div class="contenedor_12">
                            <h1>imagen</h1>
                    </div>
                    <div style="">
                        <label class="label_1"><?php echo $Nombre;?></label>
                    </div>
                    <div style="text-align:right;">
                        <label class="label_1"><?php echo $Precio;?> $</label>                           
                    </div>
                    <?php 
                    if(!empty($UnidadVenta)){ ?>
                        <div>
                            <label class="label_1">Por <?php echo $UnidadVenta;?> </label>                           
                        </div>  <?php 
                    }   ?>
                </div>
                <?php
            }   
        ?>
    </div>
</section>


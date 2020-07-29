<!-- Archivo insertado via Ajax desde funcionesAjax.js por la función Llamar_ComidaRapida() en inicio_V.php -->
<section class="/*section_1*/">
    <div class='contenedor_10a'>
        <?php
        $Contador = 1;
        foreach($Datos as $row){
            $ID_Tienda = $row['ID_Tienda'];
            $Nombre = $row['nombre_Tien'];
            $Direccion = $row['direccion_Tien'];
            $Telefono = $row['telefono_Tien'];
            $Horario = $row['horario_Tien'];                
            ?> 
            <section>
                <div class="contenedor_15" id="<?php echo $ID_Tienda;?>" onclick="vitrina('<?php echo $ID_Tienda;?>')">
                    <button>
                        <article>
                            <div class='contenedor_11'>
                                <div class="contenedor_12">
                                    <figure>
                                        <img class="image_1" src="" alt="Imagen"/>
                                    </figure>
                                </div>
                                <div>
                                    <label class="label_1"><?php echo $Nombre?></label>
                                </div>
                                <div style="text-align:right;">
                                    <label class="label_2"><?php echo $Direccion?></label>
                                    <label class="label_2"><?php echo $Telefono?></label>
                                    <label class="label_2"><?php echo $Horario?></label>
                                </div>                   
                            </div>
                        </article>
                    </button>
                </div>
            </section>
            <?php
            $Contador++;
        }
        ?>
    </div>
</section>
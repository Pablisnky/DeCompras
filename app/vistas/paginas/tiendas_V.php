<?php include(RUTA_APP . '/vistas/inc/header.php');  ?>

<section>
    <h1 class="h1_3">Tiendas de comida rapida</h1>
    <div class='contenedor_10'>
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
                    <div class="contenedor_25">
                        <figure>
                            <img class="image_1" src="" alt="Imagen"/>
                        </figure>
                    </div>
                    <div>
                        <p class="p_2 p_3"><?php echo $Nombre?></p>
                        <p class="p_2"><?php echo $Direccion?></p>
                        <p class="p_2">San Felipe - Yaracuy</p>
                        <p class="p_2"><?php echo $Telefono?></p>
                        <p class="p_2"><?php echo $Horario?></p>
                    </div> 
                </div>
            </section>
            <?php
            $Contador++;
        }
        ?>
    </div>
</section>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>
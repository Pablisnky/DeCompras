<?php include(RUTA_APP . '/vistas/inc/header.php');  ?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/telefono/style_telefono.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>

<section class="section_5">
    <div class='contenedor_10'>
        <h1 class="h1_1 p_9">Tiendas de comida</h1>
        <?php
        $Contador = 1;
        foreach($Datos as $row){
            $ID_Tienda = $row['ID_Tienda'];
            $Nombre = $row['nombre_Tien'];
            $Direccion = $row['direccion_Tien'];
            $Telefono = $row['telefono_Tien'];
            // $Horario = $row['horario_Tien']; 
            ?> 
            <section style=" margin-top: -5%">
                <div class="contenedor_15 borde_1" id="<?php echo $ID_Tienda;?>" onclick="vitrina('<?php echo $ID_Tienda;?>','<?php echo $Nombre;?>')">
                    <div class="contenedor_9">
                        <figure>
                            <img class="imagen_2" id="blah" alt="Fotografia del producto" src="http://localhost/proyectos/PidoRapido/public/images/tienda.png"/>
                        </figure>
                    </div>
                    <div>
                        <p class="p_2 p_3"><?php echo $Nombre?></p>
                        <p class="p_2"><?php echo $Direccion?></p>
                        <p class="p_2">San Felipe - Yaracuy</p>
                        <p class="p_2"><span class="icon-phone" style="display: inline;"></span> <?php echo $Telefono?></p>
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
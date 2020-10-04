<?php include(RUTA_APP . '/vistas/inc/header.php');  ?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/telefono/style_telefono.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/ubicacion/style_ubicacion.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/iconos/eliminar/style_eliminar.css"/>

<section class="section_11">
    <div class="contenedor_90">
        <h1 class="h1_1 h1_3 h1_4">Tiendas de <?php echo $Datos[0]['categoria']?></h1>
        <div>
            <a href="<?php echo RUTA_URL . '/Inicio_C#Contenedor_88';?>"><span class="icon-cancel-circle span_5"></span></a>
        </div>
    </div>
    <div class='contenedor_10'>
        <?php
        $Contador = 1;
        foreach($Datos as $row){
            $ID_Tienda = $row['ID_Tienda'];
            $Nombre = $row['nombre_Tien'];
            $Direccion = $row['direccion_Tien'];
            $Telefono = $row['telefono_Tien'];
            $Fotografia = $row['fotografia_Tien'];
            ?> 
            <section style=" margin-top: -5%;">
                <div class="contenedor_15 borde_1" id="<?php echo $ID_Tienda;?>" onclick="tiendas('<?php echo $ID_Tienda;?>','<?php echo $Nombre;?>', 'NoNecesario_1', 'NoNecesario_2')"><!--El argumento no necesario es debido a que se comparte el controlador index en Vitrina_C el cual recibe tres parametros --> 
                    <?php                    
                    if($Fotografia == 'tienda.png'){    ?> 
                        <figure>
                            <img class="imagen_7" alt="Fotografia de la tienda" src="http://localhost/proyectos/PidoRapido/public/images/tiendas/<?php echo $Fotografia;?>"/>
                        </figure>
                        <?php
                    } 
                    else{  ?>
                        <div class="contenedor_120" style="background-image: url('http://localhost/proyectos/PidoRapido/public/images/tiendas/<?php echo $Fotografia;?>')">
                        </div>
                    <?php
                    }   ?>
                    <div>
                        <p class="p_3"><?php echo $Nombre?></p>
                        <p class="p_2"><span class="icon-location2 span_17"></span><?php echo $Direccion?></p>
                        <p class="p_2"><span class="icon-phone span_17""></span> <?php echo $Telefono?></p>
                    </div> 
                </div>
            </section>
            <?php
            $Contador++;
        }
        ?>
    </div>
</section> 
    
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Tiendas.js';?>"></script>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>
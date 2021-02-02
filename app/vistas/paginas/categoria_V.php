<?php
    if(!empty($Datos['ciudades'])){ ?>
        <section class="sectionTienda" id="Section_4">
            <div class="sectionTienda_div" id="SectionTiendas">
                <h1 class="h1_1">Yaracuy - Venezuela</h1>
                <?php
                    foreach($Datos['ciudades'] as $arr) : ?>
                        <div class="contInputRadio contInputRadio--margen">     
                            <input class="ciudad_JS" type="radio" name="ciudades" id="<?php echo $arr['parroquia_Tien'];?>" value="<?php echo $arr['parroquia_Tien'];?>" onclick="Llamar_TiendasCiudad(this.id)"/>
                            <label class="contInputRadio__label" for="<?php echo $arr['parroquia_Tien'];?>"><?php echo $arr['parroquia_Tien'];?></label>
                        </div>  <?php
                    endforeach;     ?> 
                <h2 class="h2_14 borde_3">Proximamente nuestra oferta de ciudades será ampliada.</h2>
            </div>
        </section>
    <?php
   }   ?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/comida/style_comida.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/merceria/style_merceria.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/farmacia/style_farmacia.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/ferreteria/style_ferreteria.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/supermercado/style_supermercado.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/artesanos/style_artesanos.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/ropa/style_ropa.css"/>
        
<section id="Section_2js">
    <div id="Contenedor_23"></div>
</section>

<script type="text/javascript" src="<?php echo RUTA_URL.'/public/javascript/E_Categorias.js?v=' . rand();?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL.'/public/javascript/A_Categorias.js?v=' . rand();?>"></script>

<?php require(RUTA_APP . '/vistas/inc/footer.php'); ?>
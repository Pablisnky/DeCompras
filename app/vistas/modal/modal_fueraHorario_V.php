<!-- Archivo forma parte de vitrina_V como un include -->
<!-- Datos proviene de Vitrina_C  -->
<?php $Categoria = $Datos['categoria'][0]['categoria']; ?>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>
<section class="sectionModal" id="Section_1">
    <a href="<?php echo RUTA_URL . '/Tiendas_C/tiendasEnCatalogo/'. $Categoria;?>"><span class="icon-cancel-circle spanCerrar"></span></a>
    <div class="contenedor_24">
        <?php 
        if($Datos['proximoDia'] == 1){  ?>
            <h1 class="h1_1 h1_4 bandaAlerta">Despachos no disponibles a esta hora</h1>
            <br>
            <h1 class="h1_1 h1_4 ">Abrimos mañana a las <?php echo $Datos['horaApertura']?></h1>
            <br>
            <h2 class="h2_6">Igualmente puedes realizar tu compra en este momento,<br> despacharemos tu pedido al abrir la tienda.</h2>
            <?php
        }
        else{   ?>
            <h1 class="h1_1 h1_4 ">Despachos no disponibles a esta hora</h1>
            <br>
            <h1 class="h1_1 h1_4 bandaAlerta">Abrimos a las <?php echo $Datos['horaApertura']?></h1>
            <br>
            <h2 class="h2_6">Igualmente puedes realizar tu compra,<br> despacharemos tu pedido al abrir la tienda.</h2>
            <?php
        }   ?>
            <!-- <br class="br_1"> -->
            <div class="contBoton" id="Contenedor_26">
                <label class="boton boton--centro" id="Label_1" onclick="cerrarModal('sectionModal')">Entrar</label>
            </div>
    </div>               
</section>


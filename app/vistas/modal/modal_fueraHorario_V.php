<!-- Archivo forma parte de vitrina_V como un include -->
<!-- Datos proviene de Vitrina_C  -->
<?php $Categoria = $Datos['categoria'][0]['categoria']; ?>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>
<section class="sectionModal" id="Section_1">
    <a href="<?php echo RUTA_URL . '/Tiendas_C/tiendasEnCatalogo/'. $Categoria;?>"><span class="icon-cancel-circle spanCerrar"></span></a>
    <div class="contenedor_24">
        <?php 
        if($Datos['proximoDia'] == 1){  ?>
            <h1 class="h1_1 h1_4 bandaAlerta">Despachos no disponibles <br class="br_2"> a esta hora</h1>
            <br>
            <p class="sectionModal__div__p">Abrimos mañana a las  <br class="br_2"><?php echo $Datos['horaApertura']?></p>
            <br>
            <p class="sectionModal__div__p">Igualmente puedes realizar tu compra y despacharemos tu pedido al abrir la tienda.</p>
            <?php
        }
        else if($Datos['proximoDia'] == 'NoAplica'){   ?>
            <h1 class="h1_1 h1_4 bandaAlerta">Despachos no disponibles <br class="br_2"> a esta hora</h1>
            <br>
            <p class="sectionModal__div__p">Abrimos el lunes a las <br class="br_2"><?php echo $Datos['horaApertura']?></p>
            <br>
            <p class="sectionModal__div__p">Igualmente puedes realizar tu compra y despacharemos tu pedido al abrir la tienda.</p>
            <?php
        }  
        else{   ?>
            <h1 class="h1_1 h1_4 bandaAlerta">Despachos no disponibles <br class="br_2"> a esta hora</h1>
            <br>
            <p class="sectionModal__div__p">Abrimos a las  <br class="br_2"><?php echo $Datos['horaApertura']?></p>
            <br>
            <p class="sectionModal__div__p">Igualmente puedes realizar tu compra y despacharemos tu pedido al abrir la tienda.</p>
            <?php
        }   ?> 
            <!-- <br class="br_1"> -->
            <div class="contBoton" id="Contenedor_26">
                <label class="boton boton--centro" id="Label_1" onclick="cerrarModal('sectionModal')">Entrar</label>
            </div>
    </div>               
</section>


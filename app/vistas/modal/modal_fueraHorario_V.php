<!-- Archivo forma parte de vitrina_V como un require -->

<!-- Datos proviene de Vitrina_C  -->
<?php $Categoria = $Datos['categoria'][0]['categoria']; ?>
<section class="sectionModal" id="Section_1">
    <a href="<?php echo RUTA_URL . '/Tiendas_C/tiendasEnCatalogo/'. $Categoria;?>"><i class="fas fa-times spanCerrar"></i></a>
    <div class="contenedor_24">
        <?php 
        // echo "<pre>";
        // print_r($Datos);
        // echo "</pre>";
        // exit();

        //APERTURA DIA SIGUIENTE
        if($Datos['ProximoApertura'] == 'AbreDiaSiguiente'){  ?>
            <h1 class="h1_1 h1_4 bandaAlerta">Despachos no disponibles <br class="br_2"> a esta hora</h1>
            <br>
            <p class="sectionModal__div__p">Abrimos mañana a las <br class="br_2"><?php echo $Datos['HoraApertura']?></p>
            <br>
            <p class="sectionModal__div__p">Realiza tu compra y despacharemos tu pedido al abrir la tienda.</p>
            <?php
        }
        //APERTURA EN LUNES
        else if($Datos['ProximoApertura'] == 'NoAplica' || $Datos['ProximoApertura'] == 'AbreLunes'){   ?>
            <h1 class="h1_1 h1_4 bandaAlerta">Despachos no disponibles <br class="br_2"> a esta hora</h1>
            <br>
            <p class="sectionModal__div__p">Abrimos el lunes a las <br class="br_2"><?php echo $Datos['HoraApertura']?></p>
            <br>
            <p class="sectionModal__div__p">Realiza tu compra y despacharemos tu pedido al abrir la tienda.</p>
            <?php
        }  
        //APERTURA EN LA MAÑANA/TARDE 
        else if($Datos['ProximoApertura'] == 'AbreMañana' || $Datos['ProximoApertura'] == 'AbreTarde'){   ?>
            <h1 class="h1_1 h1_4 bandaAlerta">Despachos no disponibles <br class="br_2"> a esta hora</h1>
            <br>
            <p class="sectionModal__div__p">Abrimos a las  <br class="br_2"><?php echo $Datos['HoraApertura']?></p>
            <br>
            <p class="sectionModal__div__p">Realiza tu compra y despacharemos tu pedido al abrir la tienda.</p>
            <?php
        } 
        //APERTURA EN DOMINGO
        else if($Datos['ProximoApertura'] == 'AbreDomingo'){   ?>
            <h1 class="h1_1 h1_4 bandaAlerta">Despachos no disponibles <br class="br_2"> a esta hora</h1>
            <br>
            <p class="sectionModal__div__p">Abrimos el domingo a las <br class="br_2"><?php echo $Datos['HoraApertura']?></p>
            <br>
            <p class="sectionModal__div__p">Realiza tu compra y despacharemos tu pedido al abrir la tienda.</p>
            <?php
        }     ?> 
        <div class="contBoton" id="Contenedor_26">
            <label class="boton boton--centro" id="Label_1">Entrar</label>
        </div>
    </div>               
</section>
<section class="sectionModal">
    <article>
        <article>
            <div class="contenedor_24">
                <header>
                    <h1 class="h1_1">Nuestra ubicación</h1>
                    <!--$Datos proviene de Tiendas_C/horarioTienda-->
                    <h1 class="h2_6"><?php echo $Datos['id_tienda'];?></h1>
                    <br>
                </header>
            </div>
        </article>
        
        <article>
                <div class="contBoton" id="Contenedor_26">
                    <a class="boton boton--largo" href="javascript:history.back()">Cerrar</a>
                </div>
            </article>
    </article>
</section>

<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Horario.js';?>"></script> 
<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/GestionRadio.js';?>"></script> 
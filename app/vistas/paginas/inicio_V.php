<?php include(RUTA_APP . '/vistas/inc/header.php');  ?>
    
    <section class="section_2">
        <div class='contenedor_4'>
            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3"></span>
                        <h2 class='h2_1' id="H2_1" onclick="ocultar('Mostrar_ComidaRapida');Llamar_ComidaRapida()">COMIDA RAPIDA</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4"></span>
                    </div>
                </div>
                <div class="contenedor_5" id="Mostrar_ComidaRapida"></div> 
            </div>

            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3"></span>
                        <h2 class='h2_1' id="H2_2" onclick="ocultar('Mostrar_Supermercado'); Llamar_Supermercado()">SUPERMERCADOS Y ABASTOS</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4"></span>
                    </div>
                </div>
                <div class="contenedor_5" id="Mostrar_Supermercado"></div> 
            </div>

            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3"></span>
                        <h2 class='h2_1' id="H2_3" onclick="ocultar('Mostrar_Bar')">BODEGA Y QUINCALLERÍA</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4"></span>
                    </div>
                </div>
                <div class="contenedor_5" id="Mostrar_BodegaQuincallería"></div> 
            </div>

            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3"></span>
                        <h2 class='h2_1' id="H2_4" onclick="ocultar('Mostrar_Alimentos')">ALIMENTOS</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4"></span>
                    </div>
                </div>  
                <div class="contenedor_5" id="Mostrar_Alimentos"></div> 
            </div>

            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3"></span>
                        <h2 class='h2_1' id="H2_5" onclick="ocultar('Mostrar_Productos')">FARMACIA</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4"></span>
                    </div>
                </div>
                <div class="contenedor_5" id="Mostrar_Farmacia"></div> 
            </div>

            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3"></span>
                        <h2 class='h2_1' id="H2_6" onclick="ocultar('Mostrar_Maquinas')">FERRETRÍA</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4"></span>
                    </div>
                </div>
                <div class="contenedor_5" id="Mostrar_Ferreteia"></div> 
            </div>
        </div>
    </section>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>
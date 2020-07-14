<?php include(RUTA_APP . '/vistas/inc/header.php');  ?>

    <section style='padding-top: 10%;'>
        <div class='contenedor_4'>
            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3" onclick="Llamar_Delivery()"></span>
                        <h2 class='h2_1' onclick="Llamar_Delivery(); ocultarDiv('Mostrar_Delivery')">DELIVERY Y ROTISERIA</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4" onclick="Llamar_Delivery()"></span>
                    </div>
                </div>
                <div id="Mostrar_Delivery"></div> 
            </div>

            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3" onclick="Llamar_Ropa()"></span>
                        <h2 class='h2_1' onclick="Llamar_Ropa(); ocultarDiv('Mostrar_Ropa')">ROPA E INDUMENTARIA</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4" onclick="Llamar_Ropa()"></span>
                    </div>
                </div>
                <div id="Mostrar_Ropa"></div> 
            </div>

            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3" onclick="Llamar_Bar()"></span>
                        <h2 class='h2_1' onclick="Llamar_Bar(); ocultarDiv('Mostrar_Bar')">BAR Y RESTO</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4" onclick="Llamar_Bar()"></span>
                    </div>
                </div>
                <div id="Mostrar_Bar"></div> 
            </div>

            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3" onclick="Llamar_Alimentos()"></span>
                        <h2 class='h2_1' onclick="Llamar_Alimentos(); ocultarDiv('Mostrar_Alimentos')">ALIMENTOS FRESCOS</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4" onclick="Llamar_Alimentos()"></span>
                    </div>
                </div>  
                <div id="Mostrar_Alimentos"></div> 
            </div>

            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3" onclick="Llamar_Productos()"></span>
                        <h2 class='h2_1' onclick="Llamar_Productos(); ocultarDiv('Mostrar_Productos')">PRODUCTOS Y RETAIL</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4" onclick="Llamar_Productos()"></span>
                    </div>
                </div>
                <div id="Mostrar_Productos"></div> 
            </div>

            <div class='contenedor_6'>
                <div class="contenedor_9">
                    <div>
                        <span class="icon-newspaper span_3" onclick="//Llamar_Maquinas()"></span>
                        <h2 class='h2_1' onclick="//Llamar_Maquinas()">MAQUINAS POR TIEMPO</h2>
                    </div>
                    <div>
                        <span class="icon-arrow-down2 span_4" onclick="//Llamar_Maquinas()"></span>
                    </div>
                </div>
                <div id="Mostrar_Maquinas"></div> 
            </div>
        </div>
    </section>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>
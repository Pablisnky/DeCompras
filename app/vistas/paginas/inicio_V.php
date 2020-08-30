<?php include(RUTA_APP . '/vistas/inc/header_inicio.php');  ?>

    <section class="section_1" id="Section_1">
        <div class="contenedor_37"  id="Contenedor_37">
            <h1 class="h1_2">PedidoRemoto</h1>
            <!-- <h2 class="h2_4">solicitudes desde casa</h2> -->
            <h2 class="h2_4">Tú tienda en todas las ciudades</h2>
        </div>
        <div class="contenedor_51" id="Contenedor_51">
            <div>
                <span class="icon-cart span_6"></span>
            </div>
            <div>
                <span class="icon-truck span_6"></span>
            </div>
            <div>
                <span class="icon-home2 span_6"></span>
            </div>
        </div>
        <div class="contenedor_88" id="Contenedor_88">
            <label class="a_2" id="Tiendas" onclick="transicionTiendas()">Tiendas</label>
        </div>
    </section>
    
    <section id="Section_2js">
        <div class='contenedor_4'>
            <div class='contenedor_6 borde_1' id="Contenedor_6a">
                <h2 class='h2_1'>COMIDA</h2>
                <span class="icon-spoon-knife span_8"></span>
            </div> 

            <div class='contenedor_6 borde_1' id="Contenedor_6b">
                <h2 class='h2_1'>BODEGAS Y SUPERMERCADOS</h2>
                <span class="icon-barcode span_8"></span>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6b">
                <h2 class='h2_1'>ROPA Y ZAPATO</h2>
                <span class="icon-man-woman span_8"></span>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6c">
                <h2 class='h2_1'>ARTESANOS Y EMPRENDEDORES</h2>
                <span class="icon-pen span_8"></span>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6e">
                <h2 class='h2_1'>FARMACIA Y SALUD</h2>
                <span class="icon-aid-kit span_8"></span>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6f">
                <h2 class='h2_1'>FERRETRÍA Y HOGAR</h2>
                <span class="icon-hammer span_8"></span>
            </div>
        </div>
    </section>
    
    <section>
        <div class="contenedor_54" id="Busqueda">
            <div class="contenedor_53">
                <span class="span_5" id="Span_5">X</span>
                <p class="p_7">Seleccione una ciudad y especifique su pedido</p>
                <div class="contenedor_55">
                    <div class="contenedor_56">
                        <label class="label_6">Estado</label>
                        <select class="select_1">
                            <option>Yaracuy</option>
                        </select>
                    </div>
                    <div class="contenedor_56 contenedor_56a">
                        <label class="label_6">Ciudad</label>
                        <select class="select_1">
                            <option>San Felipe</option>
                        </select>
                    </div>
                </div>
                <div class="contenedor_57">
                    <input class="input_9" id="Input_9" type="text" placeholder="Pedido"/>
                </div>
            </div>
            <!--Carga mediante Ajax las tiendas disponibles para la busqueda solicitada desde buscador_V.php -->
            <div class="contenedor_58" id="Buscar_Pedido"></div>
        </div>
    </section>


<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Inicio.js';?>"></script> 
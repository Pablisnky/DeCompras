<?php include(RUTA_APP . '/vistas/inc/header_inicio.php');  ?>

    <section class="section_1">
        <div class="contenedor_37">
            <h1 class="h1_2">PedidoRemoto</h1>
            <h2 class="h2_4">Compras desde tu casa, despachos hasta tu casa</h2>
        </div>
        <div class="contenedor_51">
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
        <h3><a class="a_2" href="#up">Categorías</a></h3>
    </section>
    <section class="section_2">
        <div class='contenedor_4'>
            <div class='contenedor_6' onclick="VerTiendas('Comida_Rapida')">
                <h2 class='h2_1' id="H2_1">COMIDA RAPIDA</h2>
            </div> 

            <div class='contenedor_6'>
                <h2 class='h2_1' id="H2_2" onclick="VerTiendas('Supermercado')">BODEGAS Y SUPERMERCADOS</h2>
            </div>

            <div class='contenedor_6'>
                <h2 class='h2_1' id="H2_3" onclick="VerTiendas('Bar')">ARTESANOS Y EMPRENDEDORES</h2>
            </div>

            <div class='contenedor_6'>
                <h2 class='h2_1' id="H2_4" onclick="VerTiendas('Alimentos')">ALIMENTOS FRESCOS</h2>
            </div>

            <div class='contenedor_6'>
                <h2 class='h2_1' id="H2_5" onclick="VerTiendas('Productos')">FARMACIA</h2>
            </div>

            <div class='contenedor_6'>
                <h2 class='h2_1' id="H2_6" onclick="VerTiendas('Maquinas')">FERRETRÍA</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="contenedor_54" id="Busqueda">
            <div class="contenedor_53">
                <span class="span_5" id="Span_5" onclick="CerrarModal_X('Busqueda')">X</span>
                <p class="p_7">Seleccione una ciudad y especifique su pedido</p>
                <div class="contenedor_55">
                    <div class="contenedor_56">
                        <label class="label_6">Estado</label>
                        <select class="select_1">
                            <option>Yaracuy</option>
                        </select>
                        <label class="label_6">Ciudad</label>
                        <select class="select_1">
                            <option>San Felipe</option>
                        </select>
                    </div>
                    <div class="contenedor_57">
                        <input class="input_9" type="text" placeholder="Pedido" onkeyup="Llamar_buscador(this.value)"/>
                            <!--Trae por medio de Ajax las ciudades y tiendas disponibles para la busqueda solicitada desde  -->
                            <div id="Buscar_Pedido">
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <section>
    <!--Trae por medio de Ajax las ciudades y tiendas disponibles para la busqueda solicitada desde  -->
        <!-- <div id="Buscar_Pedido">
        <input type="text" id="MarcaParaAjax" value="HOLA" /></div>
    </section> -->

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/scrollUp.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/AjaxBuscador.js';?>"></script>
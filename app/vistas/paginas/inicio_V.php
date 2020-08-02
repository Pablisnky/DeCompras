<?php include(RUTA_APP . '/vistas/inc/header_inicio.php');  ?>

    <section class="section_1">
        <h1 class="h1_2">PedidoRemoto.com</h1>
        <h2 class="h2_4">Compras desde tu casa, despachos hasta tu casa</h2>
        <h3><a class="a_2" href="#up">Categorías</a></h3>
    </section>

    <section class="section_2">
        <div class='contenedor_4'>
            <div class='contenedor_6' onclick="VerTiendas('Comida_Rapida')">
                <h2 class='h2_1' id="H2_1">COMIDA RAPIDA</h2>
            </div> 

            <div class='contenedor_6'>
                <h2 class='h2_1' id="H2_2" onclick="VerTiendas('Supermercado')">SUPERMERCADOS Y ABASTOS</h2>
            </div>

            <div class='contenedor_6'>
                <h2 class='h2_1' id="H2_3" onclick="VerTiendas('Bar')">BODEGA Y QUINCALLERÍA</h2>
            </div>

            <div class='contenedor_6'>
                <h2 class='h2_1' id="H2_4" onclick="VerTiendas('Alimentos')">ALIMENTOS</h2>
            </div>

            <div class='contenedor_6'>
                <h2 class='h2_1' id="H2_5" onclick="VerTiendas('Productos')">FARMACIA</h2>
            </div>

            <div class='contenedor_6'>
                <h2 class='h2_1' id="H2_6" onclick="VerTiendas('Maquinas')">FERRETRÍA</h2>
            </div>
        </div>
    </section>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/scrollUp.js';?>"></script>
<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>
<?php require(RUTA_APP . "/vistas/header/header.php");  ?>

<!-- Cargada desde Modal_C/tiendaSinProductos -->
<section class="sectionModal">
    <div class="contenedor_24 contenedor_24--Width-90">
        <h1 class="h1_1 h1_4 bandaAlerta">TIENDA VACIA.</h1>
        <br>
        <p class="sectionModal__div__p">Por esta razón tu tienda no se muestra al publico.</h2>
        <br><br>
        <a class="label_21 boton boton--largo" href="<?php echo RUTA_URL . '/CuentaComerciante_C/Publicar/';?>">Cargar producto</a>
    </div>
</section>
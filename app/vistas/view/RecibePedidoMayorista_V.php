<section class="section_2">
    <h1 class="h1_1">Orden de compra generada</h1>
    <div class='contenedor_39'>
        <br>
        <h2 class=""><?php echo $Datos['Codigo_despacho'];?></h2>
        <br>
        <p>Este código sera solicitado por el despachador para realizar la entrega.</p>
        <div class="contenedor_33">
            <p class="p_1">Gracias por confiar en nuestro servicio</p>
            <br><br>
            <a class="boton" href="<?php echo RUTA_URL . '/Inicio_C/NoVerificaLink';?>">Inicio</a>
        </div>
    </div>
</section>

<?php include(RUTA_APP . "/vistas/footer/footer.php");?>
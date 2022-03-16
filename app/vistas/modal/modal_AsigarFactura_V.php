<!-- Ventana modal cargada por medio de CuentaVendedor_C/asignarNroFactura -->

<section class="sectionModal"  id="Ejemplo_Secciones">
    <div class="sectionModal__div">
        <form action="<?php echo RUTA_URL; ?>/CuentaVendedor_C/recibeAsignarNroFactura" method="POST" autocomplete="off">
            <fieldset class="fieldset_1 fieldset_3"> 
                <legend class="legend_1">Asignar Nº. factura</legend>

                <!-- FECHA DE ABONO --> 
                <input class="input_13 input_13A borde_1" type="text" name="nro_factura" placeholder="Nro. factura"/>
                <br/>

                <div class="contenedor_87">      
                    <input class="ocultar" type="text" name="nro_orden" value="<?php echo $Datos['nroorden']?>"/> 
                    <input class="label_21 boton" type="submit" value="Asignar">
                </div>
            </fieldset>
        </form>
    </div>
</section>


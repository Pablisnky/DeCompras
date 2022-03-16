<!-- Ventana modal cargada por medio de CuentaVendedor_C/agregarpagoVen -->

<section class="sectionModal"  id="Ejemplo_Secciones">
    <div class="sectionModal__div">
        <form action="<?php echo RUTA_URL; ?>/CuentaVendedor_C/recibeAgregarPagoVen" method="POST" autocomplete="off">
            <fieldset class="fieldset_1 fieldset_3"> 
                <legend class="legend_1">Cargar abono</legend>

                <!-- FECHA DE ABONO --> 
                <input class="input_13 input_13A borde_1" type="text" name="fechaAbono" placeholder="fecha"/>
                <br/>

                <!-- MONTO ABONADO --> 
                <input class="input_13 input_13A borde_1" type="text" name="montoAbono" placeholder="Monto abonado"/>
                <br/>

                <!-- METODO DE PAGO -->
                <select class="select_2 borde_1" name="metodoAbono">
                    <option>Metodo pago</option>
                    <option>Transferencia</option>
                    <option>Pago movil</option>
                    <option>Efectivo ($)</option>
                    <option>Efectivo (Bs)</option>
                </select>
                <div class="contenedor_87">      
                    <input class="ocultar" type="text" name="nro_orden" value="<?php echo $Datos['nroorden']?>"/>
                    <input class="ocultar" type="text" name="montoTotal" value="<?php echo $Datos['montoTotal']?>"/> 
                    <input class="label_21 boton" type="submit" value="Agregar">
                </div>
            </fieldset>
        </form>
    </div>
</section>


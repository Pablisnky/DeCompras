<?php include(RUTA_APP . '/vistas/inc/header.php');  ?>

<section class="section_3 section_4">
    <div class="contenedor_24">
        <h1 class="h1_1">Tu orden</h1>
        <div class="contenedor_20">
            <table class="tabla" id="Tabla">
                <thead>
                    <tr>
                        <th class="th_1 th_4">CANTIDAD</th>
                        <th class="th_2 th_4">PRODUCTO</th>
                        <th class="th_3 th_4">PRECIO UNITARIO</th>
                        <th class="th_5 th_4">TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" class="input_3" id="Input_cantidadCar"/></td>
                        <td><input type="text" class="input_3" id="Input_productoCar"/></td>
                        <td><input type="text" class="input_3" id="Input_precioCar"/></td>
                        <td><input type="text" class="input_3" id="Input_totalCar"/></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="width: 100%;">
            <h2 class="h2_2">Monto en tienda: <input type="text" class="input_6" id="MontoTienda" readonly="readondly"/> Bs.</h2>
            <h2 class="h2_2">Comisión PedidoRemoto: <input type="text" class="input_6" id="Comision" readonly="readondly"/> Bs.</h2>
            <h2 class="h2_2">Servicio a domicilio: <input type="text" class="input_6" value="3.000" readonly="readondly"/> Bs.</h2>
            <hr class="hr_1"/>
            <h2 class="h2_2 h2_3">Monto total: <input type="text" class="input_6 input_7" id="MontoTotal" readonly="readondly"/> Bs.</h2>
        </div>
        <div class="contenedor_26" id="Contenedor_26">
            <label class="boton boton_1" onclick="MuestraEnvioFactura()">Confirmar orden</label>
            <label class="boton boton_1" onclick="ocultarPedido()">Regresar a mostrador</label>
        </div>
    </div>
    <article>
        <div class="contenedor_24 contenedor_27" id="MuestraEnvioFactura">
            <h1 class="h1_1">Datos de despacho y factura</h1>
            <form action="../../RecibePedido_C/recibePedido/" method="POST">
                <div class="contenedor_28">
                    <div class="contenedor_29">
                        <label>Nombre</label>
                        <input class="input_8" type="text" name="nombre" autocomplete="off"/>
                    </div>
                    <div class="contenedor_29">
                        <label>Apellido</label>
                        <input class="input_8" type="text" name="apellido" autocomplete="off"/>
                    </div>
                    <div class="contenedor_29">
                        <label>Cedula / RIF</label>
                        <input class="input_8" type="text" name="cedula" autocomplete="off"/>
                    </div>
                    <div class="contenedor_29">
                        <label>Telefono</label>
                        <input class="input_8" type="text" name="telefono" autocomplete="off"/>
                    </div>
                    <div class="contenedor_29">
                        <label>Dirección</label>
                        <textarea class="textarea_1" name="direccion" autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="contenedor_30">
                    <input class="input_3" type="text" id="Pedido" name="pedido">
                    <input class="boton" type="submit" value="Comprar"/>
                </div>
            </form>
        </div>

        <!-- EN CONSTRUCCION - EN CONSTRUCCION - EN CONSTRUCCION - EN CONSTRUCCION -->
        <!--  <article>
            <div>
               <p>¿Tienes algun despachador en especial con quien quieras recibir tu pedido?</p>
                <label>Si</label>
                <div>
                    <p>Danos su código o su nombre</p>
                    <p>Listo, lo ubicaremos y te confirmamos si esta disponible</p>
                </div> 
            </div>            
        </article>-->
        <!-- EN CONSTRUCCION - EN CONSTRUCCION - EN CONSTRUCCION - EN CONSTRUCCION -->
    </article>
</section>
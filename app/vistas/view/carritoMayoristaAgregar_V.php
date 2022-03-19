<!-- Archivo cargado via AJAX en el div id="Mostrar_OrdenMayorista" del archivo vitrinaMayorista_V.php -->

<!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización del capture--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<section class="sectionModal">
    <i class="fas fa-arrow-left spanCerrar spanCerrar--fijo" onclick="ocultar('Mostrar_OrdenMayorista')"></i>
    <section> <!-- ORDEN DE COMPRA -->
        <div class="contenedor_24">
            <header>
                <h1 class="h1_1">Orden de compra</h1>
            </header>

            <article>
                <div class="contPedido borde_bottom">
                    <table class="tabla" id="Tabla">
                        <thead>
                            <tr>
                                <th class="th_1 th_4">CANT.</th>
                                <th class="th_2 th_4">PRODUCTO</th>
                                <th class="th_3 th_4">PRECIO UNITARIO</th>
                                <th class="th_1 th_4">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <!--tabla es rellenada desde E_VitrinaMayorista.js por medio de PedidoEnCarrito()-->
                                <td><input type="text" class="ocultar" id="Input_cantidadCar"/></td>
                                <td><input type="text" class="ocultar" id="Input_productoCar"/></td>
                                <td><input type="text" class="ocultar" id="Input_precioCar"/></td>
                                <td><input type="text" class="ocultar" id="Input_totalCar"/></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>

                <div class="contGeneral">  
                    <div class="contInputRadio">     
                        <!-- <input type="radio" name="entrega" id="Domicilio_No" value="Domicilio_No"  form="DatosUsuario"/> -->
                        <!-- <label class="contInputRadio__label" for="Domicilio_No">Recoger pedido en tienda: 0,00 Bs.</label> -->
                    </div>                    
                    <div class="contInputRadio">
                        <!-- <input type="radio" name="entrega" id="Domicilio_Si" value="Domicilio_Si" form="DatosUsuario" checked/> -->
                        <!-- <label class="contInputRadio__label" for="Domicilio_Si">Entrega a domicilio: <?php echo number_format($Datos['Delivery'], 2, ",", ".");?> Bs.</label> -->
                        <input class="ocultar" type="text" id="PrecioEnvio" value="<?php echo $Datos['Delivery'];?>"/>
                    </div>     
                    
                    <!--DIV ALIMENTADO DESDE E_Vitrina.js PedidoEnCarrito() -->
                    <div>
                        <h2 class="h2_2">Monto del pedido: <input type="text" form="DatosUsuario" name="montoTienda" class="input_6" id="MontoTienda" readonly="readondly"/> Bs.</h2>

                        <h2 class="h2_2 ocultar">Comisión PedidoRemoto: <input type="text" class="input_6" id="Comision" readonly="readondly"/> Bs.</h2>

                        <!-- <h2 class='oculta'>Monto de envio:<input type='text' form="DatosUsuario" name="despacho" id="Despacho_2" class='input_6' value='<?php echo number_format($Datos['Delivery'], 2, ",", ".");?>' readonly="readondly"/> Bs.</h2> -->

                        <h2 class="h2_2 h2_3 ocultar">Monto del pedido: <input type="text" form="DatosUsuario" name="montoTotal" class="input_6 input_7" id="MontoTotal" readonly="readondly"/> Bs.</h2>
                        <h2 class="h2_2 h2_3"><input type="text" form="DatosUsuario" name="" class="input_6 input_7" id="MontoTotalDolares" readonly="readondly"/> $</h2>

                        <small class="small_1 small_1A">Cambio oficial a tasa del BCV <strong class="strong_1">( 1 $ = <?php echo number_format($Datos['DolarHoy'], 4, ",", ".");?> Bs.)</strong></small>
                    </div>
                </div>

            <!-- BOTON AÑADIR A PEDIDO-->  
             <form action="../../RecibeAgregarPedidoMayorista_C" method="POST" id="DatosUsuario"> <!-- onsubmit="return validarDespacho()" -->
                <div class="contFlex50">
                    <input class="ocultar" type="text" id="Pedido" name="pedido"/>
                    <input class="ocultar" type="text" name="id_minorista" value="0"/>
                    <input class="ocultar" type="text" name="codigoMinorista" value="N/A"/>
                    <input class="boton botonJS" type="submit" form="DatosUsuario" value="Agregar"/>
                </div>
            </form>
        </div>
    </section>
</section>
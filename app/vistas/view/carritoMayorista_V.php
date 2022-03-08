<!-- Archivo cargado via AJAX en el div id="Mostrar_Orden" del archivo vitrinaMayorista_V.php -->

<!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización del capture--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<section class="sectionModal">
    <i class="fas fa-arrow-left spanCerrar spanCerrar--fijo" onclick="ocultarPedido()"></i>
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
                                <th class="th_5 th_4">TOTAL</th>
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

            <!-- CODIGODE DESPACHO -->  
            <input class="input--despacho" id="CodigoDespacho" placeholder="Código de despacho" onkeydown="codigoDespacho(this.value)" onkeyup="codigoDespacho(this.value)"/>
        </div>
    </section>

    <section>         
        <div class="contOculto" id="Muestra_datosMinorista">
             <form action="../../RecibePedidoMayorista_C" method="POST" enctype="multipart/form-data"  id="DatosUsuario"> <!-- onsubmit="return validarDespacho()" -->
                
                <!-- DATOS DEL MINORISTA -->
                <article>
                    <div class="contenedor_24">
                        <header>
                            <h1 class="h1_1">Datos del cliente</h1>
                        </header>

                        <div class="contFlex" style="position: relative;">
                            <!-- NOMBRE MINORISTA-->
                            <div class="contenedor_29 contenedor_29--label">
                                <label>Nombre</label>
                                <input class="input_13 borde_1" type="text" id="NombreMinorista"/>
                            </div>

                            <!-- RIF MINORISTA -->
                            <div class="contenedor_29 contenedor_29--label">
                                <label>RIF</label>
                                <input class="input_13 borde_1" type="text" id="RifMinorista"/>
                            </div>

                            <!-- CODIGO MINORISTA -->
                            <div class="contenedor_29 contenedor_29--label">
                                <label>Código de despacho</label>
                                <input class="input_13 borde_1" type="text" id="CodigoMinorista" name="codigoMinorista"/>
                            </div>

                            <!-- TELEFONO MINORISTA -->
                            <div class="contenedor_29 contenedor_29--label">
                                <label>Telefono</label>
                                <input class="input_13 borde_1" type="text" id="TelefonoMinorista"/>
                            </div>

                            <!-- CORREO MINORISTA -->
                            <div class="contenedor_29 contenedor_29--label">
                                <label>Correo</label>
                                <input class="input_13 borde_1" type="correo" id="CorreoMinorista"/>
                            </div>

                            <!-- ZONA MINORISTA -->
                            <div class="contenedor_29 contenedor_29--label">
                                <label>Zona</label>
                                <input class="input_13 borde_1" type="correo" id="ZonaMinorista"/>
                            </div>

                            <!-- DIRECCION -->
                            <div class="contenedor_72">
                                <label>Dirección</label>
                                <textarea class="textarea_1 borde_1" id="DireccionMinorista"></textarea>
                            </div>  
                        </div>   
                        <div class="contFlex50">
                            <input class="ocultar" type="text" id="Pedido" name="pedido"/>
                            <input class="boton boton--alto boton--largo botonJS" type="submit" value="Generar pedido"/>
                        </div>
                    </div>
                </article>    
            </form>
        </div>
    </section>
</section>
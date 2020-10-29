<!-- Archivo invocado desde Carrito_C-->

<section class="section_4">
    <div class="contenedor_24 contenedor_25">
        <h1 class="h1_1 h1_9 ">Tu orden</h1>
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
                        <!--tabla es rellenada desde funcionesVarias.js por medio de PedidoEnCarrito()-->
                        <td><input type="text" class="ocultar" id="Input_cantidadCar"/></td>
                        <td><input type="text" class="ocultar" id="Input_productoCar"/></td>
                        <td><input type="text" class="ocultar" id="Input_precioCar"/></td>
                        <td><input type="text" class="ocultar" id="Input_totalCar"/></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="contenedor_63">  
            <div class="contenedor_64">     
                <input type="radio" name="entrega" id="Domicilio_No" value="Domicilio_No"/>
                <label class="label_12" for="Domicilio_No">Recoger pedido en tienda, 0 Bs.</label>
                <br class="br_1">
                <input type="radio" name="entrega" id="Domicilio_Si" value="Domicilio_Si" checked />
                <label class="label_12" for="Domicilio_Si">Entrega a domicilio, 3.000 Bs.</label>
            </div>     
            <div>
                <h2 class="h2_2">Monto en tienda: <input type="text" class="input_6" id="MontoTienda" readonly="readondly"/> Bs.</h2>
                <h2 class="h2_2">Comisión PedidoRemoto: <input type="text" class="input_6" id="Comision" readonly="readondly"/> Bs.</h2>
                <h2 class='h2_2' id="Despacho">Entrega a domicilio:<input type='text' class='input_6' value='3.000' readonly="readondly"/> Bs.</h2>
                <hr class="hr_1"/>
                <h2 class="h2_2 h2_3">Monto total: <input type="text" class="input_6 input_7" id="MontoTotal" readonly="readondly"/> Bs.</h2>
            </div>
        </div>
        <div class="contenedor_26" id="Contenedor_26">
            <label class="boton boton_1 boton_9" onclick="MuestraEnvioFactura(); autofocus('NombreUsuario')">Confirmar <br class="br_2"> orden</label>
            <label class="boton boton_1 boton_9" onclick="ocultarPedido()">Regresar a mostrador</label>
        </div>
    </div>
    <article>
        <div class="contenedor_24 contenedor_27" id="MuestraEnvioFactura">
            <form action="../../RecibePedido_C/recibePedido/" method="POST" onsubmit="return validarDespacho()">
                <div>
                    <h1 class="h1_1">Datos de despacho</h1>
                    <div class="contenedor_28">

                        <!-- NOMBRE -->
                        <div class="contenedor_29">
                            <input class="input_13 borde_1" type="text" name="nombre" id="NombreUsuario" autocomplete="off" placeholder="Nombre" onkeydown="blanquearInput('NombreUsuario')"/>
                        </div>

                        <!-- APELLIDO -->
                        <div class="contenedor_29">
                            <input class="input_13 borde_1" type="text" name="apellido" id="ApellidoUsuario" autocomplete="off" placeholder="Apellido" onkeydown="blanquearInput('ApellidoUsuario')"/>
                        </div>

                        <!-- CEDULA -->
                        <div class="contenedor_29">
                            <input class="input_13 borde_1" type="text" name="cedula" id=
                        "CedulaUsuario" autocomplete="off" placeholder="Cedula / RIF (solo números)" onkeydown="blanquearInput('CedulaUsuario')"/>
                        </div>

                        <!-- TELEFONO -->
                        <div class="contenedor_29">
                            <input class="input_13 borde_1" type="text" name="telefono" id="TelefonoUsuario" autocomplete="off" placeholder="Telefono (solo números)" onkeydown="blanquearInput('TelefonoUsuario')"/>
                        </div>

                        <!-- DIRECCION -->
                        <div class="contenedor_72">
                            <textarea class="textarea_1  placeholder borde_1" name="direccion" id="DireccionUsuario" autocomplete="off" placeholder="Dirección" onkeydown="blanquearInput('DireccionUsuario')"></textarea>
                        </div>
                    </div>
                </div>
                <div class="contenedor_62">
                    <h1 class="h1_1">Formas de pago</h1>
                    <div class="contenedor_65">
                        <input type="radio" name="pago" id="Transferencia" onclick="verTransferenciaBancaria()">
                        <label class="label_12" for="Transferencia">Transferencia bancaria</label>
                        <br class="br_2"/>

                        <input type="radio" name="pago" id="PagoMovil" onclick="verPagoMovil()">
                        <label class="label_12" for="PagoMovil">Pago movil</label>                        <div class="contenedor_60" id="Contenedor_60a">
                            <ul class="ul_1">
                                <li class="li_1">Transferencias realizadas del mismo banco habilitan el despacho inmediatamente.</li>
                                <li class="li_1">Transferencias de otros bancos dejan el despacho en espera 24 horas, una vez confirmado se le notificara al despachador para que realize la entrega.</li>
                            </ul>
                            <?php
                                // $Datos viene de Carrito_C/index
                                foreach($Datos as $row):                                     
                                    $Banco = $row['bancoNombre'];
                                    $Cuenta = $row['bancoCuenta'];
                                    $Titular = $row['bancoTitular'];
                                    $Rif = $row['bancoRif']; ?>
                                    <div class= "contenedor_136">
                                        <div class="contenedor_138">
                                            <p class="p_13">Titular</p>
                                            <p class="p_13">Cedula/RIF</p>
                                            <p class="p_13">Banco</p>
                                            <p class="p_13">Nº cuenta</p>
                                        </div>
                                        <div>
                                            <p class="p_14"><?php echo $Banco;?></p>
                                            <p class="p_14"><?php echo $Cuenta;?></p>
                                            <p class="p_14"><?php echo $Titular;?></p>
                                            <p class="p_14"><?php echo $Rif;?></p>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            ?>
                            <input class="placeholder input_11" type="text" name="registro_Pago" id="RegistroPago" placeholder="Código transferencia o pagomovil"/>
                        </div>
                    </div>
                    <div class="contenedor_65">
                        <div class="contenedor_60" id="Contenedor_60b">
                            <ul>
                                <li>Transferencias realizadas del mismo banco habilitan el despacho inmediatamente</li>
                                <li>Transferecnias de otros bancos dejan el despacho en espera 24 horas</li>
                            </ul>
                            <div>
                                <p>Banco Mercantil</p>
                                <p>Comercial la 13 C.A</p>
                                <p>0234 3423 234543432323</p>
                            </div>
                        </div>
                    </div>
                    <div class="contenedor_30">
                        <input class="ocultar" type="text" id="Pedido" name="pedido">
                        <label class="boton boton_1 boton_9" onclick="ocultarPedido()">Regresar a mostrador</label>
                        <input class="boton boton_1 boton_9 botonJS" type="submit" value="Comprar"/>
                    </div>
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
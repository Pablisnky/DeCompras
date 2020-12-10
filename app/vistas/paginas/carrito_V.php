<section class="section_4">
    <div class="contenedor_24 contenedor_25">
        <h1 class="h1_1 h1_9 ">Orden de compra</h1>
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
                        <!--tabla es rellenada desde E_Vitrina.js por medio de PedidoEnCarrito()-->
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
                <input type="radio" name="entrega" id="Domicilio_No" value="Domicilio_No"  form="DatosUsuario"/>
                <label class="label_12" for="Domicilio_No">Recoger pedido en tienda, 0 Bs.</label>
                <br class="br_1"/>
                <input type="radio" name="entrega" id="Domicilio_Si" value="Domicilio_Si" form="DatosUsuario" checked/>
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
            <label class="boton boton_1 boton_9" onclick="ocultarPedido()">Regresar a mostrador</label>
            <label class="boton boton_1 boton_9" onclick="MuestraEnvioFactura(); autofocus('NombreUsuario')">Confirmar <br class="br_2"> orden</label>
        </div>
    </div>
    <article>
        <div class="contenedor_24 contenedor_27" id="MuestraEnvioFactura">
            <form action="../../RecibePedido_C/recibePedido/" method="POST" onsubmit="return validarDespacho()" id="DatosUsuario">
                <div>
                    <h1 class="h1_1">Datos de despacho</h1>
                    <div class="contenedor_28">

                        <!-- NOMBRE -->
                        <div class="contenedor_29">
                            <input class="input_13 borde_1" type="text" name="nombreUsuario" id="NombreUsuario" autocomplete="off" placeholder="Nombre" onkeydown="blanquearInput('NombreUsuario')"/>
                        </div>

                        <!-- APELLIDO -->
                        <div class="contenedor_29">
                            <input class="input_13 borde_1" type="text" name="apellidoUsuario" id="ApellidoUsuario" autocomplete="off" placeholder="Apellido" onkeydown="blanquearInput('ApellidoUsuario')"/>
                        </div>

                        <!-- CEDULA -->
                        <div class="contenedor_29">
                            <input class="input_13 borde_1" type="text" name="cedulaUsuario" id=
                        "CedulaUsuario" autocomplete="off" placeholder="Cedula / RIF (solo números)"  onkeydown="blanquearInput('CedulaUsuario')" onkeyup="formatoMiles(this.value, 'CedulaUsuario')"/>
                        </div>

                        <!-- TELEFONO -->
                        <div class="contenedor_29">
                            <input class="input_13 borde_1" type="text" name="telefonoUsuario" id="TelefonoUsuario" autocomplete="off" placeholder="Telefono (solo números)" onkeydown="blanquearInput('TelefonoUsuario')" onkeyup="mascaraTelefono(this.value, 'TelefonoUsuario')"/>
                        </div>

                        <!-- DIRECCION -->
                        <div class="contenedor_55 contenedor_154">
                            <div class="contenedor_155">
                                <select class="select_2 borde_1" id="Estado" onchange="blanquearInput('Estado')">
                                    <option disabled selected>Seleccione un estado</option>
                                    <option selected="true">Yaracuy</option>
                                </select>
                            </div>
                            <div class="contenedor_155">
                                <select class="select_2 borde_1" id="Ciudad" onclick="blanquearInput('Ciudad')">
                                    <option id="Option_1" disabled selected>Seleccione una ciudad</option>
                                    <option>Cocorote</option>
                                    <option>Independencia</option>
                                    <option>San Felipe</option>
                                    <option>Yaritagua</option>
                                </select>
                            </div>
                        </div>
                        <div class="contenedor_72">
                            <textarea class="textarea_1 borde_1" name="direccionUsuario" id="DireccionUsuario" autocomplete="off" placeholder="Dirección" onkeydown="blanquearInput('DireccionUsuario')"></textarea>
                        </div>
                    </div>
                </div>
                <div class="contenedor_62">
                    <h1 class="h1_1">Formas de pago</h1>
                    <div class="contenedor_65">
                        <input type="radio" name="pago" id="Transferencia" value="Transferencia" onclick="verTransferenciaBancaria()">
                        <label class="label_12" for="Transferencia">Transferencia bancaria</label>
                        <br class="br_2"/>
                        <input type="radio" name="pago" id="PagoMovil" value="PagoMovil" onclick="verPagoMovil()">
                        <label class="label_12" for="PagoMovil">Pago movil</label> 
                        <br class="br_2"/>
                        <input type="radio" name="pago" id="PagoDestino" value="PagoDestino" onclick="verPagoDestino()">
                        <label class="label_12" for="PagoDestino">Pago en destino</label> 
                                                
                        <!-- PAGO TRANSFERENCIA -->
                        <div class="contenedor_60" id="Contenedor_60a">
                            <ul class="ul_1">
                                <li class="li_1">Transferencias realizadas del mismo banco habilitan el despacho inmediatamente.</li>
                                <li class="li_1">Transferencias de otros bancos dejan el despacho en espera 24 horas, una vez confirmado se le notificara al despachador para que realize la entrega.</li>
                            </ul>
                            <input class="placeholder input_11" type="text" name="codigoPago" id="RegistroPago_Transferencia" placeholder="Código transferencia" onkeydown="blanquearInput('RegistroPago_Transferencia')"/>
                            <?php
                                // $Datos viene de Carrito_C/index
                                // echo "<pre>";
                                // print_r($Datos);
                                // echo "</pre>";            
                                // exit();
                                foreach($Datos['Banco'] as $row):                                     
                                    $Banco = $row['bancoNombre'];
                                    $Cuenta = $row['bancoCuenta'];
                                    $Titular = $row['bancoTitular'];
                                    $Rif = $row['bancoRif']; ?>
                                    <div class= "contenedor_136">
                                        <div class="contenedor_138">
                                            <p class="p_13">Banco</p>
                                            <p class="p_13">Titular</p>
                                            <p class="p_13">Nº cuenta</p>
                                            <p class="p_13">Cedula/RIF</p>
                                        </div>
                                        <div>
                                            <p class="p_14"><?php echo $Banco;?></p>
                                            <p class="p_14"><?php echo $Titular;?></p>
                                            <p class="p_14"><?php echo $Cuenta;?></p>
                                            <p class="p_14"><?php echo $Rif;?></p>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            ?>
                        </div>

                        <!-- PAGOMOVIL -->
                        <div class="contenedor_60" id="Contenedor_60b">
                            <p>(Despachos en zona metropolitana de su ciudad)</p>
                            <ul class="ul_1">
                                <li class="li_1">Transferencias realizadas del mismo banco habilitan el despacho inmediatamente</li>
                                <li class="li_1">Transferencias de otros bancos dejan el despacho en espera 24 horas</li>
                            </ul>                            
                            <p>(Despachos a nivel nacional)</p>
                            <ul class="ul_1">
                                <li class="li_1">.</li>
                                <li class="li_1">.</li>
                            </ul>  

                            <input class="placeholder input_11 ocultar" type="text" name="codigoPago" id="RegistroPago_Pagomovil" placeholder="Código pagomovil" onkeydown="blanquearInput('RegistroPago_Pagomovil')"/>
                            <?php
                                // // $Datos viene de Carrito_C/index
                                // echo "<pre>";
                                // print_r($Datos);
                                // echo "</pre>";            
                                // exit();
                                foreach($Datos['Pagomovil'] as $row): 
                                    $Banco = $row['banco_pagomovil'];                                    
                                    $Cedula = $row['cedula_pagomovil'];
                                    $Telefono = $row['telefono_pagomovil'];?>
                                    <div class= "contenedor_136">
                                        <div class="contenedor_138">
                                            <p class="p_13">Banco </p>
                                            <p class="p_13">Cedula</p>
                                            <p class="p_13">Nº telefono</p>
                                        </div>
                                        <div>
                                            <p class="p_14"><?php echo $Banco;?></p>
                                            <p class="p_14"><?php echo $Cedula;?></p>
                                            <p class="p_14"><?php echo $Telefono;?></p>
                                        </div>
                                    </div>
                                    <?php
                                endforeach;
                            ?>
                        </div>

                        <!-- PAGO EN DESTINO -->
                        <div class="contenedor_60" id="Contenedor_60c">
                            <p>Pago con tarjeta de debito al recibir el producto</p>
                        </div>
                    </div>

                    <div class="contenedor_30">
                        <input class="ocultar" type="text" name="id_tienda" value="<?php echo $Datos['ID_Tienda']?>"/>

                        <input class="ocultar" type="text" id="Pedido" name="pedido"/>

                        <label class="boton boton_1 boton_9" onclick="ocultarPedido()">Regresar a mostrador</label>
                        <input class="boton boton_1 boton_9 botonJS" type="submit" value="Comprar"/>
                    </div>
                </div>
            </form>
        </div>
    </article>
</section>
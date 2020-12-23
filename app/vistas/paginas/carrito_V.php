<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/telefono/style_telefono.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/ubicacion/style_ubicacion.css"/>

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
                <h2 class="h2_2 ocultar">Comisión PedidoRemoto: <input type="text" class="input_6" id="Comision" readonly="readondly"/> Bs.</h2>
                <h2 class='h2_2' id="Despacho">Entrega a domicilio:<input type='text' class='input_6' value='3.000' readonly="readondly"/> Bs.</h2>
                <hr class="hr_1"/>
                <h2 class="h2_2 h2_3">Monto total: <input type="text" form="DatosUsuario" name="montoTotal" class="input_6 input_7" id="MontoTotal" readonly="readondly"/> Bs.</h2>
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
                            <input class="input_13 borde_1" type="text" name="telefonoUsuario" id="TelefonoUsuario" autocomplete="off" placeholder="Telefono (solo números)" onkeydown="blanquearInput('TelefonoUsuario')" onkeyup="mascaraTelefono(this.value, 'TelefonoUsuario')" onblur="validarFormatoTelefono(this.value,'TelefonoUsuario')"/>
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

                <!-- FORMAS DE PAGO -->
                <div class="contenedor_62">
                    <h1 class="h1_1">Formas de pago</h1>
                    <div class="contenedor_164">
                            <?php
                            // $Datos viene de Carrito_C/index
                            // echo "<pre>";
                            // print_r($Datos);
                            // echo "</pre>";            
                            // exit();
                            ?>
                        <?php
                        if($Datos['Banco'] != Array()){ ?>
                        <div class="contenedor_165">
                            <input type="radio" name="formaPago" id="Transferencia" value="Transferencia" onclick="verPagoTransferencia()">
                            <label class="label_12" for="Transferencia">Transferencia bancaria</label>
                        </div>
                        <br class="br_2"/>
                            <?php
                        }   

                        if($Datos['Pagomovil'] != Array()){ ?>
                            <div class="contenedor_165">
                                <input type="radio" name="formaPago" id="PagoMovil" value="PagoMovil" onclick="verPagoMovil()">
                                <label class="label_12" for="PagoMovil">Pago movil</label> 
                            </div>
                            <br class="br_2"/>
                            <?php
                        }     

                        if($Datos['OtrosPagos'][0]['efectivoBolivar']  != 0){ ?>
                            <div class="contenedor_165">
                                <input type="radio" name="formaPago" id="EfectivoBolivar" value="Efectivo_Bolivar" onclick="verPagoEfectivoBolivar()">
                                <label class="label_12" for="EfectivoBolivar">Pago destino (Bs.)</label> 
                            </div>
                            <br class="br_2"/>
                            <?php
                        }    

                        if($Datos['OtrosPagos'][0]['efectivoDolar'] != 0){ ?>
                            <div class="contenedor_165">
                                <input type="radio" name="formaPago" id="EfectivoDolar" value="Efectivo_Dolar" onclick="verPagoEfectivoDolar()">
                                <label class="label_12" for="EfectivoDolar">Pago destino ($)</label> 
                            </div>
                            <br class="br_2"/>
                            <?php
                        }     

                        if($Datos['OtrosPagos'][0]['acordado'] != 0){ ?>
                            <div class="contenedor_165">
                                <input type="radio" name="formaPago" id="Acordado" value="acordado" onclick="verPagoAcordado()">
                                <label class="label_12" for="Acordado">Acordado con tienda</label> 
                            </div>
                            <br class="br_2"/>
                            <?php
                        }   ?>  
                    </div>   

                    <!-- PAGO TRANSFERENCIA -->
                    <div class="contenedor_60" id="Contenedor_60a">
                        <h3 class="h3_2 h3_3">Cuentas para transferencias</h3>
                        <!-- <ul class="ul_1">
                            <li class="li_1">Pedidos realizados desde zona metropolitana de su ciudad</li> 
                        </ul> 
                        <p>Transferencias realizadas del mismo banco habilitan el despacho inmediatamente.</p>
                        <p>Transferencias realizadas de otros bancos habilitan el despacho pasada 48 horas.</p>
                        <ul class="ul_1">
                            <li class="li_1">Pedidos realizados desde otra ciudad</li>
                        </ul>            
                        <p>Despachos enviados via Zoom</p> -->
                        <table class="tabla_2">
                            <tbody>
                                <?php
                                // $Datos viene de Carrito_C/index
                                // echo "<pre>";
                                // print_r($Datos);
                                // echo "</pre>";            
                                // exit();
                                
                                foreach($Datos['Banco'] as $row) :                                     
                                    $Banco = $row['bancoNombre'];
                                    $Cuenta = $row['bancoCuenta'];
                                    $Titular = $row['bancoTitular'];
                                    $Rif = $row['bancoRif']; ?>
                                    <tr>
                                        <td class="td_5">Banco</td>
                                        <td><?php echo $Banco?></td>
                                    </tr>
                                    <tr>
                                        <td class="td_5">Titular</td>
                                        <td><?php echo $Titular?></td>
                                    </tr>
                                    <tr>
                                        <td class="td_5">Nº cuenta</td>
                                        <td><?php echo $Cuenta?></td>
                                    </tr>
                                    <tr>
                                        <td class="td_5">Cedula/RIF</td>
                                        <td><?php echo $Rif?></td>
                                    </tr>
                                    <?php 
                                endforeach;   ?>
                            </tbody>
                        </table>
                       
                        <input class="input_13 input_17 borde_1" type="text" name="codigoTransferencia" id="RegistroPago_Transferencia" placeholder="Código transferencia" onkeydown="blanquearInput('RegistroPago_Transferencia')"/>
                    </div>

                    <!-- PAGOMOVIL -->
                    <div class="contenedor_60" id="Contenedor_60b">
                        <h3 class="h3_2 h3_3">Cuentas para PagoMovil</h3>
                        <!-- <p>(Pedidos realizados desde zona metropolitana de su ciudad)</p>
                        <ul class="ul_1">
                            <li class="li_1">Despachos inmediatos</li>
                        </ul>                            
                        <p>(Pedidos realizados desde otra ciudad)</p>
                        <ul class="ul_1">
                            <li class="li_1">Despachos enviados via Zoom</li>
                        </ul>    -->
                        
                        <table class="tabla_2">
                            <tbody>
                                <?php
                                // $Datos viene de Carrito_C/index
                                // echo "<pre>";
                                // print_r($Datos);
                                // echo "</pre>";            
                                // exit();
                                
                                foreach($Datos['Pagomovil'] as $row): 
                                    $Banco = $row['banco_pagomovil'];                                    
                                    $Cedula = $row['cedula_pagomovil'];
                                    $Telefono = $row['telefono_pagomovil']; ?>
                                    <tr>
                                        <td class="td_5">Banco</td>
                                        <td><?php echo $Banco?></td>
                                    </tr>
                                    <tr>
                                        <td class="td_5">Cedula</td>
                                        <td><?php echo $Cedula?></td>
                                    </tr>
                                    <tr>
                                        <td class="td_5">Nº telefono</td>
                                        <td><?php echo $Telefono?></td>
                                    </tr>
                                    <tr>
                                        <td class="td_6"></td>
                                        <td></td>
                                    </tr>
                                    <?php 
                                endforeach;   ?>
                            </tbody>
                        </table>

                        <input class="input_13 input_17 borde_1" type="text" name="codigoPagoMovil" id="RegistroPago_Pagomovil" placeholder="Código pagomovil" onkeydown="blanquearInput('RegistroPago_Pagomovil')"/>
                    </div>

                    <!-- PAGO EFECTIVO BOLIVAR -->
                    <div class="contenedor_60" id="Contenedor_60c">
                        <p>Pague en bolivares al despachador al momento de hacer la entrega de su compra.</p>
                    </div>

                    <!-- PAGO EFECTIVO DOLAR -->
                    <div class="contenedor_60" id="Contenedor_60d">
                        <p>Pague en dolares al despachador al momento de hacer la entrega de su compra.</p>
                    </div>

                    <!-- PAGO ACORDADO -->
                    <div class="contenedor_60" id="Contenedor_60e">
                        <p>Contacta al encargado de la tienda.</p>
                        <p>0434-234.23.23</p>
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
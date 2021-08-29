<!-- Archivo cargado via AJAX en el div "Mostrar_Orden" del archivovitrina_V.php -->

<!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización del capture--> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<section class="sectionModal">
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
                                <!--tabla es rellenada desde E_Vitrina.js por medio de PedidoEnCarrito()-->
                                <td><input type="text" class="ocultar" id="Input_cantidadCar"/></td>
                                <td><input type="text" class="ocultar" id="Input_productoCar"/></td>
                                <td><input type="text" class="ocultar" id="Input_precioCar"/></td>
                                <td><input type="text" class="ocultar" id="Input_totalCar"/></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>

            <!-- <article> -->
                <div class="contGeneral">  
                    <div class="contInputRadio">     
                        <input type="radio" name="entrega" id="Domicilio_No" value="Domicilio_No"  form="DatosUsuario"/>
                        <label class="contInputRadio__label" for="Domicilio_No">Recoger pedido en tienda, 0 Bs.</label>
                    </div>                    
                    <div class="contInputRadio">
                        <input type="radio" name="entrega" id="Domicilio_Si" value="Domicilio_Si" form="DatosUsuario" checked/>
                        <label class="contInputRadio__label" for="Domicilio_Si">Entrega a domicilio, <?php echo number_format($Datos['Delivery'], 0, ",", ".");?> Bs.</label>
                        <input class="ocultar" type="text" id="PrecioEnvio" value="<?php echo $Datos['Delivery'];?>"/>
                    </div>     
                    
                        <!--DIV ALIMENTADO DESDE CARRITO.JS PedidoEnCarrito() -->
                    <div>
                        <h2 class="h2_2">Monto en tienda: <input type="text" form="DatosUsuario" name="montoTienda" class="input_6" id="MontoTienda" readonly="readondly"/> Bs.</h2>

                        <h2 class="h2_2 ocultar">Comisión PedidoRemoto: <input type="text" class="input_6" id="Comision" readonly="readondly"/> Bs.</h2>

                        <h2 class='h2_2'>Monto de envio:<input type='text' form="DatosUsuario" name="despacho" id="Despacho_2" class='input_6' value='<?php echo number_format($Datos['Delivery'], 0, ",", ".");?>' readonly="readondly"/> Bs.</h2>

                        <hr class="hr_1"/>
                        <h2 class="h2_2 h2_3">Monto total: <input type="text" form="DatosUsuario" name="montoTotal" class="input_6 input_7" id="MontoTotal" readonly="readondly"/> Bs.</h2>
                        <!-- <h2 class="h2_2 h2_3"><input type="text" form="DatosUsuario" name="" class="input_6 input_7" id="MontoTotalDolares" readonly="readondly"/> $ USD</h2> -->
                    </div>
                </div>
            <!-- </article> -->

            <article>
                <div class="contBoton" id="Contenedor_26">
                    <label class="boton boton--alto" onclick="ocultarPedido()">Regresar a mostrador</label>
                    <label class="boton boton--alto" onclick="MuestraEnvioFactura()">Confirmar <br class="br_2"> orden</label>
                </div>
            </article>
        </div>
    </section>

    <section> 
        <div class="contOculto" id="MuestraEnvioFactura">
            <form action="../../RecibePedido_C" method="POST" enctype="multipart/form-data" onsubmit="return validarDespacho()" id="DatosUsuario">
                
                <!-- DATOS DE DESPACHO -->
                <article>
                    <div class="contenedor_24">
                        <header>
                            <h1 class="h1_1">Datos de despacho</h1>
                        </header>

                        <div class="contFlex" style="position: relative;">
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

                            <!-- CORREO -->
                            <div class="contenedor_29">
                                <input class="input_13 borde_1" type="correo" name="correoUsuario" id="CorreoUsuario" autocomplete="off" placeholder="correo" onkeydown="blanquearInput('CorreoUsuario')"/>
                            </div>

                            <!-- DIRECCION -->
                            <div class="contenedor_55 contenedor_154">
                                <div class="contenedor_155">
                                    <select class="select_2 borde_1" name="estado" id="Estado" onchange="blanquearInput('Estado')">
                                        <option disabled selected>Seleccione un estado</option>
                                        <option selected="true">Yaracuy</option>
                                    </select>
                                </div>
                                <div class="contenedor_155">
                                    <select class="select_2 borde_1" name="ciudad" id="Ciudad" onclick="blanquearInput('Ciudad')">
                                        <option id="Option_1" disabled selected>Seleccione una ciudad</option>
                                        <option>Cocorote</option>
                                        <option>Independencia</option>
                                        <option>San Felipe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="contenedor_72">
                                <textarea class="textarea_1 borde_1" name="direccionUsuario" id="DireccionUsuario" autocomplete="off" placeholder="Dirección" onkeydown="blanquearInput('DireccionUsuario')"></textarea>
                            </div>
                            
                            <!-- SUSCRIBIRSE -->
                            <div class="contFlex contFlex--suscribir">
                                <P class="rompe_Flex">Desea que sus datos se guarden para futuras compras</P>
                                <div class="contInputRadio" id="">     
                                    <input type="radio" name="suscrito" id="Suscrito_No" value="Suscrito_No"/>
                                    <label class="contInputRadio__label" for="Suscrito_No">No guardar</label>
                                </div>  
                                <div class="contInputRadio" id="">
                                    <input type="radio" name="suscrito" id="Suscrito_Si" value="Suscrito_Si" checked/>
                                    <label class="contInputRadio__label" for="Suscrito_Si">Guardar</label>
                                </div>  
                            </div>

                            <!-- CONFIRMACION DE USUARIO -->
                            <div class="contFlex--usuarios" id="ModalTipoUsuario">
                                <!-- <article> -->
                                    <label class="boton boton--alto" id="No_Registrado" onclick="CerrarModal_X('ModalTipoUsuario', 'NombreUsuario')">Usuario no registrado</label>
                                    <label class="boton boton--alto" id="Registrado" onclick="mostrar_cedula()">Usuario <br class="br_2"> registrado</label>
                                <!-- </article> -->
                                <div class="ocultar" id="Mostrar_Cedula">
                                    <input class="input_13 borde_1" type="text" placeholder="Introduzca Nº Cedula (Solo números)" value="12.728.036" onblur="Llamar_UsuarioRegistrado(this.value)"/>
                                    <label class="boton boton--color boton--centro" >Enviar</label>
                                </div> 
                            </div>      
                        </div>  
                    </div>
                </article>    

                <!-- FORMAS DE PAGO -->
                <article> 
                    <div class="contenedor_24">
                        <div class="contGeneral contGeneral--left">
                            <h1 class="h1_1">Formas de pago</h1>

                            <!-- SELECCIONAR FORMA DE PAGO -->
                            <div class="contInputRadio">
                                <?php
                                if($Datos['Banco'] != Array()){ ?>                                
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="Transferencia" value="Transferencia" onclick="verPagoTransferencia()"/>
                                    <label class="contInputRadio__label" for="Transferencia">Transferencia bancaria</label>
                                </div>
                                    <?php
                                }   

                                if($Datos['Pagomovil'] != Array()){ ?>                                
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="PagoMovil" value="PagoMovil" onclick="verPagoMovil()"/>
                                    <label class="contInputRadio__label" for="PagoMovil">Pago movil</label> 
                                </div>
                                    <?php
                                }     

                                if($Datos['OtrosPagos'][0]['efectivoBolivar']  != 0){ ?>
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="EfectivoBolivar" value="Efectivo_Bolivar" onclick="verPagoEfectivoBolivar()"/>
                                    <label class="contInputRadio__label" for="EfectivoBolivar">Pago destino (Bs.)</label> 
                                </div>
                                    <?php
                                }    

                                if($Datos['OtrosPagos'][0]['efectivoDolar'] != 0){ ?>
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="EfectivoDolar" value="Efectivo_Dolar" onclick="verPagoEfectivoDolar()"/>
                                    <label class="contInputRadio__label" for="EfectivoDolar">Pago destino ($)</label> 
                                </div>
                                    <?php
                                }     

                                if($Datos['OtrosPagos'][0]['acordado'] != 0){ ?>
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="Acordado" value="acordado" onclick="verPagoAcordado()"/>
                                    <label class="contInputRadio__label" for="Acordado">Acordado con tienda</label> 
                                </div>
                                    <?php
                                }   ?>  
                            </div>   

                            <!-- PAGO TRANSFERENCIA -->
                            <div class="contInforPago" id="Contenedor_60a">
                                <h3 class="h3_2">Cuentas para transferencias</h3>
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
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Banco</td>
                                                <td><?php echo $Banco?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Titular</td>
                                                <td><?php echo $Titular?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Nº cuenta</td>
                                                <td><?php echo $Cuenta?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Cedula/RIF</td>
                                                <td><?php echo $Rif?></td>
                                            </tr class="tabla2__tr1">
                                            <tr class="tabla2__tr2"></tr>
                                            <?php 
                                        endforeach;   ?>
                                    </tbody>
                                </table>

                                <p class="contenedor_60__p1">Informe su pago mediante el código de la transferencia o el capture de la transferencia</p>
                                <div class="contInputRadio">
                                    <input type="radio" name="referenciaPago" id="ReferenciaPago" value="codigoTransferencia" onclick="verInputTransferencia()"/>
                                    <label class="contInputRadio__label" for="ReferenciaPago">Codigo transferencia</label> 
                                </div>
                                <div class="contInputRadio">
                                    <input type="radio" name="referenciaPago" id="CapturePago" value="CaptureTransferencia" onclick="verCaptureTransferencia()"/>
                                    <label class="contInputRadio__label" for="CapturePago">Capture transferencia</label> 
                                </div>
                                
                                <!-- INPUT TRANSFERENCIA -->
                                <div class="contOculto contGeneral" id="InputTransferencia">
                                    <input class="input_13 input--textCenter borde_1" type="text" name="codigoTransferencia" id="RegistroPago_Transferencia" placeholder="Código transferencia" onkeydown="blanquearInput('RegistroPago_Transferencia')"/>
                                </div>
                                                    
                                    <!-- CAPTURE TRANSFERENCIA -->
                                <div class="contOculto contGeneral" id="CaptureTransferencia">
                                    <label class="boton boton--largo boton--centro" for="ImagenTransferencia">Insertar capture</label>
                                    <input class="ocultar" type="file" name="imagenTransferencia" id="ImagenTransferencia" onchange="CaptureTransferencia()"/>
                                    <br>

                                    <!-- div que muestra la previsualización del capture-->
                                    <div class="contGeneralCentro" id="DivCaptureTransferencia"></div>
                                </div> 
                            </div>

                            <!-- PAGOMOVIL -->
                            <div class="contInforPago" id="Contenedor_60b">
                                <h3 class="h3_2">Cuentas para PagoMovil</h3>
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
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Banco</td>
                                                <td><?php echo $Banco?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Cedula</td>
                                                <td><?php echo $Cedula?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Nº telefono</td>
                                                <td><?php echo $Telefono?></td>
                                            </tr>
                                            <tr>
                                                <td class="td_6"></td>
                                                <td></td>
                                            </tr>
                                            <tr class="tabla2__tr2"></tr>
                                            <?php 
                                        endforeach;   ?>
                                    </tbody>
                                </table>
                                
                                <h3 class="h3_2">Informe su pago mediante el capture del PagoMovil</h3>
                                                    
                                <!-- <br class="br_1"/> -->
                                <!-- IMAGEN CAPTURE -->
                                <div class="contGeneral" id="CapturePagoMovil">
                                    <label class="boton boton--largo boton--centro" for="ImagenPagoMovil">Insertar capture</label>
                                    <input class="ocultar" type="file" name="imagenPagoMovil" id="ImagenPagoMovil" onchange="CapturePagoMovil()"/>
                                    <!-- <br class="br_1"> -->

                                    <!-- div que muestra la previsualización del capture-->
                                    <div class="contGeneralCentro" id="DivCapturePagoMovil"></div>
                                </div> 
                            </div>

                            <!-- PAGO EFECTIVO BOLIVAR -->
                            <div class="contInforPago" id="Contenedor_60c">
                                <h3 class="h3_2">Pago en destino (Bs.)</h3>
                                <p>Pague en bolivares al despachador al momento de hacer la entrega de su compra.</p>
                            </div>

                            <!-- PAGO EFECTIVO DOLAR -->
                            <div class="contInforPago" id="Contenedor_60d">
                                <h3 class="h3_2">Pago en destino ($)</h3>
                                <p>Pague en dolares al despachador al momento de hacer la entrega de su compra.</p>
                            </div>

                            <!-- PAGO ACORDADO -->
                            <?php
                                foreach($Datos['TelefonoTienda'] as $row) : 
                                            $TelefonoTienda = $row['telefono_AfiCom'];
                                endforeach;     ?>
                            <div class="contInforPago" id="Contenedor_60e">
                                <h3 class="h3_2">Acuerdo con tienda</h3>
                                <p>Contacta al encargado de la tienda.</p>
                                <p><?php echo $TelefonoTienda?></p>
                            </div>
                        </div>
                            <div class="contFlex50">
                                <input class="ocultar" type="text" name="id_tienda" value="<?php echo $Datos['ID_Tienda']?>"/>

                                <input class="ocultar" type="text" id="Pedido" name="pedido"/>

                                <!-- Cargado via Ajax cuando el usuario es recordado -->
                                <input class="ocultar" type="text" id="ID_Usuario" name="ID_Usuario"/>

                                <label class="boton boton--alto" onclick="ocultarPedido()">Regresar a mostrador</label>
                                <input class="boton boton--alto botonJS" type="submit" value="Comprar"/>
                            </div>
                    </div>
                </article> 
            </form>
        </div>
    </section>
</section>
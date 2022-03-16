<!-- Archivo cargado via AJAX en el div id="Mostrar_Orden" del archivovitrina_V.php -->

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
                                <th class="th_1 th_4">TOTAL</th>
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
                        <label class="contInputRadio__label" for="Domicilio_No">Recoger pedido en tienda: 0,00 Bs.</label>
                    </div>                    
                    <div class="contInputRadio">
                        <input type="radio" name="entrega" id="Domicilio_Si" value="Domicilio_Si" form="DatosUsuario" checked/>
                        <label class="contInputRadio__label" for="Domicilio_Si">Entrega a domicilio: <?php echo number_format($Datos['Delivery'], 2, ",", ".");?> Bs.</label>
                        <input class="ocultar" type="text" id="PrecioEnvio" value="<?php echo $Datos['Delivery'];?>"/>
                    </div>     
                    
                    <!--DIV ALIMENTADO DESDE E_Vitrina.js PedidoEnCarrito() -->
                    <div>
                        <h2 class="h2_2">Monto en tienda: <input type="text" form="DatosUsuario" name="montoTienda" class="input_6" id="MontoTienda" readonly="readondly"/> Bs.</h2>

                        <h2 class="h2_2 ocultar">Comisión PedidoRemoto: <input type="text" class="input_6" id="Comision" readonly="readondly"/> Bs.</h2>

                        <h2 class='h2_2'>Monto de envio:<input type='text' form="DatosUsuario" name="despacho" id="Despacho_2" class='input_6' value='<?php echo number_format($Datos['Delivery'], 2, ",", ".");?>' readonly="readondly"/> Bs.</h2>

                        <hr class="hr_1"/>
                        <h2 class="h2_2 h2_3">Monto total: <input type="text" form="DatosUsuario" name="montoTotal" class="input_6 input_7" id="MontoTotal" readonly="readondly"/> Bs.</h2>
                        <h2 class="h2_2 h2_3"><input type="text" form="DatosUsuario" name="" class="input_6 input_7" id="MontoTotalDolares" readonly="readondly"/> $</h2>

                        <small class="small_1 small_1A">Cambio oficial a tasa del BCV <strong class="strong_1">( 1 $ = <?php echo number_format($Datos['DolarHoy'], 4, ",", ".");?> Bs.)</strong></small>
                    </div>
                </div>
            <!-- </article> -->

            <article>
                <div class="contBoton" id="Contenedor_26">
                    <label class="boton boton--alto" onclick="ocultarPedido()">Regresar a secciones</label>
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
                                <input class="input_13 borde_1" type="text" name="telefonoUsuario" id="TelefonoUsuario" autocomplete="off" placeholder="Telefono (solo números)" onkeydown="blanquearInput('TelefonoUsuario')"/>
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
                                    <input type="radio" name="suscrito" id="No_Suscribir" value="No_Suscribir"/>
                                    <label class="contInputRadio__label" for="No_Suscribir">No guardar</label>
                                </div>  
                                <div class="contInputRadio">
                                    <input type="radio" name="suscrito" id="Suscribir" value="Suscribir" checked/>
                                    <label class="contInputRadio__label" for="Suscribir">Guardar</label>
                                </div>  
                            </div>

                            <!-- CONFIRMACION DE USUARIO -->
                            <div class="contFlex--usuarios" id="ModalTipoUsuario">
                                <label class="boton boton--alto" id="No_Registrado" onclick="CerrarModal_X('ModalTipoUsuario', 'NombreUsuario')">Usuario no registrado</label>
                                <label class="boton boton--alto" id="Registrado" onclick="mostrar_cedula()">Usuario <br class="br_2">registrado</label>
                                 
                                <div class="ocultar" id="Mostrar_Cedula">
                                    <i class="fas fa-times spanCerrar_carrito" onclick="CerrarModal_X('ModalTipoUsuario', 'NombreUsuario')"></i>
                                    <input class="input_13 borde_1" type="text" id="Cedula_Usuario" placeholder="Nº Cedula (Solo números)" onblur="soloNumeros(this.value, 'Cedula_Usuario')"/>
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

                                // SELECCIONAR TRANSFERENCIA
                                if($Datos['Banco'] != Array()){ ?>                                
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="Transferencia" value="Transferencia" onclick="verPagoTransferencia()"/>
                                    <label class="contInputRadio__label" for="Transferencia">Transferencia bancaria</label>
                                </div>
                                    <?php
                                }   

                                // SELECCIONAR PAGOMOVIL
                                if($Datos['Pagomovil'] != Array()){ ?>                                
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="PagoMovil" value="PagoMovil" onclick="verPagoMovil()"/>
                                    <label class="contInputRadio__label" for="PagoMovil">Pago movil</label> 
                                </div>
                                    <?php
                                }    

                                // SELECCIONAR RESERVE
                                if($Datos['Reserve'] != Array()){ ?>                                
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="Reserve" value="Reserve" onclick="verPagoReserve()"/>
                                    <label class="contInputRadio__label" for="Reserve">Reserve</label> 
                                </div>
                                    <?php
                                }   

                                // SELECCIONAR PAYPAL
                                if($Datos['Paypal'] != Array()){ ?>                                
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="Paypal" value="Paypal" onclick="verPagoPaypal()"/>
                                    <label class="contInputRadio__label" for="Paypal">Paypal</label> 
                                </div>
                                    <?php
                                }   

                                // SELECCIONAR ZELLE
                                if($Datos['Zelle'] != Array()){ ?>                                
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="Zelle" value="Zelle" onclick="verPagoZelle()"/>
                                    <label class="contInputRadio__label" for="Zelle">Zelle</label> 
                                </div>
                                    <?php
                                }    
                                

                                // SELECCIONAR EFECTIVO BOLIVAR
                                if($Datos['OtrosPagos'][0]['efectivoBolivar']  != 0){ ?>
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="EfectivoBolivar" value="Efectivo_Bolivar" onclick="verPagoEfectivoBolivar()"/>
                                    <label class="contInputRadio__label" for="EfectivoBolivar">Pago destino (Bs.)</label> 
                                </div>
                                    <?php
                                }    

                                // SELECCIONAR DOLAR
                                if($Datos['OtrosPagos'][0]['efectivoDolar'] != 0){ ?>
                                <div class="contInputRadio">    
                                    <input type="radio" name="formaPago" id="EfectivoDolar" value="Efectivo_Dolar" onclick="verPagoEfectivoDolar()"/>
                                    <label class="contInputRadio__label" for="EfectivoDolar">Pago destino ($)</label> 
                                </div>
                                    <?php
                                }     
                                

                                // SELECCIONAR ACORADADO
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
                                <table class="tabla_2">
                                    <tbody>
                                        <?php                                        
                                        foreach($Datos['Banco'] as $row) :                                     
                                            $Banco = $row['bancoNombre'];
                                            $Cuenta = $row['bancoCuenta'];
                                            $Titular = $row['bancoTitular'];
                                            $Rif = $row['bancoRif']; ?>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Banco</td>
                                                <td class="tabla2__td2"><?php echo $Banco?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Titular</td>
                                                <td class="tabla2__td2"><?php echo $Titular?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Nº cuenta</td>
                                                <td class="tabla2__td2"><?php echo $Cuenta?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Cedula/RIF</td>
                                                <td class="tabla2__td2"><?php echo $Rif?></td>
                                            </tr class="tabla2__tr1">
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Monto</td>
                                                <td class="tabla2__td2"><input class="contInforPago--input" type="text" id="PagarTransferencia" readonly></td>
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
                                <table class="tabla_2">
                                    <tbody>
                                        <?php                                        
                                        foreach($Datos['Pagomovil'] as $row): 
                                            $Banco = $row['banco_pagomovil'];                                    
                                            $Cedula = $row['cedula_pagomovil'];
                                            $Telefono = $row['telefono_pagomovil']; ?>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Banco</td>
                                                <td class="tabla2__td2"><?php echo $Banco?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Cedula</td>
                                                <td class="tabla2__td2"><?php echo $Cedula?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Telefono</td>
                                                <td class="tabla2__td2"><?php echo $Telefono?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Monto</td>
                                                <td class="tabla2__td2"><input class="contInforPago--input" type="text" id="PagarPagoMovil" readonly></td>
                                            </tr class="tabla2__tr1">
                                            <tr>
                                                <td class="td_6"></td>
                                                <td></td>
                                            </tr>
                                            <tr class="tabla2__tr2"></tr>
                                            <?php 
                                        endforeach;   ?>
                                    </tbody>
                                </table>
                                
                                <h3 class="h3_2">Informe su pago.</h3>
                                                    
                                <!-- IMAGEN CAPTURE -->
                                <div class="contGeneral" id="CapturePagoMovil">
                                    <label class="boton boton--largo boton--centro" for="ImagenPagoMovil">Insertar capture</label>
                                    <input class="ocultar" type="file" name="imagenPagoMovil" id="ImagenPagoMovil" onchange="CapturePagoMovil()"/>
                                    <!-- <br class="br_1"> -->

                                    <!-- div que muestra la previsualización del capture-->
                                    <div class="contGeneralCentro" id="DivCapturePagoMovil"></div>
                                </div> 
                            </div>

                            <!-- RESERVE -->
                            <div class="contInforPago" id="Contenedor_60f">
                                <h3 class="h3_2">Reserve</h3>                                
                                <table class="tabla_2">
                                    <tbody>
                                        <?php                                        
                                        foreach($Datos['Reserve'] as $row): 
                                            $Usuario_Reserve = $row['usuarioReserve'];    ?>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Usuario</td>
                                                <td><?php echo $Usuario_Reserve?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Monto</td>
                                                <td><input class="contInforPago--input" type="text" id="PagarDolaresReserve" readonly></td>
                                            </tr>
                                            <?php 
                                        endforeach;   ?>
                                    </tbody>
                                </table>                                                     
                                <!-- IMAGEN CAPTURE -->                      
                                <h3 class="h3_2">Informe su pago.</h3>  
                                <div class="contGeneral" id="CapturePagoReserve">
                                    <label class="boton boton--largo boton--centro" for="ImagenPagoReserve">Insertar capture</label>
                                    <input class="ocultar" type="file" name="imagenPagoReserve" id="ImagenPagoReserve" onchange="CapturePagoReserve()"/>

                                    <!-- div que muestra la previsualización del capture-->
                                    <div class="contGeneralCentro" id="DivCapturePagoReserve"></div>
                                </div> 
                            </div>

                            <!-- PAYPAL -->
                            <div class="contInforPago" id="Contenedor_60g">
                                <h3 class="h3_2">Paypal</h3>                                
                                <table class="tabla_2">
                                    <tbody>
                                        <?php                                        
                                        foreach($Datos['Paypal'] as $row): 
                                            $Usuario_Paypal = $row['correo_paypal'];    ?>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Usuario</td>
                                                <td><?php echo $Usuario_Paypal?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Monto</td>
                                                <td><input class="contInforPago--input" type="text" id="PagarDolaresPaypal" readonly></td>
                                            </tr>
                                            <?php 
                                        endforeach;   ?>
                                    </tbody>
                                </table>      
 
                                <!-- IMAGEN CAPTURE -->                  
                                <h3 class="h3_2">Informe su pago.</h3>                                            
                                <div class="contGeneral" id="CapturePagoPaypal">
                                    <label class="boton boton--largo boton--centro" for="ImagenPagoPaypal">Insertar capture</label>
                                    <input class="ocultar" type="file" name="imagenPagoPaypal" id="ImagenPagoPaypal" onchange="CapturePagoPaypal()"/>

                                    <!-- div que muestra la previsualización del capture-->
                                    <div class="contGeneralCentro" id="DivCapturePagoPaypal"></div>
                                </div> 
                            </div>

                            <!-- ZELLE -->
                            <div class="contInforPago" id="Contenedor_60h">
                                <h3 class="h3_2">Zelle</h3>                                
                                <table class="tabla_2">
                                    <tbody>
                                        <?php                                        
                                        foreach($Datos['Zelle'] as $row): 
                                            $Usuario_Zelle = $row['correo_zelle'];    ?>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Usuario</td>
                                                <td><?php echo $Usuario_Zelle?></td>
                                            </tr>
                                            <tr class="tabla2__tr1">
                                                <td class="tabla2__td1">Monto</td>
                                                <td><input class="contInforPago--input" type="text" id="PagarDolaresZelle" readonly></td>
                                            </tr>
                                            <?php 
                                        endforeach;   ?>
                                    </tbody>
                                </table>                         
                                <!-- IMAGEN CAPTURE -->       
                                <h3 class="h3_2">Informe su pago.</h3>                                     
                                <div class="contGeneral" id="CapturePagoZelle">
                                    <label class="boton boton--largo boton--centro" for="ImagenPagoZelle">Insertar capture</label>
                                    <input class="ocultar" type="file" name="imagenPagoZelle" id="ImagenPagoZelle" onchange="CapturePagoZelle()"/>

                                    <!-- div que muestra la previsualización del capture-->
                                    <div class="contGeneralCentro" id="DivCapturePagoZelle"></div>
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

                                <label class="boton boton--alto" onclick="ocultarPedido()">Regresar a secciones</label>
                                <input class="boton boton--alto botonJS" type="submit" value="Comprar"/>
                            </div>
                    </div>
                </article> 
            </form>
        </div>
    </section>
</section>
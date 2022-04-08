<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    

    <section class="sectionModal">
        <span class="material-icons-outlined spanCerrar spanCerrar--fijo" onclick="ocultarPedido()">arrow_back</span>
        <div class="contenedor_24">

            <!-- DIV FLOTANTE ELIMINA LA ORDEN-->
            <div class="div_flotante">
                <!-- <span class="span_21 span_21_A borde_1"><i class="fas fa-times icono_4" ></i></span> -->
                <label id="Padre"><span class="material-icons-outlined cursor--pointer" id="Cerrar_js">cancel</span></label>

                <!-- Este input se utliza par pasar el Nro de orden que se desea elimar -->
                <input class="ocultar" id="EliminarOrden" value="<?php echo $Datos['NroOrden'];?>"/>
            </div>  

            <div class="contenedor_108" id="Contenedor_42">                  
                <div class="cont_clientesVen hover--off">
                    
                    <!-- RAZON SOCIAL -->
                    <div style="grid-column-start: 1; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon";>Razon social</label>
                        <label class="font--TituloTarjetaCliente"><?php echo $Datos['detallepedido_ven'][0]['nombre_AfiMin'];?></label>
                    </div> 
                    
                    <!-- NUMEO DE ORDEN O FACTURA-->
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <?php
                        if($Datos['pedido'][0]['factura'] == 'No Asignada'){    ?>
                            <label class="cont_clientesVen--renglon">Nº Orden</label>
                            <label><?php echo $Datos['NroOrden'];?></label>
                            <?php
                        }
                        else{   ?>
                            <label class="cont_clientesVen--renglon">Nº Factura</label>
                            <label><?php echo $Datos['pedido'][0]['factura'];?></label>
                            <?php
                        }   ?>
                    </div> 
                    
                    <!-- MONTO TOTAL -->
                    <div style="grid-column-start: 2; grid-column-end: 3; text-align: center">
                        <label class="cont_clientesVen--renglon">Total</label>
                        <label class="font--mono"><?php echo $Datos['montoGlobal'][0]['TotalGlobal'];?></label>
                    </div> 
                    
                    <!-- ORDENES CON DEUDA PARCIAL -->
                    <!-- <div style="grid-column-start: 3; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">deuda</label> 
                        <label class="font--mono"><?php echo str_replace('.', ',', $Datos['deuda_May']);?></label>
                    </div>  -->

                    <!-- FECHA DEL PEDIDO -->
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <label class="cont_clientesVen--renglon">F. pedido</label>
                        <label><?php echo $Datos['detallepedido_ven'][0]['FechaPedido'];?></label>
                    </div> 

                    <!-- HORA DEL PEDIDO -->
                    <div style="grid-column-start: 2; grid-column-end: 3;">
                        <label class="cont_clientesVen--renglon">H. pedido</label>
                        <label><?php echo $Datos['detallepedido_ven'][0]['HoraPedido'];?></label>
                    </div> 

                    <!-- FECHA DE DESPACHO -->
                    <!-- <div style="grid-column-start: 3; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">F. despacho</label>
                        <label><?php echo '12-12-12'?></label>
                    </div>  -->
                </div> 

                <br/>

                <!-- DETALLE DE PAGO -->                         
                <table class="tabla">   
                    <caption>Saldo abonado<a class="font--negro" style="float:right" href="<?php echo RUTA_URL . '/CuentaVendedor_C/agregarpagoVen/' . $Datos['NroOrden'] . '-' . $Datos['pedido'][0]['montoTotal']?>"><span class="material-icons-outlined">add_circle_outline</span></a></caption>   
                    <thead class="tabla--thead">
                        <th class="tabla--thead--column--1"></th>
                        <th class="">Fecha</th>
                        <th class=" ">Monto</th>
                        <th class="">Forma de pago</th>
                        <th class=""></th>
                    </thead>
                    <tbody class="">
                        <?php 
                        if($Datos['pagos'] != Array ()){ 
                            $Iterador = 1;
                            foreach($Datos['pagos'] as $row) :  ?>  
                                <tr class="tabla_inventario__tr"> 
                                    <td class="td_1"><?php echo $Iterador; ?></td>
                                    <td><?php echo $row['FechaAbono'];?></td>
                                    <td class="font--mono tabla--thead--column--3 td_1"><?php echo str_replace('.', ',', $row['abono']);?></td>
                                    <td class="td--left"><?php echo $row['formapago'];?></td> 
                                    <td><?php echo "O";?></td> 
                                </tr>
                                <tr class="tabla--tr_1"></tr>   <?php 
                                $Iterador ++;
                            endforeach; 
                        }
                        else{   ?>
                            <tr class="tabla_inventario__tr"> 
                                <td class="td--alerta tabla_inventario--tbody" colspan="7">Sin pagos registrados</td> 
                             </tr>
                                <?php
                        }
                        ?>
                    </tbody>
                </table> 

                <br/>
                <br/>

                <!-- DETALLE DEL PEDIDO -->  
                <table class="tabla">       
                    <caption>Detalle del pedido
                        <a class="font--negro" style="float:right" href="<?php echo RUTA_URL . '/CuentaVendedor_C/agregarProductoAPedido/' . $Datos['NroOrden']?>"><span class="material-icons-outlined">add_circle_outline</span></a>
                        
                        <span class="material-icons-outlined cursor--pointer" style="float:right; margin-right: 30px" onclick="ProductosEnPedido(<?php echo $Datos['NroOrden']?>)">remove_circle_outline</span>
                    </caption>      
                    <thead class="tabla--thead">
                        <th class="">Cant.</th>
                        <th class="tabla--thead--column--2">Producto</th>
                        <th class="">Precio</th>
                        <th class="">Total</th>
                    </thead>
                    <tbody class="">
                        <?php 
                        foreach($Datos['detallepedido_ven'] as $row) :  ?>  
                            <tr id="<?php echo $row['ID_DetallePedido_May']?>"> 
                                <td class="td_1"><?php echo $row['cantidad_May'];?></td>
                                <td class=""><?php echo $row['producto_May'];?></td>
                                <td class="font--mono"><?php echo $row['precio_May'];?></td>
                                <td class="font--mono"><?php echo $row['total_May'];?></td>
                            </tr> 
                            <tr class="tabla--tr_1"></tr>
                            <?php 
                        endforeach; 
                        ?>
                    </tbody>
                </table>
                    
                <!-- BOTONES -->
                <article>
                    <div class="contBoton">
                        <a class="boton boton--corto" href="<?php echo RUTA_URL . '/CuentaVendedor_C/asignarNroFactura/' . $Datos['NroOrden']?>">Facturar</a>    
                    </div>
                </article>
            </div> 
        </div>
    </section>

        
    <?php
// }
// else{ 
//     header('location: ' . RUTA_URL . '/CerrarS_C');
// }
    ?>
<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    
    <section class="sectionModal">
        <i class="fas fa-arrow-left spanCerrar spanCerrar--fijo" onclick="ocultarPedido()"></i>
        <div class="contenedor_24">
            <div class="contenedor_108" id="Contenedor_42">                  
                <div class="cont_clientesVen hover--off">
                    <div style="grid-column-start: 1; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon";>Razon social</label>
                        <label class="font--TituloTarjetaCliente"><?php echo $Datos['detallepedido_ven'][0]['nombre_AfiMin'];?></label>
                    </div> 
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
                    <div style="grid-column-start: 2; grid-column-end: 3; text-align: center">
                        <label class="cont_clientesVen--renglon">Total</label>
                        <label class="font--mono"><?php echo $Datos['pedido'][0]['montoTotal'];?></label>
                    </div> 
                    <div style="grid-column-start: 3; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">deuda</label> 
                        <label class="font--mono"><?php echo str_replace('.', ',', $Datos['deuda_May']);?></label>
                    </div> 
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <label class="cont_clientesVen--renglon">F. pedido</label>
                        <label><?php echo $Datos['detallepedido_ven'][0]['FechaPedido'];?></label>
                    </div> 
                    <div style="grid-column-start: 2; grid-column-end: 3;">
                        <label class="cont_clientesVen--renglon">H. pedido</label>
                        <label><?php echo $Datos['detallepedido_ven'][0]['HoraPedido'];?></label>
                    </div> 
                    <div style="grid-column-start: 3; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">F. despacho</label>
                        <label><?php echo '12-12-12'?></label>
                    </div> 
                </div> 

                <br/>

                <!-- DETALLE DE PAGO -->                         
                <table class="tabla_inventario">   
                    <caption>Saldo abonado<a class="" style="float:right" href="<?php echo RUTA_URL . '/CuentaVendedor_C/agregarpagoVen/' . $Datos['NroOrden'] . '-' . $Datos['pedido'][0]['montoTotal']?>">Agregar</a></caption>   
                    <thead class="tabla_inventario--thead">
                        <th class="th--n"></th>
                        <th class="">F. Pago</th>
                        <th class=" ">Monto</th>
                        <th class="">Metodo de pago</th>
                        <th class=""></th>
                    </thead>
                    <tbody class="tabla_inventario--tbody">
                        <?php 
                        if($Datos['pagos'] != Array ()){ 
                            $Iterador = 1;
                            foreach($Datos['pagos'] as $row) :  ?>  
                                <tr class="tabla_inventario__tr"> 
                                    <td class=""><?php echo $Iterador; ?></td>
                                    <td><?php echo $row['fechaabono'];?></td>
                                    <td class="font--mono"><?php echo str_replace('.', ',', $row['abono']);?></td>
                                    <td><?php echo $row['formapago'];?></td> 
                                    <td><?php echo "O";?></td> 
                                </tr><?php 
                                $Iterador ++;
                            endforeach; 
                        }
                        else{   ?>
                            <tr class="tabla_inventario__tr"> 
                                <td class="td--alerta" colspan="7">Sin pagos registrados</td> 
                             </tr>
                                <?php
                        }
                        ?>
                    </tbody>
                </table> 

                <br/>
                <br/>

                <!-- DETALLE DEL PEDIDO -->        
                <table class="tabla_inventario">       
                    <caption>Detalle del pedido<a class="" style="float:right" href="<?php echo RUTA_URL . '/CuentaVendedor_C/agregarProductoAPedido/' . $Datos['NroOrden'] ?>">Agregar</a></caption>    
                    <thead class="tabla_inventario--thead">
                        <th class="">Cant.</th>
                        <th class="">Producto</th>
                        <th class="">Precio ud</th>
                        <th class="">Total</th>
                    </thead>
                    <tbody class="tabla_inventario--tbody">
                        <?php 
                        foreach($Datos['detallepedido_ven'] as $row) :  ?>  
                            <tr class=""> 
                                <td><?php echo $row['cantidad_May'];?></td>
                                <td><?php echo $row['producto_May'];?></td>
                                <td class="font--mono"><?php echo $row['precio_May'];?></td>
                                <td class="font--mono"><?php echo $row['total_May'];?></td>
                            </tr> 
                            <?php 
                        endforeach; 
                        ?>
                    </tbody>
                </table>
                    
                <!-- BOTONES -->
                <article>
                    <div class="contBoton">
                        <a class="boton boton--corto" href="<?php echo RUTA_URL . '/CuentaVendedor_C/asignarNroFactura/' . $Datos['NroOrden']?>">Editar</a>                        
                        <label class="boton boton--corto">Enviar</label>
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
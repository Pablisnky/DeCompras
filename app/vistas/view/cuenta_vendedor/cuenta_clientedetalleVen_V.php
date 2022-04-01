<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    
    <section class="sectionModal">
        <i class="fas fa-arrow-left spanCerrar spanCerrar--fijo" onclick="ocultarPedido()"></i>
        <div class="contenedor_24">
            <div class="cont_clientesVen borde_1">
                <!-- <div class="contenedor_42 contenedor_108"">  
                    <span class="span_21 borde_1" style="background-color: var(--Aciertos);"><i class="fas fa-check"></i></span>
                </div> -->
                <div style="grid-column-start: 1; grid-column-end: 4;">
                    <label class="cont_clientesVen--renglon">Razon social</label>
                    <label class="font--TituloTarjetaCliente"><?php echo $Datos['cliente'][0]['nombre_AfiMin'];?></label>
                </div> 
                <div style="grid-column-start: 1; grid-column-end: 2;">
                    <label class="cont_clientesVen--renglon">RIF</label>
                    <label><?php echo $Datos['cliente'][0]['rif_AfiMin'];?></label>
                </div> 
                <div style="grid-column-start: 2; grid-column-end: 3;">
                    <label class="cont_clientesVen--renglon">Telefono</label>
                    <label><?php echo $Datos['cliente'][0]['telefono_AfiMin'];?></label>
                </div> 
                <div style="grid-column-start: 3; grid-column-end: 4;">
                    <label class="cont_clientesVen--renglon">Fecha registro</label>
                    <label><?php echo $Datos['cliente'][0]['Fecha_Afiliacion'];?></label>
                </div> 
                <div style="grid-column-start: 1; grid-column-end: 4;">
                    <label class="cont_clientesVen--renglon">Correo</label>
                    <label><?php echo $Datos['cliente'][0]['correo_AfiMin'];?></label>
                </div> 
                <div style="grid-column-start: 1; grid-column-end: 4;">
                    <label class="cont_clientesVen--renglon">Direccion</label>
                    <label><?php echo $Datos['cliente'][0]['direccion_AfiMin'];?></label>
                </div> 
            </div>

            <!-- <br/> -->

            <!-- <div class="Contenedor--centrado">   
                <label>Deuda Pendiente</label>
                <br/>       
                <p class="bandaAlerta">0 $</p> 
            </div> -->

            <br/><br/>
            
            <!-- LISTADO DE PEDIDOS FACTURADOS -->        
            <table class="tabla_inventario">            
                <caption class="caption--general">Pedidos facturados pendientes</caption>
                <thead class="tabla--thead">
                    <th class="th--n"></th>
                    <th class="th_5">Factura</th>
                    <th class="th_5">Monto</th>
                    <th class="th_5">Fecha</th>
                </thead>
                <tbody class="tabla_inventario--tbody">
                    <?php 
                    if($Datos['pedido'] != Array()){
                        $Iterador = 1;
                        foreach($Datos['pedido'] as $row) :  
                            if($row['factura'] != 'No Asignada'){   ?>
                                <tr class="tabla_inventario__tr"> 
                                    <td class="td--center"><?php echo $Iterador; ?></td>
                                    <td><?php echo $row['factura'];?></td>
                                    <td><?php echo $row['montoTotal'];?></td> 
                                    <td><?php echo $row['FechaPedido'];?></td>
                                </tr> <?php 
                            $Iterador ++;
                            }
                        endforeach; 
                    }
                    else{   ?>
                        <tr class="tabla_inventario__tr"> 
                            <td class="td--alerta" colspan="7">Sin pedidos facturados</td> 
                         </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table> 

            <br/><br/>

            <!-- LISTADO DE PEDIDOS POR DESPACHAR-->        
            <table class="tabla_inventario">            
                <caption class="caption--general">Pedidos por despachar</caption>
                <thead class="tabla--thead">
                    <th class="th--n"></th>
                    <th class="th_5">Nro. Orden</th>
                    <th class="th_5">Monto</th>
                    <th class="th_5">Fecha</th>
                </thead>
                <tbody class="tabla_inventario--tbody">
                    <?php 
                    if($Datos['pedido'] != Array()){
                        $Iterador = 1;
                        foreach($Datos['pedido'] as $row) : 
                            if($row['factura'] == 'No Asignada'){ ?>
                                <tr class="tabla_inventario__tr"> 
                                    <td class="td--center"><?php echo $Iterador; ?></td>
                                    <td><?php echo $row['numeroorden_May'];?></td>
                                    <td><?php echo $row['montoTotal'];?></td>
                                    <td><?php echo $row['FechaPedido'];?></td> 
                                </tr> 
                                     <?php 
                                $Iterador ++;
                            }  
                        endforeach; 
                    }
                    else{   ?>
                        <tr class="tabla_inventario__tr"> 
                            <td class="td--alerta" colspan="7">Sin pedidos por despachar</td> 
                         </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table> 
        </div>
    </section>

        
    <?php
// }
// else{ 
//     header('location: ' . RUTA_URL . '/CerrarS_C');
// }
    ?>
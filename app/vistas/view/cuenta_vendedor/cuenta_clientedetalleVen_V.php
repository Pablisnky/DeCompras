<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    
    <section class="sectionModal">
        <i class="fas fa-arrow-left spanCerrar spanCerrar--fijo" onclick="ocultarPedido()"></i>
        <div class="contenedor_24">

            <div class="cont_clientesVen borde_1">
                <div class="contenedor_42 contenedor_108"">  
                    <span class="span_21 borde_1" style="background-color: var(--Aciertos);"><i class="fas fa-check"></i></span>
                </div>
                <div style="grid-column-start: 1; grid-column-end: 4;">
                    <label class="cont_clientesVen--renglon">Razon social</label>
                    <label class="font--TituloTarjetaCliente">asdasd asdasd asdasda</label>
                </div> 
                <div style="grid-column-start: 1; grid-column-end: 2;">
                    <label class="cont_clientesVen--renglon">RIF</label>
                    <label>23423423423</label>
                </div> 
                <div style="grid-column-start: 2; grid-column-end: 3;">
                    <label class="cont_clientesVen--renglon">Fecha registro</label>
                    <label>22-22-2222</label>
                </div> 
                <div style="grid-column-start: 1; grid-column-end: 2;">
                    <label class="cont_clientesVen--renglon">Telefono</label>
                    <label>23423423423</label>
                </div> 
                <div style="grid-column-start: 2; grid-column-end: 4;">
                    <label class="cont_clientesVen--renglon">Direccion</label>
                    <label>Calle 15 entreAvs. 11 y 12 </label>
                </div> 
            </div>
            <label>Deuda Pendiente</label><br/>            
            <p class="bandaAlerta">40 $</p>

            <!-- LISTADO DE PEDIDOS FACTURADOS -->        
            <table class="tabla_inventario">            
                <caption>Pedidos facturados pendientes</caption>
                <thead class="tabla_inventario--thead">
                    <th class="th--n"></th>
                    <th class="th_5">Nro. Orden</th>
                    <th class="th_5">Monto</th>
                    <th class="th_5">Fecha</th>
                    <th class="th_5">Hora</th>
                </thead>
                <tbody class="tabla_inventario--tbody">
                    <?php 
                    $Iterador = 1;
                    foreach($Datos['detallecliente'] as $row) :  ?>
                    <tr class="tabla_inventario__tr"> 
                        <td class="td--center"><?php echo $Iterador; ?></td>
                        <td><?php echo $row['nombre_AfiMin'];?></td>
                        <td><?php echo $row['rif_AfiMin'];?></td>
                        <td><?php echo $row['telefono_AfiMin'];?></td> 
                        <td><?php echo $row['correo_AfiMin'];?></td>
                        <td class="font--mono"><?php echo $row['direccion_AfiMin'];?></td>
                        <td class="font--mono"><?php echo $row['codigodespacho'];?></td>
                    </tr> <?php 
                    $Iterador ++;
                    endforeach; 
                    ?>
                </tbody>
            </table> 
            
            <!-- LISTADO DE PEDIDOS POR DESPACHAR-->        
            <table class="tabla_inventario">            
                <caption>Pedidos por despachar</caption>
                <thead class="tabla_inventario--thead">
                    <th class="th--n"></th>
                    <th class="th_5">Nro. Orden</th>
                    <th class="th_5">Monto</th>
                    <th class="th_5">Fecha</th>
                    <th class="th_5">Hora</th>
                </thead>
                <tbody class="tabla_inventario--tbody">
                    <?php 
                    $Iterador = 1;
                    foreach($Datos['detallecliente'] as $row) :  ?>
                    <tr class="tabla_inventario__tr"> 
                        <td class="td--center"><?php echo $Iterador; ?></td>
                        <td><?php echo $row['nombre_AfiMin'];?></td>
                        <td><?php echo $row['rif_AfiMin'];?></td>
                        <td><?php echo $row['telefono_AfiMin'];?></td> 
                        <td><?php echo $row['correo_AfiMin'];?></td>
                        <td class="font--mono"><?php echo $row['direccion_AfiMin'];?></td>
                        <td class="font--mono"><?php echo $row['codigodespacho'];?></td>
                    </tr> <?php 
                    $Iterador ++;
                    endforeach; 
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
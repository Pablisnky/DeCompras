<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    
    <section class="sectionModal">
        <i class="fas fa-arrow-left spanCerrar spanCerrar--fijo" onclick="ocultarPedido()"></i>
        <div class="contenedor_24">
            <div class="contenedor_42 contenedor_108" id="Contenedor_42">  

                <label>Razon social</label><br/>
                <label>Rif</label><br/>
                <label>Vendedor</label><br/>
                <!-- LISTADO DE PEDIDOS -->        
                <table class="tabla_inventario">            
                    <caption>Pedidos pendientes</caption>
                    <thead class="tabla_inventario--thead">
                        <th class="th--n"></th>
                        <th class="th_11">Nro. Orden</th>
                        <th class="th_11">Monto</th>
                        <th class="th_11">Fecha</th>
                        <th class="th_11">Hora</th>
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
                <label>Deuda Pendiente</label><br/>
                <label>Forma de pago</label><br/>
                <label>Imprimir</label><br/>
                    
                <!-- MENU INDICE -->
                <!-- <section>  
                    <div class="contenedor_83 borde_1">
                        <a class="marcador" href="#marcador_01">Por entregar</a>
                        <a class="marcador" href="#marcador_02">Despachados</a>
                        <a class="marcador" href="#Categoria">Todos</a>
                    </div>
                </section>  -->
            </div>
        </div>
    </section>

        
    <?php
// }
// else{ 
//     header('location: ' . RUTA_URL . '/CerrarS_C');
// }
    ?>
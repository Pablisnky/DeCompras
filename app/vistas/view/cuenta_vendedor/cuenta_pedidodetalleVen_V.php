<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    
    <section class="sectionModal">
        <i class="fas fa-arrow-left spanCerrar spanCerrar--fijo" onclick="ocultarPedido()"></i>
        <div class="contenedor_24">
            <div class="contenedor_42 contenedor_108" id="Contenedor_42">                  
                <div class="cont_clientesVen ">
                    <div style="grid-column-start: 1; grid-column-end: 3;">
                        <label class="cont_clientesVen--renglon">Razon social</label>
                        <!-- <label class="font--TituloTarjetaCliente"><?php echo $row['nombre_AfiMin'];?></label> -->
                    </div> 
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <label class="cont_clientesVen--renglon">Nº Orden</label>
                        <!-- <label><?php echo $row['numeroorden_May'];?></label> -->
                    </div> 
                    <div style="grid-column-start: 2; grid-column-end: 3;">
                        <label class="cont_clientesVen--renglon">Total</label>
                        <!-- <label><?php echo $row['montoTotal'];?></label> -->
                    </div> 
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <label class="cont_clientesVen--renglon">Fecha</label>
                        <!-- <label><?php echo $row['fecha'];?></label> -->
                    </div> 
                    <div style="grid-column-start: 2; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">Hora</label>
                        <!-- <label><?php echo $row['hora'];?></label> -->
                    </div> 
                    <div class="">
                        <label class="cont_clientesVen--renglon">Rif</label>
                        <label></label>
                    </div> 
                </div>

                <!-- LISTADO DE PEDIDOS -->        
                <table class="tabla_inventario">      
                    <thead class="tabla_inventario--thead">
                        <th class="th--n"></th>
                        <th class="th_11">Proveedor</th>
                        <th class="th_11">Producto</th>
                        <th class="th_11">Detalle</th>
                        <th class="th_11">Cantidad</th>
                        <th class="th_11">Precio</th>
                        <th class="th_11">Total</th>
                    </thead>
                    <tbody class="tabla_inventario--tbody">
                        <?php 
                        $Iterador = 1;
                        foreach($Datos['detallepedido_ven'] as $row) :  ?>
                        <tr class="tabla_inventario__tr"> 
                            <td class="td--center"><?php echo $Iterador; ?></td>
                            <td><?php echo $row['seccion_May'];?></td>
                            <td><?php echo $row['producto_May'];?></td>
                            <td><?php echo $row['opcion_May'];?></td> 
                            <td><?php echo $row['cantidad_May'];?></td>
                            <td class="font--mono"><?php echo $row['precio_May'];?></td>
                            <td class="font--mono"><?php echo $row['total_May'];?></td>
                        </tr> <?php 
                        $Iterador ++;
                        endforeach; 
                        ?>
                    </tbody>
                </table> 
                <label>Deuda Pendiente</label><br/>
                <label>Imprimir</label><br/>
                <label>Forma de pago</label>
                
                <!-- BOTONES -->
                <article>
                    <div class="contBoton">
                        <label class="boton boton--corto">Editar</label>                        
                        <label class="boton boton--corto">Enviar</label>
                    </div>
                </article>
                    
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
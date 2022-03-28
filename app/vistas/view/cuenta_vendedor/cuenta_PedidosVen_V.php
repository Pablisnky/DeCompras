<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  

        <!-- LISTADO DE PEDIDOS -->       
        <p class="font--titulo">Mis pedidos</p>
                <?php
        if($Datos['pedidos_ven'] != Array ()){ 
            foreach($Datos['pedidos_ven'] as $row)  : 
                $Nro_Orden = $row['numeroorden_May'];   ?>

                    <!-- INDICADOR DE DEUDA  -->
                <div class="contenedor_106--pedidos">
                    <?php
                    // PEDIDO FACTURADO Y EN PERIODO DE GANAR COMISION
                    if($row['factura'] != 'No Asignada' && $row['pagado'] == 0){  
                        foreach($Datos['dias'] as $Key) : 
                            if($Key['factura'] == $row['factura']){    ?>
                                <span class="span_21 borde_1" style="background-color: var(--Aciertos);"><i class="fas fa-check"></i></span> 
                                <span class="span_21 span_22 borde_1"><?php echo $Key['dias'];?></span>
                                <?php 
                            }
                        endforeach;
                    }
                    // PEDIDO FACTURADO Y PAGADO
                    else if($row['pagado'] == 1){  ?>
                        <span class="span_21 borde_1" style="background-color: var(--Aciertos);"><i class="fas fa-check-double"></i></span>
                        <?php
                    }
                    // PEDIDO SIN FACTURAR
                    else if($row['factura'] == 'No Asignada') {  ?>
                           <span class="span_21 borde_1" style="background-color:;"><i class="far fa-clock"></i></span>
                        <?php
                    }
                    // PEDIDO FACTURADO Y QUE HA PERDIDO LA GANANCIA POR COMISION
                    else{   ?>
                        <span class="span_21 borde_1" style="background-color: yellow;"><i class="fas fa-times"></i></span>
                        <?php 
                    }   ?>
                </div>

                <div class="cont_clientesVen borde_1" onclick="Llamar_pedidosVen('<?php echo $Nro_Orden;?>')">
                    <div style="grid-column-start: 1; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">Razon social</label>
                        <label class="font--TituloTarjetaCliente"><?php echo $row['nombre_AfiMin'];?></label>
                    </div> 
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <?php
                        if($row['factura'] == 'No Asignada'){    ?>
                                <label class="cont_clientesVen--renglon">Nº Orden</label>
                                <label><?php echo $row['numeroorden_May'];?></label>
                            <?php
                        }
                        else{  ?>
                                <label class="cont_clientesVen--renglon">Factura</label>
                                <label><?php echo $row['factura'];?></label><?php
                        }   ?>
                    </div> 
                    <div style="grid-column-start: 2; grid-column-end: 3; text-align: center">
                        <label class="cont_clientesVen--renglon">Total</label>
                        <label><?php echo $row['montoTotal'];?> $</label>
                    </div> 
                         <?php                    
                        //  ORDENES CON DEUDA PARCIAL
                        foreach($Datos['deuda'] as $Key)  : 
                            if($row['numeroorden_May'] == $Key['numeroordenMay']){ ?>
                                <div style="grid-column-start:3 ; grid-column-end: 4;">
                                    <label class="cont_clientesVen--renglon">Deuda</label>
                                    <label><?php echo $Key['deuda'];?> $</label>
                                </div> 
                                <?php
                            } 
                        endforeach; 
                                  
                        // ORDENES CON DEUDA TOTAL
                        foreach($Datos['ordenesSinAbono'] as $Key)  : 
                            if($row['numeroorden_May'] == $Key){ ?>
                                <div style="grid-column-start:3 ; grid-column-end: 4;">
                                    <label class="cont_clientesVen--renglon">Deuda</label>
                                    <label><?php echo $row['montoTotal'];?> $</label>
                                </div> 
                                <?php
                            }
                        endforeach; 
                            ?>
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <label class="cont_clientesVen--renglon">Fecha</label>
                        <label><?php echo $row['FechaPedido'];?></label>
                    </div> 
                    <div style="grid-column-start: 2; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">Hora</label>
                        <label><?php echo $row['HoraPedido'];?></label>
                    </div> 
                </div>
                <?php
            endforeach; 
        }  
        else{   ?>
                <p class="bandaAlerta">Sin pedidos registrados</p>
            <?php
        }   ?>
    </div>

    <!--div alimentado via Ajax por medio de la funcion Llamar_pedidosVen() alimentado por el archivo cuenta_pedidsdetalleVen_V.php-->
    <div id="Mostrar_detallepedidosVen"></div>


    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_pedidosVen.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_pedidosVen.js?v=' . rand();?>"></script> 
        
    <?php include(RUTA_APP . '/vistas/footer/footer.php');
// }
// else{ 
//     header('location: ' . RUTA_URL . '/CerrarS_C');
// }
    ?>
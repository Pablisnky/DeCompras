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
                <div class="cont_clientesVen borde_1" id="<?php echo $Nro_Orden;?>" onclick="Llamar_pedidosVen('<?php echo $Nro_Orden;?>')">

                    <?php
                    // // PEDIDO FACTURADO Y PAGADO
                    // else if($row['pagado'] == 1){  ?>
                         <!-- <span class="span_21 borde_1" style="background-color: var(--Aciertos);"><i class="fas fa-check-double"></i></span> -->
                     <?php      
                                
                    // }
                    // // PEDIDO FACTURADO Y QUE HA PERDIDO LA GANANCIA POR COMISION
                    // else{   ?>
                     <!-- <span class="span_21 borde_1" style="background-color: yellow;"><i class="fas fa-times"></i></span> -->
                        <?php 
                    // }   ?>

                    <!-- RAZON SOCIAL -->
                    <div style="grid-column-start: 1; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">Razon social</label>
                        <label class="font--TituloTarjetaCliente"><?php echo $row['nombre_AfiMin'];?></label>
                    </div> 

                    <!-- NUMEO DE ORDEN O FACTURA-->
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

                    <!-- MONTO TOTAL -->
                    <?php
                    foreach($Datos['montoGlobal'] as $Clave_1)  :  
                        foreach($Clave_1 as $Clave_2)  :  
                            if($row['numeroorden_May'] == $Clave_2['numeroorden_May']){  ?>
                                <div style="grid-column-start: 2; grid-column-end: 3; text-align: center">
                                    <label class="cont_clientesVen--renglon">Total</label>
                                    <label><?php echo $Clave_2['TotalGlobal'];?> $</label>
                                </div> 
                                <?php
                            }
                        endforeach;
                    endforeach;
                        ?>
                    
                    <!-- ORDENES CON DEUDA PARCIAL -->
                         <?php                    
                        // foreach($Datos['deuda'] as $Key)  : 
                        //     if($row['numeroorden_May'] == $Key['numeroordenMay']){ ?>
                                <!-- <div style="grid-column-start:3 ; grid-column-end: 4;"> -->
                                    <!-- <label class="cont_clientesVen--renglon">Deuda</label>
                                    <label><?php echo $Key['deuda'];?> $</label> -->
                                <!-- </div>  -->
                                <?php
                        //     } 
                        // endforeach; 
                                  
                        // ORDENES CON DEUDA TOTAL
                        // foreach($Datos['ordenesSinAbono'] as $Key)  : 
                        //     if($row['numeroorden_May'] == $Key){ ?>
                                <!-- <div style="grid-column-start:3 ; grid-column-end: 4;">
                                    <label class="cont_clientesVen--renglon">Deuda</label>
                                    <label><?php echo $row['montoTotal'];?> $</label>
                                </div>  -->
                                <?php
                        //     }
                        // endforeach; 
                            ?>

                    <!-- FECHA DEL PEDIDO -->
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <label class="cont_clientesVen--renglon">Fecha</label>
                        <label><?php echo $row['FechaPedido'];?></label>
                    </div> 

                    <!-- HORA DEL PEDIDO -->
                    <div style="grid-column-start: 2; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">Hora</label>
                        <label><?php echo $row['HoraPedido'];?></label>
                    </div>  

                    <!-- INDICADOR DE DEUDA  -->
                    <div style="background-color: ;grid-column-start: 1; grid-column-end: 4; position: relative; bottom: 140%">
                        <?php
                        // PEDIDO SIN FACTURAR
                        if($row['factura'] == 'No Asignada') {  ?>
                            <span class="material-icons-outlined span_21">schedule</span>
                            <?php
                        }
                            // PEDIDO FACTURADO Y EN PERIODO DE GANAR COMISION
                        else if($row['factura'] != 'No Asignada' && $row['pagado'] == 0){                          
                            foreach($Datos['dias'] as $Key) : 
                                if($row['factura'] == $Key['factura']){    ?>
                                    <div class="contenedor_106--pedidos">
                                        <span class="material-icons-outlined span_21 span_21_A" style="background-color: var(--Aciertos);">check_circle</span>
                                        <span class="span_21 span_21_A borde_1"><?php echo $Key['dias'];?></span>
                                    </div>  
                                        <?php 
                                }
                            endforeach;
                        }   ?>
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
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
                <!-- INDICADOR DE DEUDA       background-color: var(--Fallos); -->
                <div class="contenedor_106--pedidos">
                    <?php
                    // PEDIDO FACTURADO Y EN PERIODO DE GANAR COMISION
                    if($row['factura'] != 'No Asignada' && $row['pagado'] == 0){    ?>
                        <span class="span_21 borde_1" style="background-color: var(--Aciertos);"><i class="fas fa-check"></i></span> <?php 
                    }
                    // PEDIDO FACTURADO Y PAGADO
                    else if($row['pagado'] == 1){  ?>
                        <span class="span_21 borde_1" style="background-color: var(--Aciertos);"><i class="fas fa-check-double"></i></span>
                        <?php
                    }
                    // PEDIDO SIN FACTURAR
                    else if($row['factura'] == 'No Asignada') {  ?>
                           <span class="span_21 borde_1" style="background-color:;"><i class="far fa-clock icono_1"></i></span>
                        <?php
                    }
                    // PEDIDO FACTURADO Y QUE HA PERDIDO LA GANANCIA POR COMISION
                    else{   ?>
                        <span class="span_21 borde_1" style="background-color: var(--Fallos);"><i class="fas fa-times"></i></span>
                        <?php 
                    }   ?>
                </div>
                <div class="cont_clientesVen borde_1" onclick="Llamar_pedidosVen('<?php echo $Nro_Orden;?>')">
                    <div style="grid-column-start: 1; grid-column-end: 3;">
                        <label class="cont_clientesVen--renglon">Razon social</label>
                        <label class="font--TituloTarjetaCliente"><?php echo $row['nombre_AfiMin'];?></label>
                    </div> 
                        <?php
                        if($row['factura'] == 'No Asignada'){    ?>
                            <div style="grid-column-start: 1; grid-column-end: 3;">
                                <label class="cont_clientesVen--renglon">Orden despacho</label>
                                <label><?php echo $row['numeroorden_May'];?></label>
                            </div> <?php
                        }
                        else{  ?>
                            <div style="grid-column-start: 1; grid-column-end: 3;">
                                <label class="cont_clientesVen--renglon">Factura</label>
                                <label><?php echo $row['factura'];?></label>
                            </div> <?php
                        }   ?>
                    <div style="grid-column-start: 3; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">Total</label>
                        <label><?php echo $row['montoTotal'];?></label>
                    </div> 
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <label class="cont_clientesVen--renglon">Fecha</label>
                        <label><?php echo $row['fecha'];?></label>
                    </div> 
                    <div style="grid-column-start: 2; grid-column-end: 4;">
                        <label class="cont_clientesVen--renglon">Hora</label>
                        <label><?php echo $row['hora'];?></label>
                    </div> 
                    <div class="ocultar-movil">
                        <label class="cont_clientesVen--renglon">Dirección</label>
                        <label>Calle 25 entre Avs. 5 y 6</label>
                    </div> 
                </div>
                <?php
            endforeach; 
        }  
        else{   ?>
                <label class="td--alerta" colspan="7">Sin pedidos registrados</label>
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
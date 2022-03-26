<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  

    // $ID_Tienda = $_SESSION["ID_Tienda"];
    ?>    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  

        <!-- LISTADO DE PEDIDOS -->       
        <p class="font--titulo">Cuentas por cobrar</p>
                <?php
        if($Datos['pedidos_ven'] != Array ()){ 
            foreach($Datos['pedidos_ven'] as $row)  : 
                $Nro_Orden = $row['numeroorden_May'];   ?>
                <div class="cont_clientesVen borde_1" onclick="Llamar_pedidosVen(<?php echo $Nro_Orden;?>)">

                    <!-- INDICADOR DE DEUDA       background-color: var(--Fallos); -->
                    <!-- <div class="contenedor_106--pedidos">
                        <span class="span_21 borde_1" style="background-color: var(--Aciertos);">q</span>
                    </div> -->

                    <div style="grid-column-start: 1; grid-column-end: 3;">
                        <label class="cont_clientesVen--renglon">Razon social</label>
                        <label class="font--TituloTarjetaCliente"><?php echo $row['nombre_AfiMin'];?></label>
                    </div> 
                    <div style="grid-column-start: 1; grid-column-end: 2;">
                        <label class="cont_clientesVen--renglon">Nº Orden</label>
                        <label><?php echo $row['numeroorden_May'];?></label>
                    </div> 
                    <div style="grid-column-start: 2; grid-column-end: 3;">
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

                </div><?php
            endforeach; 
        }  
        else{   ?>
                <p class="bandaAlerta">Sin cuentas por cobrar.</p>
            <?php
        }   ?>
            
        <!-- MENU INDICE -->
        <!-- <section>  
            <div class="contenedor_83 borde_1">
                <a class="marcador" href="#marcador_01">Por entregar</a>
                <a class="marcador" href="#marcador_02">Despachados</a>
                <a class="marcador" href="#Categoria">Todos</a>
            </div>
        </section>  -->
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
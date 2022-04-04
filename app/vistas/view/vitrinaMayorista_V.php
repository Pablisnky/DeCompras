<div class="section_5">	
    <!-- IMAGEN DE MAYORISTA SOLO MOSTRADO EN MOVILES -->
    <?php                    
    if($Datos['fotoMayorista'] == 'tienda.png'){    ?> 
        <div class="contenedor_109 contenedor_109--imgDefecto contenedor_109--mayorista" style="background-image: url('<?php //echo RUTA_URL?>/public/images/tiendas/tienda.png');"></div>  
        <?php
    } 
    else{ ?>
        <div class="contenedor_109 contenedor_109--mayorista" style="background-image: url('<?php echo RUTA_URL?>/public/images/mayorista/Don_Rigo/Portada.jpg"></div>  
        <?php
    }   ?>

    <div class="contenedor_156"> 
        <div>
            <aside class="aside_1">
                <p class="p_17 borde_1">SECCIONES</p>
            </aside>
        </div>
        <div class="contenedor_110" id="Section_4">
            <?php
            $Contador = 1;
            //Se cargan todas las secciones de productos que tenga un mayorista
            foreach($Datos['categoriaMayorista'] as $row) :
                $Seccion = $row['seccionMay'];     
                $ID_Seccion = $row['ID_SeccionMay']; 
                $ID_Mayorista = $row['ID_Mayorista'];   
                ?> 
                <div class='contenedor_11' id="<?php echo 'Cont_Seccion_' . $Contador;?>">
                    <div class="contenedor_11a" id="<?php echo 'Cont_imagen_' . $Contador;?>" onclick="verOpcionesMayorista('<?php echo 'Cont_Seccion_' . $Contador;?>','<?php echo $Seccion;?>'); llamar_OpcionesMayorista('<?php echo $ID_Mayorista;?>','<?php echo $ID_Seccion;?>')">  
                        <?php

                        // IMAGEN DE SECCION
                        if($row['nombre_img_seccionMay'] == ''){ ?>
                            <div class="contenedor_9" style="background-image: url('<?php echo RUTA_URL?>/public/images/mayorista/Don_Rigo/imagen.png');">
                            </div> <?php
                        }   
                        else{    ?>
                            <div class="contenedor_9" style="background-image: url('<?php echo RUTA_URL?>/public/images/mayorista/Don_Rigo/secciones/<?php echo $row['nombre_img_seccionMay']?>');">
                            </div>  <?php
                        } ;  

                        $SeccionExiste = '';
                        ?>

                        <!-- NOMBRE DE SECCION -->
                        <h2 class="boton botonReverso borde_1 boton--largo font--subTitulo"><?php echo $Seccion;?></h2>
                        
                        <!-- CIRCULO QUE INDICA CANTIDAD DE PRODUCTOS EN IMAGEN DE SECCION -->
                       <!--  <div class="contenedor_106--lineal">
                            <span class="span_21 borde_1">
                                <?php 
                                // foreach($Datos['cant_productosSeccion'] as $Key):
                                //     if($Key['ID_Seccion'] == $ID_Seccion && $Key['CantidadPro'] > 0):
                                //         echo $Key['CantidadPro']; 
                                //     endif;
                                // endforeach;
                                // if((empty($Key['CantidadPro']))) :
                                // endif;  
                                ?>
                            </span>
                        </div> -->
                    </div>

                    <!-- Se añaden las leyendas por medio de E_Vitrina.js con la funcion TransferirPedido() -->
                    
                </div>
                <?php
                $Contador++;
            endforeach;
            ?>
        </div>  
    </div>  

    <?php
    // Se muestra el boton de carrito de compras, invocado en agregarOpcion() en E_Vitrina_Mayorista.js
    // Sesion creada en CuentaVendedor_C/agregarProductoAPedido
    // Entra en el IF en caso de que se desee añadir un producto a un pedido existente
    if(isset($_SESSION['Nro_Orden']) == true){ ?> <!-- En caso de agregar productos a pedido existente -->
        <div class="contenedor_61" id="Contenedor_61">
            <div class="contenedor_21" id="Mostrar_Carrito" onclick="llamar_AgregarPedidoEnCarrito('<?php echo $ID_Mayorista;?>','<?php echo $Datos['dolarHoy'];?>')">
                <div class="contenedor_31">
                    <small class="small_1 small_4">Ver <br class="br_3"> carrito</small>
                    <i class="fas fa-shopping-cart span_2"></i>
                    <!-- input que va cargando desde vitrina.js el monto total de la compra  -->
                    <input type="text" class="input_5" id="Input_5" readonly/>
                </div>
            </div>
        </div>
        <?php
    }
    else{   ?> <!-- En caso de hacer un primer pedido -->
        <div class="contenedor_61" id="Contenedor_61">
            <div class="contenedor_21" id="Mostrar_Carrito" onclick="llamar_PedidoEnCarrito('<?php echo $ID_Mayorista;?>','<?php echo $Datos['dolarHoy'];?>')">
                <div class="contenedor_31">
                    <small class="small_1 small_4">Ver <br class="br_3"> carrito</small>
                    <i class="fas fa-shopping-cart span_2"></i>
                    <!-- input que va cargando desde vitrina.js el monto total de la compra  -->
                    <input type="text" class="input_5" id="Input_5" readonly/>
                </div>
            </div>
        </div>
        <?php
    }   ?>
    
</div>

<!-- Muestra los productos de cada seccion, los valores los toma desde opciones_Mayorista_V.php que es invovado desde -->
<div id="Mostrar_Opciones_Mayorista"></div>

<!-- Trae por medio de Ajax todo el pedido del usuario "La Orden de compra", la información es suministrada por carritoMayorista_V.php invocada por la función llamar_PedidoEnCarrito() en este mismo archivo-->
<div id="Mostrar_OrdenMayorista"></div>

<!-- Muestra una lista de minoristas correspondientes a u vnededor, los valores viene de CarritoMayorista_C/listaMinorista -->
<div style="background-color: white" id="Mostrar_minoristas"></div>

<script src="<?php echo RUTA_URL . '/public/javascript/E_VitrinaMayorista.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/A_VitrinaMayorista.js?v=' . rand();?>"></script>
<div class="section_5">	
    <!-- IMAGEN DE MAYORISTA SOLO MOSTRADO EN MOVILES -->
    <?php                    
    if($Datos['fotoMayorista'] == 'tienda.png'){    ?> 
        <div class="contenedor_109 contenedor_109--imgDefecto contenedor_109--mayorista" style="background-image: url('<?php //echo RUTA_URL?>/public/images/tiendas/tienda.png');"></div>  
        <?php
    } 
    else{ ?>
        <!-- <div class="contenedor_109 contenedor_109--mayorista" style="background-image: url('<?php //echo RUTA_URL?>/public/images/proveedor/Don_Rigo/<?php //echo $Datos['fotoMayorista'];?>');"></div>   -->
        <div class="contenedor_109 contenedor_109--mayorista" style="background-image: url('<?php echo RUTA_URL?>/public/images/proveedor/Don_Rigo/Portada.jpg"></div>  
        <?php
    }   ?>

    <div class="contenedor_156"> 
        <aside class="aside_1">
            <p class="p_17 borde_1">SECCIONES</p>
        </aside>

        <div class="contenedor_110" id="Section_4">
            <?php
            $Contador = 1;
            //Se cargan todas las categorias de productos que tenga un mayorista
            foreach($Datos['categoriaMayorista'] as $row) :
                $Seccion = $row['seccionMay'];     
                $ID_Seccion = $row['ID_SeccionMay']; 
                $ID_Mayorista = $row['ID_Mayorista'];   
                ?> 
                <div class='contenedor_11' id="<?php echo 'Cont_Seccion_' . $Contador;?>">
                    <div class="contenedor_11a" id="<?php echo 'Cont_imagen_' . $Contador;?>" onclick="verOpcionesMayorista('<?php echo 'Cont_Seccion_' . $Contador;?>','<?php echo $Seccion;?>'); llamar_OpcionesMayorista('<?php echo $ID_Mayorista;?>','<?php echo $ID_Seccion;?>')">  
                        <?php

                        // IMAGEN DE SECCION
                        // foreach($Datos['nombre_img_seccion_mayorista'] as $key) : 
                        //     if($key['ID_Seccion'] == $ID_Seccion) : 
                        //         $SeccionExiste = 'Seccion_'. $Contador; 
                                if($row['nombre_img_seccionMay'] == ''){ ?>
                                    <div class="contenedor_9" style="background-image: url('<?php echo RUTA_URL?>/public/images/proveedor/Don_Rigo/imagen.png');">
                                    </div> <?php
                                }   
                                else{    ?>
                                    <div class="contenedor_9" style="background-image: url('<?php echo RUTA_URL?>/public/images/proveedor/Don_Rigo/<?php echo $row['nombre_img_seccionMay']?>');">
                                    </div>  <?php
                                } ;  
                            // endif;  
                        // endforeach;  

                        $SeccionExiste = '';
                        ?>

                        <!-- CIRCULO QUE INDICA CANTIDAD DE PRODUCTOS EN IMAGEN DE SECCION -->
                        <h2 class="boton botonReverso borde_1 boton--largo"><?php echo $Seccion;?></h2>
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
    
    <!-- Se muestra el boton de carrito de compras, invocado en agregarOpcion() en E_Vitrina_Mayorista.js-->
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
</div>

<!-- Muestra los productos de cada seccion, los valores los toma desde opciones_Mayorista_V.php que es invovado desde -->
<div id="Mostrar_Opciones_Mayorista"></div>

<!-- Trae por medio de Ajax todo el pedido del usuario "La Orden de compra", la información es suministrada por carritoMayorista_V.php invocada por la función llamar_PedidoEnCarrito() en este mismo archivo-->
<div id="Mostrar_OrdenMayorista"></div>

<script src="<?php echo RUTA_URL . '/public/javascript/E_VitrinaMayorista.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL . '/public/javascript/A_VitrinaMayorista.js?v=' . rand();?>"></script>
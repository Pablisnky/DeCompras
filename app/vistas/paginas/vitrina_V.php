<?php 
    //$Datos proviene de Vitrina_C
    if($Datos['disponibilidad'] == 'Cerrado'){        
        require(RUTA_APP . "/vistas/modal/modal_fueraHorario_V.php");
    }
    $ID_Tienda = $Datos['id_tienda'] ;
    $Fotografia = $Datos['fotografia'];

    //Si viene de buscador se realiza el procedimiento para mostrar el producto seleccionado -->
    //$Datos proviene de Vitrina_C
    if($Datos['Seccion'] != 'NoNecesario_1'){//'NoNecesario_1' es creado en tiendas porque comparte el controlador index de Vitrina_C
        ?> 
        <div style="background-color:rgb(239, 245, 245); height: 100%; width: 100%; position: absolute;top: 0%; left: 0%" id='Tapa_1'>
            <div class="preloder"></div>
        </div>
        <?php
    }
?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/iconos/flechaAtras/style_flechaAtras.css"/>

<section class="section_5">	
    <!-- div mostrado solo en responsive -->
    <div class="contenedor_109" style="background-image: url('<?php echo RUTA_URL?>/public/images/tiendas/<?php echo $Fotografia[0]['fotografia_Tien'];?>');"></div>

    <div class="contenedor_156"> 
        <div>
            <aside class="aside_1">
                <p class="p_17 borde_1">SECCIONES</p>
            </aside>
        </div>

        <div class="contenedor_110" id="Section_4">
            <?php
            $Contador = 1;
            //Se cargan todas las secciones que tenga una tienda
            foreach($Datos['seccion'] as $row){
                $Seccion = $row['seccion'];       
                ?> 
                <div class='contenedor_11 contenedor_11a' id="<?php echo 'Cont_Seccion_' . $Contador;?>">
                    <div id="<?php echo 'Cont_imagen_' . $Contador;?>" onclick="verOpciones('<?php echo 'Cont_Seccion_' . $Contador;?>','<?php echo $Seccion;?>'); llamar_Opciones('<?php echo $ID_Tienda;?>','<?php echo $Seccion;?>','NoAplica')"> 
                        <div class="contenedor_9 borde_1">
                            <img class="imagen_2" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/imagen.png"/>
                        </div>  
                        <h2 class="h2_6"><?php echo $Seccion;?></h2>
                    </div>

                    <!-- Se agregan las leyendas desde TransferirPedido() -->
                </div>
                <?php
                $Contador++;
            }
            ?>
        </div>  
    </div>  
    <!-- Se muestra el boton (div) de carrito de compras en el bottom del viewport, aparece por medio de agregarOpcion() en E_Vitrina.js-->
    <div class="contenedor_61" id="Contenedor_61">
        <div class="contenedor_21" id="Mostrar_Carrito" onclick="llamar_PedidoEnCarrito('<?php echo $ID_Tienda;?>')">
            <div class="contenedor_31">
                <span class="icon-cart span_2"></span>
                <input type="text" class="input_5" id="Input_5" readonly="readondly"/>
            </div>
        </div>
    </div>
</section>

<!-- "Mostrar_Opciones" Trae por medio de Ajax las productos de cada seccion, los valores los toma desde opciones_V.php que es invovado desde llamar_Opciones()-->
<div id="Mostrar_Opciones"></div>

<!-- Trae por medio de Ajax todo el pedido del usuario "La Orden de compra", la información es suministrada por carrito_V.php invocada por la función llamar_PedidoEnCarrito() en este mismo archivo-->
<div id="Mostrar_Orden"></div>

<!-- Trae por medio de Ajax la dirección de la tienda, la información es suministrada por direccion_V.php invocada por la función () en este mismoarchivo-->
<!-- <div id="Mostrar_Direccion"></div> -->

<!-- Trae por medio de Ajax las ofertas de la tienda, la información es suministrada por ofertas_V.php invocada por la función () en este mismoarchivo-->
<!-- <div id="Mostrar_Ofertas"></div> -->

<!-- Trae por medio de Ajax lo más pedido de la tienda, la información es suministrada por LoMasPedido_V.php invocada por la función () en este mismoarchivo-->
<!-- <div id="Mostrar_LoMasPedido"></div> -->

<!-- Trae por medio de Ajax la ventana de alerta que se va a eliminar un producto del pedido -->
<!-- <div id="Mostrar_Alert"></div> -->

<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Vitrina.js';?>"></script>
<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Vitrina.js';?>"></script>

<?php //include(RUTA_APP . "/vistas/inc/footer.php");?>
<!-- ******************************************************************************************* -->

<?php
    //Si viene de buscador se realiza el procedimiento para mostrar el producto seleccionado
    //$Datos proviene de Vitrina_C
    if($Datos['Seccion'] != 'NoNecesario'){//'NoNecesario' es creado en tiendas porque comparte el controlador index de Vitrina_C         
        $SeccionSelecionada = $Datos['Seccion'];
        $OpcionSeleccionada = $Datos['Opcion']; 

        $Contador = 1;
        
        //Se cargan todas las secciones que tenga una tienda
        //$Datos proviene de Vitrina_C
        foreach($Datos['seccion'] as $row){
            $Seccion = $row['seccion'];  ?>
            <script>
                //Se busca el contenedor que corresponde con la sección del producto seleccionado y se entra en los productos que contiene
                if('<?php echo $SeccionSelecionada == $Seccion?>'){
                    verOpciones('<?php echo 'Cont_Seccion_' . $Contador;?>','<?php echo $SeccionSelecionada?>')
                    llamar_Opciones('<?php echo $ID_Tienda;?>','<?php echo $SeccionSelecionada;?>','<?php echo $OpcionSeleccionada?>')
                }
            </script>
            <?php
            $Contador++;
        }   ?>   
        <?php
    }
?>

 <!--Si se llama un producto desde buscador, se verifica que el div id="Mostrar_Opciones" haya cargado todos los productos de la sección, para luego proceder a colocar la leyenda en el producto seleccionado en la busqueda,  esto es necesario cuando se hizo una busqueda por producto en inicio_V.php -->
<script>
    interval = setInterval('verificarDiv()',1000)

    //Detiene la llamada continua de verificarDiv a los 4 segundo de ser invocada con el setInterval
    setTimeout('stopInterval()',4000)   
</script> 

    
<script>
    //Invocada desde descr_Producto_V.php
    function activarBotonAgregar(ID_LabelAgregar){
        // console.log(ID_LabelAgregar)
        document.getElementById(ID_LabelAgregar).click();
    }
</script>
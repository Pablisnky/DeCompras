<?php 
    // include(RUTA_APP . '/vistas/inc/header_Tienda.php');  

    //$Datos viene de Vitrina_C
    $ID_Tienda = $Datos['id_tienda'] ;
    $Fotografia = $Datos['fotografia']; 
?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>

<section class="section_5">	
    <div class="contenedor_109">
        <img class="imagen_8" alt="Fotografia del producto" src="http://localhost/proyectos/PidoRapido/public/images/tiendas/<?php echo $Fotografia[0]['fotografia_Tien'];?>"/>
    </div>
    <div class="contenedor_110" id="Section_4">
        <?php
        $Contador = 1;
        //Se cargan todas las secciones que tenga una tienda
        foreach($Datos['seccion'] as $row){
            $Seccion = $row['seccion'];       
            ?> 
            <div class='contenedor_11 contenedor_11a' id="<?php echo 'Cont_Seccion_' . $Contador;?>">
                <div id="<?php echo 'Cont_imagen_' . $Contador;?>" onclick="verOpciones('<?php echo 'Cont_Seccion_' . $Contador;?>','<?php echo $Seccion;?>'); llamar_Opciones('<?php echo $ID_Tienda;?>','<?php echo $Seccion;?>')"> 
                    <div class="contenedor_9 borde_1">
                        <img class="imagen_2" alt="Fotografia del producto" src="http://localhost/proyectos/PidoRapido/public/images/imagen.png"/>
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
    <!-- Se muestra el carrito de compras en el fondo del viewport-->
    <div class="contenedor_61" id="Contenedor_61">
        <div class="contenedor_21" id="Mostrar_Carrito" onclick="llamar_PedidoEnCarrito()">
            <div class="contenedor_31">
                <span class="icon-cart span_2"></span>
                <input type="text" class="input_5" id="Input_5" readonly="readondly"/>
            </div>
        </div>
    </div>
</section>

<!-- "Mostrar_Opciones" Trae por medio de Ajax las productos de cada seccion, los valores los toma desde opciones_V.php que es invovado desde llamar_Opciones()-->
<div id="Mostrar_Opciones"></div>

<!-- Trae por medio de Ajax todo el pedido del usuario "La orden", la información la toma de carrito_V.php invocada por la función llamar_PedidoEnCarrito() -->
<section>
    <div id="Mostrar_Orden"></div>
</section>

<!-- Trae por medio de Ajax la ventana de alerta que se va a eliminar un producto del pedido -->
<section>
    <div id="Mostrar_Alert"></div>
</section>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Vitrina.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Vitrina.js';?>"></script>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>   
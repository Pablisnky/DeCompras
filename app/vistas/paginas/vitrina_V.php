<?php 
    include(RUTA_APP . '/vistas/inc/header_Tienda.php');  

    $ID_Tienda =  $Datos['id_tienda'] ;
?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>

<section class="section_5">	
    <div class="contenedor_13">
        <?php
        $Contador = 1;
        //Se cargan todas las secciones que tenga una tienda
        foreach($Datos['seccion'] as $row){
            $Seccion = $row['seccion'];       
            ?> 
            <section id="Section_4">
                <div id="<?php echo 'Cont_Seccion_' . $Contador;?>">
                    <div class='contenedor_11 contenedor_11a' id="<?php echo 'Cont_imagen_' . $Contador;?>" onclick="verOpciones('<?php echo 'Cont_Seccion_' . $Contador;?>','<?php echo $Seccion;?>'); llamar_Opciones('<?php echo $ID_Tienda;?>','<?php echo $Seccion;?>')">
                        <div class="contenedor_12 borde_1">
                            <figure>
                                <!-- Con un if se verifica si tiene imagen en BD; sino se muestra el icono -->
                                <!-- <img class="image_1" src="" alt="Imagen"/> -->
                                <label for="File_1"><span class="icon-image span_9"></span></label>
                            </figure>
                        </div>
                        <h2 class="h2_6"><?php echo $Seccion;?></h2>
                    </div>

                    <!-- Se agregan las leyendas desde TransferirPedido() -->

                </div>
            </section>
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

<!-- "Mostrar_Opciones" Trae por medio de Ajax las productos de cada seccion, los valores los toma desde opciones_V.php -->
<div id="Mostrar_Opciones"></div>

<!-- Trae por medio de Ajax todo el pedido del usuario "La orden", la información la toma de carrito_V.php invocada por la función llamar_PedidoEnCarrito() -->
<section>
    <div id="Mostrar_TodoPedido"></div>
</section>

<!-- Trae por medio de Ajax la ventana de alerta que se va a eliminar un producto del pedido -->
<section>
    <div id="Mostrar_Alert"></div>
</section>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Vitrina.js';?>"></script>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>   
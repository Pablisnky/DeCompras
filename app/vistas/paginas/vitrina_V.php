<?php 
    include(RUTA_APP . '/vistas/inc/header_Tienda.php');  

    $ID_Tienda =  $Datos['id_tienda'] ;
?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
<section class="section_5" id="Section_5">	
    <div class="contenedor_13">
        <?php
        $Contador = 1;
        foreach($Datos['seccion'] as $row){
            $Seccion = $row['seccion'];       
            ?> 
            <section>
                <div id="<?php echo 'Cont_Dinamico_' . $Contador;?>"><!--Sombrea-->
                    <article>
                        <div class='contenedor_11 contenedor_11a' id="<?php echo 'Cont_imagen_' . $Contador;?>" onclick="verOpciones('<?php echo 'Cont_imagen_' . $Contador;?>','<?php echo 'Cont_Sombreado_' .$Contador;?>','<?php echo 'Cont_SubSombreado_' . $Contador;?>','<?php echo 'Cont_Dinamico_' . $Contador;?>','<?php echo 'Producto_' . $Contador;?>','<?php echo 'Opcion_' . $Contador;?>','<?php echo 'Leyenda_'. $Contador;?>','<?php echo  'Precio_' . $Contador;?>','<?php echo 'Cantidad_' . $Contador;?>','<?php echo 'Total_'. $Contador;?>','<?php echo 'ID_Opcion_'. $Contador;?>','<?php echo 'Item_'. $Contador;?>'); llamar_Opciones_1('<?php echo $ID_Tienda;?>','<?php echo "$Seccion";?>','<?php echo 'Cont_Dinamico_' . $Contador;?>','No','No')">
                            <div class="contenedor_12 borde_1">
                                <figure>
                                    <!-- <img class="image_1" src="" alt="Imagen"/> -->
                                <label for="File_1"><span class="icon-image span_9"></span></label>
                                </figure>
                            </div>
                            <h2 class="h2_6"><?php echo $Seccion;?></h2>
                        </div>
                    </article>
                    <article><!--Detalles del producto selecionado, este es el DIV clonado -->
                        <div class="contenedor_14" id="<?php echo 'Cont_Sombreado_' . $Contador;?>">
                            <div class="" id="<?php echo 'Cont_Agrega_Opcion_' . $Contador;?>">
                                <div class="contenedor_19" id="<?php echo 'Cont_A_Clonar_' . $Contador;?>">
                                    <div>
                                        <!-- cantidad -->
                                        <input type="text" class="input_1e input_3" id="<?php echo 'Cantidad_' . $Contador;?>" value="1"/>
                                        <!-- producto - alimentado desde FuncionesVarias.js  -->
                                        <input type="text" class="input_1a input_3" name="Desc_Producto" id="<?php echo 'Producto_' . $Contador;?>"/>
                                        <!-- opcion - alimentado desde FuncionesVarias.js  -->
                                        <input type="text" class="input_1c  input_3" name="opcion" id="<?php echo 'Opcion_' . $Contador;?>"/>
                                        <!-- ID_Opcion --> 
                                        <input type="text" class="input_1b input_3" id="<?php echo 'ID_Opcion_' . $Contador;?>"/>
                                        <!-- Precio - alimentado desde FuncionesVarias.js  -->
                                        <input type="text" class="input_1d input_3" id="<?php echo 'Precio_' . $Contador;?>"/>
                                        <!-- Total - alimentado desde FuncionesVarias.js -->
                                        <input type="text" class="input_1f  input_3" id="<?php echo 'Total_' . $Contador;?>"/>
                                        <!-- Leyenda - alimentado desde FuncionesVarias.js  -->
                                        <input type="text" class="input_2a" id="<?php echo 'Leyenda_'. $Contador;?>"/>
                                    </div> 
                                    <div class="contenedor_16" id="Contenedor_16">
                                        <button class="menos" id="boton">-</button>
                                        <input class="input_2" type="text" id="<?php echo 'Item_'. $Contador;?>"  value="1" disabled="disabled"/>
                                        <button class="mas" id="boton">+</button>
                                    </div> 
                                </div>
                            </div>
                            <div class="contenedor_18" id="<?php echo 'Cont_SubSombreado_' . $Contador;?> ">
                                <div> <!--class="contenedor_17"-->
                                    <label class="label_5" onclick="llamar_Opciones_2('<?php echo $ID_Tienda;?>','<?php echo $Seccion;?>','Si','<?php echo 'Cont_Agrega_Opcion_' . $Contador;?>','<?php echo 'Cont_A_Clonar_' . $Contador;?>')">Agregar otra opción</label> 
                                </div> 
                            </div>  
                        </div>
                    </article>
                </div>
            </section>
            <?php
            $Contador++;
        }
        ?>
    </div>
    <div class="contenedor_61" id="Contenedor_61">
        <div class="contenedor_21" id="Mostrar_Carrito" onclick="llamar_PedidoEnCarrito()">
            <div class="contenedor_31">
                <span class="icon-cart span_2"></span>
                <input type="text" class="input_5" id="Input_5" readonly="readondly"/>
            </div>
        </div>
    </div>
</section>

<!-- Trae por medio de Ajax las opciones de cada pedido, los valores los toma desde opciones_V.php -->
<div id="Mostrar_Opciones"></div>


<!-- Trae por medio de Ajax todo el pedido del usuario, la información la toma de carrito_V.php -->
<section>
    <div id="Mostrar_TodoPedido"></div>
</section>

<!-- Trae por medio de Ajax la ventana de alerta que se va a eliminar un producto del pedido -->
<section>
    <div id="Mostrar_Alert"></div>
</section>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Vitrina.js';?>"></script>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>   
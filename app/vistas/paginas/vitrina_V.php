<?php 
    include(RUTA_APP . '/vistas/inc/header.php');  
    
    foreach($Datos['NombreTienda'] as $NombreTienda){
        $NombreTienda;
    }
?>

<section class="section_5">
    <div class="contenedor_10">
        <?php
        $Contador = 1;
        foreach($Datos['Inf_Productos'] as $row){
            $ID_Producto = $row[0];
            $Producto = $row['producto'];
            $ID_Tienda = $row['ID_Tienda'];              
            ?> 
            <section>
                <div class="" id="<?php echo 'Cont_Dinamico_' . $Contador;?>"><!--Sombrea-->
                    <article>
                        <div class='contenedor_11 contenedor_11a' id="<?php echo 'Cont_imagen_' . $Contador;?>" onclick="verOpciones('<?php echo 'Cont_imagen_' . $Contador;?>','<?php echo 'Cont_Sombreado_' .$Contador;?>','<?php echo 'Cont_SubSombreado_' . $Contador;?>','<?php echo 'Cont_Dinamico_' . $Contador;?>','<?php echo 'Producto_' . $Contador;?>','<?php echo 'Opcion_' . $Contador;?>','<?php echo 'Leyenda_'. $Contador;?>','<?php echo  'Precio_' . $Contador;?>','<?php echo 'Cantidad_' . $Contador;?>','<?php echo 'Total_'. $Contador;?>','<?php echo 'ID_Opcion_'. $Contador;?>','<?php echo 'Item_'. $Contador;?>'); llamar_Opciones_1('<?php echo $ID_Tienda;?>','<?php echo $Producto;?>','<?php echo 'Cont_Dinamico_' . $Contador;?>','No','No')">
                            <div class="contenedor_12 borde_1">
                                <figure>
                                    <img class="image_1" src="" alt="Imagen"/>
                                </figure>
                            </div>
                            <div>
                                <label class="label_1"><?php echo $Producto;?></label>
                            </div>                  
                        </div>
                    </article>
                    <article><!--Detalles del producto selecionado, este es el DIV clonado -->
                        <div class="contenedor_14" id="<?php echo 'Cont_Sombreado_' . $Contador;?>">
                            <div class="" id="<?php echo 'Cont_Agrega_Opcion_' . $Contador;?>">
                                <div class="contenedor_19" id="<?php echo 'Cont_A_Clonar_' . $Contador;?>">
                                    <div>
                                        <!-- cantidad -->
                                        <input type="text" class="input_1e         " id="<?php echo 'Cantidad_' . $Contador;?>" value="1"/>
                                        <!-- producto -->
                                        <input type="text" class="input_1a         " name="Desc_Producto" id="<?php echo 'Producto_' . $Contador;?>" value="<?php echo $Producto ?>"/>
                                        <!-- opcion - alimentado desde FuncionesVarias.js  -->
                                        <input type="text" class="input_1c         " name="opcion" id="<?php echo 'Opcion_' . $Contador;?>" value="<?php echo $Opcion?>"/>
                                        <!-- ID_Opcion --> 
                                        <input type="text" class="input_1b         " id="<?php echo 'ID_Opcion_' . $Contador;?>" value="<?php echo $ID_Opcion?>"/>
                                        <!-- Precio - alimentado desde FuncionesVarias.js  -->
                                        <input type="text" class="input_1d         " id="<?php echo 'Precio_' . $Contador;?>"/>
                                        <!-- Total - alimentado desde FuncionesVarias.js -->
                                        <input type="text" class="input_1f         " id="<?php echo 'Total_' . $Contador;?>"/>
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
                                <div class="contenedor_17">
                                    <label class="label_5" onclick="llamar_Opciones_2('<?php echo $ID_Tienda;?>','<?php echo $Producto;?>','Si','<?php echo 'Cont_Agrega_Opcion_' . $Contador;?>','<?php echo 'Cont_A_Clonar_' . $Contador;?>')">Agregar otra opción</label> 
                                </div> 
                                <div>
                                    <input class="input_4" type="text" name="AgregarOpc" placeholder="Agregar aclaración"/>
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

<section>
<!-- Trae por medio de Ajax las opciones de cada pedido, los valores los toma desde opciones_V.php -->
    <div id="Mostrar_Opciones"></div>
</section>

<!-- Trae por medio de Ajax todo el pedido del usuario, la información la toma de carrito_V.php -->
<section>
    <div id="Mostrar_TodoPedido"></div>
</section>

<!-- Trae por medio de Ajax la ventana de alerta que se va a eliminar un producto del pedido -->
<section>
    <div id="Mostrar_Alert"></div>
</section>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>  

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Vitrina.js';?>"></script> 
<?php include(RUTA_APP . '/vistas/inc/header.php');  ?>

<section>
    <?php 
    foreach($Datos['NombreTienda'] as $NombreTienda){
        $NombreTienda;
    }?>
    <p class="p_1"><?php echo $NombreTienda?></p>
    <div class="contenedor_10 contenedor_23">
        <?php
        // echo "<pre>";
        //     print_r($Datos['Inf_Productos']);
        // echo "</pre>";
        $Contador = 1;
        foreach($Datos['Inf_Productos'] as $row){
            $ID_Producto = $row[0];
            $Producto = $row['producto'];
            $ID_Tienda = $row['ID_Tienda'];                
            ?> 
            <section>
                <div id="<?php echo 'Cont_Dinamico_' . $Contador;?>">
                <article>
                    <div class='contenedor_11' onclick="verOpciones('<?php echo 'Cont_Sombreado_' .$Contador;?>','<?php echo 'Cont_Dinamico_' . $Contador;?>','<?php echo 'Producto_' . $Contador;?>','<?php echo 'Leyenda_'. $Contador;?>','<?php echo  'Precio_' . $Contador;?>','<?php echo 'Cantidad_' . $Contador;?>','<?php echo 'Total_'. $Contador;?>','<?php echo 'ID_Opcion_'. $Contador;?>','<?php echo 'Item_'. $Contador;?>'); llamar_Opciones('<?php echo $ID_Tienda;?>','<?php echo $Producto;?>','No','No','No')">
                        <div class="contenedor_12">
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
                                    <input type="text" class="input_1e input_3" id="<?php echo 'Cantidad_' . $Contador;?>" value="1"/>
                                    <!-- producto -->
                                    <input type="text" class="input_1a input_3" name="Desc_Producto" id="<?php echo 'Producto_' . $Contador;?>" value="<?php echo $Producto ?>"/>
                                    <!-- ID_Opcion --> 
                                    <input type="text" class="input_1b input_3" id="<?php echo 'ID_Opcion_' . $Contador;?>" value="<?php echo $ID_Opcion?>"/>
                                    <!-- Precio -->
                                    <input type="text" class="input_1d input_3" id="<?php echo 'Precio_' . $Contador;?>"/>
                                    <!-- Total -->
                                    <input type="text" class="input_1f input_3" id="<?php echo 'Total_' . $Contador;?>"/>
                                    <!-- Leyenda -->
                                    <input type="text" class="input_2a" id="<?php echo 'Leyenda_'. $Contador;?>"/>
                                </div> 
                                <div class="contenedor_16">
                                    <button class="menos" id="boton" onclick="Pre_decremento()">-</button>
                                    <input class="input_2" type="text" id="<?php echo 'Item_'. $Contador;?>"  value="1" disabled="disabled"/>
                                    <button class="mas" id="boton" onclick="Pre_incremento()">+</button>
                                </div> 
                            </div>
                        </div>
                        <div class="contenedor_18">
                            <div class="contenedor_17">
                                <label class="label_5" onclick="llamar_Opciones('<?php echo $ID_Tienda;?>','<?php echo $Producto;?>','Si','<?php echo 'Cont_Agrega_Opcion_' . $Contador;?>','<?php echo 'Cont_A_Clonar_' . $Contador;?>')">Agregar otra opción</label> 
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
</section>

<section>
<!--Trae por medio de Ajax las opciones de cada pedido, los valores los toma desde opciones_V.php -->
    <div id="Mostrar_Opciones"></div>
</section>

<!--Trae por medio de Ajax todo el pedido del usuario, la información la toma de carrito_V.php -->
<section>
    <div id="Mostrar_TodoPedido"></div>
</section>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>
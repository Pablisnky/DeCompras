<?php include(RUTA_APP . '/vistas/inc/header.php');  ?>

<section class="section_1">
    <?php 
    foreach($Datos['NombreTienda'] as $Tienda){
        $Tienda;
    }?>
    <p class="p_1">Bienvenido al menu de <?php echo $Tienda?></p>
    <div class="contenedor_10 contenedor_23">
        <?php
        $Contador = 1;
        foreach($Datos['Inf_Productos'] as $row){
            $ID_Producto = $row[0];
            $Producto = $row['producto'];
            // $Precio = $row['precio'];
            // $Opcion = $row['opciones'];
            $ID_Tienda = $row['ID_Tienda'];                
            ?> 
            <section>
                <div class="contenedor_15" id="<?php echo 'Cont_Dinamico_' . $Contador;?>">
                <article>
                    <div class='contenedor_11' onclick="verOpciones('<?php echo 'Cont_Sombreado_' .$Contador;?>','<?php echo 'Cont_Dinamico_' . $Contador;?>','<?php echo 'Producto' . $Contador;?>','<?php echo 3 . $Contador;?>','<?php echo 'Leyenda_'. $Contador;?>','<?php echo 'Precio_' . $Contador;?>','<?php echo 'Cantidad_' . $Contador;?>','<?php echo 'Item_'. $Contador;?>'); llamar_Opciones('<?php echo $ID_Tienda;?>','<?php echo $Producto;?>', 'No','No','No')">
                        <div class="contenedor_12">
                            <figure>
                                <img class="image_1" src="" alt="Imagen"/>
                            </figure>
                        </div>
                        <div>
                            <label class="label_1"><?php echo $Producto;?></label>
                        </div>
                        <div style="text-align:right;">
                            <input class="input_3" id="<?php echo 'Precio_' . $Contador;?>" value="<?php //echo $Precio;?>"/>                           
                        </div>
                        <?php 
                        if(!empty($UnidadVenta)){ ?>
                            <div>
                                <label class="label_1">Por <?php echo $UnidadVenta;?> </label>                           
                            </div>  <?php  
                        }   ?>                    
                    </div>
                </article>
                <article><!--Detalles del producto selecionado, este es el DIV clonado -->
                    <div class="contenedor_14" id="<?php echo 'Cont_Sombreado_' . $Contador;?>">
                        <div class="contenedor_20" id="<?php echo 'Cont_Agrega_Opcion_' . $Contador;?>">
                            <div class="contenedor_19" id="<?php echo 'Cont_A_Clonar_' . $Contador;?>">
                                <div>
                                    <!-- cantidad -->
                                    <input type="text" class="label_1e input_3" id="<?php echo 'Cantidad_' . $Contador;?>" value="1"/>
                                    <!-- talla -->
                                    <input type="text" class="label_1a input_3" id="<?php echo 'Producto' . $Contador;?>" value="<?php echo $Opcion ?>"/>
                                    <!-- Precio -->
                                    <input type="text" class="label_1d input_3" id="<?php echo 3 . $Contador;?>"/>
                                    <!-- Leyenda -->
                                    <input type="text" class="input_2a" id="<?php echo 'Leyenda_'. $Contador;?>"/>
                                </div> 
                                <div class="contenedor_16">
                                    <button class="menos" id="boton"onclick="Pre_decremento()">-</button>
                                    <input class="input_2 input2a" type="text" id="<?php echo 'Item_'. $Contador;?>"  value="1" disabled="disabled"/>
                                    <button class="mas" id="<?php echo 'BotonInc_' .  $Contador;?>" onclick="Pre_incremento()">+</button>
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

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>
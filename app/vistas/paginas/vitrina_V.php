<!-- Archivo insertado via Ajax en inicio_V.php -->
<section class="section_1">
    <div class='contenedor_10'>
        <?php
        $Contador = 1;
        foreach($Datos as $row){
            $ID_Producto = $row[0];
            $Nombre = $row['seccion'];
            $Precio = $row['precio'];
            $Opcion = $row['opciones'];
            $ID_Departamento = $row['ID_Departamento'];                
            ?> 
            <section>
                <div class="contenedor_15" id="<?php echo 'Cont_Dinamico_' . $Contador;?>">
                <article><!--Imagen de presentacion de la seccion del Departamento -->
                    <div class='contenedor_11' onclick="verOpciones('<?php echo 'Cont_Sombreado_' .$Contador;?>','<?php echo 'Cont_Dinamico_' . $Contador;?>','<?php echo 'Talla_' . $Contador;?>','<?php echo 3 . $Contador;?>','<?php echo 'Leyenda_'. $Contador;?>','<?php echo 'Precio_' . $Contador;?>','<?php echo 'Cantidad_' . $Contador;?>','<?php echo 'Item_'. $Contador;?>'); llamar_Opciones('<?php echo $ID_Departamento;?>','<?php echo $Nombre;?>', 'No','No','No')">
                        <div class="contenedor_12">
                            <figure>
                                <img class="image_1" src="https://placeimg.com/250/250/animals" alt="Imagen"/>
                            </figure>
                        </div>
                        <div>
                            <label class="label_1"><?php echo $Nombre;?></label>
                        </div>
                        <div style="text-align:right;">
                            <label class="label_2">$ <?php echo $Precio;?></label>
                            <input id="<?php echo 'Precio_' . $Contador;?>" value="<?php echo $Precio;?>" hidden/>                           
                        </div>
                        <?php 
                        if(!empty($UnidadVenta)){ ?>
                            <div>
                                <label class="label_1">Por <?php echo $UnidadVenta;?> </label>                           
                            </div>  <?php  
                        }   ?>                    
                    </div>
                </article>
                <article><!--Detalles del producto selecionado -->
                    <div class="contenedor_14" id="<?php echo 'Cont_Sombreado_' . $Contador;?>">
                        <div class="contenedor_20" id="<?php echo 'Cont_Agrega_Opcion_' . $Contador;?>">
                            <div class="contenedor_19" id="<?php echo 'Cont_A_Clonar_' . $Contador;?>">
                                <div>
                                    <!-- cantidad -->
                                    <input type="text" class="label_1e" id="<?php echo 'Cantidad_' . $Contador;?>" value="1" hidden>
                                    <!-- talla -->
                                    <input type="text" class="label_1a" id="<?php echo 'Talla_' . $Contador;?>" value="<?php echo $Opcion ?>" hidden>
                                    <!-- Precio -->
                                    <input type="text" class="label_1d" id="<?php echo 3 . $Contador;?>" hidden>
                                    <!-- Leyenda -->
                                    <input type="text" class="label_1c" id="<?php echo 'Leyenda_'. $Contador;?>">  
                                </div> 
                                <div class="contenedor_16">
                                    <button class="button_1" onclick="decrementar();">-</button>
                                    
                                    <input class="input_2 input2a" type="text" id="<?php echo 'Item_'. $Contador;?>"  value="1" disabled>

                                    <button class="button_2" id="<?php echo 'BotonInc_' .  $Contador;?>" onclick="incrementar()">+</button>
                                </div> 
                            </div>
                        </div>
                        <div class="contenedor_18">
                            <div class="contenedor_17">
                                <label class="label_5" onclick="llamar_Opciones('<?php echo $ID_Departamento;?>','<?php echo $Nombre;?>','Si','<?php echo 'Cont_Agrega_Opcion_' . $Contador;?>','<?php echo 'Cont_A_Clonar_' . $Contador;?>')">Agregar otra opción</label> 
                            </div> 
                            <div>
                                <input class="input_4" type="text" name="AgregarOpc" placeholder="Agregar aclaración">
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

<!-- //Trae por medio de Ajax las opciones de cada pedido, los valores los toma desde opciones_V.php -->
<div id="Mostrar_Opciones"></div>









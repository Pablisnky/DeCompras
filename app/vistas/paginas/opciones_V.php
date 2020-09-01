<!-- Archivo cargado por petición Ajax desde funcionesAjax.js en la función llamar_Opciones() he insertado en vitrina_V.php -->

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>
<section class="section_3 section_9" id="Section_3">
    <form>
        <div class="contenedor_13">    
            <div class="contenedor_90 p_9">
                <h1 class="h1_1 h1_3 h1_4">Sección de Jugos</h1>
                <span class="icon-cancel-circle span_5" id="Span_3" onclick="TransferirPedido()"></span>
            </div>
            <?php   
            $ContadorLabel = 1;
            foreach($Datos['Opciones'] as $row){
                $ID_Opcion =  $row['ID_Opcion'];
                $Producto = $row['producto']; 
                $Opcion = $row['opcion'];                    
                $Precio = $row['precio'];

                //Se da formato al precio, sin decimales y con separación de miles
                $Precio = number_format($Precio, 0, ",", ".");  ?>          
                <div class="contenedor_95">
                    <div class="contenedor_9 borde_2">
                        <div class="contenedor_97">
                            <label for="File_1"><span class="icon-image span_8"></span></label>
                        </div>
                    </div>
                    <div>
                        <input class="input_8" type="text" value="<?php echo $Producto;?>"/>
                        <input class="input_8" type="text" value="<?php echo $Opcion;?>"/>
                        <input class="input_8" type="text" value="<?php echo $Precio;?>  Bs."/>
                        <label for="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" class="label_4 Label_3js" id="<?php echo 'Etiqueta_' . $ContadorLabel;?>">Agregar</label> 
                        
                        <input class="input_3" type="radio" name="opcion" id="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" value="<?php echo $ID_Opcion.','.$Producto.','.$Opcion .','.$Precio;?>" onclick="agregarOpcion(this.form, '<?php echo 'Etiqueta_' . $ContadorLabel;?>','<?php echo 'Cont_Leyenda_' . $ContadorLabel;?>','<?php echo 'Cantidad_' . $ContadorLabel;?>','<?php echo 'Producto_' . $ContadorLabel;?>','<?php echo 'Opcion_' . $ContadorLabel;?>','<?php echo 'Precio_' . $ContadorLabel;?>','<?php echo 'Total_' . $ContadorLabel;?>','<?php echo 'Leyenda_' . $ContadorLabel;?>')"/>
                    </div> 
                    <div class="contenedor_14" id="<?php echo 'Cont_Leyenda_' . $ContadorLabel;?>">
                        <div class="contenedor_19">
                            <div>
                                <!-- cantidad -->
                                <input type="text" class="input_1e input_3" id="<?php echo 'Cantidad_' . $ContadorLabel;?>" value="1"/>
                                <!-- producto - alimentado desde FuncionesVarias.js  -->
                                <input type="text" class="input_1a input_3" name="Desc_Producto" id="<?php echo 'Producto_' . $ContadorLabel;?>"/>
                                <!-- opcion - alimentado desde FuncionesVarias.js  -->
                                <input type="text" class="input_1c input_3" name="opcion" id="<?php echo 'Opcion_' . $ContadorLabel;?>"/>
                                <!-- ID_Opcion --> 
                                <input type="text" class="input_1b input_3"/> 
                                <!-- Precio - alimentado desde FuncionesVarias.js  -->
                                <input type="text" class="input_1d input_3" id="<?php echo 'Precio_' . $ContadorLabel;?>"/>
                                <!-- Total - alimentado desde FuncionesVarias.js -->
                                <input type="text" class="input_1f input_3" id="<?php echo 'Total_' . $ContadorLabel;?>"/>
                                <!-- Leyenda - alimentado desde FuncionesVarias.js  -->
                                <input class="input_2a" type="text" name="leyenda" id="<?php echo 'Leyenda_'. $ContadorLabel;?>"/>
                            </div> 
                            <div class="contenedor_16">
                                <label class="menos">-</label>
                                <input class="input_2" type="text" id="<?php echo 'Item_'. $ContadorLabel;?>"  value="1" />
                                <label class="mas">+</label>
                            </div> 
                        </div>
                    </div>
                </div>
                <?php   
                $ContadorLabel++;
            }        
            ?>                    
        </div>
    </form>

    <div class="contenedor_61" id="Contenedor_61">
        <div class="contenedor_21" id="Mostrar_Carrito" onclick="llamar_PedidoEnCarrito()">
            <div class="contenedor_31">
                <span class="icon-cart span_2"></span>
                <input type="text" class="input_5" id="Input_5" readonly="readondly"/>
            </div>
        </div>
    </div>
</section> 
<!-- Archivo cargado por petición Ajax desde funcionesAjax.js en la función llamar_Opciones() he insertado en vitrina_V.php -->

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>
<section class="section_3 section_9" id="Section_3">
    <form>
        <div class="contenedor_13">    
            <div class="contenedor_90 p_9">
                <h1 class="h1_1 h1_3" class="label_3">Sección de Jugos</h1>
                <span class="icon-cancel-circle span_5" id="Span_3"></span>
            </div>
            <?php   
            if($Datos["AgregarNodo"] == 'No'){
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
                            <input class="input_8" type="text" value="<?php echo $Precio;?>"/>
                            <label for="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" class="label_4">Agregar</label> 
                        </div> 
                        <input class="input_3" id="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" type="radio" name="opcion" value="<?php echo $ID_Opcion.','.$Producto.','.$Opcion .','.$Precio;?>" onclick="transferirOpcion(this.form)"/>




                        
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
                                            <input type="text" class="input_2a" id="<?php echo 'Leyenda_'. $Contador;?>" value="1 Jugo de Piña = 1550 Bs"/>
                                        </div> 
                                        <div class="contenedor_16" id="Contenedor_16">
                                            <button class="menos" id="boton">-</button>
                                            <input class="input_2" type="text" id="<?php echo 'Item_'. $Contador;?>"  value="1" disabled="disabled"/>
                                            <button class="mas" id="boton">+</button>
                                        </div> 
                                    </div>
                                </div> 
                            </div>
                        </article>






                    </div>
                    <?php   $ContadorLabel++;
                }                
            }
            else{//Cuando se viene de un clon
                $ContadorLabel = 1;
                $ContPadre = $Datos["Cont_Pad"];//Trae el ID del contenedor padre
                $ContAClonar = $Datos["Cont_a_Clonar"];//Trae elID del contenedor a Clonar
                foreach($Datos['Opciones'] as $row){
                    $ID_Opcion =  $row['ID_Opcion'];
                    $Producto = $row['producto']; 
                    $Opcion = $row['opcion'];
                    $Precio = $row['precio'];
                    
                    //Se da formato al precio, sin decimales y con separación de miles
                    $Precio = number_format($Precio, 0, ",", ".");  ?>                      
                    <div class="contenedor_95">
                        <div class="contenedor_9 borde_2">
                            <!-- <img class="imagen_2" alt="Imagen de producto" src="../images/Perfil.jpg"/> -->
                            <div class="contenedor_97">
                                <label for="File_1"><span class="icon-image span_8"></span></label>
                            </div>
                        </div>
                        <div>
                            <input class="input_8" type="text" value="<?php echo $Producto;?>"/>
                            <input class="input_8" type="text" value="<?php echo $Opcion;?>"/>
                            <input class="input_8" type="text" value="<?php echo $Precio;?>"/>
                            <label for="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" class="label_4">Agregar</label> 
                        </div> 
                        <input class="input_3" id="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" type="radio" name="opcion" value="<?php echo $ID_Opcion.','.$Producto.','.$Opcion .','.$Precio;?>" onclick="AgregaOpcion(this.form, '<?php echo $ContPadre?>','<?php echo $ContAClonar;?>')"/>
                    </div>
                    <?php 
                $ContadorLabel++;
                }
            }   
            ?>                    
        </div>
    </form>
</section> 
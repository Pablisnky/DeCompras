<!-- Archivo cargado por petición Ajax desde vitrina.php por medio de llamar_Opciones() -->

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/iconos/eliminar/style_eliminar.css"/>

<section class="section_3 section_9" id="Section_3"> 
    <div class="contenedor_90 p_9">
        <!-- $Datos viene de Opciones_C -->
        <h1 class="h1_1 h1_3 h1_4"><?php echo $Datos['Opciones'][0]['seccion']?></h1>
        <span class="icon-cancel-circle span_5" id="Span_3" onclick="TransferirPedido()"></span>
    </div>
    <form id="Formulario">
        <div class="contenedor_13" id="Contenedor_13Js"> 
            <?php   
            $ContadorLabel = 1;
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();
            //$Datos proviene de Opciones_C/index
            $ID_Tienda = $Datos['ID_Tienda'];
            foreach($Datos['Opciones'] as $row){
                $Nombre_Tienda = $row['nombre_Tien'];
                $Slogan_Tienda = $row['slogan_Tien'];
                $ID_Producto = $row['ID_Producto'];
                $ID_Opcion =  $row['ID_Opcion'];
                $Producto = $row['producto']; 
                $Opcion = $row['opcion'];                      
                $Precio = $row['precio'];                
                $Seccion = $row['seccion'];              
                $Fotografia = $row['fotografia'];
   
                //Se da formato al precio, sin decimales y con separación de miles
                $Precio = number_format($Precio, 0, ",", ".");  ?>          
                <div class="contenedor_95" id="<?php echo 'Cont_Producto_' . $ContadorLabel;?>">
                    <div class="contenedor_9">
                        <div class="contenedor_97">
                            <figure class="figure_1">
                                <img class="imagen_6" alt="Fotografia del producto" src="../../public/images/productos/<?php echo $Fotografia;?>"/>
                            </figure>
                        </div>
                    </div>
                    <div style=" width:100%"> 
                        <div style="min-height:80px">

                            <!-- PRODUCTO -->
                            <input class="input_8" type="text" value="<?php echo $Producto;?>" id="<?php echo 'EtiquetaProducto_' . $ContadorLabel;?>" readonly="readonly"/>

                            <!-- OPCION -->
                            <input class="input_8" type="text" value="<?php echo $Opcion;?>" id="<?php echo 'EtiquetaOpcion_' . $ContadorLabel;?>" readonly="readonly"/>
                            
                            <!-- AMPLIAR DETALLES -->
                            <!-- se abre la ventana de detalle de producto utilizando el metodo de enlace con la etiqueta HTML <a></a>-->
                            <?php        
                                // foreach($Datos['variosCaracteristicas'] as $AA) :
                                //     if($AA['ID_Producto'] == $ID_Producto){  ?>
                                         <!-- <a class="input_10" href="<?php// echo RUTA_URL . '/Opciones_C/productoAmpliado/' . $Nombre_Tienda . ',' . $Slogan_Tienda . ',' . $ID_Tienda . ',' . $Producto . ',' . $Opcion . ',' . $Precio . ',' . $Fotografia . ',' . $ID_Producto . ',' .'Etiqueta_' . $ContadorLabel;?>?>" target="_blank" rel="noopener noreferrer">Ampliar detalles</a> -->
                                         <?php
                                //         break; //Solo se toma el primer elemento para mostrar el enlace que es lo que se necesita
                                //     }                                        
                                // endforeach; 
                            ?>                            
                            <!-- se abre la ventana de detalle de producto utilizando el metodo de window.open-->
                            <?php        
                                foreach($Datos['variosCaracteristicas'] as $AA) :
                                    if($AA['ID_Producto'] == $ID_Producto){  ?>
                                        <label class="input_10"  onclick="mostrarDetalles('<?php echo $ContadorLabel?>','<?php echo $Nombre_Tienda?>','<?php echo $Slogan_Tienda?>','<?php echo $ID_Tienda?>','<?php echo $Producto?>','<?php echo $Opcion?>','<?php echo  $Precio?>','<?php echo $Fotografia?>','<?php echo $ID_Producto?>')">Ampliar detalles</label>
                                        <?php
                                        break; //Solo se toma el primer elemento para mostrar el enlace que es lo que se necesita
                                    }                                        
                                endforeach; 
                            ?>          
                            
                            <!-- PRECIO -->
                            <input class="input_8" type="text" value="<?php echo $Precio;?>  Bs." id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" readonly="readonly"/>
                      
                            <?php 
                            //En caso de venir desde buscador se sombreo el producto solicitado en la busqueda y se posiciona de primero entre todos los productos
                            if($Opcion == $Datos['ProductoSelecion']){  ?>
                                <style>
                                    @media (max-width: 800px){
                                        .section_9{/*opciones - cuenta_productos*/
                                            padding-top: 52%;
                                        }
                                        #<?php echo 'Cont_Producto_' . $ContadorLabel;?>{
                                            background-color: var(--OficialClaro);
                                            position: absolute;
                                            top: 5%;
                                            z-index: 1 !important;
                                        }
                                        #<?php echo 'EtiquetaProducto_' . $ContadorLabel;?>{
                                            background-color: var(--OficialClaro);
                                        }
                                        #<?php echo 'EtiquetaOpcion_' . $ContadorLabel;?>{
                                            background-color: var(--OficialClaro);
                                        }
                                        #<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>{
                                            background-color: var(--OficialClaro);
                                        }
                                    }
                                </style> 
                                <?php 
                            }   ?>
                            <!-- Este input es el que se envia al archivo JS por medio de la función agregarOpcion(), en el valor se colocan el caracter _ para usarlo como separardor en  JS-->
                            <input class="ocultar" type="radio" name="opcion" id="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" value="<?php echo $Seccion.','.'_'.$ID_Opcion.','.'_'.$Producto.','.'_'.$Opcion .','.'_'.$Precio;?>" onclick="agregarOpcion(this.form, '<?php echo 'Etiqueta_' . $ContadorLabel;?>','<?php echo 'Cont_Leyenda_' . $ContadorLabel;?>','<?php echo 'Cantidad_' . $ContadorLabel;?>','<?php echo $Seccion;?>','<?php echo 'Seccion_' . $ContadorLabel;?>','<?php echo 'Producto_' . $ContadorLabel;?>','<?php echo 'Opcion_' . $ContadorLabel;?>','<?php echo 'Precio_' . $ContadorLabel;?>','<?php echo 'Total_' . $ContadorLabel;?>','<?php echo 'Leyenda_' . $ContadorLabel;?>','<?php echo 'Cont_Producto_' . $ContadorLabel;?>','<?php echo 'Item_'. $ContadorLabel;?>')"/>
                        </div>
                        
                        <!-- AGREGAR -->
                        <label for="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" class="label_4 borde_1 Label_3js" id="<?php echo 'Etiqueta_' . $ContadorLabel;?>">Agregar</label> 
                    </div> 

                    <div class="contenedor_14" id="<?php echo 'Cont_Leyenda_' . $ContadorLabel;?>">
                        <div class="contenedor_19">
                            <!-- cantidad alimentado desde FuncionesVarias.js agregarOpcion()-->
                            <input type="text" class="input_1e ocultar" id="<?php echo 'Cantidad_' . $ContadorLabel;?>"/>
                            <!-- seccion -->
                            <input type="text" class="input_1g ocultar" name="seccion" id="<?php echo 'Seccion_' . $ContadorLabel;?>"/>
                            <!-- producto - alimentado desde FuncionesVarias.js agregarOpcion() -->
                            <input type="text" class="input_1a ocultar" name="Desc_Producto" id="<?php echo 'Producto_' . $ContadorLabel;?>"/>
                            <!-- opcion alimentado desde FuncionesVarias.js agregarOpcion()-->
                            <input type="text" class="input_1c ocultar" name="" id="<?php echo 'Opcion_' . $ContadorLabel;?>"/>
                            <!-- ID_Opcion --> 
                            <!-- <input type="text" class="input_1b"/> -->
                            <!-- Precio - alimentado desde FuncionesVarias.js agregarOpcion() -->
                            <input type="text" class="input_1d ocultar" id="<?php echo 'Precio_' . $ContadorLabel;?>"/>
                            <!-- Total - alimentado desde FuncionesVarias.js agregarOpcion()-->
                            <input type="text" class="input_1f ocultar" id="<?php echo 'Total_' . $ContadorLabel;?>"/>
                            <!-- Leyenda - alimentado desde FuncionesVarias.js agregarOpcion() -->
                            <input class="input_2a" type="text" name="leyenda" id="<?php echo 'Leyenda_'. $ContadorLabel;?>"/>
                        </div> 
                        <div class="contenedor_16">
                            <label class="menos">-</label>
                            <input class="input_2" type="text" id="<?php echo 'Item_'. $ContadorLabel;?>"  value="1" />
                            <label class="mas">+</label>
                        </div> 
                    </div>
                </div>
                <?php   
                $ContadorLabel++;
            }        
        ?>                    
        </div>
    </form>
</section>  


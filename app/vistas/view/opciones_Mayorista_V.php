<!-- Archivo cargado en div id= "Mostrar_Opciones_Mayorista" en vitrina_Mayorista_V.php por petición Ajax desde por medio de llamar_Opciones_Mayorista()-->

<section class="section_3 section_9" id="Section_3"> 
    <div class="contenedor_90 p_9 borde_1">
        <div class="contenedor_159" id="Span_3">
            <!-- ICONO FLECHA ATRAS -->
            <i class="fas fa-arrow-left" style="display: inline;"></i>
            <label class="label_9" id="Label_9" style="display: inline;">Secciones</label>
        </div>        
        <h1 class="h1_1 h1_3"><?php echo $Datos['Opcionesmay'][0]['seccionMay']?></h1>
    </div>
    <div class="contenedor_156">
        <div class="contenedor_158">
            <form id="Formulario">
                <div class="contenedor_13" id="Contenedor_14Js"> 
                    <?php   
                    $ContadorLabel = 1;
                    $ID_Tienda = $Datos['ID_Mayorista'];
                    foreach($Datos['Opcionesmay'] as $row) :
                        $Nombre_Tienda = $row['nombreMay'];
                        $ID_Producto = $row['ID_ProductoMay'];
                        $ID_Opcion =  $row['ID_OpcionMay'];
                        $Producto = $row['productoMay']; 
                        $Opcion = $row['opcionMay'];                       
                        $PrecioBolivar = $row['precioBolivarMay'];         
                        $PrecioDolar = $row['precioDolarMay']; 
                        $Disponible = $row['disponibleMay'];
                        $Existencia = $row['cantidadMay']; 
                        $Seccion = $row['seccionMay'];

                        //Se da formato al precio, sin decimales y con separación de miles
                        settype($PrecioBolivar, "float");
                        settype($PrecioDolar, "float");
                        $PrecioBolivar = number_format($PrecioBolivar, 2, ",", "."); 
                        $PrecioDolar = number_format($PrecioDolar, 2, ",", ".");   ?>  
                        
                        <div class="contenedor_95" id="<?php echo 'Cont_Producto_' . $ContadorLabel;?>">
                            
                            <!-- IMAGEN -->
                            <div class="contOpciones">
                                <!-- se colocan el caracter | para usarlo como separardor en Opciones_C/productoAmpliado debido a que el usuario puede usar comas o punto y comas en el texto de opciones o del producto.  -->
                                <?php 
                                $Separador = '|';
                                // foreach($Datos['Opcionesmay'] as $row) : 
                                    // if($row['ID_Producto'] == $ID_Producto) :
                                        $FotoPrincipal = $row['nombre_imgMay'];   
                                        if($FotoPrincipal != 'imagen.png'){ ?> 
                                            <div class="contenedor_97" onclick="mostrarDetalles('<?php echo $ContadorLabel.$Separador?>','<?php echo $Nombre_Tienda.$Separador?>','<?php echo $ID_Tienda.$Separador?>','<?php echo $Producto.$Separador?>','<?php echo $Opcion.$Separador?>','<?php echo $PrecioBolivar.$Separador?>','<?php echo $FotoPrincipal.$Separador;?>','<?php echo $ID_Producto.$Separador?>','<?php echo $PrecioDolar.$Separador?>','<?php echo $Existencia.$Separador?>','<?php echo $Disponible?>')">
                                                <figure>
                                                    <img class="contOpciones__img" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/images/proveedor/Don_Rigo/<?php echo $FotoPrincipal;?>"/> 
                                                </figure>
                                            </div>  <?php 
                                        }
                                        else{   ?>
                                            <figure>
                                                <img class="contOpciones__img" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/images/proveedor/Don_Rigo/imagen.png"/> 
                                            </figure>
                                            <?php
                                        }   
                                    // endif;   
                                // endforeach;   

                               require(RUTA_APP . "/vistas/complementos/existencia.php"); ?>
                            </div>
                                        
                            <div> 
                                <div style="min-height:80px">
                                    <div style="height: 75px;">
                                        <!-- PRODUCTO -->
                                        <label class="input_8 input_8D hyphen" id="<?php echo 'EtiquetaProducto_' . $ContadorLabel;?>"><?php echo $Producto;?></label>
    
                                        <!-- OPCION -->
                                        <label class="input_8 input_8C hyphen" id="<?php echo 'EtiquetaOpcion_' . $ContadorLabel;?>"><?php echo $Opcion;?></label>
                                    </div>     
                                    
                                    <!-- PRECIO -->
                                    <label class="input_8 input_8A" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >Bs. <?php echo $PrecioBolivar;?></label>

                                    <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" >$ <?php echo $PrecioDolar;?></label>
                            
                                    <!-- Este input es el que se envia al archivo JS por medio de la función agregarOpcion(), en el valor se colocan el caracter _ para usarlo como separardor en  JS-->
                                    <input class="ocultar" type="radio" name="opcion" id="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" value="<?php echo $Seccion.','.'_'.$ID_Opcion.','.'_'.$Producto.','.'_'.$Opcion .','.'_'.$PrecioBolivar;?>" onclick="agregarOpcion(this.form, '<?php echo 'Etiqueta_' . $ContadorLabel;?>','<?php echo 'Cont_Leyenda_' . $ContadorLabel;?>','<?php echo 'Cantidad_' . $ContadorLabel;?>','<?php echo $Seccion;?>','<?php echo 'Seccion_' . $ContadorLabel;?>','<?php echo 'Producto_' . $ContadorLabel;?>','<?php echo 'Opcion_' . $ContadorLabel;?>','<?php echo 'Precio_' . $ContadorLabel;?>','<?php echo 'Total_' . $ContadorLabel;?>','<?php echo 'Leyenda_' . $ContadorLabel;?>','<?php echo 'Cont_Producto_' . $ContadorLabel;?>','<?php echo 'Item_'. $ContadorLabel;?>','<?php echo $Existencia;?>','<?php echo 'ID_BotonMas_'. $ContadorLabel;?>','<?php echo 'ID_BloquearMas_'. $ContadorLabel;?>')"/>
                                </div>
                                                                
                                <!-- BOTON AGREGAR -->
                                <?php if($NoAgrear == true){ ?><!--SINO HAY PRODUCTOS EN INVENTARIO SE DESABILITA-->
                                    <label class="label_4 label_4--innabilitado">Agregar</label> 
                                    <?php
                                }  
                                else{ ?><!--SI HAY PRODUCTOS EN INVENTARIO SE HABILITA-->
                                    <label for="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" class="label_4 borde_1 Label_3js" id="<?php echo 'Etiqueta_' . $ContadorLabel;?>">Agregar</label> 
                                    <?php
                                }   ?>
                            </div> 

                            <div class="contenedor_14" id="<?php echo 'Cont_Leyenda_' . $ContadorLabel;?>">
                            
                                <!-- LEYENDA -->
                                <div class="contenedor_19">
                                    <!-- cantidad alimentado desde E_Vitrina_Mayorista.js agregarOpcion()-->
                                    <input type="text" class="input_1e ocultar" id="<?php echo 'Cantidad_' . $ContadorLabel;?>"/>
                                    <!-- seccion -->
                                    <input type="text" class="input_1g ocultar" name="seccion" id="<?php echo 'Seccion_' . $ContadorLabel;?>"/>
                                    <!-- producto - alimentado desde E_Vitrina.js agregarOpcion() -->
                                    <input type="text" class="input_1a ocultar" name="Desc_Producto" id="<?php echo 'Producto_' . $ContadorLabel;?>"/>
                                    <!-- opcion alimentado desde E_Vitrina.js agregarOpcion()-->
                                    <input type="text" class="input_1c ocultar" name="" id="<?php echo 'Opcion_' . $ContadorLabel;?>"/>
                                    <!-- Precio - alimentado desde E_Vitrina.js agregarOpcion() -->
                                    <input type="text" class="input_1d ocultar" id="<?php echo 'Precio_' . $ContadorLabel;?>"/>
                                    <!-- Total - alimentado desde E_Vitrina.js agregarOpcion()-->
                                    <input type="text" class="input_1f ocultar" id="<?php echo 'Total_' . $ContadorLabel;?>"/>
                                    <!-- LEYENDA - alimentado desde E_Vitrina.js agregarOpcion() -->
                                    <input class="input_2a" type="text" name="leyenda" id="<?php echo 'Leyenda_'. $ContadorLabel;?>"/>
                                </div> 

                                <!-- BOTON MAS Y MENOS -->
                                <div class="contenedor_16">
                                    <label class="menos MenosJS" id="<?php echo 'ID_BotonMenos_'. $ContadorLabel;?>">-</label>
                                    <input class="input_2" type="text" id="<?php echo 'Item_'. $ContadorLabel;?>"  value="1"/>
                                    <label class="mas MasJS" id="<?php echo 'ID_BotonMas_'. $ContadorLabel;?>">+</label>

                                    <i class="fas fa-ban icono_7" id="<?php echo 'ID_BloquearMas_'. $ContadorLabel;?>" onclick="BotonBloqueado()"></i>
                                    <input class="ocultar BloquearMasJS"  type="text" value="<?php echo $Existencia?>"/>
                                </div> 
                            </div>
                        </div>
                        <?php   
                        $ContadorLabel++;
                    endforeach;   ?>                    
                </div>
            </form>
        </div>
    </div>
</section>
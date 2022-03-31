<?php     
//se invoca sesion con el ID_AfiliadoMAy creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){
//     $ID_Mayorista = $_SESSION["ID_Mayorista"];    
    ?>

    <section class="section_3 section_9">
        <div class="contenedor_90 contenedor_90--mayorista">
            <h2 class="h2_9">Sección</h2>
            <h3 class="h3_9">( <?php echo $Datos['seccionInvocada'];?> )</h3>
            <?php 
                if($Datos['seccionInvocada'] != 'Todos' ){ 
                    foreach($Datos['seccionesMay'] as $Key) :
                        if($Key['seccionMay'] == $Datos['seccionInvocada'] ){
                                ?>
                            <span class="borde_1" style="display: inline-block; float: right; margin-right: 20px" onclick="ImagenSeccionMayorista(<?php echo $Key['ID_SeccionMay'];?>)"><i class="fas fa-pencil-alt icono_4"></i></span>
                            <?php
                        }
                    endforeach;
                }
                ?>
        </div>
        <div class="contenedor_13 contenedor_13--productos"> 
            <?php 
            $Contador = 1; 
    
            //$Datos viene de Mayorista_C/Productos
            foreach($Datos['productos'] as $arr) :
                $Seccion = $arr["seccionMay"]; 
                $Producto = $arr["productoMay"]; 
                $Opcion = $arr["opcionMay"];
                $PrecioBolivar = number_format($arr["precioBolivarMay"], "2", ",", ".");//Se cambia el formato del precio, viene sin separador de miles
                $PrecioDolar = number_format($arr["precioDolarMay"], "2", ",", ".");
                $Disponible = $arr['disponibleMay'];
                $Existencia = $arr["cantidadMay"];
                $ID_Producto = $arr["ID_ProductoMay"];
                $ID_Opcion = $arr["ID_OpcionMay"];
                $FotoProducto = $arr['nombre_imgMay'];
                ?>

                <div class="contenedor_95" id="<?php echo 'Cont_Producto_' . $Contador;?>">

                        <!-- IMAGEN PRODUCTO -->
                    <div class="contenedor_9 contenedor_9--pointer">
                        <?php
                        if($FotoProducto == 'imagen.png'){ ?>
                            <div class="contenedor_142" style="background-image: url('<?php echo RUTA_URL?>/public/images/proveedor/Don_Rigo/<?php echo $FotoProducto;?>')">
                                <input class="input_14 borde_1" type="text" value="<?php echo $Contador;?>"/>
                            </div> 
                            <?php
                        }
                        else{   ?>
                            <div class="contenedor_142" style="background-image: url('<?php echo RUTA_URL?>/public/images/proveedor/Don_Rigo/productos/<?php echo $FotoProducto;?>')">
                                <input class="input_14 borde_1" type="text" value="<?php echo $Contador;?>"/>
                            </div> 
                            <?php
                        }   ?>
                    </div>
                    <div>
                        <!-- PRODUCTO -->
                        <label class="input_8 input_8D hyphen" id="<?php echo 'EtiquetaProducto_' . $Contador;?>"><?php echo $Producto;?></label>
                        <!-- <input class="input_8 input_8D" type="text" readonly="readonly" id="<?php //echo 'EtiquetaProducto_' . $Contador;?>" value="<?php //echo $Producto;?>"/> -->

                        <!-- OPCION -->                        
                        <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" ><?php echo $Opcion;?></label>
                            
                        <!-- UNIDADES EN EXISTNCIA -->    
                        <?php
                        if($Existencia == 1) :  ?>                   
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >Existencia: <?php echo $Existencia;?> Ud.</label> <?php
                        elseif($Existencia > 1) :   ?>
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >Existencia: <?php echo $Existencia;?> Uds.</label> <?php
                        elseif($Disponible == 1) :   ?>
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >En existencia</label> <?php
                        elseif($Disponible == 0) :   ?>
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >Existencia: Agotado</label>
                            <?php
                        endif;  ?>

                        <!-- SECCION -->
                        <label class="" ><?php echo $Seccion;?></label>



                        <!-- PRECIO -->
                        <label class="input_8 input_8A" id="<?php echo 'EtiquetaPrecio_' . $Contador;?>">Bs.<?php echo $PrecioBolivar;?></label>
                        <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $Contador;?>" > $ <?php echo $PrecioDolar;?></label>

                        <!-- ACTUALIZAR - ELIMINAR -->
                        <div class="contenedor_96">                
                            <a class="a_9" href="<?php echo RUTA_URL?>/CuentaMayorista_C/actualizarProductoMay/<?php echo $ID_Producto;?>,<?php echo $Opcion;?>">Actualizar</a>
                            
                            <a class="a_9" href="<?php echo RUTA_URL . '/CuentaMayorista_C/eliminarProductoMay/' . $ID_Producto . ',' . $ID_Opcion . ',' . $Seccion?>">Eliminar</a>
                        </div>
                        
                        <?php 
                            //En caso de venir desde actualizar el producto se posiciona de primero entre todos los productos de la sección
                            if($Datos['id_productoAgregado'] == $ID_Producto){ ?>
                                <style>
                                    @media (max-width: 800px){
                                        .section_9{
                                            padding-top: 85%;
                                        }
                                        #<?php echo 'Cont_Producto_' . $Contador;?>{
                                            position: absolute;
                                            height: 8%;
                                            top: 120px;
                                        }
                                    }
                                </style> 
                                <?php 
                            }   
                        ?>
                    </div>
                </div>
                <?php 
                $Contador ++;   
            endforeach;     ?>  
        </div>
    </section>
       
    <script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_ProductoMayorista.js?v=' . rand();?>"></script>

    <?php
// }
// else{
//     header("location:" . RUTA_URL. "/Inicio_C");
// }   ?>
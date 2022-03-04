<?php     
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];    
    ?>

    <section class="section_3 section_9">
        <div class="contenedor_90 contenedor_91">
            <h2 class="h2_9">Sección</h2>
            <!-- Mediante operador ternario -->
            <?php $Datos['Seccion'] != 'Todos' ? $Datos['Seccion'] : 'Todos';  ?>

            <h3 class="h3_9">( <?php echo $Datos['Seccion'];?> )</h3>
        </div>
        <div class="contenedor_13 contenedor_13--productos"> 
            <?php 
                if($Datos['ID_Seccion'] != 'NoAplica'){ ?>
                    <div class="contenedor_13--Primeralinea">
                        <label class="boton" onclick="ImagenSeccion(<?php echo $Datos['ID_Seccion'];?>)">Imagen de sección</label>
                    </div>
                    <?php
                }
            $Contador = 1; 
    
            //$Datos viene de Cuenta_C/Productos
            foreach($Datos['productos'] as $arr) :
                $Seccion = $arr["seccion"]; 
                $Producto = $arr["producto"]; 
                $Destacar = $arr["destacar"];
                $Opcion = $arr["opcion"];
                $PrecioBolivar = number_format($arr["precioBolivar"], "2", ",", ".");//Se cambia el formato del precio, viene sin separador de miles
                $PrecioDolar = number_format($arr["precioDolar"], "2", ",", ".");
                $Disponible = $arr['disponible'];
                $Existencia = $arr["cantidad"];
                $ID_Producto = $arr["ID_Producto"];
                $ID_Opcion = $arr["ID_Opcion"];
                $FotoPrincipal = $arr['nombre_img'];

                // echo "<pre>";
                // print_r($Datos['productos']);
                // echo "</pre>";
                // exit;

                //Esta condición es para verificar si se viene desde el buscador
                if($Datos['Apunta'] == $Opcion){   ?>
                    <style>
                        @media (max-width: 800px){
                            .section_9{/*opciones - cuenta_productos*/
                                padding-top: 50%;
                            }
                            #<?php echo 'Cont_Producto_' . $Contador;?>{
                                background-color: var(--OficialClaro);
                                position: absolute;
                                top: 8%;
                                z-index: 1 !important;
                            }
                            #<?php echo 'EtiquetaProducto_' . $Contador;?>{
                                background-color: var(--OficialClaro);
                            }
                            #<?php echo 'EtiquetaOpcion_' . $Contador;?>{
                                background-color: var(--OficialClaro);
                            }
                            #<?php echo 'EtiquetaPrecio_' . $Contador;?>{
                                background-color: var(--OficialClaro);
                            }
                        }
                    </style> 
                    <?php
                }   ?>

                <div class="contenedor_95" id="<?php echo 'Cont_Producto_' . $Contador;?>">
                        <!-- IMAGEN PRINCIPAL -->
                    <div class="contenedor_9 contenedor_9--pointer">
                        <div class="contenedor_142" style="background-image: url('<?php echo RUTA_URL?>/public/images/productos/<?php echo $FotoPrincipal;?>')">
                            <input class="input_14 borde_1" type="text" value="<?php echo $Contador;?>"/>
                        </div>
                            <?php
                            if($Destacar == 1){   ?>
                                <label class="contenedor_9--label borde_3">Producto destacado</label>
                                <?php
                            }   ?>
                    </div>
                    <div>
                        <!-- PRODUCTO -->
                        <input class="input_8 input_8D" type="text" readonly="readonly" id="<?php echo 'EtiquetaProducto_' . $Contador;?>" value="<?php echo $Producto;?>"/>

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

                        <!-- PRECIO -->
                        <label class="input_8 input_8A" id="<?php echo 'EtiquetaPrecio_' . $Contador;?>">Bs.<?php echo $PrecioBolivar;?></label>
                        <label class="input_8" id="<?php echo 'EtiquetaPrecio_' . $ContadorLabel;?>" > $ <?php echo $PrecioDolar;?></label>

                        <!-- ACTUALIZAR - ELIMINAR -->
                        <div class="contenedor_96">                
                            <a class="a_9" href="<?php echo RUTA_URL?>/Cuenta_C/actualizarProducto/<?php echo $ID_Producto;?>,<?php echo $Opcion;?>">Actualizar</a>
                            
                            <a class="a_9" href="<?php echo RUTA_URL . '/Cuenta_C/eliminarProducto/' . $ID_Producto . ',' . $ID_Opcion . ',' . $Seccion?>">Eliminar</a>
                        </div>
                    </div>
                </div>
                <?php 
                $Contador ++;   
            endforeach;     ?>  
        </div>
    </section>
       
    <script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_Producto.js?v=' . rand();?>"></script>

    <?php
}
else{
    header("location:" . RUTA_URL. "/Inicio_C");
}   ?>
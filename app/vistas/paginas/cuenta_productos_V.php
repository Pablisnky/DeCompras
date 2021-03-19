<?php     
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];    
    ?>

    <section class="section_3 section_9">
        <div class="contenedor_90 contenedor_91">
            <h2 class="h2_9">Sección</h2>
            <?php
           //Mediante operador ternario
            $Datos['Seccion'] != 'Todos' ? $Datos['Seccion']  : 'Todos';  ?>
            <h3 class="h3_9">( <?php echo $Datos['Seccion'] ;?> )</h3>
        </div>
        <div class="contenedor_13 contenedor_13--productos"> 
            <?php
            $Contador = 1; 
    
            //$Datos viene de Cuenta_C/Productos
            foreach($Datos['productos'] as $arr) :
                $Seccion = $arr["seccion"]; 
                $Producto = $arr["producto"];
                $Opcion = $arr["opcion"];
                $PrecioBolivar = number_format($arr["precioBolivar"], "0", "", ".");//Se cambia el formato del precio, viene sin separador de miles; 0= sin decimales, "" =sin coma de decimales
                $PrecioDolar = $arr["precioDolar"];
                $Disponible = $arr['disponible'];
                $Existencia = $arr["cantidad"];
                $ID_Producto = $arr["ID_Producto"];
                $ID_Opcion = $arr["ID_Opcion"];
                $FotoPrincipal = $arr['nombre_img'];
                $FotoSeccion = $arr['fotoSeccion'];

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
                            if($FotoSeccion == 1){   ?>
                                <label class="contenedor_9--label borde_3">Imagen de sección</label>
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
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >Existencia: <?php echo $Existencia;?> Unidad</label> <?php
                        elseif($Existencia > 1) :   ?>
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >Existencia: <?php echo $Existencia;?> Unidades</label> <?php
                        elseif($Disponible == 1) :   ?>
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >En existencia</label> <?php
                        elseif($Disponible == 0) :   ?>
                            <label class="input_8 input_8C" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>" >Existencia: Agotado</label>
                            <?php
                        endif;  ?>

                        <?php // require(RUTA_APP . "/vistas/complementos/existencia.php");  ?>












                        

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
       
    <script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>

    <?php
}
else{
    redireccionar("/Login_C/");
}   ?>
<?php     
//se invoca sesion con el ID_AfiliadoMAy creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){
//     $ID_Mayorista = $_SESSION["ID_Mayorista"];    
    ?>

    <section class="section_3 section_9">
        <div class="contenedor_90 contenedor_91">
            <h2 class="h2_9">Sección</h2>
            <!-- Mediante operador ternario -->
            <?php //$Datos['seccionesMay'] != 'Todos' ? $Datos['seccionesMay'] : 'Todos';  ?>

            <h3 class="h3_9">( <?php echo $Datos['seccionInvocada'];?> )</h3>
        </div>
        <div class="contenedor_13 contenedor_13--productos"> 
            <?php 
                // if($Datos['ID_SeccionMay'] != 'NoAplica'){ ?>
                     <!-- <div class="contenedor_13--Primeralinea">
                         <label class="boton" onclick="ImagenSeccion(<?php echo $Datos['ID_SeccionMay'];?>)">Imagen de sección</label>
                     </div> -->
                    <?php
                // }
            $Contador = 1; 
    
            //$Datos viene de Mayorista_C/Productos
            foreach($Datos['productos'] as $arr) :
                $Seccion = $arr["seccionMay"]; 
                $Producto = $arr["productoMay"]; 
                $Destacar = $arr["destacarMay"];
                $Opcion = $arr["opcionMay"];
                $PrecioBolivar = number_format($arr["precioBolivarMay"], "2", ",", ".");//Se cambia el formato del precio, viene sin separador de miles
                $PrecioDolar = number_format($arr["precioDolarMay"], "2", ",", ".");
                $Disponible = $arr['disponibleMay'];
                $Existencia = $arr["cantidadMay"];
                $ID_Producto = $arr["ID_ProductoMay"];
                $ID_Opcion = $arr["ID_OpcionMay"];
                $FotoProducto = $arr['nombre_imgMay'];

                // echo "<pre>";
                // print_r($Datos['productos']);
                // echo "</pre>";
                // exit;
                ?>

                <div class="contenedor_95" id="<?php echo 'Cont_Producto_' . $Contador;?>">
                        <!-- IMAGEN PRINCIPAL -->
                    <div class="contenedor_9 contenedor_9--pointer">
                        <div class="contenedor_142" style="background-image: url('<?php echo RUTA_URL?>/public/images/proveedor/Don_Rigo/<?php echo $FotoProducto;?>')">
                            <input class="input_14 borde_1" type="text" value="<?php echo $Contador;?>"/>
                        </div>
                            <?php
                            // if($Destacar == 1){   ?>
                                <!-- <label class="contenedor_9--label borde_3">Producto destacado</label> -->
                                <?php
                            // }   
                            ?>
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
                            <a class="a_9" href="<?php echo RUTA_URL?>/Mayorista_C/actualizarProductoMay/<?php echo $ID_Producto;?>,<?php echo $Opcion;?>">Actualizar</a>
                            
                            <a class="a_9" href="<?php echo RUTA_URL . '/Mayorista_C/eliminarProductoMay/' . $ID_Producto . ',' . $ID_Opcion . ',' . $Seccion?>">Eliminar</a>
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
// }
// else{
//     header("location:" . RUTA_URL. "/Inicio_C");
// }   ?>
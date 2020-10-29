<?php     
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){

        $ID_Tienda = $_SESSION["ID_Tienda"];    
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>

        <section class="section_3 section_9">
            <div class="contenedor_90 contenedor_91">
                <h2 class="h2_9">Productos ofertados</h2>
                <?php
                // echo "<pre>";
                // print_r($Datos);
                // echo "</pre>";
                // exit();

                //Mediante operador ternario
                $Datos['Seccion'] != 'Todos' ? $Datos['Seccion']  : 'Todos';    ?>
                <h3 class="h3_9">( <?php echo $Datos['Seccion'] ;?> )</h3>
            </div>
            <div class="contenedor_13"> 
                <?php
                $Contador = 1; 
        
                //$Datos viene de Cuenta_C/Productos
                foreach($Datos['productos'] as $arr) :
                    $Seccion = $arr["seccion"];
                    $Producto = $arr["producto"];
                    $Opcion = $arr["opcion"];
                    $Precio = number_format($arr["precio"], "0", "", ".");//Se cambia el formato del precio, viene sin separador de miles; 0= sin decimales, "" =sin coma de decimales
                    $ID_Producto = $arr["ID_Producto"];
                    $ID_Opcion = $arr["ID_Opcion"];
                    $Fotografia = $arr['fotografia'];

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
                    } ?>
                    <div class="contenedor_95" id="<?php echo 'Cont_Producto_' . $Contador;?>">
                        <div class="contenedor_9">
                            <div class="contenedor_97">
                                <input class="input_14 borde_1" type="text" value="<?php echo $Contador;?>"/>
                                <figure>
                                    <img class="imagen_6" id="blah" alt="Fotografia del producto" src="../../public/images/productos/<?php echo $Fotografia;?>"/>
                                </figure>
                            </div>
                        </div>
                        <div>
                            <!-- Producto -->
                            <input class="input_8" type="text" value="<?php echo $Producto;?>" readonly="readonly" id="<?php echo 'EtiquetaProducto_' . $Contador;?>"/>

                            <!-- Opcion -->
                            <input class="input_8" type="text" value="<?php echo $Opcion;?>" readonly="readonly" id="<?php echo 'EtiquetaOpcion_' . $Contador;?>"/>

                            <!-- Especificacion -->
                            <?php                  
                                foreach($Datos['variosCaracteristicas'] as $AA) :
                                    if($AA['ID_Producto'] == $ID_Producto){  ?>
                                        <a class="input_10" href="<?php echo RUTA_URL . '/Opciones_C/productoAmpliado/' . $Nombre_Tienda . ',' . $Slogan_Tienda . ',' . $ID_Tienda . ',' . $Producto . ',' . $Opcion . ',' . $Precio . ',' . $Fotografia . ',' . $ID_Producto ?>" target="_blank" rel="noopener noreferrer">Ver detalles</a>
                                        <?php
                                        break; //Solo se toma el primer elemento para mostrar el enlace que es lo que se necesita
                                    }                                           
                                endforeach; 
                            ?>

                            <!-- Precio -->
                            <input class="input_8" type="text" value="<?php echo $Precio;?> Bs." readonly="readonly" id="<?php echo 'EtiquetaPrecio_' . $Contador;?>"/>

                            <div class="contenedor_96">                
                                <a class="a_9" href="<?php echo RUTA_URL?>/Cuenta_C/actualizarProducto/<?php echo $ID_Producto;?>,<?php echo $Opcion;?>">Actualizar</a>
                                <a class="a_9" href="<?php echo RUTA_URL . '/Cuenta_C/eliminarProducto/' . $ID_Producto . ',' . $ID_Opcion . ',' . $Seccion?>">Eliminar</a>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $Contador ++;   
                endforeach;  
                ?>  
            </div>
        </section>
    
    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_productos.js';?>"></script>   
    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js'?>"></script>

    <?php
}
else{
    redireccionar("/Login_C/");
}   ?>
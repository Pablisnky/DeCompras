<?php 
    $ID_Tienda = $_SESSION["ID_Tienda"];
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php"); 

    //Se verifica que la sesion del usuario halla sido creada y exista
    if(isset($_SESSION["ID_Tienda"])){ 
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
        
        <section class="section_5">
            <div class="contenedor_13"> 
                <h1 class="h1_1 h1_6">Productos ofertados</h1>
                <?php
                $Contador = 1;
                //$Datos viene del metodo consultarProductosTienda() en Cuenta_C
                foreach($Datos['productos'] as $arr) :
                    $Seccion = $arr["seccion"];
                    $Producto = $arr["producto"];
                    $Opcion = $arr["opcion"];
                    $Precio = $arr["precio"];
                    $ID_Producto = $arr["ID_Producto"];
                    $ID_Opcion = $arr["ID_Opcion"];
                    $Fotografia = $arr['fotografia'];
                            ?>
                    <!-- <input class="input_6 input_14" type="text" value="<?php echo $Contador;?>"/> -->
                    <div class="contenedor_95 contenedor_101">
                        <div class="contenedor_9 "><!--borde_2-->
                            <div class="contenedor_97">
                                <img class="imagen_6" id="blah" alt="Fotografia del producto" src="http://localhost/proyectos/PidoRapido/public/images/productos/<?php echo $Fotografia;?>"/>
                            </div>
                        </div>
                        <div>
                            <input class="input_8" type="text" value="<?php echo $Producto;?>"/>
                            <input class="input_8" type="text" value="<?php echo $Opcion;?>"/>
                            <input class="input_8" type="text" value="<?php echo $Precio;?>"/>
                            <div class="contenedor_96">                
                                <a class="a_9" href="<?php echo RUTA_URL . '/Cuenta_C/actualizarProducto/' . $ID_Producto;?>">Actualizar</a>
                                <a class="a_9" href="<?php echo RUTA_URL . '/Cuenta_C/eliminarProducto/' . $ID_Producto . ',' . $ID_Opcion?>">Eliminar</a>
                            </div>
                        </div>
                    </div>
                    <?php  
                    $Contador ++;   
                endforeach;  
                ?>  
            </div>
        </section>
        <?php
    }
    else{
        //la sesion no existe y se redirige a la pagina de inicio
        header("location:" . RUTA_URL);
    }
    
    include(RUTA_APP . "/vistas/inc/footer.php");
    ?>
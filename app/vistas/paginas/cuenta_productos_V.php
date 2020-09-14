<?php 
    // $ID_Tienda = $_SESSION["ID_Tienda"];
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php"); 

    //Se verifica que la sesion del usuario halla sido creada y exista, esto se hizo en login_C
    if(isset($_SESSION["ID_Tienda"])){ 
        ?>
        <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>

        <?php  
        // $Datos['notificacion'] viene desde Cuenta_C/productos
        if($Datos['notificacion'] == 0){  ?>
            <section class="section_3 section_10" id="Section_10">
                <div class="contenedor_103">
                    <h1 class="h1_7">Felicitaciones</h1>
                    <div class="contenedor_104">
                        <div class="contenedor_97">
                            <img class="imagen_7" alt="Logo tienda" src="<?php echo RUTA_URL;?>/public/images/tiendas/tienda.png"/>
                        </div>
                        <div>
                            <h1 class="h1_1">Tú tienda digital ha sido creada.</h1>
                            <p class="p_6">Tienes 15 días completamente libre de pagos</p> 
                            <p class="p_6">Evalua la experiencia y descubre el plan que se ajusta a tus necesidades.</p>
                        </div>
                    </div>
                    <label class="label_21 boton" id="Label_6">Cerrar</label>
                </div>
            </section>  
            <?php
        }   ?>

        <section class="section_5">
            <div class="contenedor_13"> 
                <h1 class="h1_1 h1_6">Productos ofertados</h1><!-- (<?php //echo $Datos['productos'][0]['seccion'];?>)-->
                <?php
                $Contador = 1;
                //$Datos viene del metodo consultarProductosTienda() en Cuenta_C
                foreach($Datos['productos'] as $arr) :
                    $Seccion = $arr["seccion"];
                    $Producto = $arr["producto"];
                    $Opcion = $arr["opcion"];
                    $Precio = number_format($arr["precio"], "0", "", ".");//Se cambia el formato del precio, viene sin separador de miles; 0= sin decimales, "" =sin coma de decimales
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
                            <input class="input_8" type="text" value="<?php echo $Producto;?>" readonly="readonly"/>
                            <input class="input_8" type="text" value="<?php echo $Opcion;?>" readonly="readonly"/>
                            <input class="input_8" type="text" value="<?php echo $Precio;?> Bs." readonly="readonly"/>
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
    }   ?>
    
<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
  
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_productos.js';?>"></script>   
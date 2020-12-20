<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/telefono/style_telefono.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/ubicacion/style_ubicacion.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/iconos/eliminar/style_eliminar.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/iconos/checked/style_checked.css"/>

<section class="section_11">
    <div class="contenedor_90">
        <h1 class="h1_1 h1_3 h1_4">Tiendas de <?php echo $Datos[0]['categoria']?></h1>
        <div>
            <a href="<?php echo RUTA_URL . '/Inicio_C#Contenedor_88';?>"><span class="icon-cancel-circle span_5"></span></a>
        </div>
    </div>
    <div class='contenedor_10'>
        <?php
        // echo "<pre>";
        // print_r($Datos);
        // echo "</pre>";
        // exit();
        $Contador = 1;
        foreach($Datos as $row) :
            $ID_Tienda = $row['ID_Tienda'];
            $Nombre = $row['nombre_Tien'];
            $Direccion = $row['direccion_Tien'];
            $Telefono = $row['telefono_Tien'];
            $Fotografia = $row['fotografia_Tien'];
            ?> 
            <section style=" margin-top: -5%;">
                <div class="contenedor_15 borde_1" id="<?php echo $ID_Tienda;?>" onclick="tiendas('<?php echo $ID_Tienda;?>','<?php echo $Nombre;?>', 'NoNecesario_1', 'NoNecesario_2')"><!--El argumento no necesario es debido a que se comparte el controlador index en Vitrina_C el cual recibe cuatro argumentos --> 
                    <?php                    
                    if($Fotografia == 'tienda.png'){    ?> 
                        <div class="contenedor_120 contenedor_140" style="background-image: url('<?php echo RUTA_URL?>/public/images/tiendas/<?php echo $Fotografia;?>')"> 
                        </div>
                        <?php
                    } 
                    else{  ?>
                        <div class="contenedor_120" style="background-image: url('<?php echo RUTA_URL?>/public/images/tiendas/<?php echo $Fotografia;?>')"> 
                        </div>
                        <?php
                    }   ?>
                        <p class="p_3"><?php echo $Nombre?></p>
                    <div class="contenedor_17">
                        <div>
                        <h3 class="h3_4">Reputación</h3></div>
                        <div style="width: 33%">
                            <p class="p_2 p_18">Clientes satisfechos</p>
                            <label>98%</label>
                        </div>
                        <div style="width:33%">
                            <p class="p_2 p_18">Pedidos despachados</p>
                            <label>24</label>
                        </div>
                        <div style="width:33%">
                            <p class="p_2 p_18">Disputas en curso</p>
                            <label>0</label>
                        </div>
                    </div>
                    <div class="contenedor_163">
                        <h3 class="h3_4">Metodos de pago aceptados</h3>
                        <?php
                        // if($Transferencia != ''){ ?>
                            <div class="contenedor_161">
                                <p class="p_19">Tranferencia bancaria</p><span class="icon-checkmark"></span>
                            </div>
                            <?php
                        // }   

                        // if($PagoMovil == ''){ ?>
                        <div class="contenedor_161">
                            <p class="p_19">Pago movil</p><span class="icon-checkmark"></span>
                        </div>
                            <?php
                        // }   ?>

                        <!-- <div class="contenedor_161">
                            <p class="p_19">Pago en destino</p><span class="icon-checkmark"></span>
                        </div> -->
                        <div class="contenedor_161">
                            <p class="p_19">Acuerdo con tienda</p><span class="icon-checkmark"></span>
                        </div>
                    </div>
                    <div class="contenedor_162">
                        <div class="contenedor_132">
                            <span class="icon-phone span_17""></span> 
                            <p class="p_2"><?php echo $Telefono?></p>
                        </div>
                        <div class="contenedor_131">
                            <span class="icon-location2 span_17"></span>
                            <p class="p_2"><?php echo $Direccion?>&nbsp / &nbsp<?php echo 'San Felipe'?> - <?php echo 'Yaracuy'?></p>
                        </div>
                    </div> 
                </div>
            </section>
            <?php
            $Contador++;
        endforeach;
        ?>
    </div>
</section> 
    
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Tiendas.js';?>"></script>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>
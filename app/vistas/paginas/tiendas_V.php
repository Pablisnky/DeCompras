<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/telefono/style_telefono.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/ubicacion/style_ubicacion.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/iconos/eliminar/style_eliminar.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/iconos/checked/style_checked.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL;?>/public/css/iconos/menos/style_menos.css"/>

<section class="section_11">
    <div class="contenedor_90">
        <h1 class="h1_1 h1_3 h1_4">Tiendas de <?php echo $Datos['tiendas_categoria'][0]['categoria']?></h1>
        <div>
            <a href="<?php echo RUTA_URL . '/Inicio_C#Contenedor_88';?>"><span class="icon-cancel-circle span_5"></span></a>
        </div>
    </div>
    <div class='contenedor_10'>
        <?php
        $Contador = 1; 
        // echo '<pre>';
        // print_r($Datos);
        // echo '</pre>';
        // exit;
        foreach($Datos['tiendas_categoria'] as $row) :
            $ID_Tienda = $row['ID_Tienda'];
            $Nombre = $row['nombre_Tien'];
            $Direccion = $row['direccion_Tien'];
            $Telefono = $row['telefono_Tien'];
            $Fotografia = $row['fotografia_Tien'];
            ?> 
            <section>
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
                            <h3 class="h3_4">Reputación <span class="span_1">(Ultimos 3 meses)</span> </h3>
                        </div>
                        <div style="width: 50%; margin: 2% auto;">
                            <p class="p_2 p_18">Clientes satisfechos</p>
                            <?php 
                                foreach($Datos['tiendas_satisfaccion'] as $Row) :
                                    $ID_TiendaSatisfaccion = $Row['ID_Tienda'];
                                    $PorcentajeSatisfaccion = $Row['Satisfaccion'];
                                    if($ID_TiendaSatisfaccion == $ID_Tienda){ ?>              
                                        <label><?php echo $PorcentajeSatisfaccion?></label>
                                        <?php
                                    }
                                endforeach; 
                                if(empty($PorcentajeSatisfaccion)){  ?>                          
                                    <label>N/A</label>
                                    <?php
                                }   ?>
                        </div>
                        <div style="width:50%; margin: 2% auto;">
                            <p class="p_2 p_18">Pedidos despachados</p>
                            <?php 
                                foreach($Datos['tiendas_despachos'] as $row) :
                                    $ID_TiendaConDespachos = $row['ID_Tienda'];
                                    $CantidadDespachos = $row['Despachos'];
                                    if($ID_TiendaConDespachos == $ID_Tienda){   ?>                           
                                        <label><?php echo $CantidadDespachos?></label>
                                        <?php
                                    }
                                endforeach;
                                if(empty($CantidadDespachos)){  ?>                          
                                    <label>0</label>
                                    <?php
                                }   ?>
                        </div>
                        <!-- <div style="width:33%">
                            <p class="p_2 p_18">Disputas en curso</p>  -->
                            <?php
                                // $VerificarDisputas = 1; //Se declara para que este definida.
                                // foreach($Datos['tiendas_disputas'] as $row) :
                                //     $ID_TiendaConDisputas = $row['ID_Tienda'];
                                //     //Se busca si la tienda del div esta en el array de tiendas con disputas
                                //     if($ID_Tienda == $ID_TiendaConDisputas){ 
                                //         $VerificarDisputas = 'Disputas_' . $ID_Tienda; 
                                //         $CantidadDisputas = $row['Disputas']    ?>
                                <!-- <label><?php // echo $CantidadDisputas?></label> -->
                                                <?php
                                //     }
                                // endforeach;   
                                // if($VerificarDisputas != 'Disputas_' . $ID_Tienda){?>              
                                        <!-- <label>0</label> -->
                                    <?php
                                // }  ?>
                        <!-- </div> -->
                    </div>
                    <div class="contenedor_163">
                        <h3 class="h3_4">Metodos de pago</h3>    
                                <?php
                                
                                $VerificarTransferencia = 1; //Se declara para que este definida.
                                foreach($Datos['tiendas_transferencias'] as $row) :
                                    $ID_TiendaConTransferencia = $row['ID_Tienda'];
                                    if($ID_TiendaConTransferencia == $ID_Tienda){   
                                        $VerificarTransferencia = 'Transferencia_' . $ID_Tienda;   ?>     
                                        <div class="contenedor_161">
                                            <p class="p_19">Tranferencia bancaria</p><span class="icon-checkmark"></span>
                                        </div> 
                                        <?php
                                    }
                                endforeach;
                                if($VerificarTransferencia != 'Transferencia_' . $ID_Tienda){?>     
                                    <div class="contenedor_161">
                                        <p class="p_19">Tranferencia bancaria</p><span class="icon-minus"></span>
                                    </div> 
                                    <?php
                                }

                                $VerificarPagoMovil = 1;//Se declara para que este definida.
                                foreach($Datos['tiendas_pagomovil'] as $row) :
                                    $ID_TiendaConPagoMovil = $row['ID_Tienda'];
                                    if($ID_TiendaConPagoMovil == $ID_Tienda){ 
                                        $VerificarPagoMovil = 'PagoMovil_' . $ID_Tienda;  ?>
                                        <div class="contenedor_161">
                                            <p class="p_19">Pago movil</p><span class="icon-checkmark"></span> 
                                        </div>
                                        <?php
                                    }
                                endforeach;
                                if($VerificarPagoMovil != 'PagoMovil_' . $ID_Tienda){?>     
                                    <div class="contenedor_161">
                                        <p class="p_19">Pago movil</p><span class="icon-minus"></span>
                                    </div> 
                                    <?php
                                } 
                                
                                foreach($Datos['tiendasOtrosPagos'] as $row) :
                                    $ID_TiendaConPagoBolivar = $row['ID_Tienda'];
                                    $PagoBolivar = $row['efectivoBolivar'];
                                    if($ID_TiendaConPagoBolivar ==  $ID_Tienda && $PagoBolivar == 1){  
                                        $VerificaPagoBolivar = true ?>
                                        <div class="contenedor_161">
                                            <p class="p_19">En destino (efectivo Bs.)</p><span class="icon-checkmark"></span>
                                        </div>
                                        <?php
                                    }
                                    else if($ID_TiendaConPagoBolivar == $ID_Tienda && $PagoBolivar == 0){  ?>
                                        <div class="contenedor_161">
                                            <p class="p_19">En destino (efectivo Bs.)</p><span class="icon-minus"></span>
                                        </div>  <?php
                                    }
                                endforeach;     
                                
                                foreach($Datos['tiendasOtrosPagos'] as $row) :
                                    $ID_TiendaConPagoDolar = $row['ID_Tienda'];
                                    $PagoDolar = $row['efectivoDolar'];
                                    if($ID_TiendaConPagoDolar == $ID_Tienda && $PagoDolar == 1){  ?>
                                        <div class="contenedor_161">
                                            <p class="p_19">En destino (efectivo $)</p><span class="icon-checkmark"></span>
                                        </div>
                                        <?php
                                    }
                                    else if($ID_TiendaConPagoDolar == $ID_Tienda && $PagoDolar == 0){  ?>
                                        <div class="contenedor_161">
                                            <p class="p_19">En destino (efectivo $)</p><span class="icon-minus"></span>
                                        </div>  <?php
                                    }
                                endforeach;
                                 
                                foreach($Datos['tiendasOtrosPagos'] as $row_2) :
                                    $ID_TiendaConPagoAcordado = $row_2['ID_Tienda'];
                                    $PagoAcordado = $row_2['acordado'];
                                    if($ID_TiendaConPagoAcordado == $ID_Tienda && $PagoAcordado == 1){   ?>
                                        <div class="contenedor_161">
                                            <p class="p_19">Acordado con tienda</p><span class="icon-checkmark"></span>
                                        </div>
                                        <?php
                                    }
                                    else if($ID_TiendaConPagoAcordado == $ID_Tienda && $PagoAcordado == 0){  ?>
                                        <div class="contenedor_161">
                                            <p class="p_19">Acordado con tienda</p><span class="icon-minus"></span>
                                        </div>  <?php
                                    }
                                endforeach; ?>
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
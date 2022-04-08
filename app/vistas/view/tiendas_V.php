<section class="section_11">
    <div class="contenedor_90 p_9 borde_1">
        <div class="contenedor_159" id="Span_3">
            <!-- Icono flecha atras -->
            <i class="fas fa-arrow-left" style="display: inline;"></i>
            <a class="font--negro" href="<?php echo RUTA_URL . '/Categoria_C/index/' . $Datos['tiendas_categoria'][0]['parroquia_Tien'];?>">Categorias</a>
        </div>        
        <h1 class="h1_1 h1_3"><?php echo $Datos['tiendas_categoria'][0]['categoria']?></h1>
    </div>
    <div class='contenedor_10'>
        <?php
        $Contador = 1; 
        foreach($Datos['tiendas_categoria'] as $row) :
            $ID_Tienda = $row['ID_Tienda'];
            $Nombre = $row['nombre_Tien'];
            $Slogan = $row['slogan_Tien'];
            $Direccion = $row['direccion_Tien'];
            $Telefono = $row['telefono_AfiCom'];
            $Fotografia = $row['fotografia_Tien'];
            $Ciudad = $row['parroquia_Tien'];
            $Estado = $row['estado_Tien'];

            //Se busca si la tienda esta abierta o cerrada según su horario
            foreach($Datos['tiendas_disponibilidad'] as $Row) :
                if($Row['ID_Tienda'] == $ID_Tienda) : 
                    $Disponibilidad = $Row['disponibilidad'];
                    $ProximoApertura = $Row['proximoApertura'];
                    $HoraApertura = $Row['horaApertura'];
                endif;
            endforeach;
            ?> 
            <section class="contenedor_15--tarjeta" id="<?php echo $ID_Tienda;?>">
                <!-- LADO FRONTAL DE TARJETA -->
                <div class="contenedor_15 borde_1 borde_1--color adelante">

                    <!-- IMAGEN DE PORTADA DE LA TIENDA -->
                    <?php                    
                    if($Fotografia == 'tienda.png'){    ?> 
                        <div class="contenedor_120">
                            <i class="fas fa-store icono_5"></i> 
                        </div>
                        <?php
                    } 
                    else{  ?>
                        <div class="contenedor_120" style="background-image: url('<?php echo RUTA_URL?>/public/images/tiendas/<?php echo $Nombre;?>/<?php echo $Fotografia;?>')"> 
                        </div>
                        <?php
                    }   ?>

                    <p class="p_3"><?php echo $Nombre?></p>
                    <p><?php echo $Slogan?></p>

                    <!-- IMAGENES MINIATURAS DE SLIDER -->
                    <article class="cont_miniaturaSlider"  id="Cont_miniaturaSlider">
                        <div class="cont_miniaturaSlider__2" id="Cont_miniaturaSlider__2">
                            <?php       
                            //Se quitan los espacios en el nombre de la tienda para comparar con la carpeta donde se encuentran las imagenes de la tienda
                            foreach($Datos['tiendas_productosDestacados'] as $Row) : ?> 
                                <div class="cont_miniaturaSlider__3" id="Cont_miniaturaSlider__3" >
                                    <img class="contOpciones__img contOpciones__img--tienda" alt="Fotografia del producto" src="<?php echo RUTA_URL?>/public/images/tiendas/<?php echo $Nombre?>/productos/<?php echo $Row['nombre_img'];?>"/>                      
                                    <label class="input_8 input_8E" id="<?php echo 'EtiquetaProducto_' . $ContadorLabel;?>">Bs. <?php echo number_format($Row['precioBolivar'], 2, ",", ".");?></label>
                                </div>  
                                <?php
                            endforeach; ?>
                        </div>
                    </article>
                    
                    <!-- BOTONES DELANTEROS -->
                    <article class="Componente_boton">
                        <div class="contBoton contBoton--100" id="">
                            <label class="boton boton--corto" onclick="AtrasTarjeta(<?php echo $ID_Tienda;?>)">Sobre nosotros</label>

                            <label class="boton boton--corto" onclick="tiendas('<?php echo $ID_Tienda;?>','<?php echo $Nombre;?>', 'NoNecesario_1', 'NoNecesario_2','<?php echo $Disponibilidad;?>','<?php echo $ProximoApertura;?>','<?php echo $HoraApertura;?>')">Entrar</label><!--El argumento no necesario es debido a que la función Tiendas() recibe cuatro argumentos, el controlador index en Vitrina_C el cual recibe cuatro argumentos --> 
                        </div>
                    </article>
                </div>

                <!-- LADO POSTERIOR DE TARJETA -->
                <div class="contenedor_15 borde_1 borde_1--color atras">
                    
                    <!-- REPUTACION -->
                    <div class="contenedor_17">                        
                        <?php 
                        foreach($Datos['tiendas_disponibilidad'] as $Row) :
                            if($Row['ID_Tienda'] == $ID_Tienda){  
                                if($Row['disponibilidad'] == 'Abierto'){   ?>
                                        <div>
                                            <h3 class="h3_4">Reputación <span class="span_1">(Ultimos 3 meses)</span> </h3>
                                        </div>
                                        <?php
                                }
                                else{   ?>
                                    <div class="contenedor_162">
                                        <h2 class="h2_14">Despachos no disponibles a esta hora</h2>
                                    </div> 
                                    <?php
                                }  
                            } 
                        endforeach;  ?>
                        <div style="width: 50%; margin: 2% auto;">
                            <p class="p_2 p_18">Clientes satisfechos</p>
                                <?php
                                if($Datos['tiendas_despachos'] == Array()){?>
                                    <label>Aún no califica</label>    <?php
                                }
                                else if(($Datos['tiendas_satisfaccion'][0]['ID_Tienda'] != $ID_Tienda)){    ?>
                                    <label>Aún no califica</label>    <?php
                                }
                                else{
                                    foreach($Datos['tiendas_satisfaccion'] as $Row) :
                                        $ID_TiendaSatisfaccion = $Row['ID_Tienda'];
                                        $PorcentajeSatisfaccion = $Row['Satisfaccion'];
                                        if($ID_TiendaSatisfaccion == $ID_Tienda){ ?>              
                                            <label><?php echo $PorcentajeSatisfaccion?> %</label>
                                            <?php
                                        }
                                    endforeach; 
                                }   ?>
                        </div>
                        <div style="width:50%; margin: 2% auto;">
                            <p class="p_2 p_18">Pedidos entregados</p>
                            <?php 
                                if($Datos['tiendas_despachos'] == Array()){?>
                                    <label>0</label>    
                                    <?php
                                }
                                else if($Datos['tiendas_satisfaccion'][0]['ID_Tienda'] != $ID_Tienda){?>
                                    <label>0</label>    
                                    <?php
                                }
                                else{
                                    foreach($Datos['tiendas_despachos'] as $row) :
                                        $ID_TiendaConDespachos = $row['ID_Tienda'];
                                        $CantidadDespachos = $row['Despachos'];
                                        if($ID_TiendaConDespachos == $ID_Tienda){   ?>                           
                                            <label><?php echo $CantidadDespachos?></label>
                                            <?php
                                        }
                                    endforeach;
                                }  ?>
                        </div>
                    </div>

                    <!-- FORMAS DE ENVIO Y ENTREGA-->
                    <div class="contenedor_17">
                        <h3 class="h3_4">Formas de envio y entrega</h3>    
                        <div class="contenedor_161">
                            <p class="p_19">Compra en línea, recoje en tienda</p><i class="fas fa-check"></i>
                        </div>     
                        <div class="contenedor_161">
                            <p class="p_19">Despacho a domicilio</p><i class="fas fa-check"></i>
                        </div> 
                    </div>

                    <!-- METODOS DE PAGO -->
                    <div class="contenedor_163">
                        <h3 class="h3_4 h3_4--fijo">Metodos de pago aceptados</h3>    
                        <?php
                        // TRANSFERENCIA BANCARIAS
                        $VerificarTransferencia = 1; //Se declara para que este definida.
                        foreach($Datos['tiendas_transferencias'] as $row) :
                            $ID_TiendaConTransferencia = $row['ID_Tienda'];
                            if($ID_TiendaConTransferencia == $ID_Tienda){   
                                $VerificarTransferencia = 'Transferencia_' . $ID_Tienda;   ?>     
                                <div class="contenedor_161 contenedor_161--fijo">
                                    <p class="p_19">Tranferencia bancaria</p><i class="fas fa-check"></i>
                                </div> 
                                <?php
                            }
                        endforeach;
                        if($VerificarTransferencia != 'Transferencia_' . $ID_Tienda){?>     
                            <div class="contenedor_161 contenedor_161--fijo">
                                <p class="p_19">Tranferencia bancaria</p><i class="fas fa-minus"></i>
                            </div> 
                            <?php
                        }

                        // PAGO MOVIL
                        $VerificarPagoMovil = 1;//Se declara para que este definida.
                        foreach($Datos['tiendas_pagomovil'] as $row) :
                            $ID_TiendaConPagoMovil = $row['ID_Tienda'];
                            if($ID_TiendaConPagoMovil == $ID_Tienda){ 
                                $VerificarPagoMovil = 'PagoMovil_' . $ID_Tienda;  ?>
                                <div class="contenedor_161">
                                    <p class="p_19">Pago movil</p><i class="fas fa-check"></i>
                                </div>
                                <?php
                            }
                        endforeach;
                        if($VerificarPagoMovil != 'PagoMovil_' . $ID_Tienda){?>     
                            <div class="contenedor_161">
                                <p class="p_19">Pago movil</p><i class="fas fa-minus"></i>
                            </div> 
                            <?php
                        } 
                        
                        // RESERVE 
                        $VerificarReserve = 1;//Se declara para que este definida.
                        foreach($Datos['tiendas_reserve'] as $row) :
                            $ID_TiendaConReserve = $row['ID_Tienda'];
                            if($ID_TiendaConReserve == $ID_Tienda){  
                                $VerificarReserve = 'Reserve_' . $ID_Tienda; ?>
                                <div class="contenedor_161">
                                    <p class="p_19">Reserve</p><i class="fas fa-check"></i>
                                </div>  
                                <?php
                            }
                        endforeach;
                        if($VerificarReserve != 'Reserve_' . $ID_Tienda){  ?>
                            <div class="contenedor_161">
                                <p class="p_19">Reserve</p><i class="fas fa-minus"></i>
                            </div>  <?php
                        }
                        
                        // PAYPAL 
                        $VerificarPaypal = 1;//Se declara para que este definida.
                        foreach($Datos['tiendas_paypal'] as $row) :
                            $ID_TiendaConPaypal = $row['ID_Tienda'];
                            if($ID_TiendaConPaypal == $ID_Tienda){  
                                $VerificarPaypal = 'Paypal_' . $ID_Tienda; ?>
                                <div class="contenedor_161">
                                    <p class="p_19">Paypal</p><i class="fas fa-check"></i>
                                </div>  
                                <?php
                            }
                        endforeach;
                        if($VerificarPaypal != 'Paypal_' . $ID_Tienda){  ?>
                            <div class="contenedor_161">
                                <p class="p_19">Paypal</p><i class="fas fa-minus"></i>
                            </div>  <?php
                        }
                        
                        // ZELLE 
                        $VerificarZelle = 1;//Se declara para que este definida.
                        foreach($Datos['tiendas_zelle'] as $row) :
                            $ID_TiendaConZelle = $row['ID_Tienda'];
                            if($ID_TiendaConZelle == $ID_Tienda){  
                                $VerificarZelle = 'Zelle_' . $ID_Tienda; ?>
                                <div class="contenedor_161">
                                    <p class="p_19">Zelle</p><i class="fas fa-check"></i>
                                </div>  
                                <?php
                            }
                        endforeach;
                        if($VerificarZelle != 'Zelle_' . $ID_Tienda){  ?>
                            <div class="contenedor_161">
                                <p class="p_19">Zelle</p><i class="fas fa-minus"></i>
                            </div>  
                            <?php
                        }
                            
                        // EFECTIVO BOLIVAR
                        foreach($Datos['tiendasOtrosPagos'] as $row) :
                            $ID_TiendaConPagoBolivar = $row['ID_Tienda'];
                            $PagoBolivar = $row['efectivoBolivar'];
                            if($ID_TiendaConPagoBolivar ==  $ID_Tienda && $PagoBolivar == 1){  
                                $VerificaPagoBolivar = true ?>
                                <div class="contenedor_161">
                                    <p class="p_19">En destino (efectivo Bs.)</p><i class="fas fa-check"></i>
                                </div>
                                <?php
                            }
                            else if($ID_TiendaConPagoBolivar == $ID_Tienda && $PagoBolivar == 0){  ?>
                                <div class="contenedor_161">
                                    <p class="p_19">En destino (efectivo Bs.)</p><i class="fas fa-minus"></i>
                                    <!-- <span class="contenedor_161--span">X</span> -->
                                </div>  <?php
                            }
                        endforeach;     
                                
                        // EFECTIVO DOLAR
                        foreach($Datos['tiendasOtrosPagos'] as $row) :
                            $ID_TiendaConPagoDolar = $row['ID_Tienda'];
                            $PagoDolar = $row['efectivoDolar'];
                            if($ID_TiendaConPagoDolar == $ID_Tienda && $PagoDolar == 1){  ?>
                                <div class="contenedor_161">
                                    <p class="p_19">En destino (efectivo $)</p><i class="fas fa-check"></i>
                                </div>
                                <?php
                            }
                            else if($ID_TiendaConPagoDolar == $ID_Tienda && $PagoDolar == 0){  ?>
                                <div class="contenedor_161">
                                    <p class="p_19">En destino (efectivo $)</p><i class="fas fa-minus"></i>
                                </div>  <?php
                            }
                        endforeach; 
                                
                        // ACORDADO EN TIENDA
                        foreach($Datos['tiendasOtrosPagos'] as $row_2) :
                            $ID_TiendaConPagoAcordado = $row_2['ID_Tienda'];
                            $PagoAcordado = $row_2['acordado'];
                            if($ID_TiendaConPagoAcordado == $ID_Tienda && $PagoAcordado == 1){   ?>
                                <div class="contenedor_161">
                                    <p class="p_19">Acordado con tienda</p><i class="fas fa-check"></i>
                                </div>
                                <?php
                            }
                            else if($ID_TiendaConPagoAcordado == $ID_Tienda && $PagoAcordado == 0){  ?>
                                <div class="contenedor_161">
                                    <p class="p_19">Acordado con tienda</p><i class="fas fa-minus"></i>
                                </div>  <?php
                            }
                        endforeach; ?>
                    </div>

                    <!-- DIRECCION Y CONTACTO -->
                    <div class="cont_direccion">
                        <div class="contenedor_132">
                            <i class="fas fa-phone-alt span_17"></i> 
                            <p class="p_2"><?php echo $Telefono?></p>
                        </div>
                        <div class="contenedor_131">
                            <i class="fas fa-map-marker-alt span_17"></i>
                            <p class="p_2"><?php echo $Direccion?>&nbsp / &nbsp<?php echo $Ciudad?> - <?php echo $Estado?></p>
                        </div>
                    </div> 
                
                    <!-- BOTONES ANTERIORES-->
                    <article class="Componente_boton">
                        <div class="contBoton contBoton--100" id="">
                            <label class="boton boton--corto" onclick="FrenteTarjeta(<?php echo $ID_Tienda;?>)">Salir</label>
                            
                            <label class="boton boton--corto" onclick="tiendas('<?php echo $ID_Tienda;?>','<?php echo $Nombre;?>', 'NoNecesario_1', 'NoNecesario_2','<?php echo $Disponibilidad;?>','<?php echo $ProximoApertura;?>','<?php echo $HoraApertura;?>')">Entrar</label><!--El argumento no necesario es debido a que la función Tiendas() recibe cuatro argumentos, el controlador index en Vitrina_C el cual recibe cuatro argumentos --> 
                        </div>
                    </article>
                </div>
            </section>
            <?php
            $Contador++;
        endforeach;
        ?>
    </div>
</section> 
    
<script src="<?php echo RUTA_URL . '/public/javascript/E_Tiendas.js?v=' . rand();?>"></script>

<?php require(RUTA_APP . '/vistas/footer/footer.php'); ?> 
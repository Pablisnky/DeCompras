<section class="section_11">
    <div class="contenedor_90">
        <h1 class="h1_1 h1_3 h1_4">Tiendas de <?php echo $Datos['tiendas_categoria'][0]['categoria']?></h1>
    </div>
    <div class='contenedor_10'>
        <?php
        $Contador = 1; 
        foreach($Datos['tiendas_categoria'] as $row) :
            $ID_Tienda = $row['ID_Tienda'];
            $Nombre = $row['nombre_Tien'];
            $Slogan = $row['slogan_Tien'];
            $Direccion = $row['direccion_Tien'];
            $Telefono = $row['telefono_Tien'];
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
                        <div class="contenedor_120" style="background-image: url('<?php echo RUTA_URL?>/public/images/tiendas/<?php echo $Fotografia;?>')"> 
                        </div>
                        <?php
                    }   ?>

                    <p class="p_3"><?php echo $Nombre?></p>
                    <p><?php echo $Slogan?></p>
                    
                    <article class="Componente_boton">
                        <div class="contBoton contBoton--100" id="">
                            <label class="boton boton--corto boton--alto" onclick="AtrasTarjeta(<?php echo $ID_Tienda;?>)">Acerca de<br class="br_2"> nosotros</label>
                            <label class="boton boton--corto boton--alto boton-excepcion" onclick="tiendas('<?php echo $ID_Tienda;?>','<?php echo $Nombre;?>', 'NoNecesario_1', 'NoNecesario_2','<?php echo $Disponibilidad;?>','<?php echo $ProximoApertura;?>','<?php echo $HoraApertura;?>')">Entrar</label><!--El argumento no necesario es debido a que la función Tiendas() recibe cuatro argumentos, el controlador index en Vitrina_C el cual recibe cuatro argumentos --> 
                        </div>
                    </article>
                </div>

                <div class="contenedor_15 borde_1 borde_1--color atras">
                    <!-- REPUTACION -->
                    <div class="contenedor_17">
                        <div>
                            <h3 class="h3_4">Reputación <span class="span_1">(Ultimos 3 meses)</span> </h3>
                        </div>
                        <div style="width: 50%; margin: 2% auto;">
                            <p class="p_2 p_18">Clientes satisfechos</p>
                            <?php
                                if($Datos['tiendas_despachos'] == Array()){?>
                                    <label>Aún no califica</label>    <?php
                                }
                                else if(($Datos['tiendas_satisfaccion'][0]['ID_Tienda'] != $ID_Tienda)){
                                    ?>
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
                                    <label>0</label>    <?php
                                }
                                else if($Datos['tiendas_satisfaccion'][0]['ID_Tienda'] != $ID_Tienda){?>
                                    <label>0</label>    <?php
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

                    <!-- METODOS DE PAGO -->
                    <div class="contenedor_163">
                        <h3 class="h3_4">Metodos de pago aceptados</h3>    
                        <?php
                        // TRANSFERENCIA BANCARIAS
                        $VerificarTransferencia = 1; //Se declara para que este definida.
                        foreach($Datos['tiendas_transferencias'] as $row) :
                            $ID_TiendaConTransferencia = $row['ID_Tienda'];
                            if($ID_TiendaConTransferencia == $ID_Tienda){   
                                $VerificarTransferencia = 'Transferencia_' . $ID_Tienda;   ?>     
                                <div class="contenedor_161">
                                    <p class="p_19">Tranferencia bancaria</p><i class="fas fa-check"></i>
                                </div> 
                                <?php
                            }
                        endforeach;
                        if($VerificarTransferencia != 'Transferencia_' . $ID_Tienda){?>     
                            <div class="contenedor_161">
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
                    <?php 
                    foreach($Datos['tiendas_disponibilidad'] as $Row) :
                        if($Row['ID_Tienda'] == $ID_Tienda){  
                            if($Row['disponibilidad'] == 'Abierto'){   ?>
                                <div class="contenedor_162">
                                    <div class="contenedor_132">
                                    <i class="fas fa-phone-alt span_17"></i> 
                                        <p class="p_2"><?php echo $Telefono?></p>
                                    </div>
                                    <div class="contenedor_131">
                                        <i class="fas fa-map-marker-alt span_17"></i>
                                        <p class="p_2"><?php echo $Direccion?>&nbsp / &nbsp<?php echo $Ciudad?> - <?php echo $Estado?></p>
                                    </div>
                                </div> 
                                <?php
                            }
                            else{   ?>
                                <div class="contenedor_162">
                                    <h2 class="h2_14">Despachos no disponibles a esta hora</h2>
                                </div>  <?php
                            }  
                        } 
                    endforeach;  ?>
                
                    <article class="Componente_boton">
                        <div class="contBoton contBoton--100" id="">
                            <label class="boton boton--corto boton--alto boton-excepcion" onclick="FrenteTarjeta(<?php echo $ID_Tienda;?>)">Salir</label>
                            <label class="boton boton--corto boton--alto boton-excepcion" onclick="tiendas('<?php echo $ID_Tienda;?>','<?php echo $Nombre;?>', 'NoNecesario_1', 'NoNecesario_2','<?php echo $Disponibilidad;?>','<?php echo $ProximoApertura;?>','<?php echo $HoraApertura;?>')">Entrar</label><!--El argumento no necesario es debido a que la función Tiendas() recibe cuatro argumentos, el controlador index en Vitrina_C el cual recibe cuatro argumentos --> 
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

<?php require(RUTA_APP . '/vistas/inc/footer.php'); ?> 
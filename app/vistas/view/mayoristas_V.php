<section class="section_11 section_11--mayorista">
    <div class='contenedor_10'>
        <?php
        $Contador = 1; 
        foreach($Datos['mayoristas_afiliados'] as $Row) :
            $ID_Mayorista = $Row['ID_Mayorista'];
            $Nombre_Mayorista = $Row['nombreMay'];
            $Foto_Mayorista = $Row['fotografiaMay'];
            $Telefono = $Row['telefonoMay'];
            $Direccion = $Row['direccionMay'];
            $Ciudad = $Row['municipioMay'];
            $Estado = $Row['estadoMay'];
            ?>
            <section class="contenedor_15--tarjeta" id="<?php echo $ID_Mayorista;?>">
                <!-- LADO FRONTAL DE TARJETA -->
                <div class="contenedor_15 borde_1 borde_1--color adelante">

                    <!-- IMAGEN DE PORTADA DEL MAYORISTA -->
                    <?php                    
                    if($Foto_Mayorista == 'tienda.png'){    ?> 
                        <div class="contenedor_120">
                            <i class="fas fa-store icono_5"></i> 
                        </div>
                        <?php
                    } 
                    else{  ?>
                        <div class="contenedor_120 contenedor_120__mayorista" style="background-image: url('public/images/proveedor/Don_Rigo/Portada_ant.jpg')">     
                        </div>  
                        <?php
                    }
                        ?>
                    <p class="p_3"><?php echo $Nombre_Mayorista?></p>

                    <!-- BOTONES DELANTEROS -->
                    <article class="Componente_boton">
                        <div class="contBoton contBoton--100" id="">
                            <label class="boton boton--corto" onclick="AtrasTarjetaMayorista(<?php echo $ID_Mayorista;?>)">Sobre nosotros</label>

                            <label class="boton boton--corto" onclick="mayorista('<?php echo $ID_Mayorista;?>','<?php echo $Nombre_Mayorista;?>','<?php echo $Foto_Mayorista;?>')">Entrar</label>
                        </div>
                    </article>
                </div>

                <!-- LADO POSTERIOR DE TARJETA -->
                <div class="contenedor_15 borde_1 borde_1--color atras">

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

                         <!-- TRANSFERENCIA BANCARIAS      -->
                                <div class="contenedor_161 contenedor_161--fijo">
                                    <p class="p_19">Tranferencia bancaria</p><i class="fas fa-check"></i>
                                </div> 

                         <!-- PAGO MOVIL -->
                                <div class="contenedor_161">
                                    <p class="p_19">Pago movil</p><i class="fas fa-check"></i>
                                </div>
                        
                         <!-- RESERVE  -->
                            <div class="contenedor_161">
                                <p class="p_19">Reserve</p><i class="fas fa-minus"></i>
                            </div>  
                        <!-- PAYPAL  -->
                                <div class="contenedor_161">
                                    <p class="p_19">Paypal</p><i class="fas fa-check"></i>
                                </div>  
                        
                        <!-- ZELLE  -->
                            <div class="contenedor_161">
                                <p class="p_19">Zelle</p><i class="fas fa-minus"></i>
                            </div>  
                            
                        <!-- EFECTIVO BOLIVAR -->
                                <div class="contenedor_161">
                                    <p class="p_19">En destino (efectivo Bs.)</p><i class="fas fa-check"></i>
                                </div>
                                
                        <!-- EFECTIVO DOLAR -->
                                <div class="contenedor_161">
                                    <p class="p_19">En destino (efectivo $)</p><i class="fas fa-check"></i>
                                </div>
                    </div>

                    <!-- IMAGENES MINIATURAS DE SLIDER -->
                    <article class="" >
                        <img class="" alt="Fotografia del producto" src="public/images/proveedor//Don_Rigo/Portada_pos.jpg"/>   
                    </article>

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

                    <!-- BOTONES TRASEROS-->
                    <article class="Componente_boton">
                        <div class="contBoton contBoton--100" id="">
                            <label class="boton boton--corto" onclick="FrenteTarjetaMayorista(<?php echo $ID_Mayorista;?>)">Salir</label>
                            
                            <label class="boton boton--corto" onclick="mayorista('<?php echo $ID_Mayorista;?>','<?php echo $Nombre_Mayorista;?>','<?php echo $Foto_Mayorista;?>')">Entrar</label>
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
		
<script src="<?php echo RUTA_URL . '/public/javascript/E_Mayoristas.js';?>"></script>

<?php include(RUTA_APP . "/vistas/footer/footer.php");?>
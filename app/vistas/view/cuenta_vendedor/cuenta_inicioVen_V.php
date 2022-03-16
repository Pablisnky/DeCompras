<?php 
    // $ID_Tienda = $_SESSION["ID_Tienda"];

    //Se verifica que la sesion del usuario halla sido creada y exista
    // if(isset($_SESSION["ID_Tienda"])){         
        ?>
        <div class="section_8">
            
            <!-- SALDO ACUMULADO -->
            <div class="section_8__div" style="background-color: ">
                <fieldset class="fieldset_1" >
                    <legend class="legend_1">Ventas semanales</legend>  
                    <div>
                        <iframe src="<?php echo RUTA_URL . '/public/grafico/SaldoAcumulado.php'?>" marginwidth="0" marginheight="0" name="ventana_iframe" frameborder="0" height= 350 width= 300>
                        </iframe> 
                    </div>
                </fieldset>
            </div>

            <!-- COMISIONES POR VENTA -->
            <div class="section_8__div" style=" background-color: ">
                <fieldset class="fieldset_1" >
                    <legend class="legend_1">Comisiones pendientes</legend>    
                    <?php
                    if($Datos['comisiones'] != Array ()){ 
                        foreach($Datos['comisiones'] as $row)  : 
                            $Nro_Orden = $row['numeroorden_May'];   ?>
                            <div class="cont_clientesVen borde_1">
                                <div style="grid-column-start: 1; grid-column-end: 4;">
                                    <label class="cont_clientesVen--renglon">CLIENTE</label>
                                    <label class="font--TituloTarjetaCliente"><?php echo $row['nombre_AfiMin'];?></label>
                                </div> 
                                <div style="grid-column-start: 1; grid-column-end: 2;">
                                    <label class="cont_clientesVen--renglon">FACTURA</label>
                                    <label><?php echo $row['numeroorden_May'];?></label>
                                </div> 
                                <div style="grid-column-start: 2; grid-column-end: 3;">
                                    <label class="cont_clientesVen--renglon">COMISIÓN</label>
                                    <label><?php echo $row['montoTotal'];?></label>
                                </div> 
                                <div style="grid-column-start: 3; grid-column-end: 4;">
                                    <label class="cont_clientesVen--renglon">EXPIRA</label>
                                    <label><?php echo '6 dias';?></label>
                                </div> 
                                <!-- <div style="grid-column-start: 2; grid-column-end: 4;">
                                    <label class="cont_clientesVen--renglon">Hora</label>
                                    <label><?php echo $row['hora'];?></label>
                                </div> 
                                <div class="ocultar-movil">
                                    <label class="cont_clientesVen--renglon">Dirección</label>
                                    <label>Calle 25 entre Avs. 5 y 6</label>
                                </div>  -->
                            </div>
                            <?php
                        endforeach; 
                    }   ?>
                </fieldset>
            </div>
                </div>

        <!-- BOTONES RADIO -->
        <div class="section_1--cont__radios--cinco" id="Botones_radios_slider">
            <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Slider_Portada_1" checked/>
            <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Slider_Portada_2"/>
            <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Slider_Portada_3"/> 
            <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Slider_Portada_4"/> 
            <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Slider_Portada_5"/> 
        </div>
        <?php
    // }
    // else{
    //     //la sesion no existe y se redirige a la pagina de inicio
    //     header("location:" . RUTA_URL);
    // }
    
    include(RUTA_APP . "/vistas/footer/footer.php");
    ?>
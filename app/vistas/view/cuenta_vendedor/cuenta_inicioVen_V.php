<?php 
    // $ID_Tienda = $_SESSION["ID_Tienda"];

    //Se verifica que la sesion del usuario halla sido creada y exista
    // if(isset($_SESSION["ID_Tienda"])){         
        ?>
        <div class="section_8">
            <!-- GRAFICO DE VENTAS SEMANALES -->
            <div class="section_8__div" id="Presentacion_1">
                <fieldset class="fieldset_1" >
                    <legend class="legend_1">Ventas semanales</legend>  
                    <div>
                        <iframe src="<?php echo RUTA_URL . '/public/grafico/SaldoAcumulado.php'?>" marginwidth="0" marginheight="0" name="ventana_iframe" frameborder="0" height= 350 width= 290>
                        </iframe> 
                    </div>
                </fieldset>
            </div>

            <!-- COMISIONES PENDIENTES -->
            <div class="section_8__div" id="Presentacion_2"">
                <fieldset class="fieldset_1" >
                    <legend class="legend_1">Comisiones pendientes</legend>   
                    <?php
                    if($Datos['comisiones'] != Array ()){ 
                        foreach($Datos['comisiones'] as $row)  : 
                            $Nro_Orden = $row['numeroorden_May'];   ?>
                            <div class="cont_clientesVen cont_clientesVen--restringido borde_1 ">
                                <div style="grid-column-start: 1; grid-column-end: 4;">
                                    <label class="cont_clientesVen--renglon">CLIENTE</label>
                                    <label class="font--TituloTarjetaCliente"><?php echo $row['nombre_AfiMin'];?></label>
                                </div> 
                                <div style="grid-column-start: 1; grid-column-end: 2;">
                                    <label class="cont_clientesVen--renglon">FACTURA</label>
                                    <label><?php echo $row['factura'];?></label>
                                </div> 
                                <div style="grid-column-start: 2; grid-column-end: 3;">
                                    <label class="cont_clientesVen--renglon">COMISIÓN</label>
                                    <label><?php echo $row['montoTotal'];?></label>
                                </div> 
                                <div style="grid-column-start: 3; grid-column-end: 4;">
                                    <label class="cont_clientesVen--renglon">EXPIRA</label>
                                    <label><?php echo '6 dias';?></label>
                                </div> 
                            </div>
                            <?php
                        endforeach; 
                    } 
                    else{   ?>
                        <p class="bandaAlerta">No hay pedidos facturados que generen comisiones.</p> 
                        <?php
                    }    ?>
                </fieldset>
            </div>

            <!-- COMISIONES POR PAGAR -->
            <div class="section_8__div" id="Presentacion_2">                
                <fieldset class="fieldset_1" >
                    <legend class="legend_1">Comisiones ganadas</legend>  
                    <p class="font--titulo bandaAlerta">0 $</p> 
                    <br>
                    <?php
                    // if($Datos['comisiones'] = Array ()){ 
                    //     foreach($Datos['comisiones'] as $row)  : 
                    //         $Nro_Orden = $row['numeroorden_May'];   ?>
                            <!-- <div class="contenedor_106--pedidos">
                                <span class="span_21 borde_1" style="background-color: var(--Aciertos);"><i class="fas fa-pencil-alt"></i></span>
                            </div>
                            <div class="cont_clientesVen cont_clientesVen--restringido borde_1 ">
                                <div style="grid-column-start: 1; grid-column-end: 4;">
                                    <label class="cont_clientesVen--renglon">CLIENTE</label>
                                    <label class="font--TituloTarjetaCliente"><?php echo $row['nombre_AfiMin'];?></label>
                                </div> 
                                <div style="grid-column-start: 1; grid-column-end: 2;">
                                    <label class="cont_clientesVen--renglon">FACTURA</label>
                                    <label><?php echo $row['numeroorden_May'];?></label>
                                </div> 
                                <div style="grid-column-start: 3; grid-column-end: 4;">
                                    <label class="cont_clientesVen--renglon">COMISIÓN</label>
                                    <label><?php echo $row['montoTotal'];?></label>
                                </div> 
                            </div> -->
                            <?php
                    //     endforeach; 
                    // }    ?>
                </fieldset>
            </div>
        </div>

        <!-- BOTONES RADIO -->
        <!-- <div class="section_1--cont__radios--cinco" id="Botones_radios_Ven">
            <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Pantall__1" checked/>
            <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Pantall__2"/>
            <input class="section_1--radios--cinco" type="radio" name="slider_texto" id="Pantall__3"/>
        </div>
        <br><br> -->
        
        <!-- <script src="<?php echo RUTA_URL.'/public/javascript/E_Cuenta_inicioVen.js?v=' . rand();?>"></script> -->
        <?php
    // }
    // else{
    //     //la sesion no existe y se redirige a la pagina de inicio
    //     header("location:" . RUTA_URL);
    // }
    
    include(RUTA_APP . "/vistas/footer/footer.php");
    ?>

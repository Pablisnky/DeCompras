<section class="sectionModal">
    <section> <!-- ORDEN DE COMPRA -->
        <div class="contenedor_24">
            <header>
                <h1 class="h1_1">Horario de Despachos</h1>
                <h1 class="h2_6"><?php echo $Datos['nombreTienda'];?></h1>
                <br>
            </header>

            <article>
            <?php 
                //$Datos proviene de Tiendas_C/horarioTienda
                $InicioManana_LV = $Datos['horarioTienda_LV'][0]['inicio_m'];
                $CulminaManana_LV = $Datos['horarioTienda_LV'][0]['culmina_m'];
                $IniciaTarde_LV = $Datos['horarioTienda_LV'][0]['inicia_t'];
                $CulminaTarde_LV = $Datos['horarioTienda_LV'][0]['culmina_t'];  

                $InicioManana_FS = $Datos['horarioTienda_FS'][0]['inicia_m_FS'];
                $CulminaManana_FS = $Datos['horarioTienda_FS'][0]['culmina_m_FS'];
                $IniciaTarde_FS = $Datos['horarioTienda_FS'][0]['inicia_t_FS'];
                $CulminaTarde_FS = $Datos['horarioTienda_FS'][0]['culmina_t_FS'];  
              
                if($Datos['horarioTienda_FS'][0]['sabado_m_FS'] == 'Sabado') :
                    $InicioManana_FS = $InicioManana_FS != '00:00:00' ? $InicioManana_FS : '--';
                    $CulminaManana_FS = $CulminaManana_FS != '12:00 AM' ? $CulminaManana_FS : '--';
                    $IniciaTarde_FS = $IniciaTarde_FS != '12:00 AM' ? $IniciaTarde_FS : '--';
                    $CulminaTarde_FS = $CulminaTarde_FS != '12:00 AM' ? $CulminaTarde_FS : '--'; 
                elseif($Datos['horarioTienda_FS'][0]['domingo_m_FS'] == 'Domingo') :                    
                    $InicioManana_FS = $InicioManana_FS != '00:00:00' ? $InicioManana_FS : '--';
                    $CulminaManana_FS = $CulminaManana_FS != '12:00 AM' ? $CulminaManana_FS : '--';
                    $IniciaTarde_FS = $IniciaTarde_FS != '12:00 AM' ? $IniciaTarde_FS : '--';
                    $CulminaTarde_FS = $CulminaTarde_FS != '12:00 AM' ? $CulminaTarde_FS : '--'; 
                endif;
            ?>
                <table class="tabla_1">
                    <thead>
                        <tr>
                            <th class="">LUNES</th>
                            <th class="">MARTES</th>
                            <th class="">MIERCOLES</th>
                            <th class="">JUEVES</th>
                            <th class="">VIERNES</th>
                            <th class="">SABADO</th>
                            <th class="">DOMINGO</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="td_1 td_7" class="td_1"><?php echo $InicioManana_LV;?></td>
                            <td class="td_1"><?php echo $InicioManana_LV;?></td>
                            <td class="td_1"><?php echo $InicioManana_LV;?></td>
                            <td class="td_1"><?php echo $InicioManana_LV;?></td>
                            <td class="td_1"><?php echo $InicioManana_LV;?></td>
                            <td class="td_1"><?php echo $InicioManana_FS;?></td>
                            <td class="td_1"><?php echo $InicioManana_FS;?></td>
                        </tr>
                        <tr>
                            <td class="td_1 td_7"><?php echo $CulminaManana_LV;?></td>
                            <td class="td_1"><?php echo $CulminaManana_LV;?></td>
                            <td class="td_1"><?php echo $CulminaManana_LV;?></td>
                            <td class="td_1"><?php echo $CulminaManana_LV;?></td>
                            <td class="td_1"><?php echo $CulminaManana_LV;?></td>
                            <td class="td_1"><?php echo $CulminaManana_FS;?></td>
                            <td class="td_1"><?php echo $CulminaManana_FS;?></td>
                        </tr>
                        <tr style="height: 20px;"></tr>
                        <tr>
                            <td class="td_1 td_7"><?php echo $IniciaTarde_LV;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_LV;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_LV;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_LV;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_LV;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_FS;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_FS;?></td>
                        </tr>
                        <tr>
                            <td class="td_1 td_7"><?php echo $CulminaTarde_LV;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_LV;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_LV;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_LV;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_LV;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_FS;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_FS;?></td>
                        </tr>
                    </tbody>
                </table>
            </article>

            <article>
                <div class="contGeneralCentro">   
                    <p class="contGeneral__p">Las compras realizadas fuera del horario de despacho serán entregadas en el bloque siguiente de apertura.</p>   
                    
                </div>
            </article>

            <article>
                <div class="contBoton" id="Contenedor_26">
                    <a class="boton boton--alto" href="javascript:history.back()">Cerrar horario</a>
                </div>
            </article>
        </div>
    </section>
</section>
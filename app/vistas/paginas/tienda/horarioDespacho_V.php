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

                $InicioManana_Sab = $Datos['horarioTienda_Sab'][0]['inicia_m_Sab'];
                $CulminaManana_Sab = $Datos['horarioTienda_Sab'][0]['culmina_m_Sab'];
                $IniciaTarde_Sab = $Datos['horarioTienda_Sab'][0]['inicia_t_Sab'];
                $CulminaTarde_Sab = $Datos['horarioTienda_Sab'][0]['culmina_t_Sab'];  
              
                $InicioManana_Dom = $Datos['horarioTienda_Dom'][0]['inicia_m_Dom'];
                $CulminaManana_Dom = $Datos['horarioTienda_Dom'][0]['culmina_m_Dom'];
                $IniciaTarde_Dom = $Datos['horarioTienda_Dom'][0]['inicia_t_Dom'];
                $CulminaTarde_Dom = $Datos['horarioTienda_Dom'][0]['culmina_t_Dom']; 

                $InicioManana_Sab = $InicioManana_Sab != '12:00 AM' ? $InicioManana_Sab : '--';
                $CulminaManana_Sab = $CulminaManana_Sab != '12:00 AM' ? $CulminaManana_Sab : '--';
                $IniciaTarde_Sab = $IniciaTarde_Sab != '12:00 AM' ? $IniciaTarde_Sab : '--';
                $CulminaTarde_Sab = $CulminaTarde_Sab != '12:00 AM' ? $CulminaTarde_Sab : '--';              
                
                $InicioManana_Dom = $InicioManana_Dom != '12:00 AM' ? $InicioManana_Dom : '--';
                $CulminaManana_Dom = $CulminaManana_Dom != '12:00 AM' ? $CulminaManana_Dom : '--';
                $IniciaTarde_Dom = $IniciaTarde_Dom != '12:00 AM' ? $IniciaTarde_Dom : '--';
                $CulminaTarde_Dom = $CulminaTarde_Dom != '12:00 AM' ? $CulminaTarde_Dom : '--'; 
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
                            <td class="td_1"><?php echo $InicioManana_Sab;?></td>
                            <td class="td_1"><?php echo $InicioManana_Dom;?></td>
                        </tr>
                        <tr>
                            <td class="td_1 td_7"><?php echo $CulminaManana_LV;?></td>
                            <td class="td_1"><?php echo $CulminaManana_LV;?></td>
                            <td class="td_1"><?php echo $CulminaManana_LV;?></td>
                            <td class="td_1"><?php echo $CulminaManana_LV;?></td>
                            <td class="td_1"><?php echo $CulminaManana_LV;?></td>
                            <td class="td_1"><?php echo $CulminaManana_Sab;?></td>
                            <td class="td_1"><?php echo $CulminaManana_Dom;?></td>
                        </tr>
                        <tr style="height: 20px;"></tr>
                        <tr>
                            <td class="td_1 td_7"><?php echo $IniciaTarde_LV;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_LV;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_LV;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_LV;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_LV;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_Sab;?></td>
                            <td class="td_1"><?php echo $IniciaTarde_Dom;?></td>
                        </tr>
                        <tr>
                            <td class="td_1 td_7"><?php echo $CulminaTarde_LV;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_LV;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_LV;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_LV;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_LV;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_Sab;?></td>
                            <td class="td_1"><?php echo $CulminaTarde_Dom;?></td>
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
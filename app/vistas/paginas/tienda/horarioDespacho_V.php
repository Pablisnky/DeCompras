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
                <div class="contTabla">
                    <table class="tabla1">
                        <thead>
                            <tr>
                                <th class="tabla1__th">LUNES</th>
                                <th class="tabla1__th">MARTES</th>
                                <th class="tabla1__th">MIERCOLES</th>
                                <th class="tabla1__th">JUEVES</th>
                                <th class="tabla1__th">VIERNES</th>
                                <th class="tabla1__th">SABADO</th>
                                <th class="tabla1__th">DOMINGO</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="tabla1__td"><?php echo $InicioManana_LV;?></td>
                                <td class="tabla1__td"><?php echo $InicioManana_LV;?></td>
                                <td class="tabla1__td"><?php echo $InicioManana_LV;?></td>
                                <td class="tabla1__td"><?php echo $InicioManana_LV;?></td>
                                <td class="tabla1__td"><?php echo $InicioManana_LV;?></td>
                                <td class="tabla1__td"><?php echo $InicioManana_Sab;?></td>
                                <td class="tabla1__td"><?php echo $InicioManana_Dom;?></td>
                            </tr>
                            <tr>
                                <td class="tabla1__td"><?php echo $CulminaManana_LV;?></td>
                                <td class="tabla1__td"><?php echo $CulminaManana_LV;?></td>
                                <td class="tabla1__td"><?php echo $CulminaManana_LV;?></td>
                                <td class="tabla1__td"><?php echo $CulminaManana_LV;?></td>
                                <td class="tabla1__td"><?php echo $CulminaManana_LV;?></td>
                                <td class="tabla1__td"><?php echo $CulminaManana_Sab;?></td>
                                <td class="tabla1__td"><?php echo $CulminaManana_Dom;?></td>
                            </tr>
                            <tr style="height: 20px;"></tr>
                            <tr>
                                <td class="tabla1__td"><?php echo $IniciaTarde_LV;?></td>
                                <td class="tabla1__td"><?php echo $IniciaTarde_LV;?></td>
                                <td class="tabla1__td"><?php echo $IniciaTarde_LV;?></td>
                                <td class="tabla1__td"><?php echo $IniciaTarde_LV;?></td>
                                <td class="tabla1__td"><?php echo $IniciaTarde_LV;?></td>
                                <td class="tabla1__td"><?php echo $IniciaTarde_Sab;?></td>
                                <td class="tabla1__td"><?php echo $IniciaTarde_Dom;?></td>
                            </tr>
                            <tr>
                                <td class="tabla1__td"><?php echo $CulminaTarde_LV;?></td>
                                <td class="tabla1__td"><?php echo $CulminaTarde_LV;?></td>
                                <td class="tabla1__td"><?php echo $CulminaTarde_LV;?></td>
                                <td class="tabla1__td"><?php echo $CulminaTarde_LV;?></td>
                                <td class="tabla1__td"><?php echo $CulminaTarde_LV;?></td>
                                <td class="tabla1__td"><?php echo $CulminaTarde_Sab;?></td>
                                <td class="tabla1__td"><?php echo $CulminaTarde_Dom;?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>

            <article>
                <div class="contGeneralCentro">   
                    <p class="contGeneral__p">Las compras realizadas fuera del horario de despacho serán entregadas en el siguiente bloque de apertura.</p>   
                    
                </div>
            </article>

            <article>
                <div class="contBoton" id="Contenedor_26">
                    <a class="boton boton--largo" href="javascript:history.back()">Cerrar horario</a>
                </div>
            </article>
        </div>
    </section>
</section>
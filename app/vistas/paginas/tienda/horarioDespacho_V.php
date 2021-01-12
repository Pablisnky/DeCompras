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
                // Con los ciclos foreach se reciben los dias de la semana
                foreach($Datos['horarioTienda_LV'] as $Dias_LV) :
                    $Lunes_m = $Dias_LV['lunes_m']; 
                    $Martes_m = $Dias_LV['martes_m']; 
                    $Miercoles_m = $Dias_LV['miercoles_m']; 
                    $Jueves_m = $Dias_LV['jueves_m']; 
                    $Viernes_m = $Dias_LV['viernes_m']; 
                    $Lunes_t = $Dias_LV['lunes_t']; 
                    $Martes_t = $Dias_LV['martes_t']; 
                    $Miercoles_t = $Dias_LV['miercoles_t']; 
                    $Jueves_t = $Dias_LV['jueves_t']; 
                    $Viernes_t = $Dias_LV['viernes_t']; 
                endforeach;
                
                foreach($Datos['horarioTienda_Sab'] as $Sabado) :
                    $Sabado_m = $Sabado['sabado_m']; 
                    $Sabado_t = $Sabado['sabado_t']; 
                endforeach;

                foreach($Datos['horarioTienda_Dom'] as $Domingo) :
                    $Domingo_m = $Domingo['domingo_m']; 
                    $Domingo_t = $Domingo['domingo_t']; 
                endforeach;
                
                foreach($Datos['horarioTienda_Esp'] as $Especial) :
                    $Especial_m = $Especial['especial_m']; 
                    $Especial_t = $Especial['especial_t']; 
                endforeach;

                //Con la metodologia del corchete se reciben los horarios
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
                
                $IniciaManana_Esp = $Datos['horarioTienda_Esp'][0]['inicia_m_Esp'];
                $CulminaManana_Esp = $Datos['horarioTienda_Esp'][0]['culmina_m_Esp'];
                $IniciaTarde_Esp = $Datos['horarioTienda_Esp'][0]['inicia_t_Esp'];
                $CulminaTarde_Esp = $Datos['horarioTienda_Esp'][0]['culmina_t_Esp'];
                
                
                $Lun_m_inicia = $Lunes_m != '0' ? $InicioManana_LV : '--';
                $Mar_m_inicia = $Martes_m != '0' ? $InicioManana_LV : '--';
                $Mie_m_inicia = $Miercoles_m != '0' ? $InicioManana_LV : '--';
                $Jue_m_inicia = $Jueves_m != '0' ? $InicioManana_LV : '--';
                $Vie_m_inicia = $Viernes_m != '0' ? $InicioManana_LV : '--';

                $Lun_m_culminaL = $Lunes_m != '0' ? $CulminaManana_LV : '--';
                $Mar_m_culmina = $Martes_m != '0' ? $CulminaManana_LV : '--';
                $Mie_m_culmina = $Miercoles_m != '0' ? $CulminaManana_LV : '--';
                $Jue_m_culmina = $Jueves_m != '0' ? $CulminaManana_LV : '--';
                $Vie_m_culmina = $Viernes_m != '0' ? $CulminaManana_LV : '--';

                $Lun_t_inicia = $Lunes_t != '0' ? $IniciaTarde_LV : '--';
                $Mar_t_inicia = $Martes_t != '0' ? $IniciaTarde_LV : '--';
                $Mie_t_inicia = $Miercoles_t != '0' ? $IniciaTarde_LV : '--';
                $Jue_t_inicia = $Jueves_t != '0' ? $IniciaTarde_LV : '--';
                $Vie_t_inicia = $Viernes_t != '0' ? $IniciaTarde_LV : '--';
                
                $Lun_t_culmina = $Lunes_t != '0' ? $CulminaTarde_LV : '--';
                $Mar_t_culmina = $Martes_t != '0' ? $CulminaTarde_LV : '--';
                $Mie_t_culmina = $Miercoles_t != '0' ? $CulminaTarde_LV : '--';
                $Jue_t_culmina = $Jueves_t != '0' ? $CulminaTarde_LV : '--';
                $Vie_t_culmina = $Viernes_t != '0' ? $CulminaTarde_LV : '--';

                //Se evalua el horario especial para sobreescribir el valor de los horarios de ese dia
                if($Especial_m != '0' || $Especial_t !='0'){
                    //Evalua si el horario especial es para el día lunes
                    if($Especial_m == 'Lunes'){
                        $Lun_m_inicia = $IniciaManana_Esp;
                    }
                    if($Especial_m == 'Lunes'){
                        $Lun_m_culmina = $CulminaManana_Esp;
                    }
                    if($Especial_t == 'Lunes'){
                        $Lun_t_inicia = $IniciaTarde_Esp;
                    }
                    if($Especial_t == 'Lunes'){
                        $Lun_t_culmina = $CulminaTarde_Esp;
                    }
                    //Evalua si el horario especial es para el día martes
                    if($Especial_m == 'Martes'){
                        $Mar_m_inicia = $IniciaManana_Esp;
                    }
                    if($Especial_m == 'Martes'){
                        $Mar_m_culmina = $CulminaManana_Esp;
                    }
                    if($Especial_t == 'Martes'){
                        $Mar_t_inicia = $IniciaTarde_Esp;
                    }
                    if($Especial_t == 'Martes'){
                        $Mar_t_culmina = $CulminaTarde_Esp;
                    }
                    //Evalua si el horario especial es para el día miercoles
                    if($Especial_m == 'Miercoles'){
                        $Mie_m_inicia = $IniciaManana_Esp;
                    }
                    if($Especial_m == 'Miercoles'){
                        $Mie_m_culmina = $CulminaManana_Esp;
                    }
                    if($Especial_t == 'Miercoles'){
                        $Mie_t_inicia = $IniciaTarde_Esp;
                    }
                    if($Especial_t == 'Miercoles'){
                        $Mie_t_culmina = $CulminaTarde_Esp;
                    }
                    //Evalua si el horario especial es para el día jueves
                    if($Especial_m == 'Jueves'){
                        $Jue_m_inicia = $IniciaManana_Esp;
                    }
                    if($Especial_m == 'Jueves'){
                        $Jue_m_culmina = $CulminaManana_Esp;
                    }
                    if($Especial_t == 'Jueves'){
                        $Jue_t_inicia = $IniciaTarde_Esp;
                    }
                    if($Especial_t == 'Jueves'){
                        $Jue_t_culmina = $CulminaTarde_Esp;
                    }
                    //Evalua si el horario especial es para el día viernes
                    if($Especial_m == 'Viernes'){
                        $Vie_m_inicia = $IniciaManana_Esp;
                    }
                    if($Especial_m == 'Viernes'){
                        $Vie_m_culmina = $CulminaManana_Esp;
                    }
                    if($Especial_t == 'Viernes'){
                        $Vie_t_inicia = $IniciaTarde_Esp;
                    }
                    if($Especial_t == 'Viernes'){
                        $Vie_t_culmina = $CulminaTarde_Esp;
                    }
                }

                if($InicioManana_Sab != '12:00 AM' && $Sabado_m != '0'){
                    $Sab_m_inicia = $InicioManana_Sab;
                }
                else{
                    $Sab_m_inicia = '--';
                }
                if($CulminaManana_Sab != '12:00 AM' && $Sabado_m != '0'){
                    $Sab_m_culmina = $CulminaManana_Sab;
                }
                else{
                    $Sab_m_culmina = '--';
                }
                if($IniciaTarde_Sab != '12:00 AM' && $Sabado_t != '0'){
                    $Sab_t_inicia = $IniciaTarde_Sab;
                }
                else{
                    $Sab_t_inicia = '--';
                }
                if($CulminaTarde_Sab != '12:00 AM' && $Sabado_t != '0'){
                    $Sab_t_culmina = $CulminaTarde_Sab;
                }
                else{
                    $Sab_t_culmina = '--';
                }                
                if($InicioManana_Dom != '12:00 AM' && $Domingo_m != '0'){
                    $Dom_m_inicia = $InicioManana_Dom;
                }
                else{
                    $Dom_m_inicia = '--';
                }
                if($CulminaManana_Dom != '12:00 AM' && $Domingo_m != '0'){
                    $Dom_m_culmina = $CulminaManana_Dom;
                }
                else{
                    $Dom_m_culmina = '--';
                }
                if($IniciaTarde_Dom != '12:00 AM' && $Domingo_t != '0'){
                    $Dom_t_inicia = $IniciaTarde_Dom;
                }
                else{
                    $Dom_t_inicia = '--';
                }
                if($CulminaTarde_Dom != '12:00 AM' && $Domingo_t != '0'){
                    $Dom_t_culmina = $CulminaTarde_Dom;
                }
                else{
                    $Dom_t_culmina = '--';
                }


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
                                <td class="tabla1__td"><?php echo $Lun_m_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Mar_m_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Mie_m_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Jue_m_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Vie_m_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Sab_m_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Dom_m_inicia;?></td>
                            </tr>
                            <tr>
                                <td class="tabla1__td"><?php echo $Lun_m_culminaL;?></td>
                                <td class="tabla1__td"><?php echo $Mar_m_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Mie_m_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Jue_m_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Vie_m_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Sab_m_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Dom_m_culmina;?></td>
                            </tr>
                            <tr style="height: 20px;"></tr>
                            <tr>
                                <td class="tabla1__td"><?php echo $Lun_t_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Mar_t_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Mie_t_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Jue_t_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Vie_t_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Sab_t_inicia;?></td>
                                <td class="tabla1__td"><?php echo $Dom_t_inicia;?></td>
                            </tr>
                            <tr>
                                <td class="tabla1__td"><?php echo $Lun_t_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Mar_t_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Mie_t_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Jue_t_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Vie_t_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Sab_t_culmina;?></td>
                                <td class="tabla1__td"><?php echo $Dom_t_culmina;?></td>
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
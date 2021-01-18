<section class="sectionModal">
    <section> <!-- ORDEN DE COMPRA -->
        <div class="contenedor_24">
            <header>
                <h1 class="h1_1">Horario de Despachos</h1>
                <!--$Datos proviene de Tiendas_C/horarioTienda-->
                <h1 class="h2_6"><?php echo $Datos['nombreTienda'];?></h1>
                <br>
            </header>

            <article>
            
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
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Lun_m_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Mar_m_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Mie_m_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Jue_m_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Vie_m_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Sab_m_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Dom_m_inicia'];?></td>
                            </tr>
                            <tr>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Lun_m_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Mar_m_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Mie_m_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Jue_m_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Vie_m_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Sab_m_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Dom_m_culmina'];?></td>
                            </tr>
                            <tr style="height: 20px;"></tr>
                            <tr>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Lun_t_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Mar_t_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Mie_t_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Jue_t_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Vie_t_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Sab_t_inicia'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Dom_t_inicia'];?></td>
                            </tr>
                            <tr>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Lun_t_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Mar_t_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Mie_t_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Jue_t_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Vie_t_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Sab_t_culmina'];?></td>
                                <td class="tabla1__td"><?php echo $Datos['disponibilidaHoraria']['Dom_t_culmina'];?></td>
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
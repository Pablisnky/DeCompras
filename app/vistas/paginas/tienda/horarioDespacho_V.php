<section class="sectionModal">
    <section> <!-- ORDEN DE COMPRA -->
        <div class="contenedor_24">
            <header>
                <h1 class="h1_1">Horario de Despachos</h1>
                <?php echo $Datos['nombreTienda'];?>
            </header>

            <article>
            <?php 
                //$Datos proviene de Tiendas_C/horarioTienda
                $InicioManana = $Datos['horarioTienda'][0]['inicio_m'];
                $CulminaManana = $Datos['horarioTienda'][0]['culmina_m'];
                $IniciaTarde = $Datos['horarioTienda'][0]['inicia_t'];
                $CulminaTarde = $Datos['horarioTienda'][0]['culmina_t'];            
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
                            <td class="td_1 td_7" class="td_1"><?php echo $InicioManana;?></td>
                            <td class="td_1"><?php echo $InicioManana;?></td>
                            <td class="td_1"><?php echo $InicioManana;?></td>
                            <td class="td_1"><?php echo $InicioManana;?></td>
                            <td class="td_1"><?php echo $InicioManana;?></td>
                            <td class="td_1"><?php echo $InicioManana;?></td>
                            <td class="td_1"><?php echo $InicioManana;?></td>
                        </tr>
                        <tr>
                            <td class="td_1 td_7"><?php echo $CulminaManana;?></td>
                            <td class="td_1"><?php echo $CulminaManana;?></td>
                            <td class="td_1"><?php echo $CulminaManana;?></td>
                            <td class="td_1"><?php echo $CulminaManana;?></td>
                            <td class="td_1"><?php echo $CulminaManana;?></td>
                            <td class="td_1"><?php echo $CulminaManana;?></td>
                            <td class="td_1"><?php echo $CulminaManana;?></td>
                        </tr>
                        <tr style="height: 20px;"></tr>
                        <tr>
                            <td class="td_1 td_7"><?php echo $IniciaTarde;?></td>
                            <td class="td_1"><?php echo $IniciaTarde;?></td>
                            <td class="td_1"><?php echo $IniciaTarde;?></td>
                            <td class="td_1"><?php echo $IniciaTarde;?></td>
                            <td class="td_1"><?php echo $IniciaTarde;?></td>
                            <td class="td_1"><?php echo $IniciaTarde;?></td>
                            <td class="td_1"><?php echo $IniciaTarde;?></td>
                        </tr>
                        <tr>
                            <td class="td_1 td_7"><?php echo $CulminaTarde;?></td>
                            <td class="td_1"><?php echo $CulminaTarde;?></td>
                            <td class="td_1"><?php echo $CulminaTarde;?></td>
                            <td class="td_1"><?php echo $CulminaTarde;?></td>
                            <td class="td_1"><?php echo $CulminaTarde;?></td>
                            <td class="td_1"><?php echo $CulminaTarde;?></td>
                            <td class="td_1"><?php echo $CulminaTarde;?></td>
                        </tr>
                    </tbody>
                </table>
            </article>

            <article>
                <div class="contGeneral">   
                    <label class="">las compras realizadas fuera del horario de despacho serán entregadas en el siguiente bloque correspondiente de despacho.</label>   
                    
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
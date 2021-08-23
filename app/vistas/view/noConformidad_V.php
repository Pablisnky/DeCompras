    <?php
    //$Datos viene desde NoConformidad_C/recibeNoConformidades
    if($Datos != 'AcuseRecibo'){  ?>
        <section class="section_5">
            <div class="contenedor_42">
                <h1 class="h1_1">Reporte de no conformidades</h1>
                <section>
                    <table class="tabla_1">
                        <thead>
                            <th class="th_1">Código Despacho</th>
                            <th class="th_3">Tienda</th>
                            <th class="th_1">Fecha</th>
                            <th class="th_1">Hora</th>
                        </thead>
                        <tbody>
                            <tr>
                                <!-- SDatos se recibe de NoConformidad_C/noConformidad -->
                                <td class="td_1"><?php echo $Datos['id_pedido']?></td>
                                <td class="td_1"><?php echo $Datos['tienda']?></td>
                                <td class="td_1"><?php echo $Datos['fecha']?></td>
                                <td class="td_1"><?php echo $Datos['hora']?></td>
                            </tr>
                        </tbody>
                    </table>
                </section>
                
                <section>
                        <form action="<?php echo RUTA_URL . '/noConformidad_C/recibeNoConformidad';?>" method="POST" onsubmit = "return validarNoConformidad()">
                            <div class="contenedor_169">
                                <fieldset class="fieldset_4">
                                    <legend class="legend_1">Posibles fallos</legend>
                                    <input type="checkbox" name="noConformidad_1" id="NoConformidad_1"/>
                                    <label for="NoConformidad_1">El despacho llego despues del tiempo especificado.</label>
                                    <br class="br_1">
                                    <input type="checkbox" name="noConformidad_2" id="NoConformidad_2"/>
                                    <label for="NoConformidad_2">El producto no era lo que se pidio.</label>
                                    <br class="br_1">
                                    <input type="checkbox" name="noConformidad_3" id="NoConformidad_3"/>
                                    <label for="NoConformidad_3">El producto llego en mal estado.</label>
                                    <br class="br_1">
                                    <input type="checkbox" name="noConformidad_4" id="NoConformidad_4"/>
                                    <label for="NoConformidad_4">El despacho aún no llega.</label>
                                    <br class="br_1">
                                    <p>Otra condicion (Opcional)</p>
                                    <div style="margin:auto">
                                        <textarea class="textarea_4 borde_1" name="otraNoConformidad"></textarea>
                                        <!-- <input class="contador_2 contador_3" type="text" id="ContadorNoConformidad" value="200"/> -->
                                    </div>
                                </fieldset>
                            </div>   
                            <div class="contenedor_41">
                                <input class="ocultar" type="text" name="id_tienda" value="<?php echo $Datos['id_tienda']?>"/>
                                <input class="ocultar" type="text" name="id_pedido" value="<?php echo $Datos['id_pedido']?>"/>
                                <a class="boton" href="<?php echo RUTA_URL . '/Inicio_C/';?>">Cerrar</a>
                                <input class="boton" type="submit" value="Enviar"/>
                            </div>    
                        </form> 
                </section>
            </div>  
        </section>  <?php
    }
    else{   ?>
        <section class="section_5">
            <div class="contenedor_42">
                <h1 class="h1_1">Hemos registrado su no conformidad</h1>
                <div class='contenedor_39'>
                    <P class="p_6">Le mantendremos informado.</P>
                    <div class="contenedor_33">
                        <a class="boton" href="<?php echo RUTA_URL . '/Inicio_C';?>">Inicio</a>
                    </div>
                </div>
            </div>
        </section>  <?php
    }   ?>
		
<script type="application/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_NoConformidad.js';?>"></script>

<?php include(RUTA_APP . "/vistas/footer/footer.php");?>
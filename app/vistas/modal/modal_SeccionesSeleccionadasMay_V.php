<!-- Archivo invocado por Mayorista_C/SeccionesSeleccionadasMay-->
<section class="sectionModal section_10" id="MostrarSeccion">
    <div class="contenedor_24"> 
        <div class="contenedor_102">
            <h1 class="h1_1 h1_3">Cambie la sección actual</h1>   
            <span class="span_5 span_5--black" id="Span_5">X</span>
        </div>
        <form>
            <div class="contenedor_89">
                <?php      
                $ContadorSeccion = 1;
                $ID_SeccionActiva = $Datos['seccionActiva'][0]['ID_SeccionMay'];
               
                foreach($Datos['seccionesMay'] as $row){
                    $ID_SeccionMayorista = $row['ID_SeccionMay']; 
                    $SeccionMayorista = $row['seccionMay'];
                    ?>
                    <div class="contenedor_115">
                        <input type="radio" name="secciones" id="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>" value="<?php echo $SeccionMayorista?>" onclick="transferirSeccionActualizarMay(this.form, '<?php echo $ID_SeccionMayorista;?>')" <?php if($ID_SeccionActiva == $ID_SeccionMayorista){echo "checked";}?>/> 

                        <input class="ocultar" type="text" name="ID_Seccion" value="<?php echo $ID_SeccionMayorista?>"/>
                        
                        <label class="label_14 contInputRadio__label" for="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>"> <?php echo $SeccionMayorista ?></label>
                </div>
                    <?php
                $ContadorSeccion++;
                }  
                ?>  
            </div> 
        </form>   
        <hr class="hr_3"/>
        <label class="label_18">Sino encuentra una sección adecuada para su producto, añada una nueva sección en Configurar cuenta</label>   
    </div>
</section>      
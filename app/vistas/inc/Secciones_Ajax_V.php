<!-- Archivo cargado desde Ajax por medio de Llamar_seccion() y mostrado en cuenta_editar_V.php -->
<section class="section_3 section_8" id="MostrarSeccion">
    <div class="contenedor_24"> 
      <label class="label_3">Selecciona una sección</label>   
      <span class="span_5" id="Span_5">X</span>
      <form>
          <div class="contenedor_89">
              <?php      
              $ContadorSeccion = 1;
              foreach($Datos['seccion'] as $row){
                $SeccionTienda = $row['seccion']; ?>
                <div class="">
                  <input class="" type="radio" name="seccion" id="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>" value="<?php echo $SeccionTienda?>" onclick="transferirSeccion(this.form)"/>
                  <label class="label_14 label_12" for="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>"><?php echo $SeccionTienda ?></label>
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
<!-- Archivo cargado desde Ajax por medio de Llamar_seccionesDisponibleMay() en Cuenta_publicarMay_V.php -->
<section class="sectionModal section_10" id="MostrarSeccion">
    <div class="contenedor_24"> 
      <div class="contenedor_102">
        <h1 class="h1_1 h1_3">Seleccione una sección</h1>   
        <span class="span_5 span_5--black" id="Span_5">X</span>
      </div>
      <form>
          <div class="contenedor_89">
              <?php      
              $ContadorSeccion = 1;
              //$Datos['seccion'] trae información desde Mayorista_C/SeccionesDisponiblesMay
              foreach($Datos['seccionesMay'] as $row){
                $SeccionMayorista = $row['seccionMay']; ?>
                <div class="contInputRadio">
                    <input class="" type="radio" name="seccionMay" id="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>" value="<?php echo $SeccionMayorista?>" onclick="transferirSeccionMay(this.form, 'SeccionPublicarMay')"/> 
                    <label class="contInputRadio__label" for="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>"> <?php echo $SeccionMayorista ?></label>
              </div>
                <?php
              $ContadorSeccion++;
              }  
              ?>  
          </div> 
      </form>   
      <!-- <hr class="hr_3"/> -->
      <!-- <label class="label_18">Sino encuentra una sección adecuada para su producto, añada una nueva sección en "Configurar" del menu principal.</label>    -->
    </div>
</section>    
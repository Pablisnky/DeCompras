<!-- Archivo cargado desde Ajax por medio de Llamar_seccion() y mostrado en cuenta_publicar.php y cuenta_publicar_V.php -->
<section class="section_4 section_10" id="MostrarSeccion">
    <div class="contenedor_24"> 
      <div class="contenedor_102">
        <h1 class="h1_1 h1_3">Seleccione una sección </h1>   
        <span class="span_5" id="Span_5">X</span>
      </div>
      <form>
          <div class="contenedor_89">
              <?php      
              $ContadorSeccion = 1;
              //$Datos['seccion'] trae información de la consulta Secciones() desde Cuenta_C.php con todas las secciones que tiene la tienda
              foreach($Datos['seccion'] as $row){
                $SeccionTienda = $row['seccion']; ?>
                <div class="contenedor_115">
                    <input class="" type="radio" name="seccion" id="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>" value="<?php echo $SeccionTienda?>" onclick="transferirSeccion(this.form, 'SeccionPublicar')"/> 
                    <label class="label_14 label_12" for="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>"> <?php echo $SeccionTienda ?></label>
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
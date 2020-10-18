<!-- Archivo cargado desde Ajax por medio de Llamar_seccion() y mostrado en cuenta_editar_prod_V.php -->
<section class="section_4 section_10" id="MostrarSeccion">
    <div class="contenedor_24"> 
      <div class="contenedor_102">
        <h1 class="h1_1 h1_3">Cambie la sección actual</h1>   
        <span class="span_5" id="Span_5">X</span>
      </div>
      <form>
          <div class="contenedor_89">
              <?php      
              $ContadorSeccion = 1;
              //$Datos['seccion'] trae información de la consulta Secciones() desde Cuenta_C.php con todas las secciones que tiene la tienda
              // echo "<pre>";
              // print_r($Datos['seccion']);
              // echo "</pre>";
              foreach($Datos['seccion'] as $row){
                $ID_SeccionTienda = $row['ID_Seccion']; 
                $SeccionTienda = $row['seccion'];
                // echo  $ID_SeccionTienda;
                // echo $SeccionTienda;
                // exit(); 

                ?>
                <div class="contenedor_115">
                  <?php
                    // $Datos['seccionActiva'] trae información de la consulta seccionActiva() desde Cuenta_C con la sección a la que pertenece un producto
                    $seccionActiva = $Datos['seccionActiva'][0]['seccion'];
                    ?>
                    <input type="radio" name="secciones" id="<?php echo 'ContadorSeccion_' . $ContadorSeccion;?>" value="<?php echo $SeccionTienda?>" onclick="transferirSeccionActualizar(this.form)" <?php if($SeccionTienda == $seccionActiva){echo "checked";}?>/> 

                    <input class="ocultar" type="text" name="ID_Seccion" value="<?php echo $ID_SeccionTienda?>"/>
                    
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
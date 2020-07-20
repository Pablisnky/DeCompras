<!-- Archivo cargado por petición Ajax desde funcionesAjax.js en la función llamar_Opciones() -->
<section class="section_3" >
    <div class="contenedor_13">
        <span class="span_5" onclick="CerrarModal_X()">X</span>
        <label class="label_3">Elija una opción</label>         
            <?php
            if(!empty($Datos)){
                foreach($Datos as $row){
                    $Opcion = $row['opciones'];
                    ?> 
                    <label class="label_4" for="opcion_A" onclick="transferirOpcion()"><?php echo $Opcion?></label> 
                    <input type="radio" name="opcion" value="<?php echo $Opcion?>" id="opcion_A" onclick="transferirOpcion()" hidden>
                        <?php 
                }
            }
            else{
                echo "No hay productos";
            }   
        ?>                    
    </div>
</section> 
  

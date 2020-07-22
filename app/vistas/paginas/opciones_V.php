<!-- Archivo cargado por petición Ajax desde funcionesAjax.js en la función llamar_Opciones() -->
<section class="section_3">
    <form>
        <div class="contenedor_13">
            <span class="span_5" id="Span_5" onclick="CerrarModal_X()">X</span>
            <label class="label_3">Elija una opción</label>         
            <?php   
            if($Datos["AgregarNodo"] == 'No'){
                $ContadorLabel = 1;
                foreach($Datos['Inf_Consulta'] as $row){
                    $Opcion = $row['opciones'];
                    ?>                      
                    <input id="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" type="radio" name="opcion" value="<?php echo $Opcion;?>" onclick="transferirOpcion(this.form)" hidden/>
                    <label for="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" class="label_4"><?php echo $Opcion;?></label> 
                    <?php 
                    $ContadorLabel++;
                }
            }
            else{
                $ContadorLabel = 1;
                $ContPadre = $Datos["Cont_Pad"]; //Trae el ID del contenedor padre
                $ContAClonar = $Datos["Cont_a_Clonar"];//Trae elID del contenedor a Clonar
                foreach($Datos['Inf_Consulta'] as $row){
                    $Opcion = $row['opciones'];
                    ?>                      
                    <input id="<?php echo 'ContadorLabel_' . $ContadorLabel?>" type="radio" name="opcion" value="<?php echo $Opcion?>" onclick="AgregaOpcion(this.form, '<?php echo $ContPadre?>','<?php echo $ContAClonar;?>')" hidden>
                    <label for="<?php echo 'ContadorLabel_' . $ContadorLabel?>" class="label_4"><?php echo $Opcion?></label> 
                    <?php 
                $ContadorLabel++;
                }
            }   
            ?>                    
        </div>
    </form>
</section>   
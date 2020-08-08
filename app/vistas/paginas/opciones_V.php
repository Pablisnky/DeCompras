<!-- Archivo cargado por petición Ajax desde funcionesAjax.js en la función llamar_Opciones() -->
<section class="section_3" id="Section_3">
    <div class="contenedor_38">
        <a class="a_1" href="<?php echo RUTA_URL . '/Inicio_C';?>">
            <span class="span_1" id="Span_1">PedidoRemoto</span>
        </a>
    </div>
    <form>
        <div class="contenedor_13">
            <span class="span_5" id="Span_5" onclick="CerrarModal_X('Section_3')">X</span>
            <label class="label_3">Elija una opción</label>         
            <?php   
            if($Datos["AgregarNodo"] == 'No'){
                $ContadorLabel = 1;
                foreach($Datos['Inf_Consulta'] as $row){
                    $ID_Opcion =  $row['ID_Opcion'];
                    $Opcion = $row['opcion'];
                    $Precio = $row['precio'];

                    //Se da formato al precio, sin decimales y con separación de miles
                    $Precio = number_format($Precio, 0, ",", ".");
                    ?>                      
                    <input class="input_3" id="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" type="radio" name="opcion" value="<?php echo $ID_Opcion.",".$Opcion .",". $Precio;?>" onclick="transferirOpcion(this.form)"/>
                    <label for="<?php echo 'ContadorLabel_' . $ContadorLabel;?>" class="label_4"><pre><?php echo $Opcion    . "         ".    $Precio . " Bs";?></pre></label> 
                    <?php 
                    $ContadorLabel++;
                }
            }
            else{//Cuando se viene de un clon
                $ContadorLabel = 1;
                $ContPadre = $Datos["Cont_Pad"];//Trae el ID del contenedor padre
                $ContAClonar = $Datos["Cont_a_Clonar"];//Trae elID del contenedor a Clonar
                foreach($Datos['Inf_Consulta'] as $row){
                    $ID_Opcion =  $row['ID_Opcion'];
                    $Opcion = $row['opcion'];
                    $Precio = $row['precio'];
                    
                    //Se da formato al precio, sin decimales y con separación de miles
                    $Precio = number_format($Precio, 0, ",", ".");
                    ?>                      
                    <input class="input_3" id="<?php echo 'ContadorLabel_' . $ContadorLabel?>" type="radio" name="opcion" value="<?php echo $ID_Opcion.",".$Opcion .",". $Precio;?>" onclick="AgregaOpcion(this.form, '<?php echo $ContPadre?>','<?php echo $ContAClonar;?>')"/>
                    <label for="<?php echo 'ContadorLabel_' . $ContadorLabel?>" class="label_4"><pre><?php echo $Opcion    . "         ".    $Precio . " Bs";?></pre></label> 
                    <?php 
                $ContadorLabel++;
                }
            }   
            ?>                    
        </div>
    </form>
</section>   
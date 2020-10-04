<!-- Archivo cargado desde Ajax por medio de Llamar_categorias() y mostrado en cuenta_editar_V.php -->
<section class="section_4 section_10">
    <div class="contenedor_24 contenedor_118">   
        <div class="contenedor_102">
            <h1 class="h1_1 h1_3">Selecciona una o dos categorias.</h1>   
            <span class="span_5" onclick="CerrarCategoria('Mostrar_Categorias')">X</span><!--id="Span_5"-->
        </div>          
        <form>
            <div class="contenedor_76">
                <?php                        
                $ContadorCategoria = 1;
                //$Datos['categorias'] trae información de la consulta categorias() llamada desde Cuenta_C.php con todas las categorias que hay en la plataforma
                foreach($Datos['categorias'] as $row){
                    $Categoria = $row['categoria'];     ?>
                        <div class="contenedor_78">
                            <?php
                            //$Datos['categoriasTienda'] trae información de la consulta () llamada desde Cuenta_C.php con todas las categorias a las que pertece la tienda
                            if(!empty($Datos['categoriasTienda'])){
                                foreach($Datos['categoriasTienda'] as $row_2){
                                    $CategoriaT = $row_2['categoria']; 
                                ?>
                                    <input class="categoria_js" type="checkbox" name="categoria" id="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>" value="<?php   echo $Categoria;?>" <?php if($CategoriaT == $Categoria){echo "checked = 'checked'";} 
                                }?>/> <?php 
                            }
                            else{   ?>
                                <input  type="checkbox"  name="categoria" id="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>" value="<?php echo $Categoria?>"/> <?php
                            }     ?>           
                            <label class="label_14 label_12" for="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>"><?php echo $Categoria;?></label>
                        </div>
                    <?php
                    $ContadorCategoria++;
                }
                ?>
            </div> 
            <div class="contenedor_77">
                <input type="text" class="boton" onclick="transferirCategoria(this.form)" value="Guardar"/>
            </div>
        </form>
    </div>
</section>
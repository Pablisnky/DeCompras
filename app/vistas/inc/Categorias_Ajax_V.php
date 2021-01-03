<!-- Archivo cargado desde Ajax por medio de Llamar_categorias() en E_Cuenta_editar.js y mostrado en cuenta_editar_V.php -->    
<section class="sectionModal">
    <div class="contenedor_24 contenedor_118">   
        <div class="contenedor_102">
            <h1 class="h1_1">Selecciona una o dos categorias.</h1>   
            <span class="span_5" onclick="CerrarCategoria('Mostrar_Categorias')">X</span>
        </div>          
        <form >
            <div class="contGridTres">
                <?php                        
                $ContadorCategoria = 1;
                //$Datos['categorias'] trae información de la consulta categorias() llamada desde Cuenta_C.php con todas las categorias que hay en la plataforma
                // echo '<pre>';
                // print_r($Datos);
                // echo '</pre>';
                // exit;
                
                foreach($Datos['categorias'] as $row){  ?>                    
                    <div class="contInputRadio">    <?php
                        $Categoria = $row['categoria'];     
                        //$Datos['categoriasTienda'] trae información de la consulta llamada desde Cuenta_C.php con todas las categorias a las que pertece la tienda
                        if(!empty($Datos['categoriasTienda'])){
                            foreach($Datos['categoriasTienda'] as $row_2){
                                $CategoriaT = $row_2['categoria']; 
                            ?>
                                <input class="categoria_js" type="checkbox" name="categoria" id="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>" value="<?php   echo $Categoria;?>" 
                                <?php // if($CategoriaT == $Categoria){echo "checked = 'checked'";} 
                            }?>/> <?php 
                        }
                        else{   ?>
                            <input type="checkbox" name="categoria" id="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>" value="<?php echo $Categoria?>"/> <?php
                        }     ?>           
                        <label class="contInputRadio__label" for="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>"><?php echo $Categoria;?></label>
                    </div>
                    <?php

                    $ContadorCategoria++;
                }
                ?>
            </div> 
            <div class="contenedor_77">
                <input type="text" class="boton" onclick="return transferirCategoria(this.form);" value="Seleccionar"/>
            </div>
        </form>
    </div>
</section>
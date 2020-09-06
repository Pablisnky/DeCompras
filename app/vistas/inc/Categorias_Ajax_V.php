<!-- Archivo cargado desde Ajax por medio de Llamar_categorias() y mostrado en cuenta_editar_V.php -->
<section class="section_4 section_10">
    <div class="contenedor_24">  
        <h1 class="h1_1 h1_3 h1_5">Selecciona máximo tres categorias</h1>   
        <form>
            <div class="contenedor_76">
                <?php                        
                $ContadorCategoria = 1;
                //$Datos['categorias'] trae información de la consulta categorias() llamada desde Cuenta_C.php trae todas las categorias que hay en la plataforma
                foreach($Datos['categorias'] as $row){
                    $Categoria = $row['categoria'];     ?>
                        <div class="contenedor_78">
                            <?php
                            //$Datos['categoriasTienda'] trae información de la consulta () llamadas desde Cuenta_C.php que son todas las categorias a las que pertece la tienda
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
                <input type="text" class="boton" onclick="transferirCategoria(this.form)" value="Enviar"/>
            </div>
        </form>
    </div>
</section>
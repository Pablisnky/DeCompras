<!-- Archivo cargado desde Ajax por medio de Llamar_categorias() y mostrado en cuenta_editar_V.php -->
<section class="section_3">
    <div class="contenedor_24">  
        <label class="label_3">Selecciona máximo tres categorias</label>   
        <form>
            <div class="contenedor_76">
                <?php                        
                $ContadorCategoria = 1;
                $CategoriaTienda = array();
                //$Datos['categorias'] trae información de la consulta categorias() llamada desde Cuenta_C.php trae todas las categorias que hay en la plataforma
                foreach($Datos['categorias'] as $row){
                    $Categoria = $row['categoria'];
                        ?>
                        <div class="contenedor_78">
                            <?php
                            //$Datos['categoriasTienda'] trae información de la consulta () llamadas desde Cuenta_C.php que son todas las categorias a las que pertece la tienda
                            if(!empty($Datos['categoriasTienda'])){
                                foreach($Datos['categoriasTienda'] as $row_2){
                                    $CategoriaT = $row_2['categoria']; 
                                ?>
                                    <input class="categoria_js" type="checkbox"  name="categoria" id="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>" value="<?php echo $Categoria ?>"
                                    <?php if($CategoriaT == $Categoria){echo 'checked';} 
                                }?> /> <?php 
                            }
                            else{   ?>
                                <input  type="checkbox"  name="categoria" id="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>" value="<?php echo $Categoria?>"/> <?php
                            }     ?>           
                            <label class="label_14 label_12" for="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>"><?php echo $Categoria;?></label>
                        </div>
                    <?php
                    $ContadorCategoria++;
                }

                //Se convierte el array en una cadena, los elementos se separan con ","
                // $Cat_Tienda = implode(',', $Cat_Tienda);
                // var_dump($Cat_Tienda );
                ?>
            </div> 
            <div class="contenedor_77">
                <input type="text" class="boton" onclick="transferirCategoria(this.form)" value="Cerrando">
            </div>
        </form>
    </div>
</section>
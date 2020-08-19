<!-- Archivo cargado desde Ajax por medio de Llamar_categorias() y mostrado en cuenta_editar_V.php y registroCom_V.php -->
<section class="section_3">
    <div class="contenedor_24">  
        <label class="label_3">Selecciona máximo tres categorias</label>   
        <form>
            <div class="contenedor_76">
                <?php            
                $ContadorCategoria = 1;
                foreach($Datos as $row){
                    $Categoria =  $row['categoria'];
                    ?>
                        <div class="contenedor_78">
                            <input class="categoria_js" type="checkbox" name="categoria" id="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>" value="<?php echo $Categoria;?>"/>
                            <label class="label_14 label_12" for="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>"><?php echo $Categoria;?></label>
                        </div>
                    <?php
                    $ContadorCategoria++;
                }
                ?>
            </div>
            <div class="contenedor_77">
                <label class="boton" onclick="transferirCategoria()">Cerrar</label>
            </div>
        </form>
    </div>
</section>
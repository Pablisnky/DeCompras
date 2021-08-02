<!-- Archivo cargado desde Ajax por medio de Llamar_categorias() en E_Cuenta_editar.js y mostrado en cuenta_editar_V.php -->    
<section class="sectionModal">

    <!-- ICONO DE CERRAR PAGINA -->
    <span onclick="CerrarCategoria('Mostrar_Categorias')"><i class="fas fa-times span_5"></i></span>

    <div class="contenedor_24 contenedor_118">   
        <div class="contenedor_102">
            <h1 class="h1_1">Selecciona una categoria.</h1>   
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
                
                foreach($Datos['categorias'] as $row)  : ?>                    
                    <div class="contInputRadio">    <?php
                        $Categoria = $row['categoria'];   ?>
                        
                        <input type="radio" name="categoria" id="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>" value="<?php echo $Categoria?>"  onclick="return transferirCategoria(this.form);"/> 
                        <label class="contInputRadio__label" for="<?php echo 'ContadorCategoria_' . $ContadorCategoria;?>"><?php echo $Categoria;?></label> 
                    </div>
                    <?php

                    $ContadorCategoria++;
                endforeach;
                ?>
            </div> 
            <!-- <div class="contenedor_77">
                <input type="text" class="boton" value="Seleccionar"/>
            </div> -->
        </form>
    </div>
</section>
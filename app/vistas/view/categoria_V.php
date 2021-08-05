<?php
    // if(!empty($Datos['ciudades'])){ ?>
        <section class="sectionTienda" id="Section_4">
            <a  href="<?php echo RUTA_URL . '/Inicio_C/NoVerificaLink';?>"><i class="fas fa-times spanCerrar"></i></a>
            <div class="sectionTienda_div" id="SectionTiendas">
                <?php
                    foreach($Datos['estados'] as $arr) : ?>
                        <div class="sectionTienda_div--ciudades">
                            <h1 class="h1_7"><?php echo $arr['estado_Tien']?></h1>   <?php
                            foreach($Datos['ciudades'] as $Key) : 
                                if($arr['estado_Tien'] == $Key['estado_Tien']) : ?>
                                    <div class="contInputRadio contInputRadio--margen">    
                                        <input class="ciudad_JS" type="radio" name="ciudades" id="<?php echo str_replace(' ', '%20', $Key['parroquia_Tien']);?>" value="<?php echo $Key['parroquia_Tien'];?>" onclick="Llamar_TiendasCiudad(this.id)"/>
                                        <label class="contInputRadio__label" for="<?php echo str_replace(' ', '%20', $Key['parroquia_Tien']);?>"><?php echo $Key['parroquia_Tien'];?></label>
                                    </div>  <?php
                                endif;
                            endforeach; ?>
                        </div>  <?php
                    endforeach;    ?> 
                <h2 class="h2_14 borde_3">Proximamente nuestra oferta de ciudades será ampliada.</h2>
            </div>
        </section>
    <?php
//    }   ?>
        
<div class="section_1" >
   <!-- Alimentado via Ajax desde A_Categorias.js por medio de Llamar_TiendasCiudad() -->
    <div id="Contenedor_23"></div>
</div>

<script src="<?php echo RUTA_URL.'/public/javascript/E_Categorias.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/A_Categorias.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
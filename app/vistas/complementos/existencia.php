
<?php
    if($Disponible == 1){ 
        $NoAgrear = false; ?>
        <label class="contenedor_9--label borde_3">En existencia</label>
        <?php
    }    
    else if($Disponible == 0 && $Existencia == 1){ 
        $NoAgrear = false; ?>
        <label class="contenedor_9--label borde_3">En existencia</label>
        <?php
    }  
    else if($Disponible == 0 && $Existencia > 1){ 
        $NoAgrear = false; ?>
        <label class="contenedor_9--label borde_3">En existencia</label>
        <?php
    } 
    else if($Disponible == '0' && $Existencia == '0'){  
        $NoAgrear = true  ?>
        <label class="contenedor_9--label borde_3">Agotado</label>
        <?php
    }   
?>

<?php   
//Datos viene de Cuenta_C/eliminarImagen
    // echo $Datos;
    if($Datos >= 5){ ?>
        <p class="p_5">Máximo de imagenes añadidas</p>
        <?php
    }
    else{   ?>                        
        <p class="">Añada hasta 4 imagenes no mayor a 2 Mb / C.U</p>
        <br>
        <label for="ImgInp_2" class="label_5 label_23" >Añadir imagen</label>
        <?php
    }   ?>
    <br><br>
    <input class="ocultar" type="file" name="imagen_EditarVarias[]" id="ImgInp_2" multiple="multiple" onchange="muestraImg(); CantidadImg()"/> 
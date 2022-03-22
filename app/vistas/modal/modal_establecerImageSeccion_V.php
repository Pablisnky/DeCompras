<!-- Ventana modal cargada por medio de Cuenta_C/EstablecerImageSeccion y por medio de CuentaMayorista_c/EstablecerImageSeccionMayorista-->

<!-- CDN libreria JQuery, necesaria para la previsualización de la imagen-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?php

    // $Token es un string, se convierte a booleano
    $Token = filter_var($Datos['token'], FILTER_VALIDATE_BOOLEAN);
    // var_dump($Token);

    // PARA SECCIONES DE TIENDAS
    if($Token == false){    ?>
        <section class="sectionModal"  id="Ejemplo_Secciones">
            <div class="sectionModal__div">
                <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeImagenSeccion" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <label class="boton boton--largo" for="ImagenSeccion">Seleccione imagen</label>
                    <img class="imagen_12" id="Img_Seccion" alt="Fotografia de la tienda" src="../../public/images/secciones/imagen.png"/>
                    <input class="ocultar" type="file" name="img_Seccion" id="ImagenSeccion"/>
                    <div class="contenedor_87">
                        <input class="ocultar" type="text" name="id_seccion" value="<?php echo $Datos?>"/>
                        <input class="label_21 boton" type="submit" value="Guardar">
                    </div>
                </form>
            </div>
        </section>
        <?php
    }
    else{ ?>
        <!-- PARA SECCIONES DE MAYORISTA -->
        <section class="sectionModal" id="Ejemplo_Secciones">
            <div class="sectionModal__div">
                <form action="<?php echo RUTA_URL; ?>/CuentaMayorista_C/recibeImagenSeccionMayorista" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <label class="boton boton--largo" style="display: block; margin: auto;" for="ImagenSeccion">Seleccione imagen</label>
                    <br><br>
                    <img class="imagen_12" id="Img_Seccion" alt="Fotografia de la tienda" src="../../public/images/secciones/imagen.png"/>
                    <input class="ocultar" type="file" name="img_SeccionMay" id="ImagenSeccion"/>
                    <div class="contenedor_87">
                        <input class="ocultar" type="text" name="id_seccionMay" value="<?php echo $Datos['id_seccion']?>"/>
                        <input class="label_21 boton" type="submit" value="Guardar">
                    </div>
                </form>
            </div>
        </section>
        <?php
    }
        ?>

<script>
    //Da una vista previa de la imagen de sección
    function readImage(input, id_Label){
        console.log(input + id_Label)
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                id_Label.attr('src', e.target.result); //Renderizamos la imagen
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#ImagenSeccion").change(function(){
        // Código a ejecutar cuando se detecta un cambio de imagen
        var id_Label = $('#Img_Seccion');
        readImage(this, id_Label);
    });
</script>


<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
// if(!empty($_SESSION["ID_Afiliado"])){  
    // require(RUTA_APP . '/vistas/modal/modal_Secciones_V.php');

    // $ID_Tienda = $_SESSION["ID_Tienda"];

    foreach($Datos['datosMayorista'] as $row){ 
        $Nombre_Tien =  $row['nombreMay'];
        $Foto_Tien = $row['fotografiaMay'];  
        $ID_Mayorista = $row['ID_Mayorista'];
    }
     ?>
    
    <!-- CDN iconos de font-awesome-->
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>

    <!-- CDN libreria JQuery, necesaria para la previsualización de la imagen --> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <div class="contenedor_108" id="Contenedor_42">  
        <form action="<?php echo RUTA_URL; ?>/CuentaMayorista_C/recibeRegistroEditado" method="POST" name="form_Configurar" enctype="multipart/form-data" autocomplete="off"> <!--  onsubmit="return validarDatosTienda()" -->

            <!-- DATOS TIENDA -->
            <a id="marcador_02" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos de tienda</legend> 
                <div class="contenedor_119 borde_1 borde_2">
                    <img class="contenedor_119__img" id="blah_2" alt="Fotografia de la tienda" src="../public/images/proveedor/Don_Rigo/<?php echo $Foto_Tien;?>"/>
                    <label for="imgInp_2"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                    <input class="ocultar" type="file" name="imagen_mayorista" id="imgInp_2"/>
                </div>

                <label>Nombre tienda</label>
                <input class="input_13 input_13A borde_1" type="text" name="nombre_May" id="Nombre_May" value="<?php echo $Nombre_Tien;?>" autocomplete="off"/>
            </fieldset>

            <!-- SECCIONES -->
            <a id="Secciones" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Secciones</legend>
                <div class="contGeneral" id="Contenedor_79">
                    <p class="p_12">Organiza tú tienda en secciones, dentro de estas colocaras tus productos según la clasificación que tu desees, añade tantas como consideres necesario para que tus productos esten bien organizados.<span class="span_13" id="Span_1">Ver sugerencias:</span></p>
                    <label>Sección</label>
                    <!-- div a clonar sin eventos y oculto mediante z-index = -1 -->
                    <div class="contenedor_80A" id="Contenedor_80A">
                        <div class="contenedor_80C" id="Contenedor_80C">
                            <input class="input_13 input_13A input_12 borde_1" type="text"/>
                            <div class="contenedor__80div">
                                <i class="far fa-times-circle span_10 span_14_js span_10--seccion"></i>
                                <input class="contador_2 contador_2--seccion" type="text" value="25"/>
                            </div>
                        </div>
                    </div>
                    <?php   
                    //Entra en el IF cuando no hay secciones creadas
                    if($Datos['seccionesMay'] == Array ( )){  ?>
                        <div class="contenedor_80 cont_seccion--div-1" id="Contenedor_80">
                            <input class="input_13 input_13A input_12 borde_1 seccionesJS" type="text" name="seccion[]" id="Seccion" placeholder="Indica una sección"/>
                            <div class="cont_seccion--icono_Contador">
                                <i class="far fa-times-circle span_10 span_14_js span_10--seccion"></i>
                                <input class="contador_2 contador_2--seccion contador_JS" type="text" value="25"/>
                            </div>
                        </div>
                        <?php
                    }   
                    else{  //Entra en el ELSE cuando hay secciones creadas  
                        $Contador = 1;
                        foreach($Datos['seccionesMay'] as $row) :
                            $Seccion_Tien = $row['seccionMay'];
                            $ID_Seccion = $row['ID_SeccionMay'];
                            $CantidadSeccion = count($Datos['seccionesMay']);
                            ?>                           
                            <div class="contenedor_80" id="Contenedor_80">
                                <input class="input_13 input_13A input_12 borde_1 seccionesJS" type="text" name="seccion[]" id="Seccion_<?php echo $Contador;?>" value="<?php echo $Seccion_Tien;?>" onblur="Llamar_ActualizarSeccion(this.value,'<?php echo $ID_Seccion;?>')"/>
                                <div class="contenedor__80div">
                                    <i class="far fa-times-circle span_10 span_14_js span_10--seccion" id="<?php echo $ID_Seccion;?>"></i>
                                    <input class="contador_2 contador_2--seccion contador_JS" id="Contador_<?php echo $Contador;?>" type="text" value="25"/>
                                </div>
                            </div>
                            <?php
                            $Contador++;
                        endforeach;   
                    }   ?>
                </div>
                <label class="label_4 label_24" id="Label_5">Añadir sección</label>
            </fieldset>  

            <br><br><br>
            
            <!-- MENU INDICE -->
            <section>   <!--id="Contenedor_83"--> 
                <div class="contenedor_83 borde_1">
                    <div class="contenedor_49 contenedor_101">
                        <input class="ocultar" type="text" name="ID_Mayorista" value="<?php echo $ID_Mayorista;?>"/>
                        <input class="boton boton--largo" type="submit" value="Guardar cambios"/>
                    </div>        
                </div>
            </section>      
        </form>
    </div>

    <!--div alimentado via Ajax por medio de la funcion Llamar_EliminarSeccion() -->
    <did id="ReadOnly"></did>

    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editarMayorista.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_editarMayorista.js?v=' . rand();?>"></script>
    <script src="<?php echo RUTA_URL . '/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>

    <script> 
        //Da una vista previa de la imagen de la tienda, usada en cuenta_editar_prod_V.php
        function readImage(input, id_Label){
            // console.log("______Desde readImage()______", input + ' | ' + id_Label)
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    id_Label.attr('src', e.target.result); //Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }        
        $("#imgInp_2").change(function(){
            // Código a ejecutar cuando se detecta un cambio de imagen de tienda
            var id_Label = $('#blah_2');
            readImage(this, id_Label);
        });
    </script>
        
    <?php  
// }
// else{ 
//     header('location: ' . RUTA_URL . '/CerrarS_C');
// }
    ?>
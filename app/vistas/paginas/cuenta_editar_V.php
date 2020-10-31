<?php 
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];

    require(RUTA_APP . "/vistas/inc/header_AfiCom.php");
    // echo "<br><br><br><br><br>";
    // echo "<pre>";
    // print_r($Datos);
    // echo "</pre>";
    // exit();

    //$Datos viene de Cuenta_C/Editar
    foreach($Datos['datosResposable'] as $row){
        $Nombre_AfiCom =  $row['nombre_AfiCom'];
        $Apellido_AfiCom = $row['apellido_AfiCom']; 
        $Cedula_AfiCom = $row['cedula_AfiCom'];
        $Telefono_AfiCom = $row['telefono_AfiCom'];
        $Correo_AfiCom = $row['correo_AfiCom'];
        $Foto_AfiCom = $row['fotografia_AfiCom'];
    }
    
    //$Datos viene de Cuenta_C/Editar
    foreach($Datos['datosTienda'] as $row){
        $Nombre_Tien =  $row['nombre_Tien'];
        $Direccion_Tien = $row['direccion_Tien']; 
        $Telefono_Tien = $row['telefono_Tien'];
        $Slogan_Tien = $row['slogan_Tien'];
        $Foto_Tien = $row['fotografia_Tien'];
    }
    
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/flechaAbajo/style_flechaAbajo.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/lapiz/style_lapiz.css"/>
    <!-- Se coloca en SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  
        <h1 class="h1_8">Configurar cuenta</h1>   
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeRegistroEditado" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarDatosTienda()">

            <!-- PERSONA RESPONSABLE -->
            <a id="marcador_01" class="ancla_2"></a>
            <fieldset class="fieldset_1">
                <legend class="legend_1">Persona responsable</legend> 

                <label>Nombre responsable tienda</label>
                <input class="input_13 borde_1" type="text" name="nombre_Afcom" id="Nombre_Aficom" value="<?php echo $Nombre_AfiCom;?>" autocomplete="off" onkeydown="blanquearInput('Nombre_Aficom')"/>
                
                <label>Apellido responsable tienda</label>
                <input class="input_13 borde_1" type="text" name="apellido_Afcom" id="Apellido_Aficom"  value="<?php echo $Apellido_AfiCom;?>" autocomplete="off" onkeydown="blanquearInput('Apellido_Aficom')"/>
               
                <label>Cedula responsable tienda</label>
                <input class="input_13 borde_1" type="text" name="cedula_Afcom" id="Cedula_Aficom"  value="<?php echo $Cedula_AfiCom;?>" autocomplete="off" onkeydown="blanquearInput('Cedula_Aficom')"/>
                
                <label>Telefono responsable tienda</label>
                <input class="input_13 borde_1" type="text" name="telefono_Afcom" id="Telefono_Aficom"  value="<?php echo $Telefono_AfiCom;?>" autocomplete="off" onkeydown="blanquearInput('Telefono_Aficom')"/>
                
                <label>Correo responsable tienda</label>
                <input class="input_13 borde_1" type="text" name="correo_Afcom" id="Correo_Aficom" value="<?php echo $Correo_AfiCom;?>" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200)" onclick="ColorearCorreo()" autocomplete="off">
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
            </fieldset>

            <!-- SECCION DATOS TIENDA -->
            <a id="marcador_02" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos de tienda</legend> 
                <div class="contenedor_119 borde_1 borde_2">
                    <label for="imgInp_2"><span class="icon-pencil span_18 borde_1"></span></label>
                    <img class="imagen_6" id="blah_2" alt="Fotografia de la tienda" src="../public/images/tiendas/<?php echo $Foto_Tien;?>"/>
                    <input class="ocultar" type="file" name="imagen_Tienda" id="imgInp_2"/>
                </div>
                <br>
                <label>Nombre tienda</label>
                <input class="input_13 borde_1" type="text" name="nombre_com" id="Nombre_Tien" value="<?php echo $Nombre_Tien;?>" autocomplete="off" onkeydown="blanquearInput('Nombre_Tien')"/>

                <label>Telefono tienda</label>
                <input class="input_13 borde_1" type="text" name="telefono_com" id="Telefono_Tien" value="<?php echo $Telefono_Tien;?>" autocomplete="off" onkeydown="blanquearInput('Telefono_Tien')"//>

                <label>Slogan tienda (opcional)</label>
                <input class="input_13 input_16 borde_1" type="text" name="slogan_com" id="ContenidoSlo" value="<?php echo $Slogan_Tien;?>" autocomplete="off">
                <input class="contador_2" type="text" id="ContadorSlo" value="40"/>
                
                <!-- SECCION DATOS DE UBICACIÓN -->
                <label>Datos de ubicación</label>
                <br>

                <label>Estado</label>
                <br>
                <input class="input_13 borde_1" type="text" name="estado_com" id="Estado_Tien" value="<?php echo 'Yaracuy';?>" autocomplete="off" readonly= "readoly" onkeydown="blanquearInput('Estado_Tien')"/>

                <label>Municipio</label>
                <input class="input_13 borde_1" type="text" name="municipio_com" id="Municipio_Tien" value="<?php echo 'San Felipe';?>" autocomplete="off" readonly= "readoly" onkeydown="blanquearInput('Municipio_Tien')"/>                

                <label>Parroquia</label>
                <input class="input_13 borde_1" type="text" name="parroquia_com" id="Parroquia_Tien" value="<?php echo 'San Felipe';?>" autocomplete="off" readonly= "readoly" onkeydown="blanquearInput('Parroquia_Tien')"/>                

                <label>Dirección</label>
                <textarea class="textarea_4 borde_1 " name="direccion_com" id="Direccion_Tien" onkeydown="blanquearInput('Direccion_Tien')"/><?php echo $Direccion_Tien;?></textarea> 
                <input class="contador_2" type="text" id="ContadorSlo" value="50"/>
            </fieldset>

            <!-- SECCION CATEGORIAS Y SECCIONES --> 
            <a id="marcador_03" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2" id="Fieldset">
                <legend class="legend_1">Categoria - Secciones</legend>
                <div>
                    <p class="p_12">Una categoria clasificará tu tienda en un rubro especifico, puedes seleccionar una o dos</p>
                    <?php
                    //Entra en el IF cuando no hay categorias creadas
                    if($Datos['categoria'] == Array ( )){   ?>                                            
                        <div id="Label_13">
                            <div id="Contenedor_80js" style="margin-bottom: 5%;">
                                <div class="contenedor_80">
                                    <label>Categoria</label>
                                    <span class="icon-circle-down span_10 span_12_js"></span>
                                </div>                              
                                <span></span><!-- span de rellenar para pasar la validacion de categoria-->   
                                <div id="Referencia_2"></div>
                            </div>
                        </div>
                        <br>
                        <?php
                    }
                    else{
                        foreach($Datos['categoria'] as $row){
                            $Categoria =  $row['categoria'];
                            ?>
                            <div id="Label_13">
                                <div class="contenedor_80" id="Contenedor_80js">
                                    <input class="input_13 borde_1 imput_6js" id="Imput_6js" type="text" name="categoria[]" value="<?php echo $Categoria;?>" readonly="readonly" autocomplete="off" onkeydown="blanquearInput('Imput_6js')"/>
                                    <span class="icon-circle-down span_10 span_12_js"></span> 
                                    <div id="Referencia_2"></div>                                
                                    <span></span><!-- span de rellenar para pasar la validacion de categoria-->   
                                </div>
                                
                            </div>
                            <?php
                        } 
                    } ?>
                </div>

                <div id="Contenedor_79">
                    <p class="p_12">Organiza tú tienda en secciones, y dentro de estas coloca tus productos, añade tantas como consideres necesario para que tus productos esten bien organizados. <span class="span_13" id="Span_1">Ver sugerencias:</span></p>
                    <label>Sección</label>
                    <?php   
                    //Entra en el IF cuando no hay secciones creadas
                    if($Datos['secciones'] == Array ( )){  ?>
                        <div class="contenedor_80" id=""><!--Contenedor_80-->
                            <input class="input_13 input_12 borde_1" type="text" name="seccion[]" id="Seccion" placeholder="Indica una sección"/>
                            <span class="icon-cancel-circle span_10 span_12_js" onclick="preEliminarSeccion('span_12_js')"></span>
                        </div>
                        <?php
                    }   
                    else{    
                        foreach($Datos['secciones'] as $row){
                            $Seccion_Tien = $row['seccion'];
                            $ID_Seccion = $row['ID_Seccion'];
                            ?>
                            <div class="contenedor_80" id="Contenedor_80">
                                <input class="input_13 input_12 borde_1" type="text" name="seccion[]" id="Seccion" value="<?php echo $Seccion_Tien;?>" onblur="Llamar_ActualizarSeccion(this.value,'<?php echo $ID_Seccion;?>')"/>
                                <span class="icon-cancel-circle span_10 span_12_js" onclick="preEliminarSeccion('span_12_js'); Llamar_EliminarSeccion('<?php echo $ID_Seccion;?>')"></span>
                            </div>
                            <?php
                        }   
                    }   ?>
                </div>
                <label class="label_4 label_24" id="Label_5">Añadir sección</label>
            </fieldset>
            
            <!-- OFERTAS -->
            <!--<a id="marcador_04" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Ofertas</legend>
                <p>Si tienes productos con algun tipo de oferta, destacalos en la página de inicio de tu tienda.</p>
                <br><br>
                <p>Por medio de un boton se muestran todos los productos al cliente, con ifltro por sección similar al menu "Productos" y una vez mostrados los productos cada uno tiene una etique <a> que lleva a otra pagina donde se edita la oferta. (similar a actualizar producto)</a></p>
                
                <label class="label_4" id="">Añadir oferta</label>
            </fieldset> -->
            
            <!-- LO MÁS PEDIDO -->
            <!-- <a id="marcador_05" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Lo más pedido</legend>
                <p>Automaticamente se llena este bloque, con los productos mas comprados de la tienda</p>
            </fieldset> -->

            <!-- CUENTAS BANCARIAS -->
            <a id="marcador_06" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Cuentas bancarias</legend>
                <div id="Contenedor_69">
                    <span>Los pagos de los pedidos realizados a tu tienda se depositan directamente a tus cuentas bancarias por medio de transferencias o pago movil, los pedidos pagados por transferencia de cuentas de otros bancos causan una demora de 48 hrs en el despacho del pedido para que verifiques la transferencia.</span>
                    <br>
                    <label>Información para recibir pagos por transferencia</label>
                    <br>
                    <div id="Mostrar_CuentaBancaria">
                        <!-- Entra en el IF cuando no hay cuentas bancarias creadas -->
                        <?php
                        if($Datos['datosBancos'] == Array ( )){  ?>
                            <div class="contenedor_67 borde_1" id="Contenedor_67">
                                <!-- onclick="preEliminarSeccion('span_13_js')" -->
                                <span class="icon-cancel-circle span_10 span_14 span_13_js" onclick="preEliminarSeccion('span_13_js')"></span>

                                <input class="input_13 input_9JS borde_1" type="text" name="banco[]" id="Nombre_Banco" placeholder="Banco" autocomplete="off" onkeydown="blanquearInput('Nombre_Banco')">

                                <input class="input_13 input_9JS borde_1" type="text" name="titular[]" id="Titular_Banco" placeholder="Titular" autocomplete="off" onkeydown="blanquearInput('Titular_Banco')">

                                <input class="input_13 input_9JS borde_1" type="text" name="numeroCuenta[]" id="NroCuenta_Banco" placeholder="Numero de cuenta" autocomplete="off" onkeydown="blanquearInput('NroCuenta_Banco')">

                                <input class="input_13 input_9JS borde_1" type="text" name="rif[]" id="RIF_Banco" placeholder="RIF_Banco" autocomplete="off" onkeydown="blanquearInput('RIF_Banco')">
                            </div> 
                            <?php
                        }
                        else{
                            foreach($Datos['datosBancos'] as $row){
                                $BancoNombre =  $row['bancoNombre'];
                                $BancoCuenta = $row['bancoCuenta']; 
                                $BancoTitular = $row['bancoTitular'];
                                $BancoRif = $row['bancoRif'];
                                ?>
                                <div class="contenedor_67 borde_1" id="Contenedor_67">
                                        <span class="icon-cancel-circle span_10 span_14 span_13_js" onclick="preEliminarSeccion('span_13_js')"></span>
                                    <label>Banco</label>
                                    <input class="input_13 input_9JS borde_1" type="text" name="banco[]" id="Nombre_Banco" value="<?php echo $BancoNombre;?>" autocomplete="off" onkeydown="blanquearInput('Nombre_Banco')"/>
                                    <label>Titular</label>
                                    <input class="input_13 input_9JS borde_1" type="text" name="titular[]" id="Titular_Banco" value="<?php echo $BancoTitular;?>"  autocomplete="off" onkeydown="blanquearInput('Titular_Banco')"/>
                                    <label>Número cuenta</label>
                                    <input class="input_13 input_9JS borde_1" type="text" name="numeroCuenta[]" id="NroCuenta_Banco" value="<?php echo $BancoCuenta;?>" autocomplete="off"  onkeydown="blanquearInput('NroCuenta_Banco')"/>
                                    <label>RIF</label>
                                    <input class="input_13 input_9JS borde_1" type="text" name="rif[]" id="RIF_Banco" value="<?php echo $BancoRif;?>" autocomplete="off"  onkeydown="blanquearInput('RIF_Banco')"/>
                                </div>
                                <?php
                            }
                        }  ?>                        
                        <label class="label_4 label_24" id="Label_4">Añadir cuenta bancaria</label>
                    </div>
                    <br><br>
                    <label>Información para recibir pagos por pagomovil</label>   
                    <div id="Mostrar_PagoMovil">
                        <!-- Entra en el IF cuando no hay cuenta de pagomovil creadas -->
                        <?php
                        if($Datos['datosPagomovil'] == Array ( )){  ?>
                            <div class="contenedor_67 borde_1">
                                <label class="">Número pago movil</label>
                                <input class="input_13 input_9JS borde_1" type="text" name="bancopagoMovil[]" id="BancoPagoMovil" value="" placeholder="Banco" autocomplete="off">
                                <input class="input_13 input_9JS borde_1" type="text" name="cuentapagoMovil[]" id="PagoMovil"  value="" placeholder="Número telefonico" autocomplete="off">
                            </div>
                            <?php
                        }
                        else{
                            foreach($Datos['datosPagomovil'] as $row)   :
                                $BancoNombre =  $row['banco_pagomovil'];
                                $BancoCuenta = $row['cuenta_pagomovil']; 
                                ?>
                                <div class="contenedor_67 borde_1">
                                    <label class="">Número pago movil</label>
                                    <input class="input_13 input_9JS borde_1" type="text" name="bancopagoMovil[]" id="BancoPagoMovil" value="<?php echo $BancoNombre?>" autocomplete="off">
                                    <input class="input_13 input_9JS borde_1" type="text" name="cuentapagoMovil[]" id="PagoMovil" value="<?php echo $BancoCuenta?>" autocomplete="off">
                                </div>
                                <?php
                            endforeach;
                        }   ?>                        
                        <label class="label_4 label_24" id="Label_7">Añadir número pago movil</label>
                    </div>
            </fieldset>   
            
            <!-- HORARIO -->
            <!-- <a id="marcador_07" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1" for="Domingo">Horario</legend>
                <div class="contenedor_85">
                    <div class="contenedor_86">
                        <input type="radio" name="horario" id="Domingo" value="Domingo" checked>
                        <label for="Domingo">Domingo</label><br>
                        <input type="radio" name="horario" id="Lunes" value="Lunes">
                        <label for="Lunes">Lunes</label><br>
                        <input type="radio" name="horario" id="Martes" value="Martes">
                        <label for="Martes">Martes</label><br>
                        <input type="radio" name="horario" id="Miercoles" value="Miercoles">
                        <label for="Miercoles">Miercoles</label><br>
                        <input type="radio" name="horario" id="Jueves" value="Jueves">
                        <label for="Jueves">Jueves</label><br>
                        <input type="radio" name="horario" id="Viernes" value="Viernes">
                        <label for="Viernes">Viernes</label><br>
                        <input type="radio" name="horario" id="Sabado" value="Sabado">
                        <label for="Sabado">Sabado</label>
                    </div>
                    <!-- div alimentado via Ajax desde horarios_V.php -->
                    <!-- <div id="Mostrar_horarios"></div>
                </div>
            </fieldset>  -->

            <section id="Contenedor_83">
                <div class="contenedor_83 borde_1">
                    <a class="marcador" href="#marcador_01">Persona responsable</a>
                    <a class="marcador" href="#marcador_02">Datos de tienda</a>
                    <a class="marcador" href="#marcador_03">Categoria - Secciones</a>
                    <!-- <a class="marcador" href="#marcador_04">Ofertas</a> -->
                    <!-- <a class="marcador" href="#marcador_05">Lo más pedido</a> -->
                    <a class="marcador" href="#marcador_06">Cuentas bancarias</a>
                    <!-- <a class="marcador" href="#marcador_07">Horario</a> -->
                    <div class="contenedor_49 contenedor_101">
                        <input class="ocultar" type="text" name="ID_Tienda" value="<?php echo $ID_Tienda;?>">
                        <input class="boton boton_6 boton_7" type="submit" value="Guardar cambios"/>
                    </div>          
                    <div class="contenedor_45">
                        <input type="checkbox" id="Publicar" name="publicar" value="1" onclick="llamar_publicarTienda()" <?php //if($CategoriaT == $Categoria){echo "checked = 'checked'";};?>
                        />
                        <label class="label_19" for="Publicar">Mostrar tienda al publico.</label>
                        <div id="Mostrar_tienda"></div>
                    </div> 
                </div>
            </section> 
        </form>
    </div>

    <!--div alimentado via Ajax por medio de la funcion Llamar_categorias() -->
    <div id="Mostrar_Categorias"></div>

    <!-- la solicitud se hace por medio de "Span_1" en secciones de este mismo archivo-->
    <section class="section_3 section_13" id="Ejemplo_Secciones">
        <div class="contenedor_84 contenedor_24">
            <p class="p_6 p_9">Ejemplo de secciones según el tipo de tienda</p>
            <div>
                <label class="label_1">Supermercados y bodegas</label>
                <ul class="ul_2">
                    <li class="li_5">Viveres</li>
                    <li class="li_5">Desinfectante</li>
                    <li class="li_5">Verduras</li>
                    <li class="li_5">Aseo personal</li>
                    <li class="li_5">Cereales</li>
                    <li class="li_5">Enlatados</li>
                    <li class="li_5">...</li>
                </ul> 
            </div>
            <div>
                <label class="label_1">Venta de Comida rapida</label>
                <ul class="ul_2">
                    <li class="li_5">Hamburguesas</li>
                    <li class="li_5">Perros caliente</li>
                    <li class="li_5">Empanadas</li>
                    <li class="li_5">Jugos</li>
                    <li class="li_5">Refrescos</li>
                    <li class="li_5">Pizzas</li>
                    <li class="li_5">Helados</li>
                    <li class="li_5">...</li>
                </ul>
            </div>
            <div>
                <label class="label_1">Venta de repuesto automotriz</label>
                <ul class="ul_2">
                    <li class="li_5">Tren delantero</li>
                    <li class="li_5">Sistema de freno</li>
                    <li class="li_5">Partes electricas</li>
                    <li class="li_5">Arranque</li>
                    <li class="li_5">Gomas y suspención</li>
                    <li class="li_5">...</li>
                </ul>
            </div>
            <div>
                <label class="label_1">Venta de Material médico quirurgico</label>
                <ul class="ul_2">
                    <li class="li_5" class="li_5">Stent</li>
                    <li class="li_5">Inyectadoras</li>
                    <li class="li_5">Termometros</li>
                    <li class="li_5"></li>
                    <li class="li_5"></li>
                    <li class="li_5">...</li>
                </ul>
            </div>
            <div>
                <label class="label_1">Supermercados y bodegas</label>
                <ul class="ul_2">
                    <li class="li_5">Viveres</li>
                    <li class="li_5">Desinfectante</li>
                    <li class="li_5">Verduras</li>
                    <li class="li_5">Aseo personal</li>
                    <li class="li_5">Cereales</li>
                    <li class="li_5">Enlatados</li>
                    <li class="li_5">...</li>
                </ul> 
            </div>
            <div class="contenedor_87">
                <a class="boton boton_4" href="#marcador_03" id="Label_1">Cerrar</a>
            </div>
        </div>
    </section>

    <did id="ReadOnly"></did>
    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar.js';?>"></script> 
    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_editar.js';?>"></script> 

    <script> 
        //Da una vista previa de la fotografia antes de guardarla en la BD usada en cuenta_editar_prod_V.php
        function readImage(input, id_Label){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    id_Label.attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp_1").change(function(){
            //Código a ejecutar cuando se detecta un cambio de archivo
            var id_Label = $('#blah_1');
            readImage(this, id_Label);
        });
        
        $("#imgInp_2").change(function(){
            //Código a ejecutar cuando se detecta un cambio de archivo
            var id_Label = $('#blah_2');
            readImage(this, id_Label);
        });
        </script>
        
    <?php include(RUTA_APP . "/vistas/inc/footer.php");
}
else{
    redireccionar("/Login_C/");
}
    ?>
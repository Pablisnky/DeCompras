<?php 
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];

    require(RUTA_APP . "/vistas/header/header_AfiCom.php");
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

    foreach($Datos['link_Tien'] as $row){
        $Link_Acceso = $row['link_acceso'];
    }   
    
    ?>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/flechaAbajo/style_flechaAbajo.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/lapiz/style_lapiz.css"/>
    <!-- Se coloca en SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  
        <h1 class="h1_8">Configurar cuenta</h1>   
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeRegistroEditado" method="POST" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarDatosTienda()">

            <!-- PERSONA RESPONSABLE -->
            <a id="marcador_01" class="ancla_2"></a>
            <fieldset class="fieldset_1">
                <legend class="legend_1">Persona responsable</legend> 

                <label>Nombre</label>
                <input class="input_13 borde_1" type="text" name="nombre_Afcom" id="Nombre_Aficom" value="<?php echo $Nombre_AfiCom;?>" autocomplete="off" onkeydown="blanquearInput('Nombre_Aficom')"/>
                
                <label>Apellido</label>
                <input class="input_13 borde_1" type="text" name="apellido_Afcom" id="Apellido_Aficom"  value="<?php echo $Apellido_AfiCom;?>" autocomplete="off" onkeydown="blanquearInput('Apellido_Aficom')"/>
               
                <label>Cedula (Solo números)</label>
                <input class="input_13 borde_1" type="text" name="cedula_Afcom" id="Cedula_Aficom"  value="<?php echo $Cedula_AfiCom;?>" autocomplete="off" onkeydown="blanquearInput('Cedula_Aficom')"/>
                
                <label>Telefono (Solo números)</label>
                <input class="input_13 borde_1" type="text" name="telefono_Afcom" id="Telefono_Aficom"  value="<?php echo $Telefono_AfiCom;?>" autocomplete="off" placeholder="0000-000.00.00" onkeydown="blanquearInput('Telefono_Aficom')"/>
                
                <label>Correo</label>
                <input class="input_13 borde_1" type="text" name="correo_Afcom" id="Correo_Aficom" value="<?php echo $Correo_AfiCom;?>" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200)" onclick="ColorearCorreo()" autocomplete="off"/>
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

                <label>Nombre tienda</label>
                <input class="input_13 borde_1" type="text" name="nombre_com" id="Nombre_Tien" value="<?php echo $Nombre_Tien;?>" autocomplete="off" onkeydown="blanquearInput('Nombre_Tien')"/>

                <label>Acceso directo a tu tienda</label>
                <input class="input_13 borde_1" type="text" name="link_acceso" id="Link_Acceso" value="<?php echo $Link_Acceso;?>" autocomplete="off" readonly/>

                <label>Telefono tienda</label>
                <input class="input_13 borde_1" type="text" name="telefono_com" id="Telefono_Tien" value="<?php echo $Telefono_Tien;?>" autocomplete="off" placeholder="0000-000.00.00" onkeydown="blanquearInput('Telefono_Tien')"/>

                <label>Slogan tienda (opcional)</label>
                <input class="input_13 input_16 borde_1" type="text" name="slogan_com" id="ContenidoSlo" value="<?php echo $Slogan_Tien;?>" autocomplete="off"/>
                <input class="contador_2" type="text" id="ContadorSlo" value="50"/>
                
                <!-- SECCION DATOS DE UBICACIÓN -->
                <label>Datos de ubicación</label>

                <label>Estado</label>
                <input class="input_13 borde_1" type="text" name="estado_com" id="Estado_Tien" value="<?php echo 'Yaracuy';?>" autocomplete="off" readonly= "readoly" onkeydown="blanquearInput('Estado_Tien')"/>

                <label>Municipio</label>
                <input class="input_13 borde_1" type="text" name="municipio_com" id="Municipio_Tien" value="<?php echo 'San Felipe';?>" autocomplete="off" readonly= "readoly" onkeydown="blanquearInput('Municipio_Tien')"/>                

                <label>Parroquia</label>
                <input class="input_13 borde_1" type="text" name="parroquia_com" id="Parroquia_Tien" value="<?php echo 'San Felipe';?>" autocomplete="off" readonly= "readoly" onkeydown="blanquearInput('Parroquia_Tien')"/>                

                <label>Dirección</label>
                <textarea class="textarea_4 borde_1 " name="direccion_com" id="Direccion_Tien" onkeydown="blanquearInput('Direccion_Tien')"><?php echo $Direccion_Tien;?></textarea> 
                <input class="contador_2" type="text" id="ContadorDireccion" value="50"/>
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
                        <?php
                    }
                    else{
                        foreach($Datos['categoria'] as $row){
                            $Categoria =  $row['categoria'];
                            ?>
                            <div id="Label_13">
                                <div class="contenedor_80" id="Contenedor_80js">
                                    <input class="input_13 borde_1 imput_6js" id="Imput_6js" type="text" name="categoria[]" value="<?php echo $Categoria;?>" readonly="readonly" autocomplete="off"/>
                                    <span class="icon-circle-down span_10 span_12_js"></span> 
                                    <div id="Referencia_2"></div>                                
                                    <span></span><!-- span de rellenar para pasar la validacion de categoria-->   
                                </div>
                                
                            </div>
                            <?php
                        } 
                    } ?>
                </div>

                <div id="Contenedor_79" class="contenedor_143">
                    <p class="p_12">Organiza tú tienda en secciones, y dentro de estas coloca tus productos, añade tantas como consideres necesario para que tus productos esten bien organizados. <span class="span_13" id="Span_1">Ver sugerencias:</span></p>
                    <label>Sección</label>
                    <!-- div a clonar sin eventos y oculto -->
                    <div class="contenedor_80A" id="Contenedor_80A">
                        <input class="input_13 input_12 borde_1" type="text"/>
                        <span class="icon-cancel-circle span_10 span_14_js" onclick="preEliminarSeccion('span_14_js')"></span>                           
                    </div>
                    
                    <?php   
                    //Entra en el IF cuando no hay secciones creadas
                    if($Datos['secciones'] == Array ( )){  ?>
                        <div class="contenedor_80" id="Contenedor_80"><!--Contenedor_80-->
                            <input class="input_13 input_12 borde_1" type="text" name="seccion[]" id="Seccion" placeholder="Indica una sección" />
                            <span class="icon-cancel-circle span_10 span_14_js"></span>
                        </div>
                        <?php
                    }   
                    else{    
                        foreach($Datos['secciones'] as $row){
                            $Seccion_Tien = $row['seccion'];
                            $ID_Seccion = $row['ID_Seccion'];
                            //Se cuentan la cantidad de seccion para informe al archivo Ajax que elimina secciones si se ejecuta
                            $CantidadSeccion = count($Datos['secciones']);
                            ?>
                           
                            <div class="contenedor_80" id="Contenedor_80">
                                <input class="input_13 input_12 borde_1" type="text" name="seccion[]" id="Seccion" value="<?php echo $Seccion_Tien;?>" onblur="Llamar_ActualizarSeccion(this.value,'<?php echo $ID_Seccion;?>')"/>
                                <span class="icon-cancel-circle span_10 span_14_js" onclick=" Llamar_EliminarSeccion('<?php echo $ID_Seccion;?>','<?php echo $CantidadSeccion?>')"></span>                           
                            </div>
                            <?php
                        }   
                    }   ?>
                </div>
                <label class="label_4 label_24" id="Label_5">Añadir sección</label>
            </fieldset>
            
            <!-- OFERTAS -->
            
            <!-- LO MÁS PEDIDO -->

            <!-- CUENTAS BANCARIAS -->
            <a id="marcador_06" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Cuentas bancarias</legend>
                <span>Los pagos de los pedidos realizados a tu tienda se depositan directamente a tus cuentas bancarias por medio de transferencias o pago movil, los pedidos pagados por transferencia de cuentas de otros bancos causan una demora de 48 hrs en el despacho del pedido para que verifiques la transferencia.</span>
                <br>
                <label>Información para recibir pagos por transferencia</label>                   
                <div id="Mostrar_CuentaBancaria">
                    <!-- Entra en el IF cuando no hay cuentas bancarias creadas -->
                    <?php
                    if($Datos['datosBancos'] == Array ( )){  ?>
                        <div class="contenedor_67 borde_1" id="Contenedor_67">
                            <span class="icon-cancel-circle span_10 span_14 span_16_js"></span>

                            <!-- NOMBRE BANCO -->
                            <input class="input_13 input_9JS borde_1" type="text" name="banco[]" id="Nombre_Banco" placeholder="Banco" autocomplete="off" onkeydown="blanquearInput('Nombre_Banco')"/>

                            <!-- TITULAR BANCO -->
                            <input class="input_13 input_9JS borde_1" type="text" name="titular[]" id="Titular_Banco" placeholder="Titular" autocomplete="off" onkeydown="blanquearInput('Titular_Banco')"/>

                            <!-- NUMERO CUENTA -->
                            <input class="input_13 input_9JS borde_1" type="text" name="numeroCuenta[]" id="NroCuenta_Banco" placeholder="Numero de cuenta" autocomplete="off" onkeydown="blanquearInput('NroCuenta_Banco')"/>

                            <!-- RIF BANCO -->
                            <input class="input_13 input_9JS borde_1" type="text" name="rif[]" id="RIF_Banco" placeholder="RIF_Banco" autocomplete="off" onkeydown="blanquearInput('RIF_Banco')"/>
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
                                <span class="icon-cancel-circle span_10 span_14 span_16_js"></span>
                                <label>Banco</label>
                                
                                <!-- NOMBRE BANCO -->
                                <input class="input_13 input_9JS borde_1" type="text" name="banco[]" id="Nombre_Banco" value="<?php echo $BancoNombre;?>" autocomplete="off" onkeydown="blanquearInput('Nombre_Banco')"/>
                                
                                <!-- TITULAR BANCO -->
                                <label>Titular</label>
                                <input class="input_13 input_9JS borde_1" type="text" name="titular[]" id="Titular_Banco" value="<?php echo $BancoTitular;?>"  autocomplete="off" onkeydown="blanquearInput('Titular_Banco')"/>

                                <!-- NUMERO CUENTA -->
                                <label>Número cuenta</label>
                                <input class="input_13 input_9JS borde_1" type="text" name="numeroCuenta[]" id="NroCuenta_Banco" value="<?php echo $BancoCuenta;?>" autocomplete="off"  onkeydown="blanquearInput('NroCuenta_Banco')"/>

                                <!-- RIF BANCO -->
                                <label>RIF</label>
                                <input class="input_13 input_9JS borde_1" type="text" name="rif[]" id="RIF_Banco" value="<?php echo $BancoRif;?>" autocomplete="off"  onkeydown="blanquearInput('RIF_Banco')"/>
                            </div>
                            <?php
                        }
                    }  ?>                        
                    <label class="label_4 label_24" id="Label_4">Añadir cuenta bancaria</label>
                </div>
            </fieldset>            
            
            <!-- TELEFONOS PAGOMOVIL -->
            <a id="marcador_07" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">                    
                <legend class="legend_1">Cuentas PagoMovil</legend>
                <label>Información para recibir pagos por pagomovil</label>   
                <div id="Mostrar_PagoMovil">
                    <!-- Entra en el IF cuando no hay cuenta de pagomovil creadas -->
                    <?php
                    if($Datos['datosPagomovil'] == Array ( )){  ?>
                        <div class="contenedor_67 borde_1" id="Contenedor_68">
                            <span class="icon-cancel-circle span_10 span_14 span_15_js"></span>

                            <!-- CEDULA PAGOMOVIL -->
                            <input class="input_13 input_10JS borde_1" type="text" name="cedulaPagoMovil[]" id="CedulaPagoMovil" placeholder="Número cedula" autocomplete="off" onkeyup="formatoMiles(this.value, 'CedulaPagoMovil')" onblur="validarCedula('CedulaPagoMovil')" onkeydown="blanquearInput('CedulaPagoMovil')"/>

                            <!-- BANCO PAGOMOVIL -->
                            <input class="input_13 input_10JS borde_1" type="text"  name="bancoPagoMovil[]" id="BancoPagoMovil" placeholder="Banco" autocomplete="off" onkeydown="blanquearInput('BancoPagoMovil')"/>

                            <!-- TELEFONO PAGOMOVIL -->
                            <input class="input_13 input_10JS borde_1" type="text"   name="telefonoPagoMovil[]" id="TelefonoPagoMovil" placeholder="Número telefonico 0000-000.00.00" autocomplete="off" onkeyup="mascaraTelefono(this.value, 'TelefonoPagoMovil')" onkeydown="blanquearInput('TelefonoPagoMovil')"/>
                        </div>
                        <?php
                    }
                    else{
                        $Iterador = 1;
                        foreach($Datos['datosPagomovil'] as $row) :
                            $CedulaPagoMovil =  $row['cedula_pagomovil'];
                            $BancoNombre =  $row['banco_pagomovil'];
                            $TelefonoPagoMovil = $row['telefono_pagomovil']; 
                            ?>
                            <div class="contenedor_67 borde_1" id="Contenedor_68">
                                <span class="icon-cancel-circle span_10 span_14 span_15_js"></span>
                                <!-- Las funciones de validaciones y formatos/mascaras de estos input dinamicos se invocan desde el HTML porque no se sabe como llamarlas con addEventListener -->
                                <!-- CEDULA PAGOMOVIL -->
                                <label>Cedula (Solo números)</label>
                                <input class="input_13 input_10JS borde_1" type="text" name="cedulasPagoMovil[]" id="<?php echo 'CedulaPagoMovil_' . $Iterador?>" value="<?php echo $CedulaPagoMovil?>" autocomplete="off" onkeyup="formatoMiles(this.value, '<?php echo 'CedulaPagoMovil_' . $Iterador?>')" onblur="validarCedula('<?php echo 'CedulaPagoMovil_' . $Iterador?>')" onkeydown="blanquearInput('<?php echo 'CedulaPagoMovil_' . $Iterador?>')"/>

                                <!-- BANCO PAGOMOVIL -->
                                <label>Banco</label>
                                <input class="input_13 input_10JS borde_1" type="text" name="bancoPagoMovil[]" id="BancoPagoMovil" value="<?php echo $BancoNombre?>" autocomplete="off"/>
                                
                                <!-- TELEFONO PAGOMOVIL -->
                                <label>Nº telefono (Solo números)</label>
                                <input class="input_13 input_10JS borde_1" type="text" name="telefonoPagoMovil[]" id="<?php echo 'TelefonoPagoMovil_' . $Iterador?>" value="<?php echo $TelefonoPagoMovil?>" autocomplete="off" onkeyup="mascaraTelefono(this.value, '<?php echo 'TelefonoPagoMovil_' . $Iterador?>')"/>
                            </div>
                            <?php
                            $Iterador++;
                        endforeach;
                    }   ?>        
                    <label class="label_4 label_24" id="Label_7">Añadir telefono <br> PagoMovil</label>
                </div>
            </fieldset>   
            
            <!-- HORARIO -->

            <section id="Contenedor_83">
                <div class="contenedor_83 borde_1">
                    <a class="marcador" href="#marcador_01">Persona responsable</a>
                    <a class="marcador" href="#marcador_02">Datos de tienda</a>
                    <a class="marcador" href="#marcador_03">Categoria - Secciones</a>
                    <!-- <a class="marcador" href="#marcador_04">Ofertas</a> -->
                    <!-- <a class="marcador" href="#marcador_05">Lo más pedido</a> -->
                    <a class="marcador" href="#marcador_06">Cuentas bancarias</a>
                    <a class="marcador" href="#marcador_07">Cuentas PagoMovil</a>
                    <!-- <a class="marcador" href="#marcador_07">Horario</a> -->
                    <div class="contenedor_49 contenedor_101">
                        <input class="ocultar" type="text" name="ID_Tienda" value="<?php echo $ID_Tienda;?>"/>
                        <input class="boton boton_6 boton_7" type="submit" value="Guardar cambios"/>
                    </div>          
                    <div class="contenedor_45">
                        <!-- <input type="checkbox" id="Publicar" name="publicar" value="1" onclick="llamar_publicarTienda()" <?php //if($CategoriaT == $Categoria){echo "checked = 'checked'";};?>
                        /> -->
                        <!-- <label class="label_19" for="Publicar">Mostrar tienda al publico.</label> -->
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
                    <li class="li_5">Stent</li>
                    <li class="li_5">Inyectadoras</li>
                    <li class="li_5">Termometros</li>
                    <li class="li_5">Soluciones</li>
                    <li class="li_5">Protesis</li>
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

    <!--div alimentado via Ajax por medio de la funcion Llamar_EliminarSeccion() -->
    <did id="ReadOnly"></did>

    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar.js';?>"></script> 
    <script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_editar.js';?>"></script> 

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
        
    <?php include(RUTA_APP . "/vistas/footer/footer.php");
}
else{
    redireccionar("/Login_C/");
}
    ?>
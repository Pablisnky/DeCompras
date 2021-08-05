<?php     
    require(RUTA_APP . "/vistas/modal/modal_Secciones_V.php");

//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    $ID_Tienda = $_SESSION["ID_Tienda"];

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
        $Estado_Tien = $row['estado_Tien'];
        $Municipio_Tien = $row['municipio_Tien'];
        $Parroquia_Tien = $row['parroquia_Tien'];
        $Direccion_Tien = $row['direccion_Tien']; 
        $Slogan_Tien = $row['slogan_Tien'];
        $Foto_Tien = $row['fotografia_Tien'];
    }

    //$Datos viene de Cuenta_C/Editar
    foreach($Datos['link_Tien'] as $row){
        $Link_Acceso = $row['link_acceso'];
    }       
    ?>
    
    <!-- CDN iconos de font-awesome-->
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>
    
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/flechaAbajo/style_flechaAbajo.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>

    <!-- Se coloca en SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  
        <h1 class="h1_8">Configurar cuenta</h1>   
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeRegistroEditado" method="POST" name="form_Configurar" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarDatosTienda()">

            <!-- PERSONA RESPONSABLE -->
            <a id="marcador_01" class="ancla_2"></a>
            <fieldset class="fieldset_1">
                <legend class="legend_1">Persona responsable</legend> 

                <label>Nombre</label>
                <input class="input_13 input_13A borde_1" type="text" name="nombre_Afcom" id="Nombre_Aficom" value="<?php echo $Nombre_AfiCom;?>" autocomplete="off"/>
                
                <label>Apellido</label>
                <input class="input_13 input_13A borde_1" type="text" name="apellido_Afcom" id="Apellido_Aficom"  value="<?php echo $Apellido_AfiCom;?>" autocomplete="off"/>
               
                <label>Cédula (Solo números)</label>
                <input class="input_13 input_13A borde_1" type="text" name="cedula_Afcom" id="Cedula_Aficom"  value="<?php echo $Cedula_AfiCom;?>" autocomplete="off" placeholder="00000000000"/>
                
                <label>teléfono (Solo números)</label>
                <input class="input_13 input_13A borde_1" type="text" name="telefono_Afcom" id="Telefono_Aficom"  value="<?php echo $Telefono_AfiCom;?>" autocomplete="off" placeholder="00000000000"/>
                
                <label>Correo</label>
                <input class="input_13 input_13A borde_1" type="text" name="correo_Afcom" id="Correo_Aficom" value="<?php echo $Correo_AfiCom;?>" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200)" onclick="ColorearCorreo()" autocomplete="off"/>
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
            </fieldset>

            <!-- SECCION DATOS TIENDA -->
            <a id="marcador_02" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos de tienda</legend> 
                <div class="contenedor_119 borde_1 borde_2">
                    <img class="contenedor_119__img" id="blah_2" alt="Fotografia de la tienda" src="../public/images/tiendas/<?php echo $Foto_Tien;?>"/>
                    <label for="imgInp_2"><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                    <input class="ocultar" type="file" name="imagen_Tienda" id="imgInp_2"/>
                </div>

                <label>Nombre tienda</label>
                <input class="input_13 input_13A borde_1" type="text" name="nombre_com" id="Nombre_Tien" value="<?php echo $Nombre_Tien;?>" autocomplete="off"/>

                <label>Acceso directo a tu tienda</label>
                <input class="input_13 input_13A borde_1" type="text" name="link_acceso" id="Link_Acceso" value="<?php echo $Link_Acceso;?>" autocomplete="off" readonly="readonly"/>

                <label>Slogan tienda (opcional)</label>
                <input class="input_13 input_13A input_16 borde_1" type="text" name="slogan_com" id="ContenidoSlo" value="<?php echo $Slogan_Tien;?>" autocomplete="off"/>
                <input class="contador_2" type="text" id="ContadorSlo" value="50"/>
                
                <!-- DATOS DE UBICACIÓN -->
                <label>Datos de ubicación</label>
                </br>
                <select class="select_2 borde_1" id="Estado_Tien" name="estado_com" onchange="SeleccionarMunicipio(this.form)">
                    <?php
                    if(!empty($Estado_Tien)){ ?>
                        <option selected><?php echo $Estado_Tien;?></option>
                        <?php
                    } 
                    else{   ?>
                    <option>Seleccione estado</option>
                        <?php
                    }  ?>
                    <option>Lara</option>
                    <option>Yaracuy</option>
                </select>

                <select class="select_2 borde_1" id="Municipio_Tien" name="municipio_com" onchange="SeleccionarParroquia(this.form)">
                    <?php
                    if(!empty($Municipio_Tien)){ ?>
                        <option><?php echo $Municipio_Tien;?></option>
                        <?php
                    } 
                    else{   ?>
                    <option>Seleccione municipio</option>
                        <?php
                    }  ?>
                </select>

                <select class="select_2 borde_1" id="Parroquia_Tien" name="parroquia_com">
                    <?php
                    if(!empty($Parroquia_Tien)){ ?>
                        <option><?php echo $Parroquia_Tien;?></option>
                        <?php
                    } 
                    else{   ?>
                    <option>Seleccione parroquia</option>
                        <?php
                    }  ?>
                </select>                
                
                </br>
                <label>Dirección</label>
                <textarea class="textarea_4 borde_1 " name="direccion_com" id="Direccion_Tien"><?php echo $Direccion_Tien;?></textarea> 
                <input class="contador_2" type="text" id="ContadorDireccion" value="50"/>

                <!-- ******************************************************* -->
                <!-- ******************************************************* -->
                <!-- <br>
                <label id="UbicarMapa">Ubicar en mapa</label>
                <input type="text" id="address" size="30">
                <br>
                <input type="text" id="lat" size="10">
                <input type="text" id="lng" size="10">

                <div id="map_canvas"></div> -->
                <!-- ******************************************************* -->
                <!-- ******************************************************* -->
            </fieldset>

            <!-- CATEGORIAS --> 
            <a id="Categoria" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2" id="Fieldset">
                <legend class="legend_1">Categoría</legend>
                <div>
                    <p class="p_12">Una categoría clasificará tu tienda en un rubro específico</p>
                    <?php
                    //Entra en el IF cuando no hay categorias creadas
                    if($Datos['categoria'] == Array ( )){   ?>                                            
                        <div id="Label_13">
                            <div id="Contenedor_80js" style="margin-bottom: 5%;">
                                <div class="contenedor_80">
                                    <label>Categoría</label>
                                    <span class="icon-circle-down span_10 span_12_js"></span>
                                </div>                              
                                <span></span><!-- span de rellenar para pasar la validacion de categoria-->   
                                <div id="Referencia_2"></div>
                            </div>
                        </div>
                        <?php
                    }
                    else{
                        foreach($Datos['categoria'] as $Row) :
                            $Categoria = $Row['categoria']; ?>
                            <div id="Label_13">
                                <div class="contenedor_80" id="Contenedor_80js">
                                    <input class="input_13 input_13A borde_1 imput_6js" id="Imput_6js" type="text" name="categoria[]" value="<?php echo $Categoria;?>" readonly="readonly" autocomplete="off"/>
                                    <span class="icon-circle-down span_10 span_12_js"></span> 
                                    <div id="Referencia_2"></div>                                
                                    <span></span><!-- span de rellenar para pasar la validacion de categoria-->   
                                </div>                                
                            </div> <?php
                        endforeach;
                    } ?>
                </div>
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
                            <span class="icon-cancel-circle span_10"><i class="fas fa-times span_14_js"></i><span>
                            <input class="contador_2 contador_2--seccion" type="text" value="25"/>
                        </div>
                        <!-- <div class="contenedor_80B borde_1 borde_2">
                            <img class="contenedor_119__img" id="" alt="Fotografia de la sección" src="../public/images/secciones/imagen.png"/>
                            <label for=""><span class="span_18 borde_1"><i class="fas fa-pencil-alt icono_4"></i></span></label>
                            <input class="ocultar" type="file" name="imagen_Seccion" id=""/>
                        </div> -->
                    </div>
                    <?php   
                    //Entra en el IF cuando no hay secciones creadas
                    if($Datos['secciones'] == Array ( )){  ?>
                        <div class="contenedor_80 cont_seccion--div-1" id="Contenedor_80">
                            <input class="input_13 input_13A input_12 borde_1 seccionesJS" type="text" name="seccion[]" id="Seccion" placeholder="Indica una sección"/>
                            <div class="cont_seccion--icono_Contador">
                                <span class="span_10"><i class="fas fa-times span_14_js"></i></span>
                                <input class="contador_2 contador_2--seccion" type="text" value="25"/>
                            </div>
                        </div>
                        <!-- <div class="contenedor_80B borde_1 borde_2">
                            <label for="Img_Seccion"><i class="fas fa-pencil-alt icono_4 cont_seccion--icono_editar borde_1"></i></label>
                            <img class="contenedor_119__img" id="ImagenSeccion" alt="Fotografia de la sección" src="../public/images/secciones/imagen.png"/>
                            <input class="ocultar" type="file" name="imagen_Seccion" id="Img_Seccion"/>
                        </div> -->
                        <?php
                    }   
                    else{  //Entra en el ELSE cuando hay secciones creadas  
                        $Contador = 1;
                        foreach($Datos['secciones'] as $row) :
                            $Seccion_Tien = $row['seccion'];
                            $ID_Seccion = $row['ID_Seccion'];
                            $CantidadSeccion = count($Datos['secciones']);
                            ?>
                           
                            <div class="contenedor_80" id="Contenedor_80">
                                <input class="input_13 input_13A input_12 borde_1 seccionesJS" type="text" name="seccion[]" id="Seccion_<?php echo $Contador;?>" value="<?php echo $Seccion_Tien;?>" onblur="Llamar_ActualizarSeccion(this.value,'<?php echo $ID_Seccion;?>')"/>
                                <div class="contenedor__80div">
                                    <span class="icon-cancel-circle span_10 span_14_js span_10--seccion " id="<?php echo $ID_Seccion;?>"></span>
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
            
            <!-- HORARIO -->
            <?php require(RUTA_APP . "/vistas/view/tienda/horario_V.php"); ?>

            <!-- OFERTAS -->
            
            <!-- LO MÁS PEDIDO -->

            <!-- CUENTAS TRANSFERENCIAS -->
            <a id="marcador_06" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Cuentas bancarias</legend>
                <span>Los pagos de los pedidos realizados a tu tienda se depositan directamente a tus cuentas bancarias por medio de transferencias o pago móvil, los pedidos pagados por transferencia de cuentas de otros bancos causan una demora de 48 hrs en el despacho del pedido para que verifiques la transferencia.</span>
                </br>
                <label>Información para recibir pagos por transferencia</label>                   
                <div id="Mostrar_CuentaBancaria">
                    <!-- Entra en el IF cuando no hay cuentas bancarias creadas -->
                    <?php
                    if($Datos['datosBancos'] == Array ( )){  ?>
                        <div class="contenedor_67 borde_1" id="Contenedor_67">
                            <span class="icon-cancel-circle span_10 span_14 span_16_js"></span>

                            <!-- NOMBRE BANCO -->
                            <input class="input_13 input_13A bancoTransJS borde_1" type="text" name="banco[]" id="Nombre_Banco" placeholder="Banco" autocomplete="off"/>

                            <!-- TITULAR BANCO -->
                            <input class="input_13 input_13A titularTransJS borde_1" type="text" name="titular[]" id="Titular_Banco" placeholder="Titular" autocomplete="off"/>

                            <!-- NUMERO CUENTA -->
                            <input class="input_13 input_13A cuentaTransJS borde_1" type="text" name="numeroCuenta[]" id="NroCuenta_Banco" placeholder="Número de cuenta" autocomplete="off"/>

                            <!-- RIF BANCO -->
                            <input class="input_13 input_13A rifTransJS borde_1" type="text" name="rif[]" id="RIF_Banco" placeholder="RIF_Banco" autocomplete="off"/>
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
                                <input class="input_13 input_13A bancoTransJS borde_1" type="text" name="banco[]" id="Nombre_Banco" value="<?php echo $BancoNombre;?>" autocomplete="off"/>
                                
                                <!-- TITULAR BANCO -->
                                <label>Titular</label>
                                <input class="input_13 input_13A titularTransJS borde_1" type="text" name="titular[]" id="Titular_Banco" value="<?php echo $BancoTitular;?>"  autocomplete="off"/>

                                <!-- NUMERO CUENTA -->
                                <label>Número cuenta</label>
                                <input class="input_13 input_13A cuentaTransJS borde_1" type="text" name="numeroCuenta[]" id="NroCuenta_Banco" value="<?php echo $BancoCuenta;?>" autocomplete="off"/>

                                <!-- RIF BANCO -->
                                <label>RIF</label>
                                <input class="input_13 input_13A rifTransJS borde_1" type="text" name="rif[]" id="RIF_Banco" value="<?php echo $BancoRif;?>" autocomplete="off"/>
                            </div>
                            <?php
                        }
                    }  ?>                        
                    <label class="label_4 label_24" id="Label_4">Añadir cuenta bancaria</label>
                </div>
            </fieldset>            
            
            <!-- CUENTAS PAGOMOVIL -->
            <a id="marcador_07" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">                    
                <legend class="legend_1">Cuentas PagoMóvil</legend>
                <label>Información para recibir pagos por pagomóvil</label>   
                <div id="Mostrar_PagoMovil">
                    <!-- Entra en el IF cuando no hay cuentas de pagomovil creadas -->
                    <?php
                    // $Datos['datosPagomovil'][0]['cedula_pagomovil'] == ""
                    if($Datos['datosPagomovil'] == Array ()){ ?>
                        <div class="contenedor_67 borde_1" id="Contenedor_68">
                            <span class="icon-cancel-circle span_10 span_14 span_15_js"></span>

                            <!-- CÉDULA PAGOMOVIL -->
                            <input class="input_13 input_13A borde_1 cedulaJS" type="text" name="cedulaPagoMovil[]" id="CedulaPagoMovil" placeholder="Número cedula" autocomplete="off"/>

                            <!-- BANCO PAGOMOVIL -->
                            <input class="input_13 input_13A borde_1 BancoJS" type="text"  name="bancoPagoMovil[]" id="BancoPagoMovil" placeholder="Banco" autocomplete="off"/>

                            <!-- TELEFONO PAGOMOVIL -->
                            <input class="input_13 input_13A borde_1 TelefonoJS" type="text" name="telefonoPagoMovil[]" id="TelefonoPagoMovil" placeholder="Número telefónico 0000-000.00.00" autocomplete="off"/>
                        </div>
                        <?php
                    }
                    else{
                        $Iterador = 1;
                        foreach($Datos['datosPagomovil'] as $row) :
                            $CedulaPagoMovil =  $row['cedula_pagomovil'];
                            $BancoPagoMovil =  $row['banco_pagomovil'];
                            $TelefonoPagoMovil = $row['telefono_pagomovil']; 
                            ?>
                            <div class="contenedor_67 borde_1" id="Contenedor_68">
                                <span class="icon-cancel-circle span_10 span_14 span_15_js"></span>

                                <!-- CÉDULA PAGOMOVIL -->
                                <label>Cédula (Solo números)</label>
                                <input class="input_13 input_13A borde_1 cedulaJS" type="text" name="cedulaPagoMovil[]" id="<?php echo 'CedulaPagoMovil_' . $Iterador?>" value="<?php echo $CedulaPagoMovil?>" autocomplete="off"/>

                                <!-- BANCO PAGOMOVIL -->
                                <label>Banco</label>
                                <input class="input_13 input_13A borde_1 BancoJS" type="text" name="bancoPagoMovil[]" id="<?php echo 'BancoPagoMovil_' . $Iterador?>" value="<?php echo $BancoPagoMovil?>" autocomplete="off"/>
                                
                                <!-- TELEFONO PAGOMOVIL -->
                                <label>Nº teléfono (Solo números)</label>
                                <input class="input_13 input_13A borde_1 TelefonoJS" type="text" name="telefonoPagoMovil[]" id="<?php echo 'TelefonoPagoMovil_' . $Iterador?>" value="<?php echo $TelefonoPagoMovil?>" autocomplete="off"/>
                            </div>
                            <?php
                            $Iterador++;
                        endforeach;
                    }   ?>        
                    <label class="label_4 label_24" id="Label_7">Añadir teléfono </br> PagoMóvil</label>
                </div>
            </fieldset>   
            
            <!-- OTROS MEDIOS DE PAGO -->
            <a id="OtrosPago" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">                                 
                <legend class="legend_1">Otros medios de pago</legend>
                <!-- Entra en el IF cuando no hay otras formas de pago seleccionadas -->
                <?php
                // $Datos['datosPagomovil'][0]['cedula_pagomovil'] == ""
                if($Datos['otrosPagos'] == Array ()){ ?>
                    <div class="contenedor_166">   
                        <input type="checkbox" name="bolivar" id="Bolivar"/>
                        <label class="label_11" for="Bolivar">Aceptar pago en destino con efectivo en moneda nacional (Bs.)</label>           
                    </div>  
                    <div class="contenedor_166">        
                        <input type="checkbox" name="dolar" id="Dolar"/>
                        <label class="label_11" for="Dolar">Aceptar pago en destino con efectivo en moneda extranjera ($)</label>      
                    </div>  
                    <div class="contenedor_166">   
                        <input type="checkbox" name="acordado" id="Acordado"/>
                        <label class="label_11" for="Acordado">Aceptar pago acordados con el cliente vía telefonica</label>
                    </div>
                <?php
                }
                else{
                    // echo '<pre>';
                    // print_r($Datos['otrosPagos']);
                    // echo '</pre>';
                    // exit;
                    foreach($Datos['otrosPagos'] as $row)    :
                        $PagoBolivar = $row['efectivoBolivar'];
                        $PagoDolar = $row['efectivoDolar'];
                        $PagoAcordado = $row['acordado'];
                        ?>
                        <div class="contenedor_166">   
                            <input type="checkbox" name="bolivar" id="Bolivar" <?php if($PagoBolivar == 1){echo 'checked';} ?>/>
                            <label class="label_11" for="Bolivar">Aceptar pago en destino con efectivo en moneda nacional (Bs.)</label>           
                        </div>  
                        <div class="contenedor_166"> 
                            <input type="checkbox" name="dolar" id="Dolar" <?php if($PagoDolar == 1){echo 'checked';} ?>/>
                            <label class="label_11" for="Dolar">Aceptar pago en destino con efectivo en moneda extranjera ($)</label>      
                        </div>  
                        <div class="contenedor_166">   
                            <input type="checkbox" name="acordado" id="Acordado" <?php if($PagoAcordado == 1){echo 'checked';} ?>/>
                            <label class="label_11" for="Acordado">Aceptar pago acordados con el cliente vía telefonica</label>
                        </div> <?php
                    endforeach; 
                } ?>
            </fieldset>   
            
            <!-- MENU INDICE -->
            <section>   <!--id="Contenedor_83"--> 
                <div class="contenedor_83 borde_1">
                    <a class="marcador" href="#marcador_01">Persona responsable</a>
                    <a class="marcador" href="#marcador_02">Datos de tienda</a>
                    <a class="marcador" href="#Categoria">Categoría</a>
                    <a class="marcador" href="#Secciones">Secciones</a>
                    <a class="marcador" href="#Horario">Horario</a>
                    <!-- <a class="marcador" href="#marcador_04">Ofertas</a> -->
                    <!-- <a class="marcador" href="#marcador_05">Lo más pedido</a> -->
                    <a class="marcador" href="#marcador_06">Cuentas transferencia</a>
                    <a class="marcador" href="#marcador_07">Cuentas PagoMóvil</a>
                    <a class="marcador" href="#OtrosPago">Otros medios de pago</a>
                    <div class="contenedor_49 contenedor_101">
                        <input class="ocultar" type="text" name="ID_Tienda" value="<?php echo $ID_Tienda;?>"/>
                        <input class="boton boton--largo" type="submit" value="Guardar cambios"/>
                    </div>          
                    <div class="contenedor_45">
                        <!-- <input type="checkbox" id="Publicar" name="publicar" value="1" onclick="llamar_publicarTienda()" <?php //if($CategoriaT == $Categoria){echo "checked = 'checked'";};?>
                        /> -->
                        <!-- <label class="label_19" for="Publicar">Mostrar tienda al público.</label> -->
                        <div id="Mostrar_tienda"></div>
                    </div> 
                </div>
            </section> 
        </form>
    </div>

    <!--div alimentado via Ajax por medio de la funcion Llamar_categorias() -->
    <div id="Mostrar_Categorias"></div>

    <!--div alimentado via Ajax por medio de la funcion Llamar_EliminarSeccion() -->
    <!-- <did id="ReadOnly"></did> -->

    <script src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_editar.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/Municipios.js?v=' . rand();?>"></script> 
    <script src="<?php echo RUTA_URL . '/public/javascript/parroquias.js?v=' . rand();?>"></script> 

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

        
        //Da una vista previa de la imagen de la seccion
        function Muestra_Imagen_Seccion(input, id_Label){
            // console.log("______Desde Muestra_Imagen_Seccion()______", input + ' | ' + id_Label)
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    id_Label.attr('src', e.target.result); //Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }        
        $("#Img_Seccion").change(function(){
            // Código a ejecutar cuando se detecta un cambio de imagen de tienda
            var id_Label = $('#ImagenSeccion');
            Muestra_Imagen_Seccion(this, id_Label);
        });
    </script>
        
    <?php include(RUTA_APP . "/vistas/inc/footer.php");
}
else{
    redireccionar("/Login_C/");
}
    ?>
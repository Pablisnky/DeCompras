<?php   
//se invoca sesion 'ID_Afiliado' creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){  
    require(RUTA_APP . '/vistas/modal/modal_Secciones_V.php');

    $ID_Tienda = $_SESSION["ID_Tienda"];

    //$Datos viene de CuentaComerciante_C/Editar
    foreach($Datos['datosResposable'] as $row){
        $Nombre_AfiCom =  $row['nombre_AfiCom'];
        $Apellido_AfiCom = $row['apellido_AfiCom']; 
        $Cedula_AfiCom = $row['cedula_AfiCom'];
        $Telefono_AfiCom = $row['telefono_AfiCom'];
        $Correo_AfiCom = $row['correo_AfiCom'];
        $Foto_AfiCom = $row['fotografia_AfiCom'];
    }
    
    //$Datos viene de CuentaComerciante_C/Editar
    foreach($Datos['datosTienda'] as $row){
        $Nombre_Tien =  $row['nombre_Tien'];
        $Estado_Tien = $row['estado_Tien'];
        $Municipio_Tien = $row['municipio_Tien'];
        $Parroquia_Tien = $row['parroquia_Tien'];
        $Direccion_Tien = $row['direccion_Tien']; 
        $Slogan_Tien = $row['slogan_Tien'];
        $Foto_Tien = $row['fotografia_Tien']; 
        $Desactivar_Tien = $row['desactivar_Tien'];
    }

    foreach($Datos['link_Tien'] as $row)    :
        $Link_Acceso = $row['link_acceso'];
    endforeach;      ?>
    
    <!-- CDN iconos de font-awesome-->
    <link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>

    <!-- CDN libreria JQuery, necesaria para la previsualización de la imagen--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    
    <div class="contenedor_42 contenedor_108" id="Contenedor_42">  
        <h1 class="h1_8">Configurar cuenta</h1>   
        <form action="<?php echo RUTA_URL; ?>/CuentaComerciante_C/recibeRegistroEditado" method="POST" name="form_Configurar" enctype="multipart/form-data" autocomplete="off" onsubmit="return validarDatosTienda()">

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

            <!-- DATOS TIENDA -->
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
                                    <span class=""><i class="fas fa-sort-down span_10 span_10--categoria span_12_js"></i></span>
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
                            <div class="contenedor__80div">
                                <i class="far fa-times-circle span_10 span_14_js span_10--seccion"></i>
                                <input class="contador_2 contador_2--seccion" type="text" value="25"/>
                            </div>
                        </div>
                    </div>
                    <?php   
                    //Entra en el IF cuando no hay secciones creadas
                    if($Datos['secciones'] == Array ( )){  ?>
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
                        foreach($Datos['secciones'] as $row) :
                            $Seccion_Tien = $row['seccion'];
                            $ID_Seccion = $row['ID_Seccion'];
                            $CantidadSeccion = count($Datos['secciones']);
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
            
            <!-- HORARIO -->
            <?php require(RUTA_APP . "/vistas/view/tienda/horario_V.php"); ?>

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

                            <!-- CEDULA TITULAR -->
                            <input class="input_13 input_13A rifTransJS borde_1" type="text" name="rif[]" id="RIF_Banco" placeholder="Cedula titular / RIF" autocomplete="off"/>
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
                    if($Datos['datosPagomovil'] == Array ()){ ?>
                        <div class="contenedor_67 borde_1" id="Contenedor_68">
                            <i class="far fa-times-circle span_10 span_14 PagoMovil_js"></i>

                            <!-- CÉDULA PAGOMOVIL -->
                            <input class="input_13 input_13A borde_1 cedulaJS" type="text" name="cedulaPagoMovil[]" id="CedulaPagoMovil" placeholder="Número cedula (solo números)" autocomplete="off"/>

                            <!-- BANCO PAGOMOVIL -->
                            <!-- <select class="select_2 select_3 borde_1 BancoJS" name="bancoPagoMovil[]" id="BancoPagoMovil"> -->
                            <?php require(RUTA_APP . "/vistas/view/complementos_V/bancos_V.php");?>

                            <!-- TELEFONO PAGOMOVIL -->
                            <input class="input_13 input_13A borde_1 TelefonoJS" type="text" name="telefonoPagoMovil[]" id="TelefonoPagoMovil" placeholder="Número telefónico (solo números)" autocomplete="off"/>
                        </div>
                        <?php
                    }
                    else{ //Entra en el ELSE cuando hay cuentas de pagomovil creadas
                        $Iterador = 1;
                        foreach($Datos['datosPagomovil'] as $row) :
                            $CedulaPagoMovil =  $row['cedula_pagomovil'];
                            $BancoPagoMovil =  $row['banco_pagomovil'];
                            $TelefonoPagoMovil = $row['telefono_pagomovil']; 
                            ?>
                            <div class="contenedor_67 borde_1" id="Contenedor_68">
                                <i class="far fa-times-circle span_10 span_14 PagoMovil_js"></i>

                                <!-- CÉDULA PAGOMOVIL -->
                                <label>Cédula (Solo números)</label>
                                <input class="input_13 input_13A borde_1 cedulaJS" type="text" name="cedulaPagoMovil[]" id="<?php echo 'CedulaPagoMovil_' . $Iterador?>" value="<?php echo $CedulaPagoMovil?>" autocomplete="off"/>

                                <!-- BANCO PAGOMOVIL -->
                                <label>Banco</label>                                    
                                <select class="select_2 select_3 borde_1 BancoJS" name="bancoPagoMovil[]" id="<?php echo 'BancoPagoMovil_' . $Iterador?>" onclick="SeleccionarBanco(this.form)">
                                    <option value="<?php echo $BancoPagoMovil?>"><?php echo $BancoPagoMovil?></option>
                                </select>
                                
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
            
            <!-- CUENTAS RESERVE -->
            <a id="marcador_08" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">                    
                <legend class="legend_1">Cuenta Reserve</legend>
                <label>Información para recibir pagos por Reserve</label>   
                <div id="Mostrar_PagoMovil">
                    <!-- Entra en el IF cuando no hay cuentas de reserve creadas -->
                    <?php 
                    if($Datos['datosReserve'] == Array ()){ ?>
                        <div class="contenedor_67 borde_1" id="Contenedor_68">
                            <span class="icon-cancel-circle span_10 span_14 span_15_js"></span>

                            <!-- USUARIO RESERVE -->
                            <input class="input_13 input_13A borde_1 BancoJS" type="text" name="usuario_reserve[]" id="UsuarioReserve" placeholder="Usuario Reserve" autocomplete="off"/>

                            <!-- TELEFONO RESERVE -->
                            <input class="input_13 input_13A borde_1 TelefonoJS" type="text" name="telefono_reserve[]" id="TelefonoReserve" placeholder="Número telefónico (solo números)" autocomplete="off"/>
                        </div>
                        <?php
                    }
                    else{
                        $Iterador = 1;
                        foreach($Datos['datosReserve'] as $row) :
                            $UsuarioReserve =  $row['usuarioReserve'];
                            $TelefonoReserve = $row['telefonoReserve']; 
                            ?>
                            <div class="contenedor_67 borde_1" id="Contenedor_68">
                                <span class="icon-cancel-circle span_10 span_14 span_15_js"></span>

                                <!-- USUARIO RESERVE -->
                                <label>Usuario</label>
                                <input class="input_13 input_13A borde_1 BancoJS" type="text" name="usuario_reserve[]" id="<?php echo 'UsuarioReserve_' . $Iterador?>" value="<?php echo $UsuarioReserve?>" autocomplete="off"/>
                                
                                <!-- TELEFONO RESERVE -->
                                <label>Nº teléfono (Solo números)</label>
                                <input class="input_13 input_13A borde_1 TelefonoJS" type="text" name="telefono_reserve[]" id="<?php echo 'TelefonoReserve_' . $Iterador?>" value="<?php echo $TelefonoReserve?>" autocomplete="off"/>
                            </div>
                            <?php
                            $Iterador++;
                        endforeach;
                    }   ?>        
                    <label class="label_4 label_24" id="Label_8">Añadir cuenta </br> Reserve</label>
                </div>
            </fieldset>         
            
            <!-- CUENTAS PAYPAL -->
            <a id="marcador_09" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">                    
                <legend class="legend_1">Cuenta Paypal</legend>
                <label>Información para recibir pagos por Paypal</label>   
                <div id="Mostrar_PagoMovil">
                    <!-- Entra en el IF cuando no hay cuentas de Paypal creadas -->
                    <?php
                    if($Datos['datosPaypal'] == Array ()){ ?>
                        <div class="contenedor_67 borde_1" id="Contenedor_68">
                            <span class="icon-cancel-circle span_10 span_14 span_15_js"></span>

                            <!-- CORREO PAYPAL -->
                            <input class="input_13 input_13A borde_1 TelefonoJS" type="text" name="correro_paypal[]" id="CorreoPaypal" placeholder="Correo electrónico" autocomplete="off"/>
                        </div>
                        <?php
                    }
                    else{   //Entra en el else cuando hay cuentas de Paypal creadas 
                        $Iterador = 1;
                        foreach($Datos['datosPaypal'] as $row) :
                            $CorreoPaypal = $row['correo_paypal']; 
                            ?>
                            <div class="contenedor_67 borde_1" id="Contenedor_68">
                                <span class="icon-cancel-circle span_10 span_14 span_15_js"></span>

                                <!-- CORREO PAYPAL -->
                                <label>Correo Paypal</label>
                                <input class="input_13 input_13A borde_1 BancoJS" type="text" name="correro_paypal[]" id="<?php echo 'CorreoPaypal_' . $Iterador?>" value="<?php echo $CorreoPaypal?>" autocomplete="off"/>
                            </div>
                            <?php
                            $Iterador++;
                        endforeach;
                    }   ?>        
                    <label class="label_4 label_24" id="Label_8">Añadir cuenta </br> Paypal</label>
                </div>
            </fieldset>        
            
            <!-- CUENTAS ZELLE -->
            <a id="marcador_10" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">                    
                <legend class="legend_1">Cuenta Zelle</legend>
                <label>Información para recibir pagos por Zelle</label>   
                <div id="Mostrar_PagoMovil">
                    <!-- Entra en el IF cuando no hay cuentas de Paypal creadas -->
                    <?php
                    if($Datos['datosZelle'] == Array ()){ ?>
                        <div class="contenedor_67 borde_1" id="Contenedor_68">
                            <span class="icon-cancel-circle span_10 span_14 span_15_js"></span>

                            <!-- CORREO PAYPAL -->
                            <input class="input_13 input_13A borde_1 TelefonoJS" type="text" name="correro_zelle[]" id="CorreoZelle" placeholder="Correo electrónico" autocomplete="off"/>
                        </div>
                        <?php
                    }
                    else{   //Entra en el else cuando hay cuentas de Paypal creadas 
                        $Iterador = 1;
                        foreach($Datos['datosZelle'] as $row) :
                            $CorreoZelle = $row['correo_zelle']; 
                            ?>
                            <div class="contenedor_67 borde_1" id="Contenedor_68">
                                <span class="icon-cancel-circle span_10 span_14 span_15_js"></span>

                                <!-- CORREO ZELLE -->
                                <label>Correo Zelle</label>
                                <input class="input_13 input_13A borde_1 BancoJS" type="text" name="correro_zelle[]" id="<?php echo 'CorreoZelle_' . $Iterador?>" value="<?php echo $CorreoZelle?>" autocomplete="off"/>
                            </div>
                            <?php
                            $Iterador++;
                        endforeach;
                    }   ?>        
                    <label class="label_4 label_24" id="Label_8">Añadir cuenta </br> Zelle</label>
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
                    <a class="marcador" href="#marcador_06">Cuentas transferencia</a>
                    <a class="marcador" href="#marcador_07">Cuentas PagoMóvil</a>
                    <a class="marcador" href="#marcador_08">Cuentas Reserve</a>
                    <a class="marcador" href="#marcador_09">Cuentas Paypal</a>
                    <a class="marcador" href="#marcador_10">Cuentas Zelle</a>
                    <a class="marcador" href="#OtrosPago">Otros medios de pago</a>
                    <div class="contenedor_49 contenedor_101">
                        <input class="ocultar" type="text" name="ID_Tienda" value="<?php echo $ID_Tienda;?>"/>
                        <input class="boton boton--largo" type="submit" value="Guardar cambios"/>
                    </div>          
                    <div class="contenedor_45">
                        <input type="checkbox" id="Publicar" name="desactivar_com" <?php if($Desactivar_Tien == 1){echo "checked = 'checked'";};?>/>
                        <label class="label_19" for="Publicar">Desactivar tienda.</label>
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
    <script src="<?php echo RUTA_URL . '/public/javascript/Bancos.js?v=' . rand();?>"></script> 

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
        // $("#imgInp_2").change(function(){
        //     // Código a ejecutar cuando se detecta un cambio de imagen de tienda
        //     var id_Label = $('#blah_2');
        //     readImage(this, id_Label);
        // });
    </script>
        
    <?php include(RUTA_APP . '/vistas/footer/footer.php');
}
else{ 
    header('location: ' . RUTA_URL . '/CerrarS_C');
}
    ?>
    <section class="section_1" id="Section_1">
        <div class="contenedor_37"  id="Contenedor_37">
            <h1 class="h1_2">PedidoRemoto</h1>
            <!-- <h2 class="h2_4">solicitudes desde casa</h2> -->
            <h2 class="h2_4">MarketPlace</h2>
        </div>
        <!-- <p class="p_8">Unete a nuestra red de comercialización de productos.</p> -->
        <div class="contenedor_51" id="Contenedor_51">
            <div>
                <span class="icon-cart span_6"></span>
            </div>
            <div>
                <span class="icon-truck span_6"></span>
            </div>
            <div>
                <span class="icon-home2 span_6"></span>
            </div>
            <div>
                <h3 class="h3_2" id="H3_3">Tu tienda en toda la ciudad</h3>
            </div>
        </div>
        <div class="contenedor_88" id="Contenedor_88">
            <label class="a_2" id="Tiendas">Tiendas</label>
        </div>
    </section>
    <section id="Section_2js">
        <div class='contenedor_4' id="Contenedor_4">
            <div class='contenedor_6 borde_1' id="Comida_Rapida">
                <h2 class='h2_1'>COMIDA RAPIDA Y RESTAURANTS</h2>
                <span class="icon-spoon-knife span_8"></span>                  
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            // echo "<pre>";
                            // print_r($Datos);
                            // echo "</pre>";
                            // exit();
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 1){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div> 

            <div class='contenedor_6 borde_1' id="Mascotas">
                <h2 class='h2_1'>MASCOTAS</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 10){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Merceria">
                <h2 class='h2_1'>MERCERÍA</h2>
                <span class="icon-clubs span_8"></span>                
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 19){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Repuesto_automotriz">
                <h2 class='h2_1'>REPUESTO AUTOMOTRIZ</h2>
                <span class="icon-man-woman span_8"></span>                 
                    <div class="contenedor_106">
                        <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 11){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                    </div>
            </div>

            <div class='contenedor_6 borde_1' id="Bodega">
                <h2 class='h2_1'>BODEGAS</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 4){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Minimarket">
                <h2 class='h2_1'>MINIMARKET</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 3){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Material_Medico_Quirurgico">
                <h2 class='h2_1'>MATERIAL MÉDICO QUIRURGICO</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 2){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Ropa_Zapato">
                <h2 class='h2_1'>ROPA Y ZAPATO</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 8){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Artesania">
                <h2 class='h2_1'>ARTE Y LITERATURA</h2>
                <span class="icon-pen span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 7){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Farmacia">
                <h2 class='h2_1'>FARMACIA Y SALUD</h2>
                <span class="icon-aid-kit span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 12){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Ferreteria">
                <h2 class='h2_1'>FERRETRÍA Y HOGAR</h2>
                <span class="icon-hammer span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 6){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Panaderia">
                <h2 class='h2_1'>PANADERÍA</h2>
                <span class="icon-spoon-knife span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 5){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div> 

            <div class='contenedor_6 borde_1' id="Licores">
                <h2 class='h2_1'>LICORES</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 13){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Relojes">
                <h2 class='h2_1'>JOYAS Y RELOJERÍA</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 9){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Deportes">
                <h2 class='h2_1'>DEPORTES</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 14){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Floristeria">
                <h2 class='h2_1'>FLORISTERÍA Y DECORACIÓN</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 15){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Construccion">
                <h2 class='h2_1'>CONSTRUCCIÓN</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 16){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Telefonos">
                <h2 class='h2_1'>TELEFONOS Y COMPUTADORAS</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 17){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Papeleria">
                <h2 class='h2_1'>PAPELERÍA Y OFICINA</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 18){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }                                
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Juguetes">
                <h2 class='h2_1'>JUGUETES Y ACCESORIOS PARA NIÑOS</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad'];
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>
        </div>
    </section>
    
    <section><!--Buscador-->
        <div class="contenedor_54" id="Busqueda">
            <div class="contenedor_53">                
                <div class="contenedor_102">
                        <h1 class="h1_1 h1_3">Seleccione una ciudad y especifica tú pedido</h1>
                        <span class="span_5" id="Span_5" onclick="CerrarModal_X('Mostrar_Categorias')">X</span>
                </div>
                <div class="contenedor_55">
                    <div class="contenedor_56">
                        <label class="label_6">Estado</label>
                        <select class="select_1">
                            <option>Yaracuy</option>
                        </select>
                    </div>
                    <div class="contenedor_56 contenedor_56a">
                        <label class="label_6">Ciudad</label>
                        <select class="select_1">
                            <option>San Felipe</option>
                        </select>
                    </div>
                </div>
                <div class="contenedor_57">
                    <input class="placeholder borde_1" id="Input_9" type="text" placeholder="Ingrese un producto"/>
                </div>
            </div>
            
            <!--Carga mediante Ajax las tiendas disponibles para la busqueda solicitada desde buscador_V.php -->
            <div class="contenedor_58" id="Buscar_Pedido"></div>
        </div>
    </section>


<script type="text/javascript" src="<?php echo RUTA_URL.'/public/javascript/E_Inicio.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL.'/public/javascript/A_Inicio.js';?>"></script>

<!-- <script type="text/javascript" src ="<?php // echo RUTA_URL?>/public/javascript/push.min.js"></script>
			
<script>
    window.onload = function(){
        Push.Permission.request()
    }

    // Se crea la notifica pasando como parametro el titulo y objeto Json con varias propiedades
    Push.create("NUEVO PEDIDO",{
        body: "Un cliente va por un despacho. Ver orden de compra",
        icon: '<?php // echo RUTA_URL?>/public/images/logo.png',
        timeout: 7000,
        vibrate: [100,100,100],
        onClick: function(){
            window.focus();//LLeva a la pagina que invoca la notificación en casode encontrarse en ella
            this.close();//Cierra la notificación
        }
    });
</script> -->

<?php require(RUTA_APP . '/vistas/inc/footer.php'); ?>
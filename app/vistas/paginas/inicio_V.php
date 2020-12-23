    <section class="section_1" id="Section_1">
        <div class="contenedor_37"  id="Contenedor_37">
            <h1 class="h1_2">PedidoRemoto</h1>
            <!-- <h2 class="h2_4">Tu tienda en toda la ciudad</h2> -->
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
                <h3 class="h3_2" id="H3_3">Compras desde casa</h3>
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
                                    $CantidadComida_Rapida = $arr['cantidad']; 
                                    echo $CantidadComida_Rapida;
                                }
                            endforeach; 
                            if(empty($CantidadComida_Rapida)){                                     
                                echo 0;?>
                                <style>
                                    #Comida_Rapida{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/           
                                    }
                                </style>
                                <?php
                            } 
                        ?>
                    </span>
                </div>
            </div> 

            <div class='contenedor_6 borde_1' id="Mascotas">
                <h2 class='h2_1'>MASCOTAS</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 10){  
                                    $CantidadMascotas = $arr['cantidad']; 
                                    echo $CantidadMascotas;
                                }
                            endforeach; 
                            if(empty($CantidadMascotas)){                                     
                                echo 0;?>
                                <style>
                                    #Mascotas{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            } 
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
                                    $CantidadMerceria = $arr['cantidad']; 
                                    echo $CantidadMerceria;
                                }
                            endforeach; 
                            if(empty($CantidadMerceria)){                                     
                                echo 0;?>
                                <style>
                                    #Merceria{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Repuesto_automotriz">
                <h2 class='h2_1'>REPUESTO AUTOMOTRIZ</h2>
                <span class="icon-barcode span_8"></span>                 
                    <div class="contenedor_106">
                        <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 11){  
                                    $CantidadRepuesto_automotriz = $arr['cantidad']; 
                                    echo $CantidadRepuesto_automotriz;
                                }
                            endforeach; 
                            if(empty($CantidadRepuesto_automotriz)){                                     
                                echo 0;?>
                                <style>
                                    #Repuesto_automotriz{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }
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
                                    $CantidadBodega = $arr['cantidad']; 
                                    echo $CantidadBodega;
                                }
                            endforeach; 
                            if(empty($CantidadBodega)){                                     
                                echo 0;?>
                                <style>
                                    #Bodega{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
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
                                    $CantidadMinimarket = $arr['cantidad']; 
                                    echo $CantidadMinimarket;
                                }
                            endforeach; 
                            if(empty($CantidadMinimarket)){                                     
                                echo 0;?>
                                <style>
                                    #Minimarket{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Material_Medico_Quirurgico">
                <h2 class='h2_1'>MATERIAL MÉDICO QUIRURGICO</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 2){  
                                    $CantidadMaterial_Medico_Quirurgico = $arr['cantidad']; 
                                    echo $CantidadMaterial_Medico_Quirurgico;
                                }
                            endforeach; 
                            if(empty($CantidadMaterial_Medico_Quirurgico)){                                     
                                echo 0;?>
                                <style>
                                    #Material_Medico_Quirurgico{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Ropa_Zapato">
                <h2 class='h2_1'>ROPA Y ZAPATO</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 8){  
                                    $CantidadRopa_Zapato = $arr['cantidad']; 
                                    echo $CantidadRopa_Zapato;
                                }
                            endforeach; 
                            if(empty($CantidadRopa_Zapato)){                                     
                                echo 0;?>
                                <style>
                                    #Ropa_Zapato{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
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
                                    $CantidadArtesania = $arr['cantidad']; 
                                    echo $CantidadArtesania;
                                }
                            endforeach; 
                            if(empty($CantidadArtesania)){                                     
                                echo 0;?>
                                <style>
                                    #Artesania{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
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
                                    $CantidadFarmacia = $arr['cantidad']; 
                                    echo $CantidadFarmacia;
                                }
                            endforeach; 
                            if(empty($CantidadFarmacia)){                                     
                                echo 0;?>
                                <style>
                                    #Farmacia{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
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
                                    $CantidadFerreteria = $arr['cantidad']; 
                                    echo $CantidadFerreteria;
                                }
                            endforeach; 
                            if(empty($CantidadFerreteria)){                                     
                                echo 0;?>
                                <style>
                                    #Ferreteria{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
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
                                    $CantidadPanaderia = $arr['cantidad']; 
                                    echo $CantidadPanaderia;
                                }
                            endforeach; 
                            if(empty($CantidadPanaderia)){                                     
                                echo 0;?>
                                <style>
                                    #Panaderia{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
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
                                    $CantidadLicores = $arr['cantidad']; 
                                    echo $CantidadLicores;
                                }
                            endforeach; 
                            if(empty($CantidadLicores)){                                     
                                echo 0;?>
                                <style>
                                    #Licores{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
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
                                    $CantidadRelojes = $arr['cantidad']; 
                                    echo $CantidadRelojes;
                                }
                            endforeach; 
                            if(empty($CantidadRelojes)){                                     
                                echo 0;?>
                                <style>
                                    #Relojes{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Deportes">
                <h2 class='h2_1'>DEPORTES</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 14){  
                                    $CantidadDeportes = $arr['cantidad']; 
                                    echo $CantidadDeportes;
                                }
                            endforeach; 
                            if(empty($CantidadDeportes)){                                     
                                echo 0;?>
                                <style>
                                    #Deportes{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Floristeria">
                <h2 class='h2_1'>FLORISTERÍA Y DECORACIÓN</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 15){  
                                    $CantidadFloristeria = $arr['cantidad']; 
                                    echo $CantidadFloristeria;
                                }
                            endforeach; 
                            if(empty($CantidadFloristeria)){                                     
                                echo 0;?>
                                <style>
                                    #Floristeria{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Construccion">
                <h2 class='h2_1'>CONSTRUCCIÓN</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 16){  
                                    $CantidadConstruccion = $arr['cantidad']; 
                                    echo $CantidadConstruccion;
                                }
                            endforeach; 
                            if(empty($CantidadConstruccion)){                                     
                                echo 0;?>
                                <style>
                                    #Construccion{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Telefonos">
                <h2 class='h2_1'>TELEFONOS Y COMPUTADORAS</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 17){  
                                    $CantidadTelefonos = $arr['cantidad']; 
                                    echo $CantidadTelefonos;
                                }
                            endforeach; 
                            if(empty($CantidadTelefonos)){                                     
                                echo 0;?>
                                <style>
                                    #Telefonos{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Papeleria">
                <h2 class='h2_1'>PAPELERÍA Y OFICINA</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 18){  
                                    $CantidadPapeleria = $arr['cantidad']; 
                                    echo $CantidadPapeleria;
                                }                                
                            endforeach; 
                            if(empty($CantidadPapeleria)){                                     
                                echo 0;?>
                                <style>
                                    #Papeleria{
                                        z-index: -1; /* Caso particular porque el elemen o no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre */
                                    }
                                            </style>
                                <?php
                            }  
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Juguetes">
                <h2 class='h2_1'>JUGUETES Y ACCESORIOS PARA NIÑOS</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $CantidadJuguetes = $arr['cantidad'];
                                    echo $CantidadJuguetes;
                                }
                            endforeach; 
                            if(empty($CantidadJuguetes)){                                     
                                echo 0;?>
                                <style>
                                    #Juguetes{
                                        z-index: -1; /* Caso particular porque el elemento no esta posicionado pero aún asi se pudo aplicar la propiedad z-index con valor -1 para ponerlo por detras de su padre, esto funciona debido a los niveles de apilamiento de los elementos HTML*/          
                                    }
                                </style>
                                <?php
                            }  
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
                            <option>Independencia</option>
                            <option>San Felipe</option>
                            <option>Yaritagua</option>
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
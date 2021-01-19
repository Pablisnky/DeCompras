
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>

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
            <h3 class="h3_2 h3_3" id="H3_3">Compras y despachos <br class="br_2"> en tiendas de tu ciudad</h3>
        </div>
    </div>
    <div class="contenedor_88" id="Contenedor_88">
        <label class="a_2" id="Tiendas">Tiendas</label>
    </div>
</section>
    
<section id="Section_2js">
    <div class='contenedor_4' id="Contenedor_4">

        <div class='contenedor_6 borde_1' id="Artesania">
            <h2 class='h2_1'>ARTE Y LITERATURA</h2>
            <span class="icon-pen span_8"></span>                 
            <div class="contenedor_106">
                <span class="span_21 borde_1">
                    <?php
                        foreach($Datos as $arr) :
                            if($arr['ID_Categoria'] == 7){  
                                $CantidadArtesania = $arr['cantidad']; 
                                echo $CantidadArtesania; ?>
                                <style>
                                    #Artesania .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadArtesania)){                                     
                            echo 0;?>
                            <style>
                                #Artesania{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Artesania .span_21{
                                    background-color: var(--Fallos);
                                }
                            </style>
                            <?php
                        }  
                    ?>
                </span>
            </div>
        </div>
        
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
                                echo $CantidadComida_Rapida; ?>
                                <style>
                                    #Comida_Rapida .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadComida_Rapida)){                                     
                            echo 0;?>
                            <style>
                                #Comida_Rapida{
                                    position: relative;
                                    z-index: -1;            
                                }
                                #Comida_Rapida .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadMascotas; ?>
                                <style>
                                    #Mascotas .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadMascotas)){                                     
                            echo 0;?>
                            <style>
                                #Mascotas{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Mascotas .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadMerceria;  ?>
                                <style>
                                    #Merceria .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadMerceria)){                                     
                            echo 0;?>
                            <style>
                                #Merceria{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Merceria .span_21{
                                    background-color: var(--Fallos);
                                }
                            </style>
                            <?php
                        }
                    ?>
                </span>
            </div>
        </div>

        <div class='contenedor_6 borde_1' id="Frutas">
            <h2 class='h2_1'>FRUTAS, VERDURAS Y HORTALIZAS</h2>
            <span class="icon-barcode span_8"></span>                 
            <div class="contenedor_106">
                <span class="span_21 borde_1">
                    <?php
                    foreach($Datos as $arr) :
                        if($arr['ID_Categoria'] == 20){  
                            $CantidadFrutas_Verduras = $arr['cantidad']; 
                            echo $CantidadFrutas_Verduras;  ?>
                            <style>
                                #Frutas .span_21{
                                    background-color: var(--Aciertos);
                                }
                            </style>  <?php
                        }
                    endforeach; 
                    if(empty($CantidadFrutas_Verduras)){                                     
                        echo 0; ?>
                        <style>
                            #Frutas{
                                position: relative;
                                z-index: -1 !important;      
                            }
                            #Frutas .span_21{
                                background-color: var(--Fallos);
                            }
                        </style>  <?php
                    }   ?>
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
                            echo $CantidadRepuesto_automotriz;  ?>
                            <style>
                                #Repuesto_automotriz .span_21{
                                    background-color: var(--Aciertos);
                                }
                            </style>  <?php
                        }
                    endforeach; 
                    if(empty($CantidadRepuesto_automotriz)){                                     
                        echo 0; ?>
                        <style>
                            #Repuesto_automotriz{
                                position: relative;
                                z-index: -1 !important;      
                            }
                            #Repuesto_automotriz .span_21{
                                background-color: var(--Fallos);
                            }
                        </style>  <?php
                    }   ?>
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
                                echo $CantidadBodega; ?>
                                <style>
                                    #Bodega .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadBodega)){                                     
                            echo 0;?>
                            <style>
                                #Bodega{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Bodega .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadMinimarket; ?>
                                <style>
                                    #Minimarket .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadMinimarket)){                                     
                            echo 0;?>
                            <style>
                                #Minimarket{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Minimarket .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadMaterial_Medico_Quirurgico; ?>
                                <style>
                                    #Material_Medico_Quirurgico .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadMaterial_Medico_Quirurgico)){                                     
                            echo 0;?>
                            <style>
                                #Material_Medico_Quirurgico{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Material_Medico_Quirurgico .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadRopa_Zapato; ?>
                                <style>
                                    #Ropa_Zapato .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadRopa_Zapato)){                                     
                            echo 0;?>
                            <style>
                                #Ropa_Zapato{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Ropa_Zapato .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadFarmacia; ?>
                                <style>
                                    #Farmacia .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadFarmacia)){                                     
                            echo 0;?>
                            <style>
                                #Farmacia{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Farmacia .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadFerreteria; ?>
                                <style>
                                    #Ferreteria .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadFerreteria)){                                     
                            echo 0;?>
                            <style>
                                #Ferreteria{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Ferreteria .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadPanaderia; ?>
                                <style>
                                    #Panaderia .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadPanaderia)){                                     
                            echo 0;?>
                            <style>
                                #Panaderia{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Panaderia .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadLicores; ?>
                                <style>
                                    #Licores .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadLicores)){                                     
                            echo 0;?>
                            <style>
                                #Licores{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Licores .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadRelojes; ?>
                                <style>
                                    #Relojes .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadRelojes)){                                     
                            echo 0;?>
                            <style>
                                #Relojes{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Relojes .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadDeportes; ?>
                                <style>
                                    #Deportes .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadDeportes)){                                     
                            echo 0;?>
                            <style>
                                #Deportes{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Deportes .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadFloristeria; ?>
                                <style>
                                    #Floristeria .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadFloristeria)){                                     
                            echo 0;?>
                            <style>
                                #Floristeria{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Floristeria .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadConstruccion; ?>
                                <style>
                                    #Construccion .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadConstruccion)){                                     
                            echo 0;?>
                            <style>
                                #Construccion{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Construccion .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadTelefonos; ?>
                                <style>
                                    #Telefonos .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadTelefonos)){                                     
                            echo 0;?>
                            <style>
                                #Telefonos{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Telefonos .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadPapeleria; ?>
                                <style>
                                    #Papeleria .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }                                
                        endforeach; 
                        if(empty($CantidadPapeleria)){                                     
                            echo 0;?>
                            <style>
                                #Papeleria{
                                    position: relative;
                                    z-index: -1;
                                }
                                #Papeleria .span_21{
                                    background-color: var(--Fallos);
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
                                echo $CantidadJuguetes; ?>
                                <style>
                                    #Juguetes .span_21{
                                        background-color: var(--Aciertos);
                                    }
                                </style>
                                <?php
                            }
                        endforeach; 
                        if(empty($CantidadJuguetes)){                                     
                            echo 0;?>
                            <style>
                                #Juguetes{
                                    position: relative;
                                    z-index: -1;           
                                }
                                #Juguetes .span_21{
                                    background-color: var(--Fallos);
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

<section><!--BUSCADOR-->
    <div class="contBuscador contBuscador__borrar" id="Busqueda">   
        <span class="icon-cancel-circle spanCerrar" id="Span_5" onclick="CerrarModal_X('Mostrar_Categorias')"></span>
        <div class="contBuscador__div">     
            <div class="contFlex50 contFlex--around">
                <div class="contFlex__div">
                    <select class="contFlex__select">
                        <option>Estado</option>
                        <option selected="true">Yaracuy</option>
                    </select>
                </div>
                <div class="contFlex__div">
                    <select class="contFlex__select">
                        <!-- <option>Ciudad</option>
                        <option>Cocorote</option>
                        <option>Independencia</option> -->
                        <option selected="true">San Felipe</option>
                        <!-- <option>Yaritagua</option> -->
                    </select>
                </div>
            </div>
            <div class="contBuscador__div__div">
                <input class="placeholder borde_1" id="Input_9" type="text" placeholder="Ingrese un producto"/>
            </div>
        </div>
        
        <!--Carga mediante Ajax las tiendas disponibles para la busqueda solicitada desde buscador_V.php -->
        <div class="contenedor_58" id="Buscar_Pedido"></div>
    </div>
</section>


<script type="text/javascript" src="<?php echo RUTA_URL.'/public/javascript/E_Inicio.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL.'/public/javascript/A_Inicio.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL.'/public/convoca_SW.js';?>"></script>

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
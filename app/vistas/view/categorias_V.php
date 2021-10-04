<!-- //Se obtiene la parroquia donde se realizara la busqueda -->
<?php 
    //Se crean sesiones exigidas en Tiendas_C/tiendasEnCatalogo() y VItrina_C        
    $_SESSION['Parroquia'] = $Datos['cantidadTiendasCategoria'][0]['parroquia_Tien'];
?>

<div class="contenedor_90 p_9 borde_1">
    <div class="contenedor_159" id="Span_3">
        <!-- Icono flecha atras -->
        <i class="fas fa-arrow-left" style="display: inline;"></i>
        <a class="font--negro" href="<?php echo RUTA_URL . '/Ciudades_C';?>">Ciudades</a>
    </div>        
    <h1 class="h1_1 h1_3"><?php echo $_SESSION['Parroquia']?></h1>
</div>

<div class="contenedor_4" id="Cont_Categorias">
    <div class='contenedor_6 borde_1' id="Artesania">
        <h2 class='h2_1'>ARTE Y LITERATURA</h2>
        <i class="fas fa-pen-nib icono_2"></i>                 
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                        if($arr['ID_Categoria'] == 7){  
                            $CantidadArtesania = $arr['cantidad']; 
                            echo $CantidadArtesania; ?>
                            <style>
                                #Artesania .span_21{
                                    background-color: var(--Aciertos);
                                }
                            </style>  <?php
                        }
                    endforeach; 
                    if(empty($CantidadArtesania)){                                     
                        echo 0;     ?>
                        <style>
                            #Artesania{
                                position: relative;
                                z-index: -1;           
                            }
                            #Artesania .span_21{
                                background-color: var(--Fallos);
                            }
                        </style>    <?php
                    }  
                ?>
            </span>
        </div>
    </div>

    <div class='contenedor_6 borde_1' id="Bodega">
        <h2 class='h2_1'>BODEGAS</h2>
        <i class="fas fa-store icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
    
    <div class='contenedor_6 borde_1' id="Comida_Rapida">
        <h2 class='h2_1'>COMIDA RAPIDA Y RESTAURANTS</h2>
        <i class="fas fa-drumstick-bite icono_2"></i>                 
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
    
    <div class='contenedor_6 borde_1' id="Cosmeticos">
        <h2 class='h2_1'>COSMETICOS</h2>  
        <i class="fas fa-female icono_2"></i>        
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                        if($arr['ID_Categoria'] == 22){  
                            $CantidadCosmeticos = $arr['cantidad']; 
                            echo $CantidadCosmeticos; ?>
                            <style>
                                #Cosmeticos .span_21{
                                    background-color: var(--Aciertos);
                                }
                            </style>
                            <?php
                        }
                    endforeach; 
                    if(empty($CantidadCosmeticos)){                                     
                        echo 0;?>
                        <style>
                            #Cosmeticos{
                                position: relative;
                                z-index: -1;            
                            }
                            #Cosmeticos .span_21{
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
        <i class="fas fa-cat icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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

    <div class='contenedor_6 borde_1' id="Repuesto_automotriz">
        <h2 class='h2_1'>REPUESTO AUTOMOTRIZ</h2>
        <i class="fas fa-car-crash icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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

    <div class='contenedor_6 borde_1' id="Material_Medico_Quirurgico">
        <h2 class='h2_1'>MATERIAL MÉDICO QUIRURGICO</h2>
        <i class="fas fa-hospital icono_2"></i>              
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
    
    <div class='contenedor_6 borde_1' id="Caramelos">
        <h2 class='h2_1'>CHOCOLATES Y CARAMELOS</h2>
        <i class="fas fa-candy-cane icono_2"></i>               
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
                        if($arr['ID_Categoria'] == 21){  
                            $CantidadCaramelos = $arr['cantidad']; 
                            echo $CantidadCaramelos;  ?>
                            <style>
                                #Caramelos .span_21{
                                    background-color: var(--Aciertos);
                                }
                            </style>
                            <?php
                        }
                    endforeach; 
                    if(empty($CantidadCaramelos)){                                     
                        echo 0;?>
                        <style>
                            #Caramelos{
                                position: relative;
                                z-index: -1;           
                            }
                            #Caramelos .span_21{
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
        <h2 class='h2_1'>MERCERÍA Y TALABARTERÍA</h2>
        <i class="fas fa-hat-cowboy-side icono_2"></i>               
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <i class="fas fa-carrot icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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

    <div class='contenedor_6 borde_1' id="Minimarket">
        <h2 class='h2_1'>MINIMARKET</h2>
        <i class="fas fa-shopping-basket icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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

    <div class='contenedor_6 borde_1' id="Ropa_Zapato">
        <h2 class='h2_1'>ROPA Y ZAPATO</h2>
        <i class="fas fa-tshirt icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <i class="fas fa-medkit icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <i class="fas fa-screwdriver icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <h2 class='h2_1'>PANADERÍA Y PASTELERÍA</h2>
        <i class="fas fa-birthday-cake icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <i class="fas fa-wine-bottle icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <i class="fas fa-gem icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <i class="fas fa-biking icono_2"></i>                
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <i class="fas fa-leaf icono_2"></i>               
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <i class="fas fa-hard-hat icono_2"></i>               
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <i class="fas fa-mobile-alt icono_2"></i>                 
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
        <i class="fas fa-paperclip icono_2"></i>                 
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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

    <div class='contenedor_6 borde_1' id="Libros">
        <h2 class='h2_1'>LIBRERÍAS Y MÚSICA</h2>
            <i class="fas fa-book icono_2"></i>
        <div class="contenedor_106">
            <span class="span_21 borde_1">
                <?php
                    foreach($Datos['cantidadTiendasCategoria'] as $arr) :
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
                            #Libros{
                                position: relative;
                                z-index: -1;           
                            }
                            #Libros .span_21{
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

<script src="<?php echo RUTA_URL.'/public/javascript/E_Categorias.js?v=' . rand();?>"></script>
<script src="<?php echo RUTA_URL.'/public/javascript/funcionesVarias.js?v=' . rand();?>"></script>
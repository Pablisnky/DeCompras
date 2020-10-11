<?php include(RUTA_APP . '/vistas/inc/header_inicio.php');  ?>

    <section class="section_1" id="Section_1">
        <div class="contenedor_37"  id="Contenedor_37">
            <h1 class="h1_2">PedidoRemoto</h1>
            <!-- <h2 class="h2_4">solicitudes desde casa</h2> -->
            <h2 class="h2_4">MarketPlace</h2>
        </div>
        <h3 class="h3_2" id="H3_3">Tu tienda en toda la ciudad</h3>
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
        </div>
        <div class="contenedor_88" id="Contenedor_88">
            <label class="a_2" id="Tiendas">Tiendas</label>
        </div>
    </section>
    <section id="Section_2js">
        <div class='contenedor_4'>
            <div class='contenedor_6 borde_1' id="Contenedor_6a">
                <h2 class='h2_1'>COMIDA RAPIDA Y RESTAURANTS</h2>
                <span class="icon-spoon-knife span_8"></span>                  
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
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

            <div class='contenedor_6 borde_1' id="Contenedor_6m">
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

            <div class='contenedor_6 borde_1' id="Contenedor_6r">
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

            <div class='contenedor_6 borde_1' id="Contenedor_6b">
                <h2 class='h2_1'>BODEGAS Y SUPERMERCADOS</h2>
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

            <div class='contenedor_6 borde_1' id="Contenedor_6c">
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

            <div class='contenedor_6 borde_1' id="Contenedor_6c">
                <h2 class='h2_1'>ROPA Y ZAPATO</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6d">
                <h2 class='h2_1'>ARTESANOS Y EMPRENDEDORES</h2>
                <span class="icon-pen span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6f">
                <h2 class='h2_1'>FARMACIA Y SALUD</h2>
                <span class="icon-aid-kit span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6g">
                <h2 class='h2_1'>FERRETRÍA Y HOGAR</h2>
                <span class="icon-hammer span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6h">
                <h2 class='h2_1'>PANADERÍA</h2>
                <span class="icon-spoon-knife span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div> 

            <div class='contenedor_6 borde_1' id="Contenedor_6i">
                <h2 class='h2_1'>LICORES</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6j">
                <h2 class='h2_1'>JOYAS Y RELOJERÍA</h2>
                <span class="icon-barcode span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6k">
                <h2 class='h2_1'>DEPORTES</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6l">
                <h2 class='h2_1'>FLORISTERÍA Y DECORACIÓN</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6n">
                <h2 class='h2_1'>CONSTRUCCIÓN</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6o">
                <h2 class='h2_1'>TELEFONOS Y COMPUTADORAS</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6p">
                <h2 class='h2_1'>PAPELERÍA Y OFICINA</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
                                }
                            endforeach 
                        ?>
                    </span>
                </div>
            </div>

            <div class='contenedor_6 borde_1' id="Contenedor_6q">
                <h2 class='h2_1'>JUGUETES Y ACCESORIOS PARA NIÑOS</h2>
                <span class="icon-man-woman span_8"></span>                 
                <div class="contenedor_106">
                    <span class="span_21 borde_1">
                        <?php
                            foreach($Datos as $arr) :
                                if($arr['ID_Categoria'] == 0){  
                                    $Cantidad = $arr['cantidad']; 
                                    echo $Cantidad;
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

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Inicio.js';?>"></script>
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Inicio.js';?>"></script>

<?php require(RUTA_APP . '/vistas/inc/footer.php');  ?>
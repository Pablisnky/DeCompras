<?php 
    // session_start();

    $ID_Tienda = $_SESSION["ID_Tienda"];
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php");


    //se invoca la sesion que tiene el ID_Afiliado creada en validarSesion.php
    // $ID_Afiliado= $_SESSION["ID_Afiliado"];
//     echo $ID_Afiliado . "<br>";

    //Se llama la sesion  el Nombre creada en Login_C.php
    // $nombre= $_SESSION["Nombre"];

    foreach($Datos['datosResposable'] as $row){
        $Nombre_AfiCom =  $row['nombre_AfiCom'];
        $Apellido_AfiCom = $row['apellido_AfiCom']; 
        $Cedula_AfiCom = $row['cedula_AfiCom'];
        $Telefono_AfiCom = $row['telefono_AfiCom'];
        $Correo_AfiCom = $row['correo_AfiCom'];
    }

    foreach($Datos['datosTienda'] as $row){
        $Nombre_Tien =  $row['nombre_Tien'];
        $Direccion_Tien = $row['direccion_Tien']; 
        $Telefono_Tien = $row['telefono_Tien'];
        $Rif_Tien = $row['rif_Tien'];
    }
    
?>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/flechaAbajo/style_flechaAbajo.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/eliminar/style_eliminar.css"/>
    <!-- Se coloca en SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    
    <div class="contenedor_42">    
        <p class="p_6">Configurar cuenta</p>
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeRegistroEditado" method="POST" enctype="multipart/form-data" autocomplete="off">
            <a id="marcador_01" class="ancla_2"></a>
            <fieldset class="fieldset_1">
                <legend class="legend_1">Persona responsable</legend>
                <div class="contenedor_9">
                    <img class="imagen_2" alt="Fotografia del usuario" src="../images/Perfil.jpg"/>
                    <label class="boton" for="File_1">Buscar foto perfil</label>
                    <input class="input_3" id="File_1" type="file"/>
                </div>
                <label>Nombre responsable tienda</label>
                <input class="input_9 borde_2" type="text" name="nombre_Afcom" id="Nombre" value="<?php echo $Nombre_AfiCom;?>" autocomplete="off">
                <label>Apellido responsable tienda</label>
                <input class="input_9 borde_2" type="text" name="apellido_Afcom" id="Apellido"  value="<?php echo $Apellido_AfiCom;?>" autocomplete="off">
                <label>Cedula responsable tienda</label>
                <input class="input_9 borde_2" type="text" name="cedula_Afcom" id="Cedula"  value="<?php echo $Cedula_AfiCom;?>" autocomplete="off">
                <label>Telefono responsable tienda</label>
                <input class="input_9 borde_2" type="text" name="telefono_Afcom" id="Telefono"  value="<?php echo $Telefono_AfiCom;?>" autocomplete="off">
                <label>Correo responsable tienda</label>
                <input class="input_9 borde_2" type="text" name="correo_Afcom" id="Correo" value="<?php echo $Correo_AfiCom;?>" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200)" onclick="ColorearCorreo()" autocomplete="off">
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
            </fieldset>
            <a id="marcador_02" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2" id="Fieldset">
                <legend class="legend_1">Datos de tienda</legend>
                <label>Nombre tienda</label>
                <input class="input_9 borde_2" type="text" name="nombre_com" id="Nombre" value="<?php echo $Nombre_Tien;?>" autocomplete="off">
                <label>Telefono tienda</label>
                <input class="input_9 borde_2" type="text" name="telefono_com" id="Telefono" value="<?php echo $Direccion_Tien;?>" autocomplete="off">
                <label>Dirección tienda</label>
                <input class="input_9 borde_2" type="text" name="direccion_com" id="Direccion" value="<?php echo $Telefono_Tien;?>"  autocomplete="off">
                <label>RIF tienda</label>
                <input class="input_9 borde_2" type="text" name="rif_com" value="<?php echo $Rif_Tien;?>"  autocomplete="off">
                <div class="contenedor_80 contenedor_81" id="Label_13">
                    <label class="label_16">Categoria</label>
                    <span class="icon-circle-down span_10"></span>
                </div>
                <?php
                foreach($Datos['categoria'] as $row){
                    $Categoria =  $row['categoria'];
                    ?>
                    <input class="input_9 borde_2 imput_6js" id="Imput_6js" type="text" name="categoria[]" value="<?php echo $Categoria;?>" readonly="readonly" autocomplete="off">
                    <?php
                }  ?>
            </fieldset>
            <!-- <a id="marcador_03" class="ancla_2"></a>
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
                    <!-- div alimentado via Ajax desde horarios_V.php 
                    <div id="Mostrar_horarios"></div>
                </div>
            </fieldset> -->

            <a id="marcador_04" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Secciones</legend>
                <div id="Contenedor_79">
                    <p class="p_12">Organiza tú tienda en secciones, añade tantas como consideres necesario para que tus productos esten bien acomodados en el mostrador. <span class="span_13" id="Span_1">Ver sugerencias:</span></p>
                    <label>Sección</label>
                    <?php                    
                    foreach($Datos['secciones'] as $row){
                        $Seccion_Tien = $row['seccion'];
                            ?>
                        <div id="Contenedor_80" class="contenedor_80js">
                            <input class="input_9 input_12 borde_2" type="text" name="seccion[]" value="<?php echo $Seccion_Tien;?>"/>
                            <span class="icon-cancel-circle span_10 span_12" id="Span_4"></span>
                        </div>
                        <?php
                    }   ?>
                </div>
                <label class="label_4" id="Label_5">Añadir sección</label>
            </fieldset>

            <a id="marcador_05" class="ancla_2"></a>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Cuentas bancarias</legend>
                <div id="Contenedor_69">
                    <span>Los pagos de los pedidos realizados se depositan directamente a tus cuentas bancarias, agrega todas las que tengas disponibles para que los usuarios tengan opciones, los pedidos pagados en cuentas de otros bancos causan una demora de 24 hrs en el despacho del pedido para que verifiques la transferencia.</span>
                    <div class="contenedor_67 borde_2" id="Contenedor_67">
                        <span class="icon-cancel-circle span_10 span_14 span_12" id="Span_3"></span>
                        <input class="input_9 input_9JS borde_2" type="text" name="banco[]" id="Banco" placeholder="Banco" autocomplete="off">
                        <input class="input_9 input_9JS borde_2" type="text" name="titular[]" id="Titular de la cuenta" placeholder="Titular"  autocomplete="off">
                        <input class="input_9 input_9JS borde_2" type="text" name="numeroCuenta[]" id="NumeroCuenta" placeholder="Numero de cuenta" autocomplete="off">
                        <input class="input_9 input_9JS borde_2" type="text" name="rif[]" id="Rif" placeholder="RIF"  autocomplete="off">
                    </div> 
                </div>
                    <?php
                     foreach($Datos['datosBancos'] as $row){
                        $BancoNombre =  $row['bancoNombre'];
                        $BancoCuenta = $row['bancoCuenta']; 
                        $BancoTitular = $row['bancoTitular'];
                        $BancoRif = $row['bancoRif'];
                        $ID_Banco = $row['ID_Banco'];
                        ?>
                        <div class="contenedor_67" id="Contenedor_67">
                            <label class="label_13">Banco</label>
                            <input class="input_9 input_9JS borde_2" type="text" name="banco[]" id="Banco" value="<?php echo $BancoNombre;?>" autocomplete="off"/>
                            <label class="label_13">Titular</label>
                            <input class="input_9 input_9JS borde_2" type="text" name="titular[]" id="Titular de la cuenta" value="<?php echo $BancoTitular;?>"  autocomplete="off"/>
                            <label class="label_13">Número cuenta</label>
                            <input class="input_9 input_9JS borde_2" type="text" name="numeroCuenta[]" id="NumeroCuenta" value="<?php echo $BancoCuenta;?>" autocomplete="off"/>
                            <label class="label_13">RIF</label>
                            <input class="input_9 input_9JS borde_2" type="text" name="rif[]" id="Rif"  value="<?php echo $BancoRif;?>" autocomplete="off">
                            <input class="input_3" type="text" name="id_banco[]" value="<?php echo $ID_Banco;?>">
                        </div>
                        <?php
                     }  ?>
                <label class="label_4" id="Label_4">Añadir cuenta bancaria</label>
            </fieldset>   
            <div class="contenedor_49">
                <input class="input_3" type="text" name="ID_Tienda" value="<?php echo $ID_Tienda;?>">
                <input class="boton " type="submit" value="Guardar"/>
            </div>
        </form>
        <!-- <div class="contenedor_83 borde_2">
            <a class="marcador" href="#marcador_01">Persona responsable</a>
            <a class="marcador" href="#marcador_02">Datos de tienda</a>
            <a class="marcador" href="#marcador_03">Horario</a>
            <a class="marcador" href="#marcador_04">Secciones</a>
            <a class="marcador" href="#marcador_05">Cuentas bancarias</a>
        </div> -->
        <input type="checkbox"  id="Bienvenida">
        <label for="Bienvenida">Desactivar página de bienvenida</label>
    </div>

    <!--div alimentado via Ajax por medio de la funcion () -->
    <div id="Mostrar_Categorias"></div>

    <!--div que se muestra mediante mostrarSecciones() en este mismo archivo-->
<section class="section_3 section_7 section_9" id="Ejemplo_Secciones">
    <div class="contenedor_24 contenedor_84">
        <p class="p_6 p_9">Sugerencia de secciones según el tipo de tienda</p>
        <p class="p_9">Verifica si tu tienda encaja en una de las sugerencias, y toma las secciones que creas conveniente. Tambien puedes agregas secciones según tu conveniencia</p>
        <div style="background-color: yellow;">
            <label class="label_4">Supermercados y bodegas</label>
            <ul class="ul_2">
                <li>Viveres</li>
                <li>Desinfectante</li>
                <li>Verduras</li>
                <li>Aseo personal</li>
                <li>Cereales</li>
                <li>Enlatados</li>
                <li>...</li>
            </ul>
        </div>
        <div style="background-color: blue; ">
            <label class="label_4">Venta de Comida rapida</label>
            <ul class="ul_2">
                <li>Hamburguesas</li>
                <li>Perros caliente</li>
                <li>Empanadas</li>
                <li>Jugos</li>
                <li>Refrescos</li>
                <li>Pizzas</li>
                <li>Helados</li>
                <li>...</li>
            </ul>
        </div>
        <div>
            <label class="label_4">Venta de repuesto automotriz</label>
            <ul class="ul_2">
                <li>Tren delantero</li>
                <li>Sistema de freno</li>
                <li>Partes electricas</li>
                <li>Arranque</li>
                <li>Gomas y suspención</li>
                <li>...</li>
            </ul>
        </div>
        <div>
            <label class="label_4">Venta de Material médico quirurgico</label>
            <ul class="ul_2">
                <li>Stent</li>
                <li>Inyectadoras</li>
                <li>Termometros</li>
                <li></li>
                <li></li>
                <li>...</li>
            </ul>
        </div>
        <div class="contenedor_87">
            <label class="boton boton_4" id="Label_1">Cerrar</label>
        </div>
    </div>
</section>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar.js';?>"></script> 

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
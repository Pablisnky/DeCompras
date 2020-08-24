<?php 
    // session_start();

    $ID_Tienda = $_SESSION["ID_Tienda"];
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php");


    //se invoca la sesion que tiene el ID_Afiliado creada en validarSesion.php
    // $ID_Afiliado= $_SESSION["ID_Afiliado"];
//     echo $ID_Afiliado . "<br>";

    //Se llama la sesion  el Nombre creada en Login_C.php
    // $nombre= $_SESSION["Nombre"];
?>
    <!-- Se coloca en SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    
	<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
    
    <div class="contenedor_42">    
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeProducto" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="contenedor_47">
                <div class="contenedor_9 borde_2">
                    <!-- <img class="imagen_2" alt="Fotografia del usuario" src="../images/Perfil.jpg"/> -->
                    <span class="icon-image span_9"></span>
                    <br>
                    <label class="boton" for="File_1">Buscar imagen</label>
                    <input class="input_3" id="File_1"  type="file"/>
                </div>
                <div class="contenedor_82">
                    <label class="">Seccion</label>
                    <!-- Select alimentado desde Select_Ajax_V.php con las secciones que el uausrio cargó en su cuenta -->
                    <select class="select_1 borde_2" id="Select_2" onclick="Llamar_seccion()">
                        <option></option>
                    </select>          
                    <div id="Borrar"></div>          
                    <label class="">Producto</label>
                    <input class="input_9 input_10 borde_2" type="text" name="producto">

                    <label class="">Descripcion</label>
                    <textarea class="textarea_1 borde_2" name="descripcion"></textarea>

                    <label class="">Precio</label>
                    <input class="input_9 input_10 borde_2" type="text" name="precio"/>
                </div>
            </div>
            <div class="contenedor_49">
                <input class="input_3" type="text" name="id_tienda" value="<?php echo $ID_Tienda;?>">
                <input class="boton " type="submit" value="Guardar"/>
            </div>
        </form>
        <div id="Borrar"></div>
    </div>

            <!-- <p>Pablo, no haz clasificado tu tienda en alguna categoria, ve a configurar y añade una o hasta tres categorias, tambien debes generar las secciones donde se organizaras los productos que cargues al mostrador.</p> -->
    <?php 
    if(empty($Datos['secciones'])){  ?>
        <section class="section_3"  id="Ejemplo_Secciones">
            <div class="contenedor_24">
                    <p>Pablo, no tienes secciones donde colocar los producto, ve a configuración y añade secciones donde organizar tus productos</p>
                <div class="contenedor_87">
                    <label class="boton boton_4" id="Label_1">Cerrar</label>
                </div>
            </div>
        </section>  <?php
    }   ?>

	<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
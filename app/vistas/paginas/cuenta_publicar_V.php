<?php 
    $ID_Tienda = $_SESSION["ID_Tienda"];
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php");

    //Sesion creada en Cuenta_C/Publicar
    $Seccion = $_SESSION['Seccion'];

    if(!empty($Seccion)){
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
            <p class="p_6">Carga un producto</p>
            <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeProducto" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="contenedor_47">
                    <div class="contenedor_9 borde_2">
                        <!-- <img class="imagen_2" alt="Fotografia del usuario" src="../images/Perfil.jpg"/> -->
                        <label for="File_1"><span class="icon-image span_9"></span></label>
                        <input class="ocultar" id="File_1" type="file"/>
                    </div>
                    <div style="margin-top:5%">
                        <input class="input_13 borde_2" type="text" name="producto"  id="ContenidoPro" placeholder="Producto"/>
                        <input class="contador" type="text" id="ContadorPro" value="30"/>

                        <input class="input_13 borde_2" type="text" name="descripcion" id="ContenidoDes" placeholder="Descripcion"/>
                        <input class="contador" type="text" id="ContadorDes" value="50"/>

                        <input class="input_13 borde_2" type="text" name="precio" placeholder="Precio (Solo números)"/>
                        <input class="contador" type="text" id="ContadorPre" value="13"/>

                        <input class="input_13 borde_2" type="text" name="seccion" id="Seccion" placeholder="Sección" onclick="Llamar_seccion()">
                    </div>
                </div>
                <div class="contenedor_49">
                    <input class="ocultar" type="text" name="id_tienda" value="<?php echo $ID_Tienda;?>">
                    <input class="boton " type="submit" value="Guardar"/>
                </div>
            </form>
        </div>

                <!-- <p>Pablo, no haz clasificado tu tienda en alguna categoria, ve a configurar y añade una o hasta tres categorias, tambien debes generar las secciones donde se organizaras los productos que cargues al mostrador.</p> -->
        <?php
    } 
    else{    ?>
        <section class="section_3"  id="Ejemplo_Secciones">
            <div class="contenedor_24">
                    <p>Pablo, no tienes secciones donde colocar los producto, ve a configuración y añade secciones donde organizar tus productos</p>
                <div class="contenedor_87">
                    <label class="boton boton_4" id="Label_1" onclick="CerrarModal_X('Ejemplo_Secciones')">Cerrar</label>
                </div>
            </div>
        </section>  <?php
    }   ?>

<!-- div alimentado desde Secciones_Ajax_V.php con las secciones que el usuario cargó en su cuenta  -->    
<section>  
    <div id="Contenedor_80"></div>
</section> 

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_publicar.js';?>"></script> 
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_publicar.js';?>"></script> 


<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
<?php 
    $ID_Tienda = $_SESSION["ID_Tienda"];
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php");

    //$Datos viene del metodo actualizarProducto() en Cuenta_C
    foreach($Datos as $arr) :
        $ID_Producto = $arr["ID_Producto"];
        $ID_Opcion = $arr["ID_Opcion"];
        $Producto = $arr["producto"];
        $Opcion = $arr["opcion"];
        $Precio = $arr["precio"];
        $Seccion = $arr["seccion"];
    endforeach;
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
            <p class="p_6">Actualizar datos de producto</p>
            <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeAtualizarProducto" method="POST" enctype="multipart/form-data" autocomplete="off">
                <div class="contenedor_47">
                    <div class="contenedor_9 borde_2">
                        <!-- <img class="imagen_2" alt="Fotografia del usuario" src="../images/Perfil.jpg"/> -->
                        <label for="File_1"><span class="icon-image span_9"></span></label>
                        <input class="input_3" id="File_1" type="file"/>
                    </div>
                    <div style="margin-top:5%">
                        <label>Producto</label>
                        <input class="input_13 borde_2" type="text" name="producto" value="<?php echo $Producto;?>"/>
                        <input class="contador" type="text" id="ContadorPro" value="30"/>

                        <label>Descripcion</label>
                        <input class="input_13 borde_2" type="text" name="descripcion" value="<?php echo $Opcion;?>"/>
                        <input class="contador" type="text" id="ContadorDes" value="50"/>

                        <label>Precio</label>
                        <input class="input_13 borde_2" type="text" name="precio" value="<?php echo $Precio;?>"/>
                        <input class="contador" type="text" id="ContadorPre" value="13"/>

                        <label>Sección</label>
                        <input class="input_13 borde_2" type="text" name="seccion" value="<?php echo $Seccion;?>" onclick="Llamar_seccion()">
                        <!-- div alimentado desde Secciones_Ajax_V.php con las secciones que el usuario cargó en su cuenta  -->       
                        <div id="Contenedor_80"></div>
                    </div>
                </div>
                <div class="contenedor_49">
                    <input class="input_3" type="text" name="id_producto" value="<?php echo $ID_Producto;?>">
                    <input class="input_3" type="text" name="id_opcion" value="<?php echo $ID_Opcion;?>">
                    <input class="boton " type="submit" value="Guardar"/>
                </div>
            </form>
        </div>

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
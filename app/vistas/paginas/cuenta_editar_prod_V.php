<?php 
    //se invoca la sesion que tiene el ID_Afiliado creada en validarSesion.php
    // $ID_Afiliado= $_SESSION["ID_Afiliado"];
    //     echo $ID_Afiliado . "<br>";

    //Se llama la sesion  el Nombre creada en Login_C.php
    // $nombre= $_SESSION["Nombre"];

    $ID_Tienda = $_SESSION["ID_Tienda"];
    require(RUTA_APP . "/vistas/inc/header_AfiCom.php");

    //$Datos viene del metodo actualizarProducto() en Cuenta_C
    foreach($Datos as $arr) :
        $ID_Producto = $arr['ID_Producto'];
        $ID_Opcion = $arr['ID_Opcion'];
        $Producto = $arr['producto'];
        $Opcion = $arr['opcion'];
        $Precio = $arr['precio'];
        $Seccion = $arr['seccion'];
        $Fotografia = $arr['fotografia'];
    endforeach;     ?>
    
    <!-- Se coloca el SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
    <link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/fotoProduc/style_fotoProduct.css"/>
        
    <div class="contenedor_42">    
        <p class="p_6">Actualizar datos de producto</p>
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeAtualizarProducto" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="contenedor_47">
                <div class="contenedor_9 borde_2">
                    <label for="imgInp">
                        <img class="imagen_2" id="blah" alt="Fotografia del producto" src="http://localhost/proyectos/PidoRapido/public/images/productos/<?php echo $Fotografia;?>"/>
                    </label>
                    <input class="ocultar" name="imagen_EditarProducto" id="imgInp" type="file"/>
                </div>
                <div>
                    <label>Producto</label>
                    <input class="placeholder placeholder_2 borde_2" type="text" name="producto" value="<?php echo $Producto;?>"/>
                    <input class="contador" type="text" id="ContadorPro" value="30"/>

                    <label>Descripcion</label>
                    <input class="placeholder placeholder_2 borde_2" type="text" name="descripcion" value="<?php echo $Opcion;?>"/>
                    <input class="contador" type="text" id="ContadorDes" value="50"/>

                    <label>Precio</label>
                    <input class="placeholder placeholder_2 borde_2" type="text" name="precio" value="<?php echo $Precio;?>"/>
                    <input class="contador" type="text" id="ContadorPre" value="13"/>

                    <label>Sección</label>
                    <input class="placeholder placeholder_2 borde_2" type="text" name="seccion" value="<?php echo $Seccion;?>" onclick="Llamar_seccion()">
                    <!-- div alimentado desde Secciones_Ajax_V.php con las secciones que el usuario cargó en su cuenta  -->       
                    <div id="Contenedor_80"></div>
                </div>
            </div>
            <div class="contenedor_49">
                <input class="ocultar" type="text" name="id_producto" value="<?php echo $ID_Producto;?>">
                <input class="ocultar" type="text" name="id_opcion" value="<?php echo $ID_Opcion;?>">
                <input class="boton " type="submit" value="Guardar"/>
            </div> 
        </form>
    </div>

    <script> 
        //Da una vista previa de la fotografia antes de guardarla en la BD usada en cuenta_editar_prod_V.php
        function readImage(input){
        console.log("______Desde readImage()______")
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#blah').attr('src', e.target.result); // Renderizamos la imagen
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function(){
            // Código a ejecutar cuando se detecta un cambio de archivo
            readImage(this);
        });
    </script>

<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
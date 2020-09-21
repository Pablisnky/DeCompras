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
        $ID_Seccion = $arr['ID_Seccion'];
        $ID_SP = $arr['ID_SP'];
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
                <div class="contenedor_97 borde_1 borde_1 borde_2">
                    <label for="imgInp">
                        <img class="imagen_6 imagen_9" id="blah" alt="Fotografia del producto" src="http://localhost/proyectos/PidoRapido/public/images/productos/<?php echo $Fotografia;?>"/>
                    </label>
                    <input class="ocultar" name="imagen_EditarProducto" id="imgInp" type="file"/>
                </div>
                <div class="contenedor_114">
                    <label>Producto</label>
                    <input class="placeholder placeholder_2 borde_1" type="text" name="producto" id="ContenidoPro" value="<?php echo $Producto;?>"/>
                    <input class="contador" type="text" id="ContadorPro" value="20"/>

                    <label>Descripcion</label>
                    <input class="placeholder placeholder_2 borde_1" type="text" name="descripcion" id="ContenidoDes" value="<?php echo $Opcion;?>"/>
                    <input class="contador" type="text" id="ContadorDes" value="20"/>

                    <label>Especificacion</label>
                    <input class="placeholder placeholder_2 borde_1" type="text" name="especificacion" id="ContenidoEsp" placeholder="Especificaciones ( Opcional )"/>
                    <input class="contador" type="text" id="ContadorEsp" value="50"/>

                    <label>Precio</label>
                    <input class="placeholder placeholder_2 borde_1" type="text" name="precio" value="<?php echo $Precio;?>"/>
                    <input class="contador" type="text" id="ContadorPre" value="13"/>

                    <label>Sección</label>
                    <input class="placeholder placeholder_2 borde_1" type="text" name="seccion"  id="Seccion" value="<?php echo $Seccion;?>" onclick="Llamar_seccion('<?php echo $ID_Producto?>')">
                    <!-- div alimentado desde Secciones_Ajax_V.php con las secciones que el usuario cargó en su cuenta  -->       
                    <div id="Contenedor_80"></div>
                </div>
            </div>
            <div class="contenedor_49">
                <input class="ocultar" type="text" name="id_producto" value="<?php echo $ID_Producto;?>">
                <input class="ocultar" type="text" name="id_opcion" value="<?php echo $ID_Opcion;?>">
                <input class="ocultar" type="text" name="id_seccion" id="ID_Seccion" value="<?php echo $ID_Seccion;?>"/>
                <input class="ocultar" type="text" name="id_sp" value="<?php echo $ID_SP;?>"/>
                <input class="boton" type="submit" id="Submit" value="Guardar"/>
            </div> 
        </form>
    </div>

<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Cuenta_editar_prod.js';?>"></script> 
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/A_Cuenta_editar_prod.js';?>"></script> 

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
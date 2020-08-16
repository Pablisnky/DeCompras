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
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeRegistro" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="contenedor_47">
                <div class="contenedor_9 borde_2">
                    <!-- <img class="imagen_2" alt="Fotografia del usuario" src="../images/Perfil.jpg"/> -->
                    <span class="icon-image span_9"></span>
                    <br>
                    <label class="boton" for="File_1">Buscar imagen</label>
                    <input class="input_3" id="File_1"  type="file"/>
                </div>
                <div>
                    <label class="etiqueta_1">Categoria</label>
                    <select class="select_1 borde_2" name="categoria_pro" id="Categoria_pro">
                        <option></option>
                        <?php
                        foreach($Datos['categorias']  as $row){
                            $Categorias = $row['categoria']; ?>
                            <option><?php echo $Categorias;?></option>
                            <?php
                        }   ?>
                    </select>
                    
                    <label class="etiqueta_1">Producto</label>
                    <select class="select_1 borde_2" name="producto" id="Producto">
                        <option></option>          
                    </select>

                    <label class="etiqueta_1">Descripcion</label>
                    <!-- Select alimentado via Ajax por Select_Ajax_V.php -->
                    <select class="select_1 borde_2" name="descripcion_pro" id="Descripcion_pro">
                        <option></option>          
                    </select>

                    <label class="etiqueta_1">Precio</label>
                    <input class="input_9 borde_2" type="text"  name="precio"/>
                </div>
            </div>
            <div class="contenedor_49">
                <input class="input_3" type="text" name="ID_Tienda" value="<?php echo $ID_Tienda;?>">
                <input class="boton " type="submit" value="Guardar"/>
            </div>
        </form>
    </div>
    <footer>
	    <?php include(RUTA_APP . "/vistas/inc/footer.php");?>
    </footer>
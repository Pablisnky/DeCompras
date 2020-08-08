<?php 
    session_start();

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
    
    <div class="contenedor_46">    
        <form action="<?php echo RUTA_URL; ?>/Publicacion_C/recibeRegistro" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="contenedor_47">
                <div class="contenedor_48">
                    <label>Imagen</label>
                    <input type="file"/>
                </div>
                <div>
                    <label class="etiqueta_1">Categoria</label>
                    <select class="select_1" name="categoria_pro" id="Categoria_pro" onchange="Llamar_BuscarOpciones()">
                        <option></option>
                        <?php
                        foreach($Datos as $row){
                            $Categorias = $row['producto']; ?>
                            <option><?php echo $Categorias;?></option>
                            <?php
                        }   ?>
                    </select>
                    <label class="etiqueta_1">Descripcion</label>
                    <!-- Select alimentado via Ajax por Select_Ajax_V.php -->
                    <select class="select_1" name="descripcion_pro" id="Descripcion_pro">
                        <option></option>          
                    </select>

                    <label class="etiqueta_1">Precio</label>
                    <input class="input_9" type="text"  name="precio"/>
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
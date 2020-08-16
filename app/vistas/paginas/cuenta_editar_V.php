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
        $Categoria_Tien = $row['categoria_Tien'];
    }
?>
    <!-- Se coloca en SDN para la libreria JQuery, necesaria para la previsualización de la imagen--> 
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    
    <div class="contenedor_42">    
        <form action="<?php echo RUTA_URL; ?>/Cuenta_C/recibeRegistro" method="POST" enctype="multipart/form-data" autocomplete="off">
            <fieldset class="fieldset_1 ">
                <legend class="legend_1">Persona responsable</legend>
                <div class="contenedor_9">
                    <img class="imagen_2" alt="Fotografia del usuario" src="../images/Perfil.jpg"/>
                    <label class="boton" for="File_1">Buscar foto perfil</label>
                    <input class="input_3" id="File_1" type="file"/>
                </div>
                <label class="label_13">Nombre responsable tienda</label>
                <input class="input_9 borde_2" type="text" name="nombre_Afcom" id="Nombre" value="<?php echo $Nombre_AfiCom;?>" autocomplete="off">
                <label class="label_13">Apellido responsable tienda</label>
                <input class="input_9 borde_2" type="text" name="apellido_Afcom" id="Apellido"  value="<?php echo $Apellido_AfiCom;?>" autocomplete="off">
                <label class="label_13">Cedula responsable tienda</label>
                <input class="input_9 borde_2" type="text" name="cedula_Afcom" id="Cedula"  value="<?php echo $Cedula_AfiCom;?>" autocomplete="off">
                <label class="label_13">Telefono responsable tienda</label>
                <input class="input_9 borde_2" type="text" name="telefono_Afcom" id="Telefono"  value="<?php echo $Telefono_AfiCom;?>" autocomplete="off">
                <label class="label_13">Correo responsable tienda</label>
                <input class="input_9 borde_2" type="text" name="correo_Afcom" id="Correo" value="<?php echo $Correo_AfiCom;?>" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200)" onclick="ColorearCorreo()" autocomplete="off">
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
            </fieldset>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos de tienda</legend>
                <label class="label_13">Nombre tienda</label>
                <input class="input_9 borde_2" type="text" name="nombre_com" id="Nombre"  value="<?php echo $Nombre_Tien;?>" autocomplete="off">
                <label class="label_13">Telefono tienda</label>
                <input class="input_9 borde_2" type="text" name="telefono_com" id="Telefono"  value="<?php echo $Direccion_Tien;?>" autocomplete="off">
                <label class="label_13">Dirección tienda</label>
                <input class="input_9 borde_2" type="text" name="direccion_com" id="Direccion"  value="<?php echo $Telefono_Tien;?>"  autocomplete="off">
                <label class="label_13">Horario tienda</label>
                <input class="input_9 borde_2" type="text" name="horario_com" id="Horario"  value="" autocomplete="off">
                <label class="label_13">Seleccione máximo tres categoria:</label>
                <label class="boton boton_5" id="Label_13js">Seleccionar</label>
            </fieldset>
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Cuentas bancarias</legend>
                <span>Los pagos de los pedidos realizados se depositan directamente a tus cuentas bancarias, agrega todas las que tengas disponibles para que los usuarios tengan opciones, los pedidos pagados en cuentas de otros bancos causan una demora de 24 hrs en el despacho del pedido para que verifiques la transferencia.</span>
                    <?php
                     foreach($Datos['datosBancos'] as $row){
                        $BancoNombre =  $row['bancoNombre'];
                        $BancoCuenta = $row['bancoCuenta']; 
                        $BancoTitular = $row['bancoTitular'];
                        $BancoRif = $row['bancoRif'];
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
    </div>


    <!--DIV alimentado via Ajax -->
    <div id="Mostrar_Categorias"></div>

    <footer>
	    <?php include(RUTA_APP . "/vistas/inc/footer.php");?>
    </footer>
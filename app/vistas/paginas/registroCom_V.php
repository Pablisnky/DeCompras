<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$verifica = 1906;  
    $_SESSION["verifica"] = $verifica; 
    
    require(RUTA_APP . "/vistas/inc/header.php");
?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/flechaAbajo/style_flechaAbajo.css"/>		

<section class="section_5" id="Section_5">
    <div class="contenedor_42">
        <h1 class="h1_1">Afiliación como comerciante</h1>
        <form action="../Registro_C/recibeRegistro" method="POST" name="registroGratis" onsubmit="return validar_01()">
            <fieldset class="fieldset_1">
                <legend class="legend_1">Registro de tienda</legend> 
                <input class="input_9 borde_2" type="text" name="nombre_Afcom" id="Nombre" placeholder="Nombre del encargado" autocomplete="off"> 
                <input class="input_9 borde_2" type="text" name="correo_Afcom" id="Correo" placeholder="Correo electronico" onchange="validarFormatoCorreo(); setTimeout(llamar_verificaCorreo,200)" onclick="ColorearCorreo()" autocomplete="off">
                <div class="contenedor_43" id="Mostrar_verificaCorreo"></div>
                <input class="input_9 borde_2" type="text" name="nombre_com" id="Nombre" placeholder="Nombre tienda" autocomplete="off">
                </fieldset>      
            <!--<fieldset class="fieldset_1 fieldset_2" id="Fieldset">
                <legend class="legend_1">Datos establecimiento comercial</legend>
                <input class="input_9 borde_2" type="text" name="telefono_com" id="Telefono" placeholder="Telefono" autocomplete="off">
                <input class="input_9 borde_2" type="text" name="direccion_com" id="Direccion" placeholder="Direccion"  autocomplete="off">
                <input class="input_9 borde_2" type="text" name="rif_com" id="Rif" placeholder="Rif"  autocomplete="off">
                <div class="contenedor_80 borde_2" id="Label_13">
                    <label class="label_15">Categoria</label>
                    <span class="icon-circle-down span_11"></span>
                </div>
                <!-- El input que tiene las categorias es creado desde javascript por medio de transferirCategoria() en funcionesVarias.js
                
            </fieldset>   -->
            <!-- <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos cuentas bancarias</legend> 
                <div id="Contenedor_69">
                    <span>Los pagos de los pedidos realizados se depositan directamente a tus cuentas bancarias, agrega todas las que tengas disponibles para que los usuarios tengan opciones, los pedidos pagados en cuentas de otros bancos causan una demora de 24 hrs en el despacho del pedido para que verifiques la transferencia.</span>
                    <!-- Las cuentas bancarias son añadidas desde E_RegistroCom.js -->
                    <!-- <div class="contenedor_67" id="Contenedor_67">
                        <input class="input_9 input_9JS borde_2" type="text" name="banco[]" id="Banco" placeholder="Banco" autocomplete="off">
                        <input class="input_9 input_9JS borde_2" type="text" name="titular[]" id="Titular de la cuenta" placeholder="Titular"  autocomplete="off">
                        <input class="input_9 input_9JS borde_2" type="text" name="numeroCuenta[]" id="NumeroCuenta" placeholder="Numero de cuenta" autocomplete="off">
                        <input class="input_9 input_9JS borde_2" type="text" name="rif[]" id="Rif" placeholder="RIF"  autocomplete="off">
                    </div> 
                </div>
                <label class="label_4" id="Label_4">Añadir cuenta bancaria</label>
            </fieldset>              -->
            <fieldset class="fieldset_1 fieldset_2">
                <legend class="legend_1">Datos de accceso a la plataforma</legend>  
                <div>
                    <input class="input_9 borde_2" type="password" name="clave_Afcom" id="Clave" placeholder="Contraseña" onchange="llamar_verificaClave()">
                    <div class="contenedor_3" id="Mostrar_verificaClave"></div><!-- recibe respuesta de ajax llamar_verificaClave()-->
                    <input class="input_9 borde_2" type="password" name="confirmarClave_Afcom" id="ConfirmarClave" placeholder="Repetir contraseña">
                </div>          
            </fieldset>        
            <div class="contenedor_66">            
                <input class="boton boton_4" type="submit" name="Registrarse" value="Crear tienda">
            </div>  
        </form>
    </div>
</section>

<!--div alimentado via Ajax por medio de la funcion Llamar_categorias() -->
<div id="Mostrar_Categorias"></div>

<!--div utilizado para tapar las etiquetas tipo input -->
<div class="tapa" id="Tapa"></div>


<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
 
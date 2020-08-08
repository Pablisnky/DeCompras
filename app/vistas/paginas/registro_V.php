<?php
	session_start(); //se crea una sesion llamada verifica, esta sesión es exigida cuando se entra en la pagina que recibe los datos del formulario de registro, para evitar que un usuario recarge la pagina que recibe y cargue los datos nuevamente a la BD
	$verifica = 1906;  
    $_SESSION["verifica"] = $verifica; 
    
    // Se carga el header 
    require(RUTA_APP . "/vistas/inc/header.php");
?>
	<div class="contenedor_39">
        <h1 class="h1_3">Afiliaciones</h1>
        <div class="contenedor_40">
            <p class="p_1">Posiciona tu negocio en la ciudad</p>
            <p class="p_1">Unete a nuestra comunidad de comercialización de productos.</p>
            <div class="contenedor_41">
                <a class="boton boton_3 boton_4" href="<?php echo RUTA_URL . '/Registro_C/registroDespachador';?>">Quiero unirme como despachador</a>
                <a class="boton boton_3 boton_4" href="<?php echo RUTA_URL . '/Registro_C/registroComerciante';?>">Quiero unirme como comerciante</a>
            </div>
        </div>
    </div>
    <footer>
        <?php include(RUTA_APP . "/vistas/inc/footer.php");?>
    </footer>
	</body>
</html>
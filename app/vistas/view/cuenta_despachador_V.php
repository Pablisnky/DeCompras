<?php 
//se invoca sesion con el ID_Afiliado creada en validarSesion.php para autentificar la entrada a la vista
if(!empty($_SESSION["ID_Afiliado"])){
    echo "Bienvenido a tu sesion";
    
    include(RUTA_APP . "/vistas/footer/footer.php");
}
else{
    redireccionar("/Login_C/");
}
    
    ?>
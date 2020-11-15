<?php   
    $verifica_2 = $_SESSION["verifica_2"]; 

    //echo "Variable sesion_2=" . $verifica_2;
    // if($verifica_2 == 1906){// Anteriormente en carrito_V.php se generó la variable $_SESSION["verfica_2"] con un valor de 1906; con esto se evita que no se pueda recarga esta página.
        // unset($_SESSION['verifica_2']);//se borra la sesión verifica.
        ?>
        <section class="section_2">
            <h1 class="h1_1 h1_12">Compra realizada</h1>
            <div class='contenedor_39'>
                <p class="p_3">Se envio a tu correo la orden de despacho. <a href="#">Ver orden de despacho</a></p> 
                <!-- <P class="p_5">Enviaremos un mensaje por WhatsApp indicandote el despachador responsable de la entrega por si deseas acordar una hora de entrega</P> -->
                <div class="contenedor_33">
                    <p class="p_1">Gracias por confiar en nuestro servicio</p>
                    <a class="boton" href="<?php echo RUTA_URL . '/Inicio_C';?>">Inicio</a>
                </div>
            </div>
        </section>
        <?php
    // }
    // else{
    //     header("location:" . RUTA_URL);
    // }   ?>
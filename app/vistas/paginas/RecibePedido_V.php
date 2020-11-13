<?php   
    $verifica_2 = $_SESSION["verifica_2"]; 

    //echo "Variable sesion_2=" . $verifica_2;
    if($verifica_2 == 1906){// Anteriormente en carrito_V.php se generó la variable $_SESSION["verfica_2"] con un valor de 1906; con esto se evita que no se pueda recarga esta página.
        unset($_SESSION['verifica_2']);//se borra la sesión verifica.
        ?>
        <section class="section_2">
            <h1 class="h1_1 h1_12">Compra realizada</h1>
            <div class='contenedor_39'>
                <P class="p_5">Tu pedido en breve comenzará a ser procesado</P>
                <p>Se ha enviado a tu correo la orden de compra.</p> 
                <!-- <P class="p_5">Enviaremos un mensaje por WhatsApp indicandote el despachador responsable de la entrega por si deseas acordar una hora de entrega</P> -->
                <p class="p_1">Gracias por confiar en nuestro servicio</p>
                <div class="contenedor_33">
                    <a class="boton" href="<?php echo RUTA_URL . '/Inicio_C';?>">Inicio</a>
                </div>
            </div>
        </section>
        <?php
    }
    else{
        header("location:" . RUTA_URL);
    }   ?>
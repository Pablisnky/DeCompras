<?php include(RUTA_APP . '/vistas/inc/header.php');  ?>

<section>
    <h1 class="h1_3">Roles de afiliados</h1>
    <div class='contenedor_10'>        
        <div>
            <P class="p_3 p_5">Despachador</P>
            <p>Son las personas encargadas de realizar las entregas, deben contar con un medio de transporte, (bicicleta, moto o carro) y un telefono movil, nuestro modelo de negocio no incrementa el precio de despacho, para que el precio de entrega sea similar al servicio de taxi local.</p>
            <p>Su rol dentro de la aplicación es estar atento a notificaciones telefonicas que alertan sobre el retiro en tienda y su posterior entrega al usuario final.</p>
            <p>La afiliación es completamente gratuita y no existe comisión por despacho realizado</p>
        </div>
        <div>
            <p class="p_3 p_5">Comerciante</p>
            <p>Son las personas responsable de una tienda o producto, la afiliación de su tienda va desde 2 a 8 $ USD/mes, dependiendo la categoria y el tamaño del negocio, esto cubre mantener el inventario de sus productos dentro de la aplicación, promoción y marqueting digital de manera organica.</p>
            <p>Su rol dentro de la aplicación es la de preparar el pedido y entregarlo al despacahador.</p>
        </div>
        <div>
            <p class="p_3 p_5">Usuario</p>
            <p>Es el centro de atención de la aplicación, todo nuestro esfuerzo esta basado en crear un impacto positivo en la sociedad, enfocandonos en el uso eficaz del tiempo de nuestros usuarios, de modo que las trivialidades cotidianas no le hagan abandonar sus asuntos más importantes.</p>
            <p>El usuario final no tiene necesidad de afiliación, el costo de uso de la plataforma es de 2 % sobre el monto total que arroje su pedido, más el costo de envio que es similar al del servicio de taxi local.</p>
        </div>
    </div>
    <hr class="hr_2"/>
    <div class="contenedor_33">
        <a class="boton" href="<?php echo RUTA_URL . '/Afiliacion_C/registroAfiliacion';?>">Afiliación</a>
    </div>
</section>   
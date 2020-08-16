<?php include(RUTA_APP . '/vistas/inc/header.php');  ?>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/casita/style_casita.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/camion/style_camion.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/carrito/style_carrito.css"/>		

<section class="section_5">
    <div class="contenedor_70">
        <p class="p_1">Tu tienda en toda la ciudad</p>
        <p class="p_8">Unete a nuestra red de comercialización de productos.</p>
        <div class="contenedor_51 contenedor_48">
            <div>
                <span class="icon-cart span_6"></span>
            </div>
            <div>
                <span class="icon-truck span_6"></span>
            </div>
            <div>
                <span class="icon-home2 span_6"></span>
            </div>
        </div>
    </div>
    <div class="contenedor_41">
        <a class="boton boton_3 boton_4" href="<?php echo RUTA_URL . '/Registro_C/registroDespachador';?>">Quiero unirme como despachador</a>
        <a class="boton boton_3 boton_4" href="<?php echo RUTA_URL . '/Registro_C/registroComerciante';?>">Quiero unirme como comerciante</a>
    </div>    
</section>
<section class="section_5">
    <div class='contenedor_10 contenedor_38'>
        <div class="contenedor_71">
            <p class="p_1">Roles de afiliados</p>
        </div>
        <div>
            <p class="p_3 p_5">Usuario</p>
            <p>Es el centro de atención de la aplicación, todo nuestro esfuerzo esta basado en crear un impacto positivo en la sociedad, enfocandonos en el uso eficaz del tiempo de nuestros usuarios, de modo que las trivialidades cotidianas no le hagan abandonar sus asuntos más importantes.</p>
            <p>El usuario final no tiene necesidad de afiliación, el costo de uso de la plataforma es de 2 % sobre el monto total que arroje su pedido, más el costo de envio que es similar al del servicio de taxi local.</p>
        </div>        
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
    </div>
</section>   
		
<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
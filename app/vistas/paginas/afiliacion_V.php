<?php require(RUTA_APP . '/vistas/inc/header.php');  ?>

<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/casita/style_casita.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/camion/style_camion.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/carrito/style_carrito.css"/>		

<section class="section_5">
    <div class="contenedor_70">
        <p class="p_1">Unete a nuestra red de comercialización de productos.</p>
        <div class='contenedor_84 contenedor_93 borde_1'>
            <p class="p_6 p_9">15 días libres de pago al registrar tu tienda</p> 
            <div class="contenedor_94">
                <P class="p_3 p_5">Emprendedor</P>
                <p class="p_11">1,5 USD/mes</p>
                <ul>
                    <li class="li_3"><p>Proyectos de manufactura o tiendas con catalogo de hasta 20 productos.</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>   
            </div>
            <div class="contenedor_94">
                <P class="p_3 p_5">Bodega</P>
                <p class="p_11">3,5 USD/mes</p>
                <ul>
                    <li class="li_3"><p>Tiendas con catalogo de hasta 200 productos</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>   
            </div>
            <div class="contenedor_94">
                <p class="p_3 p_5">Básico</p>
                <p class="p_11">6 USD/mes</p>
                <ul>
                    <li class="li_3"><p>Tiendas con catalogo de hasta 500 productos</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>
            </div>        
            <div class="contenedor_94">
                <P class="p_3 p_5">Mini tienda</P>
                <p class="p_11">15 USD/mes</p>
                <ul>
                    <li class="li_3"><p>Tiendas con catalogo de hasta 1.500 productos</p></li>
                    <li class="li_3"><p>Subdominio</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>
            </div>
            <div class="contenedor_94">
                <p class="p_3 p_5">Tienda</p>
                <p class="p_11">25 USD/mes</p>
                <ul>
                    <li class="li_3"><p>Tiendas con catalogo de más de 1.500 productos</p></li>
                    <li class="li_3"><p>Subdominio</p></li>
                    <li class="li_3"><p>Código QR</p></li>
                </ul>
            </div>
        </div>
        <div class="contenedor_41">
            <a class="boton boton_3 boton_4" href="<?php echo RUTA_URL . '/Registro_C/registroDespachador';?>">Unirme como despachador</a>
            <a class="boton boton_3 boton_4" href="<?php echo RUTA_URL . '/Registro_C/registroComerciante';?>">Unirme como comerciante</a>
        </div>  
    </div>  
</section>
<!-- <section class=" section_6">
    <div class='contenedor_10 contenedor_38'>
        <div class="contenedor_71">
            <p class="p_1">Roles de afiliados</p>
        </div>
        <div class="">
            <p class="p_3 p_5">Usuario</p>
            <p>Es el centro de atención de la aplicación, la razón por la que las tiendas deben existir, nuestro esfuerzo esta basado en crear un impacto positivo en la sociedad, enfocandonos en el uso eficaz del tiempo de nuestros usuarios, de modo que las trivialidades cotidianas no le hagan abandonar sus asuntos más importantes.</p>
            <p>El usuario final no tiene necesidad de afiliación, el costo de uso de la plataforma es de 2 % sobre el monto total que arroje su pedido, más el costo de envio que es similar al del servicio de taxi local.</p>
        </div>        
        <div class="contenedor_79">
            <P class="p_3 p_5">Despachador</P>
            <p>Son las personas encargadas de realizar las entregas, deben contar con un medio de transporte, (bicicleta, moto o carro) y un telefono movil, nuestro modelo de negocio no incrementa el precio de despacho, para que el precio de entrega sea similar al servicio de taxi local.</p>
            <p>Su rol dentro de la aplicación es estar atento a notificaciones telefonicas que alertan sobre el retiro en tienda y su posterior entrega al usuario final.</p>
            <p>La afiliación es completamente gratuita y no existe comisión por despacho realizado</p>
        </div>
        <div class="contenedor_79">
            <p class="p_3 p_5">Comerciante</p>
            <p>Son las personas responsable de una tienda o producto, la afiliación de su tienda va desde 2 a 8 $ USD/mes, dependiendo la categoria y el tamaño del negocio, esto cubre mantener el inventario de sus productos dentro de la aplicación, promoción y marqueting digital de manera organica.</p>
            <p>Su rol dentro de la aplicación es la de preparar el pedido y entregarlo al despacahador.</p>
        </div>
    </div>
</section>    -->
<script type="text/javascript" src="<?php echo RUTA_URL . '/public/javascript/E_Afiliacion.js';?>"></script>
		
<?php include(RUTA_APP . "/vistas/inc/footer.php");?>
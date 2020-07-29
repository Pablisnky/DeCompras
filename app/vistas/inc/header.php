<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo NOMBRESITIO;?></title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="description" content="Ventas por internet a pedido">
		<meta name="keywords" content="pedido, despacho, compra">
		<meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="MobileOptimized" content="width">
		<meta name="HandheldFriendly" content="true">
		<meta http-equiv="expires" content="12 de julio de 2020">

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/carrito/style_carrito.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/lupa/style_lupa.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/ropa/style_ropa.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/flecha/style_flecha.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilosPidoRapido.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_estilosPidoRapido_800.css"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'>
    </head>
    <body>		
		<header class="header_1">
			<div class="contenedor_3">
				<div class="contenedor_1">
					<a class="a_1" href="<?php echo RUTA_URL . '/Inicio_C';?>">
						<img class="imagen_1" src="<?php echo RUTA_URL;?>/public/images/logo.png" width="50" height="50" alt="" loading="lazy">
						<span class="span_1">DeCompras</span>
					</a>
				</div>
				<div class="contenedor_1">
					<div class="contenedor_22">
						<div class="contenedor_21 Blink" id="Mostrar_Carrito" onclick="PedidoEnCarrito()">
							<span class="span_6">4.680 Bs</span>
							<span class="icon-cart span_2"></span>
						</div>
						<div>
							<span class="icon-search  span_2 span_1"></span>
						</div>
					</div>
				</div>
			</div> 
		</header>
		<article>
			<noscript>
				<p>Bienvenido a DeCompras.com</p>
				<p>La tienda online requiere para su funcionamiento el uso de JavaScript, si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
			</noscript>
		</article>

   <!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
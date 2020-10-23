<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo NOMBRESITIO;?></title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="description" content="Ventas por internet a pedido"/>
		<meta name="keywords" content="pedido, despacho, compra"/>
		<meta name="author" content="Pablo Cabeza"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="MobileOptimized" content="width"/>
		<meta name="HandheldFriendly" content="true"/>
		<meta http-equiv="expires" content="12 de julio de 2020"/>

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/carrito/style_carrito.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/lupa/style_lupa.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/menu/style_menu.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilosPidoRapido.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_800.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_350.css"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'/>
    </head>
    <body>	
		<header class="contenedor_69">
			<div class="contenedor_111">
				<a class="a_1" href="<?php echo RUTA_URL . '/Inicio_C';?>">PedidoRemoto</a>
				<h2 class="h2_5">MarketPlace</h2>
			</div>
			<label id="ComandoMenu" class="comandoMenu_2 comandoMenu_3" onclick="mostrarMenu()"><span class="icon-menu span_15" id="Span_6"></span></label>
			<nav id="MenuResponsive" class="menuResponsive">
				<ul id="MenuContenedor">
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Inicio_C';?>">Home</a></li>
					<li><a class="a_3"  id="Afiliacion"href="<?php echo RUTA_URL . '/menu_C/afiliacion/Afiliaciones';?>">Afiliaciones</a></li>
					<li><a class="a_3" id="Ciudades" href="<?php echo RUTA_URL . '/menu_C/ciudad/Ciudades';?>">Ciudades</a></li>
					<li><a class="a_3" id="Tiendas" href="<?php echo RUTA_URL . '/Inicio_C#Contenedor_88';?>">Tiendas</a></li>
					<li><a class="a_3" id="Inicio" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>">Inicio sesión</a></li>
				</ul>
			</nav>
		</header>	
		<article>    
			<noscript>
				<p>Bienvenido a PedidoRemoto.com</p>
				<p>La tienda online requiere para su funcionamiento el uso de JavaScript, si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
			</noscript>
		</article>

	<!--div utilizado para tapar el body mientras esta el menu responsive -->
	<div class="tapa" id="Tapa"></div>

<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->

<!-- ******************************************************************************************* -->
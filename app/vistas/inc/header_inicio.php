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
		<meta http-equiv="Expires" content="0"> 
		<meta http-equiv="Last-Modified" content="0">
		<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 		<meta http-equiv="Pragma" content="no-cache">

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/menu/style_menu.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/lupa/style_lupa.css"/>

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/estilosPidoRapido.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosPidoRapido_1300.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosPidoRapido_800.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosPidoRapido_350.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/EstilosPedidoRemoto_slider.css?v=<?php echo(rand());?>"/>
		
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat'/>	
		<link rel="manifest" href="<?php echo RUTA_URL;?>/public/manifest.json"/>
    </head>
    <body>				
		<header class="header contenedor_116">
			<!-- <div class="contIconoBuscador borde_1"> -->
				<label id="ComandoMenu" class="comandoMenu_2 comandoMenu_Inicio" onclick="mostrarMenu()"><span class="icon-menu span_6 span_15Inicio" id="Span_6"></span></label>
			<!-- </div> -->
			<nav id="MenuResponsive" class="header__menuResponsive header__nav_1">
				<ul id="MenuContenedor">
					<li><a class="a_3A" href="<?php echo RUTA_URL . '/menu_C/afiliacion';?>" rel="noopener noreferrer">Afiliación</a></li>
					<!-- <li><a class="a_3A" href="<?php echo RUTA_URL . '/menu_C/ciudad/Ciudades';?>">Ciudades</a></li> -->
					<li><a class="a_3A" href="<?php echo RUTA_URL . '/menu_C/categorias';?>">Ver Tiendas</a></li>
					<li><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>">Inicio sesión</a></li>
				</ul>
			</nav>
		</header>
        <div class="contIconoBuscador borde_1" id="Contenedor_34">
            <span class="icon-search contIconoBuscador__span"></span>
        </div>
		<article>
			<noscript>
				<p>Bienvenido a PedidoRemoto.com</p>
				<p>La tienda online requiere para su funcionamiento el uso de JavaScript, si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
			</noscript>
		</article>
		
	<!--div utilizado para tapar el body mientras esta el menu responsive -->
	<div class="tapa" id="Tapa"></div>


<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->
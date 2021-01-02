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

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/menu/style_menu.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/lupa/style_lupa.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/casita/style_casita.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/camion/style_camion.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/carrito/style_carrito.css"/>		
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/comida/style_comida.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/merceria/style_merceria.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/farmacia/style_farmacia.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/ferreteria/style_ferreteria.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/supermercado/style_supermercado.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/artesanos/style_artesanos.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/ropa/style_ropa.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/estilosPidoRapido.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosPidoRapido_800.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosPidoRapido_350.css"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'/>	
		<link rel="manifest" href="<?php echo RUTA_URL;?>/public/manifest.json"/>
    </head>
    <body>				
		<header class="contenedor_69 contenedor_116">
			<label id="ComandoMenu" class="comandoMenu_2 ocultar" onclick="mostrarMenu()"><span class="icon-menu span_6 span_15" id="Span_6"></span></label>
			<nav id="MenuResponsive" class="menuResponsive nav_1">
				<ul id="MenuContenedor">
					<li><a class="a_3" href="<?php echo RUTA_URL . '/menu_C/afiliacion';?>" rel="noopener noreferrer">Afiliación</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/menu_C/ciudad/Ciudades';?>">Ciudades</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Inicio_C#Contenedor_88';?>">Tiendas</a></li>
					<li class="menuLi_1"><a href="#">Nuestro ADN</a>  
						<ul class="menuContenedor_3 menuContenedor_1">
							<li><a class="menuLi_2" href="<?php echo RUTA_URL . '/Menu_C/nuestroADN/quienesSomos';?>">Quíenes somos</a></li> 
							<li><a class="menuLi_2" href="<?php echo RUTA_URL . '/Menu_C/nuestroADN/quienesSomos#QueHacemos';?>">Qué hacemos</a></li>
							<li><a class="menuLi_2" href="<?php echo RUTA_URL . '/Menu_C/nuestroADN/quienesSomos#Contactenos';?>">Contactenos</a></li>
						</ul>
					</li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Menu_C/descargaApp';?>">Descargar APP</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>">Inicio sesión</a></li>
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
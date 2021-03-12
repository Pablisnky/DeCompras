<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo NOMBRESITIO;?></title>

		<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
		<meta name="description" content="Ventas por internet a pedido"/>
		<meta name="keywords" content="pedido, despacho, compra"/>
		<meta name="author" content="Pablo Cabeza"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="MobileOptimized" content="width"/>
		<meta name="HandheldFriendly" content="true"/>

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilosPidoRapido.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_1300.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_800.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_350.css?v=<?php echo(rand());?>"/>
		
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat'/>

		<!-- CDN iconos de font-awesome-->
		<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>
    </head>
    <body>	
		<header class="header borde_bottom--claro">
			<!-- icono para responsive -->
			<label id="ComandoMenu" class="comandoMenu_2 comandoMenu_3" onclick="mostrarMenu()"><i class="fas fa-bars icono_3" id="Span_6"></i></label>

			<!-- $Nombre_Tienda viene de Vitrina_C-->
			<div class="contenedor_111">
				<a class="a_1 font--negro" href="<?php echo RUTA_URL . '/Inicio_C';?>">PedidoRemoto</a>
				<h2 class="h2_5">MarketPlace</h2>
			</div>
			
			<!-- Barra de navegación -->
			<nav id="MenuResponsive" class="header__menuResponsive">
				<ul id="MenuContenedor">
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Inicio_C';?>">Inicio<i class="fas fa-home icono_1"></i></a></li>
					<li><a class="a_3" id="Afiliacion" href="<?php echo RUTA_URL . '/Menu_C/afiliacion';?>">Afiliación<i class="fas fa-address-card icono_1"></i></a></li>
					<li><a class="a_3" id="Tiendas" href="<?php echo RUTA_URL . '/Menu_C/categorias';?>">Ver Tiendas<i class="fas fa-shopping-basket icono_1"></i></a></li>
					<li><a class="a_3" id="Inicio" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>">Inicio sesión<i class="fas fa-user-check icono_1"></i></a></li>
				</ul>
			</nav>
		</header>   
		<noscript>
			<p>Bienvenido a PedidoRemoto.com</p>
			<p>La tienda online requiere para su funcionamiento el uso de JavaScript, si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
		</noscript>

	<!--div utilizado para tapar el body mientras esta el menu responsive -->
	<div class="tapa" id="Tapa"></div>

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->
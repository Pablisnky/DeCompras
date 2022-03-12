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
		<header class="header--inicio header">

			<!-- ICONO HAMBURGUESA -->
			<label id="ComandoMenu" class="comandoMenu_2 comandoMenu_Inicio" onclick="mostrarMenu()"><span id="Span_6"><i class="fas fa-bars icono_3"></i></span></label>
				
			<!-- BARRA DE NAVEGACION -->
			<nav id="MenuResponsive" class="header__menuResponsive header__nav_1">
				<ul id="MenuContenedor">
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Inicio_C/NoVerificaLink';?>"><i class="fas fa-home icono_1"></i>Inicio</a></li>

					<li><a class="a_3" id="Afiliacion" href="<?php echo RUTA_URL . '/Menu_C/afiliacion';?>"><i class="fas fa-address-card icono_1"></i>Afiliación</a></li>

					<li><a class="a_3" id="Tiendas" href="<?php echo RUTA_URL . '/Ciudades_C';?>"><i class="fas fa-shopping-basket icono_1"></i>Tiendas</a></li>

					<li><a class="a_3" href="<?php echo RUTA_URL . '/VitrinaMayorista_C';?>"><i class="fas fa-truck-moving icono_1"></i>Mayoristas</a></li>

					<li><a class="a_3" id="Inicio" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>"><i class="fas fa-user-check icono_1"></i>Inicio sesión</a></li>
				</ul>
			</nav>
		</header>   

		<!-- MEMBRETE -->
		<div class="contenedor_111">
			<a class="a_1 font--negro" href="<?php echo RUTA_URL . '/Inicio_C/NoVerificaLink';?>">PedidoRemoto</a>
			<h2 class="h2_5">MarketPlace</h2>
		</div>

		<noscript>
			<p>Bienvenido a PedidoRemoto.com</p>
			<p>La tienda online requiere para su funcionamiento el uso de JavaScript, si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
		</noscript>

		<!-- DIV USADO PARA TAPAR EL BODY MIENTRAS ESTA EL MENU RESPONSIVE -->
		<div class="tapa" id="Tapa">
			<div class="tapa-logo">
				<a class="a_1 font--white" href="<?php echo RUTA_URL . '/Inicio_C/NoVerificaLink';?>">PedidoRemoto</a>
				<h2 class="h2_5 font--white">MarketPlace</h2>
			</div>
		</div>

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->
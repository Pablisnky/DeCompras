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
		<!-- <meta http-equiv="Expires" content="0">  -->
		<!-- <meta http-equiv="Last-Modified" content="0"> -->
		<!-- <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
 		<meta http-equiv="Pragma" content="no-cache"> -->

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/estilosPidoRapido.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosPidoRapido_1300.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosPidoRapido_800.css?v=<?php echo rand();?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosPidoRapido_350.css?v=<?php echo rand( );?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/MediaQuery_EstilosPidoRapido_H800.css?v=<?php echo rand( );?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/EstilosPedidoRemoto_slider.css?v=<?php echo rand();?>"/>
		
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>	
		<link rel="manifest" href="<?php echo RUTA_URL;?>/public/manifest.json"/>
		
		<!-- CDN iconos de fuentes de google-->
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat'/>

		<!-- CDN iconos de font-awesome-->
		<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=G-5JFWZ0GQYB"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'G-5JFWZ0GQYB');
		</script>
    </head>
    <body style="overflow-y: hidden">				
		<header class="header--inicio">
			
			<!-- ICONO HAMBURGUESA -->
			<label id="ComandoMenu" class="comandoMenu_2 comandoMenu_Inicio" onclick="mostrarMenu()"><span id="Span_6"><i class="fas fa-bars icono_3"></i></span></label>
			
			<!-- BARRA DE NAVEGACION -->
			<nav id="MenuResponsive" class="header__menuResponsive header__menuResponsive--inicio">
				<ul id="MenuContenedor">
					<li><a class="a_3A" href="<?php echo RUTA_URL . '/Menu_C/afiliacion';?>" rel="noopener noreferrer"><i class="fas fa-address-card icono_1 icono_6"></i>Afiliación</a></li>
					<li><a class="a_3A" href="<?php echo RUTA_URL . '/Ciudades_C';?>"><i class="fas fa-shopping-basket icono_1 icono_6"></i>Tiendas</a></li>
					<li><a class="a_3A" href="<?php echo RUTA_URL . '/VitrinaMayorista_C';?>"><i class="fas fa-truck-moving icono_1 icono_6"></i>Mayoristas</a></li>
					<li><a class="a_3A" href="<?php echo RUTA_URL . '/Login_C/index/CE';?>"><i class="fas fa-user-check icono_1 icono_6"></i>Inicio sesión</a></li>
				</ul>
			</nav>
			
			<div class="tapa-logo" id="Tapa_Logo">
				<a class="a_1 font--white" href="<?php echo RUTA_URL . '/Inicio_C/NoVerificaLink';?>">PedidoRemoto</a>
				<h2 class="h2_5 font--white">MarketPlace</h2>
			</div>
		</header>

		<!-- ICONO DE BUSQUEDA LUPA -->
        <div class="contIconoBuscador borde_1" id="Contenedor_34">
            <span><i class="fas fa-search icono_3"></i></span>
        </div>
		
		<noscript>
			<p>Bienvenido a PedidoRemoto.com</p>
			<p>La tienda online requiere para su funcionamiento el uso de JavaScript, si lo has deshabilitado intencionadamente, por favor vuelve a activarlo.</p>
		</noscript>
		
		<!-- DIV USADO PARA TAPAR EL BODY MIENTRAS ESTA EL MENU RESPONSIVE -->
		<div class="tapa" id="Tapa">
		</div>

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->
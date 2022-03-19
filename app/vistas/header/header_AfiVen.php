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
		<!-- <meta http-equiv="expires" content="0" /> -->

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilosPidoRapido.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_800.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_1300.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_350.css?v=<?php echo(rand());?>"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat'/>
		
		<!-- CDN iconos de font-awesome-->
		<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>
    </head>
    <body>	
		<header class="header--inicio header borde_bottom--claro">

			<!-- ICONO HAMBURGUESA -->
			<label id="ComandoMenu" class="comandoMenu_2 comandoMenu_Inicio" onclick="mostrarMenu()"><span id="Span_6"><i class="fas fa-bars icono_3 span_15Inicio""></i></span></label>
			
			<!-- BARRA DE NAVEGACION -->
			<nav id="MenuResponsive" class="header__menuResponsive header__nav_1">
				<ul id="MenuContenedor">
					<li><a class="a_3" href="<?php echo RUTA_URL . '/CuentaVendedor_C'?>">Balance</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/CuentaVendedor_C/clienteVen'?>">Clientes</a></li>
                    <li><a class="a_3" href="<?php echo RUTA_URL . '/CuentaVendedor_C/pedidosVen/';?>">Pedidos</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/CuentaVendedor_C/porcobrar'?>">C. Cobrar</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/CuentaVendedor_C/ventas'?>">Ventas</a></li>
                    <li><a class="a_3" href="<?php echo RUTA_URL . '/CuentaVendedor_C/Publicar/';?>">Reportes</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/CerrarS_C';?>">Cerrar sesión</a><label class="ocultar-movil"><?php echo $Datos['nombreVen'] . ' ' . $Datos['apellidoVen']?></label></li>
				</ul>
			</nav>
		</header>

		<!-- MEMBRETE -->
		<div class="contenedor_111">
			<label class="a_1 a_7 font--negro"><?php echo $Datos['nombreMay']?></label>
			<p class="h3_10 font-right separador_1"><?php echo $Datos['nombreVen'] . ' ' . $Datos['apellidoVen']?></p>
		</div> 

	<!--div utilizado para tapar el body mientras esta el menu responsive -->
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
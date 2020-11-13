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

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilosPidoRapido.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_800.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_350.css"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'/>
    </head>
    <body>	
		<header>
			<!-- $Datos viene de Opciones_C/productoAmpliado-->
			<div class="contenedor_133">
				<div style="width: 100%;">
					<h1 class="h1_10"><?php echo $Datos['NombreTienda']?></h1>
					<h2 class="h2_5 h2_12"><?php echo $Datos['SloganTienda'];?></h2>
				</div>
			</div> 
		</header>

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->
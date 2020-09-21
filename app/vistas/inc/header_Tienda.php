<?php 
	//$Datos viene de Vitrina_C.php
	if(empty($Datos['NombreTienda'])){
		$Membrete = "PedidoRemoto";
	}
	else{
		$Membrete = $Datos['NombreTienda'];
	}
?>
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

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/lupa/style_lupa.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/menu/style_menu.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/iconos/carrito/style_carrito.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilosPidoRapido.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_estilosPidoRapido_800.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_estilosPidoRapido_350.css"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'/>
    </head>
    <body>	
		<header class="contenedor_69">
			<!-- $Membrete viene de Vitrina_C -->
			<div class="contenedor_116">
				<a class="a_1 a_11" href="<?php echo RUTA_URL . '/Inicio_C';?>"><?php echo $Membrete?></a>
				<h2 class="h2_8">Eslogan o frase automatica</h2>
			</div> 
			<label id="ComandoMenu" class="comandoMenu_2" onclick="mostrarMenu()"><span class="icon-menu span_6 span_15" id="Span_6"></span></label>
			<nav id="MenuResponsive" class="menuResponsive">
				<ul id="MenuContenedor">
					<li><a class="a_3" href="">Ofertas</a></li>
					<li><a class="a_3" href="">Lo más pedido</a></li>
					<li><a class="a_3" href="">Horario</a></li>
					<li><a class="a_3" href="">Dirección</a></li>
					<hr class="hr_3 hr_4">
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Inicio_C';?>">Salir de la tienda</a></li>
				</ul>
			</nav>
		</header>
		
	<!--div utilizado para tapar el body mientras esta el menu responsive -->
	<div class="tapa" id="Tapa"></div>

   <!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
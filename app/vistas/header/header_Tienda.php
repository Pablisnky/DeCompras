<?php 
	//$Datos viene de Vitrina_C.php
	if(empty($Datos['NombreTienda'])){
		$Nombre_Tienda = "PedidoRemoto";
	}
	else{
		$Nombre_Tienda = $Datos['NombreTienda'];
		$ID_Tienda = $Datos['id_tienda'];
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
		<!-- <meta http-equiv="expires" content="0" /> -->

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilosPidoRapido.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_800.css?v=<?php echo(rand());?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_1300.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_350.css"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Montserrat'/>
		
		<!-- CDN iconos de font-awesome-->
		<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>
    </head>
    <body onload="nobackbutton()">	
		<header class="header header--tienda borde_bottom--claro">
			<!-- icono para responsive -->
			<label id="ComandoMenu" class="comandoMenu_2 comandoMenu_Inicio borde_1" onclick="mostrarMenu()"><i class="fas fa-bars icono_3 span_15Inicio" id="Span_6"></i></label>
			
			<!-- $Nombre_Tienda viene de Vitrina_C-->
			<div class="contenedor_111--tienda">
				<label class="h1_10 font--negro label--block"><?php echo $Nombre_Tienda?></label>
				<h2 class="h2_5 h2_12 font--negro"><?php echo $Datos['slogan'][0]['slogan_Tien'];?></h2>
			</div> 

			<!-- Bara de navegación -->
			<nav id="MenuResponsive" class="header__menuResponsive header__menuResponsive--tienda">
				<ul id="MenuContenedor">
					<!-- <li><a class="a_3" href="#"><i class="fas fa-gift icono_1"></i>Ofertas</a></li>
					<li><a class="a_3" href="#"><i class="far fa-chart-bar icono_1"></i>Lo más pedido</a></li> -->
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Tiendas_C/horarioTienda/' . $ID_Tienda . ',' . str_replace(' ', '%20', $Nombre_Tienda);?>"><i class="far fa-clock icono_1"></i>Horario</a></li>
					<!-- <li><a class="a_3" href="<?php //echo RUTA_URL . '/Tiendas_C/direccionTienda/' . $ID_Tienda;?>"><i class="fas fa-map-marker-alt icono_1"></i>Dirección</a></li> -->
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Tiendas_C/salirTienda';?>"><i class="far fa-times-circle icono_1"></i>Salir de la tienda</a></li>
				</ul>
			</nav>
		</header>
        <div class="contIconoBuscador contIconoBuscador--tienda borde_1" id="Contenedor_34">
			<i class="fas fa-search contIconoBuscador__span"></i>
        </div>

	<!--div utilizado para tapar el body mientras esta el menu responsive -->
	<div class="tapa" id="Tapa"></div>
	
<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->
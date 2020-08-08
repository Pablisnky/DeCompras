<?php session_start();?>
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

		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/public/css/lupa/style_lupa.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilosPidoRapido.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_estilosPidoRapido_800.css"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'/>
    </head>
    <body>		
		<header class="header_1">
            <div class="contenedor_35">
                <a class="a_3" href="<?php echo RUTA_URL . '/Publicacion_C/MisPublicaciones/';?>">Nueva publicación</a>
                <a class="a_3" href="<?php echo RUTA_URL . '/Publicacion_C/';?>">Mis publicaciónes</a>	
                <div class="Contenedor_52">
                    <label class="label_8"><?php echo $_SESSION["Nombre"];?></label>
                    <a class="a_3 a_4" href="<?php echo RUTA_URL . '/CerrarS_C';?>">Cerrar sesión</a>
                </div>
            </div>
        </header>
        <div class="contenedor_34 contenedor_34a">
            <span class="icon-search  span_7"></span>
        </div>
        <h1 class="h1_3">Empanadas La 13</h1>

   <!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
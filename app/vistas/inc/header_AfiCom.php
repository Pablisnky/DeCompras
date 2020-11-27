<?php 
    //Sesiones creadas en Login_C.php
    $Nombre = $_SESSION["Nombre"];
	$NombreTienda = $_SESSION["Nombre_Tienda"];
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
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/estilosPidoRapido.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_800.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_URL?>/css/MediaQuery_EstilosPidoRapido_350.css"/>
		<link rel="shortcut icon" type="image/png" href="<?php echo RUTA_URL;?>/public/images/logo.png"/>
		<link rel='stylesheet' type='text/css' href='https://fonts.googleapis.com/css?family=Raleway:400|Montserrat'/>
    </head>
    <body>	
		<header class="contenedor_69">
			<div class="contenedor_111">
				<h1 class="h1_10"><?php echo $NombreTienda;?></h1>				
				<!-- $Datos viene de Cuenta_C-->
				<h2 class="h2_5 h2_12"><?php echo $Datos['slogan'][0]['slogan_Tien'];?></h2>
			</div>
			<label id="ComandoMenu" class="comandoMenu_2 comandoMenu_3" onclick="mostrarMenu()"><span class="icon-menu span_6 span_15" id="Span_6"></span></label>
			<nav id="MenuResponsive" class="menuResponsive">
				<ul id="MenuContenedor">
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Cuenta_C/Editar';?>">Configurar</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Cuenta_C/';?>">Documentación</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/Cuenta_C/ventas';?>">Ventas</a></li>
					<li class="menuLi_1"><a>Productos</a>
						<ul class="menuContenedor_3 menuContenedor_2">
							<?php
							//$Datos proviene de Cuenta_C/index -  Cuenta_C/productos -  Cuenta_C/editar -  Cuenta_C/publicar
							foreach($Datos['secciones'] as $arr) :	
								$Seccion = $arr['seccion'];?>
								<li><a class="menuLi_2" href="<?php echo RUTA_URL .   '/Cuenta_C/Productos/' . urlencode($Seccion) . ',NoAplica'?>"><?php echo $Seccion;?></a></li>	<?php
							endforeach;	?>
							<li><a class="menuLi_2" href="<?php echo RUTA_URL . '/Cuenta_C/Productos/Todos';?>">Todos</a></li>
						</ul> 	
					</li>
                    <li><a class="a_3" href="<?php echo RUTA_URL . '/Cuenta_C/Publicar/';?>">Cargar producto</a></li>
                    <li><a class="a_3 a_4" href="<?php echo RUTA_URL . '/CerrarS_C';?>">Cerrar sesión</a></li>
				</ul>
			</nav>
		</header>	
        <div class="contenedor_52">
            <label class="label_8"><?php echo $Nombre;?></label>
            <a class="a_3 a_4" href="<?php echo RUTA_URL . '/CerrarS_C';?>">Cerrar sesión</a>
		</div>
		
	<!--div utilizado para tapar el body mientras esta el menu responsive -->
	<div class="tapa" id="Tapa"></div>

<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->
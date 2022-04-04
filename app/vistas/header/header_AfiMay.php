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
		
		<!-- FUENTES DE GOOGLE FONT -->
		<!-- <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Montserrat'/> -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"> 
		
		<!-- CDN ICONOS FONT-AWESOME -->
		<link rel='stylesheet' type='text/css' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css'/>
    </head>
    <body>	
		<header class="header header--inicio">

			<!-- ICONO HAMBURGUESA -->
			<label id="ComandoMenu" class="comandoMenu_2 comandoMenu_Inicio" onclick="mostrarMenu()"><span id="Span_6"><i class="fas fa-bars icono_3"></i></span></label>
			
			<!-- BARRA DE NAVEGACION -->
			<nav id="MenuResponsive" class="header__menuResponsive header__nav_1">
				<ul id="MenuContenedor">
					<li><a class="a_3" href="<?php echo RUTA_URL . '/CuentaMayorista_C/configurar'?>">Configurar</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/CuentaMayorista_C/vendedores'?>">Vendedores</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/CuentaMayorista_C/clientes'?>">Clientes</a></li>
					<li class="menuLi_1"><a class="a_3">Productos</a>
						<ul class="menuContenedor_3">
							<?php
							//$Datos proviene de CuentaComerciante_C/index -  CuentaComerciante_C/productos -  CuentaComerciante_C/editar -  CuentaComerciante_C/publicar
							foreach($Datos['seccionesMay'] as $arr) :	
								$ID_Seccion = $arr['ID_SeccionMay'];	
								$Seccion = $arr['seccionMay'];	?>
								<li><a class="menuLi_2" href="<?php echo RUTA_URL .   '/CuentaMayorista_C/Productos/' . urlencode($Seccion) . ',' . $ID_Seccion . ',false'?>"><?php echo $Seccion;?></a></li>	<?php
							endforeach;	?>
							<li><a class="menuLi_2" href="<?php echo RUTA_URL . '/CuentaMayorista_C/Productos/Todos,false,false';?>">Todos</a></li>
						</ul> 	
					</li>
                    <li><a class="a_3" href="<?php echo RUTA_URL . '/CuentaMayorista_C/Publicar/';?>">Cargar producto</a></li>
					<li><a class="a_3" href="<?php echo RUTA_URL . '/CerrarS_C';?>">Salir de la tienda</a></li>
				</ul>
			</nav>

			<div class="tapa-logo" id="Tapa_Logo">
				<a class="a_1 font--white  font--ajustable" href="<?php echo RUTA_URL . '/Inicio_C/NoVerificaLink';?>">Distribuidora Don Rigo</a>
			</div>
		</header>
		
		<!-- MEMBRETE -->
		<div class="contenedor_111" style="z-index:1">
			<label class="a_1 a_7 font--negro"><?php echo $_SESSION['Nombre_Mayorista']?></label>
			<p class="h3_10 font-right separador_1">Administrador</p>
		</div> 

		<!-- DIV USADO PARA TAPAR EL BODY MIENTRAS ESTA EL MENU RESPONSIVE -->
		<div class="tapa" id="Tapa">
		</div>
	
<!-- ******************************************************************************************* -->
			<!-- No se cierrra la etiqueta <body> porque se cierra en el footer -->
										<!-- HEADER -->
<!-- ******************************************************************************************* -->
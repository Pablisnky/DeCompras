<?php
	//Se agrega la libreria que genera el códigos QR
	require "phpqrcode/qrlib.php";    
	
	//Se declara una carpeta temporal para guardar la imagenes generadas
	$dir = RUTA_APP . 'codigo_QR/codigosRegistrados/';
	
	//Si no existe la carpeta se crea
	if (!file_exists($dir))
        mkdir($dir);
	
    //Se declara la ruta y nombre del archivo a generar (archivo que contiene el codigo_QR)
	$filename = $dir . 'La_Bodega_Digital';

    //Parametros de Condiguración
	$tamaño = 6; //Tamaño de Pixel
	$level = 'H'; //Precisión Alta
	$framSize = 3; //Tamaño en blanco

	//Se inserta la ruta a donde va a llevar el código QR
	$contenido = "https://www.pedidoremoto.com/Tiendas_C/tiendasEnCatalogo/Bodega"; 
	
    //Se envian los parametros a la Función para generar código QR 
	QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
	
    //Se muestra la imagen generada
	echo '<img src="'.$filename.'"/><hr/>';  

// Linea 13, Se escribe el nombre del afiliado, este sera el nombre del archivo donde esta el codigo QR
// Linea 20, Se introduce la url asignada al afiliado en el archivo .php
// Se abre el proyecto horebi en localhost y se añade a la url de inicio el siguiente complemento ( codigo_QR/index.php ) para generar el código QR del afiliado
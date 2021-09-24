<?php
    //se cargan manualmete las clases necesarias para que la aplicación funcione; si existe un autoload no es necesario esto
    require_once('config/Configurar.php');
    require_once('clases/Conexion_BD.php');
    require_once('clases/Controlador.php');
    require_once('clases/Core.php');
    require_once('helpers/local_remoto.php');

    //Se utiliza un autoload para no cargar las clases manualmente
    // spl_autoload_register(function($nombreClase){
    //     require_once('librerias/' . $nombreClase . '.php');
    // })
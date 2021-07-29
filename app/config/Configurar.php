<?php
// //Muestra la ruta raiz donde se encuentra el archivo incluyendo al archivo
// echo __FILE__ . "<br>";

//Muestra la ruta raiz donde se encuentra el archivo
// echo dirname(__FILE__) . "<br>";

//Muestra la ruta raiz donde se encuentra el archivo excluyendo una carpeta
// echo dirname(dirname(__FILE__)) . "<br>";

// ************************************************************************************************
// PARA CONEXION EN LOCAL
define("RUTA_APP", dirname(dirname(__FILE__)));
define("RUTA_URL", "http://localhost/proyectos/PidoRapido");
define("NOMBRESITIO","PedidoRemoto");

//credenciales para conexion a la BD en local
define("DB_HOST","localhost");
define("DB_USUARIO","root");
define("DB_PASSWORD","");
define("DB_NOMBRE","pido_rap");

// ************************************************************************************************
// PARA CONEXION EN REMOTO
// define("RUTA_APP", dirname(dirname(__FILE__)));
// define("RUTA_URL", "https://www.pedidoremoto.com");
// define("NOMBRESITIO","PedidoRemoto");

// // // credenciales para conexion a la BD en remoto
// define("DB_HOST","pedidoremoto.com");
// define("DB_USUARIO","pedidore_Pa_Cabeza");
// define("DB_PASSWORD","159ADNjpg.");
// define("DB_NOMBRE","pedidore_pido_rap");
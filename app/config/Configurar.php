<?php
//Muestra la ruta raiz donde se encuentra el archivo incluyendo al archivo
// echo __FILE__ . "<br>";

//Muestra la ruta raiz donde se encuentra el archivo
// echo dirname(__FILE__) . "<br>";

//Muestra la ruta raiz donde se encuentra el archivo excluyendo una carpeta
// echo dirname(dirname(__FILE__)) . "<br>";

define("RUTA_APP", dirname(dirname(__FILE__)));
define("RUTA_URL", "http://localhost/proyectos/PidoRapido");
define("NOMBRESITIO","DeCompras");

//credenciales para conexion a la BD
define("DB_HOST","localhost");
define("DB_USUARIO","root");
define("DB_PASSWORD","");
define("DB_NOMBRE","pido_rap");
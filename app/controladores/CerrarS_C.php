<?php
	class CerrarS_C extends Controlador{
		
		public function __construct(){
			session_start(); 
			session_unset();
			session_destroy();

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
		}
		
        public function index(){	
        	header("location:" . RUTA_URL. "/Inicio_C/NoVerificaLink");
        }
	}
?>
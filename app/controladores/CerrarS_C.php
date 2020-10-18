<?php
	class CerrarS_C extends Controlador{
		public function __construct(){
			session_start(); 
			session_unset();
			session_destroy();
		}
		
        public function index(){	
        	header("location:" . RUTA_URL);
        }
	}
?>
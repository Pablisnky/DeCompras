<?php
	class Modal_C extends Controlador{
		
		public function __construct(){
		}
		
        public function index(){	
        	// header("location:" . RUTA_URL);
        }

        public function loginIncorrecto(){
            $this->vista("modal/modal_login_V");
        }

        //Invocado en Login_C/ValidarSesion
        public function tiendaSinProductos(){
            $this->vista("modal/modal_sinProductos_V");            
        }

        //Invocado en Login_C/ValidarSesion
        public function tiendaSinSecciones(){
            $this->vista("modal/modal_sinSecciones_V"); 
        }
	}
?>
<?php 
    class Administrador_C extends Controlador{
        
        public function __construct(){  
            session_start();

            $this->ConsultaAdministrador_M = $this->modelo("Administrador_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        //Es llamadao desde Registro_C.php por medio de recibeRegistro() - CuentaComerciante_C - header_inicio.php - cuenta_publicar_V.php
        public function index(){
            $this->vista("paginas/administrador_V");
        }

        //Abre vista de administrador de clientes
        public function borrarCliente(){

        }
    }
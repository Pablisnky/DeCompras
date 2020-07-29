<?php
//Archivo llamado desde funciones_Ajax.js por medio de Llamar_ComidaRapida() - Llamar_Supermercado()

    class Tiendas_C extends Controlador{

        public function __construct(){
            $this->ConsultaTienda_M = $this->modelo("Tienda_M");
        }
        
        public function index($Categoria){
            switch($Categoria){
                case 'Comida_Rapida':
                    $Categoria = 'Comida Rapida';   
                break;    
            }
            
            //Se CONSULTAN las tiendas que estan afiliadas
            $Tiendas = $this->ConsultaTienda_M->consultarTiendas($Categoria);
            $Datos = $Tiendas->fetchAll(PDO::FETCH_ASSOC);            
            
            $this->vista("paginas/tiendas_V",$Datos);
        }
    }
?>    
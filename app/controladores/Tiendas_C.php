<?php
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
        
        // public function comidaRapida(){
        //     //Se CONSULTAN las tiendas que estan afiliadas en Comida Rapida
        //     $Tiendas = $this->ConsultaTienda_M->consultarTiendas_ComidaRapida('Comida Rapida');
        //     $Datos = $Tiendas->fetchAll(PDO::FETCH_ASSOC);            

        //     $this->vista("paginas/tiendas_V",$Datos);
        // }
    }
?>    
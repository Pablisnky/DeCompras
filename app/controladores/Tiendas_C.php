<?php
    class Tiendas_C extends Controlador{

        public function __construct(){
            $this->ConsultaTienda_M = $this->modelo("Tienda_M");
        }

        //Metodo llamado desde E_inicio.js por medio de VerTiendas() 
        public function index($Categoria){
            switch($Categoria){
                case 'Comida_Rapida':
                    $Categoria = 'Comida Rapida';   
                break;    
                case 'Repuesto_automotriz':
                    $Categoria = 'Repuesto automotriz';   
                break;  
            }
            
            //Se CONSULTAN las tiendas que estan afiliadas segun la categoria solicitada
            $Tiendas = $this->ConsultaTienda_M->consultarTiendas($Categoria);
            $Datos = $Tiendas->fetchAll(PDO::FETCH_ASSOC);            
            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();

            $this->vista("paginas/tiendas_V",$Datos);
        }
    }
?>    
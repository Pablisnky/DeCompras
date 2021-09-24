<?php
    class Buscador_C extends Controlador{
        
        private $IDs_Tiendas = [];
        
        public function __construct(){
            $this->ConsultaBuscador_M = $this->modelo("Buscador_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        public function index($Buscar){ 
            
            //CONSULTA las tiendas donde exista el producto solicitado por el usuario mediante el input buscador en inicio_V.php
            $BuscarTIendas = $this->ConsultaBuscador_M->consultarBusquedaTienda($Buscar);

            //CONSULTA la disponibilidad horaria de las tiendas           
            require(RUTA_APP . '/controladores/complementos/CalculoApertura_C.php');
            $this->Horario = new CalculoApertura_C;

            foreach($BuscarTIendas as $Row) :
                $ID_TIenda = $Row['ID_Tienda'];

                //Se añade el ID de cada tienda al array $IDs_Tiendas
                array_push($this->IDs_Tiendas, $ID_TIenda);
            endforeach;

            $DisponibilidaHoraria = $this->Horario->disponibilidadHoraria($this->IDs_Tiendas);
           
            $Datos = [
                'buscar_tIendas' => $BuscarTIendas,
                'tiendas_disponibilidad' => $DisponibilidaHoraria,// ID_Tienda, disponibilidad, proximoApertura, horaApertura, Condicional
            ];
            
            // echo '<pre style= "text-align:left">';
            // print_r($Datos);
            // echo '</pre>';

            $this->vista("view/ajax/buscador_V", $Datos);
        } 
    }
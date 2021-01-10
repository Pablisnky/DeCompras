<?php    
    class Tiendas_C extends Controlador{
        private $Categoria;
        private $IDs_Tiendas = [];
        private $TiendasEnCategoria;

        public function __construct(){
            $this->ConsultaTienda_M = $this->modelo("Tienda_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        //Metodo llamado desde E_inicio.js por medio de VerTiendas() 
        public function index($Categoria){
            switch($Categoria){
                case 'Comida_Rapida':
                    $this->Categoria = 'Comida Rapida';   
                break;    
                case 'Merceria':
                    $this->Categoria = 'Mercería';   
                break; 
                case 'Repuesto_automotriz':
                    $this->Categoria = 'Repuesto automotriz';   
                break;    
                case 'Ropa_Zapato':
                    $this->Categoria = 'Zapatería';   
                break;     
                case 'Material_Medico_Quirurgico':
                    $this->Categoria = 'Material Médico Quirúrgico';   
                break;    
                case 'Relojes':
                    $this->Categoria = 'Joyas y relojería';   
                break;
                case 'Panaderia':
                    $this->Categoria = 'Panadería';   
                break;
                case 'Artesania':
                    $this->Categoria = 'Arte';   
                break;
                case 'Ferreteria':
                    $this->Categoria = 'Ferretería';   
                break;
                case 'Floristeria':
                    $this->Categoria = 'Floristería';   
                break;
                case 'Construccion':
                    $this->Categoria = 'Construcción';   
                break;
                case 'Papeleria':
                    $this->Categoria = 'Papelería';   
                break;      
                default:
                $this->Categoria = $Categoria;
            }

            return $this->Categoria;
        }

        public function tiendasEnCatalogo($Categoria){ 
            $this->index($Categoria);
            
            //Se CONSULTAN las tiendas que estan afiliadas segun la categoria solicitada y que pueden ser publicadas en el catalogo de tiendas            
            $this->TiendasEnCategoria = $this->ConsultaTienda_M->consultarTiendas($this->Categoria); 
            // echo '<pre>';
            // print_r($this->TiendasEnCategoria);
            // echo '</pre>';
            // exit;

            //Se obtienen los IDs de las tiendas que se encuentran en la categoria
            foreach($this->TiendasEnCategoria AS $row) :
                $Nuevo_ID_Tienda = $row['ID_Tienda'];

                //Se añade el ID de cada tienda al array $IDs_Tiendas
                array_push($this->IDs_Tiendas, $Nuevo_ID_Tienda);
            endforeach;
            
            //Se cambia el array $IDs_Tiendas por una cadena para introducirla en la consulta tipo a BD
            $this->IDs_Tiendas = implode(",", $this->IDs_Tiendas); 
            // echo '<pre>';
            // print_r($this->IDs_Tiendas);
            // echo '</pre>';
            // exit;
            
            $this->Reputacion_ModosDePago();
        }

        public function Reputacion_ModosDePago(){    
            //SELECT para verificar tiendas que acepten transferencias como metodo de pago
            $TiendasTransferencias = $this->ConsultaTienda_M->consultarTransferencias($this->IDs_Tiendas);
            // echo '<pre>';
            // print_r($TiendasTransferencias);
            // echo '</pre>';
            // exit(); 

            //SELECT para verificar tiendas que acepten PagoMovil como metodo de pago
            $TiendasPagoMovil = $this->ConsultaTienda_M->consultarPagoMovil($this->IDs_Tiendas);
            // echo '<pre>';
            // print_r($TiendasTransferencias);
            // echo '</pre>';
            // exit();

            //SELECT para verificar tiendas que acepten otros medios de pago
            $TiendasOtrosPagos = $this->ConsultaTienda_M->consultarPagoBolivar($this->IDs_Tiendas);
            // echo '<pre>';
            // print_r($TiendasOtrosPagos);
            // echo '</pre>';
            // exit();

            //SELECT para verificar la cantidad de despachos que ha realizado una tienda
            $TiendasDespachos = $this->ConsultaTienda_M->consultarDespachos($this->IDs_Tiendas);            
            // echo '<pre>';
            // print_r($TiendasDespachos);
            // echo '</pre>';
            // exit;
            
            //SELECT para verificar la cantidad de no conformidades de una tienda
            // $TiendasNoConformidades = $this->ConsultaTienda_M->consultarInconformidades($this->IDs_Tiendas);            
            // echo '<pre>';
            // print_r($TiendasNoConformidades);
            // echo '</pre>';
            // exit;
            
            //SELECT para verificar la cantidad de disputas de una tienda
            $TiendasDisputas = $this->ConsultaTienda_M->consultarDisputas($this->IDs_Tiendas);           
            // echo '<pre>';
            // print_r($TiendasDisputas);
            // echo '</pre>';
            // exit;

            // *******************************************
            //CALCULO DE CLIENTES SATISFECHOS
            //Total despachos solicitados
            $PorcentajeSatisfaccion = [];
            $Nuevo = [];
            foreach($TiendasDespachos as $row)  :
                $ID_Tienda = $row['ID_Tienda'];
                $TotalDespachos = $row['Despachos'];

                $TiendasNoConformidades = $this->ConsultaTienda_M->consultarInconformidades($ID_Tienda);
                // echo 'ID_Tienda = ' . $ID_Tienda . '<br>';
                // echo 'Despachos = ' . $TotalDespachos . '<br>';
                // echo '<pre>';
                // print_r($TiendasNoConformidades);
                // echo '</pre>';
                // exit;

                // Total inconformidades
                if($TiendasNoConformidades == Array()){
                    $TotalIconformidades = 0;
                    // echo 'Inconformidades = ' . $TotalIconformidades . ' <br>';
                }
                else{
                    //Por cada tienda se busca la cantidad de no confomidades
                    foreach($TiendasNoConformidades as $Row)  :
                        if($ID_Tienda == $Row['ID_Tienda']){
                            $TotalIconformidades = $Row['Inconformidad'];
                            // echo 'Inconformidades = ' . $TotalIconformidades . ' <br>';
                        }
                    endforeach;
                }

                // $TotalIconformidades = empty($TotalIconformidades) ? 0 : $Row['Inconformidades'];
                 
                $Satisfaccion = ($TotalDespachos - $TotalIconformidades) * 100 / $TotalDespachos;

                //Se redondea el valor obtenido sin decimales
                $Satisfaccion = number_format($Satisfaccion); 
                // echo 'Clientes satisfechos = ' . $Satisfaccion . ' <br>';

                $Nuevo = ['ID_Tienda' => $ID_Tienda, 'Satisfaccion' => $Satisfaccion];
                array_push($PorcentajeSatisfaccion, $Nuevo);
                
                // echo '<pre>';
                // print_r($PorcentajeSatisfaccion);
                // echo '</pre>';
                // echo '<br>';  
                // exit;  
            endforeach;

            if($TiendasDespachos == Array()) :
                $TiendasNoConformidades = 0;
            endif;

            // ******************************************* 
            //CALCULO DE DISPONIBILIDAD HORARIA
            $DisponibilidaHoraria = $this->disponibilidadHoraria();

            $Datos = [
                'tiendas_categoria' => $this->TiendasEnCategoria,//ID_Tienda, nombre_Tien, direccion_Tien, telefono_Tien, fotografia_Tien, categoria, estado_Tien, parroquia_Tien 
                'tiendas_transferencias' => $TiendasTransferencias,
                'tiendas_pagomovil' => $TiendasPagoMovil,
                'tiendasOtrosPagos' => $TiendasOtrosPagos, //ID_Tienda, efectivoBolivar, efectivoDolar, acordado
                'tiendas_despachos' => $TiendasDespachos, //ID_Tienda, count(ID_tienda)
                'tiendas_inconformidades' => $TiendasNoConformidades,//ID_Tienda, count(Inconformidad)
                'tiendas_satisfaccion' => $PorcentajeSatisfaccion,
                'tiendas_disputas' => $TiendasDisputas, //ID_Tienda, conunt(Disputas)
                'tiendas_disponibilidad' => $DisponibilidaHoraria 
            ];
            
            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("inc/header", $Datos);
            $this->vista("paginas/tiendas_V",$Datos);
        }

        //Retorna si una tienda esta abierta o cerrda segun la hora actual
        public function disponibilidadHoraria(){
            //SELECT para encontrar los horarios de lunes a viernes de las tiendas de una categoria
            $TiendasHorarios_LV = $this->ConsultaTienda_M->consultarHorarios_LV($this->IDs_Tiendas);   
            date_default_timezone_set('America/Caracas');
            // echo '<pre>';
            // print_r($TiendasHorarios_LV);
            // echo '</pre>';
            // exit;

            //SELECT para encontrar los horarios del día sábado de las tiendas de una categoria
            $TiendasHorarios_Sab = $this->ConsultaTienda_M->consultarHorarios_Sab($this->IDs_Tiendas);   
            date_default_timezone_set('America/Caracas');
            // echo '<pre>';
            // print_r($TiendasHorarios_Sab);
            // echo '</pre>';
            // exit;
            
            //SELECT para encontrar los horarios del día domingo de las tiendas de una categoria
            $TiendasHorarios_Dom = $this->ConsultaTienda_M->consultarHorarios_Dom($this->IDs_Tiendas);   
            date_default_timezone_set('America/Caracas');
            // echo '<pre>';
            // print_r($TiendasHorarios_Dom);
            // echo '</pre>';
            // exit;

            $Nuevo_2 = [];
            $Disponibilidad = [];
            if(date('D') == 'Mon' || date('D') == 'Tue' || date('D') == 'Wed' || date('D') == 'Thu' ||date('D') == 'Fri') :
                foreach($TiendasHorarios_LV AS $row) :
                    if(($row['inicio_m'] < date('H:i') && $row['culmina_m'] > date('H:i')) || ($row['inicia_t'] < date('H:i') && $row['culmina_t'] > date('H:i'))) :
                        $Nuevo_2 = ['ID_Tienda' => $row['ID_Tienda'], 'disponibilidad' => 'Abierto'];
                        array_push($Disponibilidad, $Nuevo_2);
                    else :
                        $Nuevo_2 = ['ID_Tienda' => $row['ID_Tienda'], 'disponibilidad' => 'Cerrado'];
                        array_push($Disponibilidad, $Nuevo_2);
                    endif;
                endforeach;
            elseif(date('D') == 'Sat') :
                foreach($TiendasHorarios_Sab AS $row) :
                    if(($row['inicia_m_Sab'] < date('H:i') && $row['culmina_m_Sab'] > date('H:i')) || ($row['inicia_t_Sab'] < date('H:i') && $row['culmina_t_Sab'] > date('H:i'))) :
                        $Nuevo_2 = ['ID_Tienda' => $row['ID_Tienda'], 'disponibilidad' => 'Abierto'];
                        array_push($Disponibilidad, $Nuevo_2);
                    elseif($TiendasHorarios_Sab == Array ()) :
                        $Nuevo_2 = ['ID_Tienda' => $row['ID_Tienda'], 'disponibilidad' => 'Cerrado'];
                        array_push($Disponibilidad, $Nuevo_2);
                    else :
                        $Nuevo_2 = ['ID_Tienda' => $row['ID_Tienda'], 'disponibilidad' => 'Cerrado'];
                        array_push($Disponibilidad, $Nuevo_2);
                    endif;
                endforeach;
                elseif(date('D') == 'Sun') :
                    foreach($TiendasHorarios_Dom AS $row) :
                        if(($row['inicia_m_Dom'] < date('H:i') && $row['culmina_m_Dom'] > date('H:i')) || ($row['inicia_t_Dom'] < date('H:i') && $row['culmina_t_Dom'] > date('H:i'))) :
                            $Nuevo_2 = ['ID_Tienda' => $row['ID_Tienda'], 'disponibilidad' => 'Abierto'];
                            array_push($Disponibilidad, $Nuevo_2);
                        elseif($TiendasHorarios_Dom == Array ()) :
                            $Nuevo_2 = ['ID_Tienda' => $row['ID_Tienda'], 'disponibilidad' => 'Cerrado'];
                            array_push($Disponibilidad, $Nuevo_2);
                        else :
                            $Nuevo_2 = ['ID_Tienda' => $row['ID_Tienda'], 'disponibilidad' => 'Cerrado'];
                            array_push($Disponibilidad, $Nuevo_2);
                        endif;
                endforeach;
            endif;

            // echo '<pre>';
            // print_r($Disponibilidad);
            // echo '</pre>';
            // exit;
            return $Disponibilidad;
        }

        public function horarioTienda($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Tienda y el nombre de la tienda separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(",", $DatosAgrupados);
            
            $ID_Tienda = $DatosAgrupados[0];
            $NombreTienda = $DatosAgrupados[1];  

            //Consulta el horario de la tienda de lunes a viernes formato 12 horas
            $TiendasHorarios_LV = $this->ConsultaTienda_M->consultarHorario_LV($ID_Tienda);  
            
            //Consulta el horario de la tienda del sábado formato 12 horas
            $TiendasHorarios_Sab = $this->ConsultaTienda_M->consultarHorario_Sab($ID_Tienda); 

            //Consulta el horario de la tienda del domingo formato 12 horas
            $TiendasHorarios_Dom = $this->ConsultaTienda_M->consultarHorario_Dom($ID_Tienda);

            $Datos = [
                'horarioTienda_LV' => $TiendasHorarios_LV,
                'horarioTienda_Sab' => $TiendasHorarios_Sab,
                'horarioTienda_Dom' => $TiendasHorarios_Dom,
                'nombreTienda' => $NombreTienda
            ];

            // echo '<pre>';
            // print_r($Datos);
            // echo '</pre>';
            // exit;

            $this->vista("inc/header_Tienda");
            $this->vista("paginas/tienda/horarioDespacho_V", $Datos);
        }

        public function salirTienda(){
            //La función redireccionar se encuantra en url_helper.php
            redireccionar("/Inicio_C");
        }
    }
?>
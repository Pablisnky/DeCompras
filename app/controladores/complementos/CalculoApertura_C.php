<?php
    class CalculoApertura_C extends Controlador{

        public $HorarioTrabajo = [];

        public function __construct(){
            $this->ConsultaHorario_M = $this->complementos("CalculoApertura_M");
            // echo "<pre>";
            // print_r($this->ConsultaHorario_M);
            // echo "</pre>";

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }

        public function horarioTienda($ID_Tienda){     

            //Consulta el horario de la tienda de lunes a viernes formato 12 horas
            $TiendasHorarios_LV = $this->ConsultaHorario_M->consultarHorario_LV($ID_Tienda);  
            
            //Consulta el horario de la tienda del sábado formato 12 horas
            $TiendasHorarios_Sab = $this->ConsultaHorario_M->consultarHorario_Sab($ID_Tienda); 

            //Consulta el horario de la tienda del domingo formato 12 horas
            $TiendasHorarios_Dom = $this->ConsultaHorario_M->consultarHorario_Dom($ID_Tienda);
            
            //Consulta el horario de la tienda de un día de exepcion formato 12 horas
            $TiendasHorarios_Esp = $this->ConsultaHorario_M->consultarHorario_Esp($ID_Tienda);

            $DiasLaborales = [
                'horarioTienda_LV' => $TiendasHorarios_LV,
                'horarioTienda_Sab' => $TiendasHorarios_Sab,
                'horarioTienda_Dom' => $TiendasHorarios_Dom,
                'horarioTienda_Esp' => $TiendasHorarios_Esp,
            ];
            
            // echo "<pre>";
            // print_r($DiasLaborales);
            // echo "</pre>";
            // exit;

            foreach($DiasLaborales['horarioTienda_LV'] as $Dias_LV) :
                $Lunes_m = $Dias_LV['lunes_m']; 
                $Martes_m = $Dias_LV['martes_m']; 
                $Miercoles_m = $Dias_LV['miercoles_m']; 
                $Jueves_m = $Dias_LV['jueves_m']; 
                $Viernes_m = $Dias_LV['viernes_m']; 
                $Lunes_t = $Dias_LV['lunes_t']; 
                $Martes_t = $Dias_LV['martes_t']; 
                $Miercoles_t = $Dias_LV['miercoles_t']; 
                $Jueves_t = $Dias_LV['jueves_t']; 
                $Viernes_t = $Dias_LV['viernes_t']; 
            endforeach;
            
            foreach($DiasLaborales['horarioTienda_Sab'] as $Sabado) :
                $Sabado_m = $Sabado['sabado_m']; 
                $Sabado_t = $Sabado['sabado_t']; 
            endforeach;

            foreach($DiasLaborales['horarioTienda_Dom'] as $Domingo) :
                $Domingo_m = $Domingo['domingo_m']; 
                $Domingo_t = $Domingo['domingo_t']; 
            endforeach;
                    
            //Con la metodologia del corchete se reciben los horarios de LV
            $InicioManana_LV = $DiasLaborales['horarioTienda_LV'][0]['inicio_m'];
            $CulminaManana_LV = $DiasLaborales['horarioTienda_LV'][0]['culmina_m'];
            $IniciaTarde_LV = $DiasLaborales['horarioTienda_LV'][0]['inicia_t'];
            $CulminaTarde_LV = $DiasLaborales['horarioTienda_LV'][0]['culmina_t'];  

            $InicioManana_Sab = $DiasLaborales['horarioTienda_Sab'][0]['inicia_m_Sab'];
            $CulminaManana_Sab = $DiasLaborales['horarioTienda_Sab'][0]['culmina_m_Sab'];
            $IniciaTarde_Sab = $DiasLaborales['horarioTienda_Sab'][0]['inicia_t_Sab'];
            $CulminaTarde_Sab = $DiasLaborales['horarioTienda_Sab'][0]['culmina_t_Sab'];

            $InicioManana_Dom = $DiasLaborales['horarioTienda_Dom'][0]['inicia_m_Dom'];
            $CulminaManana_Dom = $DiasLaborales['horarioTienda_Dom'][0]['culmina_m_Dom'];
            $IniciaTarde_Dom = $DiasLaborales['horarioTienda_Dom'][0]['inicia_t_Dom'];
            $CulminaTarde_Dom = $DiasLaborales['horarioTienda_Dom'][0]['culmina_t_Dom'];  

            //Se asignan los valores de los horarios a variables segun existan
            $Lun_m_inicia = $Lunes_m != '0' ? $InicioManana_LV : '--';
            $Mar_m_inicia = $Martes_m != '0' ? $InicioManana_LV : '--';
            $Mie_m_inicia = $Miercoles_m != '0' ? $InicioManana_LV : '--';
            $Jue_m_inicia = $Jueves_m != '0' ? $InicioManana_LV : '--';
            $Vie_m_inicia = $Viernes_m != '0' ? $InicioManana_LV : '--';

            $Lun_m_culmina = $Lunes_m != '0' ? $CulminaManana_LV : '--';
            $Mar_m_culmina = $Martes_m != '0' ? $CulminaManana_LV : '--';
            $Mie_m_culmina = $Miercoles_m != '0' ? $CulminaManana_LV : '--';
            $Jue_m_culmina = $Jueves_m != '0' ? $CulminaManana_LV : '--';
            $Vie_m_culmina = $Viernes_m != '0' ? $CulminaManana_LV : '--';

            $Lun_t_inicia = $Lunes_t != '0' ? $IniciaTarde_LV : '--';
            $Mar_t_inicia = $Martes_t != '0' ? $IniciaTarde_LV : '--';
            $Mie_t_inicia = $Miercoles_t != '0' ? $IniciaTarde_LV : '--';
            $Jue_t_inicia = $Jueves_t != '0' ? $IniciaTarde_LV : '--';
            $Vie_t_inicia = $Viernes_t != '0' ? $IniciaTarde_LV : '--';
            
            $Lun_t_culmina = $Lunes_t != '0' ? $CulminaTarde_LV : '--';
            $Mar_t_culmina = $Martes_t != '0' ? $CulminaTarde_LV : '--';
            $Mie_t_culmina = $Miercoles_t != '0' ? $CulminaTarde_LV : '--';
            $Jue_t_culmina = $Jueves_t != '0' ? $CulminaTarde_LV : '--';
            $Vie_t_culmina = $Viernes_t != '0' ? $CulminaTarde_LV : '--';
                        
            //EVALUA SI EXISTE HORARIO ESPECIAL
            //Se evalua el horario especial para sobreescribir el valor de los horarios de ese dia
            if($DiasLaborales['horarioTienda_Esp'] != Array ()):
                foreach($DiasLaborales['horarioTienda_Esp'] as $Especial) :
                    $Especial_m = $Especial['especial_m']; 
                    $Especial_t = $Especial['especial_t']; 
                endforeach;

                $IniciaManana_Esp = $DiasLaborales['horarioTienda_Esp'][0]['inicia_m_Esp'];
                $CulminaManana_Esp = $DiasLaborales['horarioTienda_Esp'][0]['culmina_m_Esp'];
                $IniciaTarde_Esp = $DiasLaborales['horarioTienda_Esp'][0]['inicia_t_Esp'];
                $CulminaTarde_Esp = $DiasLaborales['horarioTienda_Esp'][0]['culmina_t_Esp'];
                            
                if($Especial_m != '0' || $Especial_t !='0'){
                    //Evalua si el horario especial es para el día lunes
                    if($Especial_m == 'Lunes'){
                        $Lun_m_inicia = $IniciaManana_Esp;
                    }
                    if($Especial_m == 'Lunes'){
                        $Lun_m_culmina = $CulminaManana_Esp;
                    }
                    if($Especial_t == 'Lunes'){
                        $Lun_t_inicia = $IniciaTarde_Esp;
                    }
                    if($Especial_t == 'Lunes'){
                        $Lun_t_culmina = $CulminaTarde_Esp;
                    }
                    //Evalua si el horario especial es para el día martes
                    if($Especial_m == 'Martes'){
                        $Mar_m_inicia = $IniciaManana_Esp;
                    }
                    if($Especial_m == 'Martes'){
                        $Mar_m_culmina = $CulminaManana_Esp;
                    }
                    if($Especial_t == 'Martes'){
                        $Mar_t_inicia = $IniciaTarde_Esp;
                    }
                    if($Especial_t == 'Martes'){
                        $Mar_t_culmina = $CulminaTarde_Esp;
                    }
                    //Evalua si el horario especial es para el día miercoles
                    if($Especial_m == 'Miercoles'){
                        $Mie_m_inicia = $IniciaManana_Esp;
                    }
                    if($Especial_m == 'Miercoles'){
                        $Mie_m_culmina = $CulminaManana_Esp;
                    }
                    if($Especial_t == 'Miercoles'){
                        $Mie_t_inicia = $IniciaTarde_Esp;
                    }
                    if($Especial_t == 'Miercoles'){
                        $Mie_t_culmina = $CulminaTarde_Esp;
                    }
                    //Evalua si el horario especial es para el día jueves
                    if($Especial_m == 'Jueves'){
                        $Jue_m_inicia = $IniciaManana_Esp;
                    }
                    if($Especial_m == 'Jueves'){
                        $Jue_m_culmina = $CulminaManana_Esp;
                    }
                    if($Especial_t == 'Jueves'){
                        $Jue_t_inicia = $IniciaTarde_Esp;
                    }
                    if($Especial_t == 'Jueves'){
                        $Jue_t_culmina = $CulminaTarde_Esp;
                    }
                    //Evalua si el horario especial es para el día viernes
                    if($Especial_m == 'Viernes'){
                        $Vie_m_inicia = $IniciaManana_Esp;
                    }
                    if($Especial_m == 'Viernes'){
                        $Vie_m_culmina = $CulminaManana_Esp;
                    }
                    if($Especial_t == 'Viernes'){
                        $Vie_t_inicia = $IniciaTarde_Esp;
                    }
                    if($Especial_t == 'Viernes'){
                        $Vie_t_culmina = $CulminaTarde_Esp;
                    }
                }
            endif;

            //Se evalua el horario de sabado y domingo
            if($InicioManana_Sab != '12:00 AM' && $Sabado_m != '0'){
                $Sab_m_inicia = $InicioManana_Sab;
            }
            else{
                $Sab_m_inicia = '--';
            }
            if($CulminaManana_Sab != '12:00 AM' && $Sabado_m != '0'){
                $Sab_m_culmina = $CulminaManana_Sab;
            }
            else{
                $Sab_m_culmina = '--';
            }
            if($IniciaTarde_Sab != '12:00 AM' && $Sabado_t != '0'){
                $Sab_t_inicia = $IniciaTarde_Sab;
            }
            else{
                $Sab_t_inicia = '--';
            }
            if($CulminaTarde_Sab != '12:00 AM' && $Sabado_t != '0'){
                $Sab_t_culmina = $CulminaTarde_Sab;
            }
            else{
                $Sab_t_culmina = '--';
            }                
            if($InicioManana_Dom != '12:00 AM' && $Domingo_m != '0'){
                $Dom_m_inicia = $InicioManana_Dom;
            }
            else{
                $Dom_m_inicia = '--';
            }
            if($CulminaManana_Dom != '12:00 AM' && $Domingo_m != '0'){
                $Dom_m_culmina = $CulminaManana_Dom;
            }
            else{
                $Dom_m_culmina = '--';
            }
            if($IniciaTarde_Dom != '12:00 AM' && $Domingo_t != '0'){
                $Dom_t_inicia = $IniciaTarde_Dom;
            }
            else{
                $Dom_t_inicia = '--';
            }
            if($CulminaTarde_Dom != '12:00 AM' && $Domingo_t != '0'){
                $Dom_t_culmina = $CulminaTarde_Dom;
            }
            else{
                $Dom_t_culmina = '--';
            }

            $CulminaManana_Sab = $CulminaManana_Sab != '12:00 AM' ? $CulminaManana_Sab : '--';$IniciaTarde_Sab = $IniciaTarde_Sab != '12:00 AM' ? $IniciaTarde_Sab : '--';
            $CulminaTarde_Sab = $CulminaTarde_Sab != '12:00 AM' ? $CulminaTarde_Sab:'--';              
            
            $InicioManana_Dom = $InicioManana_Dom != '12:00 AM' ? $InicioManana_Dom : '--';
            $CulminaManana_Dom = $CulminaManana_Dom != '12:00 AM' ? $CulminaManana_Dom : '--';
            $IniciaTarde_Dom = $IniciaTarde_Dom != '12:00 AM' ? $IniciaTarde_Dom : '--';
            $CulminaTarde_Dom = $CulminaTarde_Dom != '12:00 AM' ? $CulminaTarde_Dom : '--'; 
                
            $HorarioTrabajo = [
                'id_tienda' => $ID_Tienda,
                'Lunes_m' => $Lunes_m, 
                'Martes_m' => $Martes_m, 
                'Miercoles_m' => $Miercoles_m,
                'Jueves_m' => $Jueves_m,
                'Viernes_m' => $Viernes_m,
                'Sabado_m' => $Sabado_m,
                'Domingo_m' => $Domingo_m, 
                'Lunes_t' => $Lunes_t,
                'Martes_t' => $Martes_t,
                'Miercoles_t' => $Miercoles_t,
                'Jueves_t' => $Jueves_t, 
                'Viernes_t' => $Viernes_t,
                'Sabado_t' => $Sabado_t,
                'Domingo_t' => $Domingo_t, 
                'Lun_m_inicia' => $Lun_m_inicia,
                'Lun_m_culmina' =>  $Lun_m_culmina,
                'Lun_t_inicia' => $Lun_t_inicia,              
                'Lun_t_culmina' => $Lun_t_culmina,
                'Mar_m_inicia' =>  $Mar_m_inicia,
                'Mar_m_culmina' =>  $Mar_m_culmina,
                'Mar_t_inicia' => $Mar_t_inicia,
                'Mar_t_culmina' => $Mar_t_culmina,
                'Mie_m_inicia' =>  $Mie_m_inicia,
                'Mie_m_culmina' =>  $Mie_m_culmina,
                'Mie_t_inicia' => $Mie_t_inicia,
                'Mie_t_culmina' => $Mie_t_culmina,
                'Jue_m_inicia' =>  $Jue_m_inicia,
                'Jue_m_culmina' =>  $Jue_m_culmina,
                'Jue_t_inicia' => $Jue_t_inicia,
                'Jue_t_culmina' => $Jue_t_culmina,
                'Vie_m_inicia' =>  $Vie_m_inicia,
                'Vie_m_culmina' =>  $Vie_m_culmina,
                'Vie_t_inicia' => $Vie_t_inicia,  
                'Vie_t_culmina' => $Vie_t_culmina,
                'Sab_m_inicia' => $Sab_m_inicia,
                'Sab_m_culmina' => $Sab_m_culmina,
                'Sab_t_inicia' => $Sab_t_inicia,
                'Sab_t_culmina' => $Sab_t_culmina,                
                'Dom_m_inicia' => $Dom_m_inicia,
                'Dom_m_culmina' => $Dom_m_culmina,
                'Dom_t_inicia' => $Dom_t_inicia,
                'Dom_t_culmina' => $Dom_t_culmina                
            ];
            // echo "<pre>";
            // print_r($HorarioTrabajo);
            // echo "</pre>";
            return $HorarioTrabajo;
        }
        
        //Retorna si una tienda esta abierta o cerrada segun la hora actual(Tiendas_C/Reputacion_ModosDePago)
        public function disponibilidadHoraria($TiendasEnCategoria){
            
            $Nuevo_2 = [];
            $Disponibilidad = [];

            date_default_timezone_set('America/Caracas');
            switch(date('D')):
                case 'Mon':
                    $Dia = 'Lunes';   
                break;   
                case 'Tue':
                    $Dia = 'Martes';   
                break; 
                case 'Wed':
                    $Dia = 'Miercoles';   
                break; 
                case 'Thu':
                    $Dia = 'Jueves';   
                break; 
                case 'Fri':
                    $Dia = 'Viernes';   
                break; 
                case 'Sat':
                    $Dia = 'Sabado';   
                break; 
                case 'Sun':
                    $Dia = 'Domingo';   
                break; 
            endswitch;

            foreach($TiendasEnCategoria as $row):
                $ID_Tienda = $row['ID_Tienda'];
                //Se evalua para cada tienda que se encuproximoApertura $this->IDs_Tienda la disponibilidad
                $Hor = $this->horarioTienda($ID_Tienda);
                 
                date_default_timezone_set('America/Caracas');

                //Con date_format(date_create($Hor['Dom_t_inicia']) se cambia el formato de 12 a 24 horas
                // DISPONIBILIDAD SABADO MAÑANA (CERRADO - ABIERTO)
                if($Dia == 'Sabado' && ($Hor['Sabado_m'] != '0')):
                    if($Hor['Sab_m_inicia'] < date('H:i') && $Hor['Sab_m_inicia'] != '--'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Abierto'];
                        array_push($Disponibilidad, $Nuevo_2);
                    else:
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado'];
                        array_push($Disponibilidad, $Nuevo_2);
                    endif;
                elseif($Dia == 'Sabado' && $Hor['Sabado_m'] == '0'):
                    $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado'];
                    array_push($Disponibilidad, $Nuevo_2);
                endif;

                // DISPONIBILIDAD DOMINGO (CERRADO - ABIERTO - HORA DE APERTURA)
                if($Dia == 'Domingo'):
                    //ABRE DIA SIGUIENTE
                    if($Hor['Domingo_m'] == '0' && $Hor['Domingo_t'] == '0' && $Hor['Lunes_m'] != '0'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Lun_m_inicia']];
                        array_push($Disponibilidad, $Nuevo_2);
                        
                    //ABRE DIA SIGUIENTE
                    elseif($Hor['Domingo_m'] == '0' && $Hor['Domingo_t'] == '0' && $Hor['Lunes_m'] == '0'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' =>   $Hor['Lun_t_inicia']];
                        array_push($Disponibilidad, $Nuevo_2);

                    //Abre en la mañana
                    elseif($Hor['Domingo_m'] != '0' && $Hor['Domingo_t'] == '0' && $Hor['Dom_m_inicia'] > date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreMañana'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE DIA SIGUIENTE
                    elseif($Hor['Domingo_m'] != '0' && date_format(date_create($Hor['Dom_m_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Lun_m_inicia']];
                        array_push($Disponibilidad, $Nuevo_2);
                        
                    elseif($Hor['Domingo_m'] == '0' && date_format(date_create($Hor['Dom_t_inicia']),"H:i") > date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreTardeDesdeDiaAnterior', 'horaApertura' => $Hor['Dom_t_inicia']];
                        array_push($Disponibilidad, $Nuevo_2);
                    elseif($Hor['Domingo_t'] != '0' && date_format(date_create($Hor['Dom_t_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'CierraTarde'];
                        array_push($Disponibilidad, $Nuevo_2);
                    else:
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Abierto', 'proximoApertura' => 'NoAplica', 'horaApertura' => 'NoAplica'];
                        array_push($Disponibilidad, $Nuevo_2);
                    endif;
                
                    // DISPONIBILIDAD LUNES (CERRADO - ABIERTO - HORA DE APERTURA)
                elseif($Dia == 'Lunes'):
                    //ABRE DIA SIGUIENTE
                    if($Hor['Lunes_m'] == '0' && $Hor['Lunes_t'] == '0' && $Hor['Lunes_m'] != '0'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Mar_m_inicia'], 'Condicional' => 'A'];
                        array_push($Disponibilidad, $Nuevo_2);
                        
                    //ABRE DIA SIGUIENTE
                    elseif($Hor['Lunes_m'] == '0' && $Hor['Lunes_t'] == '0' && $Hor['Lunes_m'] == '0'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Mar_t_inicia'], 'Condicional' => 'B'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE EN LA MAÑANA (Verificado)
                    elseif($Hor['Lunes_m'] != '0' && date_format(date_create($Hor['Lun_m_inicia']),"H:i") > date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreMañana', 'horaApertura' => $Hor['Lun_m_inicia'], 'Condicional' => 'C'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE EN LA TARDE CERRADO A MEDIODIA (Verificado)
                    elseif(date_format(date_create($Hor['Lun_t_inicia']),"H:i") > date('H:i') && date_format(date_create($Hor['Lun_m_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreTarde', 'horaApertura' => $Hor['Lun_t_inicia'], 'Condicional' => 'E'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE EN LA TARDE CERRADO A MEDIODIA (Verificado)
                    elseif(date_format(date_create($Hor['Lun_t_inicia']),"H:i") > date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreTarde', 'horaApertura' => $Hor['Lun_t_inicia'], 'Condicional' => 'E1'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE DIA SIGUIENTE (Verificado)
                    elseif($Hor['Lunes_m'] != '0' && date_format(date_create($Hor['Lun_m_culmina']),"H:i") < date('H:i') && date_format(date_create($Hor['Lun_t_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Mar_m_inicia'], 'Condicional' => 'D'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE DIA SIGUIENTE (Verificado, solo horarios vespertinos)
                    elseif($Hor['Lunes_t'] != '0' && date_format(date_create($Hor['Lun_t_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Mar_t_inicia'], 'Condicional' => 'F'];
                        array_push($Disponibilidad, $Nuevo_2);
                    else:
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Abierto', 'proximoApertura' => 'NoAplica', 'horaApertura' => 'NoAplica', 'Condicional' => 'G'];
                        array_push($Disponibilidad, $Nuevo_2);
                    endif;
                
                    // DISPONIBILIDAD MARTES (CERRADO - ABIERTO - HORA DE APERTURA)
                elseif($Dia == 'Martes'):
                    //ABRE EN LA MAÑANA (Verificado)
                    if($Hor['Martes_m'] != '0' && date_format(date_create($Hor['Mar_m_inicia']),"H:i") > date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreMañana', 'horaApertura' => $Hor['Mar_m_inicia'], 'Condicional' => 'C'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE EN LA TARDE CERRADO A MEDIODIA (Verificado)
                    elseif(date_format(date_create($Hor['Mar_t_inicia']),"H:i") > date('H:i') && date_format(date_create($Hor['Mar_m_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreTarde', 'horaApertura' => $Hor['Mar_t_inicia'], 'Condicional' => 'E'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE DIA SIGUIENTE (Verificado)
                    elseif($Hor['Martes_m'] != '0' && date_format(date_create($Hor['Mar_m_culmina']),"H:i") < date('H:i') && date_format(date_create($Hor['Mar_t_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Mie_m_inicia'], 'Condicional' => 'D'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE DIA SIGUIENTE (Verificado, solo horarios vespertinos)
                    elseif($Hor['Martes_t'] != '0' && date_format(date_create($Hor['Mar_t_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Mie_t_inicia'], 'Condicional' => 'F'];
                        array_push($Disponibilidad, $Nuevo_2);
                        //ABRE DIA SIGUIENTE
                    elseif($Hor['Martes_m'] == '0' && $Hor['Martes_t'] == '0' && $Hor['Martes_m'] != '0'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Mie_m_inicia'], 'Condicional' => 'A'];
                        array_push($Disponibilidad, $Nuevo_2);
                        
                    //ABRE DIA SIGUIENTE
                    elseif($Hor['Martes_m'] == '0' && $Hor['Martes_t'] == '0' && $Hor['Martes_m'] == '0'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Mie_t_inicia'], 'Condicional' => 'B'];
                        array_push($Disponibilidad, $Nuevo_2);
                    else:
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Abierto', 'proximoApertura' => 'NoAplica', 'horaApertura' => 'NoAplica', 'Condicional' => 'G'];
                        array_push($Disponibilidad, $Nuevo_2);
                    endif;
                
                    // DISPONIBILIDAD MIERCOLES (CERRADO - ABIERTO - HORA DE APERTURA)
                elseif($Dia == 'Miercoles'):
                    //ABRE EN LA MAÑANA (Verificado)
                    if($Hor['Miercoles_m'] != '0' && date_format(date_create($Hor['Mie_m_inicia']),"H:i") > date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreMañana', 'horaApertura' => $Hor['Mie_m_inicia'], 'Condicional' => 'A'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE EN LA TARDE CERRADO A MEDIODIA (Verificado)
                    elseif(date_format(date_create($Hor['Mie_t_inicia']),"H:i") > date('H:i') && date_format(date_create($Hor['Mie_m_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreTarde', 'horaApertura' => $Hor['Mie_t_inicia'], 'Condicional' => 'E'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE DIA SIGUIENTE (Verificado)
                    elseif($Hor['Miercoles_m'] != '0' && date_format(date_create($Hor['Mie_m_culmina']),"H:i") < date('H:i') && date_format(date_create($Hor['Mie_t_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Jue_m_inicia'], 'Condicional' => 'D'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE DIA SIGUIENTE (Verificado, solo horarios vespertinos)
                    elseif($Hor['Miercoles_t'] != '0' && date_format(date_create($Hor['Mie_t_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Jue_t_inicia'], 'Condicional' => 'F'];
                        array_push($Disponibilidad, $Nuevo_2);
                        //ABRE DIA SIGUIENTE
                    elseif($Hor['Miercoles_m'] == '0' && $Hor['Miercoles_t'] == '0' && $Hor['Miercoles_m'] != '0'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Jue_m_inicia'], 'Condicional' => 'C'];
                        array_push($Disponibilidad, $Nuevo_2);
                        
                    //ABRE DIA SIGUIENTE
                    elseif($Hor['Miercoles_m'] == '0' && $Hor['Miercoles_t'] == '0' && $Hor['Miercoles_m'] == '0'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Jue_t_inicia'], 'Condicional' => 'B'];
                        array_push($Disponibilidad, $Nuevo_2);
                    else:
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Abierto', 'proximoApertura' => 'NoAplica', 'horaApertura' => 'NoAplica', 'Condicional' => 'G'];
                        array_push($Disponibilidad, $Nuevo_2);
                    endif;
                
                    // DISPONIBILIDAD JUEVES (CERRADO - ABIERTO - HORA DE APERTURA)
                elseif($Dia == 'Jueves'):
                    //ABRE EN LA MAÑANA (Verificado)
                    if($Hor['Jueves_m'] != '0' && date_format(date_create($Hor['Jue_m_inicia']),"H:i") > date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreMañana', 'horaApertura' => $Hor['Jue_m_inicia'], 'Condicional' => 'A'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE EN LA TARDE CERRADO A MEDIODIA (Verificado)
                    elseif(date_format(date_create($Hor['Jue_t_inicia']),"H:i") > date('H:i') && date_format(date_create($Hor['Jue_m_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreTarde', 'horaApertura' => $Hor['Jue_t_inicia'], 'Condicional' => 'E'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE DIA SIGUIENTE (Verificado)
                    elseif($Hor['Jueves_m'] != '0' && date_format(date_create($Hor['Jue_m_culmina']),"H:i") < date('H:i') && date_format(date_create($Hor['Jue_t_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Vie_m_inicia'], 'Condicional' => 'D'];
                        array_push($Disponibilidad, $Nuevo_2);

                    //ABRE DIA SIGUIENTE (Verificado, solo horarios vespertinos)
                    elseif($Hor['Jueves_t'] != '0' && date_format(date_create($Hor['Jue_t_culmina']),"H:i") < date('H:i')):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Vie_t_inicia'], 'Condicional' => 'F'];
                        array_push($Disponibilidad, $Nuevo_2);
                        //ABRE DIA SIGUIENTE
                    elseif($Hor['Jueves_m'] == '0' && $Hor['Jueves_t'] == '0' && $Hor['Jueves_m'] != '0'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Vie_m_inicia'], 'Condicional' => 'C'];
                        array_push($Disponibilidad, $Nuevo_2);
                        
                    //ABRE DIA SIGUIENTE
                    elseif($Hor['Jueves_m'] == '0' && $Hor['Jueves_t'] == '0' && $Hor['Jueves_m'] == '0'):
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda, 'disponibilidad' => 'Cerrado', 'proximoApertura' => 'AbreDiaSiguiente', 'horaApertura' => $Hor['Vie_t_inicia'], 'Condicional' => 'B'];
                        array_push($Disponibilidad, $Nuevo_2);
                    else:
                        $Nuevo_2 = ['ID_Tienda' => $ID_Tienda,  'disponibilidad' => 'Abierto', 'proximoApertura' => 'NoAplica', 'horaApertura' => 'NoAplica', 'Condicional' => 'G'];
                        array_push($Disponibilidad, $Nuevo_2);
                    endif;
                endif;        
            endforeach; 
            
            // echo '<pre>';
            // print_r($Disponibilidad);
            // echo '</pre>';
            // exit;
            return $Disponibilidad;
        }
    }   ?>
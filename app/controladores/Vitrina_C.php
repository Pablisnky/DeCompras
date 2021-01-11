<?php
    class Vitrina_C extends Controlador{

        public function __construct(){
            $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        //Metodo cargado desde E_Tiendas.js - E_Inicio.js
        public function index($DatosAgrupados){
            //$DatosAgrupados contiene una cadena con el ID_Tienda, el nombre de tienda, la seccion y la opcion separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(",", $DatosAgrupados);
            $ID_Tienda = $DatosAgrupados[0];
            $NombreTienda = $DatosAgrupados[1];
            $SeccionBuscada = $DatosAgrupados[2];
            $OpcionBuscada = $DatosAgrupados[3];
            $DisponibilidaHoraria = $DatosAgrupados[4];

            //Se CONSULTAN las categoria de una tienda en particular
            $Categoria = $this->ConsultaVitrina_M->consultarCategoria($ID_Tienda);

            //Se CONSULTAN las secciones de una tienda en particular
            $Secciones = $this->ConsultaVitrina_M->consultarSecciones($ID_Tienda);            

            //Se CONSULTAN la fotografia de una tienda en particular
            $Fotografia = $this->ConsultaVitrina_M->consultarFotografia($ID_Tienda);

            //Se CONSULTAN el slogan de una tienda en particular
            $Slogan = $this->ConsultaVitrina_M->consultarSloganTienda($ID_Tienda);

            //Se consulta el horario de apertura segun el dia de la semana
            if(date('D') == 'Mon' || date('D') == 'Tue' || date('D') == 'Wed' || date('D') == 'Thu' || date('D') == 'Fri') :
                //Se CONSULTAN las horas de apertura de lunes a viernes
                $HoraApertura = $this->ConsultaVitrina_M->consultarAperturaTienda_LV($ID_Tienda);
                date_default_timezone_set('America/Caracas');
//                 echo '<pre>';
//                 print_r($HoraApertura);
//                 echo '</pre>';
//                 echo date('H:i') . '<br>'; 
// exit;
                if($HoraApertura[0]['inicio_m'] > date('H:i')) :
                    //Hora de apertura en la mañana en formato 12 horas               
                    $HoraApertura = date("g:i a", strtotime($HoraApertura[0]['inicio_m']));
                    $ProximoDia = false;
                    //Hora de apertura en la tarde
                elseif($HoraApertura[0]['culmina_m'] < date('H:i') && $HoraApertura[0]['inicia_t'] > date('H:i')) :
                    $HoraApertura = date("g:i a", strtotime($HoraApertura[0]['inicia_t']));
                    $ProximoDia = false;
                elseif($HoraApertura[0]['culmina_t'] < date('H:i')) :
                    //Hora de apertura del siguiente día en formato 12 horas
                    $HoraApertura = date("g:i a", strtotime($HoraApertura[0]['inicio_m']));
                    $ProximoDia = true;
                else :
                    $HoraApertura = '';
                    $ProximoDia = 'NoAplica';
                endif;
            elseif(date('D') == 'Sab') :
                //Se CONSULTAN las horas de apertura del sabado
                $HoraApertura = $this->ConsultaVitrina_M->consultarAperturaTienda_Sab($ID_Tienda);
                date_default_timezone_set('America/Caracas');
                // echo '<pre>';
                // print_r($HoraApertura);
                // echo '</pre>';
                // echo date('H:i') . '<br>'; 
                if($HoraApertura[0]['inicia_m_Sab'] > date('H:i')) :
                    //Hora de apertura en la mañana en formato 12 horas               
                    $HoraApertura = date("g:i a", strtotime($HoraApertura[0]['inicia_m_Sab']));
                    $ProximoDia = false;
                elseif($HoraApertura[0]['culmina_m_Sab'] < date('H:i') && $HoraApertura[0]['inicia_t_Sab'] > date('H:i')) :
                    //Hora de apertura en la tarde
                    $HoraApertura = date("g:i a", strtotime($HoraApertura[0]['inicia_t_Sab']));
                    $ProximoDia = false;
                elseif($HoraApertura[0]['culmina_t_Sab'] < date('H:i') && $HoraApertura[0]['inicia_m_Sab'] != '00:00') :
                    //Hora de apertura del siguiente día en formato 12 horas
                    $HoraApertura = date("g:i a", strtotime($HoraApertura[0]['inicia_m_Sab']));
                    $ProximoDia = true;
                elseif($HoraApertura[0]['inicia_m_Sab'] == '00:00') :
                    //Hora de apertura para el día lunes en formato 12 horas
                    $HoraApertura = $this->ConsultaVitrina_M->consultarAperturaTienda_LV($ID_Tienda);
                    $HoraApertura = $HoraApertura[0]['inicio_m'];
                    $ProximoDia = 'NoAplica';
                endif;
            else :
                //Se CONSULTAN las horas de apertura del domingo
                $HoraApertura = $this->ConsultaVitrina_M->consultarAperturaTienda_Dom($ID_Tienda);
                date_default_timezone_set('America/Caracas');
                // echo '<pre>';
                // print_r($HoraApertura);
                // echo '</pre>';
                // echo date('H:i') . '<br>'; 
                // $ProximoDia = true -> indica que se abre al dia siguiente
                // $ProximoDia = NoAplica -> indica que se abre el dia lunes
                // $ProximoDia = false -> indica que se abre ese mismo dia 

                //Hora de apertura en la mañana (formato 12 horas)  
                if($HoraApertura[0]['inicia_m_Dom'] > date('H:i')) :             
                    $HoraApertura = date("g:i a", strtotime($HoraApertura[0]['inicia_m_Dom']));
                    $ProximoDia = false;
                //Hora de apertura en la tarde (formato 12 horas)
                elseif($HoraApertura[0]['culmina_m_Dom'] < date('H:i') && $HoraApertura[0]['inicia_t_Dom'] > date('H:i')) :
                    $HoraApertura = date("g:i a", strtotime($HoraApertura[0]['inicia_t_Dom']));
                    $ProximoDia = false;
                //Hora de apertura del siguiente día en formato 12 horas
                elseif($HoraApertura[0]['culmina_t_Dom'] < date('H:i') && ($HoraApertura[0]['inicia_m_Dom'] != '00:00') || $HoraApertura[0]['inicia_m_Dom'] == '00:00') :
                    $HoraApertura = $this->ConsultaVitrina_M->consultarAperturaTienda_LV($ID_Tienda);
                    $HoraApertura = date("g:i a", strtotime($HoraApertura[0]['inicio_m']));
                    $ProximoDia = true;
                //Hora de apertura para el día lunes (formato 12 horas)
                // elseif($HoraApertura[0]['inicia_m_Dom'] == '00:00') :
                    // $HoraApertura = $this->ConsultaVitrina_M->consultarAperturaTienda_LV($ID_Tienda);
                    // $HoraApertura = date("g:i a", strtotime($HoraApertura[0]['inicio_m']));
                    // $ProximoDia = 'NoAplica';
                endif;
            endif;

            $Datos=[
                'id_tienda' => $ID_Tienda,
                'categoria' => $Categoria,
                "seccion" => $Secciones,
                "NombreTienda" => $NombreTienda,
                "fotografia" => $Fotografia,
                'slogan' => $Slogan,
                'Seccion' => $SeccionBuscada, //Necesaria cuando se viene de E_Inicio.js
                'Opcion' => $OpcionBuscada, //Necesaria cuando se viene de E_Inicio.js
                'disponibilidad' => $DisponibilidaHoraria,
                'horaApertura' => $HoraApertura,
                'proximoDia' => $ProximoDia
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();

            $this->vista("inc/header_Tienda", $Datos);
            $this->vista("paginas/vitrina_V",  $Datos);
        }

        public function alertPersonal(){
            $this->vista("inc/alert");
        } 
    }
?>    
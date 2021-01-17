<?php
    class Vitrina_C extends Controlador{
        //creamos la variable donde se instanciará la clase "CalculoApertura_C"
        public $Horario;

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

            require(RUTA_APP . "/controladores/complementos/CalculoApertura_C.php");

            $this->Horario = new CalculoApertura_C;
            $HorarioTrabajo = $this->Horario->horarioTienda($ID_Tienda);
 
            // echo "<pre>";
            // print_r($HorarioTrabajo);
            // echo "</pre>";
            // exit();

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
                'HorarioTrabajo' => $HorarioTrabajo
            ];

            // echo "<pre>";
            // print_r($Datos);
            // echo "</pre>";
            // exit();

            $this->vista("inc/header_Tienda", $Datos);
            $this->vista("paginas/vitrina_V",  $Datos);
        }
    }
?>    
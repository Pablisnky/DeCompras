<?php
    class Vitrina_C extends Controlador{
        //creamos la variable donde se instanciará la clase "CalculoApertura_C"
        public $Horario;

        public function __construct(){
            $this->ConsultaVitrina_M = $this->modelo("Vitrina_M");

            //La función ocultarErrores() se encuantra en la carpeta helpers, es accecible debido a que en iniciador.php se realizó el require respectivo
            ocultarErrores();
        }
        
        //Metodo cargado desde E_Tiendas.js por medio de tiendas()
        public function index($DatosAgrupados){            
            //$DatosAgrupados contiene una cadena con el ID_Tienda, el nombre de tienda, la seccion y la opcion separados por coma, se convierte en array para separar los elementos
            $DatosAgrupados = explode(",", $DatosAgrupados);
            $ID_Tienda = $DatosAgrupados[0];
            $NombreTienda = $DatosAgrupados[1];
            $SeccionBuscada = $DatosAgrupados[2];
            $OpcionBuscada = $DatosAgrupados[3];
            $DisponibilidaHoraria = $DatosAgrupados[4];
            $ProximoApertura = $DatosAgrupados[5];
            $HoraApertura = $DatosAgrupados[6];
            // echo 'ID_Tienda: ' . $ID_Tienda . '<br>';
            // echo 'Nombre Tienda: ' .  $NombreTienda . '<br>';
            // echo 'Seccion Buscada: ' .  $SeccionBuscada . '<br>';
            // echo 'Opcion Buscada: ' .  $OpcionBuscada . '<br>';
            // echo 'Disponibilidad Horaria: ' .  $DisponibilidaHoraria . '<br>';
            // echo 'Proximo Apertura: ' .  $ProximoApertura . '<br>';
            // echo 'Hora Apertura: ' .  $HoraApertura . '<br>';
            // exit;

            //Se CONSULTAN las categoria de una tienda en particular
            $Categoria = $this->ConsultaVitrina_M->consultarCategoria($ID_Tienda);

            //Se CONSULTAN las secciones de una tienda en particular
            $Secciones = $this->ConsultaVitrina_M->consultarSecciones($ID_Tienda);            

            //Se CONSULTAN la fotografia de una tienda en particular
            $Fotografia = $this->ConsultaVitrina_M->consultarFotografia($ID_Tienda);

            //Se CONSULTAN el slogan de una tienda en particular
            $Slogan = $this->ConsultaVitrina_M->consultarSloganTienda($ID_Tienda);
            
            //Se CONSULTAN la cantidad de productos por seccion de tienda
            $Cant_ProductosSeccion = $this->ConsultaVitrina_M->consultarCant_ProductosSeccion($ID_Tienda);

            //Se instancia la clase CalculoApertura para conseguir la hora en la abre una tienda
            require(RUTA_APP . "/controladores/complementos/CalculoApertura_C.php");
            $this->Horario = new CalculoApertura_C;
            $HorarioTrabajo = $this->Horario->horarioTienda($ID_Tienda);
            
            //Se CONSULTAN la imagen principal de cada sección de una tienda especifica
            $ImagenSecciones = $this->ConsultaVitrina_M->consultarImagenesSecciones($ID_Tienda);

            //Si no hay imagen establecida para una sección, se selecciona la primera imagen que se encuentre de esa sección
            if($ImagenSecciones == Array()) :
                $ImagenSecciones = $this->ConsultaVitrina_M->consultarImagenesSeccionForzada($ID_Tienda);
            endif;
            
            // echo "<pre>";
            // print_r($ImagenSecciones);
            // echo "</pre>";
            // exit();

            $Datos=[
                'id_tienda' => $ID_Tienda,
                'categoria' => $Categoria,
                "seccion" => $Secciones, //ID_Seccion, seccion
                "NombreTienda" => $NombreTienda,
                "fotografia" => $Fotografia,
                'slogan' => $Slogan,
                'Seccion' => $SeccionBuscada, //Necesaria cuando se viene de E_Inicio.js
                'Opcion' => $OpcionBuscada, //Necesaria cuando se viene de E_Inicio.js
                'disponibilidad' => $DisponibilidaHoraria,
                'HorarioTrabajo' => $HorarioTrabajo,
                'ProximoApertura' => $ProximoApertura,
                'HoraApertura' => $HoraApertura,
                'cant_productosSeccion' => $Cant_ProductosSeccion, //ID_Seccion, CantidadProducto por seccion
                'imagenSecciones' => $ImagenSecciones//nombre_img, ID_Seccion
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